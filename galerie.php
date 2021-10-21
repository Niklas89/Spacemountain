<?php

  include 'config.php';
  

?>

<!DOCTYPE html> <!-- The new doctype -->
<html>
    <head>
        <meta name="description" content="Disneyland - Space Mountain: Mission 2">
        <meta name="keywords" content="disneyland, space mountain">
        <meta name="author" content="Francois Glotin">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Disneyland - Space Mountain: Mission 2</title>
        
        <link rel="stylesheet" type="text/css" href="styles.css" />
        
<script type="text/javascript"
    src="http://slideshow.triptracker.net/slide.js"></script>
<script type="text/javascript">
<!--
  var viewer = new PhotoViewer();
  viewer.add('/photos/my-photo-1.jpg');
  viewer.add('/photos/my-photo-2.jpg');
  viewer.add('/photos/my-photo-3.jpg');
//--></script>
        

        
        <!-- Internet Explorer HTML5 enabling code: -->
        
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        
        <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>

        
        <![endif]-->

        
    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->
            <header> <!-- Defining the header section of the page with the appropriate tag -->
            
                <hgroup>
                    <h1>Disneyland Paris</h1>
                    <h3>Space Mountain: Mission 2</h3>
                </hgroup>
                                
                <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->
                    <ul>
                        <li><a href="index.php">News</a></li>
                        <li><a href="histoire.html">L'histoire</a></li>
                        <li><a href="galerie.php">Galerie</a></li>
                        <li><a href="videos.php">Videos</a></li>
                    </ul>
                </nav>
            
            </header>
            <script type="text/javascript"
    src="http://slideshow.triptracker.net/slide.js"></script>
<script type="text/javascript">
<!--
  var viewer = new PhotoViewer();
<?php 
          $resultats=$bdd->query('SELECT * FROM photos ORDER BY id DESC');
          $resultats->setFetchMode(PDO::FETCH_OBJ);
          while( $resultat = $resultats->fetch() )
          {       
                echo  "viewer.add('img/".$resultat->img."');";
          }
          $resultats->closeCursor(); ?>


//--></script> 

        
            <section id="articles"> <!-- A new section with the articles -->

                <!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>Galerie</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    <div class="Slideshow">

                         <?php 
          $resultats=$bdd->query('SELECT * FROM photos ORDER BY id DESC');
          $resultats->setFetchMode(PDO::FETCH_OBJ);
          while( $resultat = $resultats->fetch() )
          {       
                echo  '<a href="img/'.$resultat->img.'" onclick="return viewer.show(0)">
                        <img width="120" height="120" src="img/'.$resultat->img.'" alt=""> </a>';
          }
          $resultats->closeCursor();

          ?> 
              
                        <br>
                        </div>
                        
                    </div>
                </article>
                
                <!-- Article 1 end -->



            </section>


        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2013 - Spacemountain.com</p> <!-- Change the copyright notice -->
           
         <a class="up" href="admin.php">Administration</a>
           

        </footer>
		</section> <!-- Closing the #page section -->
        
        <!-- JavaScript Includes -->
        

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        
        
    </body>
</html>
