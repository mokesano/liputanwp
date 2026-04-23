<footer class="footer">
	<div class="footer-container">
		<div class="footer-row">
			<div class="footer-left">
				<?php 
				if (is_active_sidebar('footer_left')) :
					dynamic_sidebar('footer_left');
				endif;
				 ?>
			</div>
			<div class="footer-right">
				<?php 
				if (is_active_sidebar('footer_right')) :
					dynamic_sidebar('footer_right');
				endif;
				 ?>
			</div>
		</div>
		<div class="footer-bottom">
			<?php 
			if (is_active_sidebar('copyright')) :
				dynamic_sidebar('copyright');
			endif;
			 ?>
		</div>
	</div>
</footer>