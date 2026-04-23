<?php if(!$_GET['post_format']): ?>
<div class="sidebar">
	<div class="sidebar-box">
		<?php if(!empty(category_description())): ?>
		<div class="widget sidebar-desc"><?php echo category_description(); ?></div>
		<?php else: ?>
		<div class="widget sidebar-desc"><?php echo get_excerpt(100); ?></div>
		<?php endif; ?>
		<?php 
		$myfoto = new WP_Query( array(
			'tag_id' => get_queried_object()->term_id,
			'post_type' => 'post',
			'post_status' => 'publish',
            'posts_per_page'=> 2,
		    'tax_query' => array(
		        array(                
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => array( 
		                'post-format-image',
		            ),
		        )
		    )
		) );
		if ($myfoto->have_posts()):?>
			<div class="widget grid">
    			<div class="widget-header">
    				<h3 class="widget-title"><a href="?post_format=image">Foto <span class="next-icon i-arrow"></span></a></h3>
    			</div>
    			<div class="widget-content">
    				<div class="sidebar-row">
						<?php
							while ($myfoto->have_posts()): $myfoto->the_post(); ?>
		    					<div class="sidebar-item column6">
			    					<div class="sidebar-image media-image">
										<?php echo customthumbnail($post->ID, "image_200_116"); ?>
			    					</div>
			    					<div class="sidebar-text">
			    						<h3 class="sidebar-title">
											<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			    						</h3>
			    					</div>
		    					</div>
								<?php
							endwhile;
						?>
					</div>
				</div>
			</div>
		<?php
		endif;
		 ?>

		<?php 
		$myvideo = new WP_Query( array(
			'tag_id' => get_queried_object()->term_id,
			'post_type' => 'post',
			'post_status' => 'publish',
            'posts_per_page'=> 2,
		    'tax_query' => array(
		        array(                
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => array( 
		                'post-format-video',
		            ),
		        )
		    )
		) );
		if ($myvideo->have_posts()):?>
			<div class="widget grid">
    			<div class="widget-header">
    				<h3 class="widget-title"><a href="?post_format=video">Video <span class="next-icon i-arrow"></span></a></h3>
    			</div>
    			<div class="widget-content">
    				<div class="sidebar-row">
						<?php
							while ($myvideo->have_posts()): $myvideo->the_post(); ?>
		    					<div class="sidebar-item column6">
			    					<div class="sidebar-image media-image">
										<?php echo customthumbnail($post->ID, "image_200_116"); ?>
			    					</div>
			    					<div class="sidebar-text">
			    						<h3 class="sidebar-title">
											<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			    						</h3>
			    					</div>
		    					</div>
								<?php
							endwhile;
						?>
					</div>
				</div>
			</div>
		<?php
		endif;
		 ?>
	</div>
</div>
<?php endif; ?>