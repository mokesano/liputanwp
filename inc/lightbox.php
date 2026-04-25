<?php 
function lightboximage($content) {
    global $post;
    $code = "";
    if ( true == get_theme_mod( 'tombolfacebook', true )) :
        $code .= '<a href="https://web.facebook.com/sharer/sharer.php?u=' . get_the_permalink(). '" class="btn-image-share facebook" target="_blank" rel="nofollow"><i class="icon-share i-gallery-facebook"></i></a>';
    endif;
    if ( true == get_theme_mod( 'tomboltwitter', true )) :
        $code .= '<a href="https://twitter.com/intent/tweet?text' . get_the_permalink(). '" class="btn-image-share twitter" target="_blank" rel="nofollow"><i class="icon-share i-gallery-twitter"></i></a>';
    endif;
    if ( true == get_theme_mod( 'tombolwhatsapp', true )) :
        $code .= '<a href="https://api.whatsapp.com/send/?text=' . get_the_permalink() . '" class="btn-share whatsapp" target="_blank" rel="nofollow"><i class="icon-share i-gallery-whatsapp"></i></a>';
    endif;
    if ( true == get_theme_mod( 'tombolemail', true )) :
        $code .= '<a href="mailto:?to=&subject=' . get_the_title(). '&body=' . get_the_permalink(). '" class="btn-image-share email" target="_blank" rel="nofollow"><i class="icon-share i-gallery-email"></i></a>';
    endif;
    if ( true == get_theme_mod( 'tombolcopylink', true )) :
        $code .= '<button class="btn-image-share copylink" data-url="' . get_the_permalink(). '"><i class="icon-share i-gallery-copy-link"></i></button>';
    endif;

    $pattern        = array('{<figure class="wp-block-image(.*?)"><img loading="(.*?)" width="(.*?)" height="(.*?)" src="(.*?)"(.*?) />}','{</figure>}');
    if (function_exists( 'is_amp_endpoint' ) && is_amp_endpoint()) {
    $replacement    = array('<figure class="wp-block-image$1"><div class="wp-image-box"><a data-fslightbox="gallery" href="$5"><div class="btn-viewbox"><button class="btn-biew"><i class="icon-expand"></i><span class="text-view">Perbesar</span></button>
        </div><img loading="$2" width="$3" height="$4" src="$5"$6/></a></div>','</figure>');
    }elseif (wp_is_mobile()) {
    $replacement    = array('<figure class="wp-block-image$1"><div class="wp-image-box"><a data-fslightbox="gallery" href="$5"><div class="btn-viewbox"><button class="btn-biew"><i class="icon-expand"></i><span class="text-view">Perbesar</span></button>
        </div><img loading="$2" width="$3" height="$4" src="$5"$6/></a></div>','</figure>');
    }else{
    $replacement    = array('<figure class="wp-block-image$1"><div class="wp-image-box"><a data-fslightbox="gallery" href="$5"><div class="btn-viewbox"><button class="btn-biew"><i class="icon-expand"></i><span class="text-view">Perbesar</span></button>
        </div><img loading="$2" width="$3" height="$4" src="$5"$6/></a></div><div class="image-share"> <button class="btn-plus"><i class="icon-share i-gallery-plus"></i></button><div class="imagebox-share">' . $code . '</div></div>','</figure>');
    }
    $content        = preg_replace($pattern,$replacement,$content);
    return $content;
 }
 add_filter('the_content','lightboximage');

function lightboxgallery($content) {
    global $post;
    $pattern        = array('{<figure class="(.*?)"><a href="(.*?)">}','{</a></figure>}');
    $replacement    = array('<div class="blocks-gallery-item"><figure><a data-fslightbox="gallery" href="$2">','</a></figure></div>');
    $content        = preg_replace($pattern,$replacement,$content);
    return $content;
}
add_filter('the_content','lightboxgallery');

function lightboxiframe($content) {
    global $post;
    $pattern        = array('{<iframe loading="(.*?)" title="(.*?)" width="(.*?)" height="(.*?)" src="(.*?)"(.*?)}','{</iframe>}');
    $replacement    = array('<a data-fslightbox="gallery" href="$5"><iframe loading="$1" title="$2" width="$3" height="$4" src="$5"$6','</iframe></a>');
    $content        = preg_replace($pattern,$replacement,$content);
    return $content;
 }
 add_filter('the_content','lightboxiframe');
 ?>