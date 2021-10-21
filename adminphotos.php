<?php
session_start();
$id_users = $_SESSION['id'];

if(empty($_SESSION['id']))
{
  header('Location: admin.php');
}

  include 'config.php';

   if(!empty($_POST['photos'])) {
  if(!empty($_FILES['monfichier'])) {
    extract($_POST);
    $valid = true;
    } else {
     $valid = false;
    $erreurid = 'Erreur ! Vérifiez la taille du fichier.';
    }

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'img/' . basename($_FILES['monfichier']['name']));
                        
                          $img = $_FILES['monfichier']['name'];
                        
                        $req = $bdd->prepare('INSERT INTO photos (img) VALUES (:img)');
                        $req->execute(array(
                          'img'=>$img
                        ));
                        $req->closeCursor();
                        $ok = 'Ajouté !';
                }
        }

}
else { $erreurid = 'Erreur ! Vérifiez la taille du fichier.'; } 

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
                    <h2>Ajouter une photo</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    
                        <?php if(isset($ok)){ echo '<p id="ok">'.$ok.'</p>';} 
            elseif(isset($erreurid)){ ?>
            
              <?php echo '<p id="erreurid" style="color:red">'.$erreurid.'</p>'; } ?>

            <form enctype="multipart/form-data" action="adminphotos.php" method="post" accept-charset="utf-8">
                        <div class="row">
                            <p class="left">
                              <label for="file">file</label><input type="file" name="monfichier" value="" id="file">
                            </p>
                        </div>
                        <input name="photos" type="submit" style="padding:5px" value="Ajouter" />
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
