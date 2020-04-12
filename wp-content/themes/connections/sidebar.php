<h2 onclick="return toggleMe('sbpages');">Страници</h2>
<ul id="sbpages"><?php wp_list_pages('title_li='); ?></ul>

<h2 onclick="return toggleMe('sbcat');"><?php _e('Категории'); ?></h2>
<ul id="sbcat">
	<?php wp_list_categories([
		'title_li' => ''
	]); ?>
</ul>

<h2 onclick="return toggleMe('sblinks');"><?php _e('Връзки'); ?></h2>
<ul id="sblinks"><li><a href="http://choveshkata.net/forum/" title="…но общуване (Last updated January 1, 1970 3:00 am)">Forум</a> …но общуване</li>
<li><a href="http://placeforfuture.org" title="…за гражданско образование, за активни човеци. Другият ни голям проект. (Last updated January 1, 1970 3:00 am)">Място за бъдеще</a> …за гражданско образование, за активни човеци. Другият ни голям проект.</li>
<li><a href="http://choveshkata.net/forum/viewforum.php?f=3" title=" (Last updated January 1, 1970 3:00 am)">Фантазийска преводаческа школа</a></li>
<li><a href="http://choveshkata.net/forum/viewforum.php?f=2" title="Къде се раждат мечтите (Last updated January 1, 1970 3:00 am)">Фантазия</a> Къде се раждат мечтите</li>
</ul>

<h2 onclick="return toggleMe('sbsponsors');">Спонсори</h2>

<h2 onclick="return toggleMe('sbsearch');"><label for="s"><?php _e('Потърси'); ?></label></h2>
<ul id="sbsearch">
	<li>
		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div style="text-align:center">
				<p><input type="text" name="s" id="s" size="15"/></p>
				<p><input type="submit" name="submit" value="<?php _e('Потърси'); ?>"/></p>
			</div>
		</form>
	</li>
</ul>

<h2 OnClick="return toggleMe('sbarchive');"><?php _e('Архив'); ?></h2>
<ul id='sbarchive'><?php wp_get_archives('type=monthly&show_post_count=true'); ?></ul>

<h2 onclick="return toggleMe('sbrss');"><?php _e('RSS Feeds'); ?></h2>
<ul id='sbrss'>
	<li>
		<a title="RSS2 Feed for Posts" href="<?php bloginfo('rss2_url'); ?>">Вести</a> | <a
			title="RSS2 Feed for Comments" href="<?php bloginfo('comments_rss2_url'); ?>">Отклици</a> <br> <a
			href="https://feeds.feedburner.com/choveshkata/VoPP" rel="alternate" type="application/rss+xml"><img
				src="https://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt=""
				style="vertical-align:middle;border:0"/></a>&nbsp;<a
			href="https://feeds.feedburner.com/choveshkata/VoPP" rel="alternate"
			type="application/rss+xml">Feedburner</a></li>
</ul>

<h2 onclick="return toggleMe('sbmeta');"><?php _e('Meta'); ?></h2>
<ul id='sbmeta'>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>
	<li><a href="https://feeds.feedburner.com/choveshkata/VoPP" rel="nofollow noopener"><img
				src="https://feeds.feedburner.com/~fc/choveshkata/VoPP?bg=99CCFF&amp;fg=444444&amp;anim=0" width="88"
				style="border:0" alt=""/></a></li>
	<li><a href="http://topbloglog.com/" rel="nofollow noopener" target="_blank"><img
				src="http://topbloglog.com/i/mg/gray/3352.png" width="80" border="0" alt="Блог класация"/></a></li>
	<li><a href="https://www.dnevnik.bg/blogosfera/" target="_blank" rel="nofollow noopener" title="Блогосфера">Блогосфера
			- Дневник</a></li>
	<?php wp_meta(); ?>
</ul>
