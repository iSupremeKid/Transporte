<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de alerta</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('alertum/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Usuario</th>
						<th>Tipo Alerta</th>
						<th>Mensaje</th>
						<th>Fecha</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($alerta as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['usuario']; ?></td>
						<td><?php echo $a['nombre_tipo_alerta']; ?></td>
						<td><?php echo $a['mensaje']; ?></td>
						<td><?php echo $a['fecha']; ?></td>
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
                            <a href="<?php echo site_url('alertum/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('alertum/'.strtolower($txt_estado).'/'.$a['id']); ?>" class="btn btn-<?php echo $btn_estado;?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
