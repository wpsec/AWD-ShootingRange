<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="post_save" onsubmit="return $.admin_dirtywords.save()">
<div class="layui-card">
	<div class="layui-card-body">
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("敏感词");?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;">一行一个词语，所有符合要求的词语将会弹出提示，主要是标题及内容框</div>
			<div class="layui-input-block">
				<textarea name="content" id="content" style="width:100%;min-height:500px;line-height:170%;"><?php echo $content;?></textarea>
			</div>
		</div>
		<div class="submit-info-clear"></div>
		<div class="submit-info">
			<div class="layui-container center">
				<input type="submit" value="<?php echo P_Lang("保存数据");?>" class="layui-btn layui-btn-danger" id="save_button" />
				<input type="button" value="<?php echo P_Lang("关闭");?>" class="layui-btn layui-btn-primary" onclick="$.admin.close()" />
			</div>
		</div>
	</div>
</div>

</form>

<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>