<?php
function headlinekategoriViewDesktop($headline,$category,$jml){
	global $post;
	if(!empty($category) && $category != ""):
		$args = array(
			'category_name' => $category . '+' . $headline,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page'=> $jml
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ): ?>
			<div class="widget headline">
				<?php
				$no = 1;
				$headline = "";
				$before = '<div class="slider-inline"> <div class="widget-header"> <h2 class="widget-title">Berita Utama Lainnya</h2> </div> <div class="widget-content"> <div class="viewport"> <ul class="overview table">';
				$slider = "";
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
						$nomor = $no++;
						if($nomor > 1){
							$slider .= '<li>
							<div class="slider-image media-image">'. customthumbnail($post->ID, "image_200_116") .'</div>
							<div class="slider-text">
								<div class="slider-time">';
							if ( has_post_format('image') ):
							$slider .= '<i class="i-headline-slider-bottom-photo icon-data"></i>';
							elseif ( has_post_format('video') ):
							$slider .= '<i class="i-headline-slider-bottom-video icon-data"></i>';
							endif;
							$slider .= timeago() . '</div>
									<h3 class="slider-title">
										<a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a>
									</h3>
								</div>
							</li>';
						}else{
							$headline .= '<div class="headline-big">
								<div class="headline-box">
									<div class="headline-image media-image">'. customthumbnail($post->ID, "image_640_360") .'</div>
									<div class="headline-text">
										<div class="headline-time">';
										if ( has_post_format('image') ):
										$headline .= '<i class="i-headline-slider-bottom-photo icon-data"></i>';
										elseif ( has_post_format('video') ):
										$headline .= '<i class="i-headline-slider-bottom-video icon-data"></i>';
										endif;
										$headline .= timeago() . '</div>
											<h2 class="headline-title">
												<a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a>
											</h2>
											<div class="headline-content">' . get_excerpt(150) . '</div>
										</div>
									</div>
								</div>';
						}
					?>
					<?php
				}
				wp_reset_postdata();

				$after = '</ul> </div> <i class="i-sl-left-circle btn-prev prev"></i> <i class="i-sl-right-circle btn-next next"></i> </div> </div>'; 
				if($nomor > 1){
				echo $headline . $before . $slider . $after;
				}else{
				echo $headline;
				}
				?>
			</div>
			<?php
		endif;
	endif; 
}
function headlinekategoriViewMobile($headline,$category,$jml){
	global $post;
	if(!empty($category) && $category != ""):
		$args = array(
			'category_name' => $category . '+' . $headline,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page'=> $jml
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ): ?>
			<div class="widget headline">
				<?php
				$no = 1;
				$headline = "";
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
						$nomor = $no++;
						if($nomor > 1){
						}else{
							$headline .= '<div class="headline-big">
								<div class="headline-box">
									<div class="headline-image media-image">'. customthumbnail($post->ID, "image_640_360") .'</div>
									<div class="headline-text">
										<div class="headline-time">';
										$headline .= timeago() . '</div>
											<h2 class="headline-title">
												<a href="' . get_permalink() . '" class="media-link">' . get_the_title() . '</a>
											</h2>
										</div>
									</div>
								</div>';
						}
					?>
					<?php
				}
				wp_reset_postdata();
				echo $headline;
				?>
			</div>
			<?php
		endif;
	endif; 
}
class headlinekategori extends WP_Widget {

	public function __construct() {
		$idwidget = 'headlinekategori';
		$namewidget = '✔️ Headline Kategori';
		$descwidget = 'Widget ini menampilan daftar pos berdasarkan kategori yang dipilih dan ditampilkan dalam bentuk headline';
		parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
	}
	public function widget( $args, $instance ) {
		if(is_category( $instance['category'] )):
			if($instance['mobile'] == 'yes'){
				if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
					headlinekategoriViewMobile($instance['headline'], $instance['category'], $instance['amountheadlinemobile']);
				}elseif (wp_is_mobile()) {
					headlinekategoriViewMobile($instance['headline'], $instance['category'], $instance['amountheadlinemobile']);
				}
			}
			if($instance['desktop'] == 'yes'){
				if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				}elseif (wp_is_mobile()) {
				}else{
					headlinekategoriViewDesktop($instance['headline'], $instance['category'], $instance['amountheadlinedesktop']);
				}
			}
		endif;
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['headline'] ) ) {
			$instance['headline'] = sanitize_text_field( $new_instance['headline'] );
		}
		if ( ! empty( $new_instance['category'] ) ) {
			$instance['category'] = sanitize_text_field( $new_instance['category'] );
		}
		if ( ! empty( $new_instance['amountheadlinedesktop'] ) ) {
			$instance['amountheadlinedesktop'] = sanitize_text_field( $new_instance['amountheadlinedesktop'] );
		}
		if ( ! empty( $new_instance['amountheadlinemobile'] ) ) {
			$instance['amountheadlinemobile'] = sanitize_text_field( $new_instance['amountheadlinemobile'] );
		}
		$instance['desktop'] = isset( $new_instance['desktop'] ) ? 'yes' : 'no';
		$instance['mobile'] = isset( $new_instance['mobile'] ) ? 'yes' : 'no';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'headline' => '-1',
			'category' => '-1',
			'amountheadlinedesktop' => '5',
			'amountheadlinemobile' => '5',
			'desktop' => 'yes',
			'mobile' => 'yes',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		<div class="related-form-controls">
			<p class="not-widget">
				<b>PERHATIAN!!</b> Isi semua form widget ini agar widget dapat berfungsi dengan baik dan pastikan widget disisipkan dihalaman home.
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
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
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Tampilkan dikategori :'; ?></label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;" required>
					<option <?php selected( $instance['category'], "-1" ); ?> value="-1">Pilih Kategori</option>
					<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
						<option <?php selected( $instance['category'], $term->slug ); ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php } ?>      
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountheadlinedesktop' ); ?>"><?php echo 'Jumlah headline di desktop:'; ?></label>
				<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amountheadlinedesktop' ); ?>" name="<?php echo $this->get_field_name( 'amountheadlinedesktop' ); ?>" min="1" max="10" value="<?php echo $instance['amountheadlinedesktop']; ?>" required/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountheadlinemobile' ); ?>"><?php echo 'Jumlah headline di mobile:'; ?></label>
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

function headlinekategoriload() {
	register_widget( 'headlinekategori' );
}
add_action( 'widgets_init', 'headlinekategoriload' );