<?php

//  Configure runtime environment

set_time_limit(0);
error_reporting(E_ALL);
date_default_timezone_set("America/Los_Angeles");

//  Load configuration files

require_once("setpath.php");
require_once(CONFIG_PATH . CONFIG_FILE);
require_once(PHP_INCLUDE_PATH . "new_initialize.php");

//  Retrieve message count and set countlimit

$msgcount = imap_num_msg($mbox);
if($msgcount > 200)
{
    $countlimit = $msgcount - 199;
}
else
{
    $countlimit = 1;
}

//  Iterate through mailbox

if($msgcount > 0)
{
    $messages = array();
    for($msgno = $msgcount; $msgno >= $countlimit; $msgno--)
    {

//      Retrieve data from message header
        
		$uid = imap_uid($mbox, $msgno);
        $headobj = imap_headerinfo($mbox, $msgno);
        $header = json_decode(json_encode($headobj), true);
        $subject = $header['subject'];
        $xsubject = explode("realtor.com lead - ", $subject);
        $rentername = $xsubject[0];
        print $rentername . "\n";
        $imapid = $header['message_id'];
        print $imapid . "\n";
        $senderdomain = $header['from']['0']['host'];
        print $senderdomain . "\n";
        
//      Check whether lead was sent by correct domain        
        
        if($senderdomain = $domain)
        {
//          Check whether lead has previously been processed

            $dbcount = searchForMessageID($imapid, $mysqli);
            if($dbcount == 0)
            {
        
//          Retrieve data from message body

                $body = imap_body($mbox, $msgno, FT_PEEK);
                $divider = "=" . chr(13) . chr(10);
                $renterfirstname = tween($body, "firstName\": \"", "\",=");
                $renterlastname = tween($body, "lastName\": \"", "\",=");
                $rentername = $renterfirstname . " " . $renterlastname;
                $rentername = ucwords($rentername);
                print $rentername . "\n";
                $renteremail = tween($body, "email\": \"", "\",=");
                $encodedemail = urlencode($renteremail);
                $renterphoneblock = tween($body, "phone\": \"", "\",=");
                $renterphone = format_phone($renterphoneblock);
                $rentermessage = tween($body, "lead_message\" content=3D\"", "\" />=0D");
                $rentermessage = str_replace($divider, "", $rentermessage);
        
//              Isolate property address        
		
                $propertyaddressblock = tween($body, "property_address\" content=3D\"", "\" />=0D");
                $propertyaddressblock = str_replace($divider, "", $propertyaddressblock);
                $xpropertyaddress = explode("\"", $propertyaddressblock);
                $propertyaddress = $xpropertyaddress[0];
        
//              Isolate zip code        

                $zipcodeblock = tween($body, "SECTION: Listing details", "Beds <strong>");
                $zipcodeblock = str_replace($divider, "", $zipcodeblock);
                $address_space = $propertyaddress . " ";
                $zip = tween($zipcodeblock, $address_space, "</a>");
        
//              Isolate house number and renter message        
		
                $xpropertyaddress = explode(" ", $propertyaddress);
                $housenumber = $xpropertyaddress[0];
                $rentermessage = "I am interested in " . $propertyaddress . " " . $zip . ".";
        
//              Identify target property from house number and zip code        
        
                $dbquery = "select id_property, property_title, property_city, property_state, property_address ";
                $dbquery .= "from property where property_address like '" . $housenumber . "%' ";
                $dbquery .= "and property_zip = '" . $zip . "'";
                $dbresult = $mysqli->query($dbquery);
                $dbcount = mysqli_num_rows($dbresult);
                if($dbcount >= 1)
                {
                    $dbrow = $dbresult->fetch_assoc();
                	$id_property = $dbrow['id_property'];
                	$property_title = $dbrow['property_title'];
                    print $id_property . " " . $property_title . "\n";
                    $city = $dbrow['property_city'];
                    $state = $dbrow['property_state'];
                    $address = $dbrow['property_address'];
                    $url_title = str_replace(" ", "-", $property_title);
                	$url_city = str_replace(" ", "-", $city);
                	$listing_url = $url_stub . "/" . $url_title . "-" . $city . "-";
                	$listing_url .= $state . "-" . $zip . "/" . $id_property;
            
//		        	Retrieve manager template and fill in replacement parameters					
					
                	$search = array("%RENTERFULLNAME%", "%RENTERPHONE%", "%RENTEREMAIL%", "%RENTERMESSAGE%",
                		"%PROPERTYTITLE%", "%PROPERTYADDRESS%", "%PROPERTYCITY%", "%PROPERTYSTATE%",
                		"%PROPERTYZIP%", "%PROPERTYURL%");
                	$replace = array($rentername, $renterphone, $renteremail, $rentermessage, $property_title,
                		$address, $city, $state, $zip, $listing_url);
                	$template_path = PHP_TEMPLATE_PATH . "manager_template.html";
                	$raw_template = file_get_contents($template_path);
                	$mailbody = str_replace($search, $replace, $raw_template);
            
//		        	Retrieve and validate property email adresses from database					
					
                	$property_emails = array();
                	$property_phones = array();
                	$dbquery = "select email as email1, cc_email as email2, cc_email_2 as email3,
                		cc_email_3 as email4, cc_email_4 as email5, bcc_email, phone as phone1 from property_contact
                		where id_property = '" . $id_property . "'";
                	$dbresult = $mysqli->query($dbquery);
                	$dbcount = mysqli_num_rows($dbresult);
                	if($dbcount >= 1)
                	{
                		$dbrow = $dbresult->fetch_assoc();
                		$bcc_email = $dbrow['bcc_email'];
                		$phone1 = $dbrow['phone1'];
                		if(strlen($phone1) > 0)
                		{
                			$property_phones[] = $phone1;
                		}
                		if(strlen($bcc_email) > 0)
                		{
                			if(filter_var($bcc_email, FILTER_VALIDATE_EMAIL))
                			{
                				$message->addBCC($bcc_email, $property_title);
                			}
                		}
                		$email1 = $dbrow['email1'];
                		if(strlen($email1) > 0)
                		{
                			if(filter_var($email1, FILTER_VALIDATE_EMAIL))
                			{
                				$property_emails[] = $email1;
                			}
                		}
                		$email2 = $dbrow['email2'];
                		if(strlen($email2) > 0)
                		{
                			if(filter_var($email2, FILTER_VALIDATE_EMAIL))
                			{
                				$property_emails[] = $email2;
                			}
                		}
                		$email3 = $dbrow['email3'];
                		if(strlen($email3) > 0)
                		{
                			if(filter_var($email3, FILTER_VALIDATE_EMAIL))
                			{
                				$property_emails[] = $email3;
                			}
                		}
                		$email4 = $dbrow['email4'];
                		if(strlen($email4) > 0)
                		{
                			if(filter_var($email4, FILTER_VALIDATE_EMAIL))
                			{
                				$property_emails[] = $email4;
                			}
                		}
                		$email5 = $dbrow['email5'];
                		if(strlen($email5) > 0)
                		{
                			if(filter_var($email5, FILTER_VALIDATE_EMAIL))
                			{
                				$property_emails[] = $email5;
                			}
                		}
                        
                        print sizeof($property_emails) . " email addresses in property emails\n";
                        
                        foreach($property_emails as $recipient)
                        {
                            print $recipient . "\n";
                        }
                        
                		$dbquery = "select phone as phone2 from property_contact where id_property = '" . $id_property . "'";
                		$dbresult = $mysqli->query($dbquery);
                		$dbrow = $dbresult->fetch_assoc();
                		$phone2 = $dbrow['phone2'];
                		if(strlen($phone2) > 0)
                		{
                			$property_phones[] = $phone2;
                		}
                        $property_phone = "";
                		if(sizeof($property_phones) > 0)
                		{
                			$property_phone = $property_phones[0];
                		}            
            
//		        		If we have one or more valid property emails, create and send manager message

                        if(sizeof($property_emails) > 0)
                		{
                            $mailsubject = "Renter Lead for " . $property_title . " on RentalHousingDeals.com";
                			$mailtoname = "Manager";
                			$message = $message1;
                			$message->isSMTP();
                			$message->SMTPDebug = 2;
                			$message->Debugoutput = "html";
                			$message->Host = SMTP_SERVER;
                			$message->Port = SMTP_PORT;
                			$message->SMTPAutoTLS = TRUE;
                			$message->SMTPAuth = TRUE;
                			$message->Username = SMTP_USERNAME;
                			$message->Password = SMTP_PASSWORD;
                			$message->isHTML(TRUE);
                			$message->setFrom($mailfromaddr, $mailfromname);
                			$message->addReplyTo($mailreplytoaddr, $mailreplytoname);
                			$message->Subject = $mailsubject;
                			$message->Body = $mailbody;
                			foreach($property_emails as $managermail)
                			{
                				$message->addAddress($managermail, $mailtoname);
                			}
                			$message->addBCC("outboundbcc@rentalhousingdeals.com", "Outbound BCC");
                			$manager_sent = $message->send();
                        }
                    }
                
//		        	Retrieve renter template and fill in replacement parameters

                    $search = array("%PROPERTYTITLE%", "%PROPERTYADDRESS%", "%PROPERTYCITY%",
                		"%PROPERTYSTATE%", "%PROPERTYZIP%", "%PROPERTYPHONE%", "%PROPERTYURL%",
                        "%SUBIDTAG%", "%ENCCODEDEMAIL%");
                	$replace = array($property_title, $address, $city, $state, $zip, $property_phone,
                		$listing_url, $subidtag, $encodedemail);
                	$template_path = PHP_TEMPLATE_PATH . "renter_template.html";
                	$raw_template = file_get_contents($template_path);
                	$mailbody = str_replace($search, $replace, $raw_template);            
    
//		        	If valid renter email addresss, proceed

                	if(filter_var($renteremail, FILTER_VALIDATE_EMAIL))
                	{
                        $mailsubject = "Your Inquiry About " . $property_title . " on RentalHousingDeals.com";
                		$mailtoname = $rentername;
                		$message = $message2;
                		$message->isSMTP();
                		$message->SMTPDebug = 2;
                		$message->Debugoutput = "html";
                		$message->Host = SMTP_SERVER;
                		$message->Port = SMTP_PORT;
                		$message->SMTPAutoTLS = TRUE;
                		$message->SMTPAuth = TRUE;
                		$message->Username = SMTP_USERNAME;
                		$message->Password = SMTP_PASSWORD;
                		$message->isHTML(TRUE);
                		$message->setFrom($mailfromaddr, $mailfromname);
                		$message->addReplyTo($mailreplytoaddr, $mailreplytoname);
                		$message->Subject = $mailsubject;
                		$message->Body = $mailbody;
                		$message->addAddress($renteremail, $mailtoname);
                		$message->addBCC("outboundbcc@rentalhousingdeals.com", "Outbound BCC");
                		$renter_sent = $message->send();
                    }
                
//                  Save lead to database

                    $savetime = date("Y-m-d H:i:s");
                    $dbquery = "insert into email_lead set affiliate_source = '" . $affiliate_source . "', created_at = '" . $savetime . "', ";
                    $dbquery .= "customer_email_sent = '" . $renter_sent . "', customer_info_sent = '0', email = '" . $renteremail;
                    $dbquery .= "', id_property = '" . $id_property . "', ip_address = '', lead_source = '" . $leadssource . "', ";
                    $dbquery .= "message = '', name = '" . $rentername . "', phone = '" . $renterphone . "', ";
                    $dbquery .= "property_address = '" . $address . "', imap_message_id = '" . $imapid . "', property_city = '" . $city;
                    $dbquery .= "', property_email_sent = '" . $manager_sent . "', property_state = '" . $state . "', ";
                    $dbquery .= "property_zip = '" . $zip . "', reply_to = '" . $renteremail . "', source_key ";
                    $dbquery .= "= 'R', status = 'Active', unsubscribe = '0', updated_at = '" . $savetime . "'";
                    $mysqli->query($dbquery);
                    $rowsdone = mysqli_affected_rows($mysqli);
                    print "REALTOR: SAVED TO DATABASE " . $rowsdone . " at " . $savetime . "\n";
            
//		    	    Mark lead for deletion from IMAP mailbox after processing
            
                    $msgno = imap_msgno($mbox, $uid);
                    imap_delete($mbox, $msgno);
                    print "REALTOR: DELETED FROM MAILBOX\n";
                     

                }       //  Property identified by house number and zip code
            }           //  Lead ID not previously processed
        }               //  Domains match
	}                   //  Iterate through messages
}                       //  Messages waiting in mailbox

//  Delete messages previously marked for deletion

imap_expunge($mbox);
print "REALTOR: MAILBOX EXPUNGED\n";
imap_close($mbox);

?>