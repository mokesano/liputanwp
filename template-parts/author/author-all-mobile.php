<?php 
if (have_posts()):
while (have_posts()): the_post(); ?>
	<?php if ( has_post_format('image') ): ?>
	<div class="article-item">
		<div class="article-gallery">
			<?php 
			    $attachments = get_children( array(
			        'post_parent' => get_the_ID(),
			        'post_status' => 'inherit',
			        'post_type' => 'attachment',
			        'post_mime_type' => 'image',
			        'order' => 'ASC')
			    );
				$i = 1;
				$big = "";
				$small = '';
				$before = '<div class="gallery-box">';
			    foreach ( $attachments as $thumb_id => $attachment ):
			    	$no = $i++; 
					$count = count($attachments) - 3; 
					?>
					<?php if ($no == 1):
						$big .= '<div class="big-gallery">' . wp_get_attachment_image($thumb_id, "image_383_288") . '</div>';
					endif;
					if ($no == 2):
							$small .= '<div class="small-gallery">' . wp_get_attachment_image($thumb_id, "image_255_143") . '</div>';
					endif;
					if ($no == 3):
							$small .= '<div class="small-gallery">' . wp_get_attachment_image($thumb_id, "image_255_143") . '<div class="counter"><span>' . $count . '+</span></div></div>';
					endif;
					if ($no++ == 3) break;
			    endforeach;
				$after = '</div>';
				echo $big . $before . $small . $after;
			    ?>
		</div>
		<div class="article-text-gallery">
			<div class="article-time">
				<?php if(!empty(labelcategory())): ?>
					<span class="article-category"><?php echo labelcategory(); ?></span>
				<?php endif; ?>
				<?php echo timeago(); ?>
			</div>
			<h3 class="article-title">
				<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			</h3>
		</div>
	</div>
	<?php elseif ( has_post_format('video') ): ?>
	<div class="article-item">
		<div class="article-video media-image">
			<?php echo customthumbnail($post->ID, "image_640_360"); ?>
			<div class="play-box">
				<i class="i-big-play-button"></i>
			</div>
		</div>
		<div class="article-text-video">
			<div class="article-time">
				<?php if(!empty(labelcategory())): ?>
					<span class="article-category"><?php echo labelcategory(); ?></span>
				<?php endif; ?>
				<?php echo timeago(); ?>
			</div>
			<h3 class="article-title">
				<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			</h3>
		</div>
	</div>
	<?php else: ?>
	<div class="article-item table">
		<div class="article-text">
			<div class="article-time">
				<?php if(!empty(labelcategory())): ?>
					<span class="article-category"><?php echo labelcategory(); ?></span>
				<?php endif; ?>
				<?php echo timeago(); ?>
			</div>
			<h3 class="article-title">
				<a href="<?php echo get_permalink(); ?>" class="media-link"><?php echo get_the_title(); ?></a>
			</h3>
		</div>
		<div class="article-image media-image">
			<?php echo customthumbnail($post->ID, "image_200_116"); ?>
		</div>
	</div>
	<?php endif; ?>
<?php endwhile; ?>

<div class="info">
	<button id="trigger1" class="trigger">Lihat Lainnya <i class='icon icon-arrow-right'></i></button>
	<div id="spinnerpost" class="loading">
		<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/loadingbox.gif' ?>" width="32" height="32" alt="Loading">
	</div>
	<div class="no-more"><i class="tag-snippet__topic-icon i-checklist icon-nomore"></i> Sudah ditampilkan semua</div>
</div>
<div class="pagination">
	<?php echo get_next_posts_link("Lihat Lainnya <i class='icon icon-arrow-right'></i>"); ?>
</div>
<?php endif; ?>