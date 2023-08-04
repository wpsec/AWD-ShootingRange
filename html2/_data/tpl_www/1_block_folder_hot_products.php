<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $list = phpok('hot_products');?>
<?php if($list['total']){ ?>
<div class="am-panel am-panel-default">
	<div class="am-panel-hd">
		<h3 class="am-panel-title">热门产品</h3>
	</div>
	<div data-am-widget="slider" class="am-slider am-slider-c3" data-am-slider='{"controlNav":false}'>
		<ul class="am-slides">
			<?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid = array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li>
				<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
					<img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" />
					<div class="am-slider-desc"><div class="am-slider-counter"><span class="am-active"><?php echo $tmpid['num'];?></span>/<?php echo $tmpid['total'];?></div><?php echo $value['title'];?></div>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>