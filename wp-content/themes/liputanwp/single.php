<?php postViews(get_the_ID()); ?>
<?php get_header(); ?>
<div class="content">
<?php get_template_part("template-parts/header/index"); ?>
<?php get_template_part("template-parts/single/index"); ?>
<?php get_template_part("template-parts/footer/index"); ?>
<?php get_template_part("template-parts/custom/sticky-ads"); ?>
</div>
<button class="btn-top" aria-label="btn-top"><i class="icon-top i-button-back-to-top"></i></button>
<?php get_footer(); ?>