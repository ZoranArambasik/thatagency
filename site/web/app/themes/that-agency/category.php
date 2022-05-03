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
                    <li><a class="<?php echo is_category($cat->slug) ? 'active' : '' ?>" href="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name; ?></a></li>
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
               <?php $current_term = single_term_title("", false); ?>
               <?php if (in_category($current_term)): ?>
                   <div class="col-md-6">
                       <p class="feeaturedNews">Featured Blog - <?php echo $current_term; ?></p>
                       <h2><?php echo get_the_title(); ?></h2>
                       <p><?php echo the_time('j F Y'); ?></p>
                   </div>
                   <div class="col-md-6">
                       <a class="blogPostsLink" href="<?php echo get_permalink($post->ID); ?>">
                           <?php the_post_thumbnail('homepage_blog'); ?>
                       </a>
                   </div>
               <?php endif ?>
                
                <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section id="news-posts">
    <div class="container">
        <div class="row row-current-height">
            <?php if (have_posts() ) : while (have_posts() ) :the_post(); ?>
                <div class="col-md-6 calculate-col" data-aos="fade-up" data-aos-mirror="true" data-aos-duration="1000">
                    <a class="blogPostsLink" href="<?php echo get_permalink($post->ID); ?>">
                        <div class="in-cat">
                        <?php $current_term = single_term_title("", false);
                                echo '<span class="case">'.$current_term.'</span>';
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