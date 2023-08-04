<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><ol class="am-breadcrumb am-breadcrumb-slash">
	<li>您现在的位置：<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>" class="am-icon-home">首页</a></li>
	<?php if($parent_rs){ ?>
	<li><a href="<?php echo $parent_rs['url'];?>"><?php echo $parent_rs['title'];?></a></li>
	<?php } ?>
	<?php if($page_rs && $sys['ctrl'] != 'usercp' && $sys['ctrl'] != 'post'){ ?>
	<li<?php if(!$cate_rs && !$rs){ ?> class="am-active"<?php } ?>><a href="<?php echo phpok_url(array('id'=>$page_rs['identifier']));?>"><?php echo $page_rs['title'];?></a></li>
	<?php } ?>
	<?php if($cate_parent_rs && $cate_parent_rs['id'] != $page_rs['cate']){ ?>
	<li><a href="<?php echo $cate_parent_rs['url'];?>"><?php echo $cate_parent_rs['title'];?></a></li>
	<?php } ?>
	<?php if($cate_rs && $cate_rs['id'] != $page_rs['cate']  && $sys['ctrl'] != 'usercp' && $sys['ctrl'] != 'post'){ ?>
	<li<?php if(!$rs){ ?> class="am-active"<?php } ?>><a href="<?php echo $cate_rs['url'];?>"><?php echo $cate_rs['title'];?></a></li>
	<?php } ?>
	<?php if($rs && $sys['ctrl'] == 'content'){ ?>
	<li class="am-active"><a href="<?php echo $rs['url'];?>" title="<?php echo $rs['title'];?>"><?php echo $rs['title'];?></a></li>
	<?php } ?>
	<?php if($sys['ctrl'] == 'cart'){ ?>
		<li<?php if($sys['func'] == 'index'){ ?> class="am-active"<?php } ?>><a href="<?php echo phpok_url(array('ctrl'=>'cart'));?>" title="购物车">购物车</a></li>
		<?php if($sys['func'] == 'checkout'){ ?>
		<li class="am-active">结算</li>
		<?php } ?>
	<?php } ?>
	<?php if($sys['ctrl'] == 'search'){ ?>
		<li<?php if(!$keywords){ ?> class="am-active"<?php } ?>><a href="<?php echo phpok_url(array('ctrl'=>'search'));?>" title="搜索">搜索</a></li>
		<?php if($keywords){ ?>
		<li class="am-active">搜索关键字：<?php echo $keywords;?></li>
		<?php } ?>
	<?php } ?>
	<?php if($sys['ctrl'] == 'tag'){ ?>
		<li class="am-active">标签：<?php echo $rs['title'];?></li>
	<?php } ?>
	<?php if($session['user_id'] && $sys['ctrl'] == 'usercp'){ ?>
		<li<?php if($sys['func'] == 'index'){ ?> class="am-active"<?php } ?>><a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">会员中心</a></li>
		<?php if($sys['func'] == 'info'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'info'));?>">个人资料</a></li>
		<?php }elseif($sys['func'] == 'avatar'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'avatar'));?>">更换头像</a></li>
		<?php }elseif($sys['func'] == 'address'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'address'));?>">收货地址</a></li>
		<?php }elseif($sys['func'] == 'fav'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'fav'));?>">收藏夹</a></li>
		<?php }elseif($sys['func'] == 'passwd'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'passwd'));?>">修改密码</a></li>
		<?php }elseif($sys['func'] == 'mobile'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'mobile'));?>">修改手机号</a></li>
		<?php }elseif($sys['func'] == 'email'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'email'));?>">修改邮箱</a></li>
		<?php }elseif($sys['func'] == 'wealth'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'wealth'));?>">我的财富</a></li>
		<?php }elseif($sys['func'] == 'wealth_log'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'wealth'));?>">我的财富</a></li>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'wealth_log','id'=>$rs['id']));?>"><?php echo $rs['title'];?></a></li>
		<?php }elseif($sys['func'] == 'introducer'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'introducer'));?>">推荐分享</a></li>
		<?php }elseif($sys['func'] == 'list' && $page_rs){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'list','id'=>$page_rs['identifier']));?>"><?php echo $page_rs['title'];?></a></li>
		<?php } ?>
	<?php } ?>
	<?php if($session['user_id'] && $sys['ctrl'] == 'payment'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">会员中心</a></li>
		<?php if($sys['func'] == 'index'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'payment'));?>">在线充值</a></li>
		<?php } ?>
	<?php } ?>
	<?php if($session['user_id'] && $sys['ctrl'] == 'order'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">会员中心</a></li>
		<?php if($sys['func'] == 'index'){ ?>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'order'));?>">我的订单</a></li>
		<?php }elseif($sys['func'] == 'info'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'order'));?>">我的订单</a></li>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','id'=>$rs['id']));?>">订单明细（<?php echo $rs['sn'];?>）</a></li>
		<?php }elseif($sys['func'] == 'payment'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'order'));?>">我的订单</a></li>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','id'=>$rs['id']));?>">订单明细（<?php echo $rs['sn'];?>）</a></li>
		<li class="am-active">在线付款</li>
		<?php } ?>
	<?php } ?>
	<?php if(!$session['user_id'] && $sys['ctrl'] == 'order'){ ?>
		<?php if($sys['func'] == 'info'){ ?>
		<li>会员中心</li>
		<li>我的订单</li>
		<li class="am-active"><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','sn'=>$rs['sn'],'passwd'=>$rs['passwd']));?>">订单明细（<?php echo $rs['sn'];?>）</a></li>
		<?php }elseif($sys['func'] == 'payment'){ ?>
		<li>会员中心</li>
		<li>我的订单</li>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'order','func'=>'info','sn'=>$rs['sn'],'passwd'=>$rs['passwd']));?>">订单明细（<?php echo $rs['sn'];?>）</a></li>
		<li class="am-active">在线付款</li>
		<?php } ?>
	<?php } ?>
	<?php if($session['user_id'] && $sys['ctrl'] == 'post'){ ?>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp'));?>">会员中心</a></li>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'usercp','func'=>'list','id'=>$page_rs['identifier']));?>"><?php echo $page_rs['title'];?></a></li>
		<li class="am-active"><?php if($sys['func'] == 'edit'){ ?>编辑<?php } else { ?>发布<?php } ?></li>
	<?php } ?>
	<?php $tmpid["num"] = 0;$leader=is_array($leader) ? $leader : array();$tmpid = array();$tmpid["total"] = count($leader);$tmpid["index"] = -1;foreach($leader as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<li><?php if($value['url']){ ?><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a><?php } else { ?><?php echo $value['title'];?><?php } ?></li>
	<?php } ?>
</ol>