<?php
/*
 Plugin Name: Instagram
 Plugin URI: http://github.com/ginatrapani/thinkup/tree/master/webapp/plugins/facebook/
 Description: Capture and display Instagram posts.
 Class: InstagramPlugin
 Icon: assets/img/instagram_icon.png
 Version: 0.01
 Author: Dimosthenis Nikoudis
 */

if (!class_exists('Instagram\Instagram')) {
    Loader::addSpecialClass('SplClassLoader', 'plugins/instagram/extlib/SplClassLoader.php');
    $loader = new SplClassLoader('Instagram', 'plugins/instagram/extlib');
    $loader->register();
}

$webapp_plugin_registrar = PluginRegistrarWebapp::getInstance();
$webapp_plugin_registrar->registerPlugin('instagram', 'InstagramPlugin');
$webapp_plugin_registrar->registerPlugin('instagram page', 'InstagramPlugin');

$crawler_plugin_registrar = PluginRegistrarCrawler::getInstance();
$crawler_plugin_registrar->registerCrawlerPlugin('InstagramPlugin');