<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thrilla_2.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer bg-black-9" role="contentinfo">

		<div class="col col-12 m-col-6 l-col-3 pad-y-m bg-gradient text-center">
				<a class="shaka-button-container link--black" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<div class="shaka">
						<svg class="icon-shaka"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-shaka-color"> </use>  </svg>
					</div>
					<div class="wordmark">
						<svg class="icon-thrillderness"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-thrillderness"> </use>  </svg>
					</div>
				</a>
		    <h4> Go far and shred gnar. </h4>
		</div>

		<div class="col col-12 m-col-6 l-col-3 pad-l white-9">
			<ul class="list-reset">
				<h4>Community</h4>
				<li><a class="link link--on-dark" href="mailto:yo@thrillderness.co">yo@thrillderness.co</a></li>
				<li><a class="link link--on-dark" href="http://instagram.com/thrillderness">Instagram</a></li>
				<li><a class="link link--on-dark" href="http://facebook.com/thrillderness">Facebook</a></li>
				<li><a class="link link--on-dark" href="http://twitter.com/thrillderness">Twitter</a></li>
			</ul>
		</div>

		<div class="col col-12  l-col-3 pad-l white-9">
			<h4>Colophon</h4>
			<ul class="list-reset">
				<li> Running on <a class="link link--on-dark" href="http://wordpress.org">Wordpress</a> </li>
				<li> Designed by <a class="link link--on-dark" href="http://morf.studio"> Morf Studio </a> </li>
				<li> Built by <a class="link link--on-dark" href="http://alexbloom.co">Alex Bloom</a>  </li>
			</ul>
			<p>

			</p>
		</div>

		<div class="col col-12  l-col-3 pad-l white-9">
			<h4>Copyright</h4>
			<p>All content ©2016 Thrillderness and respective contributors. We like to share— <a class="link link--on-dark" href="mailto:yo@thrillderness.co">contact us</a> if you want to use something.</p>
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
