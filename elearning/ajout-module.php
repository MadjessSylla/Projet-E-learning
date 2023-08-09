<?php
  include("head.php");
  include("menu-ens.php");
  
?>
  <div class="container"  style="margin-top:20px;width:50%;float:clear;color: white;">
    <h4 style="text-align:center;">AJOUT MODULE</h4>
    <form action="enregistrement-module.php" method="POST">
    Nom du module:<input type="varchar"  class="form-control" name="mod"  />
    <?php
               //include("connexion.php");
               //
         //Connexion à la base de données avec PDO
               //Instanciation PDO
               $dsn = "mysql:host=localhost;dbname=e_learning";
               $user = "root";
               $pass = "";
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
               
               //
               
               //
               }
               catch(PDOException $e)
               {
                echo "Erreur : ".$e->getMessage()."</br>";
               }
             ?>
    

    <input type="submit" value="Valider" class="btn btn-primary"/>
    </form>

    
  </div>
<?php
  include("footer.php");
?>