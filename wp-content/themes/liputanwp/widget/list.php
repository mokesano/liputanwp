<?php
function listViewDesktop($judul,$category,$jml){
	global $post;
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
			<div class="widget list">
				<?php if(!empty($judul)): ?>
					<div class="widget-header">
						<h2 class="widget-title"><?php echo $judul; ?></h2>
					</div>
				<?php endif; ?>
				<div class="widget-content">
					<?php
					$no = 1;
					while ( $my_query->have_posts() ) {
						$my_query->the_post();
						$nomor = $no++;
						if($nomor == 1){
						?>
							<div class="list-item big-list">
								<div class="big-image media-image">
									<?php echo customthumbnail($post->ID, "image_300_168"); ?>
								</div>
								<div class="big-text">
									<h3 class="big-title">
										<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
									</h3>
								</div>
							</div>
						<?php
						}else{
						?>
							<div class="list-item small-list">
								<div class="small-image media-image">
									<?php echo customthumbnail($post->ID, "image_60_60"); ?>
								</div>
								<div class="small-text">
									<h3 class="small-title">
										<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
									</h3>
								</div>
							</div>
						<?php
						}
					}
					?>
				</div>
			</div>
		<?php 
		endif;
		wp_reset_postdata();
	endif;
}
function listViewMobile($judul,$category,$jml){
	global $post;
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
			<div class="widget list">
				<?php if(!empty($judul)): ?>
					<div class="widget-header">
						<h2 class="widget-title"><?php echo $judul; ?></h2>
					</div>
				<?php endif; ?>
				<div class="widget-content">
					<?php
					$no = 1;
					while ( $my_query->have_posts() ) {
						$my_query->the_post();
						$nomor = $no++;
						if($nomor == 1){
						?>
							<div class="list-item big-list">
								<div class="big-image media-image">
									<?php echo customthumbnail($post->ID, "image_300_168"); ?>
								</div>
								<div class="big-text">
									<h3 class="big-title">
										<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
									</h3>
								</div>
							</div>
						<?php
						}else{
						?>
							<div class="list-item small-list">
								<div class="small-image media-image">
									<?php echo customthumbnail($post->ID, "image_60_60"); ?>
								</div>
								<div class="small-text">
									<h3 class="small-title">
										<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
									</h3>
								</div>
							</div>
						<?php
						}
					}
					?>
				</div>
			</div>
		<?php 
		endif;
		wp_reset_postdata();
	endif;
}
class listWidget extends WP_Widget {

	public function __construct() {
		$idwidget = 'list';
		$namewidget = '✔️ List';
		$descwidget = 'Widget ini menampilan daftar pos terpopuler dan terbaru berdasarkan kategori yang dipilih serta ditampilkan dalam bentuk widget list';
		parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
	}
	public function widget( $args, $instance ) {
		if($instance['mobile'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				listViewMobile($instance['title'], $instance['category'], $instance['amountmobile']);
			}elseif (wp_is_mobile()) {
				listViewMobile($instance['title'], $instance['category'], $instance['amountmobile']);
			}
		}
		if($instance['desktop'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
			}elseif (wp_is_mobile()) {
			}else{
				listViewDesktop($instance['title'], $instance['category'], $instance['amountdesktop']);
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
		if ( ! empty( $new_instance['amountdesktop'] ) ) {
			$instance['amountdesktop'] = sanitize_text_field( $new_instance['amountdesktop'] );
		}
		if ( ! empty( $new_instance['amountmobile'] ) ) {
			$instance['amountmobile'] = sanitize_text_field( $new_instance['amountmobile'] );
		}
		$instance['desktop'] = isset( $new_instance['desktop'] ) ? 'yes' : 'no';
		$instance['mobile'] = isset( $new_instance['mobile'] ) ? 'yes' : 'no';
		return $instance;
	}
	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'category' => '-1',
			'amountdesktop' => '3',
			'amountmobile' => '3',
			'desktop' => 'yes',
			'mobile' => 'yes',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		<div class="related-form-controls">
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<hr>
			<h3>Pengaturan Widget</h3>
			<p>
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Kategori :'; ?></label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;" required>
					<option <?php selected( $instance['category'], "-1" ); ?> value="-1">Pilih Kategori</option>
					<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
						<option <?php selected( $instance['category'], $term->slug ); ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php } ?>      
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountdesktop' ); ?>"><?php echo 'Jumlah pos di desktop:'; ?></label>
				<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amountdesktop' ); ?>" name="<?php echo $this->get_field_name( 'amountdesktop' ); ?>" min="1" max="10" value="<?php echo $instance['amountdesktop']; ?>" required/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'amountmobile' ); ?>"><?php echo 'Jumlah pos di mobile:'; ?></label>
				<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amountmobile' ); ?>" name="<?php echo $this->get_field_name( 'amountmobile' ); ?>" min="1" max="10" value="<?php echo $instance['amountmobile']; ?>" required/>
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

function listWidgetload() {
	register_widget( 'listWidget' );
}
add_action( 'widgets_init', 'listWidgetload' );