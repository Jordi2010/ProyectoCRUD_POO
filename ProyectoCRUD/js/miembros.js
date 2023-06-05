$(document).ready(function () {
    cargarDatos();
});
//cargamos los datos, comprobando que la ruta actual sea miembros

  //obtenemos el id del registro a eliminar y si el administrador desea eliminar dicho registro
  $(document).on('click', '.eliminar-miembro', function() {
    var idMiembro = $(this).data("id");
    Swal.fire({
      title: '¿Está seguro de eliminar este miembro?',
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
          url: "../ajax/miembros.ajax.php?metodo=eliminar&id=" + idMiembro,
          method: "GET",
          success: function(respuesta) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            var tablaMiembros = $('#tabla-miembros');
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

  $("#nuevo-miembro").click(function(event) {
    event.preventDefault();
    var datos = $("#FormNuevamiembros").serialize();
    datos += "&metodo=nuevo";
    $.ajax({
      url: "../ajax/miembros.ajax.php",
      type: "POST",
      data: datos,
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaMiembros = $('#tabla-miembros');
          tablaMiembros.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El miembro ha sido guardado correctamente',
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
    $(document).on('click', '.editar-miembro', function() {
      $("#FormEditarmiembro")[0].reset();
      var idMiembro = $(this).data("id");
      
      $.ajax({
        url: "../ajax/miembros.ajax.php?metodo=obtener&id=" + idMiembro,
        method: "GET",
        dataType: "json",
        success: function(respuesta) {
          $("#editarnombre").val(respuesta.nombre);
          $("#editardireccion").val(respuesta.direccion);
          $("#editartelefono").val(respuesta.telefono);
          $("#editarcorreo").val(respuesta.correo);
          $("#editarfecha").val(respuesta.fecha_registro);
          $("#editarfecha_registro").val(respuesta.fecha_registro);
          $("#FormEditarmiembro").attr("data-id", idMiembro);
        },
        error: function(respuesta) {
          mostrarError();
        },
      });
    });
  
  $("#editar-miembro").click(function(event) {
    event.preventDefault();
    var idMiembro = $("#FormEditarmiembro").attr("data-id");
    var datos = $("#FormEditarmiembro").serialize();
    datos += "&id=" + idMiembro + "&metodo=editar"
    $.ajax({
      url: "../ajax/miembros.ajax.php",
      method: "POST",
      data: datos,
      dataType: "json",
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaMiembros = $('#tabla-miembros');
          tablaMiembros.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El miembro ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormEditarmiembro")[0].reset();
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


  
  function cargarDatos() {
    $.ajax({
      url: "../ajax/miembros.ajax.php?metodo=mostrar",
      type: "GET",
      dataType: "json",
      success: function(respuesta) {
        var tbody = $('#tabla-miembros').find('tbody');
        var contador = 1;
        tbody.empty();
        $.each(respuesta, function(index, miembro) {
          var tr = $("<tr>");
          tr.append("<td>" + contador + "</td>");
          tr.append("<td>" + miembro.nombre + "</td>");
          tr.append("<td>" + miembro.direccion + "</td>");
          tr.append("<td>" + miembro.telefono + "</td>");
          tr.append("<td>" + miembro.correo + "</td>");
          tr.append("<td>" + miembro.fecha_registro + "</td>");
          tr.append("<td>"
            + '<div class="btn-group">'
            + "<button data-bs-toggle='modal' data-bs-target='#ModalEdit' class='btn btn-warning editar-miembro' data-id='" + miembro.id + "'> "
            + '<i class="bi bi-pencil-square"></i>'
            + "</button>"
            + "<button class='btn btn-danger eliminar-miembro' data-id='" + miembro.id + "'>"
            + '<i class="bi bi-trash"></i>'
            + "</button></li></div></td>");
          tbody.append(tr);
          contador++;
        });
        $('#tabla-miembros').DataTable({
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
  