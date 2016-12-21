<?php
/**
* Plugin Name: Wordpress TRX API Plugin
* Description: A custom plugin to fetch the data from the TRX API's.
* Version: 1.0
* Author: Ankit Singh
**/

// Authorization Token.
define('trx_auth_token', get_option('trx_auth_token'));
// TRX API URL.
define('trx_api_url', get_option('trx_api_url'));
// TRX API Prefix.
define('trx_api_prefix', get_option('trx_api_prefix'));
// TRX Jurisdiction URL.
define('trx_jurisdiction_url', get_option('trx_jurisdiction_url'));
// TRX Route.
define('trxcommerce_route', get_option('trxcommerce_route'));
// Blog page id.
define('blog_page_id', get_option('blog_page_id'));
// Home page id.
define('home_page_id', get_option('home_page_id'));

// Marion County Quote Action.
define('trxcommerce_marioncounty_quote_action', get_option('trxcommerce_marioncounty_quote_action'));
// Marion County Product Id.
define('trxcommerce_marioncounty_product_id', get_option('trxcommerce_marioncounty_product_id'));

// 341 Meetings Quote Action.
define('trxcommerce_341meetings_quote_action', get_option('trxcommerce_341meetings_quote_action'));
// 341 Meeting Product Id.
define('trxcommerce_341meetings_product_id', get_option('trxcommerce_341meetings_product_id'));

// Default Quote Action.
define('trxcommerce_default_quote_action', get_option('trxcommerce_default_quote_action'));
// Default Product Id.
define('trxcommerce_default_product_id', get_option('trxcommerce_default_product_id'));

// Check whether  session id is set or not.
if(!session_id()) {
  session_start();
}
// Use Guzzle Http Client for API.
use GuzzleHttp\Client;

// File for home page content.
include 'templates/blog-template.php';
include 'trx-homepage-api.php';


// Function will call when you activate the plugin.
function trx_api_activate() {
  trx_api_rules();
  flush_rewrite_rules();
}

// Function will call when you deactivate the plugin.
function trx_api_deactivate() {
  flush_rewrite_rules();
}

// Function to rewrite the rules.
function trx_api_rules() {
  add_rewrite_rule('listings/[^/]*', 'index.php?pagename=listings-court', 'top');
}

// Function for custom pages display
function trx_api_display() {
  $listings_page = get_query_var('pagename');
  if ($listings_page == 'listings-court'):
    include 'templates/listing-template.php';
    $trx = trx_get_details();
    return $trx;
    exit;
  endif;
}

add_action( 'admin_menu', 'trx_api_menu' );
function trx_api_menu() {
  add_options_page( 'TRX API Options', 'TRX API', 'manage_options', 'trx-configurations', 'trx_api_options' );
}

function trx_api_options() {
  /** Load the bootstrap css */
  wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  include 'templates/plugin-config.php';
}
 
 //register plugin custom pages display
 add_filter('template_redirect', 'trx_api_display');
 //register activation function
 register_activation_hook(__FILE__, 'trx_api_activate');
 //register deactivation function
 register_deactivation_hook(__FILE__, 'trx_api_deactivate');
 //add rewrite rules in case another plugin flushes rules
 add_action('init', 'trx_api_rules'); 
?>