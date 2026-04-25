<?php 
if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
    require "populer-amp.php";
}elseif (wp_is_mobile()) {
    require "populer-mobile.php";
}else{
    require "populer-desktop.php";
}
?>