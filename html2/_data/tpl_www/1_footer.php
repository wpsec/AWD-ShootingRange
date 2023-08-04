<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="foot">
	<div class="copyright">
		<?php $list = menu('bottom');?>
		<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id = array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list as $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a>
		<?php if($list_id['num'] == $list_id['total']){ ?><br /><?php } else { ?> | <?php } ?>
		<?php } ?>
		<?php echo $config['copyright']['content'];?>
	</div>
</div>
<?php $list = phpok('kefu');?>
<?php if($list['project'] && $list['rslist']){ ?>
<?php if($list['project']['isbottom']){ ?>
<div class="floatbar">
	<div class="am-g" style="max-width:1200px;">
		<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
		<?php if($value['qtype'] == 'qq'){ ?>
		<div class="am-u-sm-3 am-u-xx-centered"><a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq'];?>&site=qq&menu=yes" title="点击这里给我发消息"><?php echo $value['title'];?>（QQ：<?php echo $value['qq'];?>） <img border="0" src="tpl/www/images/qq.png" alt="点击这里给我发消息" style="width:32px;"/></a></div>
		<?php } else { ?>
		<div class="am-u-sm-3 am-u-xx-centered weixin">
			<a href="javascript:void(0);"><?php echo $value['title'];?>（微信：<?php echo $value['weixin'];?>） <img border="0" src="tpl/www/images/weixin.png" alt="鼠标移到这里查看二维码" style="width:32px;"/></a>
			<div class="wxpic" data-filename="<?php echo $value['qrcode']['filename'];?>"></div>
		</div>
		<?php } ?>
		<?php } ?>
	</div>
</div>
<div style="height:50px;clear:both;">&nbsp;</div>
<?php } else { ?>
<div class="im_floatonline">
	<div class="am-panel am-panel-primary">
		<div class="am-panel-hd center"><?php echo $list['project']['title'];?></div>
		<div class="am-panel-bd">
			<ul class="am-list">
				<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id = array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] as $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
				<?php if($value['qtype'] == 'qq'){ ?>
				<li class="kf"><a target="_blank" href="//wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq'];?>&site=qq&menu=yes" title="点击这里给我发消息"><img border="0" src="tpl/www/images/qq.png" alt="点击这里给我发消息" style="width:32px;"/> <?php echo $value['title'];?> </a></li>
				<?php } else { ?>
				<li class="kf">
					<a href="javascript:void(0);" title="微信号：<?php echo $value['weixin'];?>"><img border="0" src="tpl/www/images/weixin.png" style="width:32px;"/> <?php echo $value['title'];?></a>
					<div align="center" style="padding-bottom:1em;"><img src="<?php echo $value['qrcode']['filename'];?>" style="width:80%;"/></div>
				</li>
				<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>
<?php } ?>

<?php $this->output("foot","file",true,false); ?>
