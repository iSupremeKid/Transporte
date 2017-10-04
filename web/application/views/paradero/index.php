<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de paradero</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('paradero/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Tipo de transporte</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Latitud</th>
						<th>Longitud</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($paradero as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['nombre_tipo_transporte']; ?></td>
						<td><?php echo $p['nombre']; ?></td>
						<td><?php echo $p['direccion']; ?></td>
						<td><?php echo $p['latitud']; ?></td>
						<td><?php echo $p['longitud']; ?></td>
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
                            <a href="<?php echo site_url('paradero/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('paradero/'.strtolower($txt_estado).'/'.$p['id']); ?>" class="btn btn-<?php echo $btn_estado; ?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado; ?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
