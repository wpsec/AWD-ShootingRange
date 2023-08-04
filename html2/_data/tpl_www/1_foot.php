<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php echo phpok_head_css();?>
<?php echo phpok_head_js();?>
<?php if($config['code'] && $config['code']['statjs']){ ?>
<div style="display:none"><?php echo $config['code']['statjs'];?></div>
<?php } ?>
<?php if($sys['debug']){ ?><div style="text-align:center;padding:1em;"><?php echo debug_time();?></div><?php } ?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?d6ceebbfea56af954e58ccea336c10d8";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script type="text/javascript">
$(document).ready(function(){
	var wow = new WOW();
	wow.init();
});
</script>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>