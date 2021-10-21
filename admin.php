<?php
session_start();
if(isset($_SESSION['id']))
{
  header('Location: adminindex.php');
}


if(!empty($_POST))
{
  $valid = true;
  extract($_POST);
  
  if($valid)
  {
    include 'config.php';
 

  $req = $bdd->prepare('SELECT * FROM admin WHERE name=:name AND pass=:pass');
  $req->execute(array(
    'name'=>$name,
    'pass'=>md5($pass) //appbo0ad
  ));
  $data = $req->fetch();
  if($req->rowCount()==0)
  {
    $valid = false;
    $errorid = 'Mauvais nom ou mot de passe.';
  }
  

  else
  {
    if($req->rowCount()>0)
    {
      $_SESSION['id'] = $data['id'];
    }
  }
    
    $req->closeCursor();
    if($valid)
    {
      header('Location: adminindex.php');
    }
  
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
                    <h2>Administration</h2>
                    
                    <div class="line"></div>
                    
                    <div class="articleBody clear">

                    <?php if(isset($errorid)){ echo '<p id="errorid" style="color:red">'.$errorid.'</p>'; } ?>
                    <form action="admin.php" method="post">
                        <div class="row">
                            <p class="left">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" value="" />
                            </p>
                        </div>
                    
                        <div class="row">
                            <p class="left">
                                <label for="pass">Mot de passe</label>
                                <input type="password" name="pass" id="pass" value="" />
                            </p>
                        </div>
                    
                        <input type="submit" class="button white" style="padding:5px" value="Entrer" />
                    </form>
                    	
                    </div>
                </article>
                
				<!-- Article 1 end -->



            </section>

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
           
           <p>Copyright 2013 - Spacemountain.com</p> <!-- Change the copyright notice -->
           
          
           

        </footer>
            
		</section> <!-- Closing the #page section -->
        
    </body>
</html>
