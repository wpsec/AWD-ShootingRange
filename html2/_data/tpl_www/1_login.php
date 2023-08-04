<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","会员登录"); ?><?php $this->output("head","file",true,false); ?>
<div class="main main-single main-login am-animation-scale-up">
	<form class="am-form" onsubmit="return $.user.login_ok()" method="post" id="login-submit">
		<input type="hidden" name="_back" id="_back" value="<?php echo $_back;?>" />
		<fieldset>
			<legend>会员登录</legend>
			<div class="am-form-group">
				<label for="doc-ipt-email-1">账号</label>
				<input type="text" class="" id="doc-ipt-email-1" name="user" placeholder="请输入账号/邮箱/手机号" />
			</div>
			<div class="am-form-group">
				<label for="doc-ipt-pwd-1">密码</label>
				<input type="password" id="doc-ipt-pwd-1" name="pass" placeholder="请输入密码" />
			</div>
			<?php if($is_vcode){ ?>
			<div class="am-form-group">
				<label for="_chkcode">验证码 <img src="" border="0" align="absmiddle" id="vcode" class="hand" /></label>
				<input type="text" name="_chkcode" id="_chkcode" placeholder="请输入图片上的数字" />
				
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$("#vcode").phpok_vcode();
				$("#vcode").click(function(){
					$(this).phpok_vcode();
				});
			});
			</script>
			<?php } ?>
			<div class="am-form-group">
				<button type="submit" class="am-btn am-btn-primary">登录</button>
				<div class="am-fr">
					<a href="<?php echo $sys['url'];?>" class="am-btn am-btn-default am-btn-xs">返回首页</a>
				</div>
			</div>
			<div class="am-form-group">
				<a href="<?php echo phpok_url(array('ctrl'=>'register'));?>" class="am-btn am-btn-warning am-btn-xs"><i class="am-icon-user"></i> 新会员注册</a>
				<?php if($login_sms){ ?><a href="<?php echo phpok_url(array('ctrl'=>'login','func'=>'sms'));?>" class="am-btn am-btn-default am-btn-xs"><i class="am-icon-mobile"></i> 短信登录</a><?php } ?>
				<?php if($login_email){ ?><a href="<?php echo phpok_url(array('ctrl'=>'login','func'=>'email'));?>" class="am-btn am-btn-default am-btn-xs"><i class="am-icon-envelope-o"></i> 邮件登录</a><?php } ?>
				<?php if($login_sms || $login_email){ ?><a href="<?php echo phpok_url(array('ctrl'=>'login','func'=>'getpass'));?>" class="am-btn am-btn-default am-btn-xs"><i class="am-icon-refresh"></i> 找回密码</a><?php } ?>
			</div>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("body").css('background-color','#EFEFEF');
});
</script>
<?php $this->output("foot","file",true,false); ?>