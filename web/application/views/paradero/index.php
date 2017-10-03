<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Paradero Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('paradero/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Tipo Transporte Id</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Latitud</th>
						<th>Longitud</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($paradero as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['tipo_transporte_id']; ?></td>
						<td><?php echo $p['nombre']; ?></td>
						<td><?php echo $p['direccion']; ?></td>
						<td><?php echo $p['latitud']; ?></td>
						<td><?php echo $p['longitud']; ?></td>
						<td><?php echo $p['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('paradero/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('paradero/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
