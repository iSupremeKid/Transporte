<div class="row">
    <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title">Reporte de viajes</h3>
          </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
            <th>Nombres</th>
            <th>Identificacion</th>
						<th>Persona Perfil</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($personas as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
            <td><?php echo $p['nombres']." ".$p['apellido_paterno']." ".$p['apellido_materno'] ?></td>
            <td><?php echo $p['identificacion']; ?></td>
						<td><?php echo $p['perfil_nombre']; ?></td>
						<td>hola</td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
