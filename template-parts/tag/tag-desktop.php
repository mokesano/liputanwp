<?php get_template_part("template-parts/tag/tag-header"); ?>
<div class="main">
	<div class="main-container">
		<div class="article-row">
			<?php get_template_part("template-parts/tag/tag-sidebar"); ?>
			<div class="article">
				<div class="article-wrapper">
					<div class="article-box">
						<div class="latest-area">
							<?php 
							if($_GET['post_format'] == "image"){
								get_template_part("template-parts/tag/tag-image");
							}elseif($_GET['post_format'] == "video"){
								get_template_part("template-parts/tag/tag-video");
							}else{
								get_template_part("template-parts/tag/tag-all");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>