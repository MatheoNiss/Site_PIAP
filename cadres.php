 <link rel="stylesheet" type="text/css" href="./css/cadres.css" />


<script> 

	function OnOffCadre( id_cadre, visible ) { 
		var todo = "SetOnOff";
		var url = "./admin/cadre_SqlTableManageFunctions.php";
		var scroll=getScrollPos();
		
		var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
		//alert(refreshURL);
		
		var donnees = { 'todo':todo, 'id_cadre':id_cadre, 'visible':visible };
		$.post(url , donnees)
			.done(function(data) {window.location.replace(refreshURL);})
			//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
			.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
	}

	function OnOffHeaderCadre(id_cadre, etat){
		var todo = "SetCadreHeaderOnOrOff";
		var url = "./admin/cadre_SqlTableManageFunctions.php";
		var scroll=getScrollPos();

		var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
		//alert(refreshURL);

		var donnees = { 'todo':todo, 'id_cadre':id_cadre, 'etat':etat };
		$.post(url , donnees)
			.done(function(data) {window.location.replace(refreshURL);})
			//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
			.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
	}

	function OnOffFooterCadre(id_cadre, etat){
		var todo = "SetCadreFooterOnOrOff";
		var url = "./admin/cadre_SqlTableManageFunctions.php";
		var scroll=getScrollPos();

		var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
		//alert(refreshURL);

		var donnees = { 'todo':todo, 'id_cadre':id_cadre, 'etat':etat };
		$.post(url , donnees)
			.done(function(data) {window.location.replace(refreshURL);})
			//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
			.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
	}

	function OnOffIconeCadre(id_cadre, etat){
		var todo = "SetCadreIconeOnOrOff";
		var url = "./admin/cadre_SqlTableManageFunctions.php";
		var scroll=getScrollPos();

		var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
		//alert(refreshURL);

		var donnees = { 'todo':todo, 'id_cadre':id_cadre, 'etat':etat };
		$.post(url , donnees)
			.done(function(data) {window.location.replace(refreshURL);})
			//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
			.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
	}

</script>


 <!-- css cadres -->
 <link rel="stylesheet" href="./css/cadres.css">
<?php
class Cadre
{ 
    // déclaration des propriétés
    private $adminMode; 
    private $code;
    private $id, $zone, $visible, $largeur, $icone, $titre, $contenu, $footer;
    private $show_icone, $show_titre, $show_header, $show_footer, $show_boutton, $show_image, $show_border;
	 
	 public function Cadre($cadre, $adminMode=0, $code){
	 	if(!empty($code)){
	 		$this->code = $code;
	 	}

	 	$this->adminMode = $adminMode;

	 	$this->id = $cadre['id'];
	 	$this->zone = $cadre['zone'];
	 	$this->visible = $cadre['visible'];

	 	$this->largeur = $cadre['largeur'];
	 	$this->icone = $cadre['icone'];
	 	$this->image = $cadre['image'];

	 	$this->titre = $cadre['titre'];
	 	$this->contenu = $cadre['contenu'];
	 	$this->footer = $cadre['footer'];

	 	$this->show_icone = $cadre['show_icone'];
	 	$this->show_titre = $cadre['show_titre'];
	 	$this->show_header = $cadre['show_header'];
	 	$this->show_footer = $cadre['show_footer'];
	 	$this->show_boutton = $cadre['show_boutton'];
	 	$this->show_image = $cadre['show_image'];
	 	$this->show_border = $cadre['show_border'];
	 }

	 /*private function DrawAdminBar(){
	 	$code = "";

	 	$code .= '<div id="CadreAdminBarMN">';
	 	$code .= '<div class="ParametreCadre"><div>';
	 	$code .= '</div>';

	 	echo $code;
	 }*/


	 private function DrawAdminBar(){
	
		$buttons = '';
		$buttons .= '<div id="CadreAdminBarMN">';
		$buttons .= '<div class ="iconesPanel">';
		switch($this->visible){
			case 0 :	$buttons .= '<div id="cadre_picto_visible_'.$this->id.'" class="pictoRight light_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffCadre('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
				case 1 :$buttons .= '<div id="cadre_picto_visible_'.$this->id.'" class="pictoRight light_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffCadre('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}


		switch($this->show_icone){
			case 0 :	$buttons .= '<div id="cadre_picto_icone'.$this->id.'" class="pictoLeft icone_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffIconeCadre('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="cadre_picto_icone'.$this->id.'" class="pictoLeft icone_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffIconeCadre('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	

		switch($this->show_header){
			case 0 :	$buttons .= '<div id="cadre_picto_header'.$this->id.'" class="pictoLeft header_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffHeaderCadre('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="cadre_picto_header'.$this->id.'" class="pictoLeft header_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffHeaderCadre('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	

		switch($this->show_footer){
			case 0 :	$buttons .= '<div id="cadre_picto_footer'.$this->id.'" class="pictoLeft footer_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffFooterCadre('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="cadre_picto_footer'.$this->id.'" class="pictoLeft footer_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffFooterCadre('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	

		switch($this->show_border){
			case 0 :	$buttons .= '<div id="cadre_picto_border'.$this->id.'" class="pictoLeft border_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffBorderCadre('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="cadre_picto_border'.$this->id.'" class="pictoLeft border_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffBorderCadre('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	




		$buttons .= '</div>';
		$buttons .= '</div>';

		return $buttons;
	}

	 private function displayHeader(){
	 	$header = "";

	 	if($this->show_header){
	 		$header .= '<div class="header">';
	 		if($this->show_icone) $header .= '<div class="icone_l"></div>';
	 		if($this->show_titre) $header .=  $this->titre;
	 		if($this->show_image) $header .= '<div class="icone_r"></div>';	 		
	 		$header .= '</div>';

	 		return $header;
	 	}
	 	else return '';
	 }
	 
	 private function DrawCadre(){
	 	$code = "";

	 	$code .= '<div id="cadreMN">';
		if ($this->adminMode) $code .= 	$this->DrawAdminBar();
	 	$code .= 	$this->displayHeader();
	 	$code .= '	<div class="contenu">'.$this->contenu.'</div>';
	 	$code .= '  <div">'.$this->code.'</div>';
	 	if($this->show_footer) $code .= '<div class="footer">'.$this->footer.'</div>';
		$code .= '</div>';
		echo $code;
		//$code .= '   <i class="fa fa-warning" style="font-size: 30px;"></i>';

	 }

	 public function DessineCadre(){
	 	$this->DrawCadre();
	 }

}

?> 