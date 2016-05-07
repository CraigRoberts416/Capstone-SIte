<!doctype html>
<html>

    <head>
    	<link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta charset="UTF-8">
        
        <title>Capstone</title>
    
    </head>
    
    <body>
    
    
    <div id="bigTweetContainer">
  
            <div id="bigTweet"></div>
             <div id="tweetImage"></div>
        
    </div>

    
    </body>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>
    <script type="text/javascript" src="js/twitterFetcher_min.js"></script>
    <script type="text/javascript" src="js/exampleUsage.js"></script>
	<script>
	
	$(document).ready(function() {
		
		setInterval(function(){ 
		
		$.ajax({
			type:"GET",
			url: "http://craigrobertsstudio.com/getTweet.php?	",
			dataType: 'json',
			success: function (data) {
				$('#bigTweet').html(data.newTweet);
				$('#tweetImage').html('<img src='+data.newPic+' />');
				//alert($('#tweetImage').html())
			}
		});
		
	}, 5000);
	
	});

	</script>
</html>