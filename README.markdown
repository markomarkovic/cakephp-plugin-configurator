# CakePHP Configurator plugin
Enables creation of _key => value_ pairs in the database that you can read everywhere in your app using _Configure::read($key);_ method.


## Installation and usage
First download or checkout the code for the Configurator and put it in your _app/plugins_ directory. The directory structure should look like this:

    /app
       /plugins
          /configurator
             /controllers
             /models
             /views

Create the database table:

    CREATE TABLE `configurations` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `key` varchar(255) DEFAULT NULL,
      `value` text,
      `created` datetime DEFAULT NULL,
      `modified` datetime DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `key` (`key`)
    ) DEFAULT CHARSET=utf8;

Add the _Configurator.Configure_ to the _$components_ in the _AppController_:

    ...
    var $components = array('Configurator.Configure');
    ...

If you wish to use the web front-end to change the configuration, make sure _admin_ routing prefix is enabled in the _app/config/core.php_

    ...
    Configure::write('Routing.prefixes', array('admin'));
    ...

and go to _YOUR_SITE/admin/configurator/configurations_ in your browser.

Create some keys, for example: _Site.title_ and read them anywhere in the app by calling _Configure::read('Site.title');_

And that's it!


## Note
By default, the creation of the following keys and sub-keys is not possible because it might be risky and/or unpredictable: *debug, log, App, Routing, Cache, Session, Security, Asset and Acl*. If you wish to be able to create/modify them, change the _app/plugins/configurator/models/configuration.php_ accordingly.


## CakePHP 1.2 users
The plugins should work for you too, you'll just need to edit the _app/plugins/configurator/views/configurations/*.ctp_ files if you wish to use the front-end. Replace _$this->Html_ with _$html_, _$this->Paginator_ with _$paginator_ etc.
Set the _Routing.admin_ to _admin_ in your _app/config/core.php_


## Licence
Released under The MIT License

