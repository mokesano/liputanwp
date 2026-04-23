<?php get_template_part("template-parts/tag/tag-header-mobile"); ?>
<div class="main">
	<div class="main-container">
		<div class="article-row">
			<div class="article">
				<div class="article-wrapper">
					<div class="article-box">
						<div class="latest-area">
							<?php 
							if($_GET['post_format'] == "image"){
								get_template_part("template-parts/tag/tag-image-mobile");
							}elseif($_GET['post_format'] == "video"){
								get_template_part("template-parts/tag/tag-video-mobile");
							}else{
								get_template_part("template-parts/tag/tag-all-mobile");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>