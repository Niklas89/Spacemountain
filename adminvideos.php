<?php
session_start();
$id_users = $_SESSION['id'];

if(empty($_SESSION['id']))
{
  header('Location: admin.php');
}

  include 'config.php';
  
   if(!empty($_POST['video'])) {
  if(!empty($_POST['embed'])) {
    extract($_POST);
    $valid = true;
    } else {
     $valid = false;
    $erreurid = 'Remplissez le champs svp.';
    }
  
  
  if($valid)
  {
    
      $embed = $_POST['embed'];
    
    $req = $bdd->prepare('INSERT INTO videos (embed) VALUES (:embed)');
    $req->execute(array(
      'embed'=>$embed
    ));
    $req->closeCursor();
    $ok = 'Ajouté !';
    
  }
}




  

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
                        <li><a href="adminindex.php">News</a></li>
                        <li><a href="adminphotos.php">Photos</a></li>
                        <li><a href="adminvideos.php">Videos</a></li>
                        <li><a href="logout.php"><img src="img/logout.png" alt="logout" width="16" height="16" /></a></li>
                    </ul>
                </nav>
            
            </header>
            
            <section id="articles"> <!-- A new section with the articles -->

				<!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>Ajouter une vidéo</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    
                        <?php if(isset($ok)){ echo '<p id="ok">'.$ok.'</p>';} 
            elseif(isset($erreurid)){ ?>
            
              <?php echo '<p id="erreurid" style="color:red">'.$erreurid.'</p>'; } ?>

              
            <form action="adminvideos.php" method="post">
                    
                        <div class="row">
                            <p class="left">
                                <textarea name="embed" rows="4" cols="50">Coller l'ID de vidéo Youtube. Ex: http://www.youtube.com/watch?v=_irIBlQR_go - ID: _irIBlQR_go
                              </textarea>
                            </p>
                        </div>
                        <input name="video" type="submit" style="padding:5px" value="Ajouter" />
                    </form>
                    </div>
                </article>
                
				<!-- Article 1 end -->





            </section>

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2013 - Spacemountain.com</p> <!-- Change the copyright notice -->
           
           <a class="up" href="index.php" title="Retour au site">Site</a>
           

        </footer>
            
		</section> <!-- Closing the #page section -->
        
    </body>
</html>
