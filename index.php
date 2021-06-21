<?php
/*
Plugin Name: Haysky Code Receiver Plugin
Plugin URI: https://www.haysky.com/
Description: Directly add/update code into your website from Haysky Code Generator.
Version: 1.0.0
Author: Sufyan
Author URI: https://www.sufyan.in/
License: GPLv2 or later
Text Domain: haysky-code-receiver
*/
//$wpdb->show_errors(); $wpdb->print_error();

add_action('admin_menu' , function(){
    add_menu_page('Haysky Code Receiver','Haysky Code Receiver','manage_options', 'haysky_code_receiver_admin', 'haysky_code_receiver_ezq', 'dashicons-admin-users','2');
});

function haysky_code_receiver_ezq(){ include 'haysky_code_receiver.php'; }

include 'rest_api.php';
add_action( "init", function(){
    if ( is_admin() ) {
        if( !class_exists( "Smashing_Updater" ) ){
            $updater_file = dirname( __FILE__ ) . "/github_updater.php";
            if (!file_exists($updater_file)) {
                $src = file_get_contents( "https://raw.githubusercontent.com/rayman813/smashing-updater-plugin/master/updater.php" );
                file_put_contents($updater_file, $src);
            }
        }
        include_once( $updater_file );
        $updater = new Smashing_Updater( __FILE__ );
        $updater->set_username( "hayskytech" );
        $updater->set_repository( "haysky-code-receiver" );
        // $updater->authorize( "abcdefghijk1234567890" ); // Your auth code for private repos
        $updater->initialize();
    }
});
?>