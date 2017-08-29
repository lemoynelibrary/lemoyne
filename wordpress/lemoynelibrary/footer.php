<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			</div><!--.site-content-->
		</div><!--.container page-container-->
		

<?php include_once("footer-include.txt") ?>


	<div class="container-fluid">
		<footer id="site-footer" role="contentinfo">
			<div id="footer-row" class="row site-footer">
				<div class="col-sm-4 footer-left">
					<?php dynamic_sidebar('footer-left'); ?> 
				</div>
				<div class="col-sm-5 footer-right">
				</div>
				<div class="col-sm-3 footer-right">
					<?php dynamic_sidebar('footer-right'); ?> 
				</div>
			</div>
		</footer>
	</div>		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?> 
	</body>
</html>