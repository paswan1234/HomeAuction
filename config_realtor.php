<?php

//	C O N F I G

//  Set MySQL credentials for database server
define("MYSQL_HOSTNAME", "ds12483.dreamservers.com");
define("MYSQL_USERNAME", "redshank");
define("MYSQL_PASSWORD", "&biRd_54-cAge%");
define("MYSQL_DATABASE", "rhddb_dhnew");

//	Set IMAP credentials for inbound mail server
define("MAIL_SERVER", "imap.dreamhost.com");
define("MAIL_USERNAME", "realtor2@rentalhousingdeals.com");
define("MAIL_PASSWORD", "wiTv30nYrx");

//	Set SMTP credentials for outbound mail server
define("SMTP_SERVER", "smtp.sparkpostmail.com");
define("SMTP_USERNAME", "SMTP_Injection");
define("SMTP_PASSWORD", "19bda08482c530d84187aaf1ea835165677d72a6");
define("SMTP_PORT", 2525); // 587 or 2525

//  Set PHPMailer path
define("PHPMAILER_LIB_PATH", "/xampp/PHPMailer/");

//	Set PHP paths
define("PHP_HOME_PATH", "/xampp/htdocs/");
define("PHP_SERVER_PATH", PHP_HOME_PATH . "server/");
define("PHP_APP_PATH", PHP_SERVER_PATH . "realtor/");
define("PHP_INCLUDE_PATH", PHP_APP_PATH . "include/");
define("PHP_TEMPLATE_PATH", PHP_SERVER_PATH . "templates/");

?>