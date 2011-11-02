<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Yourbucketli.st - Kick your bucket list</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

    <!-- Le fav and touch icons 
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png"> -->
  </head>

  <body>
  
   <div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    // init
	    FB.init({
	      appId      : '268724529838969',
	      status     : true, 
	      cookie     : true,
	      oauth 	 : true,
	      xfbml      : true
	    });
	    
	    // check if user is logged in
	    FB.getLoginStatus(function(response) {
	    
         // if logged in, get lists
         if (response.authResponse) {
         
            FB.api('/me', function(response) {
            
               var myname = response.name;
               var myemail = response.email;
               
               document.cookie = "name="+myname+";expires=15/02/2012 00:00:00";
               document.cookie = "email="+myemail+";expires=15/02/2012 00:00:00";
               
               var html = '<li><a href="#mylist.php" rel="ajax">'+myname+'\'s List</a></li>';

               $('.nav').append(html);
               
               getPage.isLoaded = false;
           
               //remove the # value
               hash = 'mylist.php';
               
               //for back button
               $.history.load(hash);  
               
               //clear the selected class and add the class class to the selected link
               $('a[rel=ajax]').parent().removeClass('active');
               
               //hide the content
               $('#content').fadeTo(1, 0.01);
               
               //run the ajax
               getPage();
               
            });
            
         // if not logged in, show login button
         } else {
            
            document.getElementById('login_button').style.display = 'block';
            document.getElementById('login_tag').style.display = 'block';
         }
         
      });
       
      FB.Event.subscribe('auth.login',
          function(response) {
              FB.api('/me', function(response) {
               var myname = response.name;
                              
               var html = '<li><a href="#mylist.php" class=\'active\' rel="ajax">'+myname+'\'s List</a></li>';

               $('.nav').append(html);
               
            });
              
              
              getPage.isLoaded = false;
           
              //remove the # value
              hash = 'mylist.php';
              
              //for back button
              $.history.load(hash);  
              
              //clear the selected class and add the class class to the selected link
              $('a[rel=ajax]').parent().removeClass('active');
              
              //hide the content
              $('#content').fadeTo(1, 0.01);
              
              //run the ajax
              getPage();
                            
          }
      );
	    
	  };
	(function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
	</script>

    <nav role="navigation" class="topbar">
      <div class="fill">
        <div class="container">
          <img align="left" width="80" hight="105" src="images/logoicon.png">
          <a class="brand" href="index.html">Your Bucket List</a>
          <ul class="nav">
            
                        
          </ul>
          <div class="pull-right btn info">BETA!</div>
        </div>
      </div>
    </nav> <!-- /navigation -->

   