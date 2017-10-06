<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Historial Pago Edit</h3>
            </div>
			<?php echo form_open('historial_pago/edit/'.$historial_pago['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="persona_id" class="control-label"><span class="text-danger">*</span>Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">select persona</option>
								<?php 
								foreach($all_persona as $persona)
								{
									$selected = ($persona['id'] == $historial_pago['persona_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$persona['id'].'" '.$selected.'>'.$persona['nombres'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('persona_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="origen" class="control-label"><span class="text-danger">*</span>Origen</label>
						<div class="form-group">
							<select name="origen" class="form-control">
								<option value="">select</option>
								<?php 
								$origen_values = array(
									'1'=>'Web',
									'2'=>'Conductor',
								);

								foreach($origen_values as $value => $display_text)
								{
									$selected = ($value == $historial_pago['origen']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('origen');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto" class="control-label"><span class="text-danger">*</span>Monto</label>
						<div class="form-group">
							<input type="text" name="monto" value="<?php echo ($this->input->post('monto') ? $this->input->post('monto') : $historial_pago['monto']); ?>" class="form-control" id="monto" />
							<span class="text-danger"><?php echo form_error('monto');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label"><span class="text-danger">*</span>Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo ($this->input->post('fecha') ? $this->input->post('fecha') : $historial_pago['fecha']); ?>" class="has-datetimepicker form-control" id="fecha" />
							<span class="text-danger"><?php echo form_error('fecha');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tarjeta" class="control-label"><span class="text-danger">*</span>Tarjeta</label>
						<div class="form-group">
							<input type="text" name="tarjeta" value="<?php echo ($this->input->post('tarjeta') ? $this->input->post('tarjeta') : $historial_pago['tarjeta']); ?>" class="form-control" id="tarjeta" />
							<span class="text-danger"><?php echo form_error('tarjeta');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo ($this->input->post('estado') ? $this->input->post('estado') : $historial_pago['estado']); ?>" class="form-control" id="estado" />
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