<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","标签管理"); ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<div class="fl">
		<ul class="layout" style="margin:2px 0;">
			<form method="post" action="<?php echo phpok_url(array('ctrl'=>'tag'));?>">
			<li><input type="text" name="keywords" class="layui-input" id="keywords" value="<?php echo $keywords;?>" /></li>
			<li><input type="submit" value="提交" class="layui-btn layui-btn-sm" /></li>
			</form>
		</ul>
		</div>
		<?php if($session['admin_rs']['if_system'] || $popedom['add']){ ?>
		<div class="layui-btn-group fr">
			<?php if($session['admin_rs']['if_system']){ ?><button class="layui-btn layui-btn-sm" onclick="$.admin_tag.config();void(0);"><?php echo P_Lang("配置标签");?></button><?php } ?>
			<?php if($popedom['add']){ ?><button class="layui-btn layui-btn-sm" onclick="$.admin_tag.add();void(0);"><?php echo P_Lang("添加标签");?></button><?php } ?>
		</div>
		<?php } ?>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th width="70">ID</th>
			<th><?php echo P_Lang("名称");?>/<?php echo P_Lang("网址");?></th>
			<th><?php echo P_Lang("提示文字");?></th>
			<th width="95"><?php echo P_Lang("是否新窗口");?></th>
			<th width="95"><?php echo P_Lang("全局性");?></th>
			<th width="70" class="center"><?php echo P_Lang("替换次数");?></th>
			<th width="90" class="center"><?php echo P_Lang("主题数");?></th>
			<th width="90" class="center"><?php echo P_Lang("点击数");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr id="edit_<?php echo $value['id'];?>">
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['title'];?><?php if($value['url']){ ?><br /><?php echo $value['url'];?><?php } ?></td>
			<td><?php echo $value['alt'] ? $value['alt'] : '-';?></td>
			<td>
				<?php if($value['target']){ ?><span class="red"><?php echo P_Lang("新窗口");?></span><?php } else { ?><span class="darkblue"><?php echo P_Lang("当前窗口");?></span><?php } ?>
			</td>
			<td>
				<?php if($value['is_global']){ ?><span class="darkblue"><?php echo P_Lang("全局可用");?></span><?php } else { ?>-<?php } ?>
			</td>
			<td class="center"><?php echo $value['replace_count'];?></td>
			<td class="center hand" title="<?php echo P_Lang("点击可以查看关联的主题");?>" onclick="$.admin_tag.titles('<?php echo $value['id'];?>','<?php echo $value['title'];?>')"><?php echo $value['count'] ? $value['count'] : 0;?></td>
			<td class="center"><?php echo $value['hits'] ? $value['hits'] : 0;?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_tag.edit('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("节点管理器");?>" onclick="$.admin_tag.nodelist('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tag.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
		<div align="center"><?php $this->output("pagelist","file",true,false); ?></div>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>
