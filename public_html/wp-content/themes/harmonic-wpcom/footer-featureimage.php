<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package harmonic
 */
?>

							</div><!-- #content .site-wrapper -->
							<div class="clear"></div>
						</div><!-- #content-wrapper -->
					</section><!-- #slide-content .slide -->
				</div>
			</main>

			<footer id="colophon" class="site-footer" role="contentinfo">

				<div class="site-info">
					<?php do_action( 'harmonic_credits' ); ?>
									</div><!-- .site-info -->

			</footer><!-- #colophon .site-footer -->
		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>