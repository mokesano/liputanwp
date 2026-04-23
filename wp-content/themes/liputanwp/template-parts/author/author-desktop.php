<?php get_template_part("template-parts/author/author-header"); ?>
<div class="main">
	<div class="main-container">
		<div class="article-row">
			<div class="article">
				<div class="article-wrapper">
					<div class="article-box">
						<div class="latest-area">
							<?php 
							if($_GET['post_format'] == "image"){
								get_template_part("template-parts/author/author-image");
							}elseif($_GET['author'] == "bio"){
								get_template_part("template-parts/author/author-bio");
							}elseif($_GET['post_format'] == "video"){
								get_template_part("template-parts/author/author-video");
							}else{
								get_template_part("template-parts/author/author-all");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>