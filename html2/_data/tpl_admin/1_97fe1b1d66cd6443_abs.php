<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="post_save" onsubmit="return $.admin_wxconfig.save()">
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("公众号参数，主要用于公众号登录");?>
	</div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				开发者ID
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="mp[app_id]" value="<?php echo $rs['mp']['app_id'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即公众号的AppId，请从微信服务号后台【基本配置】里获取");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				开发者密码
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="mp[app_secret]" value="<?php echo $rs['mp']['app_secret'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即公众号的AppSecret，请从微信服务号后台【基本配置】里获取");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				令牌
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="mp[token]" value="<?php echo $rs['mp']['token'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("仅限已启用服务器配置，实现数据接收及推送使用");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				消息密钥
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="mp[token]" value="<?php echo $rs['mp']['token'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("仅限已启用服务器配置，实现消息的加密及解密，即EncodingAESKey");?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("开放平台参数，一般用于扫码登录");?>
	</div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				开发者ID
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="op[app_id]" value="<?php echo $rs['op']['app_id'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即开放平台的AppId，请从微信开放平台里的应用详情获取");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				开发者密码
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="op[app_secret]" value="<?php echo $rs['op']['app_secret'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即开放平台的AppSecret，请从微信开放平台里的应用详情获取");?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("小程序参数");?>
	</div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				小程序ID
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="ap[app_id]" value="<?php echo $rs['ap']['app_id'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即小程序的AppId，请从微信小程序平台里【开发】【开发设置】获取");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				小程序密钥
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="ap[app_secret]" value="<?php echo $rs['ap']['app_secret'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即小程序的AppSecret，请从微信小程序平台里【开发】【开发设置】获取");?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("域名与IP，用于解决域名无法解析到IP的问题");?>
	</div>
	<div class="layui-card-body">
		<?php $tmpid["num"] = 0;$iplist=is_array($iplist) ? $iplist : array();$tmpid = array();$tmpid["total"] = count($iplist);$tmpid["index"] = -1;foreach($iplist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("域名");?>_<?php echo $tmpid['num'];?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;"><?php echo $value['domain'];?></div>
			<div class="layui-input-block">
				<input type="text" name="ip[<?php echo $key;?>]" value="<?php echo $value['ip'];?>" class="layui-input" />
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php if($popedom['setting']){ ?>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("保存数据");?>" class="layui-btn layui-btn-danger" id="save_button" />
		<input type="button" value="<?php echo P_Lang("关闭");?>" class="layui-btn layui-btn-primary" onclick="$.admin.close()" />
		<span style="padding-left:2em;color:#ccc;">保存不会关闭页面，请手动关闭</span>
	</div>
</div>
<?php } ?>

</form>

<?php $this->output("foot_lay","file",true,false); ?>