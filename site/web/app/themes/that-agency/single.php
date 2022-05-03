<?php get_header() ?>
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
<section id="singleBlog">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <?php the_post_thumbnail('homepage_blog'); ?>
            </div>
            <div class="col-md-6">
            <?php wp_reset_postdata(); ?>
                <h2 class="blogHeading"><?php echo get_the_title(); ?></h2>
                <p class="time-blog"><?php echo the_time('j F Y'); ?></p>
                <div><?php the_content(); ?></div>
            </div>
        </div>
    </div>
</section>
    
<?php get_footer() ?>