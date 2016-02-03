<?php /* Smarty version Smarty-3.0.4, created on 2016-01-28 21:57:36
         compiled from "/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/manager/templates/default/element/tv/renders/input/richtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124749423556aa80c0417836-33313251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb6c3f9eefb839b11e318141fd84a4cae52f3f4b' => 
    array (
      0 => '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/manager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1450905016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124749423556aa80c0417836-33313251',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Users/joostbrommert/Sites/GitHub/Klompenschuurtje/core/model/smarty/plugins/modifier.escape.php';
?><textarea id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" class="modx-richtext" onchange="MODx.fireResourceFormChange();"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
</textarea>

<script type="text/javascript">

Ext.onReady(function() {
    
    MODx.makeDroppable(Ext.get('tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'));
    
});
</script>