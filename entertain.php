<!doctype html>
<html>

    <head>
    	<link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <meta charset="UTF-8">
        
        <title>Entertain</title>
    
    </head>
    
    <body>
    
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
		var saver1 = "";
		var saver2 = "";
		//alert(saver1);
		$("#entertainment").hide();
		
		
		
		
		
		setInterval(function(){ 
		
		$.ajax({
			type:"GET",
			url: "http://craigrobertsstudio.com/getTweet.php?	",
			dataType: 'json',
			success: function (data) {
				$('#tweetFeed').html(data.newVid);
			}
		});
		
		//alert($("#tweetFeed").text());
		
		saver1 = $("#tweetFeed").text();
		
		
		//alert(saver1.indexOf("https://www.youtube.com/watch?v"));
		
		if(saver1.indexOf("http://youtu.be/")>-1){
		if(saver2!=saver1){
		$("#entConsole").html(function(index, text) {
		
		var start_pos = saver1.indexOf("http://youtu.be/")+16;
		var end_pos = saver1.indexOf('O',start_pos);
		var text_to_get = saver1.substring(start_pos,(start_pos +11));
		var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		saver2 = saver1;
            return html;
        });
		}
		}
		
		else if(saver1.indexOf("https://youtu.be/")>-1){
		if(saver2!=saver1){
		$("#entConsole").html(function(index, text) {
		
		var start_pos = saver1.indexOf("https://youtu.be/")+17;
		var end_pos = saver1.indexOf('O',start_pos);
		var text_to_get = saver1.substring(start_pos,(start_pos +11));
		var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		saver2 = saver1;
            return html;
        });
		}
		}
		
		else if(saver1.indexOf("https://www.youtube.com/watch?v")>-1){
			if(saver2!=saver1){
	
				$("#entConsole").html(function(index, text) {
					var start_pos = saver1.indexOf("https://www.youtube.com/watch?v")+32;
					var end_pos = saver1.indexOf('O',start_pos);
					var text_to_get = saver1.substring(start_pos,(start_pos +11));
					//alert(text_to_get);
					var html = '<iframe style="width:100vw; height:100vh;" src="https://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
					saver2 = saver1;
						return html;
				});
			}
		}
		
		else if(saver1.indexOf("http://www.youtube.com/watch?v")>-1){
		if(saver2!=saver1){
		$("#entConsole").html(function(index, text) {
		var start_pos = saver1.indexOf("http://www.youtube.com/watch?v")+31;
		var end_pos = saver1.indexOf('O',start_pos);
		var text_to_get = saver1.substring(start_pos,(start_pos +11));
		//alert(text_to_get);
		var html = '<iframe style="width:100vw; height:100vh;" src="http://www.youtube.com/embed/'+text_to_get+'?autoplay=1;loop=1;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
		saver2 = saver1;
            return html;
        });
		}
		}
		
		
		
		}, 6000);
		
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