HbbTV Logger
=========

This Logger is a Showcase of the [Smart Media Systems] Hbbtv library logging functions

Tech
-----------

Based on:

* [HbbTV] - v1.x.x - see [specification] (v1.2.1 errata 1)
* [log4php] - v2.3.0
* [Slim] - v2.3.0


Installation
--------------

- run on an apache server of your choice e.g. xampp (PHP has to be installed)
- make sure the rewrite rule allows rerouting from the index.php
- make sure file permissions on logfiles allow the server to write

Configuration
--------------

The log4php logger is configured in the log_config.xml file as specified by [log4php].
By default it is a simple File logger logging to the two files service_error.log and service_info.log

available log levels are TRACE,INFO,DEBUG,WARN,ERROR,FATAL




License
--------

GNU - GPL-3.0+



Need professional help?
--------------
Don't hesitate to contact [Smart Media Systems] for professional HbbTV and Smart-TV applications including 2nd-Screen connectivity and cloud services.



[HbbTV]:http://hbbtv.org
[Smart Media Systems]:http://smartmedia-systems.de
[specification]:http://hbbtv.org/pages/about_hbbtv/TS102796-v121-errata-1.pdf
[Slim]:http://www.slimframework.com/
[log4php]:http://logging.apache.org/log4php/