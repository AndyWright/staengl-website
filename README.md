staengl-website
===============

wordpress website for staengl engineering

TODO:

* set up wiki and document workflow
* set up hosting

###theme
the staengl theme is based on [wp-zurb-boilerplate](https://github.com/ngn33r/wp-zurb-boilerplate)

there are instructions there for setting up local development environment.

```
$ ln -s ~/wrk/staengl/staengl-website ~/wrk/staengl/wordpress/wp-content/themes/staengl-website
```


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