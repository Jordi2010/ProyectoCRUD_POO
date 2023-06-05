
$(document).ready(function () {
    cargarDatos();
});
//cargamos los datos, comprobando que la ruta actual sea membresias

  
  //obtenemos el id del registro a eliminar y si el administrador desea eliminar dicho registro
  $(document).on('click', '.eliminar-membresia', function() {
    var idMembresia = $(this).data("id");
    Swal.fire({
      title: '¿Está seguro de eliminar este membresia?',
      text: "¡Si no lo está, puede cancelar la acción, de lo contrario no hay vuelta atras!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../ajax/membresias.ajax.php?metodo=eliminar&id=" + idMembresia,
          method: "GET",
          success: function(respuesta) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            var tablaMiembros = $('#tabla-membresias');
            tablaMiembros.DataTable().destroy();
            cargarDatos();
          },
          error: function() {
            mostrarError();
          },
        });
        
      }
    })

  });

  $("#nuevo-membresia").click(function(event) {
    event.preventDefault();
    var datos = $("#FormNuevamiembro").serialize();
    datos += "&metodo=nuevo";
    $.ajax({
      url: "../ajax/membresias.ajax.php",
      type: "POST",
      data: datos,
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaMiembros = $('#tabla-membresias');
          tablaMiembros.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'La membresia ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevamiembro")[0].reset();
          $(".close").click();
          cargarDatos();
        } else {
          mostrarError();
        }
      },
      error: function(respuesta) {
        mostrarError();
      },
    });  
  });


    //traemos los campos que necesitemos mostrar en el formulario de editar
    $(document).on('click', '.editar-membresia', function() {
      $("#FormEditarmiembro")[0].reset();
      var idMembresia = $(this).data("id");
      
      $.ajax({
        url: "../ajax/membresias.ajax.php?metodo=obtener&id=" + idMembresia,
        method: "GET",
        dataType: "json",
        success: function(respuesta) {
          $("#editarnombre").val(respuesta.nombre);
          $("#editardescripcion").val(respuesta.descripcion);
          $("#editarduracion").val(respuesta.duracion);
          $("#editarcosto").val(respuesta.costo);
          $("#FormEditarmiembro").attr("data-id", idMembresia);
        },
        error: function(respuesta) {
          mostrarError();
        },
      });
    });
  
  $("#editar-membresia").click(function(event) {
    event.preventDefault();
    var idMembresia = $("#FormEditarmiembro").attr("data-id");
    var datos = $("#FormEditarmiembro").serialize();
    datos += "&id=" +idMembresia + "&metodo=editar"
    $.ajax({
      url: "../ajax/membresias.ajax.php",
      method: "POST",
      data: datos,
      dataType: "json",
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaMiembros = $('#tabla-membresias');
          tablaMiembros.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El membresia ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevamiembro")[0].reset();
          $(".close").click();
          cargarDatos();
        } else {
          mostrarError();
        }
        
      },
      error: function() {
        mostrarError();
      },
    });
  });


  
  function cargarDatos() {
    $.ajax({
      url: "../ajax/membresias.ajax.php?metodo=mostrar",
      type: "GET",
      dataType: "json",
      success: function(respuesta) {
        var tbody = $('#tabla-membresias').find('tbody');
        var contador = 1;
        tbody.empty();
        $.each(respuesta, function(index, membresia) {
          var tr = $("<tr>");
          tr.append("<td>" + contador + "</td>");
          tr.append("<td>" + membresia.nombre + "</td>");
          tr.append("<td>" + membresia.descripcion + "</td>");
          tr.append("<td>" + membresia.duracion + "</td>");
          tr.append("<td>" + membresia.costo + "</td>");
          tr.append("<td>"
            + '<div class="btn-group">'
            + "<button data-bs-toggle='modal' data-bs-target='#ModalEdit' class='btn btn-warning editar-membresia' data-id='" + membresia.id + "'> "
            + '<i class="bi bi-pencil-square"></i>'
            + "</button>"
            + "<button class='btn btn-danger eliminar-membresia' data-id='" + membresia.id + "'>"
            + '<i class="bi bi-trash"></i>'
            + "</button></li></div></td>");
          tbody.append(tr);
          contador++;
        });
        $('#tabla-membresias').DataTable({
          language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros por página",
            info: "Mostrando _START_ al _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 al 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros en total)",
            paginate: {
              first: "Primero",
              last: "Último",
              next: "Siguiente",
              previous: "Anterior"
            }
          }
        });
      },
      error: function(respuesta) {
        mostrarError();
      },
    });
  }
  
  function mostrarError() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: 'u_u'
      })
  }
  