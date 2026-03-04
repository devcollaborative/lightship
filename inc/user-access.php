<?php
/**
 * Customizes menus or access by user role
 *
 * Assigns Editors these capabilities:
 * - edit_theme_options: access to everything in Appearance menu, including Menus
 * - manage_options: access to everything under Settings and Tools
 * 
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */

/**
 * Give Editors extra capabilities
 * Allows access to Appearance, Settings, Tools menus
 */
function lightship_editor_custom_roles(){

	// get the the role object
	$role_object = get_role( 'editor' );
	
	$custom_editor_roles = array('edit_theme_options', 'manage_options');

	foreach ( $custom_editor_roles as $index => $value ){
		if ( !$role_object->has_cap( $value ) ){
			// add capability to this role object
			$role_object->add_cap( $value );	
		}
	}
}
add_action( 'admin_init', 'lightship_editor_custom_roles');

/**
 * Redirection Plugin - give Editor access
 */
function lightship_redirection_to_editor() {
    return 'edit_pages';
}
add_filter( 'redirection_role', 'lightship_redirection_to_editor' );

/**
 * Customize the Admin Panel left menu
 * */
function lightship_admin_menu(){ 

	global $submenu; 

	$user = wp_get_current_user(); 
	$roles = (array) $user->roles; 

	//hide certain pages from non-Admins
	if( ! in_array('administrator',$roles) ){
    
		/**
		 * Appearance Menu
		 * Remove access to everything except Menus
		 **/	
        if ( isset( $submenu[ 'themes.php' ] ) ) {
		    foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
				if ( 
			    		(strpos($menu_item[0],'Menus') === false) 
		    		){
		    		unset( $submenu[ 'themes.php' ][ $index ] );
		    	}
			}
		}		
		
		/**
		 * Tools menu
		 * Remove everything except Redirection
		 * */
        if ( isset( $submenu[ 'tools.php' ] ) ) {
		    foreach ( $submenu[ 'tools.php' ] as $index => $menu_item ) {
				if ( 
			    		(strpos($menu_item[0],'Redirection') === false) 
		    		){
		    		unset( $submenu[ 'tools.php' ][ $index ] );
		    	}
			}
		}

		/**
		 * Settings menu
		 * Remove everything except Pantheon Page Cache 
		 * */
        if ( isset( $submenu[ 'options-general.php' ] ) ) {
		    foreach ( $submenu[ 'options-general.php' ] as $index => $menu_item ) {
				if ( 
			    		(strpos($menu_item[0],'Pantheon Page Cache') === false) 
		    		){
		    		unset( $submenu[ 'options-general.php' ][ $index ] );
		    	}
			}
		}

		/**
		 * WP Mail SMTP
		 */
		remove_menu_page( 'wp-mail-smtp' );

		/**
		 * Smush
		 */
		remove_menu_page( 'smush' );     

		/**
		 * Yoast SEO settings
		 */
		remove_menu_page('wpseo_workouts');
		
    }

}
add_action('admin_menu', 'lightship_admin_menu', 999);

/**
* Editor has "manage_options" capability
* So programatically hide ACF menu from editors
* */
function lightship_hide_acf(){
	// get the current user	
	$user = wp_get_current_user(); 
	$roles = (array) $user->roles; 

	//hide certain pages from non-Admins
	if( in_array('administrator',$roles) ){
        return true;
    } else {
        return false;
    }
}
add_filter('acf/settings/show_admin', 'lightship_hide_acf');