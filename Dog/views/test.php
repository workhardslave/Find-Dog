<?php
include_once './memcache.php';

$m->set('result',exec('cd / && cd jupyter_project && python Result.py',$out,$erre));
$result=iconv("EUC-KR", "UTF-8", $m->get('result'));
print $result;


?>