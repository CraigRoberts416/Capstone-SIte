<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "352037987-gmk04jPQTrlrdXl74E5e1n3GnPko6CAsuDA0lL1E",
'oauth_access_token_secret' => "csHsci4QS9J28hbeBSCkyhwkbMExqbMvEGGfWP0qSaem4",
'consumer_key' => "23CzECqKmyTwwIQGLtGrXkBtL",
'consumer_secret' => "iAUBN3OIwErlvKunpegojiP0sWNN8Iolfk3CVPUEXbKQMzCPq5"
);

//$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$url = "https://api.twitter.com/1.1/search/tweets.json";

$requestMethod = "GET";

if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "CraigRoberts416";}

if (isset($_GET['count'])) {$coaunt = $_GET['count'];} else {$count = 20;}

//$getfield = "?screen_name=$user&count=$count";
$getfield = "?q=%23CraigRobertsRoom&count=1";

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);



if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}


foreach($string['statuses'] as $items)
    {
		$data = array('newTweet'=>$items['text'], 'newVid' =>$items['entities']['urls'][0]['expanded_url'],  'newPic' =>$items['entities']['media'][0]['media_url']);
		$newTweet = $items['text'];
		$newVid = $items['entities']['urls'][0]['expanded_url'];
		$newPic = $items['entities']['media'][0]['media_url'];
	
		echo json_encode($data);

    }
	
//header("Refresh:5");	
?>