
<div class="modal fade" id="ModalNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="FormNuevamiembro" method="post">
          <div class="row">

            <div class="form-group col-6">
              <label for="nombre">Membresia:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevonombre" name="nuevonombre" placeholder="Estandar">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            
            <div class="form-group col-6">
              <label for="nombre">Descripcion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevodescripcion" name="nuevodescripcion" placeholder="Caracteristicas/Detalles">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Duracion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="nuevoduracion" name="nuevoduracion" placeholder="5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
       
            <div class="form-group col-6">
              <label for="nombre">Costo:</label>
              <div class="input-group mb-3">
                <input type="numeric" class="form-control" id="nuevocosto" name="nuevocosto" placeholder="19.99">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
        <button type="submit" id="nuevo-membresia" class="btn btn-primary nuevo-usuario">Guardar Usuario</button>
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

        <form id="FormEditarmiembro" method="post">
          <div class="row">
            
          <div class="form-group col-6">
              <label for="nombre">Membresia:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editarnombre" name="editarnombre" placeholder="Estandar">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
            
            <div class="form-group col-6">
              <label for="nombre">Descripcion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editardescripcion" name="editardescripcion" placeholder="Caracteristicas/Detalles">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>

            <div class="form-group col-6">
              <label for="nombre">Duracion:</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="editarduracion" name="editarduracion" placeholder="5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div>
       
            <div class="form-group col-6">
              <label for="nombre">Costo:</label>
              <div class="input-group mb-3">
                <input type="numeric" class="form-control" id="editarcosto" name="editarcosto" placeholder="19.99">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
              </div>
            </div> 

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" id="editar-membresia">Guardar cambios</button>
        
      </div>
    </div>
  </div>
</div>
