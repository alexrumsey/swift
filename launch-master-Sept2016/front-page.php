<?php get_header(); ?>

			<div id="content" class="row">

				<div id="inner-content" class="col-xs-12">

						<div id="main" class="col-xs-12" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article">
								<div class="article-wrap">
									<section class="entry-content ">
									 
									<section class="entry-image">
										<?php if (has_post_thumbnail()) {
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('launch-thumb-462');
											echo '</a>';
										} ?>
									</section>
										<?php the_content(); ?>
									</section>
								</div>

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article>

							<?php endwhile; ?>
						</div>
									<?php if ( function_exists( 'launch_page_navi' ) ) { ?>
											<?php launch_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'launchtheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'launchtheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry ">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'launchtheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'launchtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'launchtheme' ); ?></p>
										</footer>
									</article>
							
							<?php endif; ?>

						


				</div>
		</div>

			

<?php get_footer(); ?>
