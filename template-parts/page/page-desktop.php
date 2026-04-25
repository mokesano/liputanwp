<div class="main">
	<div class="main-container table">
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
					    	<div class="post-featured">
								<?php if ( true == get_theme_mod( 'featuredimageactivepage', false )) : 
										if (has_post_thumbnail( get_the_ID() ) ): 
											?>
											<figure class="wp-block-image size-full">
												<div class="wp-image-box">
												<a data-fslightbox="gallery" href="<?php echo get_the_post_thumbnail_url($post_id,'full'); ?>" data-caption="<?php echo get_post(get_post_thumbnail_id())->post_excerpt ?>" data-thumb="<?php echo get_the_post_thumbnail_url($post_id,'thumbnail'); ?>">
													<?php 
													echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-image' ) );
													$caption = get_post(get_post_thumbnail_id())->post_excerpt;
													?>
													<div class="btn-viewbox">
														<button class="btn-biew">
															<i class="icon-expand"></i>
															<span class="text-view">Perbesar</span>
														</button>
													</div>
													</a>	
												</div>
												<div class="image-share">
									    			<button class="btn-plus"><i class="icon-share i-gallery-plus"></i></button>
													<div class="imagebox-share">
										    			<a href="https://web.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="btn-image-share facebook" target="_blank" rel="nofollow"><i class="icon-share i-gallery-facebook"></i></a>
										    			<a href="https://twitter.com/intent/tweet?text<?php echo get_the_permalink(); ?>" class="btn-image-share twitter" target="_blank" rel="nofollow"><i class="icon-share i-gallery-twitter"></i></a>
										    			<a href="mailto:?to=&subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_permalink(); ?>" class="btn-image-share email" target="_blank" rel="nofollow"><i class="icon-share i-gallery-email"></i></a>
						    							<a href="https://api.whatsapp.com/send/?text=<?php echo get_the_permalink(); ?>" class="btn-share whatsapp" target="_blank" rel="nofollow"><i class="icon-share i-gallery-whatsapp"></i></a>
										    			<button class="btn-image-share copylink" data-url="<?php echo get_the_permalink(); ?>"><i class="icon-share i-gallery-copy-link"></i></button>
													</div>
												</div>
											<?php 
												if(!empty($caption)){ ?>
													<figcaption><?php echo $caption; ?></figcaption>
											<?php } ?>
											</figure>
										<?php endif;
								endif;  ?>
					    	</div>
					    	<div class="post-content">
					    		<?php the_content(); ?>
					    	</div>
					    </div>
					</div>
				<?php
				endwhile;
				endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>