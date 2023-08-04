<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("highlight","1"); ?><?php $this->output("header","file",true,false); ?>
<?php if($slider){ ?>
<div class="index-banner">
	<ul class="bd">
		<?php $slider_rslist_id["num"] = 0;$slider['rslist']=is_array($slider['rslist']) ? $slider['rslist'] : array();$slider_rslist_id = array();$slider_rslist_id["total"] = count($slider['rslist']);$slider_rslist_id["index"] = -1;foreach($slider['rslist'] as $key=>$value){ $slider_rslist_id["num"]++;$slider_rslist_id["index"]++; ?>
		<?php if($value['subani']){ ?>
		<li style="background-image: url(<?php echo $value['pic']['filename'];?>);"<?php if($value['effect'] && $value['effect']['val']){ ?> class="wow <?php echo $value['effect']['val'];?>"<?php } ?>>
			<?php $idxx["num"] = 0;$value['subani']=is_array($value['subani']) ? $value['subani'] : array();$idxx = array();$idxx["total"] = count($value['subani']);$idxx["index"] = -1;foreach($value['subani'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<img src="images/blank.gif" alt="<?php echo $value['title'];?>"/>
			<?php if($v['etype'] == 2){ ?>
			<div <?php if($v['effect'] && $v['effect']['val']){ ?> class="wow <?php echo $v['effect']['val'];?>"<?php } ?> style="position:absolute;<?php if($v['pleft']){ ?>left:<?php echo $v['pleft'];?>;<?php } ?><?php if($v['ptop']){ ?>top:<?php echo $v['ptop'];?>;<?php } ?>text-align:center;"<?php if($v['delaytime']){ ?> data-wow-delay="<?php echo $v['delaytime'];?>"<?php } ?><?php if($v['duration']){ ?> data-wow-duration="<?php echo $v['duration'];?>"<?php } ?><?php if($v['woffset']){ ?> data-wow-offset="<?php echo $v['woffset'];?>"<?php } ?>>
				<input type="button" value="<?php echo $v['title'];?>"<?php if($value['linkurl']){ ?> onclick="<?php if($v['target']){ ?>$.phpok.open('<?php echo $v['linkurl'];?>');<?php } else { ?>$.phpok.go('<?php echo $v['linkurl'];?>');<?php } ?>"<?php } ?> style="<?php if($v['fontsize']){ ?>font-size:<?php echo $v['fontsize'];?>;<?php } ?><?php if($v['color']){ ?>color:<?php echo $v['color'];?>;<?php } ?><?php if($v['fontweight']){ ?>font-weight:<?php echo $v['fontweight'];?>;<?php } ?><?php echo $v['style'];?>" />
			</div>
			<?php }elseif($v['etype'] == 1){ ?>
			<div <?php if($v['effect'] && $v['effect']['val']){ ?> class="wow <?php echo $v['effect']['val'];?>"<?php } ?> style="position:absolute;left:<?php echo $v['pleft'];?>;top:<?php echo $v['ptop'];?>;"<?php if($v['delaytime']){ ?> data-wow-delay="<?php echo $v['delaytime'];?>"<?php } ?><?php if($v['duration']){ ?> data-wow-duration="<?php echo $v['duration'];?>"<?php } ?><?php if($v['woffset']){ ?> data-wow-offset="<?php echo $v['woffset'];?>"<?php } ?>><?php if($v['linkurl']){ ?><a href="<?php echo $v['linkurl'];?>" target="<?php echo $v['target'];?>" title="<?php echo $v['title'];?>"><?php } ?><img src="<?php echo $v['picture']['filename'];?>" style="border:0;<?php echo $v['style'];?>" alt="<?php echo $v['title'];?>" /><?php if($v['linkurl']){ ?></a><?php } ?></div>
			<?php } else { ?>
			<div <?php if($v['effect'] && $v['effect']['val']){ ?> class="wow <?php echo $v['effect']['val'];?>"<?php } ?> style="position:absolute;<?php if($v['pleft']){ ?>left:<?php echo $v['pleft'];?>;<?php } ?><?php if($v['ptop']){ ?>top:<?php echo $v['ptop'];?>;<?php } ?>text-align:center;"<?php if($v['delaytime']){ ?> data-wow-delay="<?php echo $v['delaytime'];?>"<?php } ?><?php if($v['duration']){ ?> data-wow-duration="<?php echo $v['duration'];?>"<?php } ?><?php if($v['woffset']){ ?> data-wow-offset="<?php echo $v['woffset'];?>"<?php } ?>><?php if($v['linkurl']){ ?><a href="<?php echo $v['linkurl'];?>" target="<?php echo $v['target'];?>" title="<?php echo $v['title'];?>"><?php } ?><span style="<?php if($v['fontsize']){ ?>font-size:<?php echo $v['fontsize'];?>;<?php } ?><?php if($v['color']){ ?>color:<?php echo $v['color'];?>;<?php } ?><?php if($v['fontweight']){ ?>font-weight:<?php echo $v['fontweight'];?>;<?php } ?><?php echo $v['style'];?>"><?php echo $v['title'];?></span><?php if($v['linkurl']){ ?></a><?php } ?></div>
			<?php } ?>
			<?php } ?>
		</li>
		<?php } else { ?>
		<li style="background-image: url(<?php echo $value['pic']['filename'];?>);"<?php if($value['effect'] && $value['effect']['val']){ ?> class="wow <?php echo $value['effect']['val'];?>"<?php } ?>><a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>"><img src="images/blank.gif" alt="<?php echo $value['title'];?>"/></a></li>
		<?php } ?>
		<?php } ?>
	</ul>
	<div align="center">
	<ul class="hd">
		<?php $tmpid["num"] = 0;$slider['rslist']=is_array($slider['rslist']) ? $slider['rslist'] : array();$tmpid = array();$tmpid["total"] = count($slider['rslist']);$tmpid["index"] = -1;foreach($slider['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<li></li>
		<?php } ?>
	</ul>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".index-banner").slide({
		'mainCell':'.bd',
		'titCell':'.hd li',
		'autoPlay': true,
		'pnLoop':<?php echo $slider['project']['pnloop'] ? 'true' : 'false';?>,
		'interTime':<?php echo $slider['project']['intertime'] ? $slider['project']['intertime'] : 2500;?>,
		'delayTime':<?php echo $slider['project']['delaytime'] ? $slider['project']['delaytime'] : 500;?>
	});
});
</script>
<?php } ?>
<section class="main" style="margin:10px auto;">
	<?php if($products){ ?>
	<h2 class="title wow slideInLeft"<?php if($products['project']['style']){ ?> style="<?php echo $products['project']['style'];?>"<?php } ?>><?php echo $products['project']['title'];?><?php if($products['project']['entitle']){ ?><small><?php echo $products['project']['entitle'];?></small><?php } ?></h2>
	<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-thumbnails products wow slideInLeft">
		<?php $products_rslist_id["num"] = 0;$products['rslist']=is_array($products['rslist']) ? $products['rslist'] : array();$products_rslist_id = array();$products_rslist_id["total"] = count($products['rslist']);$products_rslist_id["index"] = -1;foreach($products['rslist'] as $key=>$value){ $products_rslist_id["num"]++;$products_rslist_id["index"]++; ?>
		<li class="am-padding ">
			<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
				<img class="am-thumbnail" src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" />
				<?php if($value['apps'] && $value['apps']['coupon']){ ?><div class="discount"><img src="<?php echo $value['apps']['coupon']['rs']['pic1'];?>" /></div><?php } ?>
				<h3 class="am-title"<?php if($value['style']){ ?> style="<?php echo $value['style'];?>"<?php } ?>><?php echo $value['title'];?></h3>
				<?php if($products['project']['is_biz']){ ?><div class="am-desc red"><?php echo price_format($value['price'],$value['currency_id'],$config['currency_id']);?></div><?php } ?>
			</a>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
	<?php if($about){ ?>
	<div class="am-g am-margin-top wow slideInRight">
		<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
			<h2 class="am-titlebar-title ">
				<?php echo $about['title'];?><?php if($about['entitle']){ ?><small><?php echo $about['entitle'];?></small><?php } ?>
			</h2>
			<nav class="am-titlebar-nav">
				<a href="<?php echo $about['url'];?>" class="">more &raquo;</a>
			</nav>
		</div>
		<div class="am-u-sm-7 am-margin-top">
			<?php echo $about['note'];?>
			<div class="clear"></div>
			<div class="center"><a class="am-btn am-btn-primary" href="<?php echo $about['url'];?>" target="_blank">查看详细信息</a></div>
		</div>
		<div class="am-u-sm-5 am-margin-top"><img src="<?php echo $about['pic'];?>" style="width:100%" /></div>
	</div>
	<?php } ?>

	<div class="am-g am-margin-top wow slideInLeft">
		<h2 class="title"<?php if($arclist['project']['style']){ ?> style="<?php echo $arclist['project']['style'];?>"<?php } ?>><?php echo $arclist['project']['title'];?><?php if($arclist['project']['entitle']){ ?><small><?php echo $arclist['project']['entitle'];?></small><?php } ?></h2>
		<div class="am-u-sm-4">
			<div data-am-widget="slider" class="am-slider am-slider-c2" data-am-slider='{"directionNav":false}'>
				<ul class="am-slides">
					<?php $tmpid["num"] = 0;$piclist['rslist']=is_array($piclist['rslist']) ? $piclist['rslist'] : array();$tmpid = array();$tmpid["total"] = count($piclist['rslist']);$tmpid["index"] = -1;foreach($piclist['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<li>
						<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" />
						<div class="am-slider-desc"><?php echo $value['title'];?></div></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="am-u-sm-8 wow slideInRight">
			<div data-am-widget="list_news" class="am-list-news am-list-news-default">
				<div class="am-list-news-bd" id="arclist_news">
					<ul class="am-list">
						<?php $tmpid["num"] = 0;$arclist['rslist']=is_array($arclist['rslist']) ? $arclist['rslist'] : array();$tmpid = array();$tmpid["total"] = count($arclist['rslist']);$tmpid["index"] = -1;foreach($arclist['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
							<?php if($value['thumb']){ ?>
							<div class="am-u-sm-1 am-list-thumb">
								<a href="">
									<img src="<?php echo $value['thumb'] ? $value['thumb']['gd']['thumb'] : 'tpl/www/images/null.png';?>" alt="<?php echo $value['title'];?>" />
								</a>
							</div>
							<?php } ?>
							<div class="<?php if($value['thumb']){ ?> am-u-sm-11<?php } ?> am-list-main">
								<h3 class="am-list-item-hd"><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a><span class="am-list-date am-fr"><?php echo date('Y-m-d',$value['dateline']);?></span></h3>
								<div class="am-list-item-text"><?php if($value['note']){ ?><?php echo nl2br($value['note']);?><?php } else { ?><?php echo phpok_cut($value['content'],'80','…');?><?php } ?></div>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div align="center"><a class="am-btn am-btn-primary" href="<?php echo $arclist['project']['url'];?>" target="_blank">查看更多</a></div>
		</div>
	</div>
	
	<?php if($contactus){ ?>
	<div class="am-g am-margin-top wow slideInLeft">
		<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
			<h2 class="am-titlebar-title ">
				<?php echo $contactus['title'];?><?php if($contactus['entitle']){ ?><small><?php echo $contactus['entitle'];?></small><?php } ?>
			</h2>
			<nav class="am-titlebar-nav">
				<a href="<?php echo $contactus['url'];?>" class="">more &raquo;</a>
			</nav>
		</div>
		<div class="am-u-sm-8 am-margin-top"><img src="<?php echo $contactus['map']['filename'];?>" style="width:100%" alt="<?php echo $contactus['title'];?>" /></div>
		<div class="am-u-sm-4">
			<ul class="am-list am-list-static am-list-border am-margin-top">
				<?php if($contactus['company']){ ?><li><i class="am-icon-home am-icon-fw"></i> <?php echo $contactus['company'];?></li><?php } ?>
				<?php if($contactus['address']){ ?><li><i class="am-icon-location-arrow am-icon-fw"></i> <?php echo $contactus['address'];?></li><?php } ?>
				<?php if($contactus['email']){ ?><li><i class="am-icon-at am-icon-fw"></i> <?php echo $contactus['email'];?></li><?php } ?>
				<?php if($contactus['zipcode']){ ?><li><i class="am-icon-envelope-o am-icon-fw"></i> <?php echo $contactus['zipcode'];?></li><?php } ?>
				<?php if($contactus['tel']){ ?><li><i class="am-icon-mobile am-icon-fw"></i> <?php echo $contactus['tel'];?></li><?php } ?>
				<?php if($contactus['fullname']){ ?><li><i class="am-icon-user am-icon-fw"></i> <?php echo $contactus['fullname'];?></li><?php } ?>
			</ul>
		</div>
	</div>
	<?php } ?>
	<?php if($link){ ?>
	<div class="am-panel am-panel-default am-margin wow slideInRight">
		<div class="am-panel-hd">
			<h3 class="am-panel-title"<?php if($link['project']['style']){ ?> style="<?php echo $link['project']['style'];?>"<?php } ?>><?php echo $link['project']['title'];?></h3>
		</div>
		
		<div class="am-panel-bd link">
			<?php $link_rslist_id["num"] = 0;$link['rslist']=is_array($link['rslist']) ? $link['rslist'] : array();$link_rslist_id = array();$link_rslist_id["total"] = count($link['rslist']);$link_rslist_id["index"] = -1;foreach($link['rslist'] as $key=>$value){ $link_rslist_id["num"]++;$link_rslist_id["index"]++; ?>
			<a href="<?php echo $value['linkurl'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['sitename'];?>"><?php echo $value['sitename'];?></a>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</section>

<?php $this->output("footer","file",true,false); ?>