<?php
/*
Template Name: Job Vacancies
*/ 
get_header(); 

?>             
<section class="job_vacancies">
    <div class="container">
        <!--<div class="job-search front-search">   -->
        <!--    <form role="search" action="/" method="get" id="searchform">-->
        <!--    <input type="text" class="fr-first" name="s" placeholder="Search for jobs"/>-->
        <!--    <input type="submit" alt="Search" class="lnr lnr-magnifier" value="&#xe86f" />-->
        <!--    <input type="hidden" name="post_type" value="job" />-->
        <!--    </form>-->
        <!--</div>-->
        <div class="row">
    
      <?php $args = array( 'post_type' => 'job', 'posts_per_page' => -1 );
		$the_query = new WP_Query( $args ); 
        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="home-job col-lg-4 col-md-4 col-12" > 
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('homepage_blog'); ?></a>
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
                <div class="post col-12">
                    <h2 class="posttitle"><?php _e('Not Found') ?></h2>
                    <div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
                </div>
        <?php endif; ?>    
        </div>
    </div>
   </div><!-- content -->    
</section><!-- contentarea -->   
        <?php get_footer(); ?>