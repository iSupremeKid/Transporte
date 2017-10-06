<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar usuario</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="persona_id" class="control-label"><span class="text-danger">*</span>Persona</label>
						<div class="form-group">
							<select name="persona_id" class="form-control">
								<option value="">Seleccione persona</option>
								<?php
								foreach($all_persona as $persona)
								{
									$selected = ($persona['id'] == $usuario['persona_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$persona['id'].'" '.$selected.'>'.$persona['nombres'].' '.$persona['apellido_paterno'].' '.$persona['apellido_materno'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('persona_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_usuario_id" class="control-label"><span class="text-danger">*</span>Tipo Usuario</label>
						<div class="form-group">
							<select name="tipo_usuario_id" class="form-control">
								<option value="">Seleccione tipo de usuario</option>
								<?php
								foreach($all_tipo_usuario as $tipo_usuario)
								{
									$selected = ($tipo_usuario['id'] == $usuario['tipo_usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_usuario['id'].'" '.$selected.'>'.$tipo_usuario['nombre'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tipo_usuario_id');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="usuario" class="control-label"><span class="text-danger">*</span>Usuario</label>
						<div class="form-group">
							<input type="text" name="usuario" value="<?php echo ($this->input->post('usuario') ? $this->input->post('usuario') : $usuario['usuario']); ?>" class="form-control" id="usuario" />
							<span class="text-danger"><?php echo form_error('usuario');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $usuario['password']); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
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
