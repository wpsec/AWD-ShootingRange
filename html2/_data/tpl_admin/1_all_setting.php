<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form id="setting" class="layui-form" onsubmit="return $.admin_all.save()">
<div class="layui-card ">
	<div class="layui-card-header"><?php echo P_Lang("基本设置");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("网站名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" placeholder="<?php echo P_Lang("即在前台使用的名称信息");?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("即在前台使用的名称信息");?></div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("安装目录");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="dir" value="<?php echo $rs['dir'];?>" placeholder="<?php echo P_Lang("根目录请用 /，其他目录请写目录名且要求以 / 结束，如：/phpok/");?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("根目录请用 /，其他目录请写目录名且要求以 / 结束，如：/phpok/");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("网站版LOGO 绑定网站的LOGO信息");?>"></i>
				<?php echo P_Lang("网站Logo");?>
			</label>
			<div class="layui-input-inline default-auto">
				<?php echo form_edit('logo',$rs['logo'],'text','form_btn=image');?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("手机版LOGO 绑定网站的手机版LOGO");?>"></i>
				<?php echo P_Lang("手机Logo");?>
			</label>
			<div class="layui-input-inline default-auto">
				<?php echo form_edit('logo_mobile',$rs['logo_mobile'],'text','form_btn=image');?>
			</div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("显示于网站标题前的小图标，规格建议使用32x32，建议只使用PNG格式");?>">&#xe702;</i>
				<?php echo P_Lang("站点图标");?>
			</label>
			<div class="layui-input-inline default-auto">
				<?php echo form_edit('favicon',$rs['favicon'],'text','form_btn=image');?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("用于数据加密通迅时使用，建议定期更改");?>"></i>
				<?php echo P_Lang("API验证串");?>
			</label>
			<div class="layui-input-inline default-auto">
				<ul class="layout">
					<li><input type="text" id="api_code" name="api_code" value="<?php echo $rs['api_code'];?>" placeholder="<?php echo P_Lang("用于数据加密通迅时使用，建议定期更改");?>" autocomplete="off" class="layui-input long"></li>
					<li style="margin-top:3px;"><input type="button" class="layui-btn layui-btn-sm" onclick="$.admin_all.rand()" value="<?php echo P_Lang("随机生成");?>"/></li>
				</ul>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("添加页头信息，如添加google验证，百度验证等，支持HTML");?>"></i>
				<?php echo P_Lang("网站扩展");?>
			</label>
			<div class="layui-input-block">
				<?php echo $code_editor_info;?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("扩展信息");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("网站状态");?></label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="status" lay-filter="status" data="status_close" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['status']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("要停止此网站运行，请在这里关闭");?></div>
		</div>
		<div class="layui-form-item layui-form-text" id="status_close" <?php if($rs['status']){ ?> style="display: none" <?php } ?>>
			<label class="layui-form-label">
				<i class="layui-icon layui-icon-tips" lay-tips="<?php echo P_Lang("简单说明关闭网站的通知信息");?>"></i>
				<?php echo P_Lang("关闭说明");?>
			</label>
			<div class="layui-input-block">
				
				<textarea name="content" placeholder="<?php echo P_Lang("请输入关闭网站的原因");?>" class="layui-textarea" style="resize:none;"><?php echo $rs['content'];?></textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("网站风格");?>
			</label>
			<div class="layui-input-inline">
				<select id="tpl_id" name="tpl_id">
					<?php if($tpl_list){ ?>
						<?php $tmpid["num"] = 0;$tpl_list=is_array($tpl_list) ? $tpl_list : array();$tmpid = array();$tmpid["total"] = count($tpl_list);$tmpid["index"] = -1;foreach($tpl_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<option value="<?php echo $value['id'];?>" <?php if($rs['tpl_id']== $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
					<?php } else { ?>
						<option value=""><?php echo P_Lang("未安装风格包，请先安装");?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto lh38">
				<input class="layui-btn layui-btn-sm" type="button" onclick="$.admin_all.setting_style('<?php echo $rs['id'];?>')" value="<?php echo P_Lang("自定义风格");?>"/>
			</div>
			<div class="layui-input-inline auto gray lh38">
				<?php echo P_Lang("指定网站要使用的默认风格，注意，风格不区分语言和站点，请仔细选择");?>
			</div>
		</div>
		
		<?php if($multiple_language){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("默认语言");?>
			</label>
			<div class="layui-input-inline">
				<select id="lang" name="lang">
					<?php $langlist_id["num"] = 0;$langlist=is_array($langlist) ? $langlist : array();$langlist_id = array();$langlist_id["total"] = count($langlist);$langlist_id["index"] = -1;foreach($langlist as $key=>$value){ $langlist_id["num"]++;$langlist_id["index"]++; ?>
					<option value="<?php echo $key;?>" <?php if($rs['lang']== $key){ ?> selected<?php } ?>><?php echo $value;?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("未设置语言包时，将调用系统默认语言包");?></div>
		</div>
		<?php } else { ?>
		<input type="hidden" name="lang" id="lang" value="cn"/>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("注册");?></label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="register_status" data="register_close" lay-filter="status" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['register_status']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("注册功能开关，关闭注册请写上注册原因");?></div>
		</div>
		<div class="layui-form-item layui-form-text" id="register_close" <?php if($rs['register_status']){ ?> style="display: none" <?php } ?>>
			<label class="layui-form-label"><?php echo P_Lang("关闭原因");?></label>
			<div class="layui-input-block">
				<textarea name="register_close" placeholder="<?php echo P_Lang("请输入关闭注册的原因");?>" class="layui-textarea"><?php echo $rs['content'];?></textarea>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("简单说明关闭注册的通知信息");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("登录");?></label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="login_status" data="login_close" lay-filter="status" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['login_status']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("登录功能开关");?></div>
		</div>
		<div class="layui-form-item layui-form-text" id="login_close" <?php if($rs['login_status']){ ?> style="display: none" <?php } ?>>
			<label class="layui-form-label"><?php echo P_Lang("关闭原因");?></label>
			<div class="layui-input-block">
				<textarea name="login_close" placeholder="<?php echo P_Lang("请输入关闭登录的原因");?>" class="layui-textarea"><?php echo $rs['content'];?></textarea>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("简单说明关闭登录的通知信息");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("设置会员登录的默认方式");?>">&#xe702;</i>
				<?php echo P_Lang("登录方式");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="login_type" <?php if(!$rs['login_type']){ ?> checked<?php } ?> value="0" title="<?php echo P_Lang("普通登录（即账号密码登录方式）");?>">
				<?php if($gateway_email){ ?>
				<input type="radio" name="login_type" value="email" <?php if($rs['login_type']== 'email'){ ?> checked<?php } ?> title="<?php echo P_Lang("Email验证登录");?>">
				<?php } ?>
				<?php if($gateway_sms){ ?>
				<input type="radio" name="login_type" value="sms" <?php if($rs['login_type']== 'sms'){ ?> checked<?php } ?> title="<?php echo P_Lang("短信验证登录");?>">
				<?php } ?>
			</div>
		</div>

		<?php if($gateway_email){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("邮件验证码");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="login_type_email">
					<option value=""><?php echo P_Lang("请选择…");?></option>
					<?php $tmpid["num"] = 0;$email_tplist=is_array($email_tplist) ? $email_tplist : array();$tmpid = array();$tmpid["total"] = count($email_tplist);$tmpid["index"] = -1;foreach($email_tplist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['identifier'];?>" <?php if($rs['login_type_email']== $value['identifier']){ ?> selected<?php } ?>><?php echo $value['title'];?><?php if($value['note']){ ?> （<?php echo $value['note'];?>）<?php } ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请配置好邮件验证码模板");?></div>
		</div>
		<?php } ?>
		<?php if($gateway_sms){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("短信验证码");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="login_type_sms">
					<option value=""><?php echo P_Lang("请选择…");?></option>
					<?php $tmpid["num"] = 0;$sms_tplist=is_array($sms_tplist) ? $sms_tplist : array();$tmpid = array();$tmpid["total"] = count($sms_tplist);$tmpid["index"] = -1;foreach($sms_tplist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['identifier'];?>" <?php if($rs['login_type_sms']== $value['identifier']){ ?> selected<?php } ?>><?php echo $value['title'];?><?php if($value['note']){ ?> （<?php echo $value['note'];?>）<?php } ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请配置好短信验证码模板");?></div>
		</div>
		<?php } ?>
	</div>
</div>

<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("电子商务");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("电子商务");?></label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="biz_status" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['biz_status']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("仅限这里启用电商后，整个平台才支持电商化");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("电商特点");?></label>
			<div class="layui-input-inline auto">
				<input type="radio" name="biz_main_service" value="1" title="<?php echo P_Lang("服务");?>" <?php if($rs['biz_main_service']){ ?> checked<?php } ?>>
				<input type="radio" name="biz_main_service" value="0" title="<?php echo P_Lang("实物");?>" <?php if(!$rs['biz_main_service']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请勾选实物或服务，以方便在录入产品时优先选中项");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("订单号规则");?></label>
			<div class="layui-input-block">
				<input type="text" id="biz_sn" name="biz_sn" value="<?php echo $rs['biz_sn'];?>" placeholder="<?php echo P_Lang("用于数据加密通迅时使用，建议定期更改");?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-input-block" style="margin-top:5px;">
				<div class="layui-btn-group">
					<input type="button" class="layui-btn layui-btn-sm layui-btn-danger" onclick="$('#biz_sn').val('')" value="<?php echo P_Lang("清空");?>">
					<input type="button" value="<?php echo P_Lang("前缀");?>" onclick="insert_input('prefix[P]','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("年");?>" onclick="insert_input('year','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("月");?>" onclick="insert_input('month','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("日");?>" onclick="insert_input('date','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("时");?>" onclick="insert_input('hour','biz_sn','-')" class="layui-btn layui-btn-sm "/>
					<input type="button" value="<?php echo P_Lang("分");?>" onclick="insert_input('minute','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("秒");?>" onclick="insert_input('second','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("随机");?>" onclick="insert_input('rand','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("时间戳");?>" onclick="insert_input('time','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("序号");?>" onclick="insert_input('number','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("订单ID");?>" onclick="insert_input('id','biz_sn','-')" class="layui-btn layui-btn-sm"/>
					<input type="button" value="<?php echo P_Lang("会员ID");?>" onclick="insert_input('user','biz_sn','-')" class="layui-btn layui-btn-sm"/>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("电商货币");?></label>
			<div class="layui-input-inline default-auto">
				<select name="currency_id">
					<option value=""><?php echo P_Lang("不使用");?></option>
					<?php $currency_list_id["num"] = 0;$currency_list=is_array($currency_list) ? $currency_list : array();$currency_list_id = array();$currency_list_id["total"] = count($currency_list);$currency_list_id["index"] = -1;foreach($currency_list as $key=>$value){ $currency_list_id["num"]++;$currency_list_id["index"]++; ?>
					<option value="<?php echo $value['id'];?>" <?php if($rs['currency_id']== $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?>_<?php echo P_Lang("标识");?>_<?php echo $value['code'];?>, <?php echo P_Lang("汇率");?>_<?php echo $value['val'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("启用电子商务功能需要设置前台默认货币");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("默认支付");?></label>
			<div class="layui-input-inline default-auto">
				<select name="biz_payment">
					<option value="0"><?php echo P_Lang("不指定");?></option>
					<?php $payment_id["num"] = 0;$payment=is_array($payment) ? $payment : array();$payment_id = array();$payment_id["total"] = count($payment);$payment_id["index"] = -1;foreach($payment as $key=>$value){ $payment_id["num"]++;$payment_id["index"]++; ?>
					<option value="<?php echo $value['id'];?>" <?php if($rs['biz_payment']== $value['id']){ ?> selected<?php } ?>><?php echo $value['group_title'];?>_<?php echo $value['title'];?><?php if($value['wap']){ ?>_<?php echo P_Lang("手机版");?><?php } ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("用于创建订单时默认绑定支付方式");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("运费");?></label>
			<div class="layui-input-inline default-auto">
				<select name="biz_freight">
					<option value="0"><?php echo P_Lang("不使用运费");?></option>
					<?php $tmpid["num"] = 0;$freight=is_array($freight) ? $freight : array();$tmpid = array();$tmpid["total"] = count($freight);$tmpid["index"] = -1;foreach($freight as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>" <?php if($rs['biz_freight']== $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请选择电商平台运费计算方法");?></div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("SEO优化");?></div>
	<div class="layui-card-body">
		<div id="seo_setting">
			
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("网址优化");?></label>
				<div class="layui-input-block">
					<input type="radio" name="url_type" value="default" title="<?php echo P_Lang("默认动态网址");?>"<?php if($rs['url_type'] == "default" || !$rs['url_type']){ ?> checked<?php } ?>>
					<span style="position: absolute; top: 9px;"><?php echo P_Lang("示例：");?>http://www.domain.com/index.php?id=<?php echo P_Lang("标识或数字ID");?></span>
				</div>
				<div class="layui-input-block">
					<input type="radio" name="url_type" value="rewrite"<?php if($rs['url_type']== "rewrite"){ ?> checked<?php } ?> title="<?php echo P_Lang("伪静态页");?>">
					<span style="position: absolute; top: 9px;"><?php echo P_Lang("示例：");?>http://www.domain.com/<?php echo P_Lang("标识或数字ID");?>.html</span>
				</div>
				<div class="layui-input-block mtop"><?php echo P_Lang("本系统全面支持网址优化，您可以根据自身条件进行设置");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("SEO标题");?></label>
				<div class="layui-input-block">
					<input type="text" id="seo_title" name="seo_title" value="<?php echo $rs['seo_title'];?>" class="layui-input" autocomplete="off">
				</div>
				<div class="layui-input-block mtop"><?php echo P_Lang("针对HTML里的Title属性进行优化，建议使用英文竖线分割开来，不超过80字");?></div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"><?php echo P_Lang("SEO关键字");?></label>
				<div class="layui-input-block">
					<input type="text"  id="seo_keywords" name="seo_keywords" value="<?php echo $rs['seo_keywords'];?>" class="layui-input" autocomplete="off">
				</div>
				<div class="layui-input-block mtop"><?php echo P_Lang("简单明了用几个词来描述您的网站，多个词用英文逗号隔开");?></div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label"><?php echo P_Lang("SEO摘要");?></label>
				<div class="layui-input-block">
					<textarea name="seo_desc" class="layui-textarea"><?php echo $rs['seo_desc'];?></textarea>
				</div>
				<div class="layui-input-block mtop"><?php echo P_Lang("针对您的网站，简单描述其作用，目标群体，未来方向等信息，建议不超过100字");?></div>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("上传配置");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("游客上传");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="upload_guest" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['upload_guest']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("启用上传权限后，游客可以上传JPG，GIF，PNG，JPEG，ZIP，RAR这几种类型的附件");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员上传");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="checkbox" name="upload_user" lay-skin="switch" value="1" lay-text="<?php echo P_Lang("启用");?>|<?php echo P_Lang("禁用");?>" <?php if($rs['upload_user']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("启用后，会员可以上传后台开放的附件类型上传");?></div>
		</div>
	</div>
</div>
<?php if(LICENSE != 'LGPL'){ ?>


<div class="layui-card">
	<div class="layui-card-header"><?php echo P_Lang("后台自定义Logo");?></div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("左侧栏大图");?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;"><?php echo P_Lang("显示在后台管理左上方的LOGO，图片规格是220x50，建议上传PNG格式");?></div>
			<div class="layui-input-block">
				<?php echo form_edit('adm_logo29',$rs['adm_logo29'],'text','form_btn=image');?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("左侧栏小图");?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;"><?php echo P_Lang("显示缩小后的Logo，规格是：50x50，建议上传PNG格式");?></div>
			<div class="layui-input-block">
				<?php echo form_edit('adm_logo50',$rs['adm_logo50'],'text','form_btn=image');?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("登录页");?>
			</label>
			<div class="layui-input-block gray" style="line-height:38px;"><?php echo P_Lang("显示在登录页上，建议使用PNG透明图片，图片规格是300x75");?></div>
			<div class="layui-input-block">
				<?php echo form_edit('adm_logo180',$rs['adm_logo180'],'text','form_btn=image');?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("保存配置");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
</form>
<?php $this->output("foot_lay","file",true,false); ?>