<?php

function knaeckebrot_menus() {
    register_nav_menus( array(
        'main-menu' => esc_html__( 'Main Menu', 'knaeckebrot' ),
        ) );
}
add_action( 'init', 'knaeckebrot_menus' );