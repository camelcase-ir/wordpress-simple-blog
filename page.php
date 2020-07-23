<?php get_header(); ?>
<section>
	<div class="main">
		<section>
			<div class="page-title text-right">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3><?php while ( have_posts() ) : the_post(); the_title(); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="page-box container">
				<div class="row">
					<div class="col-md-12 text-right">
						<?php
					            the_content();
					        endwhile;
					        ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<?php get_footer(); ?>