
<div class="tag-header">
	<div class="tag-wrapper">
		<div class="tag-title">
			<?php 
		global $wp;
		$s_array = array( 'posts_per_page' => 1 );
		$new_query = array_merge( $s_array, (array) $wp->query_vars );
		$the_query = new WP_Query( $new_query );
		if ( $the_query->have_posts() ):
			while ( $the_query->have_posts() ):$the_query->the_post();?>
	    		<div class="avatar-box">
	    			<div class="avatar-image">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
	    			</div>
	    			<div class="avatar-text">
						<div class="avatar-name">
							<h1><?php echo get_the_author(); ?></h1>
						</div>
	    			</div>
	    		</div>
				<?php
			endwhile;
		endif;
		?>
		</div>
		<?php 
		if($_GET['post_format'] == "image"){
			$classimage = "active";
		}elseif($_GET['author'] == "bio"){
			$classprofil = "active";
		}elseif($_GET['post_format'] == "video"){
			$classvideo = "active";
		}else{
			$classall = "active";
		}
		?>
		<div class="tag-nav">
			<ul class="tag-nav-list">
				<li class="tags-item <?php echo $classall; ?>">
					<a class="tags-item-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))); ?>" data-label="All">Semua</a>
				</li>
				<li class="tags-item <?php echo $classprofil; ?>">
					<a class="tags-item-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ))); ?>?author=bio" data-label="Profil">Profil</a>
				</li>
				<li class="tags-item <?php echo $classvideo; ?>">
					<a class="tags-item-link" href="?post_format=video" data-label="Video">Video</a>
				</li>
				<li class="tags-item <?php echo $classimage; ?>">
					<a class="tags-item-link" href="?post_format=image" data-label="Photo">Foto</a>
				</li>
			</ul>
		</div>
	</div>
</div>