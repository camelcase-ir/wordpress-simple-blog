<footer>
	<div class="footer">
		<div class="top-footer text-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer-widget text-right" dir="rtl">
							<?php dynamic_sidebar( 'footer_sidebar' ); ?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer text-light">
			<div class="container">
				<div class="row">
					<div class="copyright text-right">
						<p><a href="#" class="text-light" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"><span class="fas fa-1x fa-arrow-up"></span></a> &nbsp; |  &nbsp; <?php echo get_option("amirBlog_copyright_input");?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="<?php echo bloginfo('template_directory'); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php wp_footer();?>
</body>
</html>