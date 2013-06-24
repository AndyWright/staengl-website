<?php
/* == custom styles for wysiwyg editor ========== */
add_editor_style('editor-style.css');


/* == make sure rss info is added to head ========== */
add_theme_support('automatic-feed-links');


/* == add WP 3.0 menu support ========== */
add_theme_support('menus');


/* == add thumbnail and featured image support ========== */
add_theme_support('post-thumbnails');


/* == remove admin bar ========== */
add_filter('show_admin_bar', '__return_false');


/* == Removes the default link on attachments  ========== */
update_option('image_default_link_type', 'none');


/* == Remove the version number of WP  ========== */
remove_action('wp_head', 'wp_generator');


/* == remove funky formatting caused by tinymce advanced ========== */
function fixtinymceadv($text)
{
    $text = str_replace('<p><br class="spacer_" /></p>','<br />',$text);
    return $text;
}
add_filter('the_content',  'fixtinymceadv');


/* == Obscure login screen error messages ========== */
function login_obscure()
{
    return '<strong>Sorry</strong>: Information that you have entered is incorrect.';
}
add_filter('login_errors', 'login_obscure');


/* == Queue up all css files ========== */
function boiler_styles()
{
    wp_enqueue_style('boiler-style', get_template_directory_uri() . '/css/app.css', false, null);
}
add_action('wp_enqueue_scripts', 'boiler_styles');

function foundation_zepto_or_jquery()
{
    $output = '';
    $output .= "<script>\n";
    $output .= "document.write('<script src=' +\n";
    $output .= "('__proto__' in {} ? '" . get_template_directory_uri() . "/js/vendor/zepto' : '" . get_template_directory_uri() . "/js/vendor/jquery') +\n";
    $output .= "'.js><\/script>')\n";
    $output .= "</script>\n";
    echo $output;
}
add_action('wp_footer', 'foundation_zepto_or_jquery');

/* == Deal with the js. we want most of it at the bottom ========== */
function boiler_js()
{
    // modernizr goes at the top, everything else at the bottom
    wp_enqueue_script('boiler-modernizr-js', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', null, null, false);

    // HINT: comment outt he ones you don't use
    wp_enqueue_script('boiler-theme-js', get_template_directory_uri() . '/js/foundation/foundation.js', null, null, true);
    wp_enqueue_script('boiler-alerts-js', get_template_directory_uri() . '/js/foundation/foundation.alerts.js', null, null, true);
    wp_enqueue_script('boiler-clearing-js', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', null, null, true);
    wp_enqueue_script('boiler-cookie-js', get_template_directory_uri() . '/js/foundation/foundation.cookie.js', null, null, true);
    wp_enqueue_script('boiler-dropdown-js', get_template_directory_uri() . '/js/foundation/foundation.dropdown.js', null, null, true);
    wp_enqueue_script('boiler-forms-js', get_template_directory_uri() . '/js/foundation/foundation.forms.js', null, null, true);
    wp_enqueue_script('boiler-interchange-js', get_template_directory_uri() . '/js/foundation/foundation.interchange.js', null, null, true);
    wp_enqueue_script('boiler-joyride-js', get_template_directory_uri() . '/js/foundation/foundation.joyride.js', null, null, true);
    wp_enqueue_script('boiler-magellan-js', get_template_directory_uri() . '/js/foundation/foundation.magellan.js', null, null, true);
    wp_enqueue_script('boiler-orbit-js', get_template_directory_uri() . '/js/foundation/foundation.orbit.js', null, null, true);
    wp_enqueue_script('boiler-placeholder-js', get_template_directory_uri() . '/js/foundation/foundation.placeholder.js', null, null, true);
    wp_enqueue_script('boiler-reveal-js', get_template_directory_uri() . '/js/foundation/foundation.reveal.js', null, null, true);
    wp_enqueue_script('boiler-section-js', get_template_directory_uri() . '/js/foundation/foundation.section.js', null, null, true);
    wp_enqueue_script('boiler-tooltips-js', get_template_directory_uri() . '/js/foundation/foundation.tooltips.js', null, null, true);
    wp_enqueue_script('boiler-topbar-js', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', null, null, true);
    wp_enqueue_script('boiler-theme-js', get_template_directory_uri() . '/js/theme.js', null, null, true);
    if (is_singular('post')){
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'boiler_js');


/* == adds iOS icons and favicon ========== */
function boiler_header_icons()
{
    $output = '';
    $output .= '<link rel="apple-touch-icon" sizes="144x144" href="' . get_template_directory_uri() . '/images/apple-touch-icon-144x144.png" />' . "\n";
    $output .= '<link rel="apple-touch-icon" sizes="114x114" href="' . get_template_directory_uri() . '/images/apple-touch-icon-114x114.png" />' . "\n";
    $output .= '<link rel="apple-touch-icon" sizes="72x72" href="' . get_template_directory_uri() . '/images/apple-touch-icon-72x72.png" />' . "\n";
    $output .= '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/images/apple-touch-icon-57x57.png" />' . "\n";
    $output .= '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.ico" />' . "\n";
    echo $output;
}
add_action('wp_head', 'boiler_header_icons');


/* == add additional options pages ========== */
// if (function_exists('register_options_page')) {
//     register_options_page('Options Page Name');
// }

function demo_image($image_root)
{
    echo get_template_directory_uri() . '/img/' . $image_root;
}

?>