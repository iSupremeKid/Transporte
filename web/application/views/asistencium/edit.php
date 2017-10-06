<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar asistencia</h3>
            </div>
			<?php echo form_open('asistencium/edit/'.$asistencium['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_id" class="control-label"><span class="text-danger">*</span>Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">Seleccione usuario</option>
								<?php
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['id'] == $asistencium['usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['id'].'" '.$selected.'>'.$usuario['usuario'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('usuario_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora" class="control-label"><span class="text-danger">*</span>Hora</label>
						<div class="form-group">
							<input type="text" data-date-format="YYYY-MM-DD hh:mm:ss" name="hora" value="<?php echo ($this->input->post('hora') ? $this->input->post('hora') : $asistencium['hora']); ?>" class="has-datetimepicker form-control" id="hora" />
							<span class="text-danger"><?php echo form_error('hora');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Editar
				</button>
	        </div>
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
