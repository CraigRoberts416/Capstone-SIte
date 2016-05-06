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

if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}

//$getfield = "?screen_name=$user&count=$count";
$getfield = "?q=%23CraigRobertsRoom&count=1";

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);



if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}


foreach($string['statuses'] as $items)
    {
		
		
		?>
    
    
    
    
    <!doctype html>
<html>

    <head>
    	<link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta charset="UTF-8">
        
        <title>Entertain</title>
    
    </head>
    
    <body>
    
    
    <?php
        echo "<div id='tweetFeed'style='opacity:0'>". $items['entities']['urls'][0]['expanded_url']."</div>";
	?>
    
    <div id="entertainContainer">
  
            <div id="entertainment"></div>
        
    </div>
    
     <div id="entConsole">
		<iframe width="853" height="480" src="" frameborder="0" allowfullscreen></iframe>
    </div>

    
</body>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>
    <script type="text/javascript" src="js/twitterFetcher_min.js"></script>
    <script type="text/javascript" src="js/exampleUsage.js"></script>
	<script>
	
	$(document).ready(function() {
		var saver1 = $("#tweetFeed").text();
		//alert(saver1);
		$("#entertainment").hide();
		
		
		
		
		
		setInterval(function(){ 
		
		var test_str = $("#tweetFeed").text();
		
		if(test_str.indexOf("http://youtu.be/")>0){
		//if(saver1!=saver2){
		$("#entConsole").html(function(index, text) {
		
		var start_pos = test_str.indexOf("http://youtu.be/")+16;
		var end_pos = test_str.indexOf('O',start_pos);
		var text_to_get = test_str.substring(start_pos,(start_pos +11));
		var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		//saver1 = saver2;
            return html;
        });
		//}
		}
		
		else if(test_str.indexOf("https://youtu.be/")>0){
		//if(saver1!=saver2){
		$("#entConsole").html(function(index, text) {
		
		var start_pos = test_str.indexOf("https://youtu.be/")+17;
		var end_pos = test_str.indexOf('O',start_pos);
		var text_to_get = test_str.substring(start_pos,(start_pos +11));
		var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		//saver1 = saver2;
            return html;
        });
		//}
		}
		
		else if(test_str.indexOf("https://www.youtube.com/watch?v")>0){
		//if(saver1!=saver2){

		$("#entConsole").html(function(index, text) {
		var start_pos = test_str.indexOf("https://www.youtube.com/watch?v")+32;
		var end_pos = test_str.indexOf('O',start_pos);
		var text_to_get = test_str.substring(start_pos,(start_pos +11));
		//alert(text_to_get);
		var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		//saver1 = saver2;
            return html;
        });
		//}
		}
		
		else if(test_str.indexOf("http://www.youtube.com/watch?v")>0){
		//if(saver1!=saver2){
		$("#entConsole").html(function(index, text) {
		var start_pos = test_str.indexOf("http://www.youtube.com/watch?v")+31;
		var end_pos = test_str.indexOf('O',start_pos);
		var text_to_get = test_str.substring(start_pos,(start_pos +11));
		//alert(text_to_get);
		var html = '<iframe style="width:100vw; height:100vh;" src="http://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		//saver1 = saver2;
            return html;
        });
		//}
		}
		
		
		
		}, 20000);
		
		//600000
		
	});
		
	function urlify(text) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function(url) {
        return '<a href="' + url + '/">' + url + '</a>';
    })
    // or alternatively
    // return text.replace(urlRegex, '<a href="$1">$1</a>')
	}

	</script>
</html>

  
            
        
    
    
    
	
    
  
    
    
    
    
    
    
    
	<?php
    }
	
//header("Refresh:5");	
?>