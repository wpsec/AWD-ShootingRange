<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $pagelist = phpok_page($pageurl,$total,$pageid,$psize,"prev=上一页&next=下一页&last=末页&home=首页&always=1");?>
<ul data-am-widget="pagination" class="am-fr am-pagination am-pagination-default" style="margin-right:0;font-size:1.4rem;">
	<?php $tmpid["num"] = 0;$pagelist=is_array($pagelist) ? $pagelist : array();$tmpid = array();$tmpid["total"] = count($pagelist);$tmpid["index"] = -1;foreach($pagelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<li<?php if($value['type'] != 'num'){ ?> class="am-pagination-<?php if($value['type'] == 'home'){ ?>first<?php } else { ?><?php echo $value['type'];?><?php } ?>"<?php } ?><?php if($value['type'] == 'num' && $value['status']){ ?> class="am-active"<?php } ?>><a href="<?php echo $value['url'];?>"<?php if($value['type'] == 'num' && $value['status']){ ?> class="am-active"<?php } ?>><?php echo $value['title'];?></a></li>
	<?php } ?>
</ul>