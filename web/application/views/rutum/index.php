<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ruta Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rutum/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Tipo Transporte Id</th>
						<th>Nombre</th>
						<th>Estado</th>
						<th>Ruta</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($ruta as $r){ ?>
                    <tr>
						<td><?php echo $r['id']; ?></td>
						<td><?php echo $r['tipo_transporte_id']; ?></td>
						<td><?php echo $r['nombre']; ?></td>
						<td><?php echo $r['estado']; ?></td>
						<td><?php echo $r['ruta']; ?></td>
						<td>
                            <a href="<?php echo site_url('rutum/edit/'.$r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('rutum/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
