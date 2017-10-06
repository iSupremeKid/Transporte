<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de tipo de transporte</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_transporte/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($tipo_transporte as $t){ ?>
                    <tr>
						<td><?php echo $t['id']; ?></td>
						<td><?php echo $t['nombre']; ?></td>
						<td>
              <a href="<?php echo site_url('tipo_transporte/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
              <?php
              $estado = $t['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
              <a href="<?php echo site_url('tipo_transporte/'.strtolower($txt_estado).'/'.$t['id']); ?>" class="btn btn-<?php echo $btn_estado;?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado;?></a>
            </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
