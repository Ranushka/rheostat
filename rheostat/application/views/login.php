		<?php $this->load->view('template/header'); ?>
	<div class="container">
		<?php $this->load->view('template/logo'); ?>
	
		<nav class="navigateContainer">
			<?php if(!$this->session->userdata('loginStatus')){ echo '<a class="navigate tabTopActive" href="'.base_url().'"><span>Login</span></a>';} ?>
			<a class="navigate" href="<?php echo base_url();?>index.php/categories"><span>Search</span></a>
			<a class="navigate" href="<?php echo base_url();?>index.php/help"><span>Help</span></a>
		</nav>

<style type="text/css">
	
	#forgotPassword,#loginForm{
		min-height: 400px;
	}
</style>
	<div class="row-fluid" id="loginForm">
		<div class="span6">
			<div style="text-align: right;">
				<h2>Login</h2>
				<p>Please use your login credentials <br>to see your profile</p>
				<a href="#" id="forgotPasswordLink">Forgot password</a>
			</div>

		</div>

		<div class="span6">

			<style type="text/css" media="screen">
			label.error { float: none; color: #CC1C1C; padding-left: .5em; vertical-align: top; }
			</style>

			<?php 
			echo form_open('index.php/userAuthentication/userLogin',
				$attributes = array('class' => 'form-horizontal', 'id' => 'OL_login'));
				?>
				<fieldset>
					<!-- validate errors vill display on this div -->
					<div class="error_box">
						<?php 
						if (isset($errorMsgLogin)){
							

							echo '<div class="alert alert-danger" style="width:238px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;" id="userNamePasswordMissMatch"> 
									<span>'.$errorMsgLogin.'</span>
								</div>';
						}
						?>
					</div>
					<div>
						<?php 
						$OL_userName = array(
							'type'        => 'text',
							'name'        => 'OL_userName',
							'id'          => 'OL_userName',
							'maxlength'   => '100',
							'autofocus'   => 'autofocus',
							'placeholder' => 'User Name',
							'class' 	  => 'required',
							'style'		  => 'margin-bottom:10px;'
							);
						echo form_input($OL_userName);
						?>
					</div>
					<div>
						<?php 
						$OL_userPassword = array(
							'type'        => 'password',
							'name'        => 'OL_userPassword',
							'id'          => 'OL_userPassword',
							'maxlength'   => '100',
							'class' 	  => 'required',
							'placeholder' => 'Password',
							'style'		  => 'margin-bottom:10px;'
							);
						echo form_input($OL_userPassword);
						?>
						<label class="checkbox">
							<?php 
							$OL_remamberUser_password = array(
								'name'        => 'OL_remamberUser_password',
								'id'          => 'OL_remamberUser_password',
								'value'       => 'accept',
								'checked'     => TRUE,
								);

							echo form_checkbox($OL_remamberUser_password);
							?> 
							Remember
							
						</label>
						<button type="submit" class="btn btn-info">Login</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>




	<!-- S Foget pasword -->
	<div class="row-fluid hide" id="forgotPassword">
		<div class="span6">
			<div style="text-align: right;">
				<h2>Forgot password</h2>
				<p>Please enter your email address<br>to reset your password</p>
				<a href="#" id="loginLink">Already has an account</a>
			</div>
			

		</div>
		<div class="span6" id="forgotPasswordContainer">

			<style type="text/css" media="screen">
			label.error { float: none; color: #CC1C1C; padding-left: .5em; vertical-align: top; }
			</style>

			<?php 
			echo form_open('#',
				$attributes = array('class' => 'form-horizontal', 'id' => 'forgotPasswordForm'));
				?>
				

				<div class="alert alert-success hide" id="forgotPasswordMsg">
					<span></span>
				</div>
				

				<fieldset>
					<!-- validate errors vill display on this div -->
					<div class="error_box">
						<?php 
						if (isset($errorMsg)){echo $errorMsg;}
						?>
					</div>
					<div>
						<?php 
						$forgotPasswordBox = array(
							'type'        => 'email',
							'name'        => 'forgotPasswordBox',
							'id'          => 'forgotPasswordBox',
							'maxlength'   => '100',
							'autofocus'   => 'autofocus',
							'placeholder' => 'ex: openlib@openlib.com',
							'class' 	  => 'required',
							'style'		  => 'margin-bottom:10px;margin-top: 40px;'
							);
						echo form_input($forgotPasswordBox);
						?>
					</div>

					<button type="submit" id="forgotPasswordButton" class="btn btn-info">Forgot Password</button><br>
					
				</fieldset>
			</form>
		</div>
		<!-- E Foget pasword -->



		<hr>


	</div> <!-- /container -->


