$(document).ready(function(){
//-----------------------------------------------------------------------------------------
    $("#paises").change(function(event){
  		$.get("/departamentos/"+event.target.value+"", function(response,state){
  			$("#departamentos").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#departamentos").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});
    });
//-----------------------------------------------------------------------------------------
     $("#departamentos").change(function(event){
  		$.get("/ciudades/"+event.target.value+"", function(response,state){
  			$("#ciudad").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#ciudad").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});
    });
//-----------------------------------------------------------------------------------------
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
    });
  });
//-----------------------------------------------------------------------------------------
  $(function()
  {
     $("#buscarPInv").autocomplete({
      source: "/buscar/productoInventario",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarPInv').val(ui.item.value);
        $('#producto_id').val(ui.item.id);
        $('#valor').val(ui.item.valor);
        $('#lote').val(ui.item.lote);
        $('#stock').val(ui.item.cantidad);
        $('#inventario_id').val(ui.item.inventario_id);
      }
    });
      $("#buscarPInv").click(function(){
      $("#buscarPInv").val("");
    });
  });
//-----------------------------------------------------------------------------------------
  $(function() {
     $("#buscarTercero").autocomplete({
      source: "/buscar/tercero",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarTercero').val(ui.item.value);
        $('#tercero_id').val(ui.item.id);
      }
    });
     $("#buscarTercero").click(function(){
      $("#buscarTercero").val("");
      $('#tercero_id').val('0');
    });
  });
  //-----------------------------------------------------------------------------------------
  $(function() {
     $("#buscarTerceroCartera").autocomplete({
      source: "/buscar/tercero",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarTerceroCartera').val(ui.item.value);
        $('#tercero_id').val(ui.item.id);
        var tipocartera_id= $('#tipocartera_id').val();
        
        $.ajax({
          url: '/cartera/detalle/'+ui.item.id+'/'+tipocartera_id,
          type: 'GET',
          success:function(data){
            $("#detalleAbonos").empty().html(data);
          },
          error:function(data){
            console.log('Error');
          }
        });

      }
    });
    $("#buscarTerceroCartera").click(function(){
      $("#buscarTerceroCartera").val("");
      $('#tercero_id').val('0');
    });
  });
//-----------------------------------------------------------------------------------------
  $('.btn-delete').click( function(e){
    e.preventDefault();
    var row = $(this).parents('tr');
    var id=row.data('id');
    var form = $('#form-delete');

    var url=form.attr('action').replace(':DETALLE_ID',id);
    var data=form.serialize();

    $.post(url,data, function(result){
      row.fadeOut();
      alert(result);
    }).fail(function(){
      alert('El registro no se pudo eliminar');
    });
  });
//-----------------------------------------------------------------------------------------
 $("#TxtEfectivo").change(function(event) {
    var total=$("#hdnTotal").val();
    var efectivo=$("#TxtEfectivo").val();
    var efectivoN=Number(efectivo.replace(/[^0-9\.]+/g,""));
    $('#LblCambio').val((efectivoN-total)*100);
 });

  //---------------------------------------------------------------------------------------
 $(function() {
    $('.currency').maskMoney({thousands:',', decimal:'.', allowZero:true, prefix: '$ '});
  })
 //---------------------------------------------------------------------------------------
  $("#agregarAbono").click(function(event) {

    var _tercero_id=$('#tercero_id').val();
    var _deuda=$('#txtDeuda').val();
    _deuda=Number(_deuda.replace(/[^0-9\.]+/g,""));
    var _abono=$('#txtAbono').val();
    _abono=Number(_abono.replace(/[^0-9\.]+/g,""));
    var _tipocartera_id=$('#tipocartera_id').val();
    var _estadocartera_id=1;
    var token=$("input[name=_token]").val();
    var route='/carteraCrear';

    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {tercero_id: _tercero_id, deuda: _deuda, abono: _abono, tipocartera_id: _tipocartera_id, estadocartera_id: _estadocartera_id},
      success:function(data){
        if (data.success='true'){
        }
      },
      error:function(data){
        console.log("Error");
      }
    });
    
    $.ajax({
      url: '/cartera/detalle/'+_tercero_id+'/'+_tipocartera_id,
      type: 'GET',
      success:function(data){
        $("#detalleAbonos").empty().html(data);
      },
    error:function(data){
        console.log('Error');
      }
    });

    $.ajax({
      url: '/cartera/consolidado/'+_tipocartera_id,
      type: 'GET',
      success:function(data){
        $("#consolidadoCartera").empty().html(data);
      },
    error:function(data){
        console.log('Error');
      }
    });

  });
});