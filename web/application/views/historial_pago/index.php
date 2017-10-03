<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Historial Pago Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('historial_pago/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Persona Id</th>
						<th>Origen</th>
						<th>Monto</th>
						<th>Fecha</th>
						<th>Tarjeta</th>
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($historial_pago as $h){ ?>
                    <tr>
						<td><?php echo $h['id']; ?></td>
						<td><?php echo $h['persona_id']; ?></td>
						<td><?php echo $h['origen']; ?></td>
						<td><?php echo $h['monto']; ?></td>
						<td><?php echo $h['fecha']; ?></td>
						<td><?php echo $h['tarjeta']; ?></td>
						<td><?php echo $h['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('historial_pago/edit/'.$h['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('historial_pago/remove/'.$h['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
