<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="<?php echo $_rs['identifier'];?>" id="<?php echo $_rs['identifier'];?>" value="<?php echo $_rs['content'];?>" />
<input type="hidden" id="<?php echo $_rs['identifier'];?>_status" value="" />
<style type="text/css">
.<?php echo $_rs['identifier'];?>_thumb{float:left;width:144px;margin:3px 5px;padding:1px;border:1px solid #ccc;border-radius:3px;position:relative;}
.<?php echo $_rs['identifier'];?>_thumb img{padding:2px;}
.<?php echo $_rs['identifier'];?>_thumb .sort{position:absolute;right:5px;top:5px;}
.<?php echo $_rs['identifier'];?>_thumb .sort input.taxis{width:40px;border:1px solid #ccc;border-radius:3px;height:22px;text-align:center;padding:3px;}
</style>

<div class="_e_upload">
	<div class="_select">
		<div id="<?php echo $_rs['identifier'];?>_picker"></div>
		<div class="clear"></div>
	</div>
	<div class="_progress" id="<?php echo $_rs['identifier'];?>_progress"></div>
	<div class="_list" id="<?php echo $_rs['identifier'];?>_list"></div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
var obj_<?php echo $_rs['identifier'];?>;
$(document).ready(function(){
	$.dialog.data('upload-<?php echo $_rs['identifier'];?>','');
	obj_<?php echo $_rs['identifier'];?> = new $.www_upload({
		'id':'<?php echo $_rs['identifier'];?>',
		'server':'<?php echo phpok_url(array('ctrl'=>'upload','func'=>'save','cateid'=>$_rs['cate_id']));?>',
		'pick':{'id':'#<?php echo $_rs['identifier'];?>_picker','multiple':<?php echo $_rs['is_multiple'] ? 'true' : 'false';?>,'innerHTML':'<?php echo P_Lang("选择本地文件");?>'},
		'resize':false,
		'multiple':"<?php echo $_rs['is_multiple'] ? 'true' : 'false';?>",
		"formData":{'<?php echo session_name();?>':'<?php echo session_id();?>'},
		'fileVal':'upfile',
		'disableGlobalDnd':true,
		'compress':<?php echo $_rs['upload_compress'];?>,
		'sendAsBinary':<?php echo $_rs['upload_binary'];?>,
		'auto':true,
		'accept':{'title':'<?php echo $_rs['upload_type']['title'];?>(<?php echo $_rs['upload_type']['swfupload'];?>)','extensions':'<?php echo $_rs['upload_type']['ext'];?>'},
		'fileSingleSizeLimit':'<?php echo $_rs['upload_type']['maxsize'];?>'
	});
	obj_<?php echo $_rs['identifier'];?>.showhtml();
});
</script>