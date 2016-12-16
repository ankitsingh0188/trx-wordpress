<div class="container">
  <h3>TRX Configuration</h3>
  <form class="form-horizontal" method="POST" action="<?php print plugin_dir_url(__FILE__).'../trx-api-config.php'; ?>">
    <div class="form-group">
      <label class="control-label col-sm-3" for="TRX Auth Token">TRX Auth Token</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="TRX" name="trx_auth_token" placeholder="TRX Auth Token" value="<?php print trx_auth_token; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Trx Api Url">TRX Api Url</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trx_api_url" name="trx_api_url" placeholder="Trx Api Url" value="<?php print trx_api_url; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Route">TRX Commerce Route</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_route" name="trxcommerce_route" placeholder="Route" value="<?php print trxcommerce_route; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Marion County Product Id">Marion County Product Id</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_marioncounty_product_id" name="trxcommerce_marioncounty_product_id" placeholder="Marion County Product Id" value="<?php print trxcommerce_marioncounty_product_id; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="341 Meetings Product Id">341 Meetings Product Id</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_341meetings_product_id" name="trxcommerce_341meetings_product_id" placeholder="341 Meetings Product Id" value="<?php print trxcommerce_341meetings_product_id; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Default Product Id">Default Product Id</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_default_product_id" name="trxcommerce_default_product_id" placeholder="Default Product Id" value="<?php print trxcommerce_default_product_id; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Marion County Quote Action">Marion County Quote Action</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_marioncounty_quote_action" name="trxcommerce_marioncounty_quote_action" placeholder="Marion County Quote Action" value="<?php print trxcommerce_marioncounty_quote_action; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="341 Meetings Quote Action">341 Meetings Quote Action</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_341meetings_quote_action" name="trxcommerce_341meetings_quote_action" placeholder="341 Meetings Quote Action" value="<?php print trxcommerce_341meetings_quote_action; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="Default Quote Action">Default Quote Action</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="trxcommerce_default_quote_action" name="trxcommerce_default_quote_action" placeholder="Default Quote Action" value="<?php print trxcommerce_default_quote_action; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>