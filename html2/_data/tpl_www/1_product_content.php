<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->assign("js","tpl/www/js/jquery.zoombie.js"); ?><?php $this->output("header","file",true,false); ?>
<?php if($cate_rs['banner'] || $page_rs['banner']){ ?>
<div class="banner" style="background-image:url('<?php echo $cate_rs['banner'] ? $cate_rs['banner']['filename'] : $page_rs['banner']['filename'];?>');"><img src="images/blank.gif" alt="<?php echo $cate_rs['title'];?>" /></div>
<?php } ?>
<script type="text/javascript">
var price_base = '<?php echo $rs['price'];?>';
function attr_select(id,aid)
{
	$("#attr_"+aid).val(id);
	$("div[name=attr"+aid+"]").each(function(i){
		var tid = $(this).attr('data');
		if(tid == id){
			$(this).addClass("selected");
			//判断价格
			var new_price = $(this).attr("price");
			if(new_price && parseFloat(new_price)>0){
				price = parseFloat(price) + parseFloat(new_price);
				$("#showprice").html(price);
			}
		}else{
			$(this).removeClass('selected');
		}
	});
	var price = price_base;
	$("input[name=attr]").each(function(i){
		var val = $(this).val();
		if(val){
			var newprice = $("div[data="+val+"]").attr("price");
			if(newprice && parseFloat(newprice)>0){
				price = parseFloat(price) + parseFloat(newprice);
			}
		}
	});
	var url = api_url('index','price','price='+$.str.encode(price)+"&from=<?php echo $rs['currency_id'];?>&to=<?php echo $config['currency_id'];?>&symbol=1");
	$.phpok.json(url,function(rs){
		if(rs.status){
			$("#showprice").html(rs.info);
		}
	});
}
function update_apps(name)
{
	var price = $("#"+name+"_id").find("option:selected").attr("data-price");
	price_base = price;
	var url = api_url('cart','price_format','price='+$.str.encode(price));
	$.phpok.json(url,function(rs){
		if(rs.status){
			$("#showprice").html(rs.info);
		}
	});
}
$(document).ready(function(){
	//按住鼠标可以查看大图
	$('#product_img .big li').zoombie({on:'grab'});
	$("#product_img").slide({
		'titCell':'.hd li',
		'mainCell':'.big',
		'effect':"fold",
		'autoPlay':true
	});
	$("#minus").click(function(){
		var o = $("#buycount").val();
		if(o<2){
			$.dialog.alert('要购买的数量不能少于1');
			return false;
		}
		o = parseInt(o) - 1;
		$("#buycount").val(o);
	});
	$("#plus").click(function(){
		var o = $("#buycount").val();
		o = parseInt(o) + 1;
		$("#buycount").val(o);
	});
});
</script>
<div class="main product">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left am-panel-group">
		<?php $this->assign("pid",$page_rs['id']); ?><?php $this->assign("cid",$cate_rs['id']); ?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("block/catelist","file",true,false); ?>
		<?php $this->output("block/contact","file",true,false); ?>
		<?php $this->output("block/hot_article","file",true,false); ?>
	</div>
	<div class="right">
		<div class="am-g">
			<div class="am-u-sm-5">
				<div class="proimg">
					<div class="product_img" id="product_img">
						<ul class="big">
							<?php if(!$rs['pictures'] && $rs['thumb']){ ?>
							<li><img src="<?php echo $rs['thumb']['gd']['thumb'];?>" _src="<?php echo $rs['thumb']['gd']['auto'];?>" border="0" alt="<?php echo $value['title'];?>" /></li>
							<?php } ?>
							<?php $rs_pictures_id["num"] = 0;$rs['pictures']=is_array($rs['pictures']) ? $rs['pictures'] : array();$rs_pictures_id = array();$rs_pictures_id["total"] = count($rs['pictures']);$rs_pictures_id["index"] = -1;foreach($rs['pictures'] as $key=>$value){ $rs_pictures_id["num"]++;$rs_pictures_id["index"]++; ?>
							<li><img src="<?php echo $value['gd']['thumb'];?>" _src="<?php echo $value['gd']['auto'];?>" border="0" alt="<?php echo $value['title'];?>" /></li>
							<?php } ?>
						</ul>
						<ul class="hd">
							<?php if(!$rs['pictures'] && $rs['thumb']){ ?>
							<li href="<?php echo $rs['thumb']['gd']['auto'];?>" thumb="<?php echo $rs['thumb']['gd']['thumb'];?>"></li>
							<?php } ?>
							<?php $rs_pictures_id["num"] = 0;$rs['pictures']=is_array($rs['pictures']) ? $rs['pictures'] : array();$rs_pictures_id = array();$rs_pictures_id["total"] = count($rs['pictures']);$rs_pictures_id["index"] = -1;foreach($rs['pictures'] as $key=>$value){ $rs_pictures_id["num"]++;$rs_pictures_id["index"]++; ?>
							<li href="<?php echo $value['gd']['auto'];?>" thumb="<?php echo $value['gd']['thumb'];?>"></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div style="text-align:center;line-height:170%;"><img src="tpl/www/images/zoom.png" /> 鼠标按住图片可看放大效果</div>
				<?php if($config['code']['share']){ ?>
				<div style="margin-top:5px;"><?php echo $config['code']['share'];?></div>
				<?php } ?>
			</div>
			<div class="am-u-sm-7">
				<h1><?php echo $rs['title'];?></h1>
				<ul class="am-list am-list-static">
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b>查看次数</b></div>
							<div class="am-u-sm-8"><?php echo $rs['hits'];?></div>
						</div>
					</li>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b>添加时间</b></div>
							<div class="am-u-sm-8"><?php echo time_format($rs['dateline']);?></div>
						</div>
					</li>
					<?php if($rs['tag']){ ?>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b>标签</b></div>
							<div class="am-u-sm-8">
								<?php $tmpid["num"] = 0;$rs['tag']=is_array($rs['tag']) ? $rs['tag'] : array();$tmpid = array();$tmpid["total"] = count($rs['tag']);$tmpid["index"] = -1;foreach($rs['tag'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
								<?php if($value['index']){ ?>，<?php } ?><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a>
								<?php } ?>
							</div>
						</div>						
					</li>
					<?php } ?>
					<?php $tmpid["num"] = 0;$rs['apps']=is_array($rs['apps']) ? $rs['apps'] : array();$tmpid = array();$tmpid["total"] = count($rs['apps']);$tmpid["index"] = -1;foreach($rs['apps'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b><?php echo $value['me']['title'];?></b></div>
							<div class="am-u-sm-8">
								<select name="<?php echo $key;?>_id" id="<?php echo $key;?>_id" data-name="apps" data-id="<?php echo $key;?>" onchange="update_apps('<?php echo $key;?>')">
									<?php $idxx["num"] = 0;$value['list']=is_array($value['list']) ? $value['list'] : array();$idxx = array();$idxx["total"] = count($value['list']);$idxx["index"] = -1;foreach($value['list'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
									<option value="<?php echo $value['id'];?>" data-price="<?php echo $v['price'];?>"<?php if($value['rs']['id'] == $v['id']){ ?> selected<?php } ?>><?php echo $v['title'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</li>
					<?php if($value['rs']){ ?>
					<script type="text/javascript">
					$(document).ready(function(){
						update_apps('<?php echo $key;?>');
					});
					</script>
					<?php } ?>
					<?php } ?>
					<?php $rs_attrlist_id["num"] = 0;$rs['attrlist']=is_array($rs['attrlist']) ? $rs['attrlist'] : array();$rs_attrlist_id = array();$rs_attrlist_id["total"] = count($rs['attrlist']);$rs_attrlist_id["index"] = -1;foreach($rs['attrlist'] as $key=>$value){ $rs_attrlist_id["num"]++;$rs_attrlist_id["index"]++; ?>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b><?php echo $value['title'];?></b></div>
							<div class="am-u-sm-8">
								<input type="hidden" name="attr" id="attr_<?php echo $value['id'];?>" value="" />
								<?php $tmpid["num"] = 0;$value['rslist']=is_array($value['rslist']) ? $value['rslist'] : array();$tmpid = array();$tmpid["total"] = count($value['rslist']);$tmpid["index"] = -1;foreach($value['rslist'] as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
								<div class="attr" name="attr<?php echo $value['id'];?>" data="<?php echo $v['id'];?>" price="<?php echo $v['price'];?>" weight="<?php echo $v['weight'];?>" volume="<?php echo $v['volume'];?>" onclick="attr_select('<?php echo $v['id'];?>','<?php echo $value['id'];?>')"><?php echo $v['title'];?></div>
								<?php } ?>
							</div>
						</div>
					</li>
					<?php } ?>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b>购买数量：</b></div>
							<div class="am-u-sm-8 am-form">
								<input name="buycount" id="buycount" value="1" type="number" min="1" />
							</div>
						</div>
					</li>
					<li>
						<div class="am-g">
							<div class="am-u-sm-4"><b>价格</b></div>
							<div class="am-u-sm-8"><span class="price" style="color:red;font-size:16px;" id="showprice"><?php echo price_format($rs['price'],$rs['currency_id'],$config['currency_id']);?></span></div>
						</div>
					</li>
				</ul>
				<div>
					<button type="button" class="am-btn am-btn-primary" onclick="$.cart.add('<?php echo $rs['id'];?>',$('#buycount').val())"><i class="am-icon-shopping-cart"></i> 加入购物车</button>
					<button type="button" class="am-btn am-btn-warning am-fr" onclick="$.cart.onebuy('<?php echo $rs['id'];?>',$('#buycount').val())"><i class="am-icon-check"></i> 立即购买</button>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="am-tabs"  data-am-tabs="{noSwipe: 1}">
			<ul class="am-tabs-nav am-nav am-nav-tabs">
				<li class="am-active"><a href="#content-intro">商品介绍</a></li>
				<?php if($rs['pictures']){ ?><li><a href="#content-pictures">商品图集</a></li><?php } ?>
				<?php if($rs['package']){ ?><li><a href="#content-package">包装清单</a></li><?php } ?>
				<li><a href="#content-protection">售后保障</a></li>
				<?php if($page_rs['comment_status']){ ?><li><a href="#content-comment">商品评价</a></li><?php } ?>
			</ul>
			<div class="am-tabs-bd">
				<div class="am-tab-panel am-fade am-in am-active" id="content-intro"><?php echo $rs['content'];?></div>
				<?php if($rs['pictures']){ ?>
				<div class="am-tab-panel am-fade" id="content-pictures">
					<?php $tmpid["num"] = 0;$rs['pictures']=is_array($rs['pictures']) ? $rs['pictures'] : array();$tmpid = array();$tmpid["total"] = count($rs['pictures']);$tmpid["index"] = -1;foreach($rs['pictures'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<p align="center"><img src="<?php echo $value['gd']['auto'];?>" border="0" /></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if($rs['package']){ ?>
				<div class="am-tab-panel am-fade" id="content-package"><?php echo nl2br($rs['package']);?></div>
				<?php } ?>
				<div class="am-tab-panel am-fade" id="content-protection"><?php $t = phpok('after-sale-protection');?><?php echo $t['content'];?></div>
				<?php if($page_rs['comment_status']){ ?>
				<div class="am-tab-panel am-fade" id="content-comment"><?php $this->assign("tid",$rs['id']); ?><?php $this->output("block/comment","file",true,false); ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php $this->output("footer","file",true,false); ?>
