
<div class="tag-header">
	<div class="tag-wrapper">
		<div class="tag-title">
			<h1><?php echo single_tag_title(); ?></h1>
		</div>
		<?php 
		if($_GET['post_format'] == "image"){
			$classimage = "active";
		}elseif($_GET['post_format'] == "video"){
			$classvideo = "active";
		}else{
			$classall = "active";
		}
		?>
		<div class="tag-nav">
			<ul class="tag-nav-list">
				<li class="tags-item <?php echo $classall; ?>">
					<a class="tags-item-link" href="<?php echo get_tag_link(get_queried_object()->term_id);?>" data-label="All">Semua</a>
				</li>
				<li class="tags-item <?php echo $classvideo; ?>">
					<a class="tags-item-link" href="<?php echo get_tag_link(get_queried_object()->term_id);?>?post_format=video" data-label="Video">Video</a>
				</li>
				<li class="tags-item <?php echo $classimage; ?>">
					<a class="tags-item-link" href="<?php echo get_tag_link(get_queried_object()->term_id);?>?post_format=image" data-label="Photo">Foto</a>
				</li>
			</ul>
		</div>
	</div>
</div>