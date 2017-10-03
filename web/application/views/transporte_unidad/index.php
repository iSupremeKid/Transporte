<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Transporte Unidad Listing</h3>
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
						<th>Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($transporte_unidad as $t){ ?>
                    <tr>
						<td><?php echo $t['id']; ?></td>
						<td><?php echo $t['tipo_transporte_id']; ?></td>
						<td><?php echo $t['identificacion']; ?></td>
						<td><?php echo $t['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('transporte_unidad/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('transporte_unidad/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
