    </div> <!-- row end -->
</div> <!-- container fluid end -->
<div class"above-footer">
    <?php if ( is_active_sidebar( 'footer-instagram' ) ) : ?>
       <?php dynamic_sidebar( 'footer-instagram' ); ?>
    <?php endif; ?>
</div>
<footer id="footer">
    <div class="container">
        <div class="row br-top">
            <div class="col-lg-4 col-12">
                <p>Location, Sydney -</p>
            </div>
            <div class="col-lg-8 col-12 col-company-info">
                <ul>
                    <li class="cs-link"><a class="customize-links" target="_blank" href="https://www.google.com/maps/place/Suite+10,+Level+12%2F1+Pacific+Hwy,+North+Sydney+NSW+2060,+Australia/@-33.8409379,151.207316,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12aef3265c8651:0xc6e2051a37ee9287!8m2!3d-33.8409424!4d151.2095047"><p class="tex-rgt"><?php echo get_theme_mod("my_company_address"); ?></p></a></li>
                    <li class="cs-link"><a class="customize-links" href="tel:+61299599648<?php echo get_theme_mod("my_company_phone_number"); ?>"><?php echo get_theme_mod("my_company_phone_number"); ?></a></li>
                    <li class="cs-link"><a class="customize-links" href="mailto:<?php echo get_theme_mod( "my_company_email" ); ?>"><?php echo get_theme_mod( "my_company_email" ); ?></a></li>
                </ul>   
            </div>
        </div>
        <div class="row br-top">
            <div class="col-lg-4 col-12">
                <p>Menu Structure -</p>
                <?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
                   <?php dynamic_sidebar( 'sidebar-8' ); ?>
                <?php endif; ?>
                <p class="privacy-terms">&copy; <?php echo date('Y'); ?> That Agency  -  <a href="<?php bloginfo('url') ?>/privacy-policy">Privacy Policy </a><br>Design & Development by Webski<p>
            </div>
            <div class="col-lg-8 col-12">
                <div class="footer-side">
                    <div class="col">
                        <?php dynamic_sidebar('sidebar-3'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('sidebar-4'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('sidebar-5'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('sidebar-6'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('sidebar-7'); ?>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#">FACEBOOK</a>
                    <a href="#">INSTAGRAM</a>
                    <a href="#">LINKEDIN</a>
                </div>
            </div> 
        </div>
    </div>
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-right"></i></a>
        <p>BACK TO TOP</p>
    </div>
</footer>


<?php wp_footer() ?>
</body>
</html>
