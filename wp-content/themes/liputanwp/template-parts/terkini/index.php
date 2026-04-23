<?php 
if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
    require "terkini-amp.php";
}elseif (wp_is_mobile()) {
    require "terkini-mobile.php";
}else{
    require "terkini-desktop.php";
}
?>