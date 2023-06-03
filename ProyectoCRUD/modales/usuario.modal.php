<?php
require('../config.php');
$conexion = new config();
$conexion->conectar();
$stmt = $conexion->getConnection()->query("SELECT * FROM tbl_roles");
$roles = $stmt->fetchAll(); 
?>


<div class="modal fade" id="ModalNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormNuevausuario" method="post">
          <div class="row">
            <div class="form-group col-6">
              <label for="nombre">Nombre de usuario:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevonombre" name="nuevonombre" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password">Contraseña:</label>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="button-addon2" name="nuevopassword" id="nuevopassword">
                <button class="btn btn-outline-secondary" onclick="togglePassword()" type="button" id="button-addon2"><i class="bi bi-eye-slash"></i></button>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="id_roles">Rol:</label>
              <div class="input-group mb-3">
                <select class="form-control" id="nuevoid_roles" name="nuevoid_roles">
                  <option selected value="id_roles">Seleccionar Rol</option>
                  <?php
                  foreach ($roles as $key) :
                  ?>
                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
              </div>
            </div>

            <div class="form-group">
              <label for="id_roles">Estado del usuario:</label>
              <div class="input-group mb-3">
              <select class="form-control" id="nuevoid_status" name="nuevoid_status">               
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-toggles"></i></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="submit" id="nuevo-usuario" class="btn btn-primary nuevo-usuario">Guardar Usuario</button>
      </div>
    </div>
  </div>
</div>

                    


<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormEditarusuario" method="post">
          <div class="row">
            
            <div class="form-group col-6">
              <label for="nombre">Nombre de usuario:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editarnombre" name="editarnombre" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password">Contraseña:</label>

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" aria-describedby="button-addon2" name="editarpassword" id="editarpassword">
                <button class="btn btn-outline-secondary" onclick="togglePassword()" type="button" id="button-addon2"><i class="bi bi-eye-slash"></i></button>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="id_roles">Rol:</label>
              <div class="input-group mb-3">
                <select class="form-control" id="editarid_roles" name="editarid_roles">
                  <option selected value="id_roles">Seleccionar Rol</option>
                  <?php
                  foreach ($roles as $key) :
                  ?>
                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="id_roles">Estado del usuario:</label>
              <div class="input-group mb-3">
              <select class="form-control" id="editarid_status" name="editarid_status">               
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-toggles"></i></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" id="editar-usuario">Guardar cambios</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  function togglePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>