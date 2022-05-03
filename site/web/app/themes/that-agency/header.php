<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta property="og:<?php wp_title(); ?>" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
<meta property="og:image" content="<?php bloginfo('html_type'); ?>"/>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<section id="header">
		<div class="logo-menu-holder">
			<div class="container">
				<div class="header-logo col-12">
					<?php if (is_page() && !is_page_template('job-vacancies.php')) { ?>
						<?php if ( is_active_sidebar( 'website-logo' ) ) : ?>
							<a href="<?php bloginfo('url') ?>"><?php dynamic_sidebar( 'website-logo' ); ?></a>
						<?php endif; ?>
					<?php } else { ?>
						<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
							<a href="<?php bloginfo('url') ?>"><?php dynamic_sidebar( 'sidebar-9' ); ?></a>
						<?php endif; ?>
					<?php } ?>
				</div>
				<div class="header-menu icons">
	                <button class="menu-icon menu-icon--transparent animated rubberBand">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	            </div>
			</div>
			<div class="desktop-menu">
				<div class="main-menu">
					<?php dynamic_sidebar( 'header-menu' ); ?>
						<?php if ( is_active_sidebar( 'header-menu' ) ) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if (is_page() && !is_page_template('job-vacancies.php')) {
				if (has_post_thumbnail()) {
					$bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				} 
				else {
					$bg = '/app/uploads/2020/03/home-background.jpg';
				} 
		 	 ?>
			<div data-aos="zoom-out" data-aos-mirror="true" data-aos-duration="1500" class="front-background" style="<?php echo 'background-image:url('.$bg.')' ?>">
				<?php if (is_front_page()): 
				    $homesearch = get_field('home_search');
				    if( $homesearch == "Yes") { ?>
				    <div class="front-search">   
						<form role="search" action="/" method="get" id="searchform" data-aos="zoom-out" data-aos-mirror="true" data-aos-duration="1500">
						<input type="text" class="fr-first" name="s" placeholder="Search for jobs"/>
						<input type="submit" alt="Search" class="lnr lnr-magnifier" value="&#xe86f" />
						<input type="hidden" name="post_type" value="job" />
						</form>
					</div>
                <?php }
			 endif ?>	
					
				<div class="front-overlay"></div>	
			</div>
			<div class="container">
				<div class="col-md-6 col-12 col-lg-6 top-image-description" data-aos="fade-up" data-aos-delay="500" data-aos-mirror="true" data-aos-duration="2000">
					<?php echo get_field('top_image_description'); ?>
				</div>
			</div>
		<?php	} ?>
	</section>
	<div class="below-header container-fluid">
		<div class="row">