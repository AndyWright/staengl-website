staengl-website
===============

wordpress website for staengl engineering

made some good use of [this github repo](https://github.com/wilhelser/WordPress-Scripts)

TODO:

* set up wiki and document workflow
* set up hosting
* make rsync deploy with css and js compression
* 404, 500, error pages

* home page
  * make Hero image rotator work
  * substitute Solar Panel image with cropped one from Crossings (ip)
  * replace integral group logo with Architecture 2030 Challenge (done)
* company page
  * Galen headshot and bio (ip)
  * logos (done)
* services page
  * Revit3D image
  * Longridge model image


###content
is in [jumpchart](https://engineearring.jumpchart.com/site/view/131622/)

###theme
the staengl theme is based on [wp-zurb-boilerplate](https://github.com/ngn33r/wp-zurb-boilerplate)

there are instructions there for setting up local development environment.

```
$ ln -s ~/wrk/staengl/staengl-website ~/wrk/staengl/wordpress/wp-content/themes/staengl-website
```

### site urls
[local development](http://staengl.dev/company/)
[staging](http://staengl.engine-earring.com/company/)

###links to check out
* http://theme.fm/2011/08/tutorial-deploying-wordpress-with-capistrano-2082/
* http://roybarber.com/version-controlling-wordpress/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://mattbanks.me/wordpress-deployments-with-git/
* http://www.walmik.com/2012/03/manage-your-custom-wordpress-theme-using-git-instead-of-ftp/


deployment
=====

make sure __.htaccess__ is writable in the wordpress dir or set it to have this content:

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