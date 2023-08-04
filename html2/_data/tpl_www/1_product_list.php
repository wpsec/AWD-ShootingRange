<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->assign("css","tpl/www/css/product.css"); ?><?php $this->output("header","file",true,false); ?>
<?php if($cate_rs['banner'] || $page_rs['banner']){ ?>
<div class="banner wow slideInLeft" style="background-image:url('<?php echo $cate_rs['banner'] ? $cate_rs['banner']['filename'] : $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $cate_rs['title'];?>" /></div>
<?php } ?>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left  wow slideInLeft am-panel-group">
		<?php $this->assign("pid",$page_rs['id']); ?><?php $this->assign("cid",$cate_rs['id']); ?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("block/catelist","file",true,false); ?>
		<?php $this->output("block/contact","file",true,false); ?>
		<?php $this->output("block/hot_article","file",true,false); ?>
	</div>
	<div class="right wow slideInRight">
		<style type="text/css">
		ul.demo{list-style:none;margin:5px 0;padding:3px 3px 3px 120px;border:1px solid #ccc;}
		ul.demo:after{clear:both;height:0;line-height:0;content:'.';display: block;visibility: hidden;}
		ul.demo li{float:left;padding:1px 10px;line-height:200%;}
		ul.demo li:first-child{width:100px;text-align:right;margin-left:-120px;}
		ul.demo li.on{color:darkred;}
		ul.demo li.on a{color:darkred;}
		</style>
		<script type="text/javascript">
		function filter_submit(url,id,val,cutype)
		{
			if(!url || !id || url == 'undefined' || id == 'undefined' || !val || val == 'undefined'){
				return false;
			}
			if(!cutype || cutype == 'undefined'){
				cutype = ',';
			}
			url += (url.indexOf('?') > -1) ? '&' : '?';
			var str = '';
			var is_delete = false;
			$("#filter_"+id+" li.on").each(function(i){
				var info = $(this).attr('data-val');
				if(info && info != val){
					if(str != ''){
						str += cutype+""+info;
					}else{
						str = info;
					}
				}
				if(info && info == val){
					is_delete = true;
				}
			});
			if(str != '' && !is_delete){
				str += cutype+""+val;
			}
			if(str == '' && !is_delete){
				str = val;
			}
			if(str != ''){
				url += "ext["+id+"]="+$.str.encode(str);
			}
			$.phpok.go(url);
		}
		</script>
		<?php $tmpid["num"] = 0;$filter=is_array($filter) ? $filter : array();$tmpid = array();$tmpid["total"] = count($filter);$tmpid["index"] = -1;foreach($filter as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<ul class="demo" id="filter_<?php echo $value['identifier'];?>">
		    <li><?php echo $value['title'];?>：</li>
		    <li<?php if($value['highlight']){ ?> class="on"<?php } ?>><a href="<?php echo $value['url'];?>">不限</a></li>
		    <?php $tmpid2["num"] = 0;$value['list']=is_array($value['list']) ? $value['list'] : array();$tmpid2 = array();$tmpid2["total"] = count($value['list']);$tmpid2["index"] = -1;foreach($value['list'] as $k=>$v){ $tmpid2["num"]++;$tmpid2["index"]++; ?>
		    <li<?php if($v['highlight']){ ?> class="on"<?php } ?> data-val="<?php echo $v['val'];?>"><a href="<?php if($value['multiple']){ ?>javascript:filter_submit('<?php echo $value['url'];?>','<?php echo $value['identifier'];?>','<?php echo $v['val'];?>','<?php echo $value['cutype'];?>');void(0);<?php } else { ?><?php echo $v['url'];?><?php } ?>"><?php echo $v['title'];?></a></li>
		    <?php } ?>
		</ul>
		<?php } ?>
		<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-thumbnails products">
			
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<li>
				<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img class="am-thumbnail" src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" style="margin-bottom:0;" /></a>
				<?php if($value['apps'] && $value['apps']['coupon'] && $value['apps']['coupon']['rs']){ ?>
				<div class="discount"><img src="<?php echo $value['apps']['coupon']['rs']['pic1'];?>"/></div>
				<?php } ?>
				<div class="am-g am-g-collapse">
				  <div class="am-u-sm-8 am-text-truncate"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></div>
				  <?php if($page_rs['is_biz']){ ?><div class="am-u-sm-4 red"><?php echo price_format($value['price'],$value['currency_id'],$config['currency_id']);?></div><?php } ?>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php $this->output("block/pagelist","file",true,false); ?>
	</div>
</div>
<?php $this->output("footer","file",true,false); ?>