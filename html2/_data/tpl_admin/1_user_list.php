<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo add_js('user.js');?>"></script>
<div class="layui-card" id="search_html">
	<div class="layui-card-header"><?php echo P_Lang("搜索");?></div>
	<div class="layui-card-body">
		<form method="post" action="<?php echo phpok_url(array('ctrl'=>'user'));?>" class="layui-form">
		<div class="layui-form-item phpok-search">
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("每页数量");?></label>
				<div class="layui-input-block">
					<select name="psize">
						<option value="20">20</option>
						<option value="30"<?php if($psize == 30){ ?> selected<?php } ?>>30</option>
						<option value="50"<?php if($psize == 50){ ?> selected<?php } ?>>50</option>
						<option value="70"<?php if($psize == 70){ ?> selected<?php } ?>>70</option>
						<option value="80"<?php if($psize == 80){ ?> selected<?php } ?>>80</option>
						<option value="90"<?php if($psize == 90){ ?> selected<?php } ?>>90</option>
						<option value="100"<?php if($psize == 100){ ?> selected<?php } ?>>100</option>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("会员组");?></label>
				<div class="layui-input-block">
					<select name="group_id">
						<option value=""><?php echo P_Lang("不限");?></option>
						<?php $tmpid["num"] = 0;$grouplist=is_array($grouplist) ? $grouplist : array();$tmpid = array();$tmpid["total"] = count($grouplist);$tmpid["index"] = -1;foreach($grouplist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<option value="<?php echo $value['id'];?>"<?php if($group_id == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo P_Lang("状态");?></label>
				<div class="layui-input-block">
					<select name="keywords[status]">
						<option value=""><?php echo P_Lang("不限");?></option>
						<option value="1"<?php if($keywords['status'] == 1){ ?> selected<?php } ?>><?php echo P_Lang("正常");?></option>
						<option value="3"<?php if($keywords['status'] == 3){ ?> selected<?php } ?>><?php echo P_Lang("未审核");?></option>
						<option value="2"<?php if($keywords['status'] == 2){ ?> selected<?php } ?>><?php echo P_Lang("锁定");?></option>
					</select>
				</div>
			</div>
			<?php $tmpid["num"] = 0;$flist=is_array($flist) ? $flist : array();$tmpid = array();$tmpid["total"] = count($flist);$tmpid["index"] = -1;foreach($flist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<div class="layui-inline">
				<label class="layui-form-label"><?php echo $value;?></label>
				<div class="layui-input-block">
					<input type="text" name="keywords[<?php echo $key;?>]" class="layui-input" value="<?php echo $keywords[$key];?>" />
				</div>
			</div>
			<?php } ?>
			<div class="layui-inline">
				<div class="layui-input-block">
					<input type="submit" value="<?php echo P_Lang("搜索");?>" class="layui-btn" />
					<?php if($keywords || $group_id){ ?>
					<a href="<?php echo phpok_url(array('ctrl'=>'user'));?>" class="layui-btn layui-btn-primary"><?php echo P_Lang("取消搜索");?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<div class="fr"><div class="action"></div></div>	
		<div class="layui-btn-group fr" id="user_card_top">
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加会员");?>','<?php echo phpok_url(array('ctrl'=>'user','func'=>'set'));?>')">
				<i class="layui-icon">&#xe654;</i>
				<?php echo P_Lang("添加会员");?>
			</button>
			<?php if($session['admin_rs']['if_system']){ ?>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_user.show_setting()">
				<i class="layui-icon">&#xe620;</i>
				<?php echo P_Lang("显示字段设置");?>
			</button>
			<?php } ?>
		</div>
	</div>
	<div class="layui-card-body">
		<table width="100%" class="layui-table">
		<thead>
		<tr>
			<th style="text-align:center;">ID</th>
			<th width="20px">&nbsp;</th>
			<th width="35px"></th>
			<?php $arealist_id["num"] = 0;$arealist=is_array($arealist) ? $arealist : array();$arealist_id = array();$arealist_id["total"] = count($arealist);$arealist_id["index"] = -1;foreach($arealist as $key=>$value){ $arealist_id["num"]++;$arealist_id["index"]++; ?>
			<th class="lft"><?php echo P_Lang($value);?></th>
			<?php } ?>
			<?php if($wlist){ ?><th class="lft" style="min-width:100px;"><?php echo P_Lang("财富");?></th><?php } ?>
			<th width="120px"><?php echo P_Lang("注册时间");?></th>
			<th style="min-width:104px;"></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td align="center"><?php echo $value['id'];?></td>
			<td><span id="status_<?php echo $value['id'];?>" onclick="set_status(<?php echo $value['id'];?>)" class="status<?php echo $value['status'];?>" value="<?php echo $value['status'];?>"></span></td>
			<td align="center"><img src="<?php echo $value['avatar'] ? $value['avatar'] : 'images/user_default.png';?>" border="0" width="24px" height="24px" /></td>
			<?php $arealist_id["num"] = 0;$arealist=is_array($arealist) ? $arealist : array();$arealist_id = array();$arealist_id["total"] = count($arealist);$arealist_id["index"] = -1;foreach($arealist as $k=>$v){ $arealist_id["num"]++;$arealist_id["index"]++; ?>
			<td align="left">
				<?php if(is_array($value[$k])){ ?>
					<?php if($value[$k]['_admin']['type'] == 'pic'){ ?>
					<img src='<?php echo $value[$k]["_admin"]["info"];?>' border="0" width="28px" height="28px" />
					<?php }elseif($value[$k]['_admin']){ ?>
					<?php echo $value[$k]['_admin']['info'];?>
					<?php } else { ?>
					<?php echo $value[$k]['user'];?>
					<?php } ?>
				<?php } else { ?>
					<?php if($k == 'order'){ ?>
					<a href="javascript:$.win('<?php echo P_Lang("会员订单");?>_<?php echo $value['user'];?>','<?php echo phpok_url(array('ctrl'=>'order','keywords'=>$value['user'],'keytype'=>'user'));?>');void(0)"><?php echo $value[$k];?></a>
					<?php }elseif($k == 'group_id'){ ?>
					<?php echo $grouplist[$value[$k]]['title'];?>
					<?php } else { ?>
					<?php echo $value[$k];?>
					<?php } ?>
				<?php } ?>
			</td>
			<?php } ?>
			<?php if($wlist){ ?>
			
			
			<td class="lft">
				<?php $idxx["num"] = 0;$wlist=is_array($wlist) ? $wlist : array();$idxx = array();$idxx["total"] = count($wlist);$idxx["index"] = -1;foreach($wlist as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
				<div style="display:block;">
					<?php echo $v['title'];?>：<?php echo $value['wealth'][$k] ? $value['wealth'][$k] : 0;?> <?php echo $v['unit'];?>
				</div>
				<?php } ?>
			</td>
			<?php } ?>
			
			<td><?php echo date('Y-m-d H:i',$value['regtime']);?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("查看");?>" onclick="$.win('<?php echo P_Lang("查看会员");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'user','func'=>'show','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑会员");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'user','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="del(<?php echo $value['id'];?>,'<?php echo $value['user'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					<?php } ?>
					
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
		<?php if($pagelist){ ?><div class="center"><?php $this->output("pagelist","file",true,false); ?></div><?php } ?>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>