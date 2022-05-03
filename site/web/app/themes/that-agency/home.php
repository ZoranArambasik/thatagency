<?php
/*
Template Name: News
*/
 get_header(); ?>
 <div class="cat-holder">
    <div class="container">
        <div class="col-12 cat-menu">
            <p class="categories-title">Categories</p>
            <ul>
                <li><a class="all-cat" href="<?php echo get_permalink( get_option( 'page_for_posts' ))?>">All</a></li>
                <?php 
                 $args = array(
                   'orderby' => 'id',
                   'hide_empty' => 1, 
                   'parent' => 0
               );
               $categories = get_categories($args);
               foreach ($categories as $cat) { ?>
                    <li><a href="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name; ?></a></li>
                <?php } ?>
            </ul>
        </div>
   </div>
</div>
<section id="promotion" data-aos="fade-down" data-aos-mirror="true" data-aos-duration="1000">
    <div class="container">
    <?php
        $sticky = get_option( 'sticky_posts' );
        rsort( $sticky );

        $args = array(
            'post__in' => $sticky,
            'posts_per_page' => 1,
            );

        $sticky_query = new WP_Query( $args );
    ?>
        <div class="row">
            <?php  while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
                <div class="col-md-6">
                    <?php $category = get_the_category( $post->ID); ?>
                    <p class="feeaturedNews">Featured Blog - <?php echo $category[0]->name; ?></p>
                    <h2><?php echo get_the_title(); ?></h2>
                    <p><?php echo the_time('j F Y'); ?></p>
                </div>
                <div class="col-md-6">
                    <a class="blogPostsLink" href="<?php echo get_permalink($post->ID); ?>">
                        <?php the_post_thumbnail('homepage_blog'); ?>
                    </a>
                </div>
                <?php wp_reset_postdata(); ?>
			<?php endwhile; ?>
        </div>
    </div>
</section>

<section id="news-posts">
    <div class="container">
        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
            'posts_per_page' => -1,
            'post_type' => array('post'),
            'orderby' => 1,
            'ignore_sticky_posts' => 1,
            'paged' => $paged
            );
            $custom_query = new WP_Query( $args );
            //( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );//exclude the sticky post from the main loop
        ?>
        <div class="row row-current-height">
            <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                <div class="col-md-6 calculate-col" data-aos="fade-up" data-aos-mirror="true" data-aos-duration="1000">
                    <a class="blogPostsLink" href="<?php echo get_permalink($post->ID); ?>">
                        <div class="in-cat">
                            <?php 
                                $category = get_the_category( $post->ID); 
                                foreach ($category as $category_name) {
                                    echo '<span class="case">'.$category_name->name.'</span>';
                                } 
                            ?>
                        </div>
                        <div class="blog-thumb"><?php the_post_thumbnail('homepage_blog'); ?></div>
                        <h2 class="blogHeading"><?php echo get_the_title(); ?></h2>
                        <p class="time-blog"><?php echo the_time('j F Y'); ?></p>
                    </a>
                </div> 
                <?php wp_reset_postdata(); ?>
			<?php endwhile; endif; ?>
        </div>
        <hr>
        <p class="showMoreArticles">Show more articles</p>
    </div> 
</section>

<?php get_footer() ?>