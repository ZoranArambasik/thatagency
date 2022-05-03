<?php
/*
Template Name: Our-Team
*/
 get_header() ?>

    <?php 
		$below_header_image = get_field('below_top_image_content');
		if (!empty($below_header_image)) { ?>
			<div class="col-12 col-md-10 col-lg-10 red-gradient" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1500">
				<div class="red-gradient-text container"><div class="col-md-8 col-lg-8 col-12"><?php echo $below_header_image; ?></div></div>
			</div>
    <?php } ?>

	<section id="theTeam">
        <div class="container team-main-title"><h2>Our Team</h2></div>
	    <?php $args = array( 'post_type' => 'our_team', 'posts_per_page' => 20 );
		$the_query = new WP_Query( $args ); 
		$i=0;
		$dropdown = ''; // prazen dropdown spremen za polnenje
		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
		<div class="container">
			<div class="target-<?php echo $post->ID ?> tabs col-6 p-4">
				<div class="row" data-aos="fade-up" data-aos-mirror="true" data-aos-duration="1500">
					<div class="col-md-3 fill-center">
						<img class="circleImg" src="<?php echo get_the_post_thumbnail_url(''); ?>" alt="team-person-image">
					</div>
					<div class="col-md-9 align-center">
						<div>
							<h2><?php echo get_the_title(); ?></h2>
							<p><?php echo get_field('position'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $content_get = apply_filters('the_content', $post->post_content); ?>
		<?php 
		if ($i > 0) {
			$dropdown .= // polnime dropdown
			'<div class="chposition-'.$i.' drobdownTeam target-'.$post->ID .'">
				<div class="container">
					<div class="row">
						<div class="col-md-6 swap-column-1">
							<h2>' . get_the_title() .'</h2>
							<p class="soc-l-tem"><a href="mailto: ' . get_field('social_link') .  '">' . get_field('social_link') . '</a></p>
							<p class="soc-l-linked"><a target="_blank" href=' . get_field('linkedin_url') .  '><i class="fab fa-linkedin"></i></a></p>
						</div>
						<div class="col-md-6 swap-column-2">
						
							<div class="d-t">' .  get_field('short_description_for_team_page') . '</div>
							<div class="view-full-bio"><a href=' . get_permalink() . '>View Full Bio</a></div>
						</div>
					</div>
					<div class="tabs-close tabs">X Close</div>
				</div>
			</div>';
		} else {
			$dropdown .= // polnime dropdown
			'<div class="chposition-'.$i.' drobdownTeam target-'.$post->ID .'">
				<div class="container">
					<div class="row">
						<div class="col-md-6 swap-column-2">
							<div class="d-t">' .  get_field('short_description_for_team_page') . '</div>
							<div class="view-full-bio"><a href=' . get_permalink() . '>View Full Bio</a></div>
						</div>
						<div class="col-md-6 swap-column-1">
							<h2>' . get_the_title() .'</h2>
							<p class="soc-l-tem"><a href="mailto: ' . get_field('social_link') .  '">' . get_field('social_link') . '</a></p>
							<p class="soc-l-linked"><a target="_blank" href=' . get_field('linkedin_url') .  '><i class="fab fa-linkedin"></i></a></p>
							
						</div>
					</div>
					<div class="tabs-close tabs">X Close</div>
				</div>
			</div>';
		}
        $i++;
        	if ($i % 2 == 0) { // ako imat paren broj postovi dodaj 2 dropdowni.
        		echo $dropdown;
     			$dropdown = ''; 
     			$i = 0; // resetiraj inkrement i pomini pak proverka.
        	}
    	endwhile; 
    	echo $dropdown; // vo sluchaj da e neparen brojot na postojte staj dropdown.

    endif; wp_reset_query(); ?>
		
	</section>

	
   
        <?php if ( have_rows( 'about_page_sections' ) ): ?>
		<section id="our-vision-team">
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

	<!-- TESTIMONIALS -->
	<section class="bg" id="testimonials" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1500">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 quotes">
	               	<?php $args = array( 'post_type' => 'testimonials', 'posts_per_page' => 20 );
	               	$the_query = new WP_Query( $args ); 
	               	if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
	       		    	<div class="testimonial-inner" >  
	       		    		<div class="testimonial-description"><?php the_content(); ?></div>
	       		            <p class="person-title"><?php the_title(); ?></p>
	       	                <p class="job-pos"><?php echo get_field('job_position'); ?></p>
	                   	</div>
		       		    <?php endwhile;
		       		    else: ?>
		       		    <div class="post">
		       		        <h2 class="posttitle"><?php _e('Not Found') ?></h2>
		       		        <div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
		       		    </div>
	               	<?php endif; wp_reset_query(); ?>
	            </div>
	        </div>
	    </div>
	    <img class="testim-img" src="/app/uploads/2020/03/testimonials.png" alt="Testimonial Image">
	</section>
	

<?php get_footer() ?>