<?php get_header(); ?>
<div class="front-page">

	<?php 
		$below_header_image = get_field('below_top_image_content');
		if (isset($below_header_image)) { ?>
			<div class="col-12 col-md-10 col-lg-10 red-gradient" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1500">
				<div class="red-gradient-text container"><div class="col-md-8 col-lg-8 col-12"><?php echo $below_header_image; ?></div></div>
			</div>
	<?php } ?>
	<!-- JOB 3 POSTS -->
	<section class="container job-home-posts" data-aos="fade-in" data-aos-mirror="true" data-aos-duration="2000">
		<div class="row">
		<?php $args = array( 'post_type' => 'job', 'posts_per_page' => 3 );
		$the_query = new WP_Query( $args ); 
		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
			    <div class="home-job col-lg-4 col-md-4 col-12"> 
		            <div class="home-job-image js-hero><a class="" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><figure class="image-container image-move preserve-aspect"><picture><?php the_post_thumbnail('homepage_blog'); ?></picture></figure></a></div>
			    	<div class="home-job-inner" >  
			            <h3 class="home-job-title"><?php the_title(); ?></h3>
		                <div class="job-desc">
		                	<?php echo get_field('job_description_for_home_page'); ?>	
	                	</div>
		                <div class="job-url">
		                	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Apply Now</a>
		                </div>
	                </div>
		        </div>     
			    <?php endwhile;
			    else: ?>
			    <div class="post">
			        <h2 class="posttitle"><?php _e('Not Found') ?></h2>
			        <div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
			    </div>
		<?php endif; wp_reset_query(); ?>	
			    
		</div>
	</section>
	<!-- SPECIALIZE SECTION -->
	<section class="container spezialize-section">
		<?php 
			$pageID = get_option('page_on_front');
		?>
		<h3 class="spec-main-title"><?php echo get_field('we_specialize_main_title', $pageID); ?></h3>
		<div class="row">
		<?php
			if( have_rows('we_specialize', $pageID) ): 
				while ( have_rows('we_specialize', $pageID) ) : the_row(); ?>
			      	<div data-aos="fade-up" data-aos-mirror="true" data-aos-duration="1500" class="inner-specialize col-lg-3 col-md-4 col-12">
					    <h3><?php the_sub_field('specialize_title'); ?></h3>
					    <p><?php the_sub_field('specialize_text'); ?></p>
				    </div>
				    <?php
    			endwhile;
			endif; ?>
		</div>
	</section>
	<!-- OUR TEAM SECTION -->
	<section id="our-team">
	    <div class="container">
	        <div class="row">
	        	<div class="col-xl-2 col-0"></div>
	            <div class="col-xl-4 col-12 team-text-wrap">
	                <div class="team-text">
	                    <h3><?php echo get_field('team_main_title'); ?></h3>
	                    <p><?php echo get_field('team_description'); ?></p>
	                </div>
	            </div>
	            <div class="col-xl-6 col-12">
	                <div class="row">
            		<?php $args = array( 'post_type' => 'our_team', 'posts_per_page' => 3 );
            		$the_query = new WP_Query( $args ); 
                		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
        			    <div class="col-md-4 col-12" > 
        			    	<div class="inner-team" data-aos="fade-in" data-aos-mirror="true" data-aos-duration="2000">
        			    		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	        		            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	    		            		<figure class="image-container image-move preserve-aspect"><picture><div class="same-height-img" style="background-image:url(<?php echo $url; ?>);"></div></picture></figure>
	    		            		<div class="box-info-hold">
			        			    	<div class="box-info">
			        			    	    <h3><?php the_title(); ?></h3>
			        			    	    <p><?php echo get_field('position'); ?></p>
			        			    	</div>
		        			    	</div>
	        			    	</a>
        			    	</div>
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
	    </div>
	</section>
	<section class="video-section">
        <div class="col-lg-10 col-12 mx-auto">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-12 single-video-display pr-5">
                    <?php
                    if( have_rows('add_video') ): 
                        while ( have_rows('add_video') ) : the_row(); ?>
                            <div class="tabContent"><?php the_sub_field('single_video'); ?></div>
                            <?php
                        endwhile;
                    endif; 
                    ?>
                </div>
                <div class="col-xl-5 col-lg-4 pl-3 flex-section-video">
                    <div class="video-title-desc">
                        <div class="video-title">
                            <h2><?php echo get_field('video_title'); ?></h2>
                        </div>
                        <div class="video-description">
                            <?php echo get_field('video_description'); ?>
                        </div>
                    </div>
                    <ul id="alltabs">
                        <?php
                        if( have_rows('add_video') ): 
                            while ( have_rows('add_video') ) : the_row(); ?>
                                    <li><a href=""><div class="video-title-section"><div class="video-overlay"></div><?php the_sub_field('single_video'); ?></div>
                                    <div class="single-video-title"><p><?php the_sub_field('video_title'); ?></p></div></a></li>
                                <?php
                            endwhile;
                        endif; 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
	<!-- NEWSLETTER SECTION -->
	<section id="latest-news" data-aos="fade-in" data-aos-mirror="true" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <h3>Be the first to know about new job opportunities, available talent, and the latest industry news</h3>
                    <input type="email" placeholder="Type your email">
                </div>
            </div>
        </div>
    </section>
	<!-- CASE STUDIES SECTION -->
	<section class="container-fluid case-home">
		<div class="container">
			<div class="row"><h3 class="client-case-title"><?php echo get_field('client_case_title'); ?></h3></div>
		</div>
		<div class="row news-rotate">
		<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'category__in' => array(8) );
		$the_query = new WP_Query( $args ); 
		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
			    <div class="home-news p-0 col-sm-6 col-md-4 col-12" data-aos="fade-in" data-aos-mirror="true" data-aos-duration="2000"> 
		            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('homepage_blog'); ?>
				    	<div class="home-news-inner" >  
			                <div class="news-desc">
			                	<?php echo get_field('news_description_home_page'); ?>	
		                	</div>
				            <h3 class="home-news-title"><?php the_title(); ?></h3>
		                </div>
	                </a>
		        </div>     
			    <?php endwhile; else: ?>
			    <div class="post">
			        <h2 class="posttitle"><?php _e('Not Found') ?></h2>
			        <div class="postentry"><p><?php _e('Sorry, no news matched your criteria.'); ?></p></div>
			    </div>
		<?php endif; ?>	
		</div>
		<div class="view-all-news"><a href="<?php bloginfo('url') ?>/category/case-studies/"><i class="fas fa-arrow-right"></i></a></div>
	</section>
	<!-- TESTIMONIALS -->
	<section class="bg" id="testimonials" data-aos="fade-right" data-aos-mirror="true" data-aos-duration="1000">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 col-12 quotes">
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
	<!-- PARTNER LOGOS -->
	<section class="container partner-section" data-aos="fade-in" data-aos-mirror="true" data-aos-duration="2000">
		<h3 class="partner-main-title"><?php echo get_field('home_client_title', $pageID); ?></h3>
		<div class="col-xl-10 col-12 col-md-10 col-lg-10 mx-auto">
			<div class="row abrecenter">
				<?php
				if( have_rows('home_client_logos', $pageID) ): 
                    while ( have_rows('home_client_logos', $pageID) ) : the_row(); ?>
                    <?php 
                        $image = get_sub_field('client_logo_image');
                        if( !empty( $image ) ): ?>
                            <div class="partner-inner col-6 col-md-3 col-lg-1">
                                <a href="<?php the_sub_field('client_logo_link'); ?>" target="_blank"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                            </div>
                        <?php endif; ?>
					    <?php
					endwhile;
				endif; ?>
			</div>
		</div>
	</section>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <?php endwhile; else: ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>