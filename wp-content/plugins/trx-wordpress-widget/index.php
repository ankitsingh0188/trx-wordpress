<?php 
/**
* Plugin Name: Wordpress TRX Widget Plugin
* Version: 1.0
* Author: Ankit Singh
**/

add_action( 'widgets_init', 'trx_WORDPRESS_Widget_init' );

function trx_WORDPRESS_Widget_init() {
  register_widget("trx_WORDPRESS_Widget");
}

class trx_WORDPRESS_Widget extends WP_Widget {

  public function __construct() {
    $widget_options = array( 
      'classname' => 'trx_WORDPRESS_widget',
      'description' => 'This is an TRX Wordpress Widget',
    );
    parent::__construct( 'trx_WORDPRESS_widget', 'TRX Wordpress Widget', $widget_options );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

    <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
    <p><strong>Tagline:</strong> <?php echo $tagline ?></p>

    <?php echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = !empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php 
  }
}
?>