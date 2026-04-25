<?php 
if (have_posts()):
while (have_posts()): the_post(); ?>
<div class="share hea">
	<?php 
	if ( "" != (get_theme_mod( 'tombolsharetitle' ))) :
		echo '<div class="share-label">' . get_theme_mod( 'tombolsharetitle' ) . '</div>';
	else:
		echo '<div class="share-label">Bagikan</div>';
	endif;
	?>
	<div class="share-content">
	<?php  if ( true == get_theme_mod( 'tombolfacebook', true )) : ?>
		<a href="https://web.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="btn-share facebook" target="_blank" rel="nofollow"><i class="icon-share i-gallery-facebook"></i></a>
	<?php endif; ?>
	<?php  if ( true == get_theme_mod( 'tomboltwitter', true )) : ?>
		<a href="https://twitter.com/intent/tweet?text<?php echo get_the_permalink(); ?>" class="btn-share twitter" target="_blank" rel="nofollow"><i class="icon-share i-gallery-twitter"></i></a>
	<?php endif; ?>
	<?php  if ( true == get_theme_mod( 'tombolemail', true )) : ?>
		<a href="mailto:?to=&subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_permalink(); ?>" class="btn-share email" target="_blank" rel="nofollow"><i class="icon-share i-gallery-email"></i></a>
	<?php endif; ?>
	<?php  if ( true == get_theme_mod( 'tombolwhatsapp', true )) : ?>
		<a href="https://api.whatsapp.com/send/?text=<?php echo get_the_permalink(); ?>" class="btn-share whatsapp" target="_blank" rel="nofollow"><i class="icon-share i-gallery-whatsapp"></i></a>
	<?php endif; ?>
	<?php  if ( true == get_theme_mod( 'tombolcopylink', true )) : ?>
		<button class="btn-share copylink" data-url="<?php echo get_the_permalink(); ?>">Copy Link</button>
	<?php endif; ?>
	</div>
</div>
<?php 
endwhile;
endif;
?>
<div class="main">
	<div class="main-container">
		<div class="article-row">
		<div class="article">
			<div class="article-wrapper">
				<div class="article-box">
					<?php 
					if (have_posts()):
					while (have_posts()): the_post();
					$tim = get_post_meta(get_the_ID(), 'tim', true );
					?>
					<div class="post-detail">
					    <div class="post">
					    	<div class="post-header">
					    		<h1 class="post-title"><?php the_title(); ?></h1>
					    	</div>

							<?php if ( !has_post_format('image') && !has_post_format('video') ): ?>
					    	<div class="post-featured">
								<?php if ( true == get_theme_mod( 'featuredimageactivepage', false )) : 
									if ( "" != (get_theme_mod( 'categoryfeaturedimagea' ))) :
									else:
									endif;
									$textcat = get_theme_mod( 'categoryfeaturedimagea' );
									$splittedcat = explode(",", $textcat);
									$arrcat = "'" . implode("', '", $splittedcat) ."'";
									$category_detail=get_the_category($post_id);
									$datafeaturedimage = "array(". $arrcat .")";
									$parsed = eval("return " . $datafeaturedimage . ";");
									$arrcount = count($parsed);

									$ck = 0;
									$hasil = 0;
									foreach($category_detail as $cd){
										$aprseslug = strval($cd->slug);
										for ($i=0; $i < $arrcount; $i++) { 
											$hasparse = strval($parsed[$i]);
											if($aprseslug == $hasparse){
												$ck = 1;
												break;
											}else{
												$ck = 0;
											}
										}
										if($ck == 1){
											$hasil = 1 ;
										}else{
											$hasil = "";
										}
									}
									if(empty($hasil) || $hasil == ""){
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
											<?php 
												if(!empty($caption)){ ?>
													<figcaption><?php echo $caption; ?></figcaption>
											<?php } ?>
											</figure>
										<?php endif;
									}
								endif;  ?>
					    	</div>
					    	<?php endif; ?>
					    	<div class="post-content">
								<?php 
								global $page, $pages;
								if(count($pages) > 1): 
								if($page > 1): 
								?>
									<div class="separator">
										<div class="separator-title"><?php echo $page; ?> dari <?php echo count($pages); ?> halaman</div>
									</div>
								<?php 
								endif; 
								endif; ?>
					    		<?php the_content(); ?>
					    	</div>
							<div class="status">
								<div id="spinnerpost" class="loading">
									<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/loadingbox.gif' ?>" width="32" height="32" alt="Loading">
								</div>
							</div>
							<?php 
							if(count($pages) > 1): ?>
								<div class="paginationpost">
									<?php
									if ($page == count($pages)):
									else:
										wp_link_pages( 'before=&after=&nextpagelink=<span class="next-page">Halaman Selanjutnya</span>&next_or_number=next&previouspagelink='); 
									endif;
									?>
								</div>
							<?php endif;
							?>
					    	<div class="post-footer">
								<?php 
								comments_template();
								 ?>
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
</div>