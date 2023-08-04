<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Expires" content="wed, 26 feb 1997 08:21:57 gmt" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<title><?php if($config['title']){ ?><?php echo $config['title'];?>_<?php } ?><?php echo P_Lang("后台管理");?></title>
	<meta name="renderer" content="webkit" />
	<?php if($config['favicon']){ ?>
	<link rel="shortcut icon" href="<?php echo $config['favicon'];?>" />
	<?php } ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="phpok-copyright" content="<?php echo $license;?>" />
	<meta name="phpok-version" content="<?php echo $version;?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/css.php?type=admin" />
	<link rel="stylesheet" href="<?php echo $sys['webroot'];?>static/admin/layui/css/layui.css" media="all">
	<link rel="stylesheet" href="<?php echo $sys['webroot'];?>static/admin/style/admin.css" media="all">
	<link rel="stylesheet" href="css/extadmin.css" media="all">
	<script type="text/javascript" src="<?php echo $sys['webroot'];?>static/admin/layui/layui.js"></script>
	<script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','_ctrl'=>'index','_func'=>'index'));?>"></script>
	<?php echo $app->plugin_html_ap("head");?>
<?php echo $app->plugin_html_ap("phpokhead");?></head>
<?php if($logo2){ ?>
<style type="text/css">
.layadmin-side-shrink .layui-layout-admin .layui-logo{background-image:url('<?php echo $logo2;?>');}
</style>
<?php } ?>
<body class="layui-layout-body">
	<div id="LAY_app">
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header">
				<!-- 头部区域 -->
				<ul class="layui-nav layui-layout-left">
					<li class="layui-nav-item layadmin-flexible" lay-unselect>
						<a href="javascript:;" layadmin-event="flexible" title="<?php echo P_Lang("侧边伸缩");?>"> <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
						</a>
					</li>
					<li class="layui-nav-item" lay-unselect>
						<a href="javascript:;" layadmin-event="refresh" title="<?php echo P_Lang("刷新");?>"><i class="layui-icon layui-icon-refresh-3"></i> <?php echo P_Lang("刷新");?></a>
					</li>
					<li class="layui-nav-item" lay-unselect>
						<a href="javascript:$.admin_index.layui_refresh();void(0);" title="<?php echo P_Lang("修正渲染");?>"><i class="layui-icon layui-icon-face-smile-b"></i> <?php echo P_Lang("修正渲染");?></a>
					</li>
					<li class="layui-nav-item" lay-unselect>
						<a href="javascript:$.admin_index.clear();void(0);" title="<?php echo P_Lang("清空缓存");?>"><i class="layui-icon layui-icon-fonts-clear"></i> <?php echo P_Lang("清空缓存");?></a>
					</li>
					
				</ul>
				<ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
					<li class="layui-nav-item layui-hide-xs" lay-unselect>
						<a href="<?php echo $sys['www_file'];?>?siteId=<?php echo $session['admin_site_id'];?>" target="_blank" title="<?php echo P_Lang("前台访问");?>"> <i class="layui-icon layui-icon-website"></i> <?php echo P_Lang("访问网站");?></a>
					</li>
					<li class="layui-nav-item layui-hide-xs" lay-unselect>
						<a href="javascript:;" layadmin-event="fullscreen"> <i class="layui-icon layui-icon-screen-full"></i> <?php echo P_Lang("全屏");?></a>
					</li>
					<?php if($sitelist && count($sitelist)>1){ ?>
					<li class="layui-nav-item layui-hide-xs" lay-unselect>
						<a href="javascript:;" style="padding-right:20px;"> <cite><?php echo $config['title'];?></cite></a>
						<dl class="layui-nav-child">
							<?php $tmpid["num"] = 0;$sitelist=is_array($sitelist) ? $sitelist : array();$tmpid = array();$tmpid["total"] = count($sitelist);$tmpid["index"] = -1;foreach($sitelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<dd><a href="<?php echo phpok_url(array('ctrl'=>'index','func'=>'site','id'=>$value['id']));?>"><?php echo $value['id'];?> - <?php echo $value['title'];?></a></dd>
							<?php } ?>
						</dl>
					</li>
					<?php } ?>
					<?php if($sys['multiple_language'] && $langlist){ ?>
					<li class="layui-nav-item" lay-unselect>
						<a href="javascript:;" style="padding-right:20px;"><cite id="lang_title"><?php echo $language;?></cite></a>
						<dl class="layui-nav-child multiple_language">
							<?php $tmpid["num"] = 0;$langlist=is_array($langlist) ? $langlist : array();$tmpid = array();$tmpid["total"] = count($langlist);$tmpid["index"] = -1;foreach($langlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
							<dd<?php if($key == $session['admin_lang_id']){ ?> class="language_selected"<?php } ?>><a href="<?php echo phpok_url(array('ctrl'=>'index','_langid'=>$key));?>"><?php echo $value;?></a></dd>
							<?php } ?>
						</dl>
					</li>
					<?php } ?>
					
					<li class="layui-nav-item" lay-unselect>
						<a href="javascript:;" style="padding-right:20px;"> <cite><?php if($session['admin_rs'] && $session['admin_rs']['fullname']){ ?><?php echo $session['admin_rs']['fullname'];?><?php } else { ?><?php echo $session['admin_account'];?><?php } ?></cite></a>
						<dl class="layui-nav-child">
							<dd><a href="javascript:$.admin_index.me();void(0);"><?php echo P_Lang("基本资料");?></a></dd>
							<dd><a href="javascript:$.admin_index.pass();void(0);"><?php echo P_Lang("修改密码");?></a></dd>
							<?php if(!$sys['develop'] && $session['admin_rs']['if_system']){ ?>
								<?php if($session['adm_develop']){ ?>
								<dd><a href="javascript:$.admin_index.develop(0);void(0);"><?php echo P_Lang("应用模式");?></a></dd>
								<?php } else { ?>
								<dd><a href="javascript:$.admin_index.develop(1);void(0);"><?php echo P_Lang("开发模式");?></a></dd>
								<?php } ?>
							<?php } ?>
							<dd><a href="javascript:$.admin_index.logout();void(0);"><?php echo P_Lang("退出");?></a></dd>
						</dl>
					</li>
					<li class="layui-nav-item layui-hide-xs" lay-unselect> <a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
					</li>
					<li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect>
						<a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
					</li>
				</ul>
			</div>
			<!-- 侧边菜单 -->
			<div class="layui-side layui-side-menu">
				<div class="layui-side-scroll">
					<div class="layui-logo" lay-href="<?php echo phpok_url(array('ctrl'=>'index','func'=>'homepage'));?>">
						<span><?php if($logo){ ?><img src="<?php echo $logo;?>" width="190px" /><?php } else { ?><?php echo $config['title'];?><?php } ?></span>
					</div>
					<ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
						<li data-name="home" class="layui-nav-item layui-this">
			              <a href="javascript:;" lay-href="<?php echo phpok_url(array('ctrl'=>'index','func'=>'homepage'));?>">
			                <i class="layui-icon layui-icon-home"></i>
			                <cite><?php echo P_Lang("后台首页");?></cite>
			              </a>
			            </li>
			            <?php if($list_rslist && !$session['adm_develop']){ ?>
			            <li data-name="list" class="layui-nav-item">
			              <a href="javascript:;" lay-tips="<?php echo P_Lang("内容管理");?>" lay-direction="2">
			                <i class="layui-icon layui-icon-app"></i>
			                <cite><?php echo P_Lang("内容管理");?></cite>
			              </a>
			              <dl class="layui-nav-child">
								<?php $idx["num"] = 0;$list_rslist=is_array($list_rslist) ? $list_rslist : array();$idx = array();$idx["total"] = count($list_rslist);$idx["index"] = -1;foreach($list_rslist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
								<dd pid="<?php echo $value['id'];?>" data-name="project_<?php echo $value['id'];?>"> <a lay-href="<?php echo $value['url'];?>" lay-text="<?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?>"><?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?></a></dd>
								<?php } ?>
						  </dl>
			            </li>
			            <?php } ?>
			            <?php if($all_info && !$session['adm_develop']){ ?>
			            <li data-name="all" class="layui-nav-item">
			              <a href="javascript:;" lay-tips="<?php echo P_Lang("全局管理");?>" lay-direction="2">
			                <i class="layui-icon layui-icon-util"></i>
			                <cite><?php echo P_Lang("全局管理");?></cite>
			              </a>
			              <dl class="layui-nav-child">
								<?php if($all_popedom['site']){ ?>
								<dd data-name="config_site"> <a lay-href="<?php echo phpok_url(array('ctrl'=>'all','func'=>'setting'));?>"><?php echo P_Lang("网站信息");?></a></dd>
								<?php } ?>
								<?php if($show_vcode_setting){ ?>
								<dd data-name="config_vcode"> <a lay-href="<?php echo phpok_url(array('ctrl'=>'all','func'=>'vcode'));?>"><?php echo P_Lang("验证码配置");?></a></dd>
								<?php } ?>
								<?php if($all_popedom['domain']){ ?>
								<dd data-name="config_domain"> <a lay-href="<?php echo phpok_url(array('ctrl'=>'all','func'=>'domain'));?>"><?php echo P_Lang("网站域名");?></a></dd>
								<?php } ?>
								<?php if($site_popedom['order'] && $config['biz_status']){ ?>
								<dd data-name="config_order_status"> <a lay-href="<?php echo phpok_url(array('ctrl'=>'site','func'=>'order_status'));?>"><?php echo P_Lang("订单常规配置");?></a></dd>
								<?php } ?>
								<?php $tmpid["num"] = 0;$plugin_alist=is_array($plugin_alist) ? $plugin_alist : array();$tmpid = array();$tmpid["total"] = count($plugin_alist);$tmpid["index"] = -1;foreach($plugin_alist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
								<dd data-name="plugin_<?php echo $value['id'];?>"> <a lay-href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></dd>
								<?php } ?>
								<?php if($all_popedom['gset'] || $all_popedom['set']){ ?>
								<?php $tmpid["num"] = 0;$all_rslist=is_array($all_rslist) ? $all_rslist : array();$tmpid = array();$tmpid["total"] = count($all_rslist);$tmpid["index"] = -1;foreach($all_rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
								<dd data-name="all_<?php echo $value['id'];?>"> <a lay-href="<?php echo phpok_url(array('ctrl'=>'all','func'=>'set','id'=>$value['id']));?>"><?php echo $value['title'];?></a></dd>
								<?php } ?>
								<?php } ?>
						  </dl>
			            </li>
			            <?php } ?>
			            <?php if($session['adm_develop']){ ?>
			            <li data-name="list" class="layui-nav-item">
			              <a href="javascript:;" lay-href="<?php echo phpok_url(array('ctrl'=>'list'));?>" lay-text="<?php echo P_Lang("内容管理");?>">
			                <i class="layui-icon layui-icon-app"></i>
			                <cite><?php echo P_Lang("内容管理");?></cite>
			              </a>
			            </li>
			            <li data-name="all" class="layui-nav-item">
			              <a href="javascript:;" lay-tips="<?php echo P_Lang("全局管理");?>" lay-href="<?php echo phpok_url(array('ctrl'=>'all'));?>" lay-direction="2">
			                <i class="layui-icon layui-icon-util"></i>
			                <cite><?php echo P_Lang("全局管理");?></cite>
			              </a>
			            </li>
			            <?php } ?>
			            <?php $tmpid["num"] = 0;$iconlist=is_array($iconlist) ? $iconlist : array();$tmpid = array();$tmpid["total"] = count($iconlist);$tmpid["index"] = -1;foreach($iconlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			            <li data-name="<?php echo $value['appfile'];?>" class="layui-nav-item">
			              <a href="javascript:;" lay-href="<?php echo $value['url'];?>" lay-text="<?php echo P_Lang($value['title']);?>">
			                <i class="icon-<?php echo $value['icon'];?>" style="margin-left:-24px;padding-right:6px;"></i>
			                <cite><?php echo P_Lang($value['title']);?></cite>
			              </a>
			            </li>
			            <?php } ?>
			            <?php if($session['adm_develop'] && $session['admin_rs']['if_system']){ ?>
						<?php $tmpid["num"] = 0;$menulist=is_array($menulist) ? $menulist : array();$tmpid = array();$tmpid["total"] = count($menulist);$tmpid["index"] = -1;foreach($menulist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<li data-name="group-<?php echo $value['id'];?>" class="layui-nav-item">
							<a href="javascript:;" lay-tips="<?php echo P_Lang($value['title']);?>" lay-direction="2"> <i class="layui-icon layui-icon-component"></i><cite><?php echo P_Lang($value['title']);?></cite>
							</a>
							<dl class="layui-nav-child">
								<?php $idxx["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$idxx = array();$idxx["total"] = count($value['sublist']);$idxx["index"] = -1;foreach($value['sublist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
								<dd data-name="<?php echo $v['appfile'];?>"> <a lay-href="<?php echo $v['url'];?>" lay-text="<?php echo P_Lang($v['title']);?>"><?php echo P_Lang($v['title']);?></a></dd>
								<?php } ?>
							</dl>
						</li>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
			<!-- 页面标签 -->
			<div class="layadmin-pagetabs" id="LAY_app_tabs">
				<div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
				<div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
				<div class="layui-icon layadmin-tabs-control layui-icon-down">
					<ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
						<li class="layui-nav-item" lay-unselect>
							<a href="javascript:;"></a>
							<dl class="layui-nav-child layui-anim-fadein">
								<dd layadmin-event="closeThisTabs"><a href="javascript:;"><?php echo P_Lang("关闭当前标签页");?></a>
								</dd>
								<dd layadmin-event="closeOtherTabs"><a href="javascript:;"><?php echo P_Lang("关闭其它标签页");?></a>
								</dd>
								<dd layadmin-event="closeAllTabs"><a href="javascript:;"><?php echo P_Lang("关闭全部标签页");?></a>
								</dd>
							</dl>
						</li>
					</ul>
				</div>
				<div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
					<ul class="layui-tab-title" id="LAY_app_tabsheader">
						<li lay-id="<?php echo phpok_url(array('ctrl'=>'index','func'=>'homepage'));?>" lay-attr="<?php echo phpok_url(array('ctrl'=>'index','func'=>'homepage'));?>" class="layui-this"><i class="layui-icon layui-icon-home"></i>
						</li>
					</ul>
				</div>
			</div>
			<!-- 主体内容 -->
			<div class="layui-body" id="LAY_app_body">
				<div class="layadmin-tabsbody-item layui-show">
					<iframe src="<?php echo phpok_url(array('ctrl'=>'index','func'=>'homepage'));?>" frameborder="0" class="layadmin-iframe"></iframe>
				</div>
			</div>
			<!-- 辅助元素，一般用于移动设备下遮罩 -->
			<div class="layadmin-body-shade" layadmin-event="shade"></div>
		</div>
	</div>
	<?php echo $app->plugin_html_ap("body");?>
	<?php echo $app->plugin_html_ap("foot");?>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>