<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="expires" content="wed, 26 feb 1997 08:21:57 gmt" />
	<?php if($app->is_mobile){ ?>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<?php } ?>
	<title><?php echo $title;?></title>
	<base href="<?php echo $sys['url'];?>" />
	<link rel="stylesheet" type="text/css" href="css/tips.css" />
<?php echo $app->plugin_html_ap("phpokhead");?></head>
<body>
<div class="body">
	<div class="tips <?php echo $type;?>">
		<?php if($url){ ?>
		<div class="title"><?php echo $tips;?></div>
		<div class="note"><span class="red"><?php echo $time;?>s</span> 后系统会自动跳转，手动跳转请 <a href="<?php echo $url;?>">点这里</a></div>
		<?php } else { ?>
		<div class="txt"><?php echo $tips;?></div>
		<?php } ?>
	</div>
</div>
<?php if($url){ ?>
<script type="text/javascript">
var url = "<?php echo $url;?>";
var mtime = <?php echo $time;?> * 1000;
function refresh()
{
	url = url.replace(/&amp;/g,"&");
	window.location.href = url;
}
window.setTimeout("refresh()",mtime);
</script>
<?php } ?>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>
