<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($cate_rs['banner'] || $page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $cate_rs['banner'] ? $cate_rs['banner']['filename'] : $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $cate_rs['title'];?>" /></div>
<?php } ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left am-panel-group">
		<?php $this->assign("cid",$cate_rs['id']); ?><?php $this->assign("pid",$page_rs['id']); ?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("block/catelist","file",true,false); ?>
		<?php $this->output("block/contact","file",true,false); ?>
		<?php $this->output("block/hot_products","file",true,false); ?>
		<?php $this->output("block/taglist","file",true,false); ?>
	</div>
	<div class="right">
		<div data-am-widget="list_news" class="am-list-news am-list-news-default" style="margin:0;">
			<div class="am-list-news-hd am-cf">
				 <h2><?php echo $cate_rs ? $cate_rs['title'] : $page_rs['title'];?></h2>
			</div>
			<div class="am-list-news-bd">
				<ul class="am-list">
					<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<?php if($value['thumb']){ ?>
					<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
						<div class="am-u-sm-2 am-list-thumb">
							<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['ico'];?>" alt="<?php echo $value['title'];?>" /></a>
						</div>
						<div class=" am-u-sm-10 am-list-main">
							<h3 class="am-list-item-hd"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h3>
							<span class="am-list-date">发布时间：<?php echo time_format($value['dateline']);?>，查看次数：<?php echo $value['hits'];?></span>
							<?php if($value['note']){ ?>
							<div class="am-list-item-text" style="max-height:6.5em;"><?php echo nl2br($value['note']);?></div>
							<?php } ?>
							<?php if($value['tag']){ ?>
							<div class="am-list-item-text">
								标签：
								<?php $idxx["num"] = 0;$value['tag']=is_array($value['tag']) ? $value['tag'] : array();$idxx = array();$idxx["total"] = count($value['tag']);$idxx["index"] = -1;foreach($value['tag'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
								<?php echo $v['html'];?><?php if($idxx['total'] != $idxx['num']){ ?>，<?php } ?>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</li>
					<?php } else { ?>
					<li class="am-g am-list-item-desced">
						<div class=" am-list-main">
							<h3 class="am-list-item-hd"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h3>
							<span class="am-list-date">发布时间：<?php echo time_format($value['dateline']);?>，查看次数：<?php echo $value['hits'];?></span>
							<?php if($value['note']){ ?>
							<div class="am-list-item-text"><?php echo nl2br($value['note']);?></div>
							<?php } ?>
							<?php if($value['tag']){ ?>
							<div class="am-list-item-text">
								标签：
								<?php $idxx["num"] = 0;$value['tag']=is_array($value['tag']) ? $value['tag'] : array();$idxx = array();$idxx["total"] = count($value['tag']);$idxx["index"] = -1;foreach($value['tag'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
								<?php echo $v['html'];?><?php if($idxx['total'] != $idxx['num']){ ?>，<?php } ?>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div>
			<?php $this->output("block/pagelist","file",true,false); ?>
		</div>
	</div>
</div>

<?php $this->output("footer","file",true,false); ?>