<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Transporte Unidad Add</h3>
            </div>
            <?php echo form_open('transporte_unidad/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo_transporte_id" class="control-label"><span class="text-danger">*</span>Tipo Transporte</label>
						<div class="form-group">
							<select name="tipo_transporte_id" class="form-control">
								<option value="">select tipo_transporte</option>
								<?php 
								foreach($all_tipo_transporte as $tipo_transporte)
								{
									$selected = ($tipo_transporte['id'] == $this->input->post('tipo_transporte_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_transporte['id'].'" '.$selected.'>'.$tipo_transporte['nombre'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tipo_transporte_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="identificacion" class="control-label"><span class="text-danger">*</span>Identificacion</label>
						<div class="form-group">
							<input type="text" name="identificacion" value="<?php echo $this->input->post('identificacion'); ?>" class="form-control" id="identificacion" />
							<span class="text-danger"><?php echo form_error('identificacion');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo $this->input->post('estado'); ?>" class="form-control" id="estado" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>