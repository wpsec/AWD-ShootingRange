<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title",$rs['title']); ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo include_js('list.js');?>"></script>
<?php if($project_list){ ?>
<div class="layui-card" phpok-id="JS_PROJECT">
	<div class="layui-card-header"><?php echo P_Lang("子项信息，请点击操作");?> <span class="red"><?php echo $rs['title'];?></span></div>
	<div class="layui-card-body">
		<ul class="project" id="project">
			<?php $project_list_id["num"] = 0;$project_list=is_array($project_list) ? $project_list : array();$project_list_id = array();$project_list_id["total"] = count($project_list);$project_list_id["index"] = -1;foreach($project_list as $key=>$value){ $project_list_id["num"]++;$project_list_id["index"]++; ?>
			<li id="project_<?php echo $value['id'];?>" title="<?php echo $value['title'];?>" status="<?php echo $value['status'];?>" href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$value['id']));?>">
				<div class="img"><img src="<?php echo $value['ico'] ? $value['ico'] : 'images/ico/default.png';?>" /></div>
				<div class="txt" id="txt_<?php echo $value['id'];?>"><?php echo $value['nick_title'] ? $value['nick_title'] : $value['title'];?></div>
			</li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>

<?php if($rs['module']){ ?>
<div class="layui-card" id="search_html" phpok-id="JS_SEARCH">
	<div class="layui-card-header hand" onclick="$.admin.card(this)">
		<?php echo P_Lang("搜索");?>
		<i class="layui-icon <?php if($keywords || $psize2){ ?>layui-icon-down<?php } else { ?>layui-icon-right<?php } ?>"></i>
	</div>
	<div class="layui-card-body<?php if(!$keywords && !$psize2){ ?> hide<?php } ?>">
		<form method="post" class="layui-form" action="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>">
		<div class="layui-form-item phpok-search">
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("每页数量");?></label>
				<div class="layui-input-block">
					<select name="psize">
						<?php if($rs && $rs['psize']){ ?><option value="<?php echo $rs['psize'];?>"><?php echo $rs['psize'];?></option><?php } ?>
						<option value="30"<?php if($psize2 && $psize2 == 30){ ?> selected<?php } ?>>30</option>
						<option value="50"<?php if($psize2 && $psize2 == 50){ ?> selected<?php } ?>>50</option>
						<option value="70"<?php if($psize2 && $psize2 == 70){ ?> selected<?php } ?>>70</option>
						<option value="90"<?php if($psize2 && $psize2 == 90){ ?> selected<?php } ?>>90</option>
						<option value="100"<?php if($psize2 && $psize2 == 100){ ?> selected<?php } ?>>100</option>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("状态");?></label>
				<div class="layui-input-block">
					<select name="keywords[status]">
						<option value=""></option>
						<option value="1"<?php if($keywords && $keywords['status']==1){ ?> selected<?php } ?>>已审核</option>
						<option value="2"<?php if($keywords && $keywords['status']==2){ ?> selected<?php } ?>>未审核</option>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("是否隐藏");?></label>
				<div class="layui-input-block">
					<select name="keywords[hidden]">
						<option value=""><?php echo P_Lang("不限");?></option>
						<option value="1"<?php if($keywords && $keywords['hidden']==1){ ?> selected<?php } ?>>隐藏</option>
						<option value="2"<?php if($keywords && $keywords['hidden']==2){ ?> selected<?php } ?>>显示</option>
					</select>
				</div>
			</div>
			<?php if($rs['is_attr']){ ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("属性");?></label>
				<div class="layui-input-block">
					<select name="keywords[attr]" id="search_attr">
						<option value=""></option>
						<?php $attrlist_id["num"] = 0;$attrlist=is_array($attrlist) ? $attrlist : array();$attrlist_id = array();$attrlist_id["total"] = count($attrlist);$attrlist_id["index"] = -1;foreach($attrlist as $key=>$value){ $attrlist_id["num"]++;$attrlist_id["index"]++; ?>
						<option value="<?php echo $key;?>"<?php if($keywords && $keywords['attr'] == $key){ ?> selected<?php } ?>><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<?php } ?>
			<?php if($rs['cate'] && $catelist){ ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("分类");?></label>
				<div class="layui-input-block">
					<select name="keywords[cateid]">
						<option value=""><?php echo P_Lang("选择分类…");?></option>
						<?php $opt_catelist_id["num"] = 0;$opt_catelist=is_array($opt_catelist) ? $opt_catelist : array();$opt_catelist_id = array();$opt_catelist_id["total"] = count($opt_catelist);$opt_catelist_id["index"] = -1;foreach($opt_catelist as $key=>$value){ $opt_catelist_id["num"]++;$opt_catelist_id["index"]++; ?>
						<option value="<?php echo $value['id'];?>"<?php if($keywords && $keywords['cateid'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['_space'];?><?php echo $value['title'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("排序");?></label>
				<div class="layui-input-block">
					<select name="keywords[orderby_search]">
						<option value=""><?php echo P_Lang("默认排序");?></option>
						<option value="hits_hot"<?php if($keywords && $keywords['orderby_search']=='hits_hot'){ ?> selected<?php } ?>><?php echo P_Lang("查看次数多到少");?></option>
						<option value="hits_cold"<?php if($keywords && $keywords['orderby_search']=='hits_cold'){ ?> selected<?php } ?>><?php echo P_Lang("查看次数少到多");?></option>
						<?php if($rs['is_biz']){ ?>
						<option value="price_high"<?php if($keywords && $keywords['orderby_search']=='price_high'){ ?> selected<?php } ?>><?php echo P_Lang("价格从高到低");?></option>
						<option value="price_low"<?php if($keywords && $keywords['orderby_search']=='price_low'){ ?> selected<?php } ?>><?php echo P_Lang("价格从低到高");?></option>
						<?php } ?>
						<option value="sort_max"<?php if($keywords && $keywords['orderby_search']=='sort_max'){ ?> selected<?php } ?>><?php echo P_Lang("排序从高到低");?></option>
						<option value="sort_min"<?php if($keywords && $keywords['orderby_search']=='sort_min'){ ?> selected<?php } ?>><?php echo P_Lang("排序从低到高");?></option>
						<option value="dateline_max"<?php if($keywords && $keywords['orderby_search']=='dateline_max'){ ?> selected<?php } ?>><?php echo P_Lang("最后发布排在前面");?></option>
						<option value="dateline_min"<?php if($keywords && $keywords['orderby_search']=='dateline_min'){ ?> selected<?php } ?>><?php echo P_Lang("以前发布的排在前面");?></option>
						<option value="id_max"<?php if($keywords && $keywords['orderby_search']=='id_max'){ ?> selected<?php } ?>><?php echo P_Lang("ID值从大到小");?></option>
						<option value="id_min"<?php if($keywords && $keywords['orderby_search']=='id_min'){ ?> selected<?php } ?>><?php echo P_Lang("ID值从小到大");?></option>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("开始时间");?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[dateline_start]" class="layui-input" id="dateline_start"<?php if($keywords){ ?> value="<?php echo $keywords['dateline_start'];?>"<?php } ?> />
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("结束时间");?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[dateline_stop]" class="layui-input" id="dateline_stop"<?php if($keywords){ ?> value="<?php echo $keywords['dateline_stop'];?>"<?php } ?> />
				</div>
			</div>
			<?php $tmpid["num"] = 0;$ext_list=is_array($ext_list) ? $ext_list : array();$tmpid = array();$tmpid["total"] = count($ext_list);$tmpid["index"] = -1;foreach($ext_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<?php if($value['search'] == 1 || $value['search'] == 2){ ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo $value['title'];?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[<?php echo $value['identifier'];?>]" class="layui-input"<?php if($keywords){ ?> value="<?php echo $keywords[$value['identifier']];?>"<?php } ?> placeholder="<?php if($value['search'] == 1){ ?><?php echo P_Lang("仅支持精确搜索");?><?php } else { ?><?php echo P_Lang("支持模糊搜索");?><?php } ?>" />
				</div>
			</div>
			<?php } ?>
			<?php } ?>
			<?php if($rs['is_tag']){ ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("标签Tag");?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[tag]" class="layui-input"<?php if($keywords){ ?> value="<?php echo $keywords['tag'];?>"<?php } ?> placeholder="<?php echo P_Lang("多个标签请用逗号隔开");?>" />
				</div>
			</div>
			<?php } ?>
			<?php if($rs['is_userid']){ ?>
			<div class="layui-inline">
				<label class="layui-form-label"><i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("支持包括会员账号、手机号及Email的模糊搜索");?>">&#xe702;</i> <?php echo P_Lang("会员");?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[user]" class="layui-input"<?php if($keywords){ ?> value="<?php echo $keywords['user'];?>"<?php } ?> />
				</div>
			</div>
			<?php } ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo $rs['alias_title'] ? $rs['alias_title'] : P_Lang('主题');?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[title]" class="layui-input"<?php if($keywords){ ?> value="<?php echo $keywords['title'];?>"<?php } ?> placeholder="<?php echo P_Lang("支持模糊搜索");?>" />
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label">ID</label>
				<div class="layui-input-block">
					<ul class="layout">
						<li style="width:47%">
							<select name="keywords[_id]">
								<option value="0"><?php echo P_Lang("等于");?> =</option>
								<option value="1"><?php echo P_Lang("大于");?> &gt;</option>
								<option value="2"><?php echo P_Lang("小于");?> &lt;</option>
							</select>
						</li>
						<li style="width:43%"><input type="text" name="keywords[id]" value="<?php echo $keywords['id'];?>" class="layui-input" /></li>
					</ul>
				</div>
			</div>
			
			<div class="layui-inline">
				<div class="layui-input-block">
					<input type="submit" value="<?php echo P_Lang("提交搜索");?>" class="layui-btn" />
					<?php if($keywords){ ?>
					<input type="button" value="<?php echo P_Lang("取消搜索");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$rs['id']));?>')" class="layui-btn layui-btn-primary" />
					<?php } ?>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?php } ?>

<?php if($rs['admin_note']){ ?>
<div class="layui-card">
	<div class="layui-card-body"><?php echo $rs['admin_note'];?></div>
</div>
<?php } ?>



<div class="layui-card" phpok-id="JS_LIST">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<span id="AP_ACTION_HTML"></span>
		<div class="layui-btn-group fr">
			<?php if($popedom['add']){ ?>
			<button class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.win('<?php echo $rs['title'];?>_<?php echo P_Lang("添加内容");?>','<?php echo phpok_url(array('ctrl'=>'list','func'=>'edit','pid'=>$pid));?>')"><span class="layui-icon">&#xe654;</span><?php echo P_Lang("添加内容");?></button>
			<?php } ?>
			<?php if($popedom['set'] || $session['admin_rs']['if_system']){ ?>
			<button class="layui-btn layui-btn-sm" onclick="$.phpok_list.set(<?php echo $pid;?>)"><span class="layui-icon">&#xe642;</span><?php echo P_Lang("编辑项目");?></button>
			<?php } ?>
		</div>
	</div>
	<?php if($rslist){ ?>
	<div class="layui-card-body">
		<table class="layui-table" lay-size="sm">
		<thead>
		<tr>
			<th width="20px">&nbsp;</th>
			<th width="20px">&nbsp;</th>
			<th class="center">ID</th>
			<th style="min-width:150px;"><?php echo $rs['alias_title'] ? $rs['alias_title'] : P_Lang('主题');?></th>
			<?php if($rs['cate']){ ?>
			<th class="center"><?php echo P_Lang("主分类");?></th>
			<?php } ?>
			<?php $layout_id["num"] = 0;$layout=is_array($layout) ? $layout : array();$layout_id = array();$layout_id["total"] = count($layout);$layout_id["index"] = -1;foreach($layout as $key=>$value){ $layout_id["num"]++;$layout_id["index"]++; ?>
				<?php if($key == "dateline"){ ?>
				<th style="width:150px" class="center"><?php echo $value;?></th>
				<?php }elseif($key == "hits"){ ?>
				<th style="width:50px" class="center"><?php echo P_Lang("点击");?></th>
				<?php }elseif($key == "sort"){ ?>
				<th style="width:80px" class="center"><?php echo P_Lang("排序");?></th>
				<?php } else { ?>
				<th class="lft"><?php echo $value;?></th>
				<?php } ?>
			<?php } ?>
		</tr>
		</thead>
		<?php $tmp_m = 0;?>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<?php $tmp_m++;?>
		<tr id="list_<?php echo $value['id'];?>" class="layui-tips" title="<?php echo $rs['alias_title'] ? $rs['alias_title'] : P_Lang('主题');?>: <?php echo $value['title'];?>&#10;<?php echo P_Lang("发布日期");?>: <?php echo date('Y-m-d H:i:s',$value['dateline']);?>">
			<td class="center"><input type="checkbox" name="ids[]" id="id_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" /></td>
			<td><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_list.status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor: default;"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
			<td class="center"><?php echo $value['id'];?></td>
			<td><label for="id_<?php echo $value['id'];?>">
				<?php echo $value['title'];?>
				<?php if($value['attr']){ ?>
					<?php $attr = explode(",",$value['attr']);?>
					<?php $attr_id["num"] = 0;$attr=is_array($attr) ? $attr : array();$attr_id = array();$attr_id["total"] = count($attr);$attr_id["index"] = -1;foreach($attr as $attr_k=>$attr_v){ $attr_id["num"]++;$attr_id["index"]++; ?>
					<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[attr]=<?php echo $attr_v;?>" class="gray">[<?php echo $attrlist[$attr_v];?>]</a>
					<?php } ?>
				<?php } ?>
				<?php if($value['identifier']){ ?>
				<span class="gray i">（<?php echo $value['identifier'];?>）</span>
				<?php } ?>
				<?php if($rs['is_biz']){ ?>
				<span class="red i"> <?php echo price_format($value['price'],$value['currency_id']);?></span>
				<?php } ?>
				<?php if($value['hidden']){ ?>
				<span class="red i">(<?php echo P_Lang("隐藏");?>)</span>
				<?php } ?>
				<?php if($clist && $clist[$value['id']]){ ?>
				<div class="extcate">
					<?php echo P_Lang("分类");?>
					<?php $clist__value_id__id["num"] = 0;$clist[$value['id']]=is_array($clist[$value['id']]) ? $clist[$value['id']] : array();$clist__value_id__id = array();$clist__value_id__id["total"] = count($clist[$value['id']]);$clist__value_id__id["index"] = -1;foreach($clist[$value['id']] as $ck=>$cv){ $clist__value_id__id["num"]++;$clist__value_id__id["index"]++; ?>
					<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[cateid]=<?php echo $cv;?>" class="i"><?php echo $cateall[$cv];?></a> 
					<?php } ?>
				</div>
				<?php } ?>
				<div class="layui-btn-group" style="display: block;">
					<?php if($rs['is_front']){ ?>
					<input type="button" value="<?php echo P_Lang("查看");?>" onclick="$.phpok.open('<?php echo $sys['www_file'];?>?id=<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs layui-btn-normal" />
					<?php } ?>
					<?php if($popedom['modify']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="top.$.win('<?php echo $rs['title'];?>_<?php echo P_Lang("编辑");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'list','func'=>'edit','id'=>$value['id']));?>')" class="layui-btn layui-btn-xs" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="content_del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs layui-btn-danger" />
					<?php } ?>
					<?php if($popedom['comment'] && ($rs['comment_status'] || $comments[$value['id']])){ ?>
					<button type="button"class="layui-btn layui-btn-xs" onclick="$.admin_list.reply_it('<?php echo $value['id'];?>')">
						<?php echo P_Lang("评论");?>
						<?php if($comments[$value['id']]['uncheck']){ ?><span class="layui-badge layui-bg-orange"><?php echo $comments[$value['id']]['uncheck'];?></span><?php } ?>
					</button>
					<?php } ?>
					<?php if($rs['subtopics'] && !$value['parent_id'] && $popedom['add']){ ?><input type="button" value="<?php echo P_Lang("加子主题");?>" onclick="$.win('<?php echo P_Lang("加子主题");?>_<?php echo $rs['title'];?>','<?php echo phpok_url(array('ctrl'=>'list','func'=>'edit','parent_id'=>$value['id'],'pid'=>$value['project_id']));?>')" class="layui-btn layui-btn-xs" /><?php } ?>
				</div>
			</label>
			</td>
			<?php if($rs['cate']){ ?>
			<td class="gray center">
				<?php if($value['cate_id'] && is_array($value['cate_id'])){ ?>
				<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[cateid]=<?php echo $value['cate_id']['id'];?>"><?php echo $value['cate_id']['title'];?></a>
				<?php } else { ?>
				<?php echo P_Lang("未设分类");?>
				<?php } ?>
			</td>
			<?php } ?>
			
			<?php $layout_id["num"] = 0;$layout=is_array($layout) ? $layout : array();$layout_id = array();$layout_id["total"] = count($layout);$layout_id["index"] = -1;foreach($layout as $k=>$v){ $layout_id["num"]++;$layout_id["index"]++; ?>
				<?php if($k == "dateline"){ ?>
				<td class="center"><?php echo date('Y-m-d H:i',$value['dateline']);?></td>
				<?php }elseif($k == "hits"){ ?>
				<td class="center"><?php echo $value['hits'];?></td>
				<?php }elseif($k == 'sort'){ ?>
				<td class="center"><input type="text" name="taxis" value="<?php echo $value['sort'];?>" class="center short" tabindex="<?php echo $tmp_m;?>" onchange="$.phpok_list.sort(this,'<?php echo $value['id'];?>')" /></td>
				<?php }elseif($k == "user_id"){ ?>
				<td><?php echo $value['_user'] ? $value['_user'] : '-';?></td>
				<?php } else { ?>
					<?php if(is_array($value[$k])){ ?>
						<?php $c_list = $value[$k]['_admin'];?>
						<?php if($c_list['type'] == 'pic'){ ?>
						<td><img src="<?php echo $c_list['info'];?>" width="28px" height="28px" border="0" class="hand" onclick="preview_attr('<?php echo $c_list['id'];?>')" style="border:1px solid #dedede;padding:1px;" /></td>
						<?php } else { ?>
							<?php if(is_array($c_list['info'])){ ?>
							<td><?php echo implode(' / ',$c_list['info']);?></td>
							<?php } else { ?>
							<td><?php echo $c_list['info'] ? $c_list['info'] : '-';?></td>
							<?php } ?>
						<?php } ?>
					<?php } else { ?>
					<td><?php echo $value[$k] ? $value[$k] : '-';?></td>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		</tr>
			<?php $value_sonlist_id["num"] = 0;$value['sonlist']=is_array($value['sonlist']) ? $value['sonlist'] : array();$value_sonlist_id = array();$value_sonlist_id["total"] = count($value['sonlist']);$value_sonlist_id["index"] = -1;foreach($value['sonlist'] as $kk=>$vv){ $value_sonlist_id["num"]++;$value_sonlist_id["index"]++; ?>
			<?php $tmp_m++;?>
			<tr id="list_<?php echo $vv['id'];?>" class="layui-tips" title="<?php echo $rs['alias_title'] ? $rs['alias_title'] : P_Lang('主题');?>: <?php echo $vv['title'];?>&#10;<?php echo P_Lang("发布日期");?>: <?php echo date('Y-m-d H:i:s',$vv['dateline']);?>">
				<td class="center"><input type="checkbox" name="ids[]" id="id_<?php echo $vv['id'];?>" value="<?php echo $vv['id'];?>" /></td>
				<td><span class="status<?php echo $vv['status'];?>" id="status_<?php echo $vv['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_list.status(<?php echo $vv['id'];?>)"<?php } else { ?> style="cursor: default;"<?php } ?> value="<?php echo $vv['status'];?>"></span></td>
				<td class="center"><?php echo $vv['id'];?></td>
				<td><label for="id_<?php echo $vv['id'];?>">
					&nbsp; &nbsp; ├─ <a href="<?php echo $sys['url'];?>?id=<?php echo $vv['id'];?>" target="_blank" title="<?php echo P_Lang("前台访问");?>" style="<?php echo $vv['style'];?>"><?php echo $vv['title'];?></a>
					<?php if($vv['attr']){ ?>
						<?php $attr = explode(",",$vv['attr']);?>
						<?php $attr_id["num"] = 0;$attr=is_array($attr) ? $attr : array();$attr_id = array();$attr_id["total"] = count($attr);$attr_id["index"] = -1;foreach($attr as $attr_k=>$attr_v){ $attr_id["num"]++;$attr_id["index"]++; ?>
						<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[attr]=<?php echo $attr_v;?>" class="gray">[<?php echo $attrlist[$attr_v];?>]</a>
						<?php } ?>
					<?php } ?>
					<?php if($vv['identifier']){ ?>
					<span class="gray i">（<?php echo $vv['identifier'];?>）</span>
					<?php } ?>
					<?php if($rs['is_biz']){ ?>
					<span class="red i"> <?php echo price_format($vv['price'],$vv['currency_id']);?></span>
					<?php } ?>
					<?php if($vv['hidden']){ ?>
					<span class="red i">(隐藏)</span>
					<?php } ?>
					<?php if($clist && $clist[$vv['id']]){ ?>
					<div class="extcate">
						分类：
						<?php $clist__vv_id__id["num"] = 0;$clist[$vv['id']]=is_array($clist[$vv['id']]) ? $clist[$vv['id']] : array();$clist__vv_id__id = array();$clist__vv_id__id["total"] = count($clist[$vv['id']]);$clist__vv_id__id["index"] = -1;foreach($clist[$vv['id']] as $ck=>$cv){ $clist__vv_id__id["num"]++;$clist__vv_id__id["index"]++; ?>
						<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[cateid]=<?php echo $cv;?>" class="i"><?php echo $cateall[$cv];?></a> 
						<?php } ?>
					</div>
					<?php } ?>
					<div class="layui-btn-group" style="display: block;">
						<?php if($rs['is_front']){ ?>
						<input type="button" value="<?php echo P_Lang("查看");?>" onclick="$.phpok.open('<?php echo $sys['www_file'];?>?id=<?php echo $vv['id'];?>')" class="layui-btn layui-btn-xs layui-btn-normal" />
						<?php } ?>
						<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="top.$.win('<?php echo $rs['title'];?>_<?php echo P_Lang("编辑");?>_#<?php echo $vv['id'];?>','<?php echo phpok_url(array('ctrl'=>'list','func'=>'edit','id'=>$vv['id']));?>')" class="layui-btn layui-btn-xs" /><?php } ?>
						<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="content_del('<?php echo $vv['id'];?>')" class="layui-btn layui-btn-xs layui-btn-danger" /><?php } ?>
						<?php if($popedom['comment'] && ($rs['comment_status'] || $comments[$vv['id']])){ ?>
						<button type="button"class="layui-btn layui-btn-xs" onclick="$.admin_list.reply_it('<?php echo $vv['id'];?>')">
							<?php echo P_Lang("评论");?>
							<?php if($comments[$vv['id']]['uncheck']){ ?><span class="layui-badge layui-bg-orange"><?php echo $comments[$vv['id']]['uncheck'];?></span><?php } ?>
						</button>
						<?php } ?>
					</div>
				</label>
				</td>
				<?php if($rs['cate']){ ?>
				<td class="gray center">
					<?php if($vv['cate_id'] && is_array($vv['cate_id'])){ ?>
					<a href="<?php echo phpok_url(array('ctrl'=>'list','func'=>'action','id'=>$pid));?>&keywords[cateid]=<?php echo $vv['cate_id']['id'];?>"><?php echo $vv['cate_id']['title'];?></a>
					<?php } else { ?>
					<?php echo P_Lang("未设分类");?>
					<?php } ?>
				<?php } ?>
				<?php $layout_id["num"] = 0;$layout=is_array($layout) ? $layout : array();$layout_id = array();$layout_id["total"] = count($layout);$layout_id["index"] = -1;foreach($layout as $k=>$v){ $layout_id["num"]++;$layout_id["index"]++; ?>
					<?php if($k == "dateline"){ ?>
					<td class="center"><?php echo date("Y-m-d H:i",$vv['dateline']);?></td>
					<?php }elseif($k == "hits"){ ?>
					<td class="center"><?php echo $vv['hits'];?></td>
					<?php }elseif($k == 'sort'){ ?>
					<td class="center"><input type="text" name="taxis" value="<?php echo $vv['sort'];?>" class="center short" tabindex="<?php echo $tmp_m;?>" onchange="$.phpok_list.sort(this,'<?php echo $vv['id'];?>')" /></td>
					<?php }elseif($k == 'user_id'){ ?>
					<td><?php echo $vv['_user'] ? $vv['_user'] : '-';?></td>
					<?php } else { ?>
						<?php if(is_array($vv[$k])){ ?>
							<?php $c_list = $vv[$k]['_admin'];?>
							<?php if($c_list['type'] == 'pic'){ ?>
							<td><img src="<?php echo $c_list['info'];?>" width="28px" height="28px" border="0" class="hand" onclick="preview_attr('<?php echo $c_list['id'];?>')" style="border:1px solid #dedede;padding:1px;" /></td>
							<?php } else { ?>
								<?php if(is_array($c_list['info'])){ ?>
								<td><?php echo implode(' / ',$c_list['info']);?></td>
								<?php } else { ?>
								<td><?php echo $c_list['info'] ? $c_list['info'] : '-';?></td>
								<?php } ?>
							<?php } ?>
						<?php } else { ?>
						<td><?php echo $vv[$k] ? $vv[$k] : '-';?></td>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</tr>
			<?php } ?>
		<?php } ?>
		</table>
		<div phpok-id="JS_BATCH">
		<ul class="layout">
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("全选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_all()" />
					<input type="button" value="<?php echo P_Lang("全不选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_none()" />
					<input type="button" value="<?php echo P_Lang("反选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_anti()" />
				</div>
			</li>
			<li><select id="list_action_val" onchange="update_select()">
				<option value=""><?php echo P_Lang("选择要执行的动作…");?></option>
				<?php if($opt_catelist){ ?>
				<optgroup label="<?php echo P_Lang("分类操作");?>">
					<?php $opt_catelist_id["num"] = 0;$opt_catelist=is_array($opt_catelist) ? $opt_catelist : array();$opt_catelist_id = array();$opt_catelist_id["total"] = count($opt_catelist);$opt_catelist_id["index"] = -1;foreach($opt_catelist as $key=>$value){ $opt_catelist_id["num"]++;$opt_catelist_id["index"]++; ?>
					<option value="cate:<?php echo $value['id'];?>"><?php echo $value['_space'];?><?php echo $value['title'];?></option>
					<?php } ?>
				</optgroup>
				<?php } ?>
				<?php if($rs['is_attr']){ ?>
				<optgroup label="<?php echo $rs['alias_title'] ? $rs['alias_title'] : P_Lang('主题');?><?php echo P_Lang("属性");?>">
					<?php $attrlist_id["num"] = 0;$attrlist=is_array($attrlist) ? $attrlist : array();$attrlist_id = array();$attrlist_id["total"] = count($attrlist);$attrlist_id["index"] = -1;foreach($attrlist as $key=>$value){ $attrlist_id["num"]++;$attrlist_id["index"]++; ?>
					<option value="attr:<?php echo $key;?>"><?php echo $value;?> <?php echo $key;?></option>
					<?php } ?>
				</optgroup>
				<?php } ?>
				<optgroup label="其他">
					<?php if($popedom['status']){ ?>
					<option value="status"><?php echo P_Lang("审核");?></option>
					<option value="unstatus"><?php echo P_Lang("取消审核");?></option>
					<?php } ?>
					<option value="hidden"><?php echo P_Lang("隐藏");?></option>
					<option value="show"><?php echo P_Lang("显示");?></option>
					<?php if($popedom['delete']){ ?>
					<option value="delete"><?php echo P_Lang("删除");?></option>
					<?php } ?>
					<?php if($popedom['modify'] && $rs['subtopics']){ ?>
					<option value="set_parent"><?php echo P_Lang("绑定父层");?></option>
					<option value="unset_parent"><?php echo P_Lang("取消父层");?></option>
					<?php } ?>
				</optgroup>
				</select></li>
			<li id="attr_set_li" class="hide">
				<select name="attr_set_val" style="margin-top:0px;" id="attr_set_val">
					<option value="add"><?php echo P_Lang("添加");?></option>
					<option value="delete"><?php echo P_Lang("移除");?></option>
				</select>
			</li>
			<?php if($opt_catelist){ ?>
			<li id="cate_set_li" class="hide">
				<select name="cate_set_val" style="margin-top:0px;" id="cate_set_val">
					<?php if($rs['cate_multiple']){ ?>
					<option value="add"><?php echo P_Lang("添加扩展分类");?></option>
					<option value="delete"><?php echo P_Lang("移除分类绑定");?></option>
					<?php } ?>
					<option value="move"><?php echo P_Lang("移动主分类");?></option>
				</select>
			</li>
			<?php } ?>
			<li id="plugin_button"><input type="button" value="<?php echo P_Lang("执行操作");?>" onclick="list_action_exec()" class="layui-btn layui-btn-sm" /></li>
		</ul>
		</div>
		<div class="center"><?php $this->output("pagelist","file",true,false); ?></div>		
	</div>
	<?php } ?>
</div>
<?php $this->output("foot_lay","file",true,false); ?>
