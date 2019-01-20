<?php session_start();

//------------------------------------------------------------------------------------------------------------
include_once('../connection.php'); 



if(isset($_POST['todo']))
{
	switch ($_POST['todo']){;
		

		case 'titi' :	$_SESSION['departement'] = $_POST['code'];
						echo json_encode($_SESSION['departement']);
						/*$mavarr = json_encode($_POST['code']);
						echo $mavarr;*/
						break;
						
	}
}


?>

<script>

</script>
