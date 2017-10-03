<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Persona Viaje Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('persona_viaje/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona Id</th>
						<th>Paradero Id</th>
						<th>Transporte Unidad Id</th>
						<th>Persona Perfil Id</th>
						<th>Precio</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($persona_viaje as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['persona_id']; ?></td>
						<td><?php echo $p['paradero_id']; ?></td>
						<td><?php echo $p['transporte_unidad_id']; ?></td>
						<td><?php echo $p['persona_perfil_id']; ?></td>
						<td><?php echo $p['precio']; ?></td>
						<td><?php echo $p['fecha']; ?></td>
						<td><?php echo $p['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('persona_viaje/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('persona_viaje/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
