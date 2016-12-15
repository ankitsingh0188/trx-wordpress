<?php

function trx_homepage()  {
  // Check whether current page is homepage.
  if(is_front_page()) {
    include_once 'vendor/autoload.php';
    wp_enqueue_style( 'home-css', plugin_dir_url(__FILE__) .'css/home.css');
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    $check_auth_token = get_option('trx_auth_token');
    $client = new GuzzleHttp\Client(['headers' => [
      'Authorization' => 'Bearer ' .$check_auth_token,
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
    ]]);
    $request = $client->get('http://devrevolution.trxchange.net/api/v1/jurisdictions?limit=3&postal_code=' . $_SESSION['postal_code']);
    try {
      $response = json_decode($request->getBody()->getContents(),TRUE);
    } catch (Exception $e) {
      status_header(404);
      return get_template_part(404);
      exit();
    }
    $post_id = get_the_ID();
    if($post_id == 207) {
      $html_columns = '';
      foreach ($response as $thumb) {
        $html_columns .= '<div class="col-md-4"><div class="thumbnail"><img src="'. $thumb['image'] . '" alt="test-img"><div class="caption"><h3>Thumbnail label</h3><p>Lorem Ipsum</p><p><a href="#" class="btn btn-primary" role="button">Button</a></p></div></div></div>';
      }
      $new_post = array(
        'post_content'=>'<div class="row">' . $html_columns . '</div>'
      );
      wp_update_post($new_post);
    }
  }
}
add_action( 'wp', 'trx_homepage');
