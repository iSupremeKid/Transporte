<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuario Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona Id</th>
						<th>Tipo Usuario Id</th>
						<th>Password</th>
						<th>Usuario</th>
						<th>Email</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($usuario as $u){ ?>
                    <tr>
						<td><?php echo $u['id']; ?></td>
						<td><?php echo $u['persona_id']; ?></td>
						<td><?php echo $u['tipo_usuario_id']; ?></td>
						<td><?php echo $u['password']; ?></td>
						<td><?php echo $u['usuario']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('usuario/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('usuario/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
