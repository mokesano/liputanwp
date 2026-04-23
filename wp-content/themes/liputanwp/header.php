<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<?php wp_head(); ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
</head>
<?php 
if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
    $class = "amp";
}elseif (wp_is_mobile()) {
    $class = "mobile";
}else{
    $class = "desktop";
}
if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
?>
<body [class]="darkmode ? '<?php echo esc_attr( implode( ' ', get_body_class() ) ); ?> darkmode amp' : '<?php echo esc_attr( implode( ' ', get_body_class("amp") ) ); ?>'" <?php body_class("amp"); ?> >
<?php
}else{
?>
<body <?php body_class($class); ?> >
<?php
}
?>
<?php wp_body_open(); ?>