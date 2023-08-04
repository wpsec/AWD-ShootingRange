<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Expires" content="wed, 26 feb 1997 08:21:57 gmt" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<title><?php echo P_Lang("管理员登录");?></title>
	<meta name="author" content="phpok.com" />
	<?php if($config['favicon']){ ?>
	<link rel="shortcut icon" href="<?php echo $config['favicon'];?>" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="css/artdialog.css" />
	<link href="js/slick/slick-theme.css" rel="stylesheet"/>
	<link href="js/slick/slick.css" rel="stylesheet"/>
	<script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','func'=>'mini','ext'=>'jquery.phpok.js,jquery.form.min.js,jquery.artdialog.js,admin.login.js'));?>"></script>
	<script src="js/slick/slick.js" type="text/javascript"></script>
<?php echo $app->plugin_html_ap("phpokhead");?></head>
<body>
<!-- 轮播图 -->
<div class="c-banner">
	<div class="c-wrap">
		<div class="c-item" style="background: url('images/login/1.jpg') no-repeat;background-size:cover;"></div>
		<div class="c-textBox"><p class="c-text">如切如磋，如琢如磨</p></div>
	</div>
	<div class="c-wrap">
		<div class="c-item" style="background: url('images/login/2.jpg') no-repeat;background-size:cover;"></div>
		<div class="c-textBox"><p class="c-text">四季轮转，云卷云舒</p></div>
	</div>
	<div class="c-wrap">
		<div class="c-item" style="background: url('images/login/3.jpg') no-repeat;background-size:cover;"></div>
		<div class="c-textBox"><p class="c-text">大美中华，君之功也</p></div>
	</div>
	<div class="c-wrap">
		<div class="c-item" style="background: url('images/login/4.jpg') no-repeat;background-size:cover;"></div>
		<div class="c-textBox"><p class="c-text">他山之石，可以攻玉</p></div>
	</div>
</div>
<?php if($multiple_language && $langlist){ ?>
<div id="c-language" data-lang="<?php echo $session['admin_lang_id'];?>">
	<div class="c-select clear">
		<p class="c-text fl"><?php echo $langlist[$session['admin_lang_id']];?></p>
		<i class="c-triangle fr"></i>
	</div>
	<ul class="c-option">
		<?php $tmpid["num"] = 0;$langlist=is_array($langlist) ? $langlist : array();$tmpid = array();$tmpid["total"] = count($langlist);$tmpid["index"] = -1;foreach($langlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<li data-lang="<?php echo $key;?>"><a href="javascript:update_lang('<?php echo $key;?>');void(0)"><?php echo $value;?></a></li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<div id="c-content">
	<div class="c-wrap clear">
		<form class="c-form fr" id="adminlogin" onsubmit="return admlogin()">
			<p class="c-title">Welcome</p>
			<div class="c-user">
				<span></span>
				<input type="text" name="user" tabindex="1" placeholder="<?php echo P_Lang("请输入您的账号");?>">
			</div>
			<!-- 密码 -->
			<div class="c-password">
				<span></span>
				<input type="password" name="pass" tabindex="2" placeholder="<?php echo P_Lang("请输入您的密码");?>">
			</div>
			<?php if($vcode){ ?>
			<div class="c-code">
				<span></span>
				<input type="text" name="_code" tabindex="3" placeholder="<?php echo P_Lang("验证码");?>">
				<div class="c-img">
					<img src="images/blank.gif" style="cursor:pointer;" id="src_code">
				</div>
			</div>
			<?php } ?>
			<div class="c-btn">
				<button type="submit"><?php echo P_Lang("管理员登录");?></button>
			</div>
		</form>
	</div>
</div>
<?php if($logo){ ?>
<div style="margin:35px;">
	<div class="logo"><img src="<?php echo $logo;?>" border="0" alt="<?php echo $config['title'];?>" style="width:300px;" /></div>
</div>
<?php } ?>
<?php if($vcode){ ?>
<script type="text/javascript">
$(document).ready(function(){
	window.setTimeout(function(){
		login_code('admin');
	}, 500);
	$("#src_code").click(function(){
		login_code('admin');
	})
});
</script>
<?php } ?>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>
