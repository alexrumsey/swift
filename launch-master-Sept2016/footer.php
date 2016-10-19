</div> <?php // closed container opened in the header ?>

<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 footer-links">
            <?php launch_footer_links(); ?>
            </div>
            <div class="col-sm-12 text-center">
			<div class="ldm-links">
				&copy; <?php echo date('Y'); ?>
                <ul>
					<li><a href="<?php bloginfo('url'); ?>/terms">Terms Of Use</a></li>
                    <li><a href="<?php bloginfo('url'); ?>/privacy">Privacy Policy</a></li>
                    <li><a href="<?php bloginfo('url'); ?>/sitemap">Sitemap</a></li>
				</ul>
			</div>
			
            <div class="ldm-byline">
                Crafted by <a href="http://www.launchdigitalmarketing.com" title="Chicago Digital Marketing Agency" target="_blank">Launch Digital Marketing.</a>
            </div>
			</div>
        </div>
    </div>
</footer>

<!--<a href="#" class="scrollToTop"><i class="fa fa-angle-up" aria-hidden="true"></i><span>Top</span></a>-->


<?php // all js scripts are loaded in library/launch.php ?>		

<?php wp_footer(); ?>
</body>
</html>
