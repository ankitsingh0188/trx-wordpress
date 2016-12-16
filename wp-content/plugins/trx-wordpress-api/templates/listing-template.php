<?php
/**
 * @return html format.
 */

function trx_get_details() {
  include_once 'vendor/autoload.php';
    // Create a guzzle client.
    $client = new GuzzleHttp\Client(['headers' => [
      'Authorization' => 'Bearer ' .trx_auth_token,
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
    ]]);
    // $request = $client->get("http://devrevolution.trxchange.net/api/v1/jurisdictions/?slug=third-circuit-court-6");
    $request = $client->get("http://devrevolution.trxchange.net/api/v1/jurisdictions/?slug=marion-county-superior-court-3");
    try {
      $response = json_decode($request->getBody()->getContents(),TRUE);
    } catch (Exception $e) {
      status_header(404);
      return get_template_part(404);
      exit();
    }
    // Load the jQuery.
    wp_enqueue_script('jquery');
    wp_enqueue_script('trx-api-js', plugin_dir_url(__FILE__) .'../js/trx-api.js');
    // Load the CSS.
    wp_enqueue_style( 'listing-css', plugin_dir_url(__FILE__) .'../css/listing.css');
    wp_enqueue_style( 'style-css', plugin_dir_url(__FILE__) .'../css/style.css');
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    $data = $response[0];
    $id = $data['id'];
    $court_name = $data['name'];
    $code = $data['code'];
    setcookie( 'postal_code', $data['postal_code'], 30 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
    $_SESSION['postal_code'] = $data['postal_code'];
    if(preg_match('/marion-county/',$code)) {
      $form_action = trxcommerce_marioncounty_quote_action;
      $product_id = trxcommerce_marioncounty_product_id;
    } 
    elseif (preg_match('/us-trustee/',$code)) {
      $form_action = trxcommerce_341meetings_quote_action;
      $product_id = trxcommerce_341meetings_product_id;
    }
    else {
      $form_action = trxcommerce_default_quote_action;
      $product_id = trxcommerce_default_product_id;
    }
  ?>

<!-- HTML for jurisdiction data -->
<div class="site">
<div class="site-inner">
<div class="site-content">
<ul class="breadcrumb">
<!--   <li><a href="http://revrad.trxchange.net/index.php?route=common/home"><i class="fa fa-home"></i></a></li> -->
  <li><?php echo "<a href='http://revrad.trxchange.net/index.php?route=listing/profile&listing_id=$id' target='_blank'> $court_name</a>";
?></li>
</ul>
<div class="row">
<div id="content" class="col-sm-12">
  <h1><?php print $data['name']; ?></h1>
  <div class="row">
    <div class="col-sm-6">
      <img src="https://placeholdit.imgix.net/~text?txtsize=38&txt=500%C3%97250&w=500&h=250">
      <h4>Details</h4>
      <table class="table">
        <tbody><tr>
          <td>Authority Level</td>
          <td><?php print $data['authority_level']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php print $data['address']; ?></td>
        </tr>
        <tr>
          <td>City</td>
          <td><?php print $data['city']; ?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php print $data['state']; ?></td>
        </tr>
        <tr>
          <td>Postal Code</td>
          <td><?php print $data['postal_code']; ?></td>
        </tr>
        <tr>
          <td>Website</td>
          <td><a href="<?php print $data['website']; ?>" target="_blank"><?php print $data['website']; ?></a></td>
        </tr>
        <tr>
          <td>Proceedings Capture Method</td>
          <td>
          </td>
        </tr>
        <tr>
          <td>Pricing</td>
          <td></td>
        </tr>
      </tbody></table>
      <h4>Presiding Officers</h4>
      <table class="table">
        <tbody>
          <?php foreach ($data['officers'] as $key => $value) { ?>
          <tr>
            <td width="25%"><?php print $value['name']; ?></td>
            <td>Case Type(s): <?php print $value['matter_type']; ?></td>
          </tr>
          <?php } ?>
        </tbody></table>
      </div>
      <div class="col-sm-6">
      <div id="product">
        <hr style="margin-top:-21px;padding:0;">
        <form action="<?php print $form_action; ?>" method="get" id="trx-wp-form">
          <input name="jurisdiction" value="<?php print $code; ?>" type="hidden">
          <input name="route" value="<?php print trxcommerce_route; ?>" type="hidden">
          <input name="product_id" value="<?php print $product_id; ?>" type="hidden">
          <div class="form-group">
            <h4>Presiding Officer</h4>
            <div class="form-group">
              <div class="form-group">
                <select name="officer" class="form-control officer_name" style="min-width:80%">
                <option value="" selected="selected">-- Select --</option>
                  <?php 
                  $officer = array();
                  foreach ($data['officers'] as $key => $value) { 
                    $officer = $value;
                    ?>
                  <option class="officer_order" data-order="<?php print $officer['order_method']; ?>" value="<?php print $officer['code']; ?>"><?php print $officer['name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <p class="officer-default"></p>
              <p>
                Before submitting a request for a quote, please select the matter's associated Presiding
                Officer from the list, or type their name in if not found. Leaving blank may delay quote.
              </p>
              <div class="form-group text-center">
                <button type="submit" id="button-cart" class="btn btn-primary btn-lg">GET A QUOTE</button>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <h4>Summary</h4>
        <p><?php print $data['description']; ?></p>
        <hr>
        <div class="row">
          <div class="col-sm-7">
            <div><a href=""></a></div>
            <div></div>
            <br>
            <div><a href=""></a></div>
            <div></div>            
            <br>        
           <!--  <a href=""><i style="font-size:2em" class="fa fa-print"></i></a>
            <a href=""><i style="font-size:2em" class="fa fa-file-pdf-o"></i></a>
            <a href=""><i style="font-size:2em" class="fa fa-archive"></i></a>
             -->
          </div>
          <div class="col-sm-5">
            <div class="panel panel-default">
              <div class="panel-heading" style="padding:10px">
                <div class="text-center">Viewers of this profile also viewed</div>
              </div>              
              <div class="panel-body">
                <a href=""></a>
                <p></p>
                <a href=""></a>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer starts. -->
<footer>
<div class="container">
<div class="row">
  <div class="col-sm-3">
    <h5>Information</h5>
    <ul class="list-unstyled">
      <li><a href="http://revrad.trxchange.net/about_us" style="font-size: 14px;" >About Us</a></li>
      <li><a href="http://revrad.trxchange.net/delivery" style="font-size: 14px;" >Delivery Information</a></li>
      <li><a href="http://revrad.trxchange.net/privacy" style="font-size: 14px;" >Privacy Policy</a></li>
      <li><a href="http://revrad.trxchange.net/terms" style="font-size: 14px;" >Terms &amp; Conditions</a></li>
    </ul>
  </div>
</div>
</div>
</footer>
<!-- Footer ends. -->
<?php 
}
// Create a shortcode for plugin.
add_shortcode( 'trx-get-details', 'trx_get_details' );
?>