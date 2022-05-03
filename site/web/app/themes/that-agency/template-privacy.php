<?php 
/*
Template Name: Privacy Policy
*/
get_header() ?>
    
    <?php 
		$below_header_image = get_field('below_top_image_content');
		if (!empty($below_header_image)) { ?>
			<div class="col-12 col-md-10 col-lg-10 red-gradient" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1500">
				<div class="red-gradient-text container"><div class="col-md-8 col-lg-8 col-12"><?php echo $below_header_image; ?></div></div>
			</div>
    <?php } ?>
    
    <?php if ( have_rows( 'about_page_sections' ) ): ?>
        <section id="our-vision">
            <?php while ( have_rows( 'about_page_sections' ) ) : the_row(); ?>
                <?php if ( get_row_layout() == 'flexible_content' ) : ?>
                    <?php if ( have_rows( 'section_one' ) ) : ?>
                        <?php while ( have_rows( 'section_one' ) ) : the_row(); ?>
                        <div class="cont-grey">
                            <div class="container">   
                                <div class="row">
                                    <div class="col-md-6 ab-pad">
                                        <p><?php echo the_sub_field( 'our_vision_description' ); ?></p>
                                    </div>
                                    <div class="col-md-6 ab-pad" data-aos="fade-left" data-aos-mirror="true" data-aos-duration="1000">
                                        <?php 
                                            $image = get_sub_field('our_vision_image');
                                            if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php // no rows found ?>
                    <?php endif; ?>
                    <?php if ( have_rows( 'section_two' ) ) : ?>
                        <?php while ( have_rows( 'section_two' ) ) : the_row(); ?>
                        <div class="our-vision2" class="conatainer-fluid">
                            <div class="row">
                                <?php 
                                $image = get_sub_field('our_vision-two_image');
                                    if( !empty( $image ) ): ?>
                             
                                <div class="col-md-6 no-pink" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1000" style="<?php echo 'background:url('.esc_url($image['url']).') no-repeat top center;' ?> background-size: cover;">
                     
                                </div>
                                <?php endif; ?>
                                <div class="col-md-6 pink-bg">
                                    <div class="pink-description"><?php echo the_sub_field( 'our_vision-two_description' ); ?></div>
                                </div>
                            </div>  
                        </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <?php // no rows found ?>
                    <?php endif; ?> 
                <?php endif; ?>
            <?php endwhile; ?>
            <?php else: ?>
            <?php // no layouts found ?>
        </section>
    <?php endif; ?>
    <section class="privacy-section container">
        <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <div class="col-12"><?php the_content(); ?></div>
	    <?php endwhile; else: ?>
	<?php endif; ?>
	</div>
    </section>

<?php get_footer() ?>