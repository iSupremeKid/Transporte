<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de conductor transporte</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('conductor_transporte/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Unidad de transporte</th>
						<th>Usuario</th>
						<th>Paradero</th>
						<th>Tipo</th>
						<th>Fecha</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($conductor_transporte as $c){ ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['identificacion']; ?></td>
						<td><?php echo $c['usuario']; ?></td>
						<td><?php echo $c['paradero_nombre']; ?></td>
            <?php
            $tipo_txt = "Entrada";
            if ($c['tipo'] == 2) {
              $tipo_txt = "Salida";
            }
            ?>
						<td><?php echo $tipo_txt; ?></td>
						<td><?php echo $c['fecha']; ?></td>
						<td>
              <?php
              $estado = $c['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
                            <a href="<?php echo site_url('conductor_transporte/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('conductor_transporte/'.strtolower($txt_estado).'/'.$c['id']); ?>" class="btn btn-<?php echo $btn_estado; ?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
