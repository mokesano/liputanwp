<header class="header">
	<div class="header-wrap table">
		<div class="header-box">
			<div class="header-brand">
				<?php 
					if (function_exists('the_custom_logo')) :
						if(has_custom_logo()) :
							echo the_custom_logo();
						endif;
					endif;
					$blogInfo = get_bloginfo('name');
					if (!empty($blogInfo)) : 
						if (is_front_page() && is_home()) :
							brand_h1();
							else :
							brand_p();
						endif;
					endif;
					$description = get_bloginfo( 'description', 'display' );
					if ($description || is_customize_preview()) :
						brand_description($description);
					endif;
				?>
			</div>
			<div class="header-search">
				<form class="header-search-form" method="get" action="<?php echo home_url('/'); ?>">
					<div class="header-search-wrapper">
						<input  class="header-input-search" type="text" name="s" placeholder="berita apa yang ingin anda baca hari ini?" value="<?php the_search_query(); ?>" maxlength="50" autocomplete="off">
						<input type="hidden" name="post_type" value="post" />
						<button type="submit" class="btn-search" aria-label="Search">CARI</button>
					</div>
				</form>
			</div>
			<button class="mode" aria-label="Dark Mode"></button>
		</div>
	</div>
	<div class="header-nav">
		<div class="nav-container table">
			<?php desktop_menu(); ?>
			<div class="fixed-search">
				<button class="btn-fixed-search"><i class="i-search-2 icon-search"></i></button>
				<div class="fixed-form">
					<form class="fixed-search-wrapper" method="get" action="<?php echo home_url('/'); ?>">
						<input  class="fixed-input-search" type="text" name="s" placeholder="berita apa yang ingin anda baca hari ini?" value="<?php the_search_query(); ?>" maxlength="50">
						<input type="hidden" name="post_type" value="post" />
					</form>
				</div>
			</div>
		</div>
		<?php if(is_search()): ?>
		<div class="nav-submenu">
                <div class="submenu-conteiner">
                    <div class="nav-title-search">
                        <span>Pencarian</span>
                    </div>
                    <div class="submenu">
                        <nav class="menu-search-container">
                        	<ul id="menu-search" class="menu">
								<?php 
								if($_GET['post_format'] == "image"){
									$classimage = "active";
								}elseif($_GET['post_format'] == "video"){
									$classvideo = "active";
								}else{
									$classall = "active";
								}?>
                        		<li class="<?php echo $classall ?>"><a href="?s=<?php the_search_query(); ?>&post_type=post">Semua</a></li>
                        		<li class="<?php echo $classvideo ?>"><a href="?s=<?php the_search_query(); ?>&post_type=post&post_format=video">Video</a></li>
                        		<li class="<?php echo $classimage ?>"><a href="?s=<?php the_search_query(); ?>&post_type=post&post_format=image">Foto</a></li>
                        	</ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php else: ?>
		<?php 
		if (is_active_sidebar('submenu_area')) :
			dynamic_sidebar('submenu_area');
		endif;
		 ?>
		<?php endif; ?>
	</div>
</header>