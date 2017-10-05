<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de persona viaje</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('persona_viaje/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona</th>
						<th>Paradero</th>
						<th>Transporte Unidad</th>
						<th>Persona Perfil</th>
						<th>Precio</th>
						<th>Fecha</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($persona_viaje as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo "{$p['persona_nombre']} {$p['persona_ap']} {$p['persona_am']}"; ?></td>
						<td><?php echo $p['paradero_nombre']; ?></td>
						<td><?php echo $p['identificacion']; ?></td>
						<td><?php echo $p['persona_perfil']; ?></td>
						<td><?php echo $p['precio']; ?></td>
						<td><?php echo $p['fecha']; ?></td>
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
                            <a href="<?php echo site_url('persona_viaje/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('persona_viaje/'.strtolower($txt_estado).'/'.$p['id']); ?>" class="btn btn-<?php echo $btn_estado;?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
