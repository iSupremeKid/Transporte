<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Alerta Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('alertum/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Usuario Id</th>
						<th>Tipo Alerta Id</th>
						<th>Mensaje</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($alerta as $a){ ?>
                    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['usuario_id']; ?></td>
						<td><?php echo $a['tipo_alerta_id']; ?></td>
						<td><?php echo $a['mensaje']; ?></td>
						<td><?php echo $a['fecha']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('alertum/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('alertum/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
