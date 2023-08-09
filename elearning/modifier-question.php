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
    <h3>Modifier une question</h3>
    <form action="enregistrement-modif-question.php" method="POST">
        
       <?php
 
          //
          if(isset($_GET["iq"]))
            $idq = $_GET["iq"] ;
          else
            $idq=0;
          //
            //include("connexion.php");
            //
      //Instanciation PDO
             $dsn = "mysql:host=localhost;dbname=e_learning";
             $user = "root";
             $pass = "";
       //
             $lquest = "";
             $num = "";
             $barem = "";
             $idt = 0;
       //
            try
            {
               $pdo=new PDO($dsn,$user,$pass) ;
               //
         
         //
               $res1 = $pdo->prepare("select * from question where id_question=? ") ;
               $res1->setFetchMode(PDO::FETCH_ASSOC) ;
               $res1->bindValue(1, $idq) ;
               $res1->execute();
        foreach($res1 as $ligne1)
                {
                  $idt = $ligne1["id_test"];
                  $lquest = $ligne1["libelle_question"];
                  $num = $ligne1["numero_question"];
                  $barem = $ligne1["bareme_question"];


                }
        //
        echo "Libelle question:<input type='varchar' value='$lquest' required  class='form-control' name='lquest'  />";
            echo "Numero question:<input type='int' value='$num'  class='form-control' name='num'/>";
            echo "Barème question:<input type='int' value='$barem'  class='form-control' name='barem'/>";
        echo "<input type='hidden' name='id_question' id='id_question' value='$idq' />";
              
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