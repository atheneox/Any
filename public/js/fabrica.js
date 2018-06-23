var url = "fabricas";

$(document).on('click', '.open_modal', function () {
  var id = $(this).val();
    $.get(url + '/' + id +'/edit', function (data) {

      $('#id').val(data.id);
      $('#fabricante').val(data.fabricante);
      $('#estado').val(data.estado);

      $('#btn-save').val("update");
      $('#myModal').modal('show');
    })
});

$('#btn_add').click(function () {
    $('#btn-save').val("add");
    $('#frmfabricas').trigger("reset");
    $('#myModal').modal('show');
});

$(document).on('click', '.delete-fabrica', function () {
  var id = $(this).val();
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  })
  $.ajax({
      type: "DELETE", 
      url: url + '/' + id,

      success: function (data) {
          $("#fabrica" + id).remove();
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
        fabricante:         $('#fabricante').val(),
        estado:             $('#estado').val(),
    }

    var state = $('#btn-save').val();
    var type  = "POST";
    var id    = $('#id').val();

    var my_url = "fabricas";
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

          var fabrica =  '<tr  id="fabrica' + data['fabrica'].id + '">';

          fabrica    +=  '<td>' + data['fabrica'].id     + '</td>';
          fabrica    +=  '<td>' + data['fabrica'].fabricante         + '</td>';
          fabrica    +=  '<td>' + data['fabrica'].estado     + '</td>';
          fabrica    +=  '<td> <button class="btn btn-success open_modal                btn-xs" value="' + data['fabrica'].id + '"> <i class="fa fa-eye">   </i> Ver      </button> </td>';
          fabrica    +=  '<td> <button class="btn btn-danger  btn-delete delete-fabrica btn-xs" value="' + data['fabrica'].id + '"> <i class="fa fa-trash"> </i> Eliminar </button> </td>';
          fabrica    +=  '</tr>';

          if (state == "add") {
              $('#fabricas-list').append(fabrica);
          } else {
              $("#fabrica" + id).replaceWith(fabrica);
          }

            $('#frmfabricas').trigger("reset");
            $('#myModal').modal('hide')

            console.log('fabricaes:', fabrica);
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});
