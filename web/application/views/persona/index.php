<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de persona</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('persona/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
            <th>Nombres</th>
            <th>Identificacion</th>
						<th>Telefono</th>
						<th>Persona Perfil</th>
						<th>Saldo Disponible</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($persona as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
            <td><?php echo $p['nombres']." ".$p['apellido_paterno']." ".$p['apellido_materno'] ?></td>
            <td><?php echo $p['identificacion']; ?></td>
						<td><?php echo $p['telefono']; ?></td>
						<td><?php echo $p['perfil_nombre']; ?></td>
						<td><?php echo $p['saldo_disponible']; ?></td>
						<td>
              <?php
              $estado = $p['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
                            <a href="<?php echo site_url('persona/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('persona/'.strtolower($txt_estado).'/'.$p['id']); ?>" class="btn btn-<?php echo $btn_estado?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
