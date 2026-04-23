<?php
function breakingViewDesktop($judul,$category){
	global $post;
	if(!empty($category) && $category != ""):
		$category_link = get_category_link( get_cat_ID( $category ) );
		$args = array(
			'category_name' => $category,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page'=> 1
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
						while ( $my_query->have_posts() ) {
							$my_query->the_post();
		?>
			<div class="breaking">
				<div class="breaking-container">
					<a href="<?php echo get_permalink(); ?>">
						<?php if(!empty($judul)): ?>
							<span class="breaking-title"><?php echo $judul; ?></span>
						<?php endif; ?>
						<span class="breaking-content"><?php echo get_the_title(); ?></span>
					</a>
				</div>
			</div>
		<?php 
						}
		endif;
		wp_reset_postdata();
	endif;
}
function breakingViewMobile($judul,$category){
	global $post;
	if(!empty($category) && $category != ""):
		$category_link = get_category_link( get_cat_ID( $category ) );
		$args = array(
			'category_name' => $category,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page'=> 1
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
		?>
			<div class="breaking">
				<div class="breaking-container">
					<a href="<?php echo get_permalink(); ?>">
						<?php if(!empty($judul)): ?>
							<span class="breaking-title"><?php echo $judul; ?></span>
						<?php endif; ?>
						<span class="breaking-content"><?php echo get_the_title(); ?></span>
					</a>
				</div>
			</div>
		<?php 
		endif;
		wp_reset_postdata();
	endif;
}
class breakingWidget extends WP_Widget {

    public function __construct() {
        $idwidget = 'breaking';
        $namewidget = '✔️ Breaking';
        $descwidget = 'Widget ini menampilan daftar pos berdasarkan kategori yang dipilih dan ditampilkan dalam bentuk widget breaking';
        parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
    }
	public function widget( $args, $instance ) {
		if($instance['mobile'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
				breakingViewMobile($instance['title'], $instance['category']);
			}elseif (wp_is_mobile()) {
				breakingViewMobile($instance['title'], $instance['category']);
			}
		}
		if($instance['desktop'] == 'yes'){
			if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
			}elseif (wp_is_mobile()) {
			}else{
				breakingViewDesktop($instance['title'], $instance['category']);
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
        $instance['desktop'] = isset( $new_instance['desktop'] ) ? 'yes' : 'no';
        $instance['mobile'] = isset( $new_instance['mobile'] ) ? 'yes' : 'no';
		return $instance;
	}
	public function form( $instance ) {
	    $defaults = array(
	        'title' => '',
	        'category' => '-1',
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

function breakingWidgetload() {
    register_widget( 'breakingWidget' );
}
add_action( 'widgets_init', 'breakingWidgetload' );