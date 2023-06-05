<?php
require('../config.php');
$conexion = new config();
$conexion->conectar();
$stmt = $conexion->getConnection()->query("SELECT * FROM tbl_miembros");
$miembros = $stmt->fetchAll(); 
?>

<div class="modal fade" id="ModalNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormNuevasistencia" method="post">
          <div class="row">

          <div class="form-group col-6">
              <label for="nombre">checkIn:</label>
              <div class="input-group mb-3">
              <input type="datetime-local" class="form-control" name="nuevocheckin" id="nuevocheckin" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            
            <div class="form-group col-6">
              <label for="nombre">CheckOut:</label>
              <div class="input-group mb-3">
              <input type="datetime-local" class="form-control" name="nuevocheckout" id="nuevocheckout" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Miembro:</label>
              <div class="input-group mb-3">
              <select class="form-control" id="nuevoid_roles" name="nuevoid_roles">
                  <option selected value="id_roles">Seleccionar Rol</option>
                  <?php
                  foreach ($miembros as $key) :
                  ?>
                    <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="submit" id="nuevo-membresia" class="btn btn-primary nuevo-usuario">Guardar Asistencia</button>
      </div>
    </div>
  </div>
</div>

                    


