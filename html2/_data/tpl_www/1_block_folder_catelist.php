<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $list=phpok('_catelist',array('pid'=>$pid));?>
<?php if($list && $list['tree']){ ?>
<div class="am-panel am-panel-default">
	<div class="am-panel-hd">
		<h3 class="am-panel-title"><?php echo $title ? $title : $page_rs['title'];?></h3>
	</div>
	<ul class="am-list">
		<?php $tmpid["num"] = 0;$list['tree']=is_array($list['tree']) ? $list['tree'] : array();$tmpid = array();$tmpid["total"] = count($list['tree']);$tmpid["index"] = -1;foreach($list['tree'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"<?php if($cid == $value['id']){ ?> class="am-active"<?php } ?>><i class='am-icon-angle-right'></i> <?php echo $value['title'];?></a></li>
			<?php if($value['id'] == $cid || $cate_rs['parent_id'] == $value['id']){ ?>
			<?php $idxx["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$idxx = array();$idxx["total"] = count($value['sublist']);$idxx["index"] = -1;foreach($value['sublist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<li><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"<?php if($cid == $v['id']){ ?> class="am-active"<?php } ?> style="padding-left:2em;"><i class='am-icon-angle-right'></i> <?php echo $v['title'];?></a></li>
			<?php } ?>
			<?php } ?>
		<?php } ?>
	</ul>
</div>
<?php } ?>
