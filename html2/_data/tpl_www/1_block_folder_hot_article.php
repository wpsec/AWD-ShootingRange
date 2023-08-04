<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $list = phpok('news','psize=15');?>
<?php if($list['total']){ ?>
<div class="am-panel am-panel-default">
	<div class="am-panel-hd">
		<h3 class="am-panel-title">最新资讯<a href="<?php echo $list['project']['url'];?>" class="more">更多</a></h3>
	</div>
	<div class="am-list-news-bd">
	<ul class="am-list" style="margin-bottom:0;">
		<?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid = array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<li class="am-g am-list-item-dated" style="padding-left:5px;">
			<a href="<?php echo $value['url'];?>" class="am-list-item-hd "><?php echo $value['title'];?></a>
			<span class="am-list-date"><?php echo date('Y-m-d',$value['dateline']);?></span>
		</li>
		<?php } ?>
	</ul>
	</div>
</div>
<?php } ?>
