<?php
/**
* Plugin Name: Custom TRX API
* Description: A custom api to fetch the data from the TRX.
* Version: 1.0
* Author: Ankit Singh
**/
if(!session_id()) {
  session_start();
}
include('test.php');
include('trx_homepage_api.php');
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
  $trx_auth_token = get_option('trx_auth_token');
  $trx_api_url = get_option('trx_api_url');
  ?>
  <div class="container">
    <h3>TRX Configuration</h3>
    <form class="form-horizontal" method="POST" action="<?php print plugin_dir_url(__FILE__).'api-config.php'; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="TRX Auth Token">TRX Auth Token</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="TRX" name="trx_auth_token" placeholder="TRX Auth Token" value="<?php print $trx_auth_token; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Trx Api Url">TRX Api Url</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trx_api_url" name="trx_api_url" placeholder="Trx Api Url" value="<?php print $trx_api_url; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    </form>
  </div>

<?php } ?>