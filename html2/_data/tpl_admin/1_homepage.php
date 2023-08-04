<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("csstype","default"); ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo phpok_url(array('ctrl'=>'js','func'=>'ext','js'=>'admin.all.js'));?>"></script>
<?php if($all_info){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("全局信息");?>
	</div>
	<div class="layui-card-body">
		<div class="sub_box" id="all_setting">
			<div class="box_item">
				<ul>
					<?php if($all_popedom['site']){ ?>
					<li><a title="<?php echo P_Lang("配置网站信息，包括网址域名，布全局关键字等");?>" href="javascript:$.win('<?php echo P_Lang("网站信息");?>','<?php echo phpok_url(array('ctrl'=>'all','func'=>'setting'));?>');void(0);">
							<div class="top_img"><img src="images/ico/setting.png" alt="<?php echo P_Lang("网站信息");?>" class="ie6png" width="48" height="48" /></div>
							<div class="name"><?php echo P_Lang("网站信息");?></div>
						</a>
					</li>
					<?php if($show_vcode_setting){ ?>
					<li><a title="<?php echo P_Lang("验证码开启或关闭设置");?>" href="javascript:$.win('<?php echo P_Lang("验证码配置");?>','<?php echo phpok_url(array('ctrl'=>'all','func'=>'vcode'));?>');void(0);">
							<div class="top_img"><img src="images/ico/setting2.png" alt="<?php echo P_Lang("验证码配置");?>" class="ie6png" width="48" height="48" /></div>
							<div class="name"><?php echo P_Lang("验证码");?></div>
						</a>
					</li>
					<?php } ?>
					<?php } ?>
					<?php if($all_popedom['domain']){ ?>
					<li><a title="<?php echo P_Lang("网站可以绑定的域名");?>" href="javascript:$.win('<?php echo P_Lang("网站域名");?>','<?php echo phpok_url(array('ctrl'=>'all','func'=>'domain'));?>');void(0);">
							<div class="top_img"><img src="images/ico/alias.png" alt="<?php echo P_Lang("网站域名");?>" class="ie6png" width="48" height="48" /></div>
							<div class="name"><?php echo P_Lang("网站域名");?></div>
						</a>
					</li>
					<?php } ?>
					<?php if($site_popedom['order'] && $config['biz_status']){ ?>
					<li><a title="<?php echo P_Lang("订单常规配置");?>" href="javascript:$.win('<?php echo P_Lang("订单常规配置");?>','<?php echo phpok_url(array('ctrl'=>'site','func'=>'order_status'));?>');void(0);">
							<div class="top_img"><img src="images/ico/shopping_setting.png" alt="<?php echo P_Lang("订单常规配置");?>" class="ie6png" width="48"
								 height="48" /></div>
							<div class="name"><?php echo P_Lang("订单配置");?></div>
						</a>
					</li>
					<?php } ?>
					<?php $tmpid["num"] = 0;$plugin_alist=is_array($plugin_alist) ? $plugin_alist : array();$tmpid = array();$tmpid["total"] = count($plugin_alist);$tmpid["index"] = -1;foreach($plugin_alist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<li><a title="<?php echo $value['title'];?>" href="javascript:$.win('<?php echo $value['title'];?>','<?php echo $value['url'];?>');void(0);">
							<div class="top_img"><img src="<?php echo $value['ico'];?>" class="ie6png" alt="<?php echo $value['title'];?>" width="48" height="48" /></div>
							<div class="name"><?php echo $value['title'];?></div>
						</a>
					</li>
					<?php } ?>
					<?php if($all_popedom['gset'] || $all_popedom['set']){ ?>
					<?php $all_rslist_id["num"] = 0;$all_rslist=is_array($all_rslist) ? $all_rslist : array();$all_rslist_id = array();$all_rslist_id["total"] = count($all_rslist);$all_rslist_id["index"] = -1;foreach($all_rslist as $key=>$value){ $all_rslist_id["num"]++;$all_rslist_id["index"]++; ?>
					<li><a title="<?php echo $value['title'];?>" href="javascript:$.win('<?php echo $value['title'];?>','<?php echo phpok_url(array('ctrl'=>'all','func'=>'set','id'=>$value['id']));?>');void(0);">
							<div class="top_img"><img src="<?php echo $value['ico'];?>" class="ie6png" alt="<?php echo $value['title'];?>" width="48" height="48" /></div>
							<div class="name"><?php echo $value['title'];?></div>
						</a>
					</li>
					<?php } ?>
					<?php if($session['admin_rs']['if_system'] && $session['adm_develop']){ ?>
					<li class="plus" onclick="$.admin_all.group()"></li><?php } ?>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if($list_rslist || $qlink){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<h3><?php echo P_Lang("内容管理");?></h3>
	</div>
	<div class="layui-card-body">
		<div class="sub_box" id="list_setting">
			<div class="box_item">
				<ul>
					<?php $list_rslist_id["num"] = 0;$list_rslist=is_array($list_rslist) ? $list_rslist : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list_rslist);$list_rslist_id["index"] = -1;foreach($list_rslist as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
					<li pid="<?php echo $value['id'];?>"><a title="<?php echo $value['title'];?>" href="javascript:$.win('<?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?>','<?php echo $value['url'];?>');void(0);">
							<div class="top_img"><img src="<?php echo $value['ico'] ? $value['ico'] : 'images/ico/default.png';?>" class="ie6png" alt="<?php echo $value['title'];?>" width="48" height="48" /></div>
							<div class="name"><?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?></div>
						</a>
					</li>
					<?php } ?>
					<?php $tmpid["num"] = 0;$qlink=is_array($qlink) ? $qlink : array();$tmpid = array();$tmpid["total"] = count($qlink);$tmpid["index"] = -1;foreach($qlink as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<li pid="<?php echo $value['id'];?>">
						<?php if($session['admin_rs']['if_system'] && $session['adm_develop']){ ?>
						<div class="layui-btn-group qlink_edit_btn">
							<input type="button" value="编辑" onclick="$.admin_index.quick_link('<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs" />
							<input type="button" value="删除" onclick="$.admin_index.quick_link_delete('<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs layui-btn-danger" />
						</div>
						<?php } ?>
						<a title="<?php echo $value['title'];?>" href="javascript:$.win('<?php echo $value['title'];?>','<?php echo $value['link'];?>');void(0);">
							<div class="top_img"><img src="<?php echo $value['ico'] ? $value['ico'] : 'images/ico/default.png';?>" class="ie6png" alt="<?php echo $value['title'];?>" width="48" height="48" /></div>
							<div class="name"><?php echo $value['title'];?></div>
						</a>
					</li>
					<?php } ?>
					<?php if($session['admin_rs']['if_system'] && $session['adm_develop']){ ?>
					<li class="plus" onclick="$.admin_index.quick_link()"></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if($all_status){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("内容统计");?>
	</div>
	<div class="layui-card-body">
		<ul class="layui-row layui-col-space10 layadmin-backlog">
			<?php $tmpid["num"] = 0;$all_status=is_array($all_status) ? $all_status : array();$tmpid = array();$tmpid["total"] = count($all_status);$tmpid["index"] = -1;foreach($all_status as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li class="layui-col-xs6 layui-col-sm4 layui-col-md2">
				<a href="javascript:$.win('<?php echo $value['title'];?>','<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$value['id']));?>');void(0)" class="layadmin-backlog-body">
					<h3><?php echo $value['title'];?></h3>
					<p><cite><?php echo $value['total'];?></cite></p>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>
<style type="text/css">
	.server_left {
		text-align: right;
		height: 30px;
	}

	.server_right {
		overflow: hidden;
		text-overflow: ellipsis;
		height: 30px;
		white-space: nowrap
	}
</style>
<?php if($sys['show_env']){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("主机环境");?>
		<div class="fr">
			<input type="button" value="查看更多" onclick="$.win('<?php echo P_Lang("主机信息");?>','<?php echo phpok_url(array('ctrl'=>'index','func'=>'info'));?>')" class="layui-btn layui-btn-sm layui-btn-normal" />
		</div>
	</div>
	<div class="layui-card-body">
		<div class="layui-row layui-col-space15">
			<?php $tmpid["num"] = 0;$serverlist=is_array($serverlist) ? $serverlist : array();$tmpid = array();$tmpid["total"] = count($serverlist);$tmpid["index"] = -1;foreach($serverlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<div class="layui-col-sm6 layui-col-md3 server_left">
				<?php if($value[3]){ ?><i class="layui-icon layui-tips" lay-tips="<?php echo $value[3];?>">&#xe702;</i><?php } ?>
				<?php echo $value[0];?>
			</div>
			<div class="layui-col-sm6 layui-col-md3 server_right" <?php if($value[2]){ ?> style="<?php echo $value[2];?>" <?php } ?>> <?php echo $value[1];?> </div>
			 <?php } ?>
			</div>
			<br />
		</div>
	</div>
</div>
<?php } ?>
<?php echo $app->plugin_html_ap("body");?>
<div class="foot">
	<div class="foot_left">
		<?php if($app->license_powered){ ?>
		Powered by <a href="http://www.phpok.com" target="_blank">phpok.com</a>,
		<?php } ?>
		CopyRight &copy; <?php echo $license_site;?> <?php echo license_date();?>, All Right Reserved.
		<?php if($sys['debug']){ ?><br /><?php echo debug_time();?>
		<?php } ?>
	</div>
	<div class="foot_right"><?php echo $license;?> Version <?php echo $version;?></div>
	<div class="clear"></div>
</div>
<?php echo $app->plugin_html_ap("foot");?>
<?php echo $app->plugin_html_ap("phpokbody");?></body>

</html>