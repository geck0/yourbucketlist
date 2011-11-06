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

  </head>

  <body>
    <nav role="navigation" class="topbar">
      <div class="fill">
        <div class="container">
          <img align="left" width="80" hight="105" src="images/logoicon.png">
            <a class="brand" href="/">Your Bucket List</a>
            <ul class="nav">
          
            </ul>
          <div class="pull-right btn info">BETA!</div>
        </div>
      </div>
    </nav> <!-- /navigation -->

   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
   <script>window.jQuery||document.write('<script src="js/jquery-1.6.4.min.js"><\/script>');</script>
   
   <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
   <script src="http://code.google.com/apis/gears/gears_init.js"></script>
       
   <script defer src="js/plugins.js"></script>
   <script defer src="js/script.js"></script>
   
   <script defer src="js/form_submit.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   
   <script type="text/javascript">
   jQuery(document).ready(function() {
     jQuery(".content").hide();
     //toggle the componenet with class msg_body
     jQuery(".heading").click(function()
     {
       jQuery(this).next(".content").slideToggle(100);
     });
   });
   </script>
   
       
       
       
       <?php include('landing.php'); ?>
       
       
       
       
       
    <footer class="container">
    <div class="column2">
        	<p>
        	    	<ul type="none"> 
        				<li><a href="about.html" class="">About</a></li> 
        				<li><a href="http://yourbucketlistblog.tumblr.com/" class="">Blog</a></li> 
        			</ul>
        			</p>
        	    </div><!-- end #column1 -->
        	
        	    <div class="column2">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="http://www.facebook.com/urbucketlist" class="">Facebook</a></li> 
        				<li><a href="http://twitter.com/#!/yourbucketlst" class="">Twitter</a></li> 
        			</ul> 
        			</p>
        	    </div><!-- end #column2 -->
        	    <div class="column3">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="feedback.html" class="">Feedback</a></li> 
        				<li><a href="contact.html" class="">Contact</a></li> 
        			</ul>
        			</p>
        	    </div><!-- end #column3 -->
        	    <div class="column4">
        	    	<p>
        	    	<ul type="none"> 
        				<li><a href="press.html" class="">Press</a></li> 
        				<li><a href="careers.html" class="">Careers</a></li>
        			</ul>
        			</p>        
        		</div><!-- end #column4 -->
      <div class="copyright">
      	<p>&copy;yourbucketli.st  2011</p>
      	</div>
    </footer> <!-- /footer -->
    
	<section id="scripts">
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
		               
		               var myname = response.name,
		                   myemail = response.email,
		                   mypicture = response.picture;
		                   
		                   console.log(mypicture);
		               
		               
		               document.cookie = "name="+myname+";expires=15/02/2012 00:00:00";
		               document.cookie = "email="+myemail+";expires=15/02/2012 00:00:00";
		               
		               var html = '<span>' + myname + '\'s List</span>' +
		                   '<img src="' + mypicture + '" />';
		
		               $('.nav').append(html);
		               
		               var href = location.href;
		               
		               if (href.indexOf("mylist") == -1) {
		               
		                  window.location = "mylist.php";
		               
		               }
		               
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
		                              
		               var html = '<span>'+myname+'\'s List</span>';
		
		               $('.nav').append(html);
		               
		            });
		                            
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
	
		
		
		
		<!-- Change UA-XXXXX-X to be your site's ID 
		<script>
		  window._gaq = [['_setAccount','UA-23292973-1'],['_trackPageview'],['_trackPageLoadTime']];
		  Modernizr.load({
		    load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
		  });
		</script> -->
		
		<!--[if lt IE 7 ]><script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		    <script defer>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
		
	</section>
  </body>
</html>
