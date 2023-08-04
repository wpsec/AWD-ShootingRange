<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card" id="search_html">
	<div class="layui-card-header">
		<?php echo P_Lang("搜索");?>
	</div>
	<div class="layui-card-body">
		<form method="post" class="layui-form" action="<?php echo admin_url('order');?>">
		<div class="layui-form-item">
			<div class="layui-inline">
				<div class="layui-input-inline" id="statuslist">
					<select name="status">
						<option value=""><?php echo P_Lang("订单状态…");?></option>
						<?php $tmpid["num"] = 0;$statuslist=is_array($statuslist) ? $statuslist : array();$tmpid = array();$tmpid["total"] = count($statuslist);$tmpid["index"] = -1;foreach($statuslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<option value="<?php echo $key;?>"<?php if($key == $status){ ?> selected<?php } ?>><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<div class="layui-input-inline" style="width: 120px;">
					<input type="text" name="date_start" value="<?php echo $date_start;?>" id="date_start" placeholder="<?php echo P_Lang("开始时间");?>" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid">-</div>
				<div class="layui-input-inline" style="width: 120px;">
					<input type="text" name="date_stop" value="<?php echo $date_stop;?>" id="date_stop" placeholder="<?php echo P_Lang("结束时间");?>" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-inline">
				<div class="layui-input-inline" style="width: 90px;">
					<input type="text" name="price_min" value="<?php echo $price_min;?>" id="price_min" placeholder="<?php echo P_Lang("最低价格");?>" autocomplete="off" class="layui-input">
				</div>
				<div class="layui-form-mid">-</div>
				<div class="layui-input-inline" style="width: 90px;">
					<input type="text" name="price_max" value="<?php echo $price_max;?>" id="price_max" placeholder="<?php echo P_Lang("最高价格");?>" autocomplete="off" class="layui-input">
				</div>
			</div>
			<?php if($paylist){ ?>
			<div class="layui-inline">
				<div class="layui-input-inline">
					<select name="paytype" >
						<option value=""><?php echo P_Lang("支付方式…");?></option>
						<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<optgroup label="<?php echo $value['title'];?><?php if($value['wap']){ ?>_<?php echo P_Lang("手机端");?><?php } ?>">
							<?php $idxx["num"] = 0;$value['rslist']=is_array($value['rslist']) ? $value['rslist'] : array();$idxx = array();$idxx["total"] = count($value['rslist']);$idxx["index"] = -1;foreach($value['rslist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
							<option value="<?php echo $v['id'];?>"<?php if($paytype == $v['id']){ ?> selected<?php } ?>><?php echo $v['title'];?><?php if($v['wap']){ ?>_<?php echo P_Lang("手机端");?><?php } ?></option>
							<?php } ?>
						</optgroup>
						<?php } ?>
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="layui-inline">
				<div class="layui-input-inline">
					<select name="keytype" onchange="update_keywords(this.value)">
						<option value=""><?php echo P_Lang("检索类型…");?></option>
						<option value="sn"<?php if($keytype == 'sn'){ ?> selected<?php } ?>><?php echo P_Lang("订单编号");?></option>
						<option value="user"<?php if($keytype == 'user'){ ?> selected<?php } ?>><?php echo P_Lang("会员账号");?></option>
						<option value="email"<?php if($keytype == 'email'){ ?> selected<?php } ?>><?php echo P_Lang("订单邮箱");?></option>
						<option value="protitle"<?php if($keytype == 'protitle'){ ?> selected<?php } ?>><?php echo P_Lang("产品名称");?></option>
					</select>
				</div>
			</div>
			<div class="layui-inline">
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="keywords" name="keywords" class="layui-input" placeholder="<?php echo P_Lang("关键字");?>" value="<?php echo $keywords;?>"<?php if($keytype == 'time'){ ?> onfocus="laydate()"<?php } ?> />
				</div>
			</div>
			<div class="layui-inline">
				<button class="layui-btn layui-btn-sm" lay-submit>
					<i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
					<?php echo P_Lang("搜索");?>
				</button>
				<a href="<?php echo phpok_url(array('ctrl'=>'order'));?>" class="layui-btn layui-btn-sm layui-btn-danger">
					<?php echo P_Lang("取消搜索");?>
				</a>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("创建新订单");?>" onclick="$.win('<?php echo P_Lang("创建新订单");?>','<?php echo phpok_url(array('ctrl'=>'order','func'=>'set'));?>')" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID / <?php echo P_Lang("订单号");?></th>
			<th><?php echo P_Lang("会员");?></th>
			<th><?php echo P_Lang("金额");?></th>
			<th><?php echo P_Lang("已付");?></th>
			<th><?php echo P_Lang("未付");?></th>
			<th><?php echo P_Lang("产品数");?></th>
			<th><?php echo P_Lang("状态");?></th>
			<th><?php echo P_Lang("支付方式");?></th>
			<th><?php echo P_Lang("下单时间");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr id="edit_<?php echo $value['id'];?>">
			<td data-id="<?php echo $value['id'];?>" data-sn="<?php echo $value['sn'];?>" data-unpaid="<?php echo $value['unpaid'];?>" data-status="<?php echo $value['status'];?>"><?php echo $value['id'];?> / <?php echo $value['sn'];?></td>
			<td><?php if($value['user']){ ?><?php echo $value['user'];?><?php } else { ?><span class="red"><?php echo P_Lang("访客");?></span><?php } ?></td>
			<td><?php echo price_format($value['price'],$value['currency_id'],$value['currency_id']);?></td>
			<td><?php echo price_format($value['paid'],$value['currency_id'],$value['currency_id']);?></td>
			<td<?php if($value['unpaid']){ ?> class="red"<?php } ?> data-unpaid-text="<?php echo $value['id'];?>"><?php if($value['unpaid']){ ?><?php echo price_format($value['unpaid'],$value['currency_id'],$value['currency_id']);?><?php } ?></td>
			<td><?php echo $value['qty'];?></td>
			<td class="status">
				<input type="button" value="<?php echo $value['status_title'];?>" onclick="$.admin_order.set_order('<?php echo $value['id'];?>','<?php echo $value['status'];?>')" class="layui-btn  layui-btn-xs" />
			</td>
			<td><?php if($value['pay_title']){ ?><?php echo $value['pay_title'];?><?php } else { ?><span class="gray"><?php echo P_Lang("未设置");?></span><?php } ?></td>
			<td><?php echo time_format($value['addtime']);?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("查看");?>" onclick="$.admin_order.show('<?php echo $value['id'];?>')" class="layui-btn layui-btn-xs" />
					<input type="button" value="<?php echo P_Lang("付款");?>" onclick="$.admin_order.payment(<?php echo $value['id'];?>)" class="layui-btn layui-btn-xs" />
					<input type="button" value="<?php echo P_Lang("物流");?>" onclick="$.admin_order.express(<?php echo $value['id'];?>)" class="layui-btn layui-btn-xs" />
					<?php if($popedom['modify']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑订单");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'order','func'=>'set','id'=>$value['id']));?>')" class="layui-btn  layui-btn-xs" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_order.del(<?php echo $value['id'];?>,'<?php echo $value['sn'];?>')" class="layui-btn  layui-btn-xs layui-btn-danger" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
		<div align="center"><?php $this->output("pagelist","file",true,false); ?></div>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>