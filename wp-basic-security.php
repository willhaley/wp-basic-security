<?php
/**
 * Plugin Name: The Fifth One:  Wordpress Basic Security
 * Plugin URI:  http://thefifthone.com
 * Description: This takes some very basic actions to make your WordPress site a little safer.
 * Version:     1.0.0
 * Author:      William haley
 * Author URI:  http://thefifthone.com
 * License:     MIT
 */



if ( ! class_exists( 'WP_Basic_Security' ) ) {

    class WP_Basic_Security {

        function __construct(){

            define( 'DISALLOW_FILE_EDIT', true );

            add_filter( 'login_errors',             array( $this, 'login_errors' ) );
            add_filter( "gform_admin_pre_render",   array( $this, 'gform_admin_pre_render' ) );
        }

        function login_errors(){

            return 'Incorrect Username / Password';

        }

        function gform_admin_pre_render( $form ){

            $form['enableHoneypot'] = 1;
            return $form;

        }

    }

}

$wp_basic_security = new WP_Basic_Security();