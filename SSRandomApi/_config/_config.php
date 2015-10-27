<?php
/**
 * Created by PhpStorm.
 * User: yarhtut
 * Date: 27/10/15
 * Time: 8:21 AM
 */

//Basics of config file
define('MODULE_RANDOMAPI_DIR', basename(dirname(__FILE__)));
DataObject::add_extension('SiteTree', 'RandomApi');

