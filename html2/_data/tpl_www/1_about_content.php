<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("header","file",true,false); ?>
<?php if($page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $page_rs['title'];?>" /></div>
<?php } ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left am-panel-group">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">
				<h3 class="am-panel-title"><?php echo $page_rs['title'];?></h3>
			</div>
			<ul class="am-list">
				<?php $list=phpok('_arclist',array('pid'=>$page_rs['id'],'psize'=>"100",'fields'=>"id"));?>
				<?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid = array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"<?php if($rs['id'] == $value['id']){ ?> class="am-active"<?php } ?>><i class='am-icon-angle-right'></i> <?php echo $value['title'];?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php $this->output("block/contact","file",true,false); ?>
	</div>
	<div class="right">
		<div class="content"><?php echo $rs['content'];?></div>
		<?php if($rs['tag']){ ?>
		<div class="am-list-item-text">
			标签：
			<?php $idxx["num"] = 0;$rs['tag']=is_array($rs['tag']) ? $rs['tag'] : array();$idxx = array();$idxx["total"] = count($rs['tag']);$idxx["index"] = -1;foreach($rs['tag'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<?php echo $v['html'];?><?php if($idxx['total'] != $idxx['num']){ ?>，<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>
<?php $this->output("footer","file",true,false); ?>