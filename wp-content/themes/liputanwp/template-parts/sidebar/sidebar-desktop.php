<div class="sidebar">
	<aside class="sidebar-wrapper">
		<div class="sidebar-box">
			<?php 
			if (is_active_sidebar('sidebar_area')) :
				dynamic_sidebar('sidebar_area');
			endif;
			 ?>
		</div>
	</aside>
</div>