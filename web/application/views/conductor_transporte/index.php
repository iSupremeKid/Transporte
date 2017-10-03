<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Conductor Transporte Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('conductor_transporte/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Transporte Unidad Id</th>
						<th>Usuario Id</th>
						<th>Paradero Id</th>
						<th>Tipo</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($conductor_transporte as $c){ ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['transporte_unidad_id']; ?></td>
						<td><?php echo $c['usuario_id']; ?></td>
						<td><?php echo $c['paradero_id']; ?></td>
						<td><?php echo $c['tipo']; ?></td>
						<td><?php echo $c['fecha']; ?></td>
						<td><?php echo $c['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('conductor_transporte/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('conductor_transporte/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
