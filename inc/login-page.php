<?php
/**
 * Customizes the WordPress login page.
 */

/**
 * Change login page header text.
 */
function lightship_login_headertext( $header_text ) {
  return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'lightship_login_headertext' );

/**
 * Link logo to the site's homepage.
 */
function lightship_login_headerurl( $login_header_url ) {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'lightship_login_headerurl' );

/**
 * Replace logo and add custom styles to login page.
 *
 * @link https://developer.wordpress.org/reference/hooks/login_head/
 */
function lightship_custom_login() {
?>
<style>
  .login h1 a {
    background-image: none, url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.svg');
    background-size: contain;
    height: 80px;
    width: 300px;
  }
</style>
<?php
}
add_action('login_head', 'lightship_custom_login');