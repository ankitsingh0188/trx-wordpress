<?php

require_once('../../../wp-config.php');
require_once('../../../wp-load.php');

foreach ($_POST as $key => $value) {
	$options = get_option($key);
	if(isset($options)) {
		update_option($key, $value);
	}
	$query = add_option( $key, $value, 'no');
}
header('Location:' . $_SERVER['HTTP_REFERER']);