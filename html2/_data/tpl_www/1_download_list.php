<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $page_rs['title'];?>" /></div>
<?php } ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left am-panel-group">
		<?php $this->assign("pid",$page_rs['id']); ?><?php $this->assign("cid",$cate_rs['id']); ?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("block/catelist","file",true,false); ?>
		<?php $this->output("block/contact","file",true,false); ?>
		<?php $this->output("block/hot_article","file",true,false); ?>
	</div>
	<div class="right">
		<ul class="am-list">
			<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left">
				<h3 class="am-list-item-hd"><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></h3>
				<?php if($value['thumb']){ ?>
				<div class="am-u-sm-1 am-list-thumb">
					<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" width="100%" /></a>
				</div>
				<?php } ?>
				<div class="am-u-sm-9 am-list-main">
					<div class="am-list-item-text"><?php echo $value['note'];?></div>
					<?php if($value['fsize']){ ?><small class="gray" style="margin-right:20px;">大小：<?php echo $value['fsize'];?></small><?php } ?>
					<?php if($value['version']){ ?><small class="gray" style="margin-right:20px;">版本：<?php echo $value['version'];?></small><?php } ?>
					<small class="gray">更新日期：<?php echo date('Y-m-d',$value['dateline']);?></small>
				</div>
				<?php if(!$value['onlyuser'] || ($value['onlyuser'] && $session['user_id'])){ ?>
				<div class="am-u-sm-2" style="text-align:right;">
					<a href="<?php if($value['dfile']){ ?><?php echo phpok_url(array('ctrl'=>'download','id'=>$value['dfile']['id']));?><?php } else { ?><?php echo $value['dlink'];?><?php } ?>" class="am-btn am-btn-success am-btn-xs am-radius" target="_blank" style="padding-right:1em;">下载附件</a>
				</div>
				<?php } else { ?>
				<div class="am-u-sm-2" style="text-align:right;">
					<a class="am-btn am-btn-danger am-btn-xs am-radius" href="<?php echo phpok_url(array('ctrl'=>'login','_back'=>$value['url']));?>" style="padding-right:1em;">请先登录</a>
				</div>
				<?php } ?>
				
			</li>
			<?php } ?>
		</ul>
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
</div>
<?php $this->output("footer","file",true,false); ?>