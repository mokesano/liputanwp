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
					<a href="?s=<?php the_search_query(); ?>&post_type=post">Semua</a>
				</li>
				<li <?php echo 'class="' . $classvideo . '"'; ?>>
					<a href="?s=<?php the_search_query(); ?>&post_type=post&post_format=video">Video</a>
				</li>
				<li <?php echo 'class="' . $classimage . '"'; ?>>
					<a href="?s=<?php the_search_query(); ?>&post_type=post&post_format=image">Foto</a>
				</li>
			</ul>
		</nav>
</div>
<div class="main">
	<div class="main-container">
		<div class="article-row">
			<div class="article">
				<div class="article-wrapper">
					<div class="article-box">
						<span class="search-results-data">Hasil pencarian <strong>"<span><?php the_search_query(); ?></span>"</strong></span>
						<div class="latest-area">
							<?php 
							if($_GET['post_format'] == "image"){
								get_template_part("template-parts/search/search-image-mobile");
							}elseif($_GET['post_format'] == "video"){
								get_template_part("template-parts/search/search-video-mobile");
							}else{
								get_template_part("template-parts/search/search-all-mobile");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>