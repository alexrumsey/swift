<?php get_header(); ?>

			<div id="content" class="row">

				<div id="inner-content" class="container ">

					<div id="main" class="span8  " role="main">

						<article id="post-not-found" class="hentry ">

							<header class="article-header">

								<h1><?php _e( 'Epic 404 - Article Not Found', 'launchtheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'launchtheme' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer">

									<p><?php _e( 'This is the 404.php template.', 'launchtheme' ); ?></p>

							</footer>

						</article>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
