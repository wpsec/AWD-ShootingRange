<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php echo P_Lang("模块管理");?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("模块导入");?>" onclick="$.admin_module.input()" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("添加模块");?>" onclick="$.admin_module.create()" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
	    <table class="layui-table">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th width="30"><?php echo P_Lang("状态");?></th>
		            <th><?php echo P_Lang("名称");?></th>
		            <th><?php echo P_Lang("运行模式");?></th>
		            <th><?php echo P_Lang("项目或分类");?></th>
		            <th><?php echo P_Lang("排序");?></th>
		            <th><div class="layui-table-cell laytable-cell-1-status" align="center"><span>操作</span></div></th>
		        </tr>
	        </thead>
	        <?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	        <tr>
	            <td><?php echo $value['id'];?></td>
	            <td class="center"><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['set']){ ?>onclick="$.admin_module.status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor:default"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
	            <td><label for="tid_<?php echo $value['id'];?>"><?php echo $value['title'];?><?php if($value['note']){ ?><span class="gray i">（<?php echo $value['note'];?>）</span><?php } ?></label></td>
	            <td>
		            <?php if($value['mtype']){ ?>
		            <?php echo P_Lang("独立");?>
		            <?php } else { ?>
		            <?php echo P_Lang("集成");?> - <span class="gray"><?php if($value['tbl'] == 'list'){ ?><?php echo P_Lang("主题");?><?php } else { ?><?php echo P_Lang("分类");?><?php } ?></span>
		            <?php } ?>
		        </td>
		        <td>
			        <?php if($value['link']){ ?>
			        	<?php $idxx["num"] = 0;$value['link']=is_array($value['link']) ? $value['link'] : array();$idxx = array();$idxx["total"] = count($value['link']);$idxx["index"] = -1;foreach($value['link'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			        	<?php if($idxx['index']){ ?> / <?php } ?><?php echo $v;?>
			        	<?php } ?>
			        <?php } else { ?>
			        <span class="red"><?php echo P_Lang("未使用");?></span>
			        <?php } ?>
		        </td>
	            <td>
	                <div class="gray hand" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>" onclick="$.admin_module.taxis('<?php echo $value['id'];?>','<?php echo $value['taxis'];?>')"><?php echo $value['taxis'];?></div>
	            </td>
	            <td class="center">
	                <?php if($popedom['set']){ ?>
	                <div class="layui-btn-group">
	                    <input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_module.edit('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm"/>
	                    <input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_module.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm layui-btn-danger"/>
	                    <input type="button" value="<?php echo P_Lang("字段管理");?>" onclick="$.win('<?php echo P_Lang("字段管理");?>_<?php echo $value['title'];?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'module','func'=>'fields','id'=>$value['id']));?>');" class="layui-btn layui-btn-sm"/>
	                    <input type="button" value="<?php echo P_Lang("复制模块");?>" onclick="$.admin_module.copy('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm"/>
	                    <input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_module.export('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm"/>
	                </div>
	                <?php } ?>
	            </td>
	        </tr>
	        <?php } ?>
	    </table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>