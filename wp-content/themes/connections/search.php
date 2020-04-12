<?php /* Don't remove this line. */
require('./wp-blog-header.php'); ?>
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
	<style type="text/css" media="screen">
		@import url(<?php bloginfo('stylesheet_url'); ?>);
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
	<link rel="shortcut icon" href="/favicon/bullet.ico"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body onload="hideOnLoad();">
<div id="rap">
	<?php get_header() ?>
	<div id="main">
		<div id="content">
			<?php if (have_posts()) { ?>
				<h3>Резултати от търсенето за '<?php echo $s; ?>'</h3>
				<div class="post-info">Откри ли еднорози? А онова, за което дойде?</div>
				<br/>
				<?php while (have_posts()) : the_post(); ?>
					<?php require('post.php'); ?>
				<?php endwhile; ?>
				<div class="navigation">
					<div class="alignleft"><?php posts_nav_link('', '', '&laquo; По-стари вести') ?></div>
					<div class="alignright"><?php posts_nav_link('', 'По-нови вести &raquo;', '') ?></div>
				</div>
			<?php } else { ?>
				<h2 class="center">Няма...</h2>
				<p><?php _e('...ама съвсем нищичко не намерих...'); ?></p>
			<?php } ?>
		</div>
		<div id="sidebar">
			<h2>В момента</h2>
			<ul>
				<li><p>... търсиш из архивите <strong>'<?php echo $s; ?>'</strong>. Ако не можеш да откриеш нищо (даже
						еднорози :(), не се отчайвай, погледни из някоя от връзките встрани или направо ни пиши. Търси,
						Приятеле, търси! (На Шмендрик за стиха благодари. :D)</p></li>
			</ul>
			<?php get_sidebar(); ?>
		</div>
		<?php get_footer(); ?>
	</div>
</div>
</body>
</html>
