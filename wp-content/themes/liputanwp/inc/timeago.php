<?php 
function timeago(){
$dateFormat = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '';
$code = '<time class="timeago" datetime="' . get_the_date('c') .'">' . $dateFormat . ' yang lalu</time>';
return $code;
}
?>