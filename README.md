staengl-website
===============

wordpress website for staengl engineering

made some good use of [this github repo](https://github.com/wilhelser/WordPress-Scripts)

TODO:

* show information in slideshow
* set up wiki and document workflow
* set up hosting
* make rsync deploy with css and js compression
* 404, 500, error pages

* home page
  * make Hero image rotator work

###theme
the staengl theme is based on [wp-zurb-boilerplate](https://github.com/ngn33r/wp-zurb-boilerplate)

there are instructions there for setting up local development environment.

http://staengl.engine-earring.com/wp-content/uploads/slideshow-gallery/crossings02.jpg

```
$ ln -s ~/wrk/staengl/staengl-website ~/wrk/staengl/wordpress/wp-content/themes/staengl-website
```
### install this
* Custom Content Type Manager 0.9.7.11 - via admin tool
* slideshow-gallery - installed from the them reposistory (vendor/plugins/slideshow-gallery) - this has been modified so make sure you install from there

### site urls
[local development](http://staengl.dev/company/)
[staging](http://staengl.engine-earring.com/company/)

###links to check out
* http://theme.fm/2011/08/tutorial-deploying-wordpress-with-capistrano-2082/
* http://roybarber.com/version-controlling-wordpress/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://www.walmik.com/2012/03/manage-your-custom-wordpress-theme-using-git-instead-of-ftp/


development
=====
```
$ ln -s ~/wrk/staengl/wordpress-3.6 ~/wrk/staengl/wordpress
$ mkdir ~/wrk/staengl/wordpress/wp-content/themes/stangle-website
$ ln -s ~/wrk/staengl/staengle-website ~/wrk/staengle/wordpress/wp-content/themes/wp-zurb-boilerplate
```

### deployment
* make sure __.htaccess__ is writable in the wordpress dir or set it to have this content:
* copy __jquery-1.10.2.min.map__ to __wp-includes/js/jquery__

```
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress
```