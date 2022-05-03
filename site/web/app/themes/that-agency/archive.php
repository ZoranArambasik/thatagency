<?php get_header(); ?>

<section id="singleBlogPst">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><?php the_title(); ?></h1>
                <p><?php echo the_time('F j Y'); ?></p>
                <a href="<?php echo get_permalink($post->ID); ?>"><?php the_post_thumbnail(); ?></a>
                <p><?php the_content(); ?></p>
            </div>
            <div class="col-md-4">
                <h2>Search for:</h2>
                <?php get_sidebar(); ?> 
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>