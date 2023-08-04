<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php if($_laydate){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" onchange="$.phpokform.laydate_format('<?php echo $_rs['identifier'];?>','<?php echo $_rs['form_btn'];?>')" lay-key="laydate_<?php echo $_rs['identifier'];?>" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo $_laydate_button;?>" class="layui-btn layui-btn-sm" id="btn_<?php echo $_rs['identifier'];?>_<?php echo $_rs['form_btn'];?>" onclick="$.phpokform.laydate_button('<?php echo $_rs['identifier'];?>','<?php echo $_rs['form_btn'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php } ?>
<?php if($_rs['form_btn'] == "file"){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("选择文件");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_file_select('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("下载");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_file_download('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php }elseif($_rs['form_btn'] == "image"){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("选择图片");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_image_select('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("预览");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_image_preview('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php }elseif($_rs['form_btn'] == "video"){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("选择视频");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_video_select('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("预览");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_video_preview('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php }elseif($_rs['form_btn'] == "url"){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("首页");?>" class="layui-btn layui-btn-sm" onclick="$('#<?php echo $_rs['identifier'];?>').val('index.php')" />
			<input type="button" value="<?php echo P_Lang("网址库");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_url_select('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("访问");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_url_open('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php }elseif($_rs['form_btn'] == "user"){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> readonly value="<?php echo $_rs['content'];?>" onclick="$.dialog.alert('<?php echo P_Lang("会员禁止手动输入");?>')" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("会员库");?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_user_select('<?php echo $_rs['identifier'];?>')" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>');" />
		</div>
	</li>
</ul>
<?php }elseif($_rs['form_btn'] == 'color'){ ?>
<ul class="layout">
	<li><input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" /></li>
	<li><input type="button" value=" " id="preview_color_<?php echo $_rs['identifier'];?>" style="width:30px;height:30px;border:0;margin:0;padding:0;display:block;" /></li>
	<li style="margin-top:3px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("颜色选择");?>" class="layui-btn layui-btn-sm jscolor {valueElement:'<?php echo $_rs['identifier'];?>', styleElement:'preview_color_<?php echo $_rs['identifier'];?>',required:false<?php if($_rs['ext_include_3']){ ?>,hash:true<?php } ?>}" />
			<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>')" />
		</div>
	</li>
</ul>
<?php }elseif(!$_rs['form_btn']){ ?>
	<input type="text" id="<?php echo $_rs['identifier'];?>" class="layui-input inp inp_<?php echo $_rs['identifier'];?>" name="<?php echo $_rs['identifier'];?>"<?php if($_rs['form_style']){ ?> style="<?php echo $_rs['form_style'];?>"<?php } ?> value="<?php echo $_rs['content'];?>" />
	<?php if($_rs['ext_quick_words']){ ?>
			<div class="layui-btn-group" style="margin-top:3px;">
				<?php $tmpid["num"] = 0;$_rs['ext_quick_words']=is_array($_rs['ext_quick_words']) ? $_rs['ext_quick_words'] : array();$tmpid = array();$tmpid["total"] = count($_rs['ext_quick_words']);$tmpid["index"] = -1;foreach($_rs['ext_quick_words'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<input type="button" value="<?php echo $value['show'];?>" class="layui-btn layui-btn-sm" onclick="$.phpokform.text_button_quickwords('<?php echo $_rs['identifier'];?>','<?php echo $value['id'];?>','<?php echo $_rs['ext_quick_type'];?>')" />
				<?php } ?>
				<input type="button" value="<?php echo P_Lang("清除");?>" class="layui-btn layui-btn-sm layui-btn-warm" onclick="$.phpokform.clear('<?php echo $_rs['identifier'];?>')" />
			</div>
	
	<?php } ?>
<?php } ?>
