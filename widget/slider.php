<?php
function sliderDesktop($category,$headline,$jml,$titletrending,$amounttrending,$rentang){
	if(!empty($category) && $category != ""):
		$category_link = get_category_link( get_cat_ID( $category ) );
		if(is_single()):
			$args = array(
				'category_name' => $category,
    			'post_type' => 'post',
    			'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
				'posts_per_page'=> $jml
			);
		else:
			$args = array(
				'category_name' => $category,
    			'post_type' => 'post',
    			'post_status' => 'publish',
				'posts_per_page'=> $jml
			);
		endif;
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
		?>
			<div class="widget slider-inline">
				<?php if(!empty($judul)): ?>
					<div class="widget-header">
						<h2 class="widget-title"><?php echo $judul; ?></h2>
					</div>
				<?php endif; ?>
				<div class="widget-content">
					<div class="viewport">
						<ul class="overview table">
						<?php
							while ( $my_query->have_posts() ) {
							$my_query->the_post();
								?>
									<li>
										<div class="slider-image media-image">
										<?php echo customthumbnail($post->ID, "image_200_116"); ?>
										</div>
										<div class="slider-text">
											<div class="slider-time">
											<?php 
												if ( has_post_format('gallery') ):
												echo '<i class="i-headline-slider-bottom-photo icon-data"></i>';
												elseif ( has_post_format('video') ):
												echo '<i class="i-headline-slider-bottom-video icon-data"></i>';
												endif; 
											?>
											<?php echo timeago(); ?>
											</div>
											<h3 class="slider-title">
												<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
											</h3>
										</div>
									</li>
								<?php
							}
							?>
						</ul>
					</div>
					<i class="i-sl-left-circle btn-prev prev"></i>
					<i class="i-sl-right-circle btn-next next"></i>
				</div>
			</div>
		<?php 
		endif;
		wp_reset_postdata();
	endif;
}
function sliderMobile($category,$headline,$jml){
}
class slider extends WP_Widget {

	public function __construct() {
		$idwidget = 'slider';
		$namewidget = '✔️ Slider';
		$descwidget = 'Widget ini menampilan daftar pos berdasarkan kategori yang dipilih dan ditampilkan dalam bentuk slider';
		parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
	}
	public function widget( $args, $instance ) {
		if($instance['mobile'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				sliderMobile($instance['category'], $instance['headline'], $instance['amountheadlinemobile']);
			}elseif (wp_is_mobile()) {
				sliderMobile($instance['category'], $instance['headline'], $instance['amountheadlinemobile']);
			}
		}
		if($instance['desktop'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
			}elseif (wp_is_mobile()) {
			}else{
				sliderDesktop($instance['category'], $instance['headline'], $instance['amountheadlinedesktop'], $instance['titletrending'], $instance['amounttrending'], $instance['rentang']);
			}
		}
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['category'] ) ) {
			$instance['category'] = sanitize_text_field( $new_instance['category'] );
		}
		if ( ! empty( $new_instance['headline'] ) ) {
			$instance['headline'] = sanitize_text_field( $new_instance['headline'] );
		}
		if ( ! empty( $new_instance['titletrending'] ) ) {
			$instance['titletrending'] = sanitize_text_field( $new_instance['titletrending'] );
		}
		if ( ! empty( $new_instance['amountheadlinedesktop'] ) ) {
			$instance['amountheadlinedesktop'] = sanitize_text_field( $new_instance['amountheadlinedesktop'] );
		}
		if ( ! empty( $new_instance['amountheadlinemobile'] ) ) {
			$instance['amountheadlinemobile'] = sanitize_text_field( $new_instance['amountheadlinemobile'] );
		}
		if ( ! empty( $new_instance['amounttrending'] ) ) {
			$instance['amounttrending'] = sanitize_text_field( $new_instance['amounttrending'] );
		}
		if ( ! empty( $new_instance['rentang'] ) ) {
			$instance['rentang'] = sanitize_text_field( $new_instance['rentang'] );
		}
		$instance['desktop'] = isset( $new_instance['desktop'] ) ? 'yes' : 'no';
		$instance['mobile'] = isset( $new_instance['mobile'] ) ? 'yes' : 'no';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'category' => '-1',
			'headline' => '-1',
			'titletrending' => 'Trending ...',
			'amountheadlinedesktop' => '3',
			'amountheadlinemobile' => '5',
			'amounttrending' => '5',
			'rentang' => '1 month ago',
			'desktop' => 'yes',
			'mobile' => 'yes',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		<div class="related-form-controls">
			<p class="not-widget">
				<b>PERHATIAN!!</b> Isi semua form widget ini agar widget dapat berfungsi dengan baik dan pastikan widget disisipkan dihalaman kategori.
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Tampilkan dikategori:'; ?></label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;" required>
					<option <?php selected( $instance['category'], "-1" ); ?> value="-1">Pilih Kategori</option>
					<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
						<option <?php selected( $instance['category'], $term->slug ); ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php } ?>      
				</select>
			</p>
			<hr>
			<h3>Pengaturan Headline</h3>
			<p>
				<label for="<?php echo $this->get_field_id( 'headline' ); ?>"><?php echo 'Kategori Headline:'; ?></label>
				<select id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" class="widefat" style="width:100%;" required>
					<option <?php selected( $instance['headline'], "-1" ); ?> value="-1">Pilih Headline</option>
					<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
						<option <?php selected( $instance['headline'], $term->slug ); ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php } ?>      
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountheadlinedesktop' ); ?>"><?php echo 'Jumlah slider di desktop:'; ?></label>
				<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amountheadlinedesktop' ); ?>" name="<?php echo $this->get_field_name( 'amountheadlinedesktop' ); ?>" min="1" max="10" value="<?php echo $instance['amountheadlinedesktop']; ?>" required/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountheadlinemobile' ); ?>"><?php echo 'Jumlah slider di mobile:'; ?></label>
				<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amountheadlinemobile' ); ?>" name="<?php echo $this->get_field_name( 'amountheadlinemobile' ); ?>" min="1" max="10" value="<?php echo $instance['amountheadlinemobile']; ?>" required/>
			</p>
			<hr>
			<h3>Pengaturan Tampilan</h3>
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'desktop' ); ?>" name="<?php echo $this->get_field_name( 'desktop' ); ?>" value="yes"<?php checked( 'yes', $instance['desktop'] ); ?>>
				<label for="<?php echo $this->get_field_id( 'desktop' ); ?>">Tampilkan dalam versi desktop</label><br>

				<input type="checkbox" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" value="yes"<?php checked( 'yes', $instance['mobile'] ); ?>>
				<label for="<?php echo $this->get_field_id( 'mobile' ); ?>">Tampilkan dalam versi mobile</label>
			</p>
		</div>
		<?php
	}
}

function sliderload() {
	register_widget( 'slider' );
}
add_action( 'widgets_init', 'sliderload' );