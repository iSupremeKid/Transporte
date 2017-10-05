<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reporte de asistencia<br>Conductor : <b><u><?php echo "{$persona['nombres']} {$persona['apellido_paterno']} {$persona['apellido_materno']}"; ?></u><b></h3>
            </div>
            <div class="box-body">
          		<div class="clearfix">
                <table class="table table-striped">
                    <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
                    </tr>
                    <?php foreach($asistencias as $a){ ?>
                    <tr>
            <td><?php echo $a['id']; ?></td>
            <td><?php echo substr($a['hora'],0,10); ?></td>
            <td><?php echo substr($a['hora'],11,8); ?></td>
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
