<?php get_header(); ?>

    <section id="search_page">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-4">
                        <a href="<?php echo get_permalink($post->ID); ?>"><img class="blg-img-small" src="<?php echo get_the_post_thumbnail_url($post->ID, 'blog'); ?>" alt="blog-post-img"></a>
                        <h2><?php echo get_the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>