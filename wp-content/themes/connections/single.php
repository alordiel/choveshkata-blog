<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">
	<!--

	function hideOnLoad() {
		//toggleMe("sbcat");
		//toggleMe("sbsponsors");
		//toggleMe("sbsearch");
		//toggleMe("sblinks");
		toggleMe("sbarchive");
		//toggleMe("sbrss");
		toggleMe("sbmeta");
	}

	function toggleMe(a) {
		var e = document.getElementById(a);
		if (!e) return true;
		if (e.style.display == "none") {
			e.style.display = "block"
		} else {
			e.style.display = "none"
		}
		return true;
	}

	//-->
</script>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/> <!-- leave this for stats please -->
	<style type="text/css" media="screen">
		@import url(<?php bloginfo('stylesheet_url'); ?>);
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body onload="hideOnLoad();">
<div id="rap">
	<?php get_header() ?>
	<div id="main">
		<div id="content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
					<?php require('post.php'); ?>
					<?php comments_template(); // Get wp-comments.php template ?>
				</div>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
			<p align="center"><?php posts_nav_link() ?></p>
		</div>
		<div id="sidebar">
			<?php if (have_posts()) : the_post(); ?>
				<h2>Вест в архив</h2>
				<ul>
					<li><strong>Дата на публикуване:</strong></li>
					<li><?php the_time('l, M jS, Y') ?> в <?php the_time() ?></li>
					<li><strong>Категория:</strong></li>
					<li><?php the_category(' и '); ?></li>
					<li><strong>Участвай:</strong></li>
					<li><?php if (('open' == $post->comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Можеш да <a href="#respond">откликнеш</a> или да <a href="<?php trackback_url(); ?>">сложиш
								връзка</a> към нас от собствения си сайт.

						<?php } elseif (!('open' == $post->comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a
								href="<?php trackback_url(); ?> ">trackback</a> from your own site.

						<?php } elseif (('open' == $post->comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post->comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php }
						edit_post_link('Edit this entry.', '', ''); ?></li>
				</ul>


			<?php endif; ?>
		</div>
		<?php get_footer(); ?>
	</div>
</div>
</body>
</html>
