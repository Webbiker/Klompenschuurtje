MODx.panel.Snippet=function(A){A=A||{};Ext.applyIf(A,{url:MODx.config.connectors_url+"element/snippet.php",baseParams:{},id:"modx-panel-snippet",class_key:"modSnippet",plugin:"",bodyStyle:"",allowDrop:false,items:[{html:"<h2>"+_("snippet_new")+"</h2>",id:"modx-snippet-header",cls:"modx-page-header",border:false},MODx.getPageStructure([{title:_("snippet_title"),defaults:{border:false,msgTarget:"side"},bodyStyle:"padding: 15px;",layout:"form",id:"modx-snippet-form",labelWidth:150,items:[{html:"<p>"+_("snippet_msg")+"</p>",id:"modx-snippet-msg"},{xtype:"hidden",name:"id",id:"modx-snippet-id",value:A.snippet},{xtype:"hidden",name:"props",id:"modx-snippet-props",value:A.record.props||null},{xtype:"textfield",fieldLabel:_("snippet_name"),name:"name",id:"modx-snippet-name",width:300,maxLength:255,enableKeyEvents:true,allowBlank:false,value:A.record.name,listeners:{keyup:{scope:this,fn:function(B,C){Ext.getCmp("modx-snippet-header").getEl().update("<h2>"+_("snippet")+": "+B.getValue()+"</h2>");}}}},{xtype:"textfield",fieldLabel:_("snippet_desc"),name:"description",id:"modx-snippet-description",width:300,maxLength:255,value:A.record.description||""},{xtype:"modx-combo-category",fieldLabel:_("category"),name:"category",id:"modx-snippet-category",width:250,value:A.record.category||0},{xtype:"checkbox",fieldLabel:_("snippet_lock"),description:_("snippet_lock_msg"),name:"locked",id:"modx-snippet-locked",inputValue:1,checked:A.record.locked||0},{xtype:"checkbox",fieldLabel:_("clear_cache_on_save"),description:_("clear_cache_on_save_msg"),name:"clearCache",id:"modx-snippet-clear-cache",inputValue:1,checked:Ext.isDefined(A.record.clearCache)||true},{html:MODx.onSnipFormRender,border:false},{html:"<br />"+_("snippet_code")},{xtype:"textarea",hideLabel:true,name:"snippet",id:"modx-snippet-snippet",width:"95%",height:400,value:A.record.snippet||"<?php\n"}]},{xtype:"modx-panel-element-properties",elementPanel:"modx-panel-snippet",elementId:A.snippet,elementType:"modSnippet"}],{id:"modx-snippet-tabs"})],useLoadingMask:true,listeners:{setup:{fn:this.setup,scope:this},success:{fn:this.success,scope:this},beforeSubmit:{fn:this.beforeSubmit,scope:this}}});MODx.panel.Snippet.superclass.constructor.call(this,A);};Ext.extend(MODx.panel.Snippet,MODx.FormPanel,{initialized:false,setup:function(){if(!this.initialized){this.getForm().setValues(this.config.record);}if(!Ext.isEmpty(this.config.record.name)){Ext.getCmp("modx-snippet-header").getEl().update("<h2>"+_("snippet")+": "+this.config.record.name+"</h2>");}if(!Ext.isEmpty(this.config.record.properties)){var B=this.config.record.properties;var A=Ext.getCmp("modx-grid-element-properties");if(A){A.defaultProperties=B;A.getStore().loadData(B);}}this.fireEvent("ready",this.config.record);if(MODx.onLoadEditor){MODx.onLoadEditor(this);}this.clearDirty();this.initialized=true;return true;},beforeSubmit:function(A){this.cleanupEditor();Ext.apply(A.form.baseParams,{propdata:Ext.getCmp("modx-grid-element-properties").encode()});return this.fireEvent("save",{values:this.getForm().getValues(),stay:MODx.config.stay});},success:function(C){if(MODx.request.id){Ext.getCmp("modx-grid-element-properties").save();}this.getForm().setValues(C.result.object);var B=Ext.getCmp("modx-element-tree");if(B){var D=Ext.getCmp("modx-snippet-category").getValue();var A=D!=""&&D!=null?"n_snippet_category_"+D:"n_type_snippet";B.refreshNode(A,true);}},changeEditor:function(){this.cleanupEditor();this.on("success",function(C){var D=C.result.object.id;var A=Ext.getCmp("modx-snippet-which-editor").getValue();MODx.request.a=MODx.action["element/snippet/update"];var B="?"+Ext.urlEncode(MODx.request)+"&which_editor="+A+"&id="+D;location.href=B;});this.submit();},cleanupEditor:function(){if(MODx.onSaveEditor){var A=Ext.getCmp("modx-snippet-snippet");MODx.onSaveEditor(A);}}});Ext.reg("modx-panel-snippet",MODx.panel.Snippet);