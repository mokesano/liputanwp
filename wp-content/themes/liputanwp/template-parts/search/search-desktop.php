<div class="main">
	<div class="main-container">
		<div class="article-row">
			<div class="article">
				<div class="article-wrapper">
					<div class="article-box">
						<span class="search-results">Hasil pencarian <strong>"<span><?php the_search_query(); ?></span>"</strong></span>
						<div class="latest-area">
							<?php 
							if($_GET['post_format'] == "image"){
								get_template_part("template-parts/search/search-image");
							}elseif($_GET['post_format'] == "video"){
								get_template_part("template-parts/search/search-video");
							}else{
								get_template_part("template-parts/search/search-all");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>