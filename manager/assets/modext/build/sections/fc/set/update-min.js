MODx.page.UpdateFCSet=function(A){A=A||{};Ext.applyIf(A,{formpanel:"modx-panel-fc-set",actions:{"new":MODx.action["security/forms/set/create"],edit:MODx.action["security/forms/set/update"],cancel:MODx.action["security/forms"]},buttons:[{process:"update",text:_("save"),method:"remote",checkDirty:false,keys:[{key:MODx.config.keymap_save||"s",alt:true,ctrl:true}]},"-",{process:"cancel",text:_("cancel"),params:{a:MODx.action["security/forms/profile/update"],id:A.record.profile}},"-",{text:_("help_ex"),handler:MODx.loadHelpPane}],components:[{xtype:"modx-panel-fc-set",renderTo:"modx-panel-fc-set-div",record:A.record||{},baseParams:{action:"update",id:A.id}}]});MODx.page.UpdateFCSet.superclass.constructor.call(this,A);};Ext.extend(MODx.page.UpdateFCSet,MODx.Component);Ext.reg("modx-page-fc-set-update",MODx.page.UpdateFCSet);