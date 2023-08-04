<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><style type="text/css">
.CodeMirror{border:1px solid #ccc;<?php echo $_rs['form_style'];?>;}
.CodeMirror-scroll{width:<?php echo $_rs['width'];?>px;height:<?php echo $_rs['height'];?>px;}
</style>
<table cellpadding="0" cellspacing="0" style="width:auto;height:auto;border:0;" border="0">
<tr>
	<td><textarea id="<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"><?php echo $_rs['content'];?></textarea></td>
</tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
	var delay;
	var code_editor_<?php echo $_rs['identifier'];?> = CodeMirror.fromTextArea(document.getElementById("<?php echo $_rs['identifier'];?>"),{
		lineNumbers		: true,
		matchBrackets	: true,
		lineWrapping	: true,
		indentWithTabs	: true,
		indentUnit		: 4,
		onChange		: function(n){
			$("#<?php echo $_rs['identifier'];?>").val(code_editor_<?php echo $_rs['identifier'];?>.getValue());
		}
	});
});
</script>