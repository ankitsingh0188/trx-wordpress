<?php
/*
Template Name: Sitemap
*/
/**
* The template for displaying pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that
* other "pages" on your WordPress site will use a different template.
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
get_header('trx-header'); ?>
<div id="main-content" class="main-content">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <h3>Pages</h3>
  <ul><?php wp_list_pages("title_li=" ); ?></ul>
</main><!-- .site-main -->
</div><!-- .content-area -->
</div><!-- .main-content -->
<?php get_sidebar('content-bottom'); ?>
<?php get_footer(); ?>