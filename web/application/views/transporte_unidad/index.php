<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de unidad de transporte</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('transporte_unidad/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Tipo Transporte Id</th>
						<th>Identificacion</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($transporte_unidad as $t){ ?>
                    <tr>
						<td><?php echo $t['id']; ?></td>
						<td><?php echo $t['nom_tipo_transporte']; ?></td>
						<td><?php echo $t['identificacion']; ?></td>
						<td>
              <?php
              $estado = $t['estado'];
              $btn_estado = 'success';
              $txt_estado = 'Habilitar';
              if ($estado) {
                $btn_estado = 'danger';
                $txt_estado = "Deshabilitar";
              }
              ?>
                            <a href="<?php echo site_url('transporte_unidad/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                            <a href="<?php echo site_url('transporte_unidad/'.strtolower($txt_estado).'/'.$t['id']); ?>" class="btn btn-<?php echo $btn_estado;?> btn-xs"><span class="fa fa-trash"></span> <?php echo $txt_estado;?></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
