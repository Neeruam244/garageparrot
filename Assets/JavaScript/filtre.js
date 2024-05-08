//Start script range slider FilterSearch used_Vehicles 
$(document).ready(function() {
    // Sélectionner l'élément du slider par son ID
    let sliderPrice = $("#price-slider");
  
    // Initialiser le slider avec les options appropriées
    sliderPrice.slider({
      range: true, // Activer la sélection d'une plage de valeurs
      min: 0, // Valeur minimale du range
      max: 500000, // Valeur maximale du range
      values: [0 , 500000], // Plage de valeurs initiale
      step: 1000, // Pas d'incrémentation du slider
      create: function() {
        // Ajouter des ronds personnalisés
        let handles = sliderPrice.find(".ui-slider-handle");
        handles.eq(0).addClass("first-handle");
        handles.eq(1).addClass("second-handle");
        
        // Afficher les valeurs initiales du range dans la div
        let minPrice = sliderPrice.slider("values", 0);
        let maxPrice = sliderPrice.slider("values", 1);
        $("#price-values").text(minPrice  + " € " + " - " + maxPrice  + " € ");
      },
      slide: function(event, ui) {
        // Mettre à jour les valeurs des inputs cachés
        $("#minPrice").val(ui.values[0]);
        $("#maxPrice").val(ui.values[1]);
        
        // Mettre à jour les valeurs du range dans la div en temps réel
        $("#price-values").text(ui.values[0] + " € " + " - " + ui.values[1] + " € ");
      }
    });
  });
  
  $(document).ready(function() {
    // Sélectionner l'élément du slider par son ID
    let sliderMileage = $("#mileage-slider");
  
    // Initialiser le slider avec les options appropriées
    sliderMileage.slider({
      range: true, // Activer la sélection d'une plage de valeurs
      min: 0, // Valeur minimale du range
      max: 500000, // Valeur maximale du range
      values: [0 , 500000], // Plage de valeurs initiale
      step: 1000, // Pas d'incrémentation du slider
      create: function() {
        // Ajouter des ronds personnalisés
        let handles = sliderMileage.find(".ui-slider-handle");
        handles.eq(0).addClass("first-handle");
        handles.eq(1).addClass("second-handle");
        
        // Afficher les valeurs initiales du range dans la div
        let minMileage = sliderMileage.slider("values", 0);
        let maxMileage = sliderMileage.slider("values", 1);
        $("#mileage-values").text(minMileage + " km " + " - " + maxMileage + " km ");
      },
      slide: function(event, ui) {
        // Mettre à jour les valeurs des inputs cachés
        $("#minMileage").val(ui.values[0]);
        $("#maxMileage").val(ui.values[1]);
        
        // Mettre à jour les valeurs du range dans la div en temps réel
        $("#mileage-values").text(ui.values[0] + " km " + " - " + ui.values[1] + " km ");
      }
    });
  });
  //End script range slider FilterSearch used_Vehicles 

