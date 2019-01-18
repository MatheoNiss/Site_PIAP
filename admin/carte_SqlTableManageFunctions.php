
<?php




//------------------------------------------------------------------------------------------------------------
include_once('../connection.php'); 



if(isset($_POST['todo']))
{
	switch ($_POST['todo']){
		
						
		case 'titi' : $mavarr = json_encode($_POST['code']);
						echo $mavarr;
						break;
						
		
						
	}
}


?>

<script>

</script>
