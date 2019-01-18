<?php session_start();
include "connection.php";
include "fonctions.php";
?>
<!DOCTYPE html>
<html lang="fr">
    <head>     
        <meta charset="utf-8">
        <link rel=stylesheet href="css/index.css">
        <title>Accueil</title>

        <!-- Bootstrap -->
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> for Bootstrap CDN version-->
        <!--or for Bootstrap local/server version: -->
        <link href="./css/MegaNavbar/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> for Font Awesome CDN version-->
        <!--or for Font Awesome local/server version:--> 
        <link href="./css/MegaNavbar/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"> 

        <!-- Simple Line Icons licensed under GraphicBurger License http://graphicburger.com/license/ -->
        <link href="./css/MegaNavbar/assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet"/>

        <!-- MegaNavbar-->
        <link rel="stylesheet" href="./css/MegaNavbar/assets/css/MegaNavbar.min.css">           <!-- MegaNavbar main style file -->
        <link rel="stylesheet" href="./css/MegaNavbar/assets/css/skins/navbar-inverse.css">     <!-- MegaNavbar desired skin name here -->
        <link rel="stylesheet" href="./css/MegaNavbar/assets/css/animation/animation.css">      <!-- MegaNavbar open menu animation styles -->

        <!-- css ajouté au css des meganavbars -->
        <link rel="stylesheet" href="./css/meganavbar_b.css">
        <link rel="stylesheet" href="./css/meganavbar_h.css">

        <!-- css article -->
        <link rel="stylesheet" href="./css/article.css">

        <!-- css cadres -->
        <!--<link rel="stylesheet" href="./css/cadres.css">-->

        <!-- inclusion de la bibliothèque JQUERY -->
        <script src="./js/jquery-1.11.1.min.js"></script> 
        <script src="./js/fonctions.js"></script>
        <!-- java pour le traitement de texte -->
        <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="./elfinder/js/elfinder.min.js"></script>

        <!-- css et java de la carte interractive -->
        <link href="./css/carte_interractive/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />

        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>-->
        <script src="./js/jquery-1.11.1.min.js" type="text/javascript"></script>


        <script src="./js/carte_interractive/jquery.vmap.js" type="text/javascript"></script>
        <script src="./js/carte_interractive/jquery.vmap.france.js" type="text/javascript"></script>
        <script src="./js/carte_interractive/jquery.vmap.colorsFrance.js" type="text/javascript"></script>
    </head>
    <body>
      <?php include'./init.php'; ?>
       <!-- ***********************************Header ****************************************-->
       <div id="header">
        <img id="header" src="./images/menu/banniere.png">
       </div>
       <!-- ***********************************MENU ****************************************-->
       <div id="menu">
          <?php include "meganavbar_h.php"; ?>
       </div>


       <!-- ***********************************Contenu ****************************************-->
       <div id="contenu">
        <?php 
          $pagesDuSite=array( 'accueil'=>'accueil',
                              'problematique_admin' =>'problematique_admin',
                              'recherche_structure' =>'recherche_structure');
              
          if(isset($_GET['page'])){

            $page = $_GET['page'];

            if(array_key_exists($page, $pagesDuSite)){

              switch ($page){ 
                default :   include $pagesDuSite[$page].'.php'; break;
              } 

            /*}
            else if($page == "login"){

              if(isset($_POST['utilisateur']) && isset($_POST['mdp'])){

                $utilisateur = htmlspecialchars($_POST['utilisateur']);
                $mdp = $_POST['mdp'];

                if(!empty($utilisateur) AND !empty($mdp)){

                  $link_db = connect_to_db();
                  $admins = get_all_admins($link_db);
                  close_db($link_db);

                  for($i=0; $i<sizeof($admins); $i++){
                    if( ($admins[$i]['nom_utilisateur'] == $utilisateur) && ($admins[$i]['password'] == $mdp) ){
                        $adminMode = true;
                        include 'accueil.php';
                    }

                  }
                }
              }*/
            }else include 'page_introuvable.php';

          }else include ('accueil.php');      
          ?>
       </div>


       <!-- ***********************************Footer ****************************************-->
       <div>
       <?php include "meganavbar_b.php"; ?>
         
        </div>


    </body>
      <!-- ************************************ java *************************************** -->

      <!-- Latest compiled and minified Bootstrap JavaScript CDN version 
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
      <!--or for Bootstrap JavaScript local/server version: -->
      <script src="./css/MegaNavbar/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 

      <!-- script qui empeche la propagation du click du formulaire de connection et de TOUTE LA PAGE  -->
      <script>
        $( window ).load(function() {
          $(document).on('click touchstart', '.navbar .dropdown-menu', function(e) {
            e.stopPropagation();
          })
        });
      </script> 
</html>