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
					while (have_posts()): the_post();
					$tim = get_post_meta(get_the_ID(), 'tim', true );
					?>
					<div class="post-detail">
					    <div class="breadcrumbs">
					    	<ul>
					    		<li>
					    			<a href="<?php echo home_url(); ?>">Home</a>
					    		</li>
					    		<li>
					    			<i class="breadcrumbs-icon i-arrow-grey"></i>
					    			<a href="<?php echo linkcategory(); ?>"><?php echo labelcategory(); ?></a>
					    		</li>
					    	</ul>
					    </div>
					    <div class="post">
					    	<div class="post-header">
					    		<h1 class="post-title"><?php the_title(); ?></h1>
					    		<div class="grid-row">
						    		<div class="author author-box">
						    			<div class="author-text">
						    				<div class="author-inline">Oleh <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a> pada</div>
											<div class="pub-time">
												<time class="time-publikasi"><?php echo get_the_date( get_option('date_format') ); ?> <?php echo get_the_time( get_option('time_format') ); ?>
													<button class="btn-modif" aria-label="Show Time" on="tap:AMP.setState({time: !time})"><i class="icon-arrow icon-arrow-bottom"></i></button>
												</time>
											</div>
						    			</div>
										<time class="time-modified" [class]="time ? 'time-modified show' : 'time-modified'" ><span>Diperbarui</span> <?php echo get_the_modified_date( get_option('date_format') ); ?> <?php echo get_the_modified_time( get_option('time_format') ); ?>
										</time>
						    		</div>
					    		</div>
					    	</div>

							<?php if ( !has_post_format('image') && !has_post_format('video') ): ?>
					    	<div class="post-featured">
								<?php if ( true == get_theme_mod( 'featuredimageactivepos', false )) : 
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
				    		<div class="share nofixed">
				    			<div class="share-content">
								<?php  if ( true == get_theme_mod( 'tombolfacebook', true )) : ?>
					    			<a href="https://web.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="btn-share facebook" target="_blank" rel="noopener"><i class="icon-share i-gallery-facebook"></i></a>
								<?php endif; ?>
								<?php  if ( true == get_theme_mod( 'tomboltwitter', true )) : ?>
					    			<a href="https://twitter.com/intent/tweet?text<?php echo get_the_permalink(); ?>" class="btn-share twitter" target="_blank" rel="noopener"><i class="icon-share i-gallery-twitter"></i></a>
								<?php endif; ?>
								<?php  if ( true == get_theme_mod( 'tombolemail', true )) : ?>
					    			<a href="mailto:?to=&subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_permalink(); ?>" class="btn-share email" target="_blank" rel="noopener"><i class="icon-share i-gallery-email"></i></a>
								<?php endif; ?>
								<?php  if ( true == get_theme_mod( 'tombolwhatsapp', true )) : ?>
					    			<a href="https://api.whatsapp.com/send/?text=<?php echo get_the_permalink(); ?>" class="btn-share whatsapp" target="_blank" rel="noopener"><i class="icon-share i-gallery-whatsapp"></i></a>
								<?php endif; ?>
								<?php  if ( true == get_theme_mod( 'tombolcopylink', true )) : ?>
					    			<button class="btn-share copylink" data-url="<?php echo get_the_permalink(); ?>">Copy Link</button>
								<?php endif; ?>
					    		</div>
				    		</div>
					    	<?php endif; ?>
					    	<div class="post-content">
					    		<?php echo apply_filters( 'the_content', $post->post_content ); ?>
					    	</div>
					    	<div class="post-footer">
								<div class="tags">
										<h2 class="tag-title">Tag Terkait</h2>
									<?php 
										echo '<ul>';
										$ordered_tag_list = wp_get_post_terms(get_the_ID(), 'post_tag', array('orderby' => 'term_id', 'fields' => 'all'));
										foreach($ordered_tag_list as $tag) {
											if($tag->description !=""):
												$ver = '<i class="icon-tags i-checklist"></i>';
											else:
												$ver = "";
											endif;
										    echo '<li><a href="' . get_term_link( $tag ) . '"><span>' . esc_html( $tag->name ) . '</span>'. $ver .'</a></li>'; 
										}
										echo '</ul>';
									 ?>
								</div>
						    		<div class="credits">
						    			<div class="credits-label">
											<?php 
											if ( "" != (get_theme_mod( 'tombolredaksititle' ))) :
												echo get_theme_mod( 'tombolredaksititle' );
											else:
												echo 'Kredit';
											endif;
											?>
						    			</div>
						    			<div class="credits-content">
											<?php if ( true == get_theme_mod( 'timredaksipenulis', true )) : ?>
												<a aria-label="Author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
													<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
												</a>
										    <?php endif;  ?>
											<?php if ( true == get_theme_mod( 'timredaksieditor', true )) : ?>
												<?php if(!empty($tim['editor']) && $tim['editor'] != "-1"): ?>
													<a aria-label="Author" href="<?php echo get_author_posts_url($tim['editor']); ?>">
														<?php echo get_avatar( $tim['editor'], 40 ); ?>
													</a>
												<?php endif; ?>
										    <?php endif;  ?>
											<?php if ( true == get_theme_mod( 'timredaksireporter', true )) : ?>
												<?php if(!empty($tim['reporter']) && $tim['reporter'] != "-1"): ?>
												<a aria-label="Author" href="<?php echo get_author_posts_url($tim['reporter']); ?>">
													<?php echo get_avatar( $tim['reporter'], 40 ); ?>
												</a>
												<?php endif; ?>
										    <?php endif;  ?>
						    			</div>
						    		</div>
								<?php 
								if (is_active_sidebar('afterpos_area')) :
									dynamic_sidebar('afterpos_area');
								endif;
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
		<?php get_template_part("template-parts/sidebar/index"); ?>
		</div>
	</div>
</div>