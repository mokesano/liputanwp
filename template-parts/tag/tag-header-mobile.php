<div class="header-nav">
		<?php 
		if($_GET['post_format'] == "image"){
			$classimage = "current-menu-item";
		}elseif($_GET['post_format'] == "video"){
			$classvideo = "current-menu-item";
		}else{
			$classall = "current-menu-item";
		}
		?>
		<nav>
			<ul>
				<li <?php echo 'class="' . $classall . '"'; ?>>
					<a href="<?php echo get_tag_link(get_queried_object()->term_id);?>">Semua</a>
				</li>
				<li <?php echo 'class="' . $classvideo . '"'; ?>>
					<a href="<?php echo get_tag_link(get_queried_object()->term_id);?>?post_format=video">Video</a>
				</li>
				<li <?php echo 'class="' . $classimage . '"'; ?>>
					<a href="<?php echo get_tag_link(get_queried_object()->term_id);?>?post_format=image">Foto</a>
				</li>
			</ul>
		</nav>
</div>
<div class="tag-title">
	<h1><?php echo single_tag_title(); ?></h1>
</div>
<?php if(!empty(category_description())): ?>
<div class="widget sidebar-desc"><?php echo category_description(); ?></div>
<?php else: ?>
<div class="widget sidebar-desc"><?php echo get_excerpt(100); ?></div>
<?php endif; ?>