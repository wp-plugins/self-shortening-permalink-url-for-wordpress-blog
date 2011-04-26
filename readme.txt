=== Self Shortening Permalink URL for Wordpress Blog ===
Contributors: byrev
Donate link: http://byrev.org/
Tags: short, url, seo, id, post, blog, self, uri, rewrite, shortener, tiny, shortening, redirection, permalink
Requires at least: 2.0.2
Tested up to: 3.1
Stable tag: 1.3.0

== Description ==

Self Shortening URL for Wordpress Blog. Is based on an article ID, page, category or tag and rewrite the wordpress permalink url in a much shorter form.

== Installation ==

*  Download **Self Shortening URL** WordPress Plugin and Install !
*  Activate **ByREV Shortening URL.** from wp plugins menu: /wp-admin/plugins.php
*  Edit **byrev_selft_short_url.php** file if needed, see: [FAQ](http://wordpress.org/extend/plugins/self-shortening-permalink-url-for-wordpress-blog/faq/)
*  Pleas Read [NOTE](http://wordpress.org/extend/plugins/self-shortening-permalink-url-for-wordpress-blog/other_notes/) for more information

== Frequently Asked Questions ==

**What can you change in the plugin ?**

Not many, and which may change is already configured with the best option. You can change only the constant defined in **_SELF_SHORT_URL_MODE**, other changes are not necessary and not recommended.
Valid values are described below:


*  0 - is integer mode = real Post ID from wordpress database 
*  1 - Base 16 Mode - the hexadecimal mode, meaning the post ID of wordpress is converted into base 16
*  2 - Extended Mode - Post ID value is transformed into letters and numbers, which is actually is base 36

For integer: INTEGER
`define('_SELF_SHORT_URL_MODE',0);`

For HEXAZECIMAL
`define('_SELF_SHORT_URL_MODE',1); `

Letters and Numbers (this is defaul mode, and the best)
`define('_SELF_SHORT_URL_MODE',2);`

**Can I change html style?**
Yes, edit **byrev_selft_short_url.php** and change *css style* code from **_SELF_SHORT_URL_STYLE** constant.

**Can I change the name "Short URL" in another text?**
Yes, edit **byrev_selft_short_url.php** and change text from **_SELF_SHORT_URL_TITLE** constant.

Pay attention to the syntax, one mistake can "ruin" the whole site design!

== Screenshots ==

1. Screenshot with shortlink under post

== Changelog ==


== Upgrade Notice ==


== NOTE! ==

1. One of these files, "wp-config.php" or "index.php", must have write access, otherwise, shortened links will not work.
2. Disabling plugin does not mean the loss of links, they will continue to function until the plugin code from in wp-config.php or index.php will be manually removed.
3. Any other changes to the plugin can lead to malfunction or problems with the blog. 
4. Plugin programmer is not responsible for incompatibility with some blogs, or any version of WordPress.
5. These folders should not exist in root blog: /i/ or /h/ or /z/ and also, there should be no page with slug name "z", "h" or "i" ... in 99% of cases should not be any problem.
6. index.php is rewritten by an update of wordpress, so short-links will not work anymore. If wp-config.php is editable (and should be as usual), index.php is never be used.