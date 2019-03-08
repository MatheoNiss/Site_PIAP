<?php

$link_db=connect_to_db();
$problematiques = get_all_problematiques($link_db);	
close_db($link_db);

?>

<link rel="stylesheet" href="./css/problematique_admin.css">

<div id="problematique_admin">

</div>
<script src="./js/problematique_admin.js"></script>
