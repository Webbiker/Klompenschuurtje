<?php return array (
  'f6fc19033a7ae1825befafba73dd7249' => 
  array (
    'criteria' => 
    array (
      'name' => 'gmaps',
    ),
    'object' => 
    array (
      'name' => 'gmaps',
      'path' => '{core_path}components/gmaps/',
      'assets_path' => NULL,
    ),
  ),
  'cec48c910431686c2b078ea41c685533' => 
  array (
    'criteria' => 
    array (
      'category' => 'Gmaps',
    ),
    'object' => 
    array (
      'id' => 11,
      'parent' => 0,
      'category' => 'Gmaps',
      'rank' => 0,
    ),
    'files' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/assets/components',
    ),
  ),
  '88ed3dec426764c3f54c00eb79863d33' => 
  array (
    'criteria' => 
    array (
      'name' => 'beachflag',
    ),
    'object' => 
    array (
      'id' => 16,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'beachflag',
      'description' => 'Marker for Gmaps',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '"beachflag.png" , 20 , 32 , 0 , 0 , 0 , 32   : "beachflag_shadow.png" , 37 , 32 , 0 , 0 , 0 , 32  :  1 ,  1 ,  1,  20,  18 ,  20 ,  18  ,  1',
      'locked' => 0,
      'properties' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '"beachflag.png" , 20 , 32 , 0 , 0 , 0 , 32   : "beachflag_shadow.png" , 37 , 32 , 0 , 0 , 0 , 32  :  1 ,  1 ,  1,  20,  18 ,  20 ,  18  ,  1',
    ),
  ),
  '7462246b0869f90fee99117673d97f51' => 
  array (
    'criteria' => 
    array (
      'name' => 'Gmaps',
    ),
    'object' => 
    array (
      'id' => 16,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'Gmaps',
      'description' => 'Gmaps snippet for Gmaps.',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '/**
 * Gmaps
 *
 * Display a Google Map and adds some markers - API Google Maps V3
 *
 *
 * @category    Third Party Component
 * @version     1.0.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 *
 * @author      Coroico <coroico@wangba.fr>
 * @date        18/04/2011
 *
 * -----------------------------------------------------------------------------
 */

require_once $modx->getOption(\'gmaps.core_path\',null,$modx->getOption(\'core_path\').\'components/gmaps/\').\'model/gmaps/gmaps.class.php\';

$gm  = str_replace(\' \', \'\', $modx->getOption(\'mapId\',$scriptProperties,\'Gmaps\'));

$$gm = new Gmaps($modx,$scriptProperties);
if (!($$gm instanceof Gmaps)) {
    $this->modx->log(modX::LOG_LEVEL_ERROR,\'[Gmaps] Gmaps class not found.\');
    return false;
}

$output = $$gm->output();

return $output;',
      'locked' => 0,
      'properties' => 'a:16:{s:5:"mapId";a:6:{s:4:"name";s:5:"mapId";s:4:"desc";s:22:"gmaps.gmaps_mapId_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"Gmaps";s:7:"lexicon";s:16:"gmaps:properties";}s:8:"language";a:6:{s:4:"name";s:8:"language";s:4:"desc";s:25:"gmaps.gmaps_language_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"en";s:7:"lexicon";s:16:"gmaps:properties";}s:9:"mapLatLng";a:6:{s:4:"name";s:9:"mapLatLng";s:4:"desc";s:26:"gmaps.gmaps_mapLatLng_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:19:"46.538362, 2.427753";s:7:"lexicon";s:16:"gmaps:properties";}s:4:"zoom";a:6:{s:4:"name";s:4:"zoom";s:4:"desc";s:21:"gmaps.gmaps_zoom_desc";s:4:"type";s:11:"numberfield";s:7:"options";s:0:"";s:5:"value";i:5;s:7:"lexicon";s:16:"gmaps:properties";}s:7:"mapType";a:6:{s:4:"name";s:7:"mapType";s:4:"desc";s:24:"gmaps.gmaps_mapType_desc";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:4:"text";s:9:"SATELLITE";s:5:"value";s:9:"SATELLITE";}i:1;a:2:{s:4:"text";s:6:"HYBRID";s:5:"value";s:6:"HYBRID";}i:2;a:2:{s:4:"text";s:7:"TERRAIN";s:5:"value";s:7:"TERRAIN";}i:3;a:2:{s:4:"text";s:7:"ROADMAP";s:5:"value";s:7:"ROADMAP";}}s:5:"value";s:7:"ROADMAP";s:7:"lexicon";s:16:"gmaps:properties";}s:8:"mapWidth";a:6:{s:4:"name";s:8:"mapWidth";s:4:"desc";s:25:"gmaps.gmaps_mapWidth_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"100%";s:7:"lexicon";s:16:"gmaps:properties";}s:9:"mapHeight";a:6:{s:4:"name";s:9:"mapHeight";s:4:"desc";s:26:"gmaps.gmaps_mapHeight_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"500px";s:7:"lexicon";s:17:"gmaps:properties_";}s:8:"scalable";a:6:{s:4:"name";s:8:"scalable";s:4:"desc";s:25:"gmaps.gmaps_scalable_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:3:"Yes";s:5:"value";s:3:"yes";}i:1;a:2:{s:4:"text";s:2:"No";s:5:"value";s:2:"no";}}s:5:"value";s:2:"no";s:7:"lexicon";s:16:"gmaps:properties";}s:7:"markers";a:6:{s:4:"name";s:7:"markers";s:4:"desc";s:24:"gmaps.gmaps_markers_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:16:"gmaps:properties";}s:3:"kml";a:6:{s:4:"name";s:3:"kml";s:4:"desc";s:20:"gmaps.gmaps_kml_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:16:"gmaps:properties";}s:11:"mkrLatLngTv";a:6:{s:4:"name";s:11:"mkrLatLngTv";s:4:"desc";s:28:"gmaps.gmaps_mkrLatLngTv_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:9:"mkrLatLng";s:7:"lexicon";s:16:"gmaps:properties";}s:8:"mkrClick";a:6:{s:4:"name";s:8:"mkrClick";s:4:"desc";s:25:"gmaps.gmaps_mkrClick_desc";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:4:"info";s:5:"value";s:4:"info";}i:1;a:2:{s:4:"text";s:4:"link";s:5:"value";s:4:"link";}i:2;a:2:{s:4:"text";s:4:"none";s:5:"value";s:4:"none";}}s:5:"value";s:4:"link";s:7:"lexicon";s:16:"gmaps:properties";}s:7:"mkrOver";a:6:{s:4:"name";s:7:"mkrOver";s:4:"desc";s:24:"gmaps.gmaps_mkrOver_desc";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:4:"info";s:5:"value";s:4:"info";}i:1;a:2:{s:4:"text";s:4:"link";s:5:"value";s:4:"link";}i:2;a:2:{s:4:"text";s:4:"none";s:5:"value";s:4:"none";}}s:5:"value";s:4:"none";s:7:"lexicon";s:16:"gmaps:properties";}s:9:"mkrIconTv";a:6:{s:4:"name";s:9:"mkrIconTv";s:4:"desc";s:26:"gmaps.gmaps_mkrIconTv_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:16:"gmaps:properties";}s:7:"iconDir";a:6:{s:4:"name";s:7:"iconDir";s:4:"desc";s:24:"gmaps.gmaps_iconDir_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:31:"assets/components/gmaps/images/";s:7:"lexicon";s:16:"gmaps:properties";}s:18:"infoboxAjaxId_desc";a:6:{s:4:"name";s:18:"infoboxAjaxId_desc";s:4:"desc";s:25:"gmaps.gmaps_infoboxAjaxId";s:4:"type";s:11:"numberfield";s:7:"options";s:0:"";s:5:"value";i:0;s:7:"lexicon";s:16:"gmaps:properties";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * Gmaps
 *
 * Display a Google Map and adds some markers - API Google Maps V3
 *
 *
 * @category    Third Party Component
 * @version     1.0.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 *
 * @author      Coroico <coroico@wangba.fr>
 * @date        18/04/2011
 *
 * -----------------------------------------------------------------------------
 */

require_once $modx->getOption(\'gmaps.core_path\',null,$modx->getOption(\'core_path\').\'components/gmaps/\').\'model/gmaps/gmaps.class.php\';

$gm  = str_replace(\' \', \'\', $modx->getOption(\'mapId\',$scriptProperties,\'Gmaps\'));

$$gm = new Gmaps($modx,$scriptProperties);
if (!($$gm instanceof Gmaps)) {
    $this->modx->log(modX::LOG_LEVEL_ERROR,\'[Gmaps] Gmaps class not found.\');
    return false;
}

$output = $$gm->output();

return $output;',
    ),
  ),
  'f9f405f7246c7712b5c3f754209592c9' => 
  array (
    'criteria' => 
    array (
      'name' => 'GmapsInfobox',
    ),
    'object' => 
    array (
      'id' => 17,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'GmapsInfobox',
      'description' => 'GmapsInfobox snippet for Gmaps.',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '/**
 * GmapsInfobox
 *
 * Returns the info window content requested by Gmaps thru an ajax request
 *
 * @category    Third Party Component
 * @version     1.0.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 *
 * @author      Coroico <coroico@wangba.fr>
 * @date        18/04/2011
 *
 * -----------------------------------------------------------------------------
 */

global $modx;

if (isset($_POST[\'mkrid\'])) {
    $mkrid = intval(strip_tags($modx->sanitizeString($_POST[\'mkrid\'])));

    // mkrTextTv : [ tv name | \'mkrText\']
    // name of tv where is stored the text value of the marker. Tv output should be as text: Text of the marker
    // By default : \'mkrText\'
    $mkrTextTv = trim($modx->getOption(\'mkrTextTv\',$scriptProperties,\'mkrText\'));

    $debug = $modx->getOption(\'debug\',$scriptProperties,false);

    if ($mkrid && $mkrTextTv) {

    	$c = $modx->newQuery(\'modTemplateVar\');
        $c->select(\'modTemplateVar.id AS id, value\');
        $c->query[\'distinct\'] = \'DISTINCT\';
        $c->innerJoin(\'modTemplateVarTemplate\',\'tvtpl\', array("modTemplateVar.id = tvtpl.tmplvarid"));
        $cond = "tvc.tmplvarid = modTemplateVar.id AND tvc.contentid = \'" . $mkrid . "\'";
        $c->leftJoin(\'modTemplateVarResource\',\'tvc\', array($cond));
        $c->where(array(\'tvc.contentid\' => $mkrid, \'modTemplateVar.name\' => $mkrTextTv ));

        if ($debug) {
            $this->modx->setLogTarget(\'HTML\');
            $this->modx->setLogLevel(modX::LOG_LEVEL_DEBUG);
            $c->prepare();
            $modx->log(modX::LOG_LEVEL_INFO, $c->toSQL());
        }
        $collection = $modx->getCollection(\'modTemplateVar\', $c);

        if (count($collection)) {
            $tvValue = $collection[0]->get("value");
            $tvValue = preg_replace(\'#\\[\\~\\[\\[\\*(.*?)\\]\\]\\~\\]#\', $modx->makeUrl($mkrid), $tvValue); //replace [~[[*id]]~] by index.php?id=id
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setContent($tvValue);
            $chunk->setCacheable(false);
            $tvParsed = $chunk->process();
            return $tvParsed;
        }
        else return "ERROR: infowindow text not found";
    }
    else {
        return "ERROR: infowindow rejected";
    }
}',
      'locked' => 0,
      'properties' => 'a:1:{s:9:"mkrTextTv";a:6:{s:4:"name";s:9:"mkrTextTv";s:4:"desc";s:33:"gmaps.gmapsInfobox_mkrTextTv_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"mkrText";s:7:"lexicon";s:16:"gmaps:properties";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * GmapsInfobox
 *
 * Returns the info window content requested by Gmaps thru an ajax request
 *
 * @category    Third Party Component
 * @version     1.0.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 *
 * @author      Coroico <coroico@wangba.fr>
 * @date        18/04/2011
 *
 * -----------------------------------------------------------------------------
 */

global $modx;

if (isset($_POST[\'mkrid\'])) {
    $mkrid = intval(strip_tags($modx->sanitizeString($_POST[\'mkrid\'])));

    // mkrTextTv : [ tv name | \'mkrText\']
    // name of tv where is stored the text value of the marker. Tv output should be as text: Text of the marker
    // By default : \'mkrText\'
    $mkrTextTv = trim($modx->getOption(\'mkrTextTv\',$scriptProperties,\'mkrText\'));

    $debug = $modx->getOption(\'debug\',$scriptProperties,false);

    if ($mkrid && $mkrTextTv) {

    	$c = $modx->newQuery(\'modTemplateVar\');
        $c->select(\'modTemplateVar.id AS id, value\');
        $c->query[\'distinct\'] = \'DISTINCT\';
        $c->innerJoin(\'modTemplateVarTemplate\',\'tvtpl\', array("modTemplateVar.id = tvtpl.tmplvarid"));
        $cond = "tvc.tmplvarid = modTemplateVar.id AND tvc.contentid = \'" . $mkrid . "\'";
        $c->leftJoin(\'modTemplateVarResource\',\'tvc\', array($cond));
        $c->where(array(\'tvc.contentid\' => $mkrid, \'modTemplateVar.name\' => $mkrTextTv ));

        if ($debug) {
            $this->modx->setLogTarget(\'HTML\');
            $this->modx->setLogLevel(modX::LOG_LEVEL_DEBUG);
            $c->prepare();
            $modx->log(modX::LOG_LEVEL_INFO, $c->toSQL());
        }
        $collection = $modx->getCollection(\'modTemplateVar\', $c);

        if (count($collection)) {
            $tvValue = $collection[0]->get("value");
            $tvValue = preg_replace(\'#\\[\\~\\[\\[\\*(.*?)\\]\\]\\~\\]#\', $modx->makeUrl($mkrid), $tvValue); //replace [~[[*id]]~] by index.php?id=id
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setContent($tvValue);
            $chunk->setCacheable(false);
            $tvParsed = $chunk->process();
            return $tvParsed;
        }
        else return "ERROR: infowindow text not found";
    }
    else {
        return "ERROR: infowindow rejected";
    }
}',
    ),
  ),
);