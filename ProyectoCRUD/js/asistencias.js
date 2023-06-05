$(document).ready(function () {
    cargarDatos();
});
//cargamos los datos, comprobando que la ruta actual sea asistencias

  //obtenemos el id del registro a eliminar y si el administrador desea eliminar dicho registro
  $(document).on('click', '.eliminar-asistencia', function() {
    var idAsistencia = $(this).data("id");
    Swal.fire({
      title: '¿Está seguro de eliminar este asistencia?',
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
          url: "../ajax/asistencias.ajax.php?metodo=eliminar&id=" + idAsistencia,
          method: "GET",
          success: function(respuesta) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            var tablaAsistencias = $('#tabla-asistencias');
            tablaAsistencias.DataTable().destroy();
            cargarDatos();
          },
          error: function() {
            mostrarError();
          },
        });
        
      }
    })

  });

  $("#nuevo-asistencia").click(function(event) {
    event.preventDefault();
    var datos = $("#FormNuevaasistencias").serialize();
    datos += "&metodo=nuevo";
    $.ajax({
      url: "../ajax/asistencias.ajax.php",
      type: "POST",
      data: datos,
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaAsistencias = $('#tabla-asistencias');
          tablaAsistencias.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El asistencia ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevaasistencia")[0].reset();
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
      url: "../ajax/asistencias.ajax.php?metodo=mostrar",
      type: "GET",
      dataType: "json",
      success: function(respuesta) {
        var tbody = $('#tabla-asistencias').find('tbody');
        var contador = 1;
        tbody.empty();
        $.each(respuesta, function(index, asistencia) {
          var tr = $("<tr>");
          tr.append("<td>" + contador + "</td>");
          tr.append("<td>" + asistencia.checkin + "</td>");
          tr.append("<td>" + asistencia.checkout + "</td>");
          tr.append("<td>" + asistencia.miembro + "</td>");
          tr.append("<td>"
            + '<div class="btn-group">'
            + "<button data-bs-toggle='modal' data-bs-target='#ModalEdit' class='btn btn-warning editar-asistencia' data-id='" + asistencia.id + "'> "
            + '<i class="bi bi-pencil-square"></i>'
            + "</button>"
            + "<button class='btn btn-danger eliminar-asistencia' data-id='" + asistencia.id + "'>"
            + '<i class="bi bi-trash"></i>'
            + "</button></li></div></td>");
          tbody.append(tr);
          contador++;
        });
        $('#tabla-asistencias').DataTable({
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
  