<?php
function popularposViewDesktop($judul,$category,$rentang,$jml){
	global $post;
	if(!empty($category) && $category != "-1"):
		if(is_single()):
			$args = array(
				'category_name' => $category,
				'post_type' => 'post',
			    'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		else:
			$args = array(
				'category_name' => $category,
				'post_type' => 'post',
			    'post_status' => 'publish',
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		endif;
	else:
		if(is_single()):
			$args = array(
				'post_type' => 'post',
			    'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		else:
			$args = array(
				'post_type' => 'post',
			    'post_status' => 'publish',
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		endif;
	endif;
	$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ):
		?>
			<div class="widget popularpos">
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
								<div class="popularpos-item">
									<div class="popularpos-image media-image">
										<?php echo customthumbnail($post->ID, "image_300_168"); ?>
									</div>
									<div class="popularpos-content">
										<span class="popularpos-number"><?php echo $nomor; ?></span>
										<div class="popularpos-text">
											<?php if(!empty(labelcategory())): ?>
												<span class="popularpos-category"><?php echo labelcategory(); ?></span>
											<?php endif; ?>
											<h3 class="popularpos-title">
												<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
											</h3>
										</div>
									</div>
								</div>
							<?php
							}else{
							?>
								<div class="popularpos-item">
									<div class="popularpos-content">
										<span class="popularpos-number"><?php echo $nomor; ?></span>
										<div class="popularpos-text">
											<?php if(!empty(labelcategory())): ?>
												<span class="popularpos-category"><?php echo labelcategory(); ?></span>
											<?php endif; ?>
											<h3 class="popularpos-title">
												<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
											</h3>
										</div>
									</div>
								</div>
							<?php
							}
						?>
						<?php
						}
						?>
				</div>
			</div>
		<?php 
	endif;
	wp_reset_postdata();
}
function popularposViewMobile($judul,$category,$rentang,$jml){
	global $post;
	if(!empty($category) && $category != "-1"):
		if(is_single()):
			$args = array(
				'category_name' => $category,
				'post_type' => 'post',
			    'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		else:
			$args = array(
				'category_name' => $category,
				'post_type' => 'post',
			    'post_status' => 'publish',
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		endif;
	else:
		if(is_single()):
			$args = array(
				'post_type' => 'post',
			    'post_status' => 'publish',
				'post__not_in' => array( $post->ID ),
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		else:
			$args = array(
				'post_type' => 'post',
			    'post_status' => 'publish',
    			'meta_key' => 'post_views_count',
    			'orderby'   => 'meta_value_num',
				'posts_per_page'=> $jml,
    			'order' => 'DESC',
    			'date_query' => array(
    				array(
    					'after' => $rentang,
    				),
    			)
			);
		endif;
	endif;
	$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ):
		?>
			<div class="widget popularpos">
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
							$nomor = $no++;?>
								<div class="popularpos-item">
									<div class="popularpos-content">
										<span class="popularpos-number"><?php echo $nomor; ?></span>
										<div class="popularpos-text">
											<?php if(!empty(labelcategory())): ?>
												<span class="popularpos-category"><?php echo labelcategory(); ?></span>
											<?php endif; ?>
											<h3 class="popularpos-title">
												<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
											</h3>
										</div>
									</div>
								</div>
						<?php
						}
						?>
				</div>
			</div>
		<?php 
	endif;
	wp_reset_postdata();
}
class popularposWidget extends WP_Widget {

	public function __construct() {
		$idwidget = 'popularpos';
		$namewidget = '✔️ Popular Pos';
		$descwidget = 'Widget ini menampilan daftar pos terpopuler dan terbaru berdasarkan kategori yang dipilih serta ditampilkan dalam bentuk widget list';
		parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
	}
	public function widget( $args, $instance ) {
		if($instance['mobile'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				popularposViewMobile($instance['title'], $instance['category'], $instance['rentang'], $instance['amountmobile']);
			}elseif (wp_is_mobile()) {
				popularposViewMobile($instance['title'], $instance['category'], $instance['rentang'], $instance['amountmobile']);
			}
		}
		if($instance['desktop'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
			}elseif (wp_is_mobile()) {
			}else{
				popularposViewDesktop($instance['title'], $instance['category'], $instance['rentang'], $instance['amountdesktop']);
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
		if ( ! empty( $new_instance['rentang'] ) ) {
			$instance['rentang'] = sanitize_text_field( $new_instance['rentang'] );
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
			'rentang' => '-1',
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
				<label for="<?php echo $this->get_field_id( 'rentang' ); ?>"><?php echo 'Rentang :'; ?></label>
				<select id="<?php echo $this->get_field_id('rentang'); ?>" name="<?php echo $this->get_field_name('rentang'); ?>" class="widefat" style="width:100%;" required>
					<option <?php selected( $instance['rentang'], '10 years ago' ); ?> value="10 years ago">-- Pilih --</option>
					<option <?php selected( $instance['rentang'], '1 day ago' ); ?> value="1 day ago">1 Hari</option>
					<option <?php selected( $instance['rentang'], '7 day ago' ); ?> value="7 day ago">7 Hari</option>
					<option <?php selected( $instance['rentang'], '1 month ago' ); ?> value="1 month ago">1 Bulan</option>
					<option <?php selected( $instance['rentang'], '1 years ago' ); ?> value="1 years ago">1 Tahun</option>
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

function popularposWidgetload() {
	register_widget( 'popularposWidget' );
}
add_action( 'widgets_init', 'popularposWidgetload' );