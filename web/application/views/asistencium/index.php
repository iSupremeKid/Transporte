<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de asistencia</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asistencium/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Usuario</th>
						<th>Hora</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($asistencia as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['nombre_usuario']; ?></td>
						<td><?php echo $a['hora']; ?></td>
						<td>
              <?php
              $estado = $a['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
                            <a href="<?php echo site_url('asistencium/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('asistencium/'.strtolower($txt_estado).'/'.$a['id']); ?>" class="btn btn-<?php echo $btn_estado ?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
