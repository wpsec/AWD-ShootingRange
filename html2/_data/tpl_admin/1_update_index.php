<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("欢迎您使用在线升级功能");?>
	</div>
	<div class="layui-card-body">
		<ul class="project" id="project">
			<?php if($popedom['update']){ ?>
				<?php if($update['online']){ ?>
				<li title="<?php echo P_Lang("升级PHPOK核心程序");?>" onclick="$.admin_update.main()">
					<div class="img"><img src="images/ico/update.png" /></div>
					<div class="txt">在线升级</div>
				</li>
				<?php } ?>
				<?php if($update['zip']){ ?>
				<li title="<?php echo P_Lang("ZIP压缩包升级");?>" onclick="$.admin_update.zip()">
					<div class="img"><img src="images/ico/zip.png" /></div>
					<div class="txt"><?php echo P_Lang("压缩包升级");?></div>
				</li>
				<?php } ?>
				<li title="<?php echo P_Lang("远程检测是否有升级包");?>" onclick="$.admin_update.check()">
					<div class="img"><img src="images/ico/alias.png" /></div>
					<div class="txt"><?php echo P_Lang("远程检测");?></div>
				</li>

			<?php } ?>
			<?php if($popedom['set']){ ?>
			<li title="<?php echo P_Lang("配置升级服务器环境");?>" onclick="$.admin_update.setting()">
				<div class="img"><img src="images/ico/setting.png" /></div>
				<div class="txt"><?php echo P_Lang("环境配置");?></div>
			</li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>