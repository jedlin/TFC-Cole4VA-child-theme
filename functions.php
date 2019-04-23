<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent','tfc-basic-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


// import Google Raleway font
function cole4va_add_google_fonts() {
	wp_enqueue_style( 'cole4va-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Open+Sans:400,400i,700,700i', false );
}

add_action( 'wp_enqueue_scripts', 'cole4va_add_google_fonts' );

// Dequeue TFC default fonts
function cole4va_dequeue_google_fonts_style() {
      wp_dequeue_style( 'tfc-basic-google-fonts' );
}
add_action( 'wp_print_styles', 'cole4va_dequeue_google_fonts_style', 100 );

// Make Donate menu button clickable
function cole4va__hook_javascript() {
	?>
	<script>
		$donate_button = (document.querySelector(".menu-donate-button"));
		$donate_link = (document.querySelector(".menu-donate-button a"));
		$donate_button.addEventListener("click", function(){
			$donate_link.click();
		}); 
	</script>
	<?php
	}
add_action('wp_footer', 'cole4va__hook_javascript');

