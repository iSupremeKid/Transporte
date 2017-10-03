<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Persona Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('persona/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Telefono</th>
						<th>Persona Perfil Id</th>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Identificacion</th>
						<th>Saldo Disponible</th>
						<th>Token Culqi</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($persona as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['telefono']; ?></td>
						<td><?php echo $p['persona_perfil_id']; ?></td>
						<td><?php echo $p['nombres']; ?></td>
						<td><?php echo $p['apellido_paterno']; ?></td>
						<td><?php echo $p['apellido_materno']; ?></td>
						<td><?php echo $p['identificacion']; ?></td>
						<td><?php echo $p['saldo_disponible']; ?></td>
						<td><?php echo $p['token_culqi']; ?></td>
						<td><?php echo $p['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('persona/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('persona/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
