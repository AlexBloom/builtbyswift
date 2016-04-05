<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Swift Industries
 */
?>

<?php if( is_page('swiftcampout') ) : ?>
	<footer class="campout-footer" role="contentinfo">
		<a href="/">&larr; Back to Swift</a>
	</footer><!-- #colophon -->
<?php else: ?>
	<!-- Something should go here! -->
<?php endif;?>

<?php wp_footer(); ?>

</body>
</html>
