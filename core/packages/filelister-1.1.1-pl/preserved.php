<?php return array (
  '91b521d2c21ef7d52c3807262f48b85b' => 
  array (
    'criteria' => 
    array (
      'name' => 'filelister',
    ),
    'object' => 
    array (
      'name' => 'filelister',
      'path' => '{core_path}components/filelister/',
      'assets_path' => NULL,
    ),
  ),
  'b3398d6b8c8e8a7fdb0ed758177b29a1' => 
  array (
    'criteria' => 
    array (
      'category' => 'FileLister',
    ),
    'object' => 
    array (
      'id' => 3,
      'parent' => 0,
      'category' => 'FileLister',
      'rank' => 0,
    ),
    'files' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/core/components',
    ),
  ),
  'e0cc689f1a46fb482b53125534cc7284' => 
  array (
    'criteria' => 
    array (
      'name' => 'FileLister',
    ),
    'object' => 
    array (
      'id' => 4,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FileLister',
      'description' => 'A file listing snippet.',
      'editor_type' => 0,
      'category' => 3,
      'cache_type' => 0,
      'snippet' => '/**
 * FileLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of FileLister, a file listing Extra.
 *
 * FileLister is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * FileLister is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FileLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package filelister
 */
/**
 * File listing snippet
 * 
 * @package filelister
 */
$filelister = $modx->getService(\'filelister\',\'FileLister\',$modx->getOption(\'filelister.core_path\',null,$modx->getOption(\'core_path\').\'components/filelister/\').\'model/filelister/\',$scriptProperties);
if (!($filelister instanceof FileLister)) return \'\';

/* get path */
$path = $modx->getOption(\'path\',$scriptProperties,false);
$filelister->sanitize($path);
if (empty($path) || !is_dir($path)) return \'\';

/* setup default properties */
$fileTpl = $modx->getOption(\'fileTpl\',$scriptProperties,\'feoFile\');
$fileLinkTpl = $modx->getOption(\'fileLinkTpl\',$scriptProperties,\'feoFileLink\');
$directoryTpl = $modx->getOption(\'directoryTpl\',$scriptProperties,\'feoDirectory\');
$dateFormat = $modx->getOption(\'dateFormat\',$scriptProperties,\'%b %d, %Y\');
$skipDirs = $modx->getOption(\'skipDirs\',$scriptProperties,\'.svn,.git,.metadata,.tmp,.DS_Store,_notes\');
$skipDirs = array_merge(array(\'.\',\'..\'),explode(\',\',$skipDirs));
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'filelister\');
$pathSeparator = $modx->getOption(\'pathSeparator\',$scriptProperties,\'/\');
$pathTpl = $modx->getOption(\'pathTpl\',$scriptProperties,\'feoPathLink\');
$navKey = $modx->getOption(\'navKey\',$scriptProperties,\'fd\');
$showFiles = (boolean)$modx->getOption(\'showFiles\',$scriptProperties,true);
$showDirectories = (boolean)$modx->getOption(\'showDirectories\',$scriptProperties,true);
$showExt = $modx->getOption(\'showExt\',$scriptProperties,\'\');
if (!empty($showExt)) $showExt = explode(\',\',$showExt);
$showDownloads = (boolean)$modx->getOption(\'showDownloads\',$scriptProperties,true);
$uniqueDownloads = (boolean)$modx->getOption(\'uniqueDownloads\',$scriptProperties,true);
$useGeolocation = (boolean)$modx->getOption(\'useGeolocation\',$scriptProperties,true);
$limit = (int)$modx->getOption(\'limit\',$scriptProperties,0);
$cls = $modx->getOption(\'cls\',$scriptProperties,\'feo-row\');
$altCls = $modx->getOption(\'altCls\',$scriptProperties,\'feo-alt-row\');
$firstCls = $modx->getOption(\'firstCls\',$scriptProperties,\'feo-first-row\');
$lastCls = $modx->getOption(\'lastCls\',$scriptProperties,\'feo-last-row\');

/* get relPath and curPath */
$fd = $modx->getOption($navKey,$_REQUEST,false);
$relPath = \'\';
if ($fd) {
    $relPath = $filelister->parseKey($fd);
    if ($relPath == \'.\') $relPath = \'\';
}
$curPath = $filelister->sanitize($path.$relPath);

/* if pointing to file, output file */
if (!is_dir($curPath) && is_file($curPath)) {
    /* do download tracking and geolocation */
    $tenMinAgo = time() - (60 * 5); /* prevent duplicate download tracking */
    $tenMinAgo = strftime(\'%Y-%m-%d %H:%M:%S\',$tenMinAgo);
    $double = $modx->getCount(\'feoDownload\',array(
        \'path\' => $curPath,
        \'ip\' => $_SERVER[\'REMOTE_ADDR\'],
        \'downloadedon:>\' => $tenMinAgo,
    ));
    if ($double <= 0) {
        $unique = $modx->getCount(\'feoDownload\',array(
            \'path\' => $curPath,
            \'ip\' => $_SERVER[\'REMOTE_ADDR\'],
        ));

        $dl = $modx->newObject(\'feoDownload\');
        $dl->set(\'path\',$curPath);
        $dl->set(\'ip\',$_SERVER[\'REMOTE_ADDR\']);
        $dl->set(\'downloadedon\',strftime(\'%Y-%m-%d %H:%M:%S\'));
        $dl->set(\'unique\',$unique > 0 ? false : true);
        $dl->set(\'referer\',$_SERVER[\'HTTP_REFERER\']);

        $geoApiKey = $modx->getOption(\'filelister.ipinfodb_api_key\',$scriptProperties,\'\');
        if ($useGeolocation && !empty($geoApiKey)) {
            $modx->loadClass(\'geolocation.ipinfodb\',$filelister->config[\'modelPath\'],true,true);
            $geo = new ipinfodb($modx);
            $geo->setKey($geoApiKey);
            $locations = $geo->getGeoLocation($_SERVER[\'REMOTE_ADDR\']);
            $geolocation = array();
            if (!empty($locations[0]) && is_array($locations[0])) {
                $gl = $locations[0];
                $dl->set(\'geolocation\',$gl);
                $dl->set(\'country\',$gl[\'CountryCode\']);
                $dl->set(\'region\',$gl[\'RegionName\']);
                $dl->set(\'city\',$gl[\'City\']);
                $dl->set(\'zip\',$gl[\'ZipPostalCode\']);
            }
            if ($modx->user->hasSessionContext($modx->context->get(\'key\'))) {
                $dl->set(\'user\',$modx->user->get(\'id\'));
            }
            $dl->save();
        }

    }


    $filelister->loadHeaders($curPath);
    $o = file_get_contents($curPath);
    echo $o;
    die();
} elseif (!is_dir($curPath)) {
    /* if an invalid path, set to base */
    $curPath = $path;
}

/* check download access */
$allowDownloadGroups = $modx->getOption(\'allowDownloadGroups\',$scriptProperties,\'\');
if (!empty($allowDownloadGroups)) $allowDownloadGroups = explode(\',\',$allowDownloadGroups);

$canDownload = $modx->getOption(\'allowDownload\',$scriptProperties,true);
if ($modx->getOption(\'requireAuthDownload\',$scriptProperties,false)) {
    $requireAuthContext = $modx->getOption(\'requireAuthContext\',$scriptProperties,$modx->context->get(\'key\'));
    $canDownload = $modx->user->hasSessionContext($requireAuthContext);
}
if (!empty($allowDownloadGroups)) {
    $canDownload = $modx->user->isMember($allowDownloadGroups);
}
unset($requireAuthContext,$allowDownloadGroups);

/* iterate list of files/dirs */
$count = 0;
$directoryCount = 0;
$fileCount = 0;
$totalDownloads = 0;
$directories = array();
$files = array();
foreach (new DirectoryIterator($curPath) as $file) {
    if (in_array($file,$skipDirs)) continue;
    if (!$file->isReadable()) continue;

    /* make the key that is used for navigation */
    $filePath = $file->getPathname();
    $filePath = $relPath.(!empty($relPath) ? \'/\' : \'\').$file->getFilename();
    $key = $filelister->makeKey($filePath);

    $fileArray = array();
    $fileArray[\'filename\'] = $file->getFilename();
    $fileArray[\'bytesize\'] = $file->getSize();
    $fileArray[\'filesize\'] = $filelister->formatBytes($file->getSize());
    $fileArray[\'path\'] = $file->getPathname();
    $fileArray[\'relativePath\'] = $filePath;
    $fileArray[\'navKey\'] = $navKey;
    $fileArray[\'showDownloads\'] = $showDownloads;

    /* if allowing for downloading, generate a link here */
    if ($file->isDir() || $canDownload) {
        $fileArray[\'link\'] = $filelister->getChunk($fileLinkTpl,array(
            \'url\' => $modx->makeUrl($modx->resource->get(\'id\'),\'\',array(
                $navKey => $key,
            )),
            \'filename\' => $fileArray[\'filename\'],
        ));
    } else {
        $fileArray[\'link\'] = $fileArray[\'filename\'];
    }
    /* if resource is a file */
    if ($file->isFile() && $showFiles) {
        $fileArray[\'extension\'] = pathinfo($fileArray[\'path\'],PATHINFO_EXTENSION);
        if (!empty($showExt) && !in_array($fileArray[\'extension\'],$showExt)) continue;
        
        $fileArray[\'lastmod\'] = $file->getMTime();
        $fileArray[\'dateFormat\'] = $dateFormat;

        /* get download count for file */
        if ($showDownloads) {
            $w = array(\'path\' => $fileArray[\'path\']);
            if ($uniqueDownloads) $w[\'unique\'] = true;
            $fileArray[\'downloads\'] = $modx->getCount(\'feoDownload\',$w);
            $totalDownloads += (int)$fileArray[\'downloads\'];
        }

        $files[] = $fileArray;
        $fileCount++;
        
    /* else if resource is a directory */
    } elseif ($file->isDir() && $showDirectories) {
        $directories[] = $fileArray;
        $directoryCount++;
    }
    $count++;
}
unset($fileArray,$file);


/* do sorting on files */
$sortBy = $modx->getOption(\'sortBy\',$scriptProperties,\'size\');
$sortDir = $modx->getOption(\'sortDir\',$scriptProperties,\'ASC\');
include_once $filelister->config[\'includesPath\'].\'sort.algorithms.php\';
$algo = \'\';
switch ($sortBy.\'-\'.$sortDir) {
    case \'filename-ASC\': case \'name-ASC\': $algo = \'feoSortByNameASC\'; break;
    case \'filename-DESC\': case \'name-DESC\': $algo = \'feoSortByNameDESC\'; break;
    case \'extension-ASC\': $algo = \'feoSortByExtensionASC\'; break;
    case \'extension-DESC\': $algo = \'feoSortByExtensionDESC\'; break;
    case \'date-ASC\': case \'lastmod-ASC\': $algo = \'feoSortByLastModifiedASC\'; break;
    case \'date-DESC\': case \'lastmod-DESC\': $algo = \'feoSortByLastModifiedDESC\'; break;
    case \'size-ASC\': $algo = \'feoSortBySizeASC\'; break;
    case \'size-DESC\': $algo = \'feoSortBySizeDESC\'; break;
}
if (!empty($algo)) { uasort($files,$algo); }
unset($algo,$sortBy,$sortDir);

/* get templated chunks for each fs resource */
$i = 0;
$totalCount = count($directories) + count($files);
if ($totalCount > $limit) $totalCount = $limit; /* getPage compat */
foreach ($directories as $directory) {
    $odd = $i % 2;
    $directory[\'cls\'] = $odd ? $altCls : $cls;
    if ($i == 0) $directory[\'cls\'] .= \' \'.$firstCls;
    if ($i == ($totalCount-1)) $directory[\'cls\'] .= \' \'.$lastCls;
    $list[] = $filelister->getChunk($directoryTpl,$directory);
    $i++;
}
unset($directory);
foreach ($files as $file) {
    $odd = $i % 2;
    $file[\'cls\'] = $odd ? $altCls : $cls;
    if ($i == 0) $file[\'cls\'] .= \' \'.$firstCls;
    if ($i == ($totalCount-1)) $file[\'cls\'] .= \' \'.$lastCls;
    $list[] = $filelister->getChunk($fileTpl,$file);
    $i++;
}
unset($file);

/* set placeholders */
$homePathName = $modx->getOption(\'homePathName\',$scriptProperties,\'\');
if (!empty($homePathName)) {
    $path = $homePathName;
}
$placeholders = array(
    \'total\' => $count,
    \'total.files\' => $fileCount,
    \'total.directories\' => $directoryCount,
    \'total.downloads\' => $totalDownloads,
    \'path\' => $filelister->parsePathIntoLinks($relPath,$path,$pathTpl,$pathSeparator,$navKey),
    \'relativePath\' => $relPath,
);
$modx->toPlaceholders($placeholders,$placeholderPrefix);

/* output */
$outputSeparator = $modx->getOption(\'outputSeparator\',$scriptProperties,\'\');
if (count($list) > 0) {
    /* pagination handling in conjunction with getPage */
    if (!empty($limit)) {
        $pageVarKey = $modx->getOption(\'pageVarKey\',$scriptProperties,\'page\');
        $page = (int)$modx->getOption($pageVarKey,$scriptProperties,$modx->getOption($pageVarKey,$_REQUEST,1));
        $offset = (int)$modx->getOption(\'offset\',$scriptProperties,0);
        /* cut the list of file into blocks */
        $list = array_chunk($list,$limit,true);
        /* output the current listing block */
        $output = implode($outputSeparator,$list[$page - 1]);
        /* need to make the total available without placeholder prefix for getPage */
        $modx->setPlaceholder(\'total\',$count);
    } else {
        /* no pagination so display all results */
        $output = implode($outputSeparator,$list);
    }
} else {
  /* empty directory so display nothing */
  $output = \'\';
}
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if ($toPlaceholder) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
      'locked' => 0,
      'properties' => 'a:27:{s:4:"path";a:6:{s:4:"name";s:4:"path";s:4:"desc";s:18:"prop_feo.path_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:21:"filelister:properties";}s:7:"fileTpl";a:6:{s:4:"name";s:7:"fileTpl";s:4:"desc";s:21:"prop_feo.filetpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"feoFile";s:7:"lexicon";s:21:"filelister:properties";}s:12:"directoryTpl";a:6:{s:4:"name";s:12:"directoryTpl";s:4:"desc";s:26:"prop_feo.directorytpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:12:"feoDirectory";s:7:"lexicon";s:21:"filelister:properties";}s:11:"fileLinkTpl";a:6:{s:4:"name";s:11:"fileLinkTpl";s:4:"desc";s:25:"prop_feo.filelinktpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:11:"feoFileLink";s:7:"lexicon";s:21:"filelister:properties";}s:10:"dateFormat";a:6:{s:4:"name";s:10:"dateFormat";s:4:"desc";s:24:"prop_feo.dateformat_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:9:"%b %d, %Y";s:7:"lexicon";s:21:"filelister:properties";}s:3:"cls";a:6:{s:4:"name";s:3:"cls";s:4:"desc";s:17:"prop_feo.cls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"feo-row";s:7:"lexicon";s:21:"filelister:properties";}s:6:"altCls";a:6:{s:4:"name";s:6:"altCls";s:4:"desc";s:20:"prop_feo.altcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:11:"feo-alt-row";s:7:"lexicon";s:21:"filelister:properties";}s:8:"firstCls";a:6:{s:4:"name";s:8:"firstCls";s:4:"desc";s:22:"prop_feo.firstcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:13:"feo-first-row";s:7:"lexicon";s:21:"filelister:properties";}s:7:"lastCls";a:6:{s:4:"name";s:7:"lastCls";s:4:"desc";s:21:"prop_feo.lastcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:12:"feo-last-row";s:7:"lexicon";s:21:"filelister:properties";}s:15:"outputSeparator";a:6:{s:4:"name";s:15:"outputSeparator";s:4:"desc";s:29:"prop_feo.outputseparator_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"
";s:7:"lexicon";s:21:"filelister:properties";}s:8:"skipDirs";a:6:{s:4:"name";s:8:"skipDirs";s:4:"desc";s:22:"prop_feo.skipdirs_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:41:".svn,.git,.metadata,.tmp,.DS_Store,_notes";s:7:"lexicon";s:21:"filelister:properties";}s:17:"placeholderPrefix";a:6:{s:4:"name";s:17:"placeholderPrefix";s:4:"desc";s:31:"prop_feo.placeholderprefix_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:10:"filelister";s:7:"lexicon";s:21:"filelister:properties";}s:13:"pathSeparator";a:6:{s:4:"name";s:13:"pathSeparator";s:4:"desc";s:27:"prop_feo.pathseparator_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"/";s:7:"lexicon";s:21:"filelister:properties";}s:7:"pathTpl";a:6:{s:4:"name";s:7:"pathTpl";s:4:"desc";s:21:"prop_feo.pathtpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:11:"feoPathLink";s:7:"lexicon";s:21:"filelister:properties";}s:9:"showFiles";a:6:{s:4:"name";s:9:"showFiles";s:4:"desc";s:23:"prop_feo.showfiles_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:15:"showDirectories";a:6:{s:4:"name";s:15:"showDirectories";s:4:"desc";s:29:"prop_feo.showdirectories_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:7:"showExt";a:6:{s:4:"name";s:7:"showExt";s:4:"desc";s:21:"prop_feo.showext_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:21:"filelister:properties";}s:6:"sortBy";a:6:{s:4:"name";s:6:"sortBy";s:4:"desc";s:20:"prop_feo.sortby_desc";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:4:"text";s:12:"feo.filename";s:5:"value";s:8:"filename";}i:1;a:2:{s:4:"text";s:8:"feo.date";s:5:"value";s:4:"date";}i:2;a:2:{s:4:"text";s:8:"feo.size";s:5:"value";s:4:"size";}i:3;a:2:{s:4:"text";s:13:"feo.extension";s:5:"value";s:9:"extension";}}s:5:"value";s:8:"filename";s:7:"lexicon";s:21:"filelister:properties";}s:7:"sortDir";a:6:{s:4:"name";s:7:"sortDir";s:4:"desc";s:21:"prop_feo.sortdir_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:7:"feo.asc";s:5:"value";s:3:"ASC";}i:1;a:2:{s:4:"text";s:8:"feo.desc";s:5:"value";s:4:"DESC";}}s:5:"value";s:3:"ASC";s:7:"lexicon";s:21:"filelister:properties";}s:13:"allowDownload";a:6:{s:4:"name";s:13:"allowDownload";s:4:"desc";s:27:"prop_feo.allowdownload_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:19:"requireAuthDownload";a:6:{s:4:"name";s:19:"requireAuthDownload";s:4:"desc";s:33:"prop_feo.requireauthdownload_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:21:"filelister:properties";}s:19:"allowDownloadGroups";a:6:{s:4:"name";s:19:"allowDownloadGroups";s:4:"desc";s:33:"prop_feo.allowdownloadgroups_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:21:"filelister:properties";}s:13:"showDownloads";a:6:{s:4:"name";s:13:"showDownloads";s:4:"desc";s:27:"prop_feo.showdownloads_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:15:"uniqueDownloads";a:6:{s:4:"name";s:15:"uniqueDownloads";s:4:"desc";s:29:"prop_feo.uniquedownloads_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:14:"useGeolocation";a:6:{s:4:"name";s:14:"useGeolocation";s:4:"desc";s:28:"prop_feo.usegeolocation_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";s:21:"filelister:properties";}s:13:"toPlaceholder";a:6:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:27:"prop_feo.toplaceholder_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:21:"filelister:properties";}s:6:"navKey";a:6:{s:4:"name";s:6:"navKey";s:4:"desc";s:20:"prop_feo.navkey_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"fd";s:7:"lexicon";s:21:"filelister:properties";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * FileLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of FileLister, a file listing Extra.
 *
 * FileLister is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * FileLister is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FileLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package filelister
 */
/**
 * File listing snippet
 * 
 * @package filelister
 */
$filelister = $modx->getService(\'filelister\',\'FileLister\',$modx->getOption(\'filelister.core_path\',null,$modx->getOption(\'core_path\').\'components/filelister/\').\'model/filelister/\',$scriptProperties);
if (!($filelister instanceof FileLister)) return \'\';

/* get path */
$path = $modx->getOption(\'path\',$scriptProperties,false);
$filelister->sanitize($path);
if (empty($path) || !is_dir($path)) return \'\';

/* setup default properties */
$fileTpl = $modx->getOption(\'fileTpl\',$scriptProperties,\'feoFile\');
$fileLinkTpl = $modx->getOption(\'fileLinkTpl\',$scriptProperties,\'feoFileLink\');
$directoryTpl = $modx->getOption(\'directoryTpl\',$scriptProperties,\'feoDirectory\');
$dateFormat = $modx->getOption(\'dateFormat\',$scriptProperties,\'%b %d, %Y\');
$skipDirs = $modx->getOption(\'skipDirs\',$scriptProperties,\'.svn,.git,.metadata,.tmp,.DS_Store,_notes\');
$skipDirs = array_merge(array(\'.\',\'..\'),explode(\',\',$skipDirs));
$placeholderPrefix = $modx->getOption(\'placeholderPrefix\',$scriptProperties,\'filelister\');
$pathSeparator = $modx->getOption(\'pathSeparator\',$scriptProperties,\'/\');
$pathTpl = $modx->getOption(\'pathTpl\',$scriptProperties,\'feoPathLink\');
$navKey = $modx->getOption(\'navKey\',$scriptProperties,\'fd\');
$showFiles = (boolean)$modx->getOption(\'showFiles\',$scriptProperties,true);
$showDirectories = (boolean)$modx->getOption(\'showDirectories\',$scriptProperties,true);
$showExt = $modx->getOption(\'showExt\',$scriptProperties,\'\');
if (!empty($showExt)) $showExt = explode(\',\',$showExt);
$showDownloads = (boolean)$modx->getOption(\'showDownloads\',$scriptProperties,true);
$uniqueDownloads = (boolean)$modx->getOption(\'uniqueDownloads\',$scriptProperties,true);
$useGeolocation = (boolean)$modx->getOption(\'useGeolocation\',$scriptProperties,true);
$limit = (int)$modx->getOption(\'limit\',$scriptProperties,0);
$cls = $modx->getOption(\'cls\',$scriptProperties,\'feo-row\');
$altCls = $modx->getOption(\'altCls\',$scriptProperties,\'feo-alt-row\');
$firstCls = $modx->getOption(\'firstCls\',$scriptProperties,\'feo-first-row\');
$lastCls = $modx->getOption(\'lastCls\',$scriptProperties,\'feo-last-row\');

/* get relPath and curPath */
$fd = $modx->getOption($navKey,$_REQUEST,false);
$relPath = \'\';
if ($fd) {
    $relPath = $filelister->parseKey($fd);
    if ($relPath == \'.\') $relPath = \'\';
}
$curPath = $filelister->sanitize($path.$relPath);

/* if pointing to file, output file */
if (!is_dir($curPath) && is_file($curPath)) {
    /* do download tracking and geolocation */
    $tenMinAgo = time() - (60 * 5); /* prevent duplicate download tracking */
    $tenMinAgo = strftime(\'%Y-%m-%d %H:%M:%S\',$tenMinAgo);
    $double = $modx->getCount(\'feoDownload\',array(
        \'path\' => $curPath,
        \'ip\' => $_SERVER[\'REMOTE_ADDR\'],
        \'downloadedon:>\' => $tenMinAgo,
    ));
    if ($double <= 0) {
        $unique = $modx->getCount(\'feoDownload\',array(
            \'path\' => $curPath,
            \'ip\' => $_SERVER[\'REMOTE_ADDR\'],
        ));

        $dl = $modx->newObject(\'feoDownload\');
        $dl->set(\'path\',$curPath);
        $dl->set(\'ip\',$_SERVER[\'REMOTE_ADDR\']);
        $dl->set(\'downloadedon\',strftime(\'%Y-%m-%d %H:%M:%S\'));
        $dl->set(\'unique\',$unique > 0 ? false : true);
        $dl->set(\'referer\',$_SERVER[\'HTTP_REFERER\']);

        $geoApiKey = $modx->getOption(\'filelister.ipinfodb_api_key\',$scriptProperties,\'\');
        if ($useGeolocation && !empty($geoApiKey)) {
            $modx->loadClass(\'geolocation.ipinfodb\',$filelister->config[\'modelPath\'],true,true);
            $geo = new ipinfodb($modx);
            $geo->setKey($geoApiKey);
            $locations = $geo->getGeoLocation($_SERVER[\'REMOTE_ADDR\']);
            $geolocation = array();
            if (!empty($locations[0]) && is_array($locations[0])) {
                $gl = $locations[0];
                $dl->set(\'geolocation\',$gl);
                $dl->set(\'country\',$gl[\'CountryCode\']);
                $dl->set(\'region\',$gl[\'RegionName\']);
                $dl->set(\'city\',$gl[\'City\']);
                $dl->set(\'zip\',$gl[\'ZipPostalCode\']);
            }
            if ($modx->user->hasSessionContext($modx->context->get(\'key\'))) {
                $dl->set(\'user\',$modx->user->get(\'id\'));
            }
            $dl->save();
        }

    }


    $filelister->loadHeaders($curPath);
    $o = file_get_contents($curPath);
    echo $o;
    die();
} elseif (!is_dir($curPath)) {
    /* if an invalid path, set to base */
    $curPath = $path;
}

/* check download access */
$allowDownloadGroups = $modx->getOption(\'allowDownloadGroups\',$scriptProperties,\'\');
if (!empty($allowDownloadGroups)) $allowDownloadGroups = explode(\',\',$allowDownloadGroups);

$canDownload = $modx->getOption(\'allowDownload\',$scriptProperties,true);
if ($modx->getOption(\'requireAuthDownload\',$scriptProperties,false)) {
    $requireAuthContext = $modx->getOption(\'requireAuthContext\',$scriptProperties,$modx->context->get(\'key\'));
    $canDownload = $modx->user->hasSessionContext($requireAuthContext);
}
if (!empty($allowDownloadGroups)) {
    $canDownload = $modx->user->isMember($allowDownloadGroups);
}
unset($requireAuthContext,$allowDownloadGroups);

/* iterate list of files/dirs */
$count = 0;
$directoryCount = 0;
$fileCount = 0;
$totalDownloads = 0;
$directories = array();
$files = array();
foreach (new DirectoryIterator($curPath) as $file) {
    if (in_array($file,$skipDirs)) continue;
    if (!$file->isReadable()) continue;

    /* make the key that is used for navigation */
    $filePath = $file->getPathname();
    $filePath = $relPath.(!empty($relPath) ? \'/\' : \'\').$file->getFilename();
    $key = $filelister->makeKey($filePath);

    $fileArray = array();
    $fileArray[\'filename\'] = $file->getFilename();
    $fileArray[\'bytesize\'] = $file->getSize();
    $fileArray[\'filesize\'] = $filelister->formatBytes($file->getSize());
    $fileArray[\'path\'] = $file->getPathname();
    $fileArray[\'relativePath\'] = $filePath;
    $fileArray[\'navKey\'] = $navKey;
    $fileArray[\'showDownloads\'] = $showDownloads;

    /* if allowing for downloading, generate a link here */
    if ($file->isDir() || $canDownload) {
        $fileArray[\'link\'] = $filelister->getChunk($fileLinkTpl,array(
            \'url\' => $modx->makeUrl($modx->resource->get(\'id\'),\'\',array(
                $navKey => $key,
            )),
            \'filename\' => $fileArray[\'filename\'],
        ));
    } else {
        $fileArray[\'link\'] = $fileArray[\'filename\'];
    }
    /* if resource is a file */
    if ($file->isFile() && $showFiles) {
        $fileArray[\'extension\'] = pathinfo($fileArray[\'path\'],PATHINFO_EXTENSION);
        if (!empty($showExt) && !in_array($fileArray[\'extension\'],$showExt)) continue;
        
        $fileArray[\'lastmod\'] = $file->getMTime();
        $fileArray[\'dateFormat\'] = $dateFormat;

        /* get download count for file */
        if ($showDownloads) {
            $w = array(\'path\' => $fileArray[\'path\']);
            if ($uniqueDownloads) $w[\'unique\'] = true;
            $fileArray[\'downloads\'] = $modx->getCount(\'feoDownload\',$w);
            $totalDownloads += (int)$fileArray[\'downloads\'];
        }

        $files[] = $fileArray;
        $fileCount++;
        
    /* else if resource is a directory */
    } elseif ($file->isDir() && $showDirectories) {
        $directories[] = $fileArray;
        $directoryCount++;
    }
    $count++;
}
unset($fileArray,$file);


/* do sorting on files */
$sortBy = $modx->getOption(\'sortBy\',$scriptProperties,\'size\');
$sortDir = $modx->getOption(\'sortDir\',$scriptProperties,\'ASC\');
include_once $filelister->config[\'includesPath\'].\'sort.algorithms.php\';
$algo = \'\';
switch ($sortBy.\'-\'.$sortDir) {
    case \'filename-ASC\': case \'name-ASC\': $algo = \'feoSortByNameASC\'; break;
    case \'filename-DESC\': case \'name-DESC\': $algo = \'feoSortByNameDESC\'; break;
    case \'extension-ASC\': $algo = \'feoSortByExtensionASC\'; break;
    case \'extension-DESC\': $algo = \'feoSortByExtensionDESC\'; break;
    case \'date-ASC\': case \'lastmod-ASC\': $algo = \'feoSortByLastModifiedASC\'; break;
    case \'date-DESC\': case \'lastmod-DESC\': $algo = \'feoSortByLastModifiedDESC\'; break;
    case \'size-ASC\': $algo = \'feoSortBySizeASC\'; break;
    case \'size-DESC\': $algo = \'feoSortBySizeDESC\'; break;
}
if (!empty($algo)) { uasort($files,$algo); }
unset($algo,$sortBy,$sortDir);

/* get templated chunks for each fs resource */
$i = 0;
$totalCount = count($directories) + count($files);
if ($totalCount > $limit) $totalCount = $limit; /* getPage compat */
foreach ($directories as $directory) {
    $odd = $i % 2;
    $directory[\'cls\'] = $odd ? $altCls : $cls;
    if ($i == 0) $directory[\'cls\'] .= \' \'.$firstCls;
    if ($i == ($totalCount-1)) $directory[\'cls\'] .= \' \'.$lastCls;
    $list[] = $filelister->getChunk($directoryTpl,$directory);
    $i++;
}
unset($directory);
foreach ($files as $file) {
    $odd = $i % 2;
    $file[\'cls\'] = $odd ? $altCls : $cls;
    if ($i == 0) $file[\'cls\'] .= \' \'.$firstCls;
    if ($i == ($totalCount-1)) $file[\'cls\'] .= \' \'.$lastCls;
    $list[] = $filelister->getChunk($fileTpl,$file);
    $i++;
}
unset($file);

/* set placeholders */
$homePathName = $modx->getOption(\'homePathName\',$scriptProperties,\'\');
if (!empty($homePathName)) {
    $path = $homePathName;
}
$placeholders = array(
    \'total\' => $count,
    \'total.files\' => $fileCount,
    \'total.directories\' => $directoryCount,
    \'total.downloads\' => $totalDownloads,
    \'path\' => $filelister->parsePathIntoLinks($relPath,$path,$pathTpl,$pathSeparator,$navKey),
    \'relativePath\' => $relPath,
);
$modx->toPlaceholders($placeholders,$placeholderPrefix);

/* output */
$outputSeparator = $modx->getOption(\'outputSeparator\',$scriptProperties,\'\');
if (count($list) > 0) {
    /* pagination handling in conjunction with getPage */
    if (!empty($limit)) {
        $pageVarKey = $modx->getOption(\'pageVarKey\',$scriptProperties,\'page\');
        $page = (int)$modx->getOption($pageVarKey,$scriptProperties,$modx->getOption($pageVarKey,$_REQUEST,1));
        $offset = (int)$modx->getOption(\'offset\',$scriptProperties,0);
        /* cut the list of file into blocks */
        $list = array_chunk($list,$limit,true);
        /* output the current listing block */
        $output = implode($outputSeparator,$list[$page - 1]);
        /* need to make the total available without placeholder prefix for getPage */
        $modx->setPlaceholder(\'total\',$count);
    } else {
        /* no pagination so display all results */
        $output = implode($outputSeparator,$list);
    }
} else {
  /* empty directory so display nothing */
  $output = \'\';
}
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if ($toPlaceholder) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
    ),
  ),
);