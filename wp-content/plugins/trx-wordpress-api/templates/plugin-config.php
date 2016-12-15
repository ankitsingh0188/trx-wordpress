<div class="container">
    <h3>TRX Configuration</h3>
    <form class="form-horizontal" method="POST" action="<?php print plugin_dir_url(__FILE__).'trx-api-config.php'; ?>">
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