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

include 'templates/blog-template.php';
include 'trx-homepage-api.php';

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

?>