<html>
<head>
  <title>Elearning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h3>Modifier un test</h3>
    <form action="enregistrement-modif-test.php" method="POST">
        
       <?php
 
          //
          if(isset($_GET["it"]))
            $idt = $_GET["it"] ;
          else
            $idt=0;
          //
            //include("connexion.php");
            //
      //Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
       //
             $titre = "";
             $dateheure = "";
             $idc = 0;
       //
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
         
         //
               $res1 = $pdo->prepare("select * from test where id_test=? ") ;
               $res1->setFetchMode(PDO::FETCH_ASSOC) ;
               $res1->bindValue(1, $idt) ;
               $res1->execute();
        foreach($res1 as $ligne1)
                {
                  $idc = $ligne1["id_cours"];
                  $titre = $ligne1["titre_du_test"];
                  $dateheure = $ligne1["date_heure"];


                }
        //
        echo "Titre du test:<input type='varchar' value='$titre' required  class='form-control' name='titre'  />";
            echo "Date et heure:<input type='datetime' value='$dateheure'  class='form-control' name='dateheure'/>";
        echo "<input type='hidden' name='id_test' id='id_test' value='$idt' />";
          
              
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
</body>
</html>