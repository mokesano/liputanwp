<?php 
if (have_posts()):
while (have_posts()): the_post(); 
	?>
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
<?php endwhile;?>

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