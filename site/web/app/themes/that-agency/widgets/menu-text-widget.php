<?php
// Register and load the widget
function wpb_menu_text_widget() {
    register_widget( 'wp_menu_text_widget' );
}

add_action( 'widgets_init', 'wpb_menu_text_widget' );

// Creating the widget
class wp_menu_text_widget extends WP_Widget {


function __construct() {
parent::__construct('wp_menu_text_widget',__('Menu Text', 'wpb_widget_domain'),
      array( 'description' => __( 'Menu Text', 'wpb_widget_domain' ), ));
}

// Creating widget front-end

public function widget( $args, $instance ){

  $title = $instance['title'];
  $text = $instance['text'];

  //Get the steps..
  $box = get_field('menu_text_decription', 'widget_' . $args['widget_id']); 
  $widget_id = $args['widget_id'];
  echo  '<div class="below-text" id='.$widget_id.'>';
    echo $box;
    echo '</div>';
}


// Widget Backend
public function form( $instance ) {

$title   =  isset( $instance['title'] ) ? $instance['title'] : '';
$text   =  isset( $instance['text'] ) ? $instance['text'] : '';

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<input class="widefat" placeholder="Text" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text); ?>" />
</p>

<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? ( $new_instance['text'] ) : '';
return $instance;

}

} // Class wp_menu_text_widget ends here
