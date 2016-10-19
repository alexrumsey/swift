				<div id="sidebar1" class="sidebar col-xs-12 col-sm-4" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php // This content shows up if there are no widgets defined in the backend. ?>

						<div class="alert alert-help">
							<p><?php _e( 'Please activate some Widgets.', 'launchtheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>