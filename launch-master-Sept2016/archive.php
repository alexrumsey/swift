<?php get_header(); ?>

<?php

$cat = get_category( get_query_var( 'cat' ) );
$cat_id = $cat->cat_ID;
$cat_name = $cat->name;
$cat_slug = $cat->slug;


?>


			<div id="content" class="row">

				<div id="inner-content" class="cat-<?php echo $cat_slug; ?> category col-xs-12">

						<div id="main" class="col-xs-12" role="main">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<?php single_cat_title(); ?><span class="title-line"></span>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'launchtheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'launchtheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:', 'launchtheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:', 'launchtheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:', 'launchtheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php
								/*
								
								Using Post Formats? This code can get you started. 
								Uncomment the code below and then add format-<?php echo $format; ?> to an 
								element somehwere - and style with CSS accordingly.
								*/

								/*
								$format = get_post_format($post->ID);
								if ($format == '') {
									$format = 'standard';
								}
								$formats = array('gallery','image','aside','standard');
								*/
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article">
								<header class="article-header">
									<h3 class="h2 post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard">
										<time class="updated" datetime="%1$s" pubdate><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time>
									</p>
								</header>
								<section class="entry-content ">
									<section class="entry-image">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail('launch-thumb-600');
										} ?>
									</section>
									<?php the_excerpt(); ?>
								</section>
								<?php // comments_template(); // uncomment if you want to use them ?>
							</article>
							<?php endwhile; ?>
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
								</article>
							<?php endif; ?>
						</div>
					</div>
				</div>

<?php get_footer(); ?>
