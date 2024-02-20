<?php

//	Configure runtime environment

set_time_limit(0);
date_default_timezone_set("America/Los_Angeles");
error_reporting(E_ALL);

//  Load configuration files

require_once("setpath.php");
require_once(CONFIG_PATH . CONFIG_FILE);

//	Initialize PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once("/xampp/PHPMailer/src/Exception.php");
require_once("/xampp/PHPMailer/src/PHPMailer.php");
require_once("/xampp/PHPMailer/src/SMTP.php");

//	Create two new messages

$message1 = new PHPMailer();
$message2 = new PHPMailer();

//  Open the RHD database

$mysqli = new mysqli(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

//  Open the IMAP mailbox

$imaplogin = "{" . MAIL_SERVER . ":993/imap/ssl/novalidate-cert}INBOX";
$mbox = imap_open($imaplogin, MAIL_USERNAME, MAIL_PASSWORD);

//	Set constants

$affiliate_source = "REALTOR.com";
$bcc_mark = "bccleads@rentalhousingdeals.com";
$div = "=\r\n";
$domain = "email.realtor.com";
$lead_source = "realtor.com";
$leadssource = "realtor.com";
$mailfromaddr = "info@rentalhousingdeals.com";
$mailfromname = "info@rentalhousingdeals.com";
$mailreplytoaddr = "info@rentalhousingdeals.com";
$mailreplytoname = "info@rentalhousingdeals.com";
$manager_sent = 0;
$renter_sent = 0;
$source_key = "R";
$status = "Active";
$subidtag = "RLT";
$url_stub = "https://rentalhousingdeals.com/apartments-for-rent/";

//	Open connection to RHD database

$rhd = new mysqli("chipmunk.sangabrielvillage.com", "redshank", "&biRd_54-cAge%", "rhddb_dhnew");

//	Open connection to IMAP mail server

$imaplogin = "{" . MAIL_SERVER . ":993/imap/ssl/novalidate-cert}INBOX";		// Change from INBOX.Leads to INBOX for production
$mbox = imap_open($imaplogin, MAIL_USERNAME, MAIL_PASSWORD);


//  F U N C T I O N S

function tween($string, $start, $end)
{
	$string = " " . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return "";
	$ini += strlen($start);   
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

function format_phone($rawphone)
{
    $areacode = substr($rawphone, 0, 3);
    $exchange = substr($rawphone, 3, 3);
    $station = substr($rawphone, 6, 4);
    $phonenumber = "(" . $areacode . ") " . $exchange . "-" . $station;
    return $phonenumber;
}

function searchForMessageID($imapid, $mysqli)
{
	$dbquery = "select count(*) as dbcount from email_lead where imap_message_id = '" . $imapid . "'";
	$dbresult = $mysqli->query($dbquery);
	$dbrow = $dbresult->fetch_assoc();
	$dbcount = $dbrow['dbcount'];
	return $dbcount;
}

?>