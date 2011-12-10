<?php
session_start();

require_once 'common.php';

if (isset($_GET['page'])) {
   $page = $_GET['page'];
} else {
   $page = '';
}

$list = 0;

if ($page == 'home') {
   $include = 'landing.php';
} elseif ($page == '') {
   $include = 'landing.php';
} elseif ($page == 'edit') {
   $include = 'mylist.php';
} elseif (is_numeric($page)) {
   $list = $page;
   $include = 'list.php';
} else {
   $include = '404.php';
}

if (!$list) {
   require('src/facebook.php');
   
   $facebook = new Facebook(array(  
       'appId'  => '268724529838969',  
       'secret' => 'cfc94cecaed22dab0d768aade735d706',  
       'cookie' => true  
   ));
   
   $fb_user = $facebook->getUser();
   
   if ($fb_user) {
      try {
         $user_profile = $facebook->api('/me');
      } catch (FacebookApiException $e) {
         error_log($e);
         $fb_user = null;
      }
   }
   
   if ($fb_user) {
      $logoutUrl = $facebook->getLogoutUrl();
      
      $user = CatalystUser::getByOauthUid($fb_user);
         
      if (!$user) {
               
         $user = new CatalystUser();
         $user->email = $user_profile['email'];
         $user->name = $user_profile['name'];
         $user->oauth_provider = 'Facebook';
         $user->oauth_uid = $user_profile['id'];
               
         $user->save();
               
         $user = CatalystUser::getByOauthUid($fb_user);
         
      }
      
      $_SESSION['user_id'] = $user->id;
            
      $items = $user->getItems();
      
      $include = 'mylist.php';
      
   } else {
      $params = array(
         scope => 'email, user_about_me, publish_actions, user_location',
         redirect_uri => 'http://dev.yourbucketli.st/',
         display => 'popup'
      );
      $loginUrl = $facebook->getLoginUrl($params);
   }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LifeCataly.st</title>
    <meta name="description" content="Create a list of what you want to accomplish in your life, and we help you accomplish those goals.">
    <meta name="author" content="&copy; Life Catalyst 2011">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

   </head>

   <body>
   <div id='fb-root'></div>
   <script src='http://connect.facebook.net/en_US/all.js'></script>
  
    <nav role="navigation" class="fill topbar">
        <div class="container">
          <img align="left" width="80" hight="105" src="images/logoicon.png">
            <a class="brand" href="/">Your Bucket List</a>
            
          <div class="pull-right btn info">beta</div>
        </div>
    </nav> <!-- /navigation -->

   <?php include($include); ?>

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
   
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
   <script>window.jQuery||document.write('<script src="js/jquery-1.6.4.min.js"><\/script>');</script>
          
   <script defer src="js/plugins.js"></script>
   <script defer src="js/script.js"></script>
   <script defer src="js/form_submit.js"></script>
   <script defer src="js/bootstrap/bootstrap-modal.js"></script>
   
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   
   <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
   	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
</body>
</html>
