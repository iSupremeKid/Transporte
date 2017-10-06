<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reporte de asistencia</h3>
            </div>
            <div class="box-body">
          		<div class="clearfix">
                <h5>Listado de conductores</h5>
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona</th>
						<th>Accion</th>
                    </tr>
                    <?php foreach($conductores as $u){ ?>
                    <tr>
						<td><?php echo $u['id']; ?></td>
						<td><?php echo $u['nombres']." ".$u['apellido_paterno']." ".$u['apellido_materno']; ?></td>
						<td>
                            <a href="<?php echo site_url('reporte/asistencia/'.$u['id']); ?>" class="btn btn-success btn-xs"><span class="fa fa-dashboard"></span> Generar reporte</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
              </div>
            </div>
            <!-- <div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Boton
            	</button>
          	</div> -->
        </div>
    </div>
</div>
