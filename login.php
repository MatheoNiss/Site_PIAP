<?php session_start();?>
<?php
include_once('./connection.php');

function get_admin($login, $mot_de_passe){
    global $host, $user, $password, $bdd;
    
    $mysqli  = new mysqli($host, $user, $password, $bdd);
    
    
    if (mysqli_connect_error()) {
        die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM piap_admins WHERE login='".$login."' and password='".$mot_de_passe."';"; 
        
    $admin=NULL;
    if($req = mysqli_query($mysqli, $sql) or die("Erreur d'accès à la table 'piap_admins'<br>".$sql)){
        while($data = mysqli_fetch_assoc($req)) { 
            $admin['id']=$data['id'];
            $admin['nom']=$data['nom'];
            $admin['prenom']=$data['prenom'];
            $admin['login']=$data['login']; 
            $admin['password']=$data['password']; 
            $admin['id_structure']=$data['id_structure']; 
        } 
    }
    $num_row = mysqli_num_rows($req);
        
    $mysqli->close();

//echo "<br>requette SQL : <br><br>".$sql;
//echo "<br>Retour get_admin : <br><br>".$req;
    
    if( $num_row == 1 ) return $admin;
    else return (false);
}



//print_r($_POST);
$admin = get_admin(strtolower($_POST['login']),$_POST['mdp'] );

$page = "";
if (isset($_GET['page']) && ($_GET['page']!="")) $page = "?page=".$_GET['page'];

$niveau = "";
if (isset($_POST['niveau']) && ($_POST['niveau']!="")) $niveau = "&niveau=".$_POST['niveau'];

$id_article = "";
if (isset($_POST['id_article']) && ($_POST['id_article']!="")) $id_article = "&id_article=".$_POST['id_article'];


if($admin == false){ $url = "Refresh:0; url='./index.php'"; }
else {
    //echo 'Bon';
    // Création d'un identifiant aléatoire
    $id_session=session_id();
    //Initialisation des variables de session
    $_SESSION['id'] = $id_session;
    $_SESSION['id_admin'] = $admin['id'];
    $_SESSION['login'] = $admin['login'];
    $_SESSION['id_structure']= $admin['id_structure'];
    $_SESSION['admin_name'] = $admin['nom']."  ".$admin['prenom'];
    $_SESSION['type']="admin";

    //$url = "Refresh:0; url='./index.php".$page.$niveau.$id_article."'";

    $url = "Refresh:0; url='./index.php?page=accueil_Structures";

    global $adminMode;
    $adminMode = true;
}
header($url);
?>