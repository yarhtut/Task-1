<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => '',
	"database" => 'SS_mysite',
	"path" => '',
);


// set the url for Module
RandomApi::setUrl('http://api.randomuser.me');
RandomApi::setParams('/?results=3');




// Set the site locale
i18n::set_locale('en_US');