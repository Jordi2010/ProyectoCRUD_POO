
$(document).ready(function () {
    cargarDatos();
});
//cargamos los datos, comprobando que la ruta actual sea usuarios

  
  
  //traemos los campos que necesitemos mostrar en el formulario de editar
  $(document).on('click', '.editar-usuario', function() {
    $("#FormEditarusuario")[0].reset();
    var idUsuario = $(this).data("id");
    
    $.ajax({
      url: "../ajax/usuarios.ajax.php?metodo=obtener&id=" + idUsuario,
      method: "GET",
      dataType: "json",
      success: function(respuesta) {
        $("#editarnombre").val(respuesta.usuario);
        $("#editarid_roles").val(respuesta.id_roles);
        $("#editarid_status").val(respuesta.id_status);
        $("#FormEditarusuario").attr("data-id", idUsuario);
      },
      error: function() {
        mostrarError();
      },
    });
  });
  
  //obtenemos el id del registro a eliminar y si el administrador desea eliminar dicho registro
  $(document).on('click', '.eliminar-usuario', function() {
    var idUsuario = $(this).data("id");
    Swal.fire({
      title: '¿Está seguro de eliminar este usuario?',
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
          url: "../ajax/usuarios.ajax.php?metodo=eliminar&id=" + idUsuario,
          method: "GET",
          success: function(respuesta) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            var tablaUsuarios = $('#tabla-usuarios');
            tablaUsuarios.DataTable().destroy();
            cargarDatos();
          },
          error: function() {
            mostrarError();
          },
        });
        
      }
    })

  });

  $("#nuevo-usuario").click(function(event) {
    event.preventDefault();
    var datos = $("#FormNuevausuario").serialize();
    datos += "&metodo=nuevo";
    $.ajax({
      url: "../ajax/usuarios.ajax.php",
      type: "POST",
      data: datos,
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaUsuarios = $('#tabla-usuarios');
          tablaUsuarios.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El usuario ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevausuario")[0].reset();
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
  
  $("#editar-usuario").click(function(event) {
    event.preventDefault();
    var idUsuario = $("#FormEditarusuario").attr("data-id");
    var datos = $("#FormEditarusuario").serialize();
    datos += "&id=" +idUsuario + "&metodo=editar"
    $.ajax({
      url: "../ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      dataType: "json",
      success: function(respuesta) {
        if (respuesta.includes("ok")) {
          var tablaUsuarios = $('#tabla-usuarios');
          tablaUsuarios.DataTable().destroy();
          Swal.fire({
            icon: 'success',
            title: 'El usuario ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevausuario")[0].reset();
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
      url: "../ajax/usuarios.ajax.php?metodo=mostrar",
      type: "GET",
      dataType: "json",
      data: {},
      success: function(respuesta) {
        var tbody = $('#tabla-usuarios').find('tbody');
        var contador = 1;
        tbody.empty();
        $.each(respuesta, function(index, usuario) {
          var tr = $("<tr>");
          tr.append("<td>" + contador + "</td>");
          tr.append("<td>" + usuario.usuario + "</td>");
          tr.append("<td>" + usuario.id_roles + "</td>");
          tr.append("<td>" + usuario.status + "</td>");
          tr.append("<td>"
            + '<div class="btn-group">'
            + "<button data-bs-toggle='modal' data-bs-target='#ModalEdit' class='btn btn-warning editar-usuario' data-id='" + usuario.id + "'> "
            + '<i class="bi bi-pencil-square"></i>'
            + "</button>"
            + "<button class='btn btn-danger eliminar-usuario' data-id='" + usuario.id + "'>"
            + '<i class="bi bi-trash"></i>'
            + "</button></li></div></td>");
          tbody.append(tr);
          contador++;
        });
        $('#tabla-usuarios').DataTable({
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
  