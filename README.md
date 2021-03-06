staengl-website
===============

wordpress website for staengl engineering

made some good use of [this github repo](https://github.com/wilhelser/WordPress-Scripts)


###image sizes
* Project Slideshow - 520px wide
* Projects Filmstrip - 123px square
* Projects Thumbnails - 99px square (using 123px images)
* Home Hero - 960px wide 502px high

###deploying
```sh
rake theme:push
```

image/media push from localhost to dreamhost didn't work..
should be pulling content and database now.

export the custom content type definition if those have changed, then import them on the server.

switch away from and back to the staengl theme on the server.

make sure the pages use the proper templates.


###theme
the staengl theme is based on [wp-zurb-boilerplate](https://github.com/ngn33r/wp-zurb-boilerplate)

### install this
* Custom Content Type Manager 0.9.7.11 - via admin tool

### site urls
[local development](http://staengl.dev/company/)
[staging](http://staengl.engine-earring.com/company/)

###links to check out
* http://theme.fm/2011/08/tutorial-deploying-wordpress-with-capistrano-2082/
* http://roybarber.com/version-controlling-wordpress/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://www.walmik.com/2012/03/manage-your-custom-wordpress-theme-using-git-instead-of-ftp/


development setup
=====
* setup ruby - reccomend via [rvm](https://rvm.io/) so that you can run the **rake** tasks
* set up a local alias for localhost (used by apache setup) by editing **/etc/hosts**
  * ```127.0.0.1    staengl.dev```
* make apache work on your dev machine for php
  * (i have a mac, instructions [start here](https://discussions.apple.com/docs/DOC-3083))
  * make sure mod_rewrite is turned on in **/etc/apache2/httpd.conf**
```
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
```
  * set up a virtual host [like this]()
  * here is the virtual host config:
```
<VirtualHost *:80>
    ServerAdmin jim@loco8.org
    DocumentRoot "/Users/jimnist/wrk/staengl/wordpress"
    ServerName staengl.dev
    ServerAlias *.staengl.dev
    ErrorLog "/private/var/log/apache2/staengl-error_log"
    CustomLog "/private/var/log/apache2/staengl-access_log" common
    <Directory "/Users/jimnist/wrk/staengl/wordpress">
       AllowOverride All
       Options FollowSymlinks Indexes MultiViews
       Require all granted
    </Directory>
</VirtualHost>
```
* set up a local mysql server (i use [homebrew](http://brew.sh/) on a mac)
* create a database and user for local dev that matching the ones in **Rakefile**
```
mysql -u root
mysql> create database staengl; GRANT ALL PRIVILEGES ON staengl.* TO wp@'%'' IDENTIFIED BY 'meeS00';
```
* change to your staengle working directory (here assumed to be **<staengl working dir>**), check out the code, download latest wordpress and set up some aliases
```
cd <staengl working dir>
git checkout git@github.com:AndyWright/staengl-website.git
wget http://wordpress.org/wordpress-4.1.1.zip
unzip wordpress-4.1.1.zip
ln -s <staengl working dir>/wordpress-4.1.1 <staengl working dir>/wordpress
mkdir <staengl working dir>/wordpress/wp-content/themes/stangl-website
ln -s <staengl working dir>/staengl-website <staengl working dir>/wordpress/wp-content/themes/stangl-website
```
* make sure you have a __.htaccess__
* set up **<staengl working dir>e/wordpress/wp-config.php** with same values from **./Rakefile**
* manually install the following plugins in **<staengl working dir>/wordpress/wp-content/plugins/** :
  * Custom Content Type Manager 0.9.7.13
  * EWWW Image Optimizer
  * WP Super Cache
```
cd wordpress/wp-content/plugins/
wget https://downloads.wordpress.org/plugin/custom-content-type-manager.latest-stable.zip
unzip custom-content-type-manager.latest-stable.zip
wget https://downloads.wordpress.org/plugin/ewww-image-optimizer.2.2.2.zip
unzip ewww-image-optimizer.2.2.2.zip
wget https://downloads.wordpress.org/plugin/wp-super-cache.1.4.2.zip
unzip wp-super-cache.1.4.2.zip
mkdir ../ewww
chmod 777 ../ewww/
```
* activate the installed plugins in **wp-admin**
* import the custom content type definitions by navigating to __http://staengl.dev/wp-admin/admin.php?page=cctm_tools&a=import_def__ and importing __staengle_cctm_site.cctm.json__

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

###TODO:

* hero auto-height
* make rsync deploy with css and js compression
* 404, 500, error pages

### things changed to fix heros 2015-04-08

* changed code around positioning of the menus (really still not sure why the old way failed, but new way of positioning is definitely better strategy)
* Editting the Hero via wp-admin:
  * change markup to match other heros (added <p> tags)
  * re-uploaded a thumbnail image. for some reason, it was not using the other uploaded one

to change the sort order of heros, change the published date. most recent will show first.


