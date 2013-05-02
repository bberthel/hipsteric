jQuery(function( $ ){
	
	// On cache le contenu de notre page (contenu + footer)
    $("#all").hide();
	$("#fond_footer").hide();	
	
    // On affiche notre page de chargement
    $("#loading").show(); 
	
    // Lorsque notre contenu est chargé et après 5 secondes
	$(window).load(function() {
		setTimeout(function() {
		
		
			// On fait disparaitre notre page de chargement
			$("#loading").fadeOut(function() { 
				//Ensuite on fait apparaitre notre contenu
				$("#all").fadeIn(1500);
				$("#fond_footer").fadeIn(1500); 
			})
		},3000);
	})
							
});