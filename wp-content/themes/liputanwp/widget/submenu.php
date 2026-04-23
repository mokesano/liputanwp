<?php
// Register widget
add_action('widgets_init', 'submenu_widget');
function submenu_widget() {
    register_widget( 'submenu' );
}


// Widget
class submenu extends WP_Widget {
    function submenu() {
        $widget_ops = array('classname' => 'submenu');
        $this->WP_Widget('submenu', 'Sub Menu', $widget_ops);
    }

    function widget($args, $instance) {
    ?>
    <?php if(!empty($instance['nav_menu'])): ?>
        <?php if(!empty($instance['category']) && $instance['category'] != "-1"): ?>
            <?php 
            if(is_category($instance['category'])): ?>
                <div class="nav-submenu">
                    <div class="submenu-conteiner">
                        <div class="nav-title">
                            <a href="<?php echo get_category_link( get_cat_ID( $instance['category'] )); ?>"><img src="<?php echo esc_url($instance['image_uri']); ?>" /><span><?php echo $instance['title']; ?></span>
                            </a>
                        </div>
                        <div class="submenu">
                            <?php 
                            $nav_menu = !empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
                            if ( ! $nav_menu ) {
                                return;
                            }
                            $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
                            $format = apply_filters( 'navigation_widgets_format', $format );
                    
                            if ( 'html5' === $format ) {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            } else {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            }
                            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if(is_single()):
                if($instance['category'] == slugcategory()): ?>
                <div class="nav-submenu">
                    <div class="submenu-conteiner">
                        <div class="nav-title">
                            <a href="<?php echo get_category_link( get_cat_ID( $instance['category'] )); ?>"><img src="<?php echo esc_url($instance['image_uri']); ?>" /><span><?php echo $instance['title']; ?></span>
                            </a>
                        </div>
                        <div class="submenu">
                            <?php 
                            $nav_menu = !empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
                            if ( ! $nav_menu ) {
                                return;
                            }
                            $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
                            $format = apply_filters( 'navigation_widgets_format', $format );
                    
                            if ( 'html5' === $format ) {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            } else {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            }
                            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
                            ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <?php if(is_home()): ?>
                <div class="nav-submenu">
                    <div class="submenu-conteiner">
                        <div class="nav-title">
                            <a href="<?php echo home_url("/"); ?>"><img src="<?php echo esc_url($instance['image_uri']); ?>" /><span><?php echo $instance['title']; ?></span>
                            </a>
                        </div>
                        <div class="submenu">
                            <?php 
                            $nav_menu = !empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
                            if ( ! $nav_menu ) {
                                return;
                            }
                            $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
                            $format = apply_filters( 'navigation_widgets_format', $format );
                    
                            if ( 'html5' === $format ) {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            } else {
                                $nav_menu_args = array(
                                    'fallback_cb'          => '',
                                    'menu'                 => $nav_menu,
                                    'container'            => 'nav',
                                    'container_aria_label' => $aria_label,
                                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                );
                            }
                            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
        }
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        if ( ! empty( $new_instance['category'] ) ) {
            $instance['category'] = sanitize_text_field( $new_instance['category'] );
        }
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args( (array) $instance, $defaults ); 
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
        $category = isset( $instance['category'] ) ? $instance['category'] : '-1';
        $menus = wp_get_nav_menus();

        $empty_menus_style     = '';
        $not_empty_menus_style = '';
        if ( empty( $menus ) ) {
            $empty_menus_style = ' style="display:none" ';
        } else {
            $not_empty_menus_style = ' style="display:none" ';
        }

        $nav_menu_style = '';
        if ( ! $nav_menu ) {
            $nav_menu_style = 'display: none;';
        }
?>


        <p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
            <?php
            if ( $wp_customize instanceof WP_Customize_Manager ) {
                $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
            } else {
                $url = admin_url( 'nav-menus.php' );
            }

            /* translators: %s: URL to create a new menu. */
            printf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
            ?>
        </p>
        <div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
                <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
                <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
                <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
                    <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                    <?php foreach ( $menus as $menu ) : ?>
                        <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                            <?php echo esc_html( $menu->name ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
                <p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
                    <button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
                </p>
            <?php endif; ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Tampil dikategori :'; ?></label>
                <select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;" required>
                    <option <?php selected( $instance['category'], "-1" ); ?> value="-1">Pilih Kategori</option>
                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                        <option <?php selected( $instance['category'], $term->slug ); ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>      
                </select>
            </p>
        </div>
<?php
    }
}
