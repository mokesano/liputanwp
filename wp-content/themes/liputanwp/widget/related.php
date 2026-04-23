<?php
function relatedViewDesktop($judul,$berdasarkan,$jml){
global $post;
if($berdasarkan == "category"){
    $categories = get_the_category( $post->ID );
    $categorieIDs = array();
	if ( $categories ) {
		$categoriecount = count( $categories );
        for ( $i = 0; $i < $categoriecount; $i++ ) {
            $categorieIDs[$i] = $categories[$i]->term_id;
        }
        $args = array(
            'category__in' => $categorieIDs,
			'post_type' => 'post',
			'post_status' => 'publish',
            'post__not_in' => array( $post->ID ),
            'posts_per_page'=> $jml
        );
    }
} else if($berdasarkan == "tag"){
    $tags = wp_get_post_tags( $post->ID );
    $tagIDs = array();

	if ( $tags ) {
		$tagcount = count( $tags );
        for ( $i = 0; $i < $tagcount; $i++ ) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        $args = array(
            'tag__in' => $tagIDs,
			'post_type' => 'post',
			'post_status' => 'publish',
            'post__not_in' => array( $post->ID ),
            'posts_per_page'=> $jml
        );
    }
}else{
    $args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
        'post__not_in' => array( $post->ID ),
        'posts_per_page'=> $jml
    );

}

		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
		?>
    		<div class="widget grid">
    			<div class="widget-header">
    				<h3 class="widget-title">Rekomendasi</h3>
    			</div>
    			<div class="widget-content">
    				<div class="related-row">
						<?php
							while ( $my_query->have_posts() ) {
								$my_query->the_post();
								?>
		    					<div class="related-item">
			    					<div class="related-image media-image">
										<?php echo customthumbnail($post->ID, "image_200_116"); ?>
			    					</div>
			    					<div class="related-text">
			    						<h3 class="related-title">
											<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			    						</h3>
			    					</div>
		    					</div>
								<?php
							}
						?>			
    				</div>
    			</div>
    		</div>
		<?php 
		endif;
		wp_reset_postdata();
}
function relatedViewMobile($judul,$berdasarkan,$jml){
global $post;
if($berdasarkan == "category"){
    $categories = get_the_category( $post->ID );
    $categorieIDs = array();
	if ( $categories ) {
		$categoriecount = count( $categories );
        for ( $i = 0; $i < $categoriecount; $i++ ) {
            $categorieIDs[$i] = $categories[$i]->term_id;
        }
        $args = array(
            'category__in' => $categorieIDs,
			'post_type' => 'post',
			'post_status' => 'publish',
            'post__not_in' => array( $post->ID ),
            'posts_per_page'=> $jml
        );
    }
} else if($berdasarkan == "tag"){
    $tags = wp_get_post_tags( $post->ID );
    $tagIDs = array();

	if ( $tags ) {
		$tagcount = count( $tags );
        for ( $i = 0; $i < $tagcount; $i++ ) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        $args = array(
            'tag__in' => $tagIDs,
			'post_type' => 'post',
			'post_status' => 'publish',
            'post__not_in' => array( $post->ID ),
            'posts_per_page'=> $jml
        );
    }
}else{
    $args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
        'post__not_in' => array( $post->ID ),
        'posts_per_page'=> $jml
    );

}

		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
		?>
    		<div class="widget grid">
    			<div class="widget-header">
    				<h3 class="widget-title">Rekomendasi</h3>
    			</div>
    			<div class="widget-content">
    				<div class="related-row">
						<?php
							while ( $my_query->have_posts() ) {
								$my_query->the_post();
								?>
		    					<div class="related-item">
			    					<div class="related-image media-image">
										<?php echo customthumbnail($post->ID, "image_383_288"); ?>
			    					</div>
			    					<div class="related-text">
			    						<h3 class="related-title">
											<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			    						</h3>
			    					</div>
		    					</div>
								<?php
							}
						?>			
    				</div>
    			</div>
    		</div>
		<?php 
		endif;
		wp_reset_postdata();
}
class relatedWidget extends WP_Widget {

    public function __construct() {
        $idwidget = 'related';
        $namewidget = '✔️ Related';
        $descwidget = 'Widget ini menampilan daftar pos terkait berdasarkan kategori dan tag serta hanya tampil di halaman pos';
        parent::__construct($idwidget, $namewidget, array('description'=> $descwidget));
    }
	public function widget( $args, $instance ) {
		if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
			relatedViewMobile($instance['title'], $instance['berdasarkan'], $instance['amount']);
		}elseif (wp_is_mobile()) {
			relatedViewMobile($instance['title'], $instance['berdasarkan'], $instance['amount']);
		}else{
			relatedViewDesktop($instance['title'], $instance['berdasarkan'], $instance['amount']);
		}
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		// if ( ! empty( $new_instance['category'] ) ) {
		// 	$instance['category'] = sanitize_text_field( $new_instance['category'] );
		// }
		if ( ! empty( $new_instance['berdasarkan'] ) ) {
			$instance['berdasarkan'] = sanitize_text_field( $new_instance['berdasarkan'] );
		}
		if ( ! empty( $new_instance['amount'] ) ) {
			$instance['amount'] = sanitize_text_field( $new_instance['amount'] );
		}
        $instance['desktop'] = isset( $new_instance['desktop'] ) ? 'yes' : 'no';
        $instance['mobile'] = isset( $new_instance['mobile'] ) ? 'yes' : 'no';
		return $instance;
	}
	public function form( $instance ) {
		global $wp_customize;
	    $defaults = array(
	        'title' => '',
	        'berdasarkan' => 'random',
	        'amount' => '3',
	        'desktop' => 'yes',
	        'mobile' => 'yes',
	    );
	    $instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		<div class="related-form-controls">
			<p class="not-widget">
				<b>PERHATIAN!!</b> Widget ini akan berfungsi dengan baik jika berada di halaman pos.
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
		    <hr>
		    <h3>Pengaturan Widget</h3>
		    <p>
		        <label for="<?php echo $this->get_field_id( 'berdasarkan' ); ?>"><?php echo 'Terkait berdasarkan :'; ?></label>
		        <select id="<?php echo $this->get_field_id('berdasarkan'); ?>" name="<?php echo $this->get_field_name('berdasarkan'); ?>" class="widefat" style="width:100%;" required>
		            <option <?php selected( $instance['berdasarkan'], 'random' ); ?> value="random">-- Pilih --</option>
		            <option <?php selected( $instance['berdasarkan'], 'category' ); ?> value="category">Kategori</option>
		            <option <?php selected( $instance['berdasarkan'], 'tag' ); ?> value="tag">Tag</option>
		        </select>
		    </p>
		    <p>
		        <label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php echo 'Jumlah Pos:'; ?></label>
		        <input type="number" class="widefat" id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" min="1" max="10" value="<?php echo $instance['amount']; ?>" required/>
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

function relatedWidgetload() {
    register_widget( 'relatedWidget' );
}
add_action( 'widgets_init', 'relatedWidgetload' );