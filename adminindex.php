<?php
session_start();
$id_users = $_SESSION['id'];

if(empty($_SESSION['id']))
{
  header('Location: admin.php');
}

  include 'config.php';
  
   if(!empty($_POST['news'])) {
  if(!empty($_POST['titre']) && !empty($_POST['descr'])) {
    extract($_POST);
    $valid = true;
    } else {
     $valid = false;
    $erreurid = 'Remplissez tous les champs svp.';
    }
  
  
  if($valid)
  {
    date_default_timezone_set('Europe/Madrid');
    $coldate = date('Y-m-d H:i:s');
    
      $titre = stripslashes(htmlspecialchars($_POST['titre']));
      $descr = stripslashes(htmlspecialchars($_POST['descr']));
    
    $req = $bdd->prepare('INSERT INTO news (titre,descr,coldate) VALUES (:titre,:descr,:coldate)');
    $req->execute(array(
      'titre'=>$titre,
      'descr'=>$descr,
      'coldate'=>$coldate
    ));
    $req->closeCursor();
    $ok = 'Ajouté !';
    
  }
}




   if(!empty($_POST['newsupdate'])) {
  if(!empty($_POST['titre']) && !empty($_POST['descr'])) {
    extract($_POST);
    $valid = true;
    } else {
     $valid = false;
    $erreurid = 'Remplissez tous les champs svp.';
    }
  
  
  if($valid)
  {
    date_default_timezone_set('Europe/Madrid');
    $coldate = date('Y-m-d H:i:s');
    
      $titre = stripslashes(htmlspecialchars($_POST['titre']));
      $descr = stripslashes(htmlspecialchars($_POST['descr']));
      $newsid = $_POST['newsid'];
    
    $req = $bdd->prepare('UPDATE news SET titre=:titre,descr=:descr,coldate=:coldate WHERE id=:newsid');
    $req->execute(array(
      'titre'=>$titre,
      'descr'=>$descr,
      'coldate'=>$coldate,
      'newsid' => $newsid
    ));
    $req->closeCursor();
    $ok = 'Modification réussie !';
    
  }
}



  if (isset($_GET['supprimer_news'])) // Si on demande de supprimer une news
{
    // Alors on supprime la news correspondante
    // On protège la variable "id_news" pour éviter une faille SQL
    $_GET['supprimer_news'] = addslashes($_GET['supprimer_news']);
    $id = $_GET['supprimer_news'];

    $req = $bdd->prepare('DELETE FROM news WHERE id=:id');
    $req->execute(array(
      'id'=>$id
    ));
    $req->closeCursor();
  
    // $req = $bdd->prepare('DELETE FROM news WHERE id=:id');
    // $result = $req->execute();
   // $req->closeCursor();

    // $bdd->exec('DELETE FROM news WHERE id=:id');

    header('Location: adminindex.php');

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
                    <h2>Ajouter/Modifier une News</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">
                    
                        <?php if(isset($ok)){ echo '<p id="ok">'.$ok.'</p>';} 
            elseif(isset($erreurid)){ ?>
            
              <?php echo '<p id="erreurid" style="color:red">'.$erreurid.'</p>'; } ?>

               <?php if(!empty($_GET['modifier_news'])){ 
              $id = $_GET['modifier_news'];
              $req = $bdd->prepare('SELECT id,titre,descr FROM news WHERE id=:id');
               $req->execute(array('id'=>$id));
               
               while ($modnews = $req->fetch())
              { ?>
            <form action="adminindex.php" method="post">
                        <div class="row">
                            <p class="left">
                                <input type="text" name="titre" id="titre" value="<?php echo $modnews['titre']; ?>" />
                            </p>
                        </div>
                    
                        <div class="row">
                            <p class="left">
                                <textarea name="descr" rows="4" cols="50"><?php echo $modnews['descr']; ?>
                              </textarea>
                            </p>
                        </div>
                      <input name="newsid" type="hidden" value="<?php echo $modnews['id']; ?>" />
                        <input name="newsupdate" type="submit" class="button white" value="Modifier &#x2192;" />
                    </form>
                    	<?php } $req->closeCursor(); } else { ?>
                       <form action="adminindex.php" method="post">
                        <div class="row">
                            <p class="left">
                                <input type="text" name="titre" id="titre" value="Titre" />
                            </p>
                        </div>
                    
                        <div class="row">
                            <p class="left">
                                <textarea name="descr" rows="4" cols="50">Description
                              </textarea>
                            </p>
                        </div>
                    
                        <input name="news" type="submit" class="button white" style="padding:5px" value="Ajouter" />
                    </form> <?php } ?>
                    </div>
                </article>
                
				<!-- Article 1 end -->



        <!-- Article 2 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <article id="article1"> <!-- The new article tag. The id is supplied so it can be scrolled into view. -->
                    <h2>Mes News</h2>
                    
                    
                    
                       <?php 
          $resultats=$bdd->query('SELECT * FROM news ORDER BY coldate DESC');
          $resultats->setFetchMode(PDO::FETCH_OBJ);
          while( $resultat = $resultats->fetch() )
          {       echo '<div class="line"></div>
                    
                    <div class="articleBody clear">';
                  echo '<h3>'.$resultat->titre.'</h3>';
                  echo '<p>'.$resultat->descr.'<br /><span style="font-style:italic;font-size:12px;">'.date('d/m/Y \à H\hi', strtotime($resultat->coldate)).'</span></p><br />';
                  echo '<p><a href="adminindex.php?modifier_news=' . $resultat->id . '">Modifier</a><br />';
        echo '<a href="adminindex.php?supprimer_news=' . $resultat->id . '">Supprimer</a></p>' ;
                  echo ' </div>'; 
          }
          $resultats->closeCursor();

          ?> 
                      
                    
                </article>
                
        <!-- Article 2 end -->



            </section>

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2013 - Spacemountain.com</p> <!-- Change the copyright notice -->
           
          <a class="up" href="index.php" title="Retour au site">Site</a>
           

        </footer>
            
		</section> <!-- Closing the #page section -->
        

    </body>
</html>
