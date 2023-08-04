<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div id="create_plugin_html" style="display:none">
	<div class="layui-fluid">
		<div class="layui-form">
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("插件名称");?></label>
				<div class="layui-input-inline" style="width: 350px;">
					<input type="text" id="plugin_name" class="layui-input" />
				</div>
				<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("设置插件的名称");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("插件标识");?></label>
				<div class="layui-input-inline" style="width: 350px;">
					<input type="text" id="plugin_id" class="layui-input" />
				</div>
				<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("限英文字母和数字，为空由系统生成32位长度字串");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("插件功能");?></label>
				<div class="layui-input-inline" style="width: 350px;">
					<input type="text" id="plugin_note" class="layui-input" />
				</div>
				<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("简单一句话描述这个插件做什么");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("开发者");?></label>
				<div class="layui-input-inline" style="width: 350px;">
					<input type="text" id="plugin_author" class="layui-input" />
				</div>
				<div class="layui-form-mid layui-word-aux"><?php echo P_Lang("设置这个插件的开发人员或团队");?></div>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("已安装的插件");?>
		<div class="layui-btn-group fr">
			<button class="layui-btn layui-btn-sm" onclick="$.admin_plugin.create()">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("创建插件");?>
			</button>
			<button class="layui-btn layui-btn-sm" onclick="$.admin_plugin.upload()">
				<i class="layui-icon">&#xe67c;</i> <?php echo P_Lang("本地上传插件");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table" lay-size="sm">
			<thead>
			<tr>
				<th><?php echo P_Lang("序号");?></th>
				<th><?php echo P_Lang("状态");?></th>
				<th><?php echo P_Lang("标识");?></th>
				<th><?php echo P_Lang("名称");?></th>
				<th class="center"><?php echo P_Lang("排序");?></th>
				<th><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $idx["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$idx = array();$idx["total"] = count($rslist);$idx["index"] = -1;foreach($rslist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
			<tr>
				<td><?php echo $idx['num'];?></td>
				<td>
					<span class="status<?php echo $value['status'];?>" id="status_<?php echo $key;?>" onclick="$.admin_plugin.status('<?php echo $key;?>')" value="<?php echo $value['status'];?>"></span>
				</td>
				<td><?php echo $key;?></td>
				<td><?php echo $value['title'];?> <?php if($value['note']){ ?><span class="gray i">（<?php echo $value['note'];?>）</span><?php } ?></td>
				<td class="center pointer" onclick="$.admin_plugin.taxis('<?php echo $value['id'];?>','<?php echo $value['taxis'];?>')"><?php echo $value['taxis'];?></td>
				<td>
					<div class="layui-btn-group">
						<?php if($popedom['config']){ ?>
						<?php if($value['extconfig']){ ?><input type="button" value="<?php echo P_Lang("配置");?>" class="layui-btn layui-btn-sm" onclick="$.admin_plugin.config('<?php echo $key;?>','<?php echo $value['title'];?>')" /><?php } ?>
						<input type="button" value="<?php echo P_Lang("管理");?>" class="layui-btn layui-btn-sm" onclick="$.admin_plugin.setting('<?php echo $key;?>','<?php echo $idx['num'];?>')" />
						<input type="button" value="<?php echo P_Lang("导出");?>" class="layui-btn layui-btn-sm" onclick="$.admin_plugin.tozip('<?php echo $key;?>')" />
						<?php } ?>
						<?php if($popedom['uninstall']){ ?>
						<input type="button" value="<?php echo P_Lang("卸载");?>" class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin_plugin.uninstall('<?php echo $key;?>','<?php echo $value['title'];?>')" />
						<?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php if($popedom['install']){ ?>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("未安装插件");?></div>
	<div class="layui-card-body">
		<table class="layui-table" lay-size="sm">
			<thead>
			<tr>
				<th><?php echo P_Lang("名称");?></th>
				<th><?php echo P_Lang("标识");?></th>
				<th><?php echo P_Lang("摘要");?></th>
				<th><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $not_install_id["num"] = 0;$not_install=is_array($not_install) ? $not_install : array();$not_install_id = array();$not_install_id["total"] = count($not_install);$not_install_id["index"] = -1;foreach($not_install as $key=>$value){ $not_install_id["num"]++;$not_install_id["index"]++; ?>
			<tr>
				<td><?php echo $value['title'];?></td>
				<td><?php echo $key;?></td>
				<td><?php echo $value['note'] ? $value['note'] : $value['desc'];?></td>
				<td><input  type="button" value="<?php echo P_Lang("安装");?>" onclick="$.admin_plugin.install('<?php echo $key;?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm"></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php } ?>

<?php $this->output("foot_lay","file",true,false); ?>