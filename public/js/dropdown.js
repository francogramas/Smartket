$(document).ready(function(){
    
    $("#paises").change(function(event){
  		$.get("/departamentos/"+event.target.value+"", function(response,state){
  			$("#departamentos").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#departamentos").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}  			
  		});		
    });

     $("#departamentos").change(function(event){
  		$.get("/ciudades/"+event.target.value+"", function(response,state){
  			$("#ciudad").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#ciudad").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});		
    });	

  $(function()
  {
     $("#buscarP").autocomplete({
      source: "/buscar/producto",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarP').val(ui.item.value);
        $('#producto_id').val(ui.item.id);
      }
    });

    $("#buscarP").click(function(){
      $("#buscarP").val("");
      $("#producto_id").val("0");
    });
  });
});