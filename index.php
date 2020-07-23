<?php get_header(); ?>
<section>
	<div class="main">
		<section>
			<div class="main-cover">
				<img class="img-fluid" src="<?php echo get_option("amirBlog_cover_input");?>"  width="100%" title="کاور وبلاگ" alt="کاور وبلاگ" />
			</div>
		</section>
		<section>
			<div class="content-box container">
				<div class="row">
					<div class="main-widget col-md-3 float-right text-right" dir="rtl">
						<?php get_sidebar(); ?>
					</div>
					<div class="main-content col-md-9 float-left">
						<div class="post-box">

							<div class="posts">
								<?php while ( have_posts() ) : the_post(); ?>
									<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
										<div class="post-items col-md-12">
											<div class="post-items-image col-md-4 float-right">
												<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('post-thumbnail', ['class'=>"img-fluid"]);
												} else {
													?><img class="img-fluid" src="<?php echo bloginfo('template_directory'); ?>/img/not_found.png" title="تصویر پست" alt="تصویر پست" /><?php
												}
												?>
											</div>
											<div class="post-items-content col-md-8 float-left text-right">
												<h3><a class="text-dark" href="<?php echo get_permalink(); ?>" title="مطالعه کامل"><?php the_title(); ?></a></h3>
												<?php if ( !is_page() ):?>
											    	<section class="entry-meta">
											    		<p><span class="fas fa-1x fa-calendar"></span>&nbsp;تاریخ : <?php the_date();?> | <span class="fas fa-1x fa-user"></span>&nbsp; نویسند : <?php the_author();?></p>
											    	</section>
											    <?php endif; ?>
												<p><?php the_excerpt(); ?></p>
												<p><a class="float-left btn btn-primary" href="<?php echo get_permalink(); ?>" title="مطالعه کامل">مطالعه کامل</a></p>
											</div>
											<div class="clearfix"></div>
										</div>
									</article>
								<?php endwhile; ?>

							</div>

						</div>
						<?php echo my_pagination(); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<?php get_footer(); ?>