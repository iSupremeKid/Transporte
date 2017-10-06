<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de usuario</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona</th>
						<th>Tipo de usuario</th>
						<th>Usuario</th>
						<th>Email</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($usuario as $u){ ?>
                    <tr>
						<td><?php echo $u['id']; ?></td>
						<td><?php echo $u['nombres']." ".$u['apellido_paterno']." ".$u['apellido_materno']; ?></td>
						<td><?php echo $u['nombre_tipo_usuario']; ?></td>
						<td><?php echo $u['usuario']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td>
              <?php
              $estado = $u['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
                            <a href="<?php echo site_url('usuario/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('usuario/'.strtolower($txt_estado).'/'.$u['id']); ?>" class="btn btn-<?php echo $btn_estado;?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado;?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
