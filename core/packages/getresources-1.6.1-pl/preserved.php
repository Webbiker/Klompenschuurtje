<?php return array (
  'a90c6a7ead495f4abc9142ae95e9ca33' => 
  array (
    'criteria' => 
    array (
      'name' => 'getResources',
    ),
    'object' => 
    array (
      'id' => 15,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getResources',
      'description' => '<strong>1.3.0-pl</strong> A general purpose Resource listing and summarization snippet for MODx Revolution',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '/**
 * getResources
 *
 * A general purpose Resource listing and summarization snippet for MODX 2.x.
 *
 * @author Jason Coward
 * @copyright Copyright 2010-2011, Jason Coward
 * @version 1.3.0-pl - March 28, 2011
 *
 * TEMPLATES
 *
 * tpl - Name of a chunk serving as a resource template
 * [NOTE: if not provided, properties are dumped to output for each resource]
 *
 * tplOdd - (Opt) Name of a chunk serving as resource template for resources with an odd idx value
 * (see idx property)
 * tplFirst - (Opt) Name of a chunk serving as resource template for the first resource (see first
 * property)
 * tplLast - (Opt) Name of a chunk serving as resource template for the last resource (see last
 * property)
 * tpl_{n} - (Opt) Name of a chunk serving as resource template for the nth resource
 *
 * SELECTION
 *
 * parents - Comma-delimited list of ids serving as parents
 *
 * depth - (Opt) Integer value indicating depth to search for resources from each parent [default=10]
 *
 * tvFilters - (Opt) Delimited-list of TemplateVar values to filter resources by. Supports two
 * delimiters and two value search formats. THe first delimiter || represents a logical OR and the
 * primary grouping mechanism.  Within each group you can provide a comma-delimited list of values.
 * These values can be either tied to a specific TemplateVar by name, e.g. myTV==value, or just the
 * value, indicating you are searching for the value in any TemplateVar tied to the Resource. An
 * example would be &tvFilters=`filter2==one,filter1==bar%||filter1==foo`
 * [NOTE: filtering by values uses a LIKE query and % is considered a wildcard.]
 * [NOTE: this only looks at the raw value set for specific Resource, i. e. there must be a value
 * specifically set for the Resource and it is not evaluated.]
 *
 * where - (Opt) A JSON expression of criteria to build any additional where clauses from. An example would be
 * &where=`{{"alias:LIKE":"foo%", "OR:alias:LIKE":"%bar"},{"OR:pagetitle:=":"foobar", "AND:description:=":"raboof"}}`
 *
 * sortby - (Opt) Field to sort by or a JSON array, e.g. {"publishedon":"ASC","createdon":"DESC"} [default=publishedon]
 * sortbyTV - (opt) A Template Variable name to sort by (if supplied, this precedes the sortby value) [default=]
 * sortbyTVType - (Opt) A data type to CAST a TV Value to in order to sort on it properly [default=string]
 * sortbyAlias - (Opt) Query alias for sortby field [default=]
 * sortbyEscaped - (Opt) Escapes the field name(s) specified in sortby [default=0]
 * sortdir - (Opt) Order which to sort by [default=DESC]
 * sortdirTV - (Opt) Order which to sort by a TV [default=DESC]
 * limit - (Opt) Limits the number of resources returned [default=5]
 * offset - (Opt) An offset of resources returned by the criteria to skip [default=0]
 *
 * OPTIONS
 *
 * includeContent - (Opt) Indicates if the content of each resource should be returned in the
 * results [default=0]
 * includeTVs - (Opt) Indicates if TemplateVar values should be included in the properties available
 * to each resource template [default=0]
 * processTVs - (Opt) Indicates if TemplateVar values should be rendered as they would on the
 * resource being summarized [default=0]
 * tvPrefix - (Opt) The prefix for TemplateVar properties [default=tv.]
 * idx - (Opt) You can define the starting idx of the resources, which is an property that is
 * incremented as each resource is rendered [default=1]
 * first - (Opt) Define the idx which represents the first resource (see tplFirst) [default=1]
 * last - (Opt) Define the idx which represents the last resource (see tplLast) [default=# of
 * resources being summarized + first - 1]
 * outputSeparator - (Opt) An optional string to separate each tpl instance [default="\\n"]
 *
 */
$output = array();
$outputSeparator = isset($outputSeparator) ? $outputSeparator : "\\n";

/* set default properties */
$tpl = !empty($tpl) ? $tpl : \'\';
$includeContent = !empty($includeContent) ? true : false;
$includeTVs = !empty($includeTVs) ? true : false;
$processTVs = !empty($processTVs) ? true : false;
$tvPrefix = isset($tvPrefix) ? $tvPrefix : \'tv.\';
$parents = (!empty($parents) || $parents === \'0\') ? explode(\',\', $parents) : array($modx->resource->get(\'id\'));
$depth = isset($depth) ? (integer) $depth : 10;
$children = array();
foreach ($parents as $parent) {
    $pchildren = $modx->getChildIds($parent, $depth);
    if (!empty($pchildren)) $children = array_merge($children, $pchildren);
}
if (!empty($children)) $parents = array_merge($parents, $children);

$tvFilters = !empty($tvFilters) ? explode(\'||\', $tvFilters) : array();

$where = !empty($where) ? $modx->fromJSON($where) : array();
$showUnpublished = !empty($showUnpublished) ? true : false;
$showDeleted = !empty($showDeleted) ? true : false;

$sortby = isset($sortby) ? $sortby : \'publishedon\';
$sortbyTV = isset($sortbyTV) ? $sortbyTV : \'\';
$sortbyAlias = isset($sortbyAlias) ? $sortbyAlias : \'modResource\';
$sortbyEscaped = !empty($sortbyEscaped) ? true : false;
$sortdir = isset($sortdir) ? $sortdir : \'DESC\';
$sortdirTV = isset($sortdirTV) ? $sortdirTV : \'DESC\';
$limit = isset($limit) ? (integer) $limit : 5;
$offset = isset($offset) ? (integer) $offset : 0;
$totalVar = !empty($totalVar) ? $totalVar : \'total\';

/* build query */
$contextResourceTbl = $modx->getTableName(\'modContextResource\');

/* multiple context support */
if (!empty($context)) {
    $context = explode(\',\',$context);
    $contexts = array();
    foreach ($context as $ctx) {
        $contexts[] = $modx->quote($ctx);
    }
    $context = implode(\',\',$contexts);
    unset($contexts,$ctx);
} else {
    $context = $modx->quote($modx->context->get(\'key\'));
}
$criteria = $modx->newQuery(\'modResource\', array(
    "modResource.parent IN (" . implode(\',\', $parents) . ")"
    ,"(modResource.context_key IN ({$context}) OR EXISTS(SELECT 1 FROM {$contextResourceTbl} ctx WHERE ctx.resource = modResource.id AND ctx.context_key IN ({$context})))"
));
if (empty($showDeleted)) {
    $criteria->andCondition(array(\'deleted\' => \'0\'));
}
if (empty($showUnpublished)) {
    $criteria->andCondition(array(\'published\' => \'1\'));
}
if (empty($showHidden)) {
    $criteria->andCondition(array(\'hidemenu\' => \'0\'));
}
if (!empty($hideContainers)) {
    $criteria->andCondition(array(\'isfolder\' => \'0\'));
}
/* include/exclude resources, via &resources=`123,-456` prop */
if (!empty($resources)) {
    $resources = explode(\',\',$resources);
    $include = array();
    $exclude = array();
    foreach ($resources as $resource) {
        $resource = (int)$resource;
        if ($resource == 0) continue;
        if ($resource < 0) {
            $exclude[] = abs($resource);
        } else {
            $include[] = $resource;
        }
    }
    if (!empty($include)) {
        $criteria->orCondition(array(\'modResource.id:IN\' => $include),null,10);
    }
    if (!empty($exclude)) {
        $criteria->andCondition(array(\'modResource.id NOT IN (\'.implode(\',\',$exclude).\')\'));
    }
}
if (!empty($tvFilters)) {
    $tmplVarTbl = $modx->getTableName(\'modTemplateVar\');
    $tmplVarResourceTbl = $modx->getTableName(\'modTemplateVarResource\');
    $conditions = array();
    foreach ($tvFilters as $fGroup => $tvFilter) {
        $filterGroup = count($tvFilters) > 1 ? $fGroup + 1 : 0;
        $filters = explode(\',\', $tvFilter);
        foreach ($filters as $filter) {
            $f = explode(\'==\', $filter);
            if (count($f) == 2) {
                $tvName = $modx->quote($f[0]);
                $tvValue = $modx->quote($f[1]);
                $conditions[$filterGroup][] = "EXISTS (SELECT 1 FROM {$tmplVarResourceTbl} tvr JOIN {$tmplVarTbl} tv ON tvr.value LIKE {$tvValue} AND tv.name = {$tvName} AND tv.id = tvr.tmplvarid WHERE tvr.contentid = modResource.id)";
            } elseif (count($f) == 1) {
                $tvValue = $modx->quote($f[0]);
                $conditions[$filterGroup][] = "EXISTS (SELECT 1 FROM {$tmplVarResourceTbl} tvr JOIN {$tmplVarTbl} tv ON tvr.value LIKE {$tvValue} AND tv.id = tvr.tmplvarid WHERE tvr.contentid = modResource.id)";
            }
        }
    }
    if (!empty($conditions)) {
        foreach ($conditions as $cGroup => $c) {
            if ($cGroup > 0) {
                $criteria->orCondition($c, null, $cGroup);
            } else {
                $criteria->andCondition($c);
            }
        }
    }
}
if (!empty($where)) {
    $criteria->where($where);
}

$total = $modx->getCount(\'modResource\', $criteria);
$modx->setPlaceholder($totalVar, $total);

$fields = array_keys($modx->getFields(\'modResource\'));
if (empty($includeContent)) {
    $fields = array_diff($fields, array(\'content\'));
}
$columns = $includeContent ? $modx->getSelectColumns(\'modResource\', \'modResource\') : $modx->getSelectColumns(\'modResource\', \'modResource\', \'\', array(\'content\'), true);
$criteria->select($columns);
if (!empty($sortbyTV)) {
    $criteria->leftJoin(\'modTemplateVar\', \'tvDefault\', array(
        "tvDefault.name" => $sortbyTV
    ));
    $criteria->leftJoin(\'modTemplateVarResource\', \'tvSort\', array(
        "tvSort.contentid = modResource.id",
        "tvSort.tmplvarid = tvDefault.id"
    ));
    if (empty($sortbyTVType)) $sortbyTVType = \'string\';
    if ($modx->getOption(\'dbtype\') === \'mysql\') {
        switch ($sortbyTVType) {
            case \'integer\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS SIGNED INTEGER) AS sortTV");
                break;
            case \'decimal\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS DECIMAL) AS sortTV");
                break;
            case \'datetime\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS DATETIME) AS sortTV");
                break;
            case \'string\':
            default:
                $criteria->select("IFNULL(tvSort.value, tvDefault.default_text) AS sortTV");
                break;
        }
    } elseif ($modx->getOption(\'dbtype\') === \'sqlsrv\') {
        switch ($sortbyTVType) {
            case \'integer\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS BIGINT) AS sortTV");
                break;
            case \'decimal\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS DECIMAL) AS sortTV");
                break;
            case \'datetime\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS DATETIME) AS sortTV");
                break;
            case \'string\':
            default:
                $criteria->select("ISNULL(tvSort.value, tvDefault.default_text) AS sortTV");
                break;
        }
    }
    $criteria->sortby("sortTV", $sortdirTV);
}
if (!empty($sortby)) {
    if (strpos($sortby, \'{\') === 0) {
        $sorts = $modx->fromJSON($sortby);
    } else {
        $sorts = array($sortby => $sortdir);
    }
    if (is_array($sorts)) {
        while (list($sort, $dir) = each($sorts)) {
            if ($sortbyEscaped) $sort = $modx->escape($sort);
            if (!empty($sortbyAlias)) $sort = $modx->escape($sortbyAlias) . ".{$sort}";
            $criteria->sortby($sort, $dir);
        }
    }
}
if (!empty($limit)) $criteria->limit($limit, $offset);

if (!empty($debug)) {
    $criteria->prepare();
    $modx->log(modX::LOG_LEVEL_ERROR, $criteria->toSQL());
}
$collection = $modx->getCollection(\'modResource\', $criteria);

$idx = !empty($idx) ? intval($idx) : 1;
$first = empty($first) && $first !== \'0\' ? 1 : intval($first);
$last = empty($last) ? (count($collection) + $idx - 1) : intval($last);

/* include parseTpl */
include_once $modx->getOption(\'getresources.core_path\',null,$modx->getOption(\'core_path\').\'components/getresources/\').\'include.parsetpl.php\';

foreach ($collection as $resourceId => $resource) {
    $tvs = array();
    if (!empty($includeTVs)) {
        $templateVars =& $resource->getMany(\'TemplateVars\');
        foreach ($templateVars as $tvId => $templateVar) {
            $tvs[$tvPrefix . $templateVar->get(\'name\')] = !empty($processTVs) ? $templateVar->renderOutput($resource->get(\'id\')) : $templateVar->get(\'value\');
        }
    }
    $odd = ($idx & 1);
    $properties = array_merge(
        $scriptProperties
        ,array(
            \'idx\' => $idx
            ,\'first\' => $first
            ,\'last\' => $last
        )
        ,$includeContent ? $resource->toArray() : $resource->get($fields)
        ,$tvs
    );
    $resourceTpl = \'\';
    $tplidx = \'tpl_\' . $idx;
    if (!empty($$tplidx)) $resourceTpl = parseTpl($$tplidx, $properties);
    switch ($idx) {
        case $first:
            if (!empty($tplFirst)) $resourceTpl = parseTpl($tplFirst, $properties);
            break;
        case $last:
            if (!empty($tplLast)) $resourceTpl = parseTpl($tplLast, $properties);
            break;
    }
    if ($odd && empty($resourceTpl) && !empty($tplOdd)) $resourceTpl = parseTpl($tplOdd, $properties);
    if (!empty($tpl) && empty($resourceTpl)) $resourceTpl = parseTpl($tpl, $properties);
    if (empty($resourceTpl)) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $output[]= $chunk->process(array(), \'<pre>\' . print_r($properties, true) .\'</pre>\');
    } else {
        $output[]= $resourceTpl;
    }
    $idx++;
}

/* output */
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\',$scriptProperties,false);
if (!empty($toSeparatePlaceholders)) {
    $modx->setPlaceholders($output,$toSeparatePlaceholders);
    return \'\';
}

$output = implode($outputSeparator, $output);
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
      'locked' => 0,
      'properties' => 'a:31:{s:3:"tpl";a:6:{s:4:"name";s:3:"tpl";s:4:"desc";s:121:"Name of a chunk serving as a resource template. NOTE: if not provided, properties are dumped to output for each resource.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:6:"tplOdd";a:6:{s:4:"name";s:6:"tplOdd";s:4:"desc";s:100:"Name of a chunk serving as resource template for resources with an odd idx value (see idx property).";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:8:"tplFirst";a:6:{s:4:"name";s:8:"tplFirst";s:4:"desc";s:89:"Name of a chunk serving as resource template for the first resource (see first property).";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:7:"tplLast";a:6:{s:4:"name";s:7:"tplLast";s:4:"desc";s:87:"Name of a chunk serving as resource template for the last resource (see last property).";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:6:"sortby";a:6:{s:4:"name";s:6:"sortby";s:4:"desc";s:153:"A field name to sort by or JSON object of field names and sortdir for each field, e.g. {"publishedon":"ASC","createdon":"DESC"}. Defaults to publishedon.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:11:"publishedon";s:7:"lexicon";N;}s:8:"sortbyTV";a:6:{s:4:"name";s:8:"sortbyTV";s:4:"desc";s:65:"Name of a Template Variable to sort by. Defaults to empty string.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:12:"sortbyTVType";a:6:{s:4:"name";s:12:"sortbyTVType";s:4:"desc";s:72:"An optional type to indicate how to sort on the Template Variable value.";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:4:"text";s:6:"string";s:5:"value";s:6:"string";}i:1;a:2:{s:4:"text";s:7:"integer";s:5:"value";s:7:"integer";}i:2;a:2:{s:4:"text";s:7:"decimal";s:5:"value";s:7:"decimal";}i:3;a:2:{s:4:"text";s:8:"datetime";s:5:"value";s:8:"datetime";}}s:5:"value";s:6:"string";s:7:"lexicon";N;}s:11:"sortbyAlias";a:6:{s:4:"name";s:11:"sortbyAlias";s:4:"desc";s:58:"Query alias for sortby field. Defaults to an empty string.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:13:"sortbyEscaped";a:6:{s:4:"name";s:13:"sortbyEscaped";s:4:"desc";s:82:"Determines if the field name specified in sortby should be escaped. Defaults to 0.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";N;}s:7:"sortdir";a:6:{s:4:"name";s:7:"sortdir";s:4:"desc";s:41:"Order which to sort by. Defaults to DESC.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:3:"ASC";s:5:"value";s:3:"ASC";}i:1;a:2:{s:4:"text";s:4:"DESC";s:5:"value";s:4:"DESC";}}s:5:"value";s:4:"DESC";s:7:"lexicon";N;}s:9:"sortdirTV";a:6:{s:4:"name";s:9:"sortdirTV";s:4:"desc";s:61:"Order which to sort a Template Variable by. Defaults to DESC.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:3:"ASC";s:5:"value";s:3:"ASC";}i:1;a:2:{s:4:"text";s:4:"DESC";s:5:"value";s:4:"DESC";}}s:5:"value";s:4:"DESC";s:7:"lexicon";N;}s:5:"limit";a:6:{s:4:"name";s:5:"limit";s:4:"desc";s:55:"Limits the number of resources returned. Defaults to 5.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"5";s:7:"lexicon";N;}s:6:"offset";a:6:{s:4:"name";s:6:"offset";s:4:"desc";s:56:"An offset of resources returned by the criteria to skip.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";N;}s:9:"tvFilters";a:6:{s:4:"name";s:9:"tvFilters";s:4:"desc";s:778:"Delimited-list of TemplateVar values to filter resources by. Supports two delimiters and two value search formats. THe first delimiter || represents a logical OR and the primary grouping mechanism.  Within each group you can provide a comma-delimited list of values. These values can be either tied to a specific TemplateVar by name, e.g. myTV==value, or just the value, indicating you are searching for the value in any TemplateVar tied to the Resource. An example would be &tvFilters=`filter2==one,filter1==bar%||filter1==foo`. <br />NOTE: filtering by values uses a LIKE query and % is considered a wildcard. <br />ANOTHER NOTE: This only looks at the raw value set for specific Resource, i. e. there must be a value specifically set for the Resource and it is not evaluated.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:5:"depth";a:6:{s:4:"name";s:5:"depth";s:4:"desc";s:88:"Integer value indicating depth to search for resources from each parent. Defaults to 10.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"10";s:7:"lexicon";N;}s:7:"parents";a:6:{s:4:"name";s:7:"parents";s:4:"desc";s:57:"Optional. Comma-delimited list of ids serving as parents.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:14:"includeContent";a:6:{s:4:"name";s:14:"includeContent";s:4:"desc";s:95:"Indicates if the content of each resource should be returned in the results. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:10:"includeTVs";a:6:{s:4:"name";s:10:"includeTVs";s:4:"desc";s:124:"Indicates if TemplateVar values should be included in the properties available to each resource template. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:10:"showHidden";a:6:{s:4:"name";s:10:"showHidden";s:4:"desc";s:85:"Indicates if Resources that are hidden from menus should be shown. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:15:"showUnpublished";a:6:{s:4:"name";s:15:"showUnpublished";s:4:"desc";s:79:"Indicates if Resources that are unpublished should be shown. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:11:"showDeleted";a:6:{s:4:"name";s:11:"showDeleted";s:4:"desc";s:75:"Indicates if Resources that are deleted should be shown. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:9:"resources";a:6:{s:4:"name";s:9:"resources";s:4:"desc";s:177:"A comma-separated list of resource IDs to exclude or include. IDs with a - in front mean to exclude. Ex: 123,-456 means to include Resource 123, but always exclude Resource 456.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:10:"processTVs";a:6:{s:4:"name";s:10:"processTVs";s:4:"desc";s:117:"Indicates if TemplateVar values should be rendered as they would on the resource being summarized. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:8:"tvPrefix";a:6:{s:4:"name";s:8:"tvPrefix";s:4:"desc";s:55:"The prefix for TemplateVar properties. Defaults to: tv.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tv.";s:7:"lexicon";N;}s:3:"idx";a:6:{s:4:"name";s:3:"idx";s:4:"desc";s:120:"You can define the starting idx of the resources, which is an property that is incremented as each resource is rendered.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:5:"first";a:6:{s:4:"name";s:5:"first";s:4:"desc";s:81:"Define the idx which represents the first resource (see tplFirst). Defaults to 1.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:4:"last";a:6:{s:4:"name";s:4:"last";s:4:"desc";s:129:"Define the idx which represents the last resource (see tplLast). Defaults to the number of resources being summarized + first - 1";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:13:"toPlaceholder";a:6:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:85:"If set, will assign the result to this placeholder instead of outputting it directly.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:22:"toSeparatePlaceholders";a:6:{s:4:"name";s:22:"toSeparatePlaceholders";s:4:"desc";s:130:"If set, will assign EACH result to a separate placeholder named by this param suffixed with a sequential number (starting from 0).";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}s:5:"debug";a:6:{s:4:"name";s:5:"debug";s:4:"desc";s:68:"If true, will send the SQL query to the MODx log. Defaults to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;}s:5:"where";a:6:{s:4:"name";s:5:"where";s:4:"desc";s:193:"A JSON expression of criteria to build any additional where clauses from, e.g. &where=`{{"alias:LIKE":"foo%", "OR:alias:LIKE":"%bar"},{"OR:pagetitle:=":"foobar", "AND:description:=":"raboof"}}`";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * getResources
 *
 * A general purpose Resource listing and summarization snippet for MODX 2.x.
 *
 * @author Jason Coward
 * @copyright Copyright 2010-2011, Jason Coward
 * @version 1.3.0-pl - March 28, 2011
 *
 * TEMPLATES
 *
 * tpl - Name of a chunk serving as a resource template
 * [NOTE: if not provided, properties are dumped to output for each resource]
 *
 * tplOdd - (Opt) Name of a chunk serving as resource template for resources with an odd idx value
 * (see idx property)
 * tplFirst - (Opt) Name of a chunk serving as resource template for the first resource (see first
 * property)
 * tplLast - (Opt) Name of a chunk serving as resource template for the last resource (see last
 * property)
 * tpl_{n} - (Opt) Name of a chunk serving as resource template for the nth resource
 *
 * SELECTION
 *
 * parents - Comma-delimited list of ids serving as parents
 *
 * depth - (Opt) Integer value indicating depth to search for resources from each parent [default=10]
 *
 * tvFilters - (Opt) Delimited-list of TemplateVar values to filter resources by. Supports two
 * delimiters and two value search formats. THe first delimiter || represents a logical OR and the
 * primary grouping mechanism.  Within each group you can provide a comma-delimited list of values.
 * These values can be either tied to a specific TemplateVar by name, e.g. myTV==value, or just the
 * value, indicating you are searching for the value in any TemplateVar tied to the Resource. An
 * example would be &tvFilters=`filter2==one,filter1==bar%||filter1==foo`
 * [NOTE: filtering by values uses a LIKE query and % is considered a wildcard.]
 * [NOTE: this only looks at the raw value set for specific Resource, i. e. there must be a value
 * specifically set for the Resource and it is not evaluated.]
 *
 * where - (Opt) A JSON expression of criteria to build any additional where clauses from. An example would be
 * &where=`{{"alias:LIKE":"foo%", "OR:alias:LIKE":"%bar"},{"OR:pagetitle:=":"foobar", "AND:description:=":"raboof"}}`
 *
 * sortby - (Opt) Field to sort by or a JSON array, e.g. {"publishedon":"ASC","createdon":"DESC"} [default=publishedon]
 * sortbyTV - (opt) A Template Variable name to sort by (if supplied, this precedes the sortby value) [default=]
 * sortbyTVType - (Opt) A data type to CAST a TV Value to in order to sort on it properly [default=string]
 * sortbyAlias - (Opt) Query alias for sortby field [default=]
 * sortbyEscaped - (Opt) Escapes the field name(s) specified in sortby [default=0]
 * sortdir - (Opt) Order which to sort by [default=DESC]
 * sortdirTV - (Opt) Order which to sort by a TV [default=DESC]
 * limit - (Opt) Limits the number of resources returned [default=5]
 * offset - (Opt) An offset of resources returned by the criteria to skip [default=0]
 *
 * OPTIONS
 *
 * includeContent - (Opt) Indicates if the content of each resource should be returned in the
 * results [default=0]
 * includeTVs - (Opt) Indicates if TemplateVar values should be included in the properties available
 * to each resource template [default=0]
 * processTVs - (Opt) Indicates if TemplateVar values should be rendered as they would on the
 * resource being summarized [default=0]
 * tvPrefix - (Opt) The prefix for TemplateVar properties [default=tv.]
 * idx - (Opt) You can define the starting idx of the resources, which is an property that is
 * incremented as each resource is rendered [default=1]
 * first - (Opt) Define the idx which represents the first resource (see tplFirst) [default=1]
 * last - (Opt) Define the idx which represents the last resource (see tplLast) [default=# of
 * resources being summarized + first - 1]
 * outputSeparator - (Opt) An optional string to separate each tpl instance [default="\\n"]
 *
 */
$output = array();
$outputSeparator = isset($outputSeparator) ? $outputSeparator : "\\n";

/* set default properties */
$tpl = !empty($tpl) ? $tpl : \'\';
$includeContent = !empty($includeContent) ? true : false;
$includeTVs = !empty($includeTVs) ? true : false;
$processTVs = !empty($processTVs) ? true : false;
$tvPrefix = isset($tvPrefix) ? $tvPrefix : \'tv.\';
$parents = (!empty($parents) || $parents === \'0\') ? explode(\',\', $parents) : array($modx->resource->get(\'id\'));
$depth = isset($depth) ? (integer) $depth : 10;
$children = array();
foreach ($parents as $parent) {
    $pchildren = $modx->getChildIds($parent, $depth);
    if (!empty($pchildren)) $children = array_merge($children, $pchildren);
}
if (!empty($children)) $parents = array_merge($parents, $children);

$tvFilters = !empty($tvFilters) ? explode(\'||\', $tvFilters) : array();

$where = !empty($where) ? $modx->fromJSON($where) : array();
$showUnpublished = !empty($showUnpublished) ? true : false;
$showDeleted = !empty($showDeleted) ? true : false;

$sortby = isset($sortby) ? $sortby : \'publishedon\';
$sortbyTV = isset($sortbyTV) ? $sortbyTV : \'\';
$sortbyAlias = isset($sortbyAlias) ? $sortbyAlias : \'modResource\';
$sortbyEscaped = !empty($sortbyEscaped) ? true : false;
$sortdir = isset($sortdir) ? $sortdir : \'DESC\';
$sortdirTV = isset($sortdirTV) ? $sortdirTV : \'DESC\';
$limit = isset($limit) ? (integer) $limit : 5;
$offset = isset($offset) ? (integer) $offset : 0;
$totalVar = !empty($totalVar) ? $totalVar : \'total\';

/* build query */
$contextResourceTbl = $modx->getTableName(\'modContextResource\');

/* multiple context support */
if (!empty($context)) {
    $context = explode(\',\',$context);
    $contexts = array();
    foreach ($context as $ctx) {
        $contexts[] = $modx->quote($ctx);
    }
    $context = implode(\',\',$contexts);
    unset($contexts,$ctx);
} else {
    $context = $modx->quote($modx->context->get(\'key\'));
}
$criteria = $modx->newQuery(\'modResource\', array(
    "modResource.parent IN (" . implode(\',\', $parents) . ")"
    ,"(modResource.context_key IN ({$context}) OR EXISTS(SELECT 1 FROM {$contextResourceTbl} ctx WHERE ctx.resource = modResource.id AND ctx.context_key IN ({$context})))"
));
if (empty($showDeleted)) {
    $criteria->andCondition(array(\'deleted\' => \'0\'));
}
if (empty($showUnpublished)) {
    $criteria->andCondition(array(\'published\' => \'1\'));
}
if (empty($showHidden)) {
    $criteria->andCondition(array(\'hidemenu\' => \'0\'));
}
if (!empty($hideContainers)) {
    $criteria->andCondition(array(\'isfolder\' => \'0\'));
}
/* include/exclude resources, via &resources=`123,-456` prop */
if (!empty($resources)) {
    $resources = explode(\',\',$resources);
    $include = array();
    $exclude = array();
    foreach ($resources as $resource) {
        $resource = (int)$resource;
        if ($resource == 0) continue;
        if ($resource < 0) {
            $exclude[] = abs($resource);
        } else {
            $include[] = $resource;
        }
    }
    if (!empty($include)) {
        $criteria->orCondition(array(\'modResource.id:IN\' => $include),null,10);
    }
    if (!empty($exclude)) {
        $criteria->andCondition(array(\'modResource.id NOT IN (\'.implode(\',\',$exclude).\')\'));
    }
}
if (!empty($tvFilters)) {
    $tmplVarTbl = $modx->getTableName(\'modTemplateVar\');
    $tmplVarResourceTbl = $modx->getTableName(\'modTemplateVarResource\');
    $conditions = array();
    foreach ($tvFilters as $fGroup => $tvFilter) {
        $filterGroup = count($tvFilters) > 1 ? $fGroup + 1 : 0;
        $filters = explode(\',\', $tvFilter);
        foreach ($filters as $filter) {
            $f = explode(\'==\', $filter);
            if (count($f) == 2) {
                $tvName = $modx->quote($f[0]);
                $tvValue = $modx->quote($f[1]);
                $conditions[$filterGroup][] = "EXISTS (SELECT 1 FROM {$tmplVarResourceTbl} tvr JOIN {$tmplVarTbl} tv ON tvr.value LIKE {$tvValue} AND tv.name = {$tvName} AND tv.id = tvr.tmplvarid WHERE tvr.contentid = modResource.id)";
            } elseif (count($f) == 1) {
                $tvValue = $modx->quote($f[0]);
                $conditions[$filterGroup][] = "EXISTS (SELECT 1 FROM {$tmplVarResourceTbl} tvr JOIN {$tmplVarTbl} tv ON tvr.value LIKE {$tvValue} AND tv.id = tvr.tmplvarid WHERE tvr.contentid = modResource.id)";
            }
        }
    }
    if (!empty($conditions)) {
        foreach ($conditions as $cGroup => $c) {
            if ($cGroup > 0) {
                $criteria->orCondition($c, null, $cGroup);
            } else {
                $criteria->andCondition($c);
            }
        }
    }
}
if (!empty($where)) {
    $criteria->where($where);
}

$total = $modx->getCount(\'modResource\', $criteria);
$modx->setPlaceholder($totalVar, $total);

$fields = array_keys($modx->getFields(\'modResource\'));
if (empty($includeContent)) {
    $fields = array_diff($fields, array(\'content\'));
}
$columns = $includeContent ? $modx->getSelectColumns(\'modResource\', \'modResource\') : $modx->getSelectColumns(\'modResource\', \'modResource\', \'\', array(\'content\'), true);
$criteria->select($columns);
if (!empty($sortbyTV)) {
    $criteria->leftJoin(\'modTemplateVar\', \'tvDefault\', array(
        "tvDefault.name" => $sortbyTV
    ));
    $criteria->leftJoin(\'modTemplateVarResource\', \'tvSort\', array(
        "tvSort.contentid = modResource.id",
        "tvSort.tmplvarid = tvDefault.id"
    ));
    if (empty($sortbyTVType)) $sortbyTVType = \'string\';
    if ($modx->getOption(\'dbtype\') === \'mysql\') {
        switch ($sortbyTVType) {
            case \'integer\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS SIGNED INTEGER) AS sortTV");
                break;
            case \'decimal\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS DECIMAL) AS sortTV");
                break;
            case \'datetime\':
                $criteria->select("CAST(IFNULL(tvSort.value, tvDefault.default_text) AS DATETIME) AS sortTV");
                break;
            case \'string\':
            default:
                $criteria->select("IFNULL(tvSort.value, tvDefault.default_text) AS sortTV");
                break;
        }
    } elseif ($modx->getOption(\'dbtype\') === \'sqlsrv\') {
        switch ($sortbyTVType) {
            case \'integer\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS BIGINT) AS sortTV");
                break;
            case \'decimal\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS DECIMAL) AS sortTV");
                break;
            case \'datetime\':
                $criteria->select("CAST(ISNULL(tvSort.value, tvDefault.default_text) AS DATETIME) AS sortTV");
                break;
            case \'string\':
            default:
                $criteria->select("ISNULL(tvSort.value, tvDefault.default_text) AS sortTV");
                break;
        }
    }
    $criteria->sortby("sortTV", $sortdirTV);
}
if (!empty($sortby)) {
    if (strpos($sortby, \'{\') === 0) {
        $sorts = $modx->fromJSON($sortby);
    } else {
        $sorts = array($sortby => $sortdir);
    }
    if (is_array($sorts)) {
        while (list($sort, $dir) = each($sorts)) {
            if ($sortbyEscaped) $sort = $modx->escape($sort);
            if (!empty($sortbyAlias)) $sort = $modx->escape($sortbyAlias) . ".{$sort}";
            $criteria->sortby($sort, $dir);
        }
    }
}
if (!empty($limit)) $criteria->limit($limit, $offset);

if (!empty($debug)) {
    $criteria->prepare();
    $modx->log(modX::LOG_LEVEL_ERROR, $criteria->toSQL());
}
$collection = $modx->getCollection(\'modResource\', $criteria);

$idx = !empty($idx) ? intval($idx) : 1;
$first = empty($first) && $first !== \'0\' ? 1 : intval($first);
$last = empty($last) ? (count($collection) + $idx - 1) : intval($last);

/* include parseTpl */
include_once $modx->getOption(\'getresources.core_path\',null,$modx->getOption(\'core_path\').\'components/getresources/\').\'include.parsetpl.php\';

foreach ($collection as $resourceId => $resource) {
    $tvs = array();
    if (!empty($includeTVs)) {
        $templateVars =& $resource->getMany(\'TemplateVars\');
        foreach ($templateVars as $tvId => $templateVar) {
            $tvs[$tvPrefix . $templateVar->get(\'name\')] = !empty($processTVs) ? $templateVar->renderOutput($resource->get(\'id\')) : $templateVar->get(\'value\');
        }
    }
    $odd = ($idx & 1);
    $properties = array_merge(
        $scriptProperties
        ,array(
            \'idx\' => $idx
            ,\'first\' => $first
            ,\'last\' => $last
        )
        ,$includeContent ? $resource->toArray() : $resource->get($fields)
        ,$tvs
    );
    $resourceTpl = \'\';
    $tplidx = \'tpl_\' . $idx;
    if (!empty($$tplidx)) $resourceTpl = parseTpl($$tplidx, $properties);
    switch ($idx) {
        case $first:
            if (!empty($tplFirst)) $resourceTpl = parseTpl($tplFirst, $properties);
            break;
        case $last:
            if (!empty($tplLast)) $resourceTpl = parseTpl($tplLast, $properties);
            break;
    }
    if ($odd && empty($resourceTpl) && !empty($tplOdd)) $resourceTpl = parseTpl($tplOdd, $properties);
    if (!empty($tpl) && empty($resourceTpl)) $resourceTpl = parseTpl($tpl, $properties);
    if (empty($resourceTpl)) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $output[]= $chunk->process(array(), \'<pre>\' . print_r($properties, true) .\'</pre>\');
    } else {
        $output[]= $resourceTpl;
    }
    $idx++;
}

/* output */
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\',$scriptProperties,false);
if (!empty($toSeparatePlaceholders)) {
    $modx->setPlaceholders($output,$toSeparatePlaceholders);
    return \'\';
}

$output = implode($outputSeparator, $output);
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
    ),
    'files' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/core/components',
    ),
  ),
);