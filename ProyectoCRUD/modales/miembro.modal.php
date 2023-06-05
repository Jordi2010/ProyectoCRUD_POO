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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Miembros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormNuevamiembro" method="post">
          <div class="row">

            <div class="form-group col-6">
              <label for="nombre">Nombre:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevonombre" name="nuevonombre" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Direccion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevodireccion" name="nuevodireccion" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-compass"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Telefono:</label>
              <div class="input-group mb-3">
                <input type="numeric" class="form-control" id="nuevotelefono" name="nuevotelefono" placeholder="77778888">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Correo:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevocorreo" name="nuevocorreo" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
              </div>
            </div>
            
            <div class="form-group col-6">
              <label for="nombre">Fecha de Registro:</label>
              <div class="input-group mb-3">
              <input type="date" class="form-control" name="nuevofecha" id="nuevofecha" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="submit" id="nuevo-miembro" class="btn btn-primary nuevo-miembro">Guardar Miembro</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Miembro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormEditarmiembro" method="post">
          <div class="row">
            
         <div class="form-group col-6">
              <label for="nombre">Nombre:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editarnombre" name="editarnombre" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Direccion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editardireccion" name="editardireccion" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-compass"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Telefono:</label>
              <div class="input-group mb-3">
                <input type="numeric" class="form-control" id="editartelefono" name="editartelefono" placeholder="77778888">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Correo:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editarcorreo" name="editarcorreo" placeholder="Tomoya116">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
              </div>
            </div>
            
            <div class="form-group col-6">
              <label for="nombre">Fecha de Registro:</label>
              <div class="input-group mb-3">
              <input type="date" class="form-control" name="editarfecha" id="editarfecha" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
              </div>
            </div>

        

     
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" id="editar-miembro">Guardar cambios</button>
        
      </div>
    </div>
  </div>
</div>
