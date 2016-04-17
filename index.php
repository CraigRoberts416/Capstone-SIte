<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Test Twitter</title>
</head>

<?php
require_once('TwitterAPIExchange.php');

$getfield = '?screen_name=iagdotme&count=20';
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "352037987-LQMtHQzhtaBpbb8TyFAkVx2lOSP2IDuwMaTJnuS5",
    'oauth_access_token_secret' => "	Wi45eNMX06urGts4PN4ZEvy2GQgSFvihXTsVSHQj5PGxx",
    'consumer_key' => "23CzECqKmyTwwIQGLtGrXkBtL",
    'consumer_secret' => "iAUBN3OIwErlvKunpegojiP0sWNN8Iolfk3CVPUEXbKQMzCPq5"
	);
	


$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
			 
$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);
			 
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

echo "<pre>";
print_r($string);
echo "</pre>";

foreach($string as $items)
    {
        echo $items['created_at']."<br />";
        echo $items['text']."<br />";
    }
	
	
?>

<body>
</body>
</html>