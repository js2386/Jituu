<?php
/**
 * Plugin Name:       Jituu
 * Description:      test plugin for Rankmath coding challenge
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            jiten
 * Text Domain:       jituu
 */

add_action( 'wp_dashboard_setup', 'register_jituu' );


function register_jituu() {
    wp_add_dashboard_widget( 'custom_dashboard_widget',
    'test widget by jiten',
     'jituu_widget_display'
);  
}

/**
 * Init widget.
 *
 * @return void
 */
function jituu_widget_display() {
    require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
}
add_action( 'admin_enqueue_scripts', 'jituu_admin_enqueue_scripts' );

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function jituu_admin_enqueue_scripts() {
    wp_enqueue_style( 'jituu-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
    wp_enqueue_script( 'jituu-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
}