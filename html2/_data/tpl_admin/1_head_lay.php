<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Expires" content="wed, 26 feb 1997 08:21:57 gmt" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <title><?php if($title){ ?><?php echo $title;?> - <?php } ?><?php echo $site_info['title'] ? $site_info['title'] : $config['title'];?>_<?php echo P_Lang("后台管理");?></title>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="phpok-copyright" content="<?php echo $license;?>" />
    <meta name="phpok-version" content="<?php echo $version;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <?php if($config['favicon']){ ?>
	<link rel="shortcut icon" href="<?php echo $config['favicon'];?>" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="css/css.php?type=<?php echo $csstype ? $csstype : 'admin';?>" />
    <link rel="stylesheet" href="static/admin/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="static/admin/style/admin.css" media="all" />
    <link rel="stylesheet" href="css/extadmin.css" media="all" />
    <?php echo phpok_head_css();?>
    <script type="text/javascript" src="static/admin/layui/layui.all.js"></script>
    <?php $js_ext = 'admin.'.$sys['ctrl'].'.js,admin.'.$sys['ctrl'].'-'.$sys['func'].'.js';?>
    <script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','_ctrl'=>$sys['ctrl'],'_func'=>$sys['func'],'ext'=>$js_ext));?>"></script>
    <?php if($js){ ?>
    <?php $tmp = explode(",",$js);?>
    <?php $tmpid["num"] = 0;$tmp=is_array($tmp) ? $tmp : array();$tmpid = array();$tmpid["total"] = count($tmp);$tmpid["index"] = -1;foreach($tmp as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
    <script type="text/javascript" src="<?php echo $value;?>"></script>
    <?php } ?>
    <?php } ?>
	<?php echo phpok_head_js();?>
    <?php echo $app->plugin_html_ap("head");?>
<?php echo $app->plugin_html_ap("phpokhead");?></head>
<body<?php if($overflowy){ ?> style="overflow-y:hidden"<?php } ?>>
<div class="layui-fluid"<?php if($nopadding){ ?> style="padding:0;"<?php } ?>>
