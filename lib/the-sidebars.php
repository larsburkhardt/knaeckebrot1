<?php
/* Add widget support */
function knaeckebrot_widgets_init() {
    register_sidebar(array(
		'name'          => esc_html__( 'Main Sidebar', 'knaeckebrot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets for the Main Sidebar.', 'knaeckebrot' ),
		'before_sidebar' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_sidebar'	=> '</section>',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="sidebar-widget__title">',
		'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'knaeckebrot_widgets_init');