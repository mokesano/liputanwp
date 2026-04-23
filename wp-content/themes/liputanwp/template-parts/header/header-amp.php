<header class="header">
	<div class="header-box">
		<div class="header-left">
			<button class="bar" on="tap:AMP.setState({sidebarmenu: !sidebarmenu})" aria-label="Menu"></button>
		</div>
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
		<div class="header-right">
		<button class="icon-search" aria-label="search" on="tap:AMP.setState({search: !search})"></button>
		<button class="mode icon-darkmode" aria-label="dark mode" on="tap:AMP.setState({darkmode: !darkmode})"></button>
		</div>
	</div>
</header>
<div class="header-search" [class]="search ? 'header-search show' : 'header-search'">
	<form class="header-search-form" method="get" action="<?php echo home_url('/'); ?>">
		<div class="header-search-wrapper">
			<input  class="header-input-search" type="text" name="s" placeholder="berita apa yang ingin anda baca hari ini?" value="<?php the_search_query(); ?>" maxlength="50" autocomplete="off">
			<input type="hidden" name="post_type" value="post" />
		</div>
	</form>
</div>
<div class="search-transparent" [class]="search ? 'search-transparent show' : 'search-transparent'" on="tap:AMP.setState({search: !search})"></div>
<div [class]="sidebarmenu ? 'sidebar-menu show' : 'sidebar-menu'" class="sidebar-menu">
	<div class="sidebar-menu-header">
		<div class="sidebar-menu-title">Menu</div>
		<button class="icon-close" aria-label="close" on="tap:AMP.setState({sidebarmenu: !sidebarmenu})"></button>
	</div>
	<div class="sidebar-menu-content">
		<?php 
		if (is_active_sidebar('sidebar_menu')) :
			dynamic_sidebar('sidebar_menu');
		endif;
		 ?>
	</div>
</div>
<?php if(!is_single() && !is_page() && !is_tag() && !is_search() && !is_author()): ?>
<div class="header-nav">
	<div class="nav-container table">
		<?php mobile_menu(); ?>
	</div>
</div>
<?php endif; ?>