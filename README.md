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

###image sizes
* Project Slideshow - 520px wide
* Projects Filmstrip - 123px square
* Projects Thumbnails - 99px square (using 123px images)
* Home Hero - 960px wide 502px high

###deploying
```sh
$ rake theme:push
```

image/media push from localhost to dreamhost didn't work..
should be pulling content and database now.

export the custom content type definition if those have changed, then import them on the server.

switch away from and back to the staengl theme on the server.

make sure the pages use the proper templates.


###theme
the staengl theme is based on [wp-zurb-boilerplate](https://github.com/ngn33r/wp-zurb-boilerplate)

there are instructions there for setting up local development environment.


```
$ ln -s ~/wrk/staengl/staengl-website ~/wrk/staengl/wordpress/wp-content/themes/staengl-website
```
### install this
* Custom Content Type Manager 0.9.7.11 - via admin tool
* Relative Image URLs 2.0 - via admin tool

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