<?php
/* 
 * This is a lightweight logging backend 
 * using the SlimPHP and log4PHP frameworks
 * for use with hbbtv apps
 *
 * @author: Benjamin Winter
 */

require 'Slim/Slim.php';
include('log4php/Logger.php');

/* 
 * configure logger with sanmple configs log_config.xml 
 * for logging everything in one file
 * and log_config_2files.xml 
 * for seperate logging of lower levels and higher levels
 */
Logger::configure('log_config.xml');

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//contenttypes is needed to use the json format in request bodies
$app->add(new \Slim\Middleware\ContentTypes());

/* 
 * Logging Route
 * expects json post request with variables
 * and writes them according to your configured logger
 * @msg: Message to be logged 
 * @level: loglevel, one of :[TRACE,DEBUG,INFO,WARN,ERROR,FATAL] or [1, 2, 3, 4, 5, 6] respectively
 * @ident: client identification ID from the HBBtv
 */
$app->post(
    '/api/v1/portal/log',
    function () {
        $app = \Slim\Slim::getInstance();
        $log = Logger::getLogger('myLogger');

        $data = $app->request->getBody();
        switch(strtolower($data["level"])) {
            case "1":
            case "trace": $log->trace($data["msg"]);break;
            case "2":
            case "debug": $log->debug($data["msg"]);break;
            case "3":
            case "info": $log->info($data["msg"]);break;
            case "4":
            case "warn": $log->warn($data["msg"]);break;
            case "5":
            case "error": $log->error($data["msg"]);break;
            case "6":
            case "fatal": $log->fatal($data["msg"]);break;
            default: echo "Error:unknown loglevel";
        }
    }
);

//The next line should be the last line of this file
$app->run();
