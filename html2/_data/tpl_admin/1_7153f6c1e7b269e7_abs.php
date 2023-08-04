<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("要进入文件管理，请输入管理员二次密码进行验证，才能执行此操作");?>
	</div>
	<div class="layui-card-body">
		<form method="post" class="layui-form" id="post_save" onsubmit="return $.admin_filemanage.vcode_act()">
		<div class="layui-inline">
			<label class="layui-form-label">
				<?php echo P_Lang("二次密码");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="password" name="vcode" id="vcode" value="" class="layui-input" />
			</div>
			<div class="layui-input-inline auto">
				<input type="submit" value="提交认证" onclick="" class="layui-btn layui-btn-sm" />
			</div>
		</div>
		</form>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>