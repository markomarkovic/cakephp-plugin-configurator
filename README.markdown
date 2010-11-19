# CakePHP Configurator plugin
The Configurator plugin is an extremely useful way to store site-wide configuration. It stores configuration into your database and is made available throughout your site (views, controllers, models, tasks, etc.)

## Installation and usage
First download or checkout the code for the Configurator and put it in your _app/plugins_ directory. The directory structure should look like this:

    /app
       /plugins
          /configurator
             /config
             /controllers
             /models
             /views

Create the database table either by running

    $ cd your_app_directory
    $ cake schema create -plugin configurator


or importing the _configurator/config/schema.sql_ file. That will create the _configurations_ database table.

Add the _Configurator.Configure_ to the _$components_ in the _AppController_:

    ...
    var $components = array('Configurator.Configure');
    ...

If you wish to use the web front-end to change the configuration, make sure _admin_ routing prefix is enabled in the _app/config/core.php_

    ...
    Configure::write('Routing.prefixes', array('admin'));
    ...

and go to _YOUR_SITE/admin/configurator/configurations_ in your browser.

Create some keys, for example: _Site.title_. After they're saved, you can read them from anywhere inside the application using the _[Configure::read($key)](http://book.cakephp.org/view/924/The-Configuration-Class#read-927)_ method.

    ...
    <title>
       <?php echo Configure::read('Site.title'); ?> -
       <?php echo $title_for_layout; ?>
    </title>
    ...


## Note
By default, the creation of the following keys and sub-keys is not possible because it might be risky and/or unpredictable: *debug, log, App, Routing, Cache, Session, Security, Asset and Acl*. If you wish to be able to create/modify them, change the _configurator/models/configuration.php_ accordingly.


## CakePHP 1.2 users
The plugins should work for you too but you'll have to use the views from the [cake-1.2 branch](https://github.com/markomarkovic/cakephp-plugin-configurator/tree/cake-1.2).

## Licence
Released under The MIT License

## Credits
[Inspired](http://okram.civokram.com/post/1614903412/configurator-plugin-for-cakephp) by [CakePHP Configuration Plugin](http://www.webtechnick.com/blogs/view/223/CakePHP_Configuration_Plugin) by Nick Baker
