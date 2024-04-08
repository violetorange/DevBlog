<!DOCTYPE html>
<html lang="en">

  <head>
    
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
    <title>DevBlog</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="/images/favicon/apple-touch-icon.png">
    
    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="/css/plugin.css">
    
    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    
    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    
    
    <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    

  </head>

 <body>

	
     
	 <!-- Preloader Start -->
     <div class="preloader">
	   <div class="rounder"></div>
      </div>
      <!-- Preloader End -->
      
      
    
    
    <div id="main">
        <div class="container">
            <div class="row">
            	
               
                 
                 <!-- About Me (Left Sidebar) Start -->
                 <div class="col-md-3">
                   <div class="about-fixed">
                    
                     <div class="my-pic">
                        <? if (!empty($user)): ?>
                          <? if ($user->isAdmin()): ?>
                            <img src="/images/pic/admin.png" alt="">
                          <? else: ?>
                          <img src="/images/pic/user.png" alt="">
                          <? endif ?>
                        <? else: ?>
                          <img src="/images/pic/unauthorized.png" alt="">
                        <? endif ?>
                        <a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse"><i class="icon-menu menu"></i></a>
                         <div id="menu" class="collapse">
                           <ul class="menu-link">
                               <li><a href="about.html">About</a></li>
                               <li><a href="work.html">Work</a></li>
                               <li><a href="contact.html">Contact</a></li>
                            </ul>
                         </div>
                        </div>
                      
                      
                      
                      <div class="my-detail">
                    	
                        <div class="white-spacing">
                        <? if (!empty($user)) { ?>
                            <h1><?= $user->getNickname()?></h1>
                            <span><?= $user->isAdmin() ? 'Администратор' : 'Гость'?></span>
                        <? } else { ?>
                            <a href="/users/login">Войти</a><br>
                            <a href="/users/register">Зарегистрироваться</a><br>
                        <? } ?>
                        </div> 

                    </div>
                  </div>
                </div>
                <!-- About Me (Left Sidebar) End -->
                
                
                
                
                 
                 <!-- Blog Post (Right Sidebar) Start -->
                 <div class="col-md-9">
                    <div class="col-md-12 page-body">
                    	<div class="row">
                    		
                            
                            <div class="sub-title">
                           		<h2><a href="/">DevBlog</a></h2>
                                <? if (!empty($user)): ?>
                                    <? if ($user->isAdmin()):?>
                                        <a href="/admin"><i class="icon-lock-open"></i></a>
                                    <? endif ?>
                                    <a href="/users/logout"><i class="icon-logout"></i></a>
                                    <a href="/articles/add"><i class="icon-plus"></i></a>
                                <? endif ?>
                             </div>
                             <div class="col-md-12 content-page">