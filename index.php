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

                    
                      <?php 
          $resultats=$bdd->query('SELECT * FROM news ORDER BY coldate DESC');
          $resultats->setFetchMode(PDO::FETCH_OBJ);
          while( $resultat = $resultats->fetch() )
          {       echo '<div class="line"></div>';
                    echo '<article id="article1">';
                    echo '<h2>'.$resultat->titre.'</h2>';
                    echo '<div class="line"></div>
                    
                    <div class="articleBody clear">';
                  
                  echo '<p>'.$resultat->descr.'<br /><span style="font-style:italic;font-size:12px;">'.date('d/m/Y \?? H\hi', strtotime($resultat->coldate)).'</span></p><br />';
                  echo ' </div>'; 
                  echo '</article>';
          }
          $resultats->closeCursor();

          ?> 
                      


				<!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>La Space Mountain du Magic Kingdom</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    
                    	<figure> <!-- The figure tag marks data (usually an image) that is part of the article -->
	                    	<a href="http://www.kevdo.com/dlp/images/Space%20Mountain.jpg"><img src="http://www.kevdo.com/dlp/images/Space%20Mountain.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>La Space Mountain du Magic Kingdom ?? Walt Disney World Resort est la version originale de cette c??l??bre attraction ouverte en d??cembre 19742. Elle est la plus grande de toutes et contient deux parcours jumeaux s'entrem??lant. Durant plusieurs ann??es RCA fut le sponsor de l'attraction. En 1995, FedEx rempla??a RCA jusqu'en 2004. Depuis, aucun sponsor n'a ??t?? annonc??.</p>
                    </div>
                </article>
                
				<!-- Article 1 end -->


				<!-- Article 2 start -->

                <div class="line"></div>
                
                <article id="article2">
                    <h2>L'embarquement</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<figure>
	                    	<a href="http://www.linternaute.com/sortir/parcsdeloisirs/photo/les-attractions-de-disneyland-paris/image/space-mountain-2-307974.jpg"><img src="http://www.linternaute.com/sortir/parcsdeloisirs/photo/les-attractions-de-disneyland-paris/image/space-mountain-2-307974.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>L'embarquement se fait sur l'un des deux circuits sym??triquement identiques ?? ceci pr??s que l'un des deux mesure trois m??tres de plus. ?? gauche la voie Alpha, ?? droite l'Omega.</p>
                    </div>
                </article>
                
				<!-- Article 2 end -->

				<!-- Article 3 start -->

                <div class="line"></div>
                
                <article id="article3">
                    <h2>Halftone Navigation Menu</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    	<figure>
	                    	<a href="http://media.designingdisney.com/sites/default/files/images/space-mountain/11.jpg"><img src="http://media.designingdisney.com/sites/default/files/images/space-mountain/11.jpg" width="620" height="340" /></a>
                        </figure>
                        
                        <p>Pendant les ann??es de partenariat avec RCA, une exposition baptis??e La Maison de l'habitat du futur (Home of Future Living) ??tait situ??e ?? la sortie de l'attraction. Elle comprenait des ??crans vid??o pour enfants, des lecteurs de disques lasers et d'autres produits de haute technologie vendus par RCA ?? l'??poque.</p>
                    </div>
                </article>
                
				<!-- Article 3 end -->


            </section>

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2013 - Spacemountain.com  </p> <!-- Change the copyright notice -->
           
           
           <a class="up" href="admin.php">Administration</a>

        </footer>
            
		</section> <!-- Closing the #page section -->
        
    </body>
</html>
