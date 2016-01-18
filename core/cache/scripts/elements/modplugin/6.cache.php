<?php  return 'if($modx->context->get(\'key\') != "mgr"){
    /* grab the current langauge from the cultureKey request var */
    switch ($_REQUEST[\'cultureKey\']) {
        case \'en\':
            /* switch the context */
            $modx->switchContext(\'en\');
            $modx->setOption(\'cultureKey\', \'en\');
            break;
        case \'de\':
            /* switch the context */
            $modx->switchContext(\'de\');
            $modx->setOption(\'cultureKey\', \'de\');
            break;
        default:
            /* Set the default context here */
            $modx->switchContext(\'web\');
            $modx->setOption(\'cultureKey\', \'nl\');
            break;
    }
    /* unset GET var to avoid
     * appending cultureKey=xy to URLs by other components */
    unset($_GET[\'cultureKey\']);
}
return;
';