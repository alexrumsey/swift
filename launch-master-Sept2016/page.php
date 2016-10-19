<?php get_header(); ?>

			<div id="content" class="row">
				<div id="inner-content" class="col-xs-12">
						<div id="main" class="col-xs-12 col-sm-8" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<header class="article-header">
									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
								</header>
								<section class="entry-content " itemprop="articleBody">
									<?php the_content(); ?>
								</section>	
							</article>
							<?php endwhile; else : ?>
								<article id="post-not-found" class="hentry ">
									<header class="article-header">
										<h1><?php _e( 'Oops, Page Not Found!', 'launchtheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking the URL or search our site.', 'launchtheme' ); ?></p>
									</section>
								</article>
							<?php endif; ?>
						<?php get_sidebar(); ?>
				</div>
			</div>

<?php get_footer(); ?>
