<?php
/**
* The template for displaying the header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
wp_head();
?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <title>Basic Header</title>
    <link rel="stylesheet" href="/wp-content/themes/twentysixteen/css/header-user-dropdown.css">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <meta name="google-site-verification" content="S0fqGvGlhimDnsR5x0W1c3qOtU_Pb2JNCFnQDUVX_xg" />
    <?php //wp_head(); ?>
  </head>
  <body <?php body_class();?>>
    <div id="page" class="site">
      <header class="header-user-dropdown">
        <div class="header-limiter">
          <h1><a href="#">TRX<span>logo</span></a></h1>
          <nav>
            <a href="#">Overview</a>
            <a href="#">Surveys</a>
            <a href="#">Reports</a>
            <a href="#">Roles <span class="header-new-feature">new</span></a>
          </nav>
          <div class="header-user-menu">
            <img src="http://0.gravatar.com/avatar/c2b1d8b74ede1991d162bda95c8330df?s=26&d=mm&r=g" alt="User Image"/>
            <ul>
              <li><a href="#">Settings</a></li>
              <li><a href="#">Payments</a></li>
              <li><a href="#" class="highlight">Logout</a></li>
            </ul>
          </div>
        </div>
      </header>
      <div id="content" class="site-content">