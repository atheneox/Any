var url = "productos";

$(document).on('click', '.open_modal', function () {
  var id = $(this).val();
    $.get(url + '/' + id +'/edit', function (data) {

      $('#id').val(data.id);
      $('#producto').val(data.producto);
      $('#codigobarra').val(data.codigobarra);
      $('#codigoproducto').val(data.codigoproducto);
      $('#descripcion').val(data.descripcion);
      $('#estado').val(data.estado);
      $('#fabrica_id').val(data.fabrica_id);

      $('#btn-save').val("update");
      $('#myModal').modal('show');
    })
});

$('#btn_add').click(function () {
    $('#btn-save').val("add");
    $('#frmproductos').trigger("reset");
    $('#myModal').modal('show');
});

$(document).on('click', '.delete-producto', function () {
  var id = $(this).val();
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  })
  $.ajax({
      type: "DELETE", // Cambiar a GET para eliminación completa DELETE & GET
      url: url + '/' + id,

      success: function (data) {
          $("#producto" + id).remove();
      },
      error: function (data) {
          console.log('Error:', data);
      }
  });
});

$("#btn-save").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    var formData = {

        code:             $('#code').val(),
        producto:         $('#producto').val(),
        codigobarra:      $('#codigobarra').val(),
        codigoproducto:   $('#codigoproducto').val(),
        descripcion:      $('#descripcion').val(),
        estado:           $('#estado').val(),
        fabrica_id:       $('#fabrica_id').val(),

    }

    var state = $('#btn-save').val();
    var type  = "POST";
    var id    = $('#id').val();

    var my_url = "productos";
    if (state == "update") {
        type = "PUT";
        my_url += '/' + id;
    }
    console.log(formData);
    $.ajax({
        type:       type,
        url:      my_url,
        data:   formData,
        dataType: 'json',

        success: function (data) {

          var producto =  '<tr  id="producto' + data['producto'].id     + '">';

          producto    +=  '<td>' + data['producto'].id              + '</td>';
          producto    +=  '<td>' + data['producto'].producto              + '</td>';
          producto    +=  '<td>' + data['producto'].estado        + '</td>';
          producto    +=  '<td> <button class="btn btn-success open_modal               btn-xs" value="' + data['producto'].id + '"> <i class="fa fa-eye">   </i> Ver      </button> </td>';
          producto    +=  '<td> <button class="btn btn-danger  btn-delete delete-producto btn-xs" value="' + data['producto'].id + '"> <i class="fa fa-trash"> </i> Eliminar </button> </td>';
          producto    +=  '</tr>';

          if (state == "add") {
              $('#productos-list').append(producto);
          } else {
              $("#producto" + id).replaceWith(producto);
          }

            $('#frmproductos').trigger("reset");
            $('#myModal').modal('hide')

            console.log('productoes:', producto);

          console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
