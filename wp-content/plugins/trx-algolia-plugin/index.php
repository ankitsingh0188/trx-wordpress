<?php
/**
* Plugin Name: Wordpress TRX Algolia Plugin
* Version: 1.0
* Author: Ankit Singh
**/

function trx_algolia_search() {
  // Load the jQuery.
  wp_enqueue_script('jquery');
  wp_enqueue_script('trx-algolia1-js', 'https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js');
  wp_enqueue_script('trx-algolia2-js', 'https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js');
  wp_enqueue_script('trx-algolia3-js', 'http://devrevolution.trxchange.net/js/trx-algoliasearch.jquery.min.js');
  wp_enqueue_script('trx-algolia4-js', plugin_dir_url(__FILE__) .'js/search-init.js');
?>
  <div class="row"><form class="form-horizontal" method="POST" accept-charset="UTF-8"  id="search-form"><div class="form-group"><div class="col-sm-6"><input placeholder="Algolia Search" type="text" class="form-control enable-algoliasearch"></div></div><div  id="search-suggestions"></div></form></div>

<?php
}
// Create a shortcode for plugin.
add_shortcode( 'trx_algolia_search', 'trx_algolia_search');