<?php
/**
 * Plugin Name: Setup Relationships
 * Description: Pull field(s) of related posts from different post types
 * Version: 1.0
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'setup-relationships', 'setup_starter_relationships' );
function setup_starter_relationships( $atts ) {
	// $atts['foo'] -> get attribute contents

    // do not run in WP-Admin
    if( is_admin() ) return;

    // name of ACF field group (so this can easily be replaced)
    $relate = 'relationship';

    // validate template name (this should be without the extension name '.php')
    if( $atts[ 'template' ] ) {
    	$template = $atts[ 'template' ];
    } else {
    	// assign default output
    	$template = 'setup_starter_default';
    }

    // template directory
    $template_dir = plugin_dir_path( __FILE__ ).'templates/';

    // set global variable | this will be picked up by the template(s)
    global $pid;

    // validate if ACF plugin is installed and active
    if( ! class_exists('ACF') ) {

    	// Plugin not found
    	$out = 'Please install/actiave the required <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Advanced Custom Fields (ACF)</a> plugin.';

    } else {

	    // check if ACF field group required is present and active
	    if( ! setup_is_field_group_exists( $relate ) ) {

	    	// No required field group
	    	$out = '<p>Please create/active the ACF field group '.strtoupper( $relate ).' and follow the details based on the screenshot below</p>
	    			<p><a href="http://jakealmeda.com/images/acf-relationship-group.png" target="_blank">
	    					<img src="http://jakealmeda.com/images/acf-relationship-group-min.png" style="width:40%; height:auto;" />
	    			</a></p>
	    			<p style="color:#f00;"><strong>NOTE:</strong> please copy the <i><strong>field name</strong></i> and the <i><strong>Return Format</strong></i>.</p>';

	    } else {

			// get custom field
			$relations = get_post_meta( get_the_ID(), 'related', TRUE );

			// don't forget to declare the global variable which will be passed to the templates
			foreach( $relations as $pid ) {

				$out .= setup_starter_get_template( $template_dir, $template );

			}

	    }

	}

    return $out;

}

// validate if specific ACF field group RELATIONSHIP exists
if( !function_exists( 'setup_is_field_group_exists' ) ) {

	function setup_is_field_group_exists( $value, $type='post_title' ) {

	    $exists = false;

	    if( $field_groups = get_posts( array( 'post_type'=>'acf-field-group' ) ) ) {
	        
	        foreach( $field_groups as $field_group ) {
	            
	            if( strtolower( $field_group->$type ) == $value ) {
	                $exists = true;
	            }
	        
	        }

	    }

	    return $exists;

	}

}

// GET CONTENTS OF THE TEMPLATE FILE
if( !function_exists( 'setup_starter_get_template' ) ) {
    
    function setup_starter_get_template( $template_dir, $filename ) {
        
        ob_start();
        include $template_dir.$filename.'.php';
        return ob_get_clean();

    }
    
    //include get_stylesheet_directory().'/partials/setup_starter_templates/'.$filename.'.php';
    
}
