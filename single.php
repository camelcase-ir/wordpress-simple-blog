<?php get_header(); ?>
<section>
	<div class="main">
		<section>
			<div class="page-title text-right">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3><?php while ( have_posts() ) : the_post(); the_title(); ?></h3>
							<p><span class="fas fa-1x fa-calendar"></span>&nbsp;تاریخ : <?php the_date();?> | <span class="fas fa-1x fa-user"></span>&nbsp; نویسند : <?php the_author();?></p>
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
					            echo '<br /><hr />';
					            the_tags();
					            echo '<br /><hr /><br />';
					            if ( comments_open() || get_comments_number() ) :
					                comments_template('/short-comments.php');
					            endif;
					        endwhile;
					        ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<?php get_footer(); ?>