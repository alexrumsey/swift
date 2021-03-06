<?php
/*
Template Name: Custom Page Example
*/
?>
<?php get_header(); ?>

			<div id="content" class="row">

				<div id="inner-content" class="col-xs-12">

						<div id="main" class="col-xs-12 col-sm-8" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<div class="page-wrap">
									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'launchtheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'launchtheme' ) ), launch_get_the_author_posts_link());
									?></p>


								</header>

								<section class="entry-content " itemprop="articleBody">
									<?php the_content(); ?>
							</section>

								<footer class="article-footer">
									<?php the_tags( '<span class="tags">' . __( 'Tags:', 'launchtheme' ) . '</span> ', ', ', '' ); ?>

								</footer>

								<?php comments_template(); ?>
							</div>
							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry ">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'launchtheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'launchtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'launchtheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
