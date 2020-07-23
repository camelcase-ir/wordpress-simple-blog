<?php
add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {
    register_sidebar(
        array(
            'id' => 'blog_sidebar',
            'name' => __( 'سایدبار وبلاگ' ),
            'description' => __( 'منوی کناری صفحه اصلی و صفحه خواندن نوشته ها' ),
            'before_widget' => '<div id="%1$s" class="main-widget-item %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="main-widget-item-title">',
            'after_title' => '</p>'
        )
    );
    register_sidebar(
        array(
            'id' => 'footer_sidebar',
            'name' => __( 'سایدبار فوتر' ),
            'description' => __( 'بخش پایینی سایت' ),
            'before_widget' => '<div class="footer-widget-box col-md-3 float-right">',
            'after_widget' => '</div>',
            'before_title' => '<p class="footer-widget-box-title">',
            'after_title' => '</p>'
        )
    );
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'منوی اصلی' ));
}
add_action( 'init', 'register_my_menu' );

function setup_theme_admin_menus() {
    add_submenu_page('themes.php', 
        'Front Page Elements', 'تنظیمات قالب', 'manage_options', 
        'theme-setting', 'theme_front_page_settings'); 
}

function add_menu_link_class($ulclass) {
  return preg_replace('/<a /', '<a class="nav-link text-dark"', $ulclass);
}
function add_menu_li_class($ulclass) {
  return preg_replace('/<li /', '<li class="nav-item"', $ulclass);
}
add_filter('wp_nav_menu','add_menu_link_class');
add_filter('wp_nav_menu','add_menu_li_class');

function theme_front_page_settings() {
    if (!current_user_can('manage_options')) {
        wp_die('شما دسترسی های لازم به این صفحه را ندارید.');
    }

    if (isset($_POST["update_settings"])) {
        $mobile_input = esc_attr($_POST["mobile_input"]);
        $email_input = esc_attr($_POST["email_input"]);
        $cover_input = esc_attr($_POST["cover_input"]);
        $font_input = esc_attr($_POST["font_input"]);
        $color_input = esc_attr($_POST["color_input"]);
        $copyright_input = esc_attr($_POST["copyright_input"]);

        if(empty($mobile_input) || empty($email_input) || empty($cover_input) || empty($font_input) || empty($color_input) || empty($copyright_input) || !is_numeric($font_input)) {
            $amirBlog_message = '<p style="color:red">مقادیر ورودی فیلدها را بررسی کنید.</p>';
        } else {
            update_option("amirBlog_mobile_input", $mobile_input);
            update_option("amirBlog_email_input", $email_input);
            update_option("amirBlog_cover_input", $cover_input);
            update_option("amirBlog_font_input", $font_input);
            update_option("amirBlog_color_input", $color_input);
            update_option("amirBlog_copyright_input", $copyright_input);

            $amirBlog_message = '<p style="color:green">تغییرات با موفقیت ذخیره شد.</p>';
        }
    }
    else
        $amirBlog_message = '';

    $mobile_input_value = get_option("amirBlog_mobile_input");
    $email_input_value = get_option("amirBlog_email_input");
    $cover_input_value = get_option("amirBlog_cover_input");
    $font_input_value = get_option("amirBlog_font_input");
    $color_input_value = get_option("amirBlog_color_input");
    $copyright_input_value = get_option("amirBlog_copyright_input");

    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/fonts/vazir/vazir.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/admin.css" />
        <div class="theme-setting">
            <h3>تنظیمات قالب</h3>
            <form method="POST" action="">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">
                            <label for="mobile_input">
                                شماره تلفن
                            </label>
                        </th>
                        <td>
                            <input required value="<?php echo $mobile_input_value; ?>" type="text" name="mobile_input" id="mobile_input" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="email_input">
                                ایمیل
                            </label>
                        </th>
                        <td>
                            <input style="text-align:left; direction:ltr; font-family:tahoma;" required value="<?php echo $email_input_value; ?>" type="text" name="email_input" id="email_input" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="cover_input">
                                عکس کاور
                            </label>
                        </th>
                        <td>
                            <input style="text-align:left; direction:ltr; font-family:tahoma;" required value="<?php echo $cover_input_value; ?>" type="text" name="cover_input" id="cover_input" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="color_input">
                                رنگ قالب
                            </label>
                        </th>
                        <td>
                            <input required value="<?php echo $color_input_value; ?>" type="color" name="color_input" id="color_input" /> <br />
                            <p><strong>رنگ فعلی : </strong> <?php echo "<span style='color:" . $color_input_value . "'>" . $color_input_value . "</span>"; ?></p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="copyright_input">
                                کپی رایت
                            </label>
                        </th>
                        <td>
                            <input required value="<?php echo $copyright_input_value; ?>" type="text" name="copyright_input" id="copyright_input" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <label for="">
                                فونت
                            </label>
                        </th>
                        <td>
                            <select name="font_input">
                                <option value="1" <?php if($font_input_value == 1) echo "selected" ?>>وزیر</option>
                                <option value="2" <?php if($font_input_value == 2) echo "selected" ?>>شبنم</option>
                                <option value="3" <?php if($font_input_value == 3) echo "selected" ?>>صمیم</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br />
                <input type="hidden" name="update_settings" value="Y" />
                <input type="submit" name="submit" value="ثبت تنظیمات قالب" />
                <div class="clearfix"></div>
                <?php
                    if(!empty($amirBlog_message))
                        echo $amirBlog_message;
                ?>
            </form>

        </div>
    <?php
}

add_action("admin_menu", "setup_theme_admin_menus");

add_theme_support( 'post-thumbnails' );

function my_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="pagination nav"><ul class="navbar" style="list-syle:none;">' . "\n";
    if ( get_previous_posts_link() )
        printf( '<li class="btn btn-primary text-light">%s</li>' . "\n", get_previous_posts_link() );
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s class="nav-item"><a class="btn btn-primary" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s class="nav-item"><a class="btn btn-primary" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="nav-item btn btn-primary">…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s class="nav-item"><a class="btn btn-primary" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    if ( get_next_posts_link() )
        printf( '<li class="btn btn-primary text-light">%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";
}

?>