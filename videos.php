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

        <style>

              /* Demo styles */
            html,body{background:#222;margin:0;}
            body{border-top:4px solid #000;}
            .content{color:#777;font:12px/1.4 "helvetica neue",arial,sans-serif;width:620px;margin:20px auto;}
            h1{font-size:12px;font-weight:normal;color:#ddd;margin:0;}
            p{margin:0 0 20px}
            a {color:#22BCB9;text-decoration:none;}
            .cred{margin-top:20px;font-size:11px;}

            /* This rule is read by Galleria to define the gallery height: */
            #galleria{height:320px}

        </style>
        
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


        
            <section id="articles"> <!-- A new section with the articles -->

                <!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>Galerie</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">

                          <?php 
          $resultats=$bdd->query('SELECT * FROM videos ORDER BY id DESC');
          $resultats->setFetchMode(PDO::FETCH_OBJ);
          while( $resultat = $resultats->fetch() )
          {       
                echo '<p> <iframe width="420" height="315" src="http://www.youtube.com/embed/'.$resultat->embed.'" frameborder="0" allowfullscreen></iframe></p>';
          }
          $resultats->closeCursor();

          ?> 
                        
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
        
        
    </body>
</html>
