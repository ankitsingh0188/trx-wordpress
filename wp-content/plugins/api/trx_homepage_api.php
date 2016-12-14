<?php

function trx_homepage()  {
  if(is_front_page()) {
    print 'Session ' . $_SESSION['postal_code'] . ' ============== Cookie ' . $_COOKIE['postal_code'];
    die;
  }
}

add_action( 'wp', 'trx_homepage');
