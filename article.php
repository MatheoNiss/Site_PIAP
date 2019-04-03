
<link rel="stylesheet" type="text/css" href="./css/article.css" />

<!--
Le code ci dessous appelle du code se trouve dans :
./js/fonctions.js
./admin/article_SqlTableManageFunctions.php

Dans index.php il faut ajouter la ligne
include ('./dialog_box.php');
qui fait appel à  
<link rel="stylesheet" type="text/css" href="./css/dialog_box.css" />

-->

<script> 


//fonction appelée pour effacer un article de la base de donnée
function deleteArticle(id, categorie){
	//alert('suis dans deleteArticle(id)');
	var todo = "AskDel";
	
	var scroll=getScrollPos();
	var scrollTop = scroll.Top;
	var scrollLeft = scroll.Left;

	var refreshURL = getRefreshURL('../index.php', '?page=accueil', scroll);
	
	var id_article = id;
	var categorie = categorie;
	
	var htmlTitre = 'Attention ! ';
	var htmlIcone = '<img src="./images/lightbox/dialogBox/attention32.png" border="no" />';
	
	var functionToCall = "javascript:toggleOverlay('DialogBox', "+scrollLeft+" ,  "+scrollTop+" );";
	
	var htmlBoutons  = '<center>';
	htmlBoutons += '	<form method="POST" action="./admin/article_SqlTableManageFunctions.php"  >';
	
	htmlBoutons += '	<button  type="submit"  name="todo" value="delete" >Oui</button>';
	htmlBoutons += '	<button  type="submit"  name="todo" value="cancel" onmousedown="'+functionToCall+'" >Non</button>';
	
	htmlBoutons += '	<input  type="hidden"  name="id_article" value="'+id_article+'" />';
	htmlBoutons += '	<input  type="hidden"  name="categorie" value="'+categorie+'" />';
	htmlBoutons += '	<input  type="hidden"  name="scrollTop" value="'+scrollTop+'" />';
	htmlBoutons += '	<input  type="hidden"  name="scrollLeft" value="'+scrollLeft+'" />';
	htmlBoutons += '	<input  type="hidden"  name="refreshURL" value="'+refreshURL+'" />';
	htmlBoutons += '	</form>';
	htmlBoutons += '</center>';
	//alert(htmlBoutons);
	
	
	var url = "./admin/article_SqlTableManageFunctions.php";
	var donnees = {'id_article':id_article , 'todo':todo };
	$.post(url ,donnees )
		.done(function(data) {
			toggleOverlay("DialogBox", scrollLeft, scrollTop); 
			$("#titleBox").html(htmlTitre);
			$("#iconeBox").html(htmlIcone);
			$("#FooterDialogBox").html(htmlBoutons);
			$("#texteBox").html(data);
			})
		.fail (function(data) {//alert(5);
			toggleOverlay("DialogBox", scrollLeft, scrollTop); 
			$("#titleBox").html(htmlTitre);
			$("#iconeBox").html(htmlIcone);
			$("#texteBox").html(data);
			$("#FooterDialogBox").html(htmlBoutons);
			});
		
}

function updateArticle( id_article, fieldName, data, categorie ) { 
	
	var todo = "update";
	
	var url = "./admin/article_SqlTableManageFunctions.php";
	//alert(fieldName);
	var donnees = { 'data':data, 'todo':todo, 'fieldName':fieldName, 'id_article':id_article, 'categorie':categorie }
	$.post(url , donnees )
		//.done(function(data) {toggleOverlay("DialogBox"); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox"); $("#texteBox").html(data);});
}


function OnOffArticle( id_article, valide ) { 
	
	var todo = "SetOnOff";
	var url = "./admin/article_SqlTableManageFunctions.php";
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	//alert(refreshURL);
	
	var donnees = { 'todo':todo, 'id_article':id_article, 'valide':valide };
	$.post(url , donnees)
		.done(function(data) {window.location.replace(refreshURL);})
		//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
}

function OnOffHeaderArticle( id_article, etat ) { 
	
	var todo = "SetHeaderOnOff";
	var url = "./admin/article_SqlTableManageFunctions.php";
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	
	var donnees = { 'todo':todo, 'id_article':id_article, 'show_header':etat };
	$.post(url , donnees)
		.done(function(data) {window.location.replace(refreshURL);})
		//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
}

function OnOffFooterArticle( id_article, etat ) { 
	
	var todo = "SetFooterOnOff";
	var url = "./admin/article_SqlTableManageFunctions.php";
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	
	var donnees = { 'todo':todo, 'id_article':id_article, 'show_footer':etat };
	$.post(url , donnees)
		.done(function(data) {window.location.replace(refreshURL);})
		//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
}

function OnOffBorderArticle( id_article, etat ) { 
	
	var todo = "SetBorderOnOff";
	var url = "./admin/article_SqlTableManageFunctions.php";
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	
	var donnees = { 'todo':todo, 'id_article':id_article, 'show_border':etat };
	$.post(url , donnees)
		.done(function(data) {window.location.replace(refreshURL);})
		//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
}

function OnOffIconeArticle( id_article, etat ) { 
	
	var todo = "SetIconeOnOff";
	var url = "./admin/article_SqlTableManageFunctions.php";
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	
	var donnees = { 'todo':todo, 'id_article':id_article, 'show_icone':etat };
	$.post(url , donnees)
		.done(function(data) {window.location.replace(refreshURL);})
		//.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
		.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
}



//function addArticle(categorieArticle, cbIdTab){
function addArticle(articleFields, cbIdTab){

	var scroll=getScrollPos();
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	//alert(refreshURL);

	if(auteurNouvelArticle == "")  auteurNouvelArticle = articleFields['auteur'];  
	if (iconeNouvelArticle == "") iconeNouvelArticle = "fa-puzzle-piece";
	
	if ((titreNouvelArticle !== "") || (contenuNouvelArticle !== "")){
		var todo = "add";
		
		var articleBorder = true ;
		var articleHeader = true ;
		var articleFooter = true ;
		var articleIcone = true ;
		
		var id_structure = articleFields['id_structure'];
		var categorieArticle = articleFields['categorie'];
		var niveauRessource = articleFields['niveau'];
		var zoneArticle = articleFields['zone'];
		var css = articleFields['css'];
		var tag = articleFields['tag'];
		var problematique = articleFields['problematique'];

		var url = "./admin/article_SqlTableManageFunctions.php";
		//alert("titre = "+titreNouvelArticle+"\n - contenu = "+contenuNouvelArticle+"\n  - icone = "+iconeNouvelArticle+"\n  - auteur =  "+auteurNouvelArticle);
		//alert("categorie = "+categorieArticle+"\nniveau = "+niveauRessource);
		
		var donnees = { 'todo':todo, 'icone':iconeNouvelArticle,  'titre':titreNouvelArticle, 'problematique':problematique,
						'categorie':categorieArticle, 'niveau':niveauRessource, 'zone':zoneArticle,
						'contenu':contenuNouvelArticle, 'auteur':auteurNouvelArticle,
						'showHeader':articleHeader, 'showFooter':articleFooter, 'showBorder':articleBorder, 'showIcone':articleIcone,
						'css':css, 'tag':tag, 'id_structure':id_structure
					};
		//alert(categorieArticle);
		$.post(url , donnees )
			.done(function(data) {window.location.replace(refreshURL);})
			//.done(function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
			.fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});

	}
	
}


function setIcone(rbId, id_article){
	var icone = rbId;
	var scroll=getScrollPos();
	
	var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
	var todo = "update";
	
	var url = "./admin/article_SqlTableManageFunctions.php";
	//alert(fieldName);
	var donnees = { 'data':icone, 'todo':todo, 'fieldName':'icone', 'id_article':id_article }
	$.post(url , donnees )
		.done(function(data) {window.location.replace(refreshURL);})
		.fail (function(data) {toggleOverlay("DialogBox"); $("#texteBox").html(data);});
}


var titreNouvelArticle = "";
var contenuNouvelArticle = "";
var auteurNouvelArticle = "";
var iconeNouvelArticle ="";
var dataChanged=false;

</script>


<?php
class Article
{ 

    // déclaration des propriétés
    private $id, $problematique, $categorie, $niveau, $zone,  $icone, $titre, $contenu, $auteur, $date_creation, $id_structure;
	private $show_header, $show_footer, $show_border, $show_icone, $show_delete, $css, $tag;
	private $marqueDeSplit;
	private $adminMode;
	private $fieldNameTitre, $fieldNameContenu,  $fieldNameFooter;
	private $dataChanged ;
	private $instance;
	//private $rbGroupeName, $cbGroupeName;
	
	public function Article($article, $adminMode=false){
		$this->id = $article['id'];
		$this->problematique = $article['problematique'];
		//$this->categorie = $article['categorie'];
		$this->id_structure = $article["id_structure"];
		$buf = explode ("|", $article['categorie']) ;
		$this->categorie = $buf[0];
		$this->niveau = "";
		if(isset($buf[1]) ) $this->niveau = $buf[1];
		
		//$this->categorie = $article['categorie'];
		$this->zone = $article['zone'];
		$this->icone = $article['icone'];
		$this->titre = stripslashes($article['titre']);
		$this->contenu = stripslashes($article['contenu']);
		//$this->auteur = stripslashes($article['auteur']);
		$this->date_creation = $article['date_creation'];
		$this->valide = $article['valide'];
		$this->show_header = $article['show_header'];
		$this->show_footer = $article['show_footer'];
		$this->show_border = $article['show_border'];
		$this->show_icone = $article['show_icone'];
		$this->show_delete = $article['show_delete'];
		$this->css = $article['css'];
		$this->tag = $article['tag'];
		 
		$this->adminMode = $adminMode;
		 
		$this->fieldNameTitre = "titre";
		$this->fieldNameContenu = "contenu";
		$this->fieldNameFooter = "auteur";
		$this->fieldNameIcone= "icone";

		$this->marqueDeSplit = "[#split#]";
		$this->dataChanged = false;
		$this->instance = $this->zone.$this->id;
	 }
	 
	
	
	
//-------------------------------- Mode Administrateur -----------------------------------------------------
	
	//dessiner les boutons radio et le bouton 'enregistrer' à la droite du titre du nouvel article à ajouter
private function drawNewButtonsPanel(){
		$fields = array();
		$fields['id_structure'] =$this->id_structure;
		$fields['categorie'] =$this->categorie;
		$fields['niveau'] =$this->niveau;
		$fields['zone'] =$this->zone;
		$fields['auteur'] =$this->auteur;
		$fields['css'] =$this->css;
		$fields['tag'] =$this->tag;
		$fields['problematique'] =$this->problematique;
		
		$articleFields= json_encode($fields);
		$articleFields=str_replace('"', "'", $articleFields);


		//$functionToCall = "javascript:addArticle('".$this->categorie."', ".$cbIdTab.");";
		$functionToCall = "javascript:addArticle(".$articleFields.");";
		$btnSaveId = "btnSave_".$this->zone;

		$panel  ='';
		$panel .= '<div class ="buttonPanel">';
		$panel .= '	<button  id="'.$btnSaveId.'" class="btn btn-danger disabled" onclick="'.$functionToCall.'" name="add" value="add" >Enregistrer</button>';
		$panel .= '	</div>';
		
		return ($panel);
	}
	
	//Dessine les bouton 'valide' et 'corbeille' à droite du titre
	private function drawIcones(){
		
		if($this->categorie == 'ressources_pedagogiques'){
			$lienDetailsRessource = "<a href='./index.php?page=details_ressources_pedagogiques&niveau=".$this->niveau."&id_article=".$this->id."'><span>n° ".$this->id."</span></a>";
		} else {$lienDetailsRessource = "<span>n° ".$this->id."</span>" ; }

		$functionDelete = "javascript:deleteArticle(".$this->id.", '".$this->categorie."');return false;";
		$functionSetArticle_On = "javascript:OnOffArticle(".$this->id.", true);return false;";
		$functionSetArticle_Off = "javascript:OnOffArticle(".$this->id.", false);return false;";

		$buttons = '';
		$buttons .= '<div class ="iconesPanel">';
		$buttons .= '	<div class ="num">';
		$buttons .= 		$lienDetailsRessource; 
		$buttons .= '	</div>';
		$buttons .= '	<div class ="vide"></div>';
		
		if($this->show_delete){
			//$buttons .= '<a  href="#" class="pictoRight fa fa-trash-o" onClick="'.$functionDelete.'">&nbsp;</a>';
			$buttons .= '<a  href="#" class="pictoRight corbeille" onClick="'.$functionDelete.'">&nbsp;</a>';
		
		}
		switch($this->valide){
			case 0 :	$buttons .= '<div id="article_picto_valide_'.$this->id.'" class="pictoRight light_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffArticle('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
				case 1 :$buttons .= '<div id="article_picto_valide_'.$this->id.'" class="pictoRight light_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffArticle('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	

		
		
		
		switch($this->show_icone){
			case 0 :	$buttons .= '<div id="article_picto_icone'.$this->id.'" class="pictoRight icone_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffIconeArticle('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="article_picto_icone'.$this->id.'" class="pictoRight icone_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffIconeArticle('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	
		switch($this->show_footer){
			case 0 :	$buttons .= '<div id="article_picto_footer'.$this->id.'" class="pictoRight footer_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffFooterArticle('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="article_picto_footer'.$this->id.'" class="pictoRight footer_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffFooterArticle('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	
		switch($this->show_header){
			case 0 :	$buttons .= '<div id="article_picto_header'.$this->id.'" class="pictoRight header_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffHeaderArticle('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="article_picto_header'.$this->id.'" class="pictoRight header_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffHeaderArticle('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	
		switch($this->show_border){
			case 0 :	$buttons .= '<div id="article_picto_border'.$this->id.'" class="pictoRight border_off">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffBorderArticle('.$this->id.', true);return false;">&nbsp;</a>';
						$buttons .= '</div>';

							break;
			case 1 :	$buttons .= '<div id="article_picto_border'.$this->id.'" class="pictoRight border_on">';
						$buttons .= '	<a  href="#" onclick="javascript:OnOffBorderArticle('.$this->id.', false);return false;">&nbsp;</a>';
						$buttons .= '</div>';
						break;
		}	
		
		
		

		$fonctionUpdateIcone = "javascript:setIcone(this.id,".$this->id."); return false;";
		
		
		$class = array( 'fa-tag', 'fa-folder-o', 'fa-plus', 'fa-first-order', 'fa-star', 'fa-puzzle-piece', 'fa-cog',
						'fa-check', 'fa-close', 'fa-flag', 'fa-share', 'fa-sign-out', 'fa-warning', 'fa-hand-o-right', 'fa-arrow-right', 'fa-chevron-right');
		
		foreach($class as $value) {$class[$value]= "opacity";}
		$class[$this->icone] = "";

		$icones  = '';
		$icones .= '<a  id="fa-tag" href="#" class="pictoLeft fa fa-tag '.$class['fa-tag'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-folder-o" href="#" class="pictoLeft fa fa-folder-o '.$class['fa-folder-o'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-plus" href="#" class="pictoLeft fa fa-plus '.$class['fa-plus'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-first-order" href="#" class="pictoLeft fa fa-first-order '.$class['fa-first-order'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-star" href="#" class="pictoLeft fa fa-star '.$class['fa-star'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-puzzle-piece" href="#" class="pictoLeft fa fa-puzzle-piece '.$class['fa-puzzle-piece'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-cog" href="#" class="pictoLeft fa fa-cog '.$class['fa-cog'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';


		$icones .= '<a  id="fa-check" href="#" class="pictoLeft fa fa-check '.$class['fa-check'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-close" href="#" class="pictoLeft fa fa-close '.$class['fa-close'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-flag" href="#" class="pictoLeft fa fa-flag '.$class['fa-flag'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-share" href="#" class="pictoLeft fa fa-share '.$class['fa-share'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-sign-out" href="#" class="pictoLeft fa fa-sign-out '.$class['fa-sign-out'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-warning" href="#" class="pictoLeft fa fa-warning '.$class['fa-warning'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-hand-o-right" href="#" class="pictoLeft fa fa-hand-o-right '.$class['fa-hand-o-right'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-arrow-right" href="#" class="pictoLeft fa fa-arrow-right '.$class['fa-arrow-right'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		$icones .= '<a  id="fa-chevron-right" href="#" class="pictoLeft fa fa-chevron-right '.$class['fa-chevron-right'].'" onClick="'.$fonctionUpdateIcone.'">&nbsp;</a>';
		

		$vide = '<div class ="vide"></div>';

		$buttons .= $icones;

		
		$buttons .= '</div>';
		
		return ($buttons);		
		
	}

	//Affiche le titre de l'article en mode editable 
	private function dsplayTitleBarEditMode(){
		$divCkEditor = "CkEditorTitleArticle".$this->instance;
		$classDivIcone = 'fa '.$this->icone;

		$functionToCall = "javascript:setArticleDivEditable ('".$divCkEditor."', '".$this->fieldNameTitre."', 'MyToolbar_article_title', '".$this->id."', '#btnSave_".$this->zone."', '".$this->categorie."'); return false;";

		$titre = $this->titre;
		if($this->titre =="") $titre = "...";

		$icone = '';
		$icone .= '	<div class="icone">';
		if($this->show_icone) {
			$icone .= '		<div  class="'.$classDivIcone.'"></div>';
		}
		$icone .= '	</div>';

		$titleBar = '';
		
		if ($this->id ==0 ) { $titleBar .= $this->drawNewButtonsPanel(); }
		if ($this->id !=0 ) { $titleBar .= $this->drawIcones(); } 
		
		$titleBar .= '	<div class="header">';	
		
		if ($this->id !=0 ) { $titleBar .= $icone; }
		
		$titleBar .= '	<div class="vide"></div>';

		$titleBar .= '	<div  id="'.$divCkEditor.'" contenteditable=false class="texteTitre" onclick="'.$functionToCall.'">';
		$titleBar .= 			$titre;
		$titleBar .= '	</div>';	

		$titleBar .= '	</div>';
		
		
		return ($titleBar);
	}
	
	//Affiche le contenu de l'article en mode editable
	private function displayContenuArticleEditMode(){
		
		$divCkEditor = "CkEditorContenuArticle".$this->instance;
		$functionToCall = "javascript:setArticleDivEditable ('".$divCkEditor."', '".$this->fieldNameContenu."', 'MyToolbar_ressources', '".$this->id."', '#btnSave_".$this->zone."', '".$this->categorie."', '".$this->niveau."'); return false;";
		
		$contenu = $this->contenu;
		if($this->contenu =="") $contenu = "...";
		
		$contenuArticle ="";
		$contenuArticle .= '<div class="body">';
		$contenuArticle .= '	<div  id="'.$divCkEditor.'" contenteditable=false class="texteDuContenu" onclick="'.$functionToCall.'">';
		$contenuArticle .=			$this->contenu;
		
		$contenuArticle .= '	</div>';
		$contenuArticle .= '</div>';
		
		
		return($contenuArticle );
	}

	private function dsplayFooterEditMode(){
		$divCkEditor = "CkEditorFooterArticle".$this->instance;
		$functionToCall = "javascript:setArticleDivEditable ('".$divCkEditor."', '".$this->fieldNameFooter."', 'MyToolbar_article_title', '".$this->id."', '#btnSave_".$this->zone."', '".$this->categorie."'); return false;";

		/*
		$dateTime = explode(" ", $this->date_creation);
		//convertir la date du format YYYY-MM-DD (SQL) au format d'affichage francais JJ-MM-AAAA
		$sqlDate = explode("-",$dateTime[0]);
		$fraDate = $sqlDate[2]."-".$sqlDate[1]."-".$sqlDate[0];
		*/
		$auteur = $this->auteur;
		if($this->auteur =="") $auteur = "...";

		$footer = "";
		$footer .= '	<div class="footer">';
		//$footer .= '	<div class="dateCreation">';
		//$footer .= 			$fraDate."  à  ".$dateTime[1] ;
		//$footer .= '	</div>';
		
		$footer .= '	<div class="pictoAuteur icon-users">';
		$footer .= '	</div>';
		$footer .= '	<div  id="'.$divCkEditor.'" contenteditable=false class="nomAuteur" onclick="'.$functionToCall.'">';
		$footer .= 			$auteur;
		$footer .= '	</div>';
		
		$footer .= '	</div>';
		

		
		return($footer );
			
	}

//-------------------------------- Mode Normal -----------------------------------------------------
	
	
	//Affiche le titre de l'article en mode lecture
	private function dsplayTitleBar(){				
		$classDivIcone = 'fa '.$this->icone;

		$icone = '';
		$icone .= '	<div class="icone">';
		if($this->show_icone) {
			$icone .= '		<div  class="'.$classDivIcone.'"></div>';
		}
		$icone .= '	</div>';


		$titleBar = '';
		
		$titleBar .= '	<div id="header_'.$this->id.'"  class="header">';			
		if($this->show_icone){ $titleBar .= $icone; }
		$titleBar .= '		<div class="vide"></div>';
		$titleBar .= '		<div class="texteTitre">';
		$titleBar .= 			$this->titre;
		$titleBar .= '		</div>';			
		$titleBar .= '	</div>';
		
		return ($titleBar);
	}
	/*
	private function codeJSHidePartieCachee($partieCacheeId) 
	{
		$code  = '<script>';
		$code .= '	if (document.getElementById("'.$partieCacheeId.'"))';
		$code .= '		document.getElementById("'.$partieCacheeId.'").style.display = "none";';
		$code .= '</script>';
		
		return $code;
	}
	*/
	//Affiche le contenu de l'article en mode lecture
	private function displayContenuArticle(){
		$partieCacheeId = "partie_cachee_".$this->id;
		$functionCall = "javascript:showHide('".$partieCacheeId."') ;return false ;";
		$partieCacheeShow = "partie_cachee_".$this->id."-show";
		$partieCacheeHide = "partie_cachee_".$this->id."-hide";
		
		//Preparer le lien "[...Lire la suite]" qui sera affiché si l'article est trop long
		$lienPlus = '<a href="#" id="'.$partieCacheeShow.'" class="showLink" onclick="'.$functionCall.'"><span class="btnMore">[...]</span></a>';
		
		//Preparer le lien "[...réduire]" qui sera affiché si l'article peut être réduit
		$lienReduire = '<a href="#" id="'.$partieCacheeHide.'" class="showLink" onclick="'.$functionCall.'"><span class="btnMore">[-]</span></a>';
		
		//Découper l'article en 2 morceaux (partie visible et partie qui sera cahée)
		$partiesArticles = explode($this->marqueDeSplit, $this->contenu, 2);
		
		//Si l'article comporte plus d'une partie
		if(count($partiesArticles) > 1)
		{
			$partiesArticles[0] = $partiesArticles[0]."   ".$lienPlus;
			$partiesArticles[1] = $partiesArticles[1]."   ".$lienReduire;
		}
		
		
		$contenuArticle ="";
		$contenuArticle .= '<div id="texteDeArticle_'.$this->id.'" class="body">';
		$contenuArticle .= '	<div  class="texteDuContenu">';
		
		$contenuArticle .= 		$partiesArticles[0];
		
		if(count($partiesArticles) > 1)
		{			
			$contenuArticle .= ' 		<div id="partie_cachee_'.$this->id.'" class="more">';
			$contenuArticle .= 			$partiesArticles[1];			
			$contenuArticle .= '		</div>';
			
		}
		$contenuArticle .= '	</div>';
		$contenuArticle .= '</div>';
		
		//$contenuArticle .= $this->codeJSHidePartieCachee($partieCacheeId);
		
		return($contenuArticle );
	}
	
	private function dsplayFooter(){
		$dateTime = explode(" ", $this->date_creation);
		
		/*
		//convertir la date du format YYYY-MM-DD (SQL) au format d'affichage francais JJ-MM-AAAA
		$sqlDate = explode("-",$dateTime[0]);
		$fraDate = $sqlDate[2]."-".$sqlDate[1]."-".$sqlDate[0];
		*/

		$footer = "";
		$footer .= '	<div id="footer_'.$this->id.'"  class="footer">';
		//$footer .= '	<div class="dateCreation">';
		//$footer .= 			$fraDate."  à  ".$dateTime[1] ;
		//$footer .= '	</div>';
		
		$footer .= '	<div class="pictoAuteur icon-users">';
		$footer .= '	</div>';
		$footer .= '	<div class="nomAuteur">';
		$footer .= 			$this->auteur;
		$footer .= '	</div>';
		
		$footer .= '	</div>';
		
		return ($footer);		
	}

	
	public function drawArticle(){
		$form ="";
		
		if($this->adminMode){
			$form .= '<div id="ZoneArticle">';
			$form .= 	$this->dsplayTitleBarEditMode();
			$form .= 	$this->displayContenuArticleEditMode();
			$form .= 	$this->dsplayFooterEditMode();
			$form .= '</div>';
		}
		else{
			$form .= '<div id="ZoneArticle">';
			if($this->show_header) $form .= 	$this->dsplayTitleBar();
			$form .= 	$this->displayContenuArticle();
			if($this->show_footer) $form .= 	$this->dsplayFooter();
			$form .= '</div>';
		}
		
		$form .= '		<div style="clear:both;">';
		$form .= '		</div>';
		
		$script='';
		/*
		if((!$this->show_footer) && ($this->show_border)) { 
			$script = '<script> drawBorderContent('.$this->id.', true);</script>';
		}
		if(!$this->show_border) { 
			$script = '<script> drawBorderContent('.$this->id.', false);</script>';
		}
		*/

		$script="";
		if(!$this->show_header) { 
			$script .= '<script> drawBorderContent("texteDeArticle_'.$this->id.'", "top"); </script>';
		}
		if(!$this->show_footer) { 
			$script .= '<script> drawBorderContent("texteDeArticle_'.$this->id.'", "bottom"); </script>';
		}
		if($this->show_border)  { 
			$script .= '<script>
							drawBorderContent("texteDeArticle_'.$this->id.'", "left"); 
							drawBorderContent("texteDeArticle_'.$this->id.'", "right");
						</script>';
		}
		else {
				$script .= '<script> 
								drawBorderContent("texteDeArticle_'.$this->id.'", "none");
								drawBorderContent("header_'.$this->id.'", "none");
								drawBorderContent("footer_'.$this->id.'", "none");
							</script>';
			}

		return ($form.$script);
		
	}
	
	
    public function displayArticle() {
		echo $this->drawArticle();
    }

}

?> 