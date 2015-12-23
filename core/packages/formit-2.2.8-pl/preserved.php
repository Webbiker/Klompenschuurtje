<?php return array (
  'c301e1222112b078af24ce7749c56735' => 
  array (
    'criteria' => 
    array (
      'name' => 'formit',
    ),
    'object' => 
    array (
      'name' => 'formit',
      'path' => '{core_path}components/formit/',
      'assets_path' => NULL,
    ),
  ),
  '101f2df56544fc90749e0bc959c20fa3' => 
  array (
    'criteria' => 
    array (
      'category' => 'FormIt',
    ),
    'object' => 
    array (
      'id' => 4,
      'parent' => 0,
      'category' => 'FormIt',
      'rank' => 0,
    ),
    'files' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/assets/components',
    ),
  ),
  '0ab99eaf0ca7e821d30bd991dcce2870' => 
  array (
    'criteria' => 
    array (
      'name' => 'FormIt',
    ),
    'object' => 
    array (
      'id' => 5,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FormIt',
      'description' => 'A dynamic form processing snippet.',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt
 *
 * A dynamic form processing Snippet for MODx Revolution 2.0.
 *
 * @package formit
 */
/* load FormIt classes */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\').\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);
$fi->initialize($modx->context->get(\'key\'));

/* get default properties */
$submitVar = $modx->getOption(\'submitVar\',$scriptProperties,false);
$hooks = $modx->getOption(\'hooks\',$scriptProperties,\'\');
$preHooks = $modx->getOption(\'preHooks\',$scriptProperties,\'\');
$errTpl = $modx->getOption(\'errTpl\',$scriptProperties,\'<span class="error">[[+error]]</span>\');
$validationErrorMessage = $modx->getOption(\'validationErrorMessage\',$scriptProperties,\'<p class="error">A form validation error occurred. Please check the values you have entered.</p>\');
$validationErrorBulkTpl = $modx->getOption(\'validationErrorBulkTpl\',$scriptProperties,\'<li>[[+error]]</li>\');
$validationErrorBulkSeparator = $modx->getOption(\'validationErrorBulkSeparator\',$scriptProperties,"\\n");
$store = $modx->getOption(\'store\',$scriptProperties,false);
$validate = $modx->getOption(\'validate\',$scriptProperties,\'\');
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'fi.\');

/* if using recaptcha, load recaptcha html */
if (strpos($hooks,\'recaptcha\') !== false) {
    $fi->loadReCaptcha($scriptProperties);
    if (!empty($fi->recaptcha) && $fi->recaptcha instanceof FormItReCaptcha) {
        $html = $fi->recaptcha->getHtml($scriptProperties);
        $modx->setPlaceholder(\'formit.recaptcha_html\',$html);
    } else {
        $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] \'.$modx->lexicon(\'formit.recaptcha_err_load\'));
    }
}

/* if using math hook, load default placeholders */
if (strpos($hooks,\'math\') !== false && empty($_POST)) {
    $mathMaxRange = $modx->getOption(\'mathMaxRange\',$scriptProperties,100);
    $mathMinRange = $modx->getOption(\'mathMinRange\',$scriptProperties,10);
    $op1 = rand($mathMinRange,$mathMaxRange);
    $op2 = rand($mathMinRange,$mathMaxRange);
    if ($op2 > $op1) { $t = $op2; $op2 = $op1; $op1 = $t; } /* swap so we always get positive #s */
    /* prevent numbers from being equal */
    if ($op2 == $op1) {
        while ($op2 == $op1) {
            $op2 = rand($mathMinRange,$mathMaxRange);
        }
    }
    $operators = array(\'+\',\'-\');
    $operator = rand(0,1);
    $modx->setPlaceholders(array(
        $modx->getOption(\'mathOp1Field\',$scriptProperties,\'op1\') => $op1,
        $modx->getOption(\'mathOp2Field\',$scriptProperties,\'op2\') => $op2,
        $modx->getOption(\'mathOperatorField\',$scriptProperties,\'operator\') => $operators[$operator],
    ),$placeholderPrefix);
}

/* load preHooks */
$fi->loadHooks(\'pre\');
$fi->preHooks->loadMultiple($preHooks,array(),array(
    \'submitVar\' => $submitVar,
    \'hooks\' => $hooks,
));

/* if a prehook sets a field, do so here, but only if POST isnt submitted */
if (!empty($fi->preHooks->fields) && empty($_POST)) {
    $fs = $fi->preHooks->fields;
    /* better handling of checkbox values when input name is an array[] */
    foreach ($fs as $f => $v) {
        if (is_array($v)) { $v = implode(\',\',$v); }
        $fs[$f] = $v;
    }
    $modx->setPlaceholders($fs,$placeholderPrefix);
    /* assign new fields values */
    $fields = $fi->preHooks->fields;
}

/* if any errors in preHooks */
if (!empty($fi->preHooks->errors)) {
    $errors = array();
    foreach ($fi->preHooks->errors as $key => $error) {
        $errors[$key] = str_replace(\'[[+error]]\',$error,$errTpl);
    }
    $modx->toPlaceholders($errors,$placeholderPrefix.\'error\');

    $errorMsg = $fi->preHooks->getErrorMessage();
    if (!empty($errorMsg)) {
        $modx->setPlaceholder($placeholderPrefix.\'error_message\',$errorMsg);
    }
}

/* make sure appropriate POST occurred */
if (empty($_POST)) return \'\';
if (!empty($submitVar) && empty($_POST[$submitVar])) return \'\';

/* validate fields */
$fi->loadValidator();
if (empty($fields)) $fields = array();
$fields = array_merge($fields,$_POST);
if (!empty($_FILES)) { $fields = array_merge($fields,$_FILES); }
$fields = $fi->validator->validateFields($fields,$validate);

if (empty($fi->validator->errors)) {
    /* load posthooks */
    $fi->loadHooks(\'post\');
    $fi->postHooks->loadMultiple($hooks,$fields);

    /* process form */
    if (!empty($fi->postHooks->errors)) {
        $errors = array();
        foreach ($fi->postHooks->errors as $key => $error) {
            $errors[$key] = str_replace(\'[[+error]]\',$error,$errTpl);
        }
        $modx->toPlaceholders($errors,$placeholderPrefix.\'error\');

        $errorMsg = $fi->postHooks->getErrorMessage();
        $modx->setPlaceholder($placeholderPrefix.\'error_message\',$errorMsg);
    } else {
        /* assign new values from posthooks */
        $fields = $fi->postHooks->fields;

        /* if store is set for FormItRetriever, store fields here */
        if (!empty($store)) {
             /* default to store data for 5 minutes */
            $storeTime = $modx->getOption(\'storeTime\',$scriptProperties,300);
            /* create the hash to store */
            $cacheKey = $fi->getStoreKey();
            $modx->cacheManager->set($cacheKey,$fields,$storeTime);
        }
        
        /* if the redirect URL was set, redirect */
        if (!empty($fi->postHooks->redirectUrl)) {
            $modx->sendRedirect($fi->postHooks->redirectUrl);
        }

        /* set success placeholder */
        $modx->setPlaceholder($placeholderPrefix.\'success\',true);
        $successMsg = $modx->getOption(\'successMessage\',$scriptProperties,\'\');
        if (!empty($successMsg)) {
            $smPlaceholder = $modx->getOption(\'successMessagePlaceholder\',$scriptProperties,$placeholderPrefix.\'successMessage\');
            $modx->setPlaceholder($smPlaceholder,$successMsg);
        }
        /* if clearing fields on success, just end here */
        if ($modx->getOption(\'clearFieldsOnSuccess\',$scriptProperties,true)) {
            return \'\';
        }
    }

} else {
    $modx->toPlaceholders($fi->validator->errors,$placeholderPrefix.\'error\');
    $errs = array();
    foreach ($fi->validator->errorsRaw as $field => $err) {
        $err = $field.\': \'.$err;
        $errs[] = str_replace(\'[[+error]]\',$err,$validationErrorBulkTpl);
    }
    $errs = implode($validationErrorBulkSeparator,$errs);
    $validationErrorMessage = str_replace(\'[[+errors]]\',$errs,$validationErrorMessage);
    $modx->setPlaceholder($placeholderPrefix.\'validation_error\',true);
    $modx->setPlaceholder($placeholderPrefix.\'validation_error_message\',$validationErrorMessage);
}
/* better handling of checkbox values when input name is an array[] */
$fs = array();
foreach ($fields as $k => $v) {
    if (is_array($v) && !isset($_FILES[$k])) {
        $v = implode(\',\',$v);
    }
    /* str_replace to prevent showing of placeholders */
    $fs[$k] = str_replace(array(\'[\',\']\'),array(\'&#91;\',\'&#93;\'),$v);
}
$modx->setPlaceholders($fs,$placeholderPrefix);

return \'\';',
      'locked' => 0,
      'properties' => 'a:52:{s:5:"hooks";a:6:{s:4:"name";s:5:"hooks";s:4:"desc";s:22:"prop_formit.hooks_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:8:"preHooks";a:6:{s:4:"name";s:8:"preHooks";s:4:"desc";s:25:"prop_formit.prehooks_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:9:"submitVar";a:6:{s:4:"name";s:9:"submitVar";s:4:"desc";s:26:"prop_formit.submitvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:8:"validate";a:6:{s:4:"name";s:8:"validate";s:4:"desc";s:25:"prop_formit.validate_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:6:"errTpl";a:6:{s:4:"name";s:6:"errTpl";s:4:"desc";s:23:"prop_formit.errtpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:37:"<span class="error">[[+error]]</span>";s:7:"lexicon";s:17:"formit:properties";}s:22:"validationErrorMessage";a:6:{s:4:"name";s:22:"validationErrorMessage";s:4:"desc";s:39:"prop_formit.validationerrormessage_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:96:"<p class="error">A form validation error occurred. Please check the values you have entered.</p>";s:7:"lexicon";s:17:"formit:properties";}s:22:"validationErrorBulkTpl";a:6:{s:4:"name";s:22:"validationErrorBulkTpl";s:4:"desc";s:39:"prop_formit.validationerrorbulktpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:19:"<li>[[+error]]</li>";s:7:"lexicon";s:17:"formit:properties";}s:16:"customValidators";a:6:{s:4:"name";s:16:"customValidators";s:4:"desc";s:33:"prop_formit.customvalidators_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:20:"clearFieldsOnSuccess";a:6:{s:4:"name";s:20:"clearFieldsOnSuccess";s:4:"desc";s:37:"prop_formit.clearfieldsonsuccess_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:17:"formit:properties";}s:14:"successMessage";a:6:{s:4:"name";s:14:"successMessage";s:4:"desc";s:31:"prop_formit.successmessage_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:25:"successMessagePlaceholder";a:6:{s:4:"name";s:25:"successMessagePlaceholder";s:4:"desc";s:42:"prop_formit.successmessageplaceholder_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:17:"fi.successMessage";s:7:"lexicon";s:17:"formit:properties";}s:5:"store";a:6:{s:4:"name";s:5:"store";s:4:"desc";s:22:"prop_formit.store_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:17:"formit:properties";}s:17:"placeholderPrefix";a:6:{s:4:"name";s:17:"placeholderPrefix";s:4:"desc";s:34:"prop_formit.placeholderprefix_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"fi.";s:7:"lexicon";s:17:"formit:properties";}s:9:"storeTime";a:6:{s:4:"name";s:9:"storeTime";s:4:"desc";s:26:"prop_formit.storetime_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";i:300;s:7:"lexicon";s:17:"formit:properties";}s:15:"spamEmailFields";a:6:{s:4:"name";s:15:"spamEmailFields";s:4:"desc";s:32:"prop_formit.spamemailfields_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"email";s:7:"lexicon";s:17:"formit:properties";}s:11:"spamCheckIp";a:6:{s:4:"name";s:11:"spamCheckIp";s:4:"desc";s:28:"prop_formit.spamcheckip_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:17:"formit:properties";}s:11:"recaptchaJs";a:6:{s:4:"name";s:11:"recaptchaJs";s:4:"desc";s:28:"prop_formit.recaptchajs_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"{}";s:7:"lexicon";s:17:"formit:properties";}s:14:"recaptchaTheme";a:6:{s:4:"name";s:14:"recaptchaTheme";s:4:"desc";s:31:"prop_formit.recaptchatheme_desc";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:4:"text";s:14:"formit.opt_red";s:5:"value";s:3:"red";}i:1;a:2:{s:4:"text";s:16:"formit.opt_white";s:5:"value";s:5:"white";}i:2;a:2:{s:4:"text";s:16:"formit.opt_clean";s:5:"value";s:5:"clean";}i:3;a:2:{s:4:"text";s:21:"formit.opt_blackglass";s:5:"value";s:10:"blackglass";}}s:5:"value";s:5:"clean";s:7:"lexicon";s:17:"formit:properties";}s:10:"redirectTo";a:6:{s:4:"name";s:10:"redirectTo";s:4:"desc";s:27:"prop_formit.redirectto_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:14:"redirectParams";a:6:{s:4:"name";s:14:"redirectParams";s:4:"desc";s:31:"prop_formit.redirectparams_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:7:"emailTo";a:6:{s:4:"name";s:7:"emailTo";s:4:"desc";s:24:"prop_formit.emailto_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"emailToName";a:6:{s:4:"name";s:11:"emailToName";s:4:"desc";s:28:"prop_formit.emailtoname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:9:"emailFrom";a:6:{s:4:"name";s:9:"emailFrom";s:4:"desc";s:26:"prop_formit.emailfrom_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:13:"emailFromName";a:6:{s:4:"name";s:13:"emailFromName";s:4:"desc";s:30:"prop_formit.emailfromname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:12:"emailReplyTo";a:6:{s:4:"name";s:12:"emailReplyTo";s:4:"desc";s:29:"prop_formit.emailreplyto_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:16:"emailReplyToName";a:6:{s:4:"name";s:16:"emailReplyToName";s:4:"desc";s:33:"prop_formit.emailreplytoname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:7:"emailCC";a:6:{s:4:"name";s:7:"emailCC";s:4:"desc";s:24:"prop_formit.emailcc_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"emailCCName";a:6:{s:4:"name";s:11:"emailCCName";s:4:"desc";s:28:"prop_formit.emailccname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:8:"emailBCC";a:6:{s:4:"name";s:8:"emailBCC";s:4:"desc";s:25:"prop_formit.emailbcc_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:12:"emailBCCName";a:6:{s:4:"name";s:12:"emailBCCName";s:4:"desc";s:29:"prop_formit.emailbccname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:12:"emailSubject";a:6:{s:4:"name";s:12:"emailSubject";s:4:"desc";s:29:"prop_formit.emailsubject_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:23:"emailUseFieldForSubject";a:6:{s:4:"name";s:23:"emailUseFieldForSubject";s:4:"desc";s:40:"prop_formit.emailusefieldforsubject_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:9:"emailHtml";a:6:{s:4:"name";s:9:"emailHtml";s:4:"desc";s:26:"prop_formit.emailhtml_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:17:"formit:properties";}s:20:"emailConvertNewlines";a:6:{s:4:"name";s:20:"emailConvertNewlines";s:4:"desc";s:37:"prop_formit.emailconvertnewlines_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:17:"formit:properties";}s:7:"fiarTpl";a:6:{s:4:"name";s:7:"fiarTpl";s:4:"desc";s:22:"prop_fiar.fiartpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"fiarToField";a:6:{s:4:"name";s:11:"fiarToField";s:4:"desc";s:26:"prop_fiar.fiartofield_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"email";s:7:"lexicon";s:17:"formit:properties";}s:11:"fiarSubject";a:6:{s:4:"name";s:11:"fiarSubject";s:4:"desc";s:26:"prop_fiar.fiarsubject_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:30:"[[++site_name]] Auto-Responder";s:7:"lexicon";s:17:"formit:properties";}s:8:"fiarFrom";a:6:{s:4:"name";s:8:"fiarFrom";s:4:"desc";s:23:"prop_fiar.fiarfrom_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:12:"fiarFromName";a:6:{s:4:"name";s:12:"fiarFromName";s:4:"desc";s:27:"prop_fiar.fiarfromname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"fiarReplyTo";a:6:{s:4:"name";s:11:"fiarReplyTo";s:4:"desc";s:26:"prop_fiar.fiarreplyto_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:15:"fiarReplyToName";a:6:{s:4:"name";s:15:"fiarReplyToName";s:4:"desc";s:30:"prop_fiar.fiarreplytoname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:6:"fiarCC";a:6:{s:4:"name";s:6:"fiarCC";s:4:"desc";s:21:"prop_fiar.fiarcc_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:10:"fiarCCName";a:6:{s:4:"name";s:10:"fiarCCName";s:4:"desc";s:25:"prop_fiar.fiarccname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:7:"fiarBCC";a:6:{s:4:"name";s:7:"fiarBCC";s:4:"desc";s:22:"prop_fiar.fiarbcc_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"fiarBCCName";a:6:{s:4:"name";s:11:"fiarBCCName";s:4:"desc";s:26:"prop_fiar.fiarbccname_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:8:"fiarHtml";a:6:{s:4:"name";s:8:"fiarHtml";s:4:"desc";s:23:"prop_fiar.fiarhtml_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:17:"formit:properties";}s:12:"mathMinRange";a:6:{s:4:"name";s:12:"mathMinRange";s:4:"desc";s:27:"prop_math.mathminrange_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";i:10;s:7:"lexicon";s:17:"formit:properties";}s:12:"mathMaxRange";a:6:{s:4:"name";s:12:"mathMaxRange";s:4:"desc";s:27:"prop_math.mathmaxrange_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";i:100;s:7:"lexicon";s:17:"formit:properties";}s:9:"mathField";a:6:{s:4:"name";s:9:"mathField";s:4:"desc";s:24:"prop_math.mathfield_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"math";s:7:"lexicon";s:17:"formit:properties";}s:12:"mathOp1Field";a:6:{s:4:"name";s:12:"mathOp1Field";s:4:"desc";s:27:"prop_math.mathop1field_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"op1";s:7:"lexicon";s:17:"formit:properties";}s:12:"mathOp2Field";a:6:{s:4:"name";s:12:"mathOp2Field";s:4:"desc";s:27:"prop_math.mathop2field_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"op2";s:7:"lexicon";s:17:"formit:properties";}s:17:"mathOperatorField";a:6:{s:4:"name";s:17:"mathOperatorField";s:4:"desc";s:32:"prop_math.mathoperatorfield_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"operator";s:7:"lexicon";s:17:"formit:properties";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * FormIt
 *
 * A dynamic form processing Snippet for MODx Revolution 2.0.
 *
 * @package formit
 */
/* load FormIt classes */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\').\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);
$fi->initialize($modx->context->get(\'key\'));

/* get default properties */
$submitVar = $modx->getOption(\'submitVar\',$scriptProperties,false);
$hooks = $modx->getOption(\'hooks\',$scriptProperties,\'\');
$preHooks = $modx->getOption(\'preHooks\',$scriptProperties,\'\');
$errTpl = $modx->getOption(\'errTpl\',$scriptProperties,\'<span class="error">[[+error]]</span>\');
$validationErrorMessage = $modx->getOption(\'validationErrorMessage\',$scriptProperties,\'<p class="error">A form validation error occurred. Please check the values you have entered.</p>\');
$validationErrorBulkTpl = $modx->getOption(\'validationErrorBulkTpl\',$scriptProperties,\'<li>[[+error]]</li>\');
$validationErrorBulkSeparator = $modx->getOption(\'validationErrorBulkSeparator\',$scriptProperties,"\\n");
$store = $modx->getOption(\'store\',$scriptProperties,false);
$validate = $modx->getOption(\'validate\',$scriptProperties,\'\');
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'fi.\');

/* if using recaptcha, load recaptcha html */
if (strpos($hooks,\'recaptcha\') !== false) {
    $fi->loadReCaptcha($scriptProperties);
    if (!empty($fi->recaptcha) && $fi->recaptcha instanceof FormItReCaptcha) {
        $html = $fi->recaptcha->getHtml($scriptProperties);
        $modx->setPlaceholder(\'formit.recaptcha_html\',$html);
    } else {
        $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] \'.$modx->lexicon(\'formit.recaptcha_err_load\'));
    }
}

/* if using math hook, load default placeholders */
if (strpos($hooks,\'math\') !== false && empty($_POST)) {
    $mathMaxRange = $modx->getOption(\'mathMaxRange\',$scriptProperties,100);
    $mathMinRange = $modx->getOption(\'mathMinRange\',$scriptProperties,10);
    $op1 = rand($mathMinRange,$mathMaxRange);
    $op2 = rand($mathMinRange,$mathMaxRange);
    if ($op2 > $op1) { $t = $op2; $op2 = $op1; $op1 = $t; } /* swap so we always get positive #s */
    /* prevent numbers from being equal */
    if ($op2 == $op1) {
        while ($op2 == $op1) {
            $op2 = rand($mathMinRange,$mathMaxRange);
        }
    }
    $operators = array(\'+\',\'-\');
    $operator = rand(0,1);
    $modx->setPlaceholders(array(
        $modx->getOption(\'mathOp1Field\',$scriptProperties,\'op1\') => $op1,
        $modx->getOption(\'mathOp2Field\',$scriptProperties,\'op2\') => $op2,
        $modx->getOption(\'mathOperatorField\',$scriptProperties,\'operator\') => $operators[$operator],
    ),$placeholderPrefix);
}

/* load preHooks */
$fi->loadHooks(\'pre\');
$fi->preHooks->loadMultiple($preHooks,array(),array(
    \'submitVar\' => $submitVar,
    \'hooks\' => $hooks,
));

/* if a prehook sets a field, do so here, but only if POST isnt submitted */
if (!empty($fi->preHooks->fields) && empty($_POST)) {
    $fs = $fi->preHooks->fields;
    /* better handling of checkbox values when input name is an array[] */
    foreach ($fs as $f => $v) {
        if (is_array($v)) { $v = implode(\',\',$v); }
        $fs[$f] = $v;
    }
    $modx->setPlaceholders($fs,$placeholderPrefix);
    /* assign new fields values */
    $fields = $fi->preHooks->fields;
}

/* if any errors in preHooks */
if (!empty($fi->preHooks->errors)) {
    $errors = array();
    foreach ($fi->preHooks->errors as $key => $error) {
        $errors[$key] = str_replace(\'[[+error]]\',$error,$errTpl);
    }
    $modx->toPlaceholders($errors,$placeholderPrefix.\'error\');

    $errorMsg = $fi->preHooks->getErrorMessage();
    if (!empty($errorMsg)) {
        $modx->setPlaceholder($placeholderPrefix.\'error_message\',$errorMsg);
    }
}

/* make sure appropriate POST occurred */
if (empty($_POST)) return \'\';
if (!empty($submitVar) && empty($_POST[$submitVar])) return \'\';

/* validate fields */
$fi->loadValidator();
if (empty($fields)) $fields = array();
$fields = array_merge($fields,$_POST);
if (!empty($_FILES)) { $fields = array_merge($fields,$_FILES); }
$fields = $fi->validator->validateFields($fields,$validate);

if (empty($fi->validator->errors)) {
    /* load posthooks */
    $fi->loadHooks(\'post\');
    $fi->postHooks->loadMultiple($hooks,$fields);

    /* process form */
    if (!empty($fi->postHooks->errors)) {
        $errors = array();
        foreach ($fi->postHooks->errors as $key => $error) {
            $errors[$key] = str_replace(\'[[+error]]\',$error,$errTpl);
        }
        $modx->toPlaceholders($errors,$placeholderPrefix.\'error\');

        $errorMsg = $fi->postHooks->getErrorMessage();
        $modx->setPlaceholder($placeholderPrefix.\'error_message\',$errorMsg);
    } else {
        /* assign new values from posthooks */
        $fields = $fi->postHooks->fields;

        /* if store is set for FormItRetriever, store fields here */
        if (!empty($store)) {
             /* default to store data for 5 minutes */
            $storeTime = $modx->getOption(\'storeTime\',$scriptProperties,300);
            /* create the hash to store */
            $cacheKey = $fi->getStoreKey();
            $modx->cacheManager->set($cacheKey,$fields,$storeTime);
        }
        
        /* if the redirect URL was set, redirect */
        if (!empty($fi->postHooks->redirectUrl)) {
            $modx->sendRedirect($fi->postHooks->redirectUrl);
        }

        /* set success placeholder */
        $modx->setPlaceholder($placeholderPrefix.\'success\',true);
        $successMsg = $modx->getOption(\'successMessage\',$scriptProperties,\'\');
        if (!empty($successMsg)) {
            $smPlaceholder = $modx->getOption(\'successMessagePlaceholder\',$scriptProperties,$placeholderPrefix.\'successMessage\');
            $modx->setPlaceholder($smPlaceholder,$successMsg);
        }
        /* if clearing fields on success, just end here */
        if ($modx->getOption(\'clearFieldsOnSuccess\',$scriptProperties,true)) {
            return \'\';
        }
    }

} else {
    $modx->toPlaceholders($fi->validator->errors,$placeholderPrefix.\'error\');
    $errs = array();
    foreach ($fi->validator->errorsRaw as $field => $err) {
        $err = $field.\': \'.$err;
        $errs[] = str_replace(\'[[+error]]\',$err,$validationErrorBulkTpl);
    }
    $errs = implode($validationErrorBulkSeparator,$errs);
    $validationErrorMessage = str_replace(\'[[+errors]]\',$errs,$validationErrorMessage);
    $modx->setPlaceholder($placeholderPrefix.\'validation_error\',true);
    $modx->setPlaceholder($placeholderPrefix.\'validation_error_message\',$validationErrorMessage);
}
/* better handling of checkbox values when input name is an array[] */
$fs = array();
foreach ($fields as $k => $v) {
    if (is_array($v) && !isset($_FILES[$k])) {
        $v = implode(\',\',$v);
    }
    /* str_replace to prevent showing of placeholders */
    $fs[$k] = str_replace(array(\'[\',\']\'),array(\'&#91;\',\'&#93;\'),$v);
}
$modx->setPlaceholders($fs,$placeholderPrefix);

return \'\';',
    ),
  ),
  '7e76c00929dc13c728bc43cc7629356b' => 
  array (
    'criteria' => 
    array (
      'name' => 'FormItAutoResponder',
    ),
    'object' => 
    array (
      'id' => 6,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FormItAutoResponder',
      'description' => 'Custom hook for FormIt to handle Auto-Response emails.',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * A custom hook for auto-responders.
 * 
 * @package formit
 */
/* setup default properties */
$tpl = $modx->getOption(\'fiarTpl\',$scriptProperties,\'fiarTpl\');
$mailFrom = $modx->getOption(\'fiarFrom\',$scriptProperties,$modx->getOption(\'emailsender\'));
$mailFromName = $modx->getOption(\'fiarFromName\',$scriptProperties,$modx->getOption(\'site_name\'));
$mailSender = $modx->getOption(\'fiarSender\',$scriptProperties,$modx->getOption(\'emailsender\'));
$mailSubject = $modx->getOption(\'fiarSubject\',$scriptProperties,\'[[++site_name]] Auto-Responder\');
$mailSubject = str_replace(array(\'[[++site_name]]\',\'[[++emailsender]]\'),array($modx->getOption(\'site_name\'),$modx->getOption(\'emailsender\')),$mailSubject);
$mailReplyTo = $modx->getOption(\'fiarReplyTo\',$scriptProperties,$mailFrom);
$isHtml = $modx->getOption(\'fiarHtml\',$scriptProperties,true);
$toField = $modx->getOption(\'fiarToField\',$scriptProperties,\'email\');
if (empty($fields[$toField])) {
    $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] Auto-responder could not find field `\'.$toField.\'` in form submission.\');
    return false;
}

/* setup placeholders */
$placeholders = $fields;
$mailTo= $fields[$toField];

$message = $formit->getChunk($tpl,$placeholders);

$modx->getService(\'mail\', \'mail.modPHPMailer\');
$modx->mail->reset();
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,$hook->_process($mailFrom,$placeholders));
$modx->mail->set(modMail::MAIL_FROM_NAME,$hook->_process($mailFromName,$placeholders));
$modx->mail->set(modMail::MAIL_SENDER,$hook->_process($mailSender,$placeholders));
$modx->mail->set(modMail::MAIL_SUBJECT,$hook->_process($mailSubject,$placeholders));
$modx->mail->address(\'to\',$mailTo);
$modx->mail->setHTML($isHtml);

/* reply to */
$emailReplyTo = $modx->getOption(\'fiarReplyTo\',$scriptProperties,$mailFrom);
$emailReplyTo = $hook->_process($emailReplyTo,$fields);
$emailReplyToName = $modx->getOption(\'fiarReplyToName\',$scriptProperties,$mailFromName);
$emailReplyToName = $hook->_process($emailReplyToName,$fields);
$modx->mail->address(\'reply-to\',$emailReplyTo,$emailReplyToName);

/* cc */
$emailCC = $modx->getOption(\'fiarCC\',$scriptProperties,\'\');
if (!empty($emailCC)) {
    $emailCCName = $modx->getOption(\'fiarCCName\',$scriptProperties,\'\');
    $emailCC = explode(\',\',$emailCC);
    $emailCCName = explode(\',\',$emailCCName);
    $numAddresses = count($emailCC);
    for ($i=0;$i<$numAddresses;$i++) {
        $etn = !empty($emailCCName[$i]) ? $emailCCName[$i] : \'\';
        if (!empty($etn)) $etn = $hook->_process($etn,$fields);
        $emailCC[$i] = $hook->_process($emailCC[$i],$fields);
        $modx->mail->address(\'cc\',$emailCC[$i],$etn);
    }
}

/* bcc */
$emailBCC = $modx->getOption(\'fiarBCC\',$scriptProperties,\'\');
if (!empty($emailBCC)) {
    $emailBCCName = $modx->getOption(\'fiarBCCName\',$scriptProperties,\'\');
    $emailBCC = explode(\',\',$emailBCC);
    $emailBCCName = explode(\',\',$emailBCCName);
    $numAddresses = count($emailBCC);
    for ($i=0;$i<$numAddresses;$i++) {
        $etn = !empty($emailBCCName[$i]) ? $emailBCCName[$i] : \'\';
        if (!empty($etn)) $etn = $hook->_process($etn,$fields);
        $emailBCC[$i] = $hook->_process($emailBCC[$i],$fields);
        $modx->mail->address(\'bcc\',$emailBCC[$i],$etn);
    }
}

if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] An error occurred while trying to send the auto-responder email: \'.$modx->mail->mailer->ErrorInfo);
    return false;
}
$modx->mail->reset();
return true;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * A custom hook for auto-responders.
 * 
 * @package formit
 */
/* setup default properties */
$tpl = $modx->getOption(\'fiarTpl\',$scriptProperties,\'fiarTpl\');
$mailFrom = $modx->getOption(\'fiarFrom\',$scriptProperties,$modx->getOption(\'emailsender\'));
$mailFromName = $modx->getOption(\'fiarFromName\',$scriptProperties,$modx->getOption(\'site_name\'));
$mailSender = $modx->getOption(\'fiarSender\',$scriptProperties,$modx->getOption(\'emailsender\'));
$mailSubject = $modx->getOption(\'fiarSubject\',$scriptProperties,\'[[++site_name]] Auto-Responder\');
$mailSubject = str_replace(array(\'[[++site_name]]\',\'[[++emailsender]]\'),array($modx->getOption(\'site_name\'),$modx->getOption(\'emailsender\')),$mailSubject);
$mailReplyTo = $modx->getOption(\'fiarReplyTo\',$scriptProperties,$mailFrom);
$isHtml = $modx->getOption(\'fiarHtml\',$scriptProperties,true);
$toField = $modx->getOption(\'fiarToField\',$scriptProperties,\'email\');
if (empty($fields[$toField])) {
    $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] Auto-responder could not find field `\'.$toField.\'` in form submission.\');
    return false;
}

/* setup placeholders */
$placeholders = $fields;
$mailTo= $fields[$toField];

$message = $formit->getChunk($tpl,$placeholders);

$modx->getService(\'mail\', \'mail.modPHPMailer\');
$modx->mail->reset();
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,$hook->_process($mailFrom,$placeholders));
$modx->mail->set(modMail::MAIL_FROM_NAME,$hook->_process($mailFromName,$placeholders));
$modx->mail->set(modMail::MAIL_SENDER,$hook->_process($mailSender,$placeholders));
$modx->mail->set(modMail::MAIL_SUBJECT,$hook->_process($mailSubject,$placeholders));
$modx->mail->address(\'to\',$mailTo);
$modx->mail->setHTML($isHtml);

/* reply to */
$emailReplyTo = $modx->getOption(\'fiarReplyTo\',$scriptProperties,$mailFrom);
$emailReplyTo = $hook->_process($emailReplyTo,$fields);
$emailReplyToName = $modx->getOption(\'fiarReplyToName\',$scriptProperties,$mailFromName);
$emailReplyToName = $hook->_process($emailReplyToName,$fields);
$modx->mail->address(\'reply-to\',$emailReplyTo,$emailReplyToName);

/* cc */
$emailCC = $modx->getOption(\'fiarCC\',$scriptProperties,\'\');
if (!empty($emailCC)) {
    $emailCCName = $modx->getOption(\'fiarCCName\',$scriptProperties,\'\');
    $emailCC = explode(\',\',$emailCC);
    $emailCCName = explode(\',\',$emailCCName);
    $numAddresses = count($emailCC);
    for ($i=0;$i<$numAddresses;$i++) {
        $etn = !empty($emailCCName[$i]) ? $emailCCName[$i] : \'\';
        if (!empty($etn)) $etn = $hook->_process($etn,$fields);
        $emailCC[$i] = $hook->_process($emailCC[$i],$fields);
        $modx->mail->address(\'cc\',$emailCC[$i],$etn);
    }
}

/* bcc */
$emailBCC = $modx->getOption(\'fiarBCC\',$scriptProperties,\'\');
if (!empty($emailBCC)) {
    $emailBCCName = $modx->getOption(\'fiarBCCName\',$scriptProperties,\'\');
    $emailBCC = explode(\',\',$emailBCC);
    $emailBCCName = explode(\',\',$emailBCCName);
    $numAddresses = count($emailBCC);
    for ($i=0;$i<$numAddresses;$i++) {
        $etn = !empty($emailBCCName[$i]) ? $emailBCCName[$i] : \'\';
        if (!empty($etn)) $etn = $hook->_process($etn,$fields);
        $emailBCC[$i] = $hook->_process($emailBCC[$i],$fields);
        $modx->mail->address(\'bcc\',$emailBCC[$i],$etn);
    }
}

if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,\'[FormIt] An error occurred while trying to send the auto-responder email: \'.$modx->mail->mailer->ErrorInfo);
    return false;
}
$modx->mail->reset();
return true;',
    ),
  ),
  '4c51efefd730d5ae31d97d42230c77dc' => 
  array (
    'criteria' => 
    array (
      'name' => 'FormItRetriever',
    ),
    'object' => 
    array (
      'id' => 7,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FormItRetriever',
      'description' => 'Fetches a form submission for a user for displaying on a thank you page.',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * Retrieves a prior form submission that was stored with the &store property
 * in a FormIt call.
 * 
 * @package formit
 */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\').\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);

/* setup properties */
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'fi.\');
$eraseOnLoad = $modx->getOption(\'eraseOnLoad\',$scriptProperties,false);
$redirecToOnNotFound = $modx->getOption(\'redirectToOnNotFound\',$scriptProperties,false);

/* fetch data from cache and set to placeholders */
$cacheKey = $fi->getStoreKey();
$data = $modx->cacheManager->get($cacheKey);
if (!empty($data)) {
    /* set data to placeholders */
    $modx->setPlaceholders($data,$placeholderPrefix);
    
    /* if set, erase the data on load, otherwise depend on cache expiry time */
    if ($eraseOnLoad) {
        $modx->cacheManager->delete($cacheKey);
    }
/* if the data\'s not found, and we want to redirect somewhere if so, do here */
} else if (!empty($redirecToOnNotFound)) {
    $url = $modx->makeUrl($redirecToOnNotFound);
    $modx->sendRedirect($url);
}
return \'\';',
      'locked' => 0,
      'properties' => 'a:3:{s:17:"placeholderPrefix";a:6:{s:4:"name";s:17:"placeholderPrefix";s:4:"desc";s:31:"prop_fir.placeholderprefix_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"fi.";s:7:"lexicon";s:17:"formit:properties";}s:20:"redirectToOnNotFound";a:6:{s:4:"name";s:20:"redirectToOnNotFound";s:4:"desc";s:34:"prop_fir.redirecttoonnotfound_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:17:"formit:properties";}s:11:"eraseOnLoad";a:6:{s:4:"name";s:11:"eraseOnLoad";s:4:"desc";s:25:"prop_fir.eraseonload_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:17:"formit:properties";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * FormIt
 *
 * Copyright 2009-2011 by Shaun McCormick <shaun@modx.com>
 *
 * FormIt is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FormIt is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FormIt; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package formit
 */
/**
 * Retrieves a prior form submission that was stored with the &store property
 * in a FormIt call.
 * 
 * @package formit
 */
require_once $modx->getOption(\'formit.core_path\',null,$modx->getOption(\'core_path\').\'components/formit/\').\'model/formit/formit.class.php\';
$fi = new FormIt($modx,$scriptProperties);

/* setup properties */
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'fi.\');
$eraseOnLoad = $modx->getOption(\'eraseOnLoad\',$scriptProperties,false);
$redirecToOnNotFound = $modx->getOption(\'redirectToOnNotFound\',$scriptProperties,false);

/* fetch data from cache and set to placeholders */
$cacheKey = $fi->getStoreKey();
$data = $modx->cacheManager->get($cacheKey);
if (!empty($data)) {
    /* set data to placeholders */
    $modx->setPlaceholders($data,$placeholderPrefix);
    
    /* if set, erase the data on load, otherwise depend on cache expiry time */
    if ($eraseOnLoad) {
        $modx->cacheManager->delete($cacheKey);
    }
/* if the data\'s not found, and we want to redirect somewhere if so, do here */
} else if (!empty($redirecToOnNotFound)) {
    $url = $modx->makeUrl($redirecToOnNotFound);
    $modx->sendRedirect($url);
}
return \'\';',
    ),
  ),
  'a703ab768a454c07655736afd1d78341' => 
  array (
    'criteria' => 
    array (
      'name' => 'FormItIsChecked',
    ),
    'object' => 
    array (
      'id' => 8,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FormItIsChecked',
      'description' => 'A custom output filter used with checkboxes/radios for checking checked status.',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * Custom output filter that returns checked="checked" if the value is set
 *
 * @package formit
 */
$output = \' \';
if ($input == $options) {
    $output = \' checked="checked"\';
}
if (strpos($input,\',\') !== false) {
    $input = explode(\',\',$input);
    if (in_array($options,$input)) {
        $output = \' checked="checked"\';
    }
}
return $output;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Custom output filter that returns checked="checked" if the value is set
 *
 * @package formit
 */
$output = \' \';
if ($input == $options) {
    $output = \' checked="checked"\';
}
if (strpos($input,\',\') !== false) {
    $input = explode(\',\',$input);
    if (in_array($options,$input)) {
        $output = \' checked="checked"\';
    }
}
return $output;',
    ),
  ),
  '731f80b879a0e9c1425950fcca3d7265' => 
  array (
    'criteria' => 
    array (
      'name' => 'FormItIsSelected',
    ),
    'object' => 
    array (
      'id' => 9,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FormItIsSelected',
      'description' => 'A custom output filter used with dropdowns for checking selected status.',
      'editor_type' => 0,
      'category' => 4,
      'cache_type' => 0,
      'snippet' => '/**
 * Custom output filter that returns checked="checked" if the value is set
 *
 * @package formit
 */
$output = \' \';
if ($input == $options) {
    $output = \' selected="selected"\';
}
if (strpos($input,\',\') !== false) {
    $input = explode(\',\',$input);
    if (in_array($options,$input)) {
        $output = \' selected="selected"\';
    }
}
return $output;',
      'locked' => 0,
      'properties' => NULL,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Custom output filter that returns checked="checked" if the value is set
 *
 * @package formit
 */
$output = \' \';
if ($input == $options) {
    $output = \' selected="selected"\';
}
if (strpos($input,\',\') !== false) {
    $input = explode(\',\',$input);
    if (in_array($options,$input)) {
        $output = \' selected="selected"\';
    }
}
return $output;',
    ),
  ),
  '60b7f615012d7affd7c54e85fd73731c' => 
  array (
    'criteria' => 
    array (
      'key' => 'formit.recaptcha_public_key',
    ),
    'object' => 
    array (
      'key' => 'formit.recaptcha_public_key',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'formit',
      'area' => 'reCaptcha',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '6293c073a8176f5273fc056dd22e8718' => 
  array (
    'criteria' => 
    array (
      'key' => 'formit.recaptcha_private_key',
    ),
    'object' => 
    array (
      'key' => 'formit.recaptcha_private_key',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'formit',
      'area' => 'reCaptcha',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
  '896d4baed43f3f488a389baae70d7323' => 
  array (
    'criteria' => 
    array (
      'key' => 'formit.recaptcha_use_ssl',
    ),
    'object' => 
    array (
      'key' => 'formit.recaptcha_use_ssl',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'formit',
      'area' => 'reCaptcha',
      'editedon' => '0000-00-00 00:00:00',
    ),
  ),
);