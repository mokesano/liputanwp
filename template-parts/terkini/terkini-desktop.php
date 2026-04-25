<?php
if (is_active_sidebar('billboard_area')) :?>
<div class="billboard">
<?php dynamic_sidebar('billboard_area');?>
</div>
<?php endif;?>
<div class="main">
	<div class="main-container">
		<div class="article-row">
			
		<div class="article">
			<div class="article-wrapper">
				<div class="article-box">
					<?php 
					if (have_posts()):
					while (have_posts()): the_post(); ?>
					<div class="post-detail">
					    <div class="post">
					    	<div class="post-header">
					    		<h1 class="post-title"><?php the_title(); ?></h1>
					    	</div>
					    	<?php the_content(); ?>
					    </div>
					</div>
				<?php
				endwhile;
				endif; ?>
				</div>
			</div>
		</div>
			<?php get_template_part("template-parts/sidebar/index"); ?>
		</div>
	</div>
</div>