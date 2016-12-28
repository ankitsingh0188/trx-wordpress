<?php

function trx_homepage()  {
  // Check whether current page is homepage.
  $frontpage_id = get_option('page_on_front');
  include_once ABSPATH . 'vendor/autoload.php';
  if(is_front_page()) {
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style( 'home-css', plugin_dir_url(__FILE__) .'css/home.css');

    // Load the jQuery.
    wp_enqueue_script('jquery');
    wp_enqueue_script('trx-algolia11-js', 'https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js');
    wp_enqueue_script('trx-algolia21-js', 'https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.jquery.min.js');
    wp_enqueue_script('trx-algolia31-js', 'http://devrevolution.trxchange.net/js/trx-algoliasearch.jquery.min.js');
    wp_enqueue_script('trx-algolia41-js', plugin_dir_url(__FILE__) .'../trx-algolia-plugin/js/search-init.js'); 

    if(isset($_COOKIE['postal_code'])) {
      $client = new GuzzleHttp\Client(['headers' => [
        'Authorization' => 'Bearer ' .trx_auth_token,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
      ]]);
      $request = $client->get(trx_api_url . '' . trx_api_prefix . 'jurisdictions?limit=6&distance=25&postal_code=' . $_COOKIE['postal_code']);
      try {
        $response = json_decode($request->getBody()->getContents(),TRUE);
      } catch (Exception $e) {
        status_header(404);
        return get_template_part(404);
        exit();
      }
      if($frontpage_id) {     
        $html_columns = '';
        foreach ($response as $thumb) {
          if(empty($thumb['image'])) {
            $thumb['image'] = plugin_dir_url(_FILE_) . 'trx-wordpress-api/images/default_listing_bg.png';
          }
          $html_columns .= '<div class="col-sm-4"><div class="panel panel-default"><img src="' . $thumb['image'] . '"><div class="panel-body text-center"><h3>' . $thumb['name'] . '</h3><a href="listings/'. $thumb['code'] . '" class="btn btn-primary" role="button">Order Transcript</a></p></div></div></div>';
        }
        $new_post = array(
          'post_content'=> '<h4>We see you are searching in: ' . $_SESSION['city'] . ', ' . $_SESSION['country_id'] . '</h4>[trx_algolia_search]<div class="row row-eq-height">' . $html_columns . '</div>',
        );
      }
      wp_update_post($new_post);  
    }
    else {
      $client_ip = $_SERVER['REMOTE_ADDR'];
      if($frontpage_id) {
        try {
          $client = new GuzzleHttp\Client(['headers' => [
            'Authorization' => 'Bearer ' .trx_auth_token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ]]);
          $request = $client->get(trx_api_url . '' . trx_api_prefix . 'jurisdictions?limit=6&distance=25&ip='.$client_ip);
          
            $response = json_decode($request->getBody()->getContents(),TRUE);
            $html_columns = '';
            foreach ($response as $thumb) {
              if(empty($thumb['image'])) {
                $thumb['image'] = plugin_dir_url(_FILE_) . 'trx-wordpress-api/images/default_listing_bg.png';
              }
              $html_columns .= '<div class="col-sm-4"><div class="panel panel-default"><img src="' . $thumb['image'] . '"><div class="panel-body text-center"><h3>' . $thumb['name'] . '</h3><a href="listings/'. $thumb['code'] . '" class="btn btn-primary" role="button">Order Transcript</a></p></div></div></div>';
          }
          $new_post = array(
            'post_content'=> '[trx_algolia_search]<div class="row">' . $html_columns . '</div>',
            );
          wp_update_post($new_post);  
        } catch (Exception $e) { }
      }
    }
  }
}
add_action( 'wp', 'trx_homepage');
