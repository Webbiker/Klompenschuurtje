<?php return array (
  '3f85667a589318e69cb5b146f9c84f07' => 
  array (
    'criteria' => 
    array (
      'name' => 'firstchildredirect',
    ),
    'object' => 
    array (
      'name' => 'firstchildredirect',
      'path' => '{core_path}components/firstchildredirect/',
      'assets_path' => NULL,
    ),
  ),
  '8d1b44f634177b439113c02f30dfa974' => 
  array (
    'criteria' => 
    array (
      'name' => 'FirstChildRedirect',
    ),
    'object' => 
    array (
      'id' => 3,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'FirstChildRedirect',
      'description' => 'Redirect the page to the first child element.',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '/**
 * @name FirstChildRedirect
 * @author Jason Coward <jason@opengeek.com>
 * @author Ryan Thrash <ryan@vertexworks.com>
 * @author Olivier B. Deland <olivier@conseilsweb.com> Refactored for Revo and
 * added functionnalities
 * @license Public Domain
 * @version 2.1
 * @package firstchildredirect
 *
 * This snippet redirects to the first child document of a folder in which this
 * snippet is included within the content (e.g. [[FirstChildRedirect]]).  This
 * allows MODx folders to emulate the behavior of real folders since MODx
 * usually treats folders as actual documents with their own content.
 *
 * Added parameters to allow greater flexibility
 *
 * &docid=`12` (optional; default: current document)
 * Use the docid parameter to have this snippet redirect to the
 * first child document of the specified document.
 *
 * &default=`1` or &default=`site_start` (optional; default: site_start)
 * Use the default parameter to have this snippet redirect to the
 * document specified in cases where there is no children.
 * It can be a document ID or one of : site_start,site_unavailable_page,error_page,unauthorized_page
 *
 * &sortBy=`menuindex` (optional; default:menuindex)
 * Get the first child depending on this sort order
 * Can be any valid modx document field name
 *
 * &sortDir=`DESC` (optional; default:ASC)
 * Sort `ASC` for ascendant or `DESC` for descendant
 */

/*
 * Parameters
 */
/* parent doc */
$docid = isset ( $docid ) ? $docid : $modx->resource->get(\'id\');

/* default doc in case there\'s no children
 * can be an id or one of: site_start, site_unavailable_page, error_page,
 * unauthorized_page
 * Default is site_start
 */
$default = isset( $default ) ? $default : $modx->getOption(\'site_start\',null,1);
if (in_array($default,array(\'site_start\',\'site_unavailable_page\',\'error_page\',\'unauthorized_page\'))) {
    $default = $modx->getOption($default,null,1);
} else {
    $default = intval($default);
}

/* sort list */
$sortBy = isset( $sortBy ) ? $sortBy : \'menuindex\';

/* sort dir */
$sortDir = isset( $sortDir ) && $sortDir == \'DESC\' ? $sortDir : \'ASC\';

/*
 * Execute
 */
/* Get children sorted
 * FIXME: getActiveChildren is depecrated in 1.0
 */
$children= $modx->getActiveChildren($docid, $sortBy, $sortDir);
$targetid = isset ( $children[0][\'id\'] ) ? $children[0][\'id\'] : $default;
$url = $modx->makeUrl($targetid,\'\',\'\',\'full\');

return $modx->sendRedirect($url);',
      'locked' => 0,
      'properties' => 'a:3:{s:7:"default";a:5:{s:4:"name";s:7:"default";s:4:"desc";s:220:"Use the default parameter to have this Snippet redirect to the Resource specified in cases where there is no children. It can be a Resource ID or one of : site_start, site_unavailable_page, error_page, unauthorized_page.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:10:"site_start";}s:6:"sortBy";a:5:{s:4:"name";s:6:"sortBy";s:4:"desc";s:92:"Get the first child depending on this sort order. Can be any valid MODx document field name.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:9:"menuindex";}s:7:"sortDir";a:5:{s:4:"name";s:7:"sortDir";s:4:"desc";s:50:"Sort `ASC` for ascendant or `DESC` for descendant.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"name";s:3:"ASC";s:5:"value";s:3:"ASC";}i:1;a:2:{s:4:"name";s:4:"DESC";s:5:"value";s:4:"DESC";}}s:5:"value";s:4:"DESC";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * @name FirstChildRedirect
 * @author Jason Coward <jason@opengeek.com>
 * @author Ryan Thrash <ryan@vertexworks.com>
 * @author Olivier B. Deland <olivier@conseilsweb.com> Refactored for Revo and
 * added functionnalities
 * @license Public Domain
 * @version 2.1
 * @package firstchildredirect
 *
 * This snippet redirects to the first child document of a folder in which this
 * snippet is included within the content (e.g. [[FirstChildRedirect]]).  This
 * allows MODx folders to emulate the behavior of real folders since MODx
 * usually treats folders as actual documents with their own content.
 *
 * Added parameters to allow greater flexibility
 *
 * &docid=`12` (optional; default: current document)
 * Use the docid parameter to have this snippet redirect to the
 * first child document of the specified document.
 *
 * &default=`1` or &default=`site_start` (optional; default: site_start)
 * Use the default parameter to have this snippet redirect to the
 * document specified in cases where there is no children.
 * It can be a document ID or one of : site_start,site_unavailable_page,error_page,unauthorized_page
 *
 * &sortBy=`menuindex` (optional; default:menuindex)
 * Get the first child depending on this sort order
 * Can be any valid modx document field name
 *
 * &sortDir=`DESC` (optional; default:ASC)
 * Sort `ASC` for ascendant or `DESC` for descendant
 */

/*
 * Parameters
 */
/* parent doc */
$docid = isset ( $docid ) ? $docid : $modx->resource->get(\'id\');

/* default doc in case there\'s no children
 * can be an id or one of: site_start, site_unavailable_page, error_page,
 * unauthorized_page
 * Default is site_start
 */
$default = isset( $default ) ? $default : $modx->getOption(\'site_start\',null,1);
if (in_array($default,array(\'site_start\',\'site_unavailable_page\',\'error_page\',\'unauthorized_page\'))) {
    $default = $modx->getOption($default,null,1);
} else {
    $default = intval($default);
}

/* sort list */
$sortBy = isset( $sortBy ) ? $sortBy : \'menuindex\';

/* sort dir */
$sortDir = isset( $sortDir ) && $sortDir == \'DESC\' ? $sortDir : \'ASC\';

/*
 * Execute
 */
/* Get children sorted
 * FIXME: getActiveChildren is depecrated in 1.0
 */
$children= $modx->getActiveChildren($docid, $sortBy, $sortDir);
$targetid = isset ( $children[0][\'id\'] ) ? $children[0][\'id\'] : $default;
$url = $modx->makeUrl($targetid,\'\',\'\',\'full\');

return $modx->sendRedirect($url);',
    ),
  ),
  'b6006ee54ac20381e8cb722784625071' => 
  array (
    'files' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/core/components',
    ),
  ),
);