<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $contactus = phpok('contactus');?>
<div class="am-panel am-panel-default">
	<div class="am-panel-hd">
		<h3 class="am-panel-title"><?php echo $contactus['title'];?><?php if($showmore){ ?><a href="<?php echo $contactus['url'];?>" class="more">更多 <span class="am-icon-angle-right"></span></a><?php } ?></h3>
	</div>
	<ul class="am-list am-list-static">
		<?php if($contactus['company']){ ?><li><i class="am-icon-home am-icon-fw"></i> <?php echo $contactus['company'];?></li><?php } ?>
		<?php if($contactus['address']){ ?><li><i class="am-icon-location-arrow am-icon-fw"></i> <?php echo $contactus['address'];?></li><?php } ?>
		<?php if($contactus['email']){ ?><li><i class="am-icon-at am-icon-fw"></i> <?php echo $contactus['email'];?></li><?php } ?>
		<?php if($contactus['zipcode']){ ?><li><i class="am-icon-envelope-o am-icon-fw"></i> <?php echo $contactus['zipcode'];?></li><?php } ?>
		<?php if($contactus['tel']){ ?><li><i class="am-icon-mobile am-icon-fw"></i> <?php echo $contactus['tel'];?></li><?php } ?>
		<?php if($contactus['fullname']){ ?><li><i class="am-icon-user am-icon-fw"></i> <?php echo $contactus['fullname'];?></li><?php } ?>
	</ul>
</div>