<?php 

    function knaeckebrot_theme_support() {
        add_theme_support( 'title-tag' );           // Title in Tab
        add_theme_support( 'post-thumbnails' );     // Thumbnails in Posts
        add_theme_support( 'html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption') );     // HTML5 for specific elements
        add_theme_support( 'editor-styles' );           // Gutenberg
        add_editor_style( 'dist/css/editor.css'); // Gutenberg css
        add_theme_support( 'align-wide');   // Gutenberg : Full width Images support
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-logo', array(    
            'width' => 240,
            'height' => 120,
            'flex-width' => true,
            'flex-height' => true
        ) ); 
        // add_theme_support( 'post-formats', array(
        //     'aside',
        //     'image',
        //     'video',
        //     'quote',
        //     'link',
        //     'audio'
        // ) );
    }
    add_action( 'after_setup_theme', 'knaeckebrot_theme_support' );

	
	// Custom color palette
function knaeckebrot_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Brown', 'wpdc' ),
				'slug'  => 'brown',
				'color' => '#3a3335',
			],
			[
				'name'  => esc_html__( 'Orange', 'wpdc' ),
				'slug'  => 'orange',
				'color' => '#f0544f',
			],
			[
				'name'  => esc_html__( 'Light Green', 'wpdc' ),
				'slug'  => 'light-green',
				'color' => '#c6d8d3',
			],

		]
	);
}
add_action( 'after_setup_theme', 'knaeckebrot_add_custom_gutenberg_color_palette' );


// Attention: Slug is part of class names for styles.css and editor-styles.css!
// Example:
/* 
.has-brown-background-color {
    background-color: #3a3335;
}

.has-brown-color {
    color: #3a3335;
}

.has-orange-background-color {
    background-color: #f0544f;
}

.has-orange-color {
    color: #f0544f;
}

.has-light-green-background-color {
    background-color: #c6d8d3;
}

.has-light-green-color {
    color: #c6d8d3;
}

 */
 
//Same for gradients:
function knaeckebrot_add_custom_gutenberg_gradient_presets() {
	add_theme_support(
		'editor-gradient-presets',
		[
			[
				'name' => esc_html__( 'Green to blue', 'knaeckebrot'),
				'gradient' => 'linear-gradient(135deg,rgb(0,250,56) 0%,rgb(0,27,255) 100%)',
				'slug' => 'green-to-blue'
			],
			[
				'name' => esc_html__( 'Red to yellow', 'knaeckebrot'),
				'gradient' => 'linear-gradient(115deg,rgb(250,0,0) 0%,rgb(255,225,0) 100%)',
				'slug' => 'red-to-yellow'
			],
		]
	);
}
add_action( 'after_setup_theme', 'knaeckebrot_add_custom_gutenberg_gradient_presets' );

// CSS for style.css and editor-styles.css:
/* .has-green-to-blue-gradient-background {
	background: linear-gradient(135deg,rgb(0,250,56) 0%,rgb(0,27,255) 100%);
}

.has-red-to-yellow-gradient-background {
	background: background:linear-gradient(115deg,rgb(250,0,0) 0%,rgb(255,225,0) 100%);
}
 */






















