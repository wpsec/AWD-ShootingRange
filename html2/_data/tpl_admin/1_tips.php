<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>友情提示</title>
<?php if($sys['url']){ ?><base href="<?php echo $sys['url'];?>" /><?php } ?>
<meta name="author" content="phpok.com" />
<link href="css/tips.css<?php if($sys['debug']){ ?>?_noCache=<?php echo str_rand();?><?php } ?>" rel="stylesheet" type="text/css" />
<style type="text/css">
body{font-size:12px;font-family:"Verdana","Microsoft Yahei","Geneva","sans-serif","Arial","Tahoma","HELVETICA";}
</style>
<?php echo $app->plugin_html_ap("phpokhead");?></head>
<body>
<div class="body">
	<div class="tips <?php echo $type;?>">
		<?php if($url){ ?>
		<div class="title"><?php echo $tips;?></div>
		<div class="note"><a href="<?php echo $url;?>"><?php echo P_Lang("系统将在[time]秒后跳转，手动跳转请点这里",array('time'=>'<span style="color:red">'.$time.'</span>'));?></a></div>
		<?php } else { ?>
		<div class="txt" style="line-height:52px;"><?php echo $tips;?></div>
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
