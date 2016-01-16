<?php  return array (
  'attributes' => 'Attributes',
  'capitalize' => 'Capitalize',
  'checkbox' => 'Check Box',
  'checkbox_columns' => 'Columns',
  'checkbox_columns_desc' => 'The number of columns the checkboxes are displayed in.',
  'class' => 'Class',
  'combo_allowaddnewdata' => 'Allow Add New Items',
  'combo_allowaddnewdata_desc' => 'When Yes, allows items to be added that do not already exist in the list. Defaults to No.',
  'combo_forceselection' => 'Force Selection to List',
  'combo_forceselection_desc' => 'If using Type-Ahead, if this is set to Yes, only allow inputting of items in the list.',
  'combo_listempty_text' => 'Empty List Text',
  'combo_listempty_text_desc' => 'If Type-Ahead is on, and the user types a value not in the list, display this text.',
  'combo_listheight' => 'List Height',
  'combo_listheight_desc' => 'The height, in pixels, of the dropdown list itself. Defaults to the height of the combobox.',
  'combo_listwidth' => 'List Width',
  'combo_listwidth_desc' => 'The width, in pixels, of the dropdown list itself. Defaults to the width of the combobox.',
  'combo_maxheight' => 'Max Height',
  'combo_maxheight_desc' => 'The maximum height in pixels of the dropdown list before scrollbars are shown (defaults to 300).',
  'combo_stackitems' => 'Stack Selected Items',
  'combo_stackitems_desc' => 'When set to Yes, the items will be stacked 1 per line. Defaults to No, which displays the items inline.',
  'combo_title' => 'List Header',
  'combo_title_desc' => 'If supplied, a header element is created containing this text and added into the top of the dropdown list.',
  'combo_typeahead' => 'Enable Type-Ahead',
  'combo_typeahead_desc' => 'If yes, populate and autoselect the remainder of the text being typed after a configurable delay (Type-Ahead Delay) if it matches a known value (defaults to off).',
  'combo_typeahead_delay' => 'Type-Ahead Delay',
  'combo_typeahead_delay_desc' => 'The length of time in milliseconds to wait until the Type-Ahead text is displayed if Type-Ahead is enabled (defaults to 250).',
  'date' => 'Date',
  'date_format' => 'Date Format',
  'date_use_current' => 'If no value, use current date',
  'default' => 'Default',
  'delim' => 'Delimiter',
  'delimiter' => 'Delimiter',
  'disabled_dates' => 'Disabled Dates',
  'disabled_dates_desc' => 'A comma-separated list of "dates" to disable, as strings. These strings will be used to build a dynamic regular expression so they are very powerful. Some examples:<br />
- Disable these exact dates: 2003-03-08,2003-09-16<br />
- Disable these days for every year: 03-08,09-16<br />
- Only match the beginning (useful if you are using short years): ^03-08<br />
- Disable every day in March 2006: 03-..-2006<br />
- Disable every day in every March: ^03<br />
Note that the format of the dates included in the list should exactly match the format config. In order to support regular expressions, if you are using a date format that has "." in it, you will have to escape the dot when restricting dates.',
  'disabled_days' => 'Disabled Days',
  'disabled_days_desc' => 'A comma-separated list of days to disable, 0-based (defaults to null). Some examples:<br />
- Disable Sunday and Saturday: 0,6<br />
- Disable weekdays: 1,2,3,4,5',
  'dropdown' => 'DropDown List Menu',
  'earliest_date' => 'Earliest Date',
  'earliest_date_desc' => 'The earliest allowed date that can be selected.',
  'earliest_time' => 'Earliest Time',
  'earliest_time_desc' => 'The earliest allowed time that can be selected.',
  'email' => 'Email',
  'file' => 'File',
  'height' => 'Height',
  'hidden' => 'Hidden',
  'htmlarea' => 'HTML Area',
  'htmltag' => 'HTML Tag',
  'image' => 'Image',
  'image_align' => 'Align',
  'image_align_list' => 'none,baseline,top,middle,bottom,texttop,absmiddle,absbottom,left,right',
  'image_alt' => 'Alternate Text',
  'image_border_size' => 'Border Size',
  'image_hspace' => 'H Space',
  'image_vspace' => 'V Space',
  'latest_date' => 'Latest Date',
  'latest_date_desc' => 'The latest allowed date that can be selected.',
  'latest_time' => 'Latest Time',
  'latest_time_desc' => 'The latest allowed time that can be selected.',
  'listbox' => 'Listbox (Single-Select)',
  'listbox-multiple' => 'Listbox (Multi-Select)',
  'list-multiple-legacy' => 'Legacy multiple list',
  'lower_case' => 'Lower Case',
  'max_length' => 'Max Length',
  'min_length' => 'Min Length',
  'regex_text' => 'Regular Expression Error',
  'regex' => 'Regular Expression Validator',
  'name' => 'Name',
  'number' => 'Number',
  'number_allowdecimals' => 'Allow Decimals',
  'number_allownegative' => 'Allow Negatives',
  'number_decimalprecision' => 'Decimal Precision',
  'number_decimalprecision_desc' => 'The maximum precision to display after the decimal separator (defaults to 2).',
  'number_decimalseparator' => 'Decimal Separator',
  'number_decimalseparator_desc' => 'Character(s) to allow as the decimal separator (defaults to ".")',
  'number_maxvalue' => 'Max Value',
  'number_minvalue' => 'Min Value',
  'option' => 'Radio Options',
  'parent_resources' => 'Parent Resources',
  'radio_columns' => 'Columns',
  'radio_columns_desc' => 'The number of columns the radio boxes are displayed in.',
  'rawtext' => 'Raw Text (deprecated)',
  'rawtextarea' => 'Raw Textarea (deprecated)',
  'required' => 'Allow Blank',
  'required_desc' => 'If set to No, MODX will not allow the user to save the Resource until a valid, non-blank value has been entered.',
  'resourcelist' => 'Resource List',
  'resourcelist_depth' => 'Depth',
  'resourcelist_depth_desc' => 'The levels deep that the query to grab the list of Resources will go. The default is 10 deep.',
  'resourcelist_includeparent' => 'Include Parents',
  'resourcelist_includeparent_desc' => 'If Yes, will include the Resources named in the Parents field in the list.',
  'resourcelist_limitrelatedcontext' => 'Limit to Related Context',
  'resourcelist_limitrelatedcontext_desc' => 'If Yes, will only include the Resources related to the context of the current Resource.',
  'resourcelist_limit' => 'Limit',
  'resourcelist_limit_desc' => 'The number of Resources to limit to in the list. 0 or empty means infinite.',
  'resourcelist_parents' => 'Parents',
  'resourcelist_parents_desc' => 'A list of IDs to grab children for the list.',
  'resourcelist_where' => 'Where Conditions',
  'resourcelist_where_desc' => 'A JSON object of where conditions to filter by in the query that grabs the list of Resources. (Does not support TV searching.)',
  'richtext' => 'RichText',
  'sentence_case' => 'Sentence Case',
  'shownone' => 'Allow Empty Choice',
  'shownone_desc' => 'Allow the user to select an empty choice which is a blank value.',
  'start_day' => 'Start Day',
  'start_day_desc' => 'Day index at which the week should begin, 0-based (defaults to 0, which is Sunday)',
  'string' => 'String',
  'string_format' => 'String Format',
  'style' => 'Style',
  'tag_id' => 'Tag ID',
  'tag_name' => 'Tag Name',
  'target' => 'Target',
  'text' => 'Text',
  'textarea' => 'Textarea',
  'textareamini' => 'Textarea (Mini)',
  'textbox' => 'Textbox',
  'time_increment' => 'Time Increment',
  'time_increment_desc' => 'The number of minutes between each time value in the list (defaults to 15).',
  'hide_time' => 'Hide time option for user',
  'title' => 'Title',
  'upper_case' => 'Upper Case',
  'url' => 'URL',
  'url_display_text' => 'Display Text',
  'width' => 'Width',
);