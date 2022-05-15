# Google Proxy for IE8

Simple Google Search Wrapper + Proxy build on top of [**php-proxy library**](https://github.com/Athlon1600/php-proxy) ready to be installed on your server. make old Windows XP IE8 works again... 

#### /templates/

This should have been named "views", but for historic purposes we keep it named as templates for now. The template that's changed is url_form.php

#### /plugins/

PHP-Proxy provides many of its own native plugins, but users are free to write their own custom plugins, which could then be automatically loaded from this very folder. See /plugins/TestPlugin.php for an example.

I personally add GooglePlugin.php for better google search view on IE 8 windows XP