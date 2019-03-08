//
//Faire un scroll
//
function SetScroll(scrollLeft, scrollTop){
	window.scrollTo (scrollLeft, scrollTop);

} 


//utilisée pour afficher les boites de messages sur un fond flou
function toggleOverlay(idOfElement, scrollLeft, scrollTop ){
	var overlay = document.getElementById('CachePage');
	var specialBox = document.getElementById(idOfElement);
				
	overlay.style.opacity = .8;
	if(overlay.style.display == "block"){
		overlay.style.display = "none";
		specialBox.style.display = "none";
	} else {
		overlay.style.display = "block";
		specialBox.style.display = "block";
	}
				
	//alert("toggleOverlay"+scrollLeft+"   "+scrollTop);
	if ((scrollLeft !== undefined) && (scrollLeft !== undefined)){
		window.scrollTo (scrollLeft, scrollTop);
	}

}



//fonction appelée pour afficher ou cacher la suite d'un article
function showHide(shID) {
	
   if (document.getElementById(shID)) {
      if (document.getElementById(shID+'-show').style.display != 'none') {
         document.getElementById(shID+'-show').style.display = 'none';
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID+'-show').style.display = 'inline';
         document.getElementById(shID).style.display = 'none';
      }
   }
}

function getScrollPos()
{
	var scroll = {'Left':0, 'Top':0};
	if (window.pageXOffset !== undefined) { // All browsers, except IE9 and earlier
		scroll.Left = window.pageXOffset;
		scroll.Top = window.pageYOffset;
	} else { // IE9 and earlier
		scroll.Left = document.documentElement.scrollLeft;
		scroll.Top = document.documentElement.scrollTop;
	}
	return scroll;
}

function getRefreshURL(base, defaultDonneeURL, scroll){
	var baseURL = window.location.protocol + "//" + window.location.host  + window.location.pathname;
	var actuelURL = document.location.href;
	var donneesURL= actuelURL.replace(baseURL,"" );
	if (donneesURL == '') donneesURL = defaultDonneeURL ; 
	
	var page=""; var niveau= ""; var id_titre= "";
	buf=donneesURL.split('&');
	if(buf[0])  page = buf[0].substr(1);
	if(donneesURL.indexOf('niveau')>0) niveau = buf[1];
	if(donneesURL.indexOf('id_titre')>0) id_titre = buf[1];
	
	var refreshURL = base;
	if (page!=="") refreshURL += '?'+page;
	if (niveau!=="") refreshURL += '&'+niveau;
	if (id_titre!=="") refreshURL += '&'+id_titre;
	if (scroll.Top!==0) refreshURL += '&scrollTop='+scroll.Top;
	if (scroll.Left!==0) refreshURL += '&scrollLeft='+scroll.Left;
	
	//alert("baseURL : " + baseURL + "\nactuelURL: " + actuelURL + "\ndonneesURL : "+donneesURL+ "\npage : "+page+ "\nniveau : "+niveau+"\nrefreshURL : "+refreshURL);
	return(refreshURL);
}

//cette fonction dessine la bordure autour du texte de l'info, 
function drawBorderContent(idElement, pos){
	element = document.getElementById(idElement) ;
	if (element) {
		switch (pos){
			case "top" : $(element).css("border-top", "1px solid #333" ); break;
			case "bottom" : $(element).css("border-bottom", "1px solid #333" ); break;
			case "left" : $(element).css("border-left", "1px solid #333" ); break;
			case "right" : $(element).css("border-right", "1px solid #333" ); break;
			case "none" : $(element).css("border", "none" ); break;
		}
	}
}

//cette fonction applique le css à l'elemnet portant l'id: idElement
function setCss(idElement, css){
	var style={};
	$.each( css, function( key, value ) { style[key]=value; });
	element = document.getElementById(idElement) ;
	$(element).css(style );
}


var editor1, html = '';
var destroy=false;

//cette fonction supprime l'edition d'un div
function setDivNoEditable (){
	if ( !editor1 )  return;
	//alert(editor1);
	$("#"+editor1.name).attr("contenteditable","false");
	// Destroy the editor.
	editor1.destroy();
	editor1 = null;
	destroy=false;


}

//cette fonction rend un div de la classe 'Titre' editable
function setTitreDivEditable (divCkEditor, fieldName, mytoolBar, id, btnSaveId){
	if ( destroy )  setDivNoEditable ();
	if ( editor1 )  return;
	CKEDITOR.disableAutoInline = false;
	$("#"+divCkEditor).attr("contenteditable","true");
	//alert ("divCkEditor = "+divCkEditor+"\nfieldName = "+fieldName+"\nmytoolBar = "+mytoolBar+"\nid = "+id);
	editor1 = CKEDITOR.inline(divCkEditor, {
		toolbar : mytoolBar,
		//customConfig : './js/ckeditor_config.js',
		on: {
			blur:	function( event ) {  //alert("blur");
						data = event.editor.getData(); 
						if(dataChanged){
							if(id == 0){
								switch (fieldName) {
									case "titre" : texteNewTitre = data ; dataChanged = false; break;
									case "contenu" : contenuNewTitre = data ; dataChanged = false; break;
								}
							} else {
								updateTitre(id, fieldName, data) ;
								dataChanged = false;
							}
						}
					destroy=true; 
					},

			change :function( event ){ 
						data = event.editor.getData(); 
						//alert("---"+$.trim(data)+"---");
						dataChanged = true;
						if (fieldName=="titre") {
							if ( $.trim(data) == "" ) { $(btnSaveId).addClass("disabled"); dataChanged = false; }
							else { $(btnSaveId).removeClass("disabled"); dataChanged = true; }

						}
					},
			focus: function( event ) {
						setTimeout( function() {
							var editor = event.editor,
							range = editor.createRange();
							range.moveToElementEditEnd( editor.editable() );
							range.select();
							range.scrollIntoView();
						}, 100 );
					}

			}
	});
}


//cette fonction rend un div de la classe 'Titre' editable
function setArticleDivEditable (divCkEditor, fieldName, mytoolBar, id, btnSaveId, categorie, $niveau){
	if ( destroy )  setDivNoEditable ();
	if ( editor1 )  return;
	CKEDITOR.disableAutoInline = true;
	$("#"+divCkEditor).attr("contenteditable","true");
	//alert ("divCkEditor = "+divCkEditor+"\nfieldName = "+fieldName+"\nmytoolBar = "+mytoolBar+"\nid = "+id);
	editor1 = CKEDITOR.inline(divCkEditor, {
		toolbar : mytoolBar,
		on: {
			blur:	function( event ) {  //alert("blur");
						data = event.editor.getData(); 
						if(dataChanged){
							if(id == 0){
								switch (fieldName) {
									case "titre" : titreNouvelArticle = data ; dataChanged = false; break;
									case "contenu" : contenuNouvelArticle = data ; dataChanged = false; break;
									case "auteur" : auteurNouvelArticle = data ; dataChanged = false; break;
								}
							} else {
								updateArticle(id, fieldName, data, categorie, $niveau) ;
								dataChanged = false;
							}
						}
					destroy=true; 
					},

			change :function( event ){ 
						data = event.editor.getData(); 
						//alert("---"+$.trim(data)+"---");
						dataChanged = true;
						if (fieldName=="contenu") {
							if ( $.trim(data) == "" ) { $(btnSaveId).addClass("disabled"); dataChanged = false; }
							else { $(btnSaveId).removeClass("disabled"); dataChanged = true; }

						}
					}
			
			}
	});
}


//cette fonction rend un div de la page ressource editable
function setDivEditable (divCkEditor, fieldName, mytoolBar, id){
	if ( destroy )  setDivNoEditable ();
	if ( editor1 )  return;
	CKEDITOR.disableAutoInline = true;
	$("#"+divCkEditor).attr("contenteditable","true");
	//alert ("divCkEditor = "+divCkEditor+"\nfieldName = "+fieldName+"\nmytoolBar = "+mytoolBar+"\nid = "+id);
	editor1 = CKEDITOR.inline(divCkEditor, {
		toolbar : mytoolBar,
		//width:'100%',
		//height:'800',

		on: {
			blur:	function( event ) {  //alert("blur");
						data = event.editor.getData(); 
						if(dataChanged){
							updateRessource(id, fieldName, data) ;
							dataChanged = false;
						}
						
					
					destroy=true; 
					//setDivNoEditable ();
					 //return false;
					},

			change :function( event ){ dataChanged = true; }
						
			
			}
	});
}




/*
function createEditor(divCkEditor, html) {

	if ( editor1 )  return;

	// Create a new editor instance inside the <div id="editor"> element,
	// setting its value to html.
	var config = {};
	//alert(divCkEditor);
	editor1 = CKEDITOR.appendTo( divCkEditor, config, html );

	// Update button states.
	document.getElementById( 'remove_'+divCkEditor ).style.display = '';
	document.getElementById( 'create_'+divCkEditor ).style.display = 'none';
}

function removeEditor(divCkEditor) {

	if ( !editor1 ) return;

	// Retrieve the editor content. In an Ajax application this data would be
	// sent to the server or used in any other way.
	html = editor1.getData();
	//alert(divCkEditor);
	// Update <div> with "Edited Content".
	document.getElementById( divCkEditor).innerHTML = html;
	// Show <div> with "Edited Content".
	document.getElementById( 'content1' ).style.display = '';
	// Update button states.
	document.getElementById( 'remove_'+divCkEditor ).style.display = 'none';
	document.getElementById( 'create_'+divCkEditor ).style.display = '';

	// Destroy the editor.
	editor1.destroy();
	editor1 = null;*/


