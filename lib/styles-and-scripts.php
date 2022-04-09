<?php 

function knaeckebrot_assets() {
    wp_enqueue_style('knaeckebrot-stylesheet', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0', 'all');
    wp_enqueue_script( 'knaeckebrot-scripts', get_template_directory_uri() . '/dist/js/knaeckebrot.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'knaeckebrot_assets' );


// Admin styles
function knaeckebrot_admin_assets() {
    wp_enqueue_style( 'knaeckebrot-admin-stylesheet', get_template_directory_uri() . '/dist/css/admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'knaeckebrot-admin-scripts', get_template_directory_uri() . '/dist/js/admin.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'knaeckebrot_admin_assets' );

// Comment reply script
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}


function knaeckebrot_block_editor_styles() {
	wp_enqueue_style( 'knaeckebrot_block_editor_style', get_template_directory_uri() . '/dist/css/editor.css', false, '1.0.0' );
}
add_action( 'enqueue_block_editor_assets', 'knaeckebrot_block_editor_styles');


/* Deactivate Noto Serif */
function knaeckebrot_remove_gutenberg_styles($translation, $text, $context, $domain)
{
    if($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
        return $translation;
    }
    return 'off';
}
add_filter( 'gettext_with_context', 'knaeckebrot_remove_gutenberg_styles',10, 4);


// Don't load Gutenberg-related stylesheets.
function knaeckebrot_remove_block_css() {
    wp_dequeue_style( 'wp-block-library' ); // Wordpress core
    wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
}
add_action( 'wp_enqueue_scripts', 'knaeckebrot_remove_block_css', 100 );