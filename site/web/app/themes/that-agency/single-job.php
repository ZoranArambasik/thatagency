<?php 
get_header(); ?>

<section id="singleJob">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php wp_reset_postdata(); ?>
                <h2 class="blogHeading"><?php echo get_the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </div>
            <!--<div class="col-md-6">-->
            <!--    <img src="<?php //echo get_the_post_thumbnail_url(); ?>" alt="blog-image">-->
            <!--</div>-->
            <div id="app-position" class="col-10 mx-auto app-form">
               <h2>Apply for this position</h2>
                <?php echo do_shortcode('[contact-form-7 id="354" title="Job Position"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>