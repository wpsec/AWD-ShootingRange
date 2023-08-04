<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $comment = phpok('_comment','tid='.$tid.'&pageid='.$get['pageid'],'psize=10','orderby=desc');?>
<ul class="am-comments-list am-comments-list-flip">
	<li class="am-comment">
		<img src="<?php echo $comment['avatar'];?>" class="am-comment-avatar" width="48" height="48" />
		<div class="am-comment-main">
			<div class="am-comment-hd">
				<div class="am-comment-meta">
					提交新评论<?php if($comment['total']){ ?>，当前已有 <?php echo $comment['total'];?> 条评论<?php } ?>
				</div>
			</div>
			<div class="am-comment-bd">
				<form method="post" id="comment-post" class="am-form">
					<input type="hidden" name="tid" value="<?php echo $tid ? $tid : $rs['id'];?>" />
					<input type="hidden" name="vtype" value="<?php echo $vtype ? $vtype : 'title';?>" />
					<?php if($comment['uid']){ ?>
					<div class="am-form-group"><?php echo form_edit('comment',$comment['content'],'editor','width=100%&height=150&btns[image]=1');?></div>
					<?php } else { ?>
					<div class="am-form-group">
						<textarea rows="5" name="comment" id="comment" placeholder="填写评论信息" style="resize: none;"></textarea>
					</div>
					<?php } ?>
					<div class="am-form-group">
						<?php echo form_edit('pictures',$comment['res'],'upload','is_multiple=1');?>
					</div>
					<?php if($is_vcode){ ?>
					<div class="am-g am-form-group am-g-collapse">
						<div class="am-u-sm-2"><input class="vcode"  type="text" name="_chkcode" id="_chkcode" placeholder="请填写验证码" /></div>
						<div class="am-u-sm-4" style="padding-left:10px;padding-top:5px;"><img src="" border="0" align="absmiddle" id="vcode" class="hand" /></div>
						<div class="am-u-sm-6"></div>
					</div>
					<script type="text/javascript">
					$(document).ready(function(){
						$("#vcode").phpok_vcode();
						$("#vcode").click(function(){
							$(this).phpok_vcode();
						});
					});
					</script>
					<?php } ?>
					<div>
						<input name="" type="submit" class="am-btn am-btn-primary" value="提交" />
					</div>
				</form>
			</div>
		</div>
	</li>
	<?php $tmpid["num"] = 0;$comment['rslist']=is_array($comment['rslist']) ? $comment['rslist'] : array();$tmpid = array();$tmpid["total"] = count($comment['rslist']);$tmpid["index"] = -1;foreach($comment['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<li class="am-comment">
		<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$value['uid']['id']));?>" target="_blank">
			<img src="<?php echo $value['uid']['avatar'];?>" class="am-comment-avatar" width="48" height="48" />
		</a>
		<div class="am-comment-main">
			<div class="am-comment-hd">
				<div class="am-comment-meta">
					<a href="<?php echo phpok_url(array('ctrl'=>'user','id'=>$value['uid']['id']));?>" target="_blank" class="am-comment-author"><?php echo $value['uid']['user'];?></a>评论于<time><?php echo time_format($value['addtime']);?></time>
				</div>
			</div>
			<div class="am-comment-bd">
				<?php echo $value['content'];?>
				<?php if($value['res']){ ?>
				<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-imgbordered" data-am-gallery="{pureview: 1}">
					<?php $idxx["num"] = 0;$value['res']=is_array($value['res']) ? $value['res'] : array();$idxx = array();$idxx["total"] = count($value['res']);$idxx["index"] = -1;foreach($value['res'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
					<li><div class="am-gallery-item"><img src="<?php echo $v['ico'];?>" alt="<?php echo $v['title'];?>" data-rel="<?php echo $v['gd']['auto']['filename'];?>" /></div></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</li>
	<?php $idxx["num"] = 0;$value['adm_reply']=is_array($value['adm_reply']) ? $value['adm_reply'] : array();$idxx = array();$idxx["total"] = count($value['adm_reply']);$idxx["index"] = -1;foreach($value['adm_reply'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
	<li class="am-comment am-comment-flip am-comment-highlight">
		<img src="tpl/www/images/adminer.png" class="am-comment-avatar" width="48" height="48" />
		<div class="am-comment-main">
			<div class="am-comment-hd">
				<div class="am-comment-meta">
					管理员回复于<time><?php echo time_format($v['addtime']);?></time>
				</div>
			</div>
			<div class="am-comment-bd">
				<?php echo $v['content'];?>
			</div>
		</div>
	</li>
	<?php } ?>
	<?php } ?>
</ul>
<?php $this->assign("pageurl",$rs['url']); ?><?php $this->assign("total",$comment['total']); ?><?php $this->assign("pageid",$comment['pageid']); ?><?php $this->assign("psize",$comment.$psize); ?><?php $this->output("block/pagelist","file",true,false); ?>
