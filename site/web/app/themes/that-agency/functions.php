<?php
require get_template_directory() . '/widgets/menu-text-widget.php';
function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
}
 
add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );
// Register Custom Post Type

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', '' )
) );

function theme_name_setup() {
    add_theme_support( 'align-wide' );
}   
add_action( 'after_setup_theme', 'theme_name_setup' );

function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
    wp_enqueue_style( 'slick','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css' );
    // wp_enqueue_style( 'aos.css','https://unpkg.com/aos@2.3.1/dist/aos.css' );
}
 
function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    
    // wp_enqueue_script('animateimage', 'https://chaptr.studio/wp-content/themes/chaptr2019/library/js/min/app-min.js', array(), null, true);
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);
    wp_enqueue_script( 'slickjs', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery') );
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '4.4.1', true );
    //wp_enqueue_script( 'aos.js', 'https://unpkg.com/aos@next/dist/aos.js', array('jquery') );

}
function theme_name_script_enqueue() {
    wp_enqueue_style('linearicons', get_template_directory_uri() . '/bootstrap/css/linearicons.css' );
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom-style.css', array(), '1.0', 'all');
    wp_enqueue_style( 'aoscss', get_template_directory_uri() . '/dist/aos.css' );
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0', true);
    wp_enqueue_script('aosjs', get_template_directory_uri() . '/dist/aos.js', array(), '1.0', true);
    //wp_enqueue_script('slim', get_template_directory_uri() . '/js/slim.js', array(), '1.0', true);
    wp_enqueue_script('animateimage', get_template_directory_uri() . '/js/animateimage.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'theme_name_script_enqueue' );

add_action('init', 'my_custom_init');

function my_custom_init() {
  add_post_type_support( 'page', 'excerpt' );
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
function my_register_additional_customizer_settings( $wp_customize ) {
  $wp_customize->add_section('socialLinks' , array(
      'title' => 'Social links',
      'description' => 'Social links'
        ));
  

  //facebook setting
  $wp_customize->add_setting( 's_facebook', array(
              'default' => 'http://www.facebook.com'
          )
      );
  //facebook control
  $wp_customize->add_control('s_facebook', array(
          'title'      => 'FACEBOOK',
          'label'      => 'Facebook',
          'section'    => 'socialLinks',
          'settings'   => 's_facebook'
  ));	


  //instagram setting
  $wp_customize->add_setting( 's_instagram', array(
              'default' => 'http://www.instagram.com'
          )
      );
  //instagram control
  $wp_customize->add_control('s_instagram', array(
          'title'      => 'INSTAGRAM',
          'label'      => 'Instagram',
          'section'    => 'socialLinks',
          'settings'   => 's_instagram'
  ));	 

  //linked-in setting
  $wp_customize->add_setting( 's_linkedin', array(
              'default' => 'http://www.linkedin.com'
          )
      );
  //linked-in control
  $wp_customize->add_control('s_linkedin', array(
          'title'      => 'LINKEDIN',
          'label'      => 'LinkedIn',
          'section'    => 'socialLinks',
          'settings'   => 's_linkedin'
  ));	


  $wp_customize->add_section('contactInfo' , array(
      'title' => 'Contact',
      'description' => 'contactInfo'
        ));


  // Company Email
  $wp_customize->add_setting(
      'my_company_email',
      array(
          'default' => '',
          'type' => 'theme_mod', 
          'capability' => 'edit_theme_options'
      )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'my_company_email',
      array(
          'label'      => __( 'Company email', 'textdomain' ),
          'description' => __( '', 'textdomain' ),
          'settings'   => 'my_company_email',
          'priority'   => 10,
          'section'    => 'contactInfo',
          'type'       => 'email',
      )
  ) );

  // Company Address
  $wp_customize->add_setting(
      'my_company_address',
      array(
          'default' => '',
          'type' => 'theme_mod', 
          'capability' => 'edit_theme_options'
      )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'my_company_address',
      array(
          'label'      => __( 'Company address', 'textdomain' ),
          'description' => __( '', 'textdomain' ),
          'settings'   => 'my_company_address',
          'priority'   => 10,
          'section'    => 'contactInfo',
          'type'       => 'text',
      )
  ) );

  // Company phone number
  $wp_customize->add_setting(
      'my_company_phone_number',
      array(
          'default' => '',
          'type' => 'theme_mod', 
          'capability' => 'edit_theme_options'
      )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'my_company_phone_number',
      array(
          'label'      => __( 'Company Phone', 'textdomain' ),
          'description' => __( '', 'textdomain' ),
          'settings'   => 'my_company_phone_number',
          'priority'   => 10,
          'section'    => 'contactInfo',
          'type'       => 'text',
      )
  ) ); 
}
add_action( 'customize_register', 'my_register_additional_customizer_settings' );

add_theme_support( 'post-thumbnails' );
add_image_size( 'homepage_blog', 845, 600, array( 'left', 'top' ) );

register_sidebar( array(
        'id'          => 'website-logo',
        'name'        => 'Home Website Logo',
        'before_widget' => '<div class="website-logo">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'header-menu',
        'name'        => 'Header Menu Content',
        'before_widget' => '',
        'after_widget' => '',
    ) );
register_sidebar( array(
        'id'          => 'footer-instagram',
        'name'        => 'Footer Instagram',
        'before_widget' => '<div class="instagram-feed">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-focation',
        'name'        => 'Footer Location',
        'before_widget' => '<div class="col-12 col-md-6">',
        'after_widget' => '</div>',
    ) );
register_sidebar( array(
        'id'          => 'footer-menu',
        'name'        => 'Footer Menu',
        'before_widget' => '<div class="col-12 col-md-6">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
      'name'          => __( 'Footer-menu1', 'theme_name' ),
      'id'            => 'sidebar-3',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
  ));

  register_sidebar( array(
      'name'          => __( 'Footer-menu2', 'theme_name' ),
      'id'            => 'sidebar-4',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
  ));

  register_sidebar( array(
      'name'          => __( 'Footer-menu3', 'theme_name' ),
      'id'            => 'sidebar-5',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
  ));
  
  register_sidebar( array(
      'name'          => __( 'Footer-menu4', 'theme_name' ),
      'id'            => 'sidebar-6',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
  ));
  register_sidebar( array(
      'name'          => __( 'Footer-menu5', 'theme_name' ),
      'id'            => 'sidebar-7',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
));
 register_sidebar( array(
      'name'          => __( 'Footer-logo' ),
      'id'            => 'sidebar-8',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
    ));
 register_sidebar( array(
      'name'          => __( 'Blog-logo' ),
      'id'            => 'sidebar-9',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
    ));

function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'job' )   
  {
    return locate_template('job-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');

