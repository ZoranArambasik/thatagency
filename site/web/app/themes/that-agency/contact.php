<?php
/*
Template Name: Contact
*/
 get_header() ?>
<section id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
	                <?php endwhile; else: ?>
	                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>