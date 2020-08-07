<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="POST">
				
				<?= $this->Form->create() ?>   
					<span class="login100-form-title p-b-33">
					<?= $this->Flash->render() ?>
					</span>
					<span class="login100-form-title p-b-33">
						Thành viên
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" name="submit">
							Đăng nhập
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Quên mật khẩu
						</span>

						<a href="#" class="txt2 hov1">
							Email / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Chưa có tài khoản?
						</span>

						<a href="<?= $this->Url->build(['controller'=>'Users','action'=>'register']); ?>" class="txt2 hov1">
							Sign Up
						</a>
					</div>
					<div class="text-center">
						<span class="txt1">
							<a href="<?= $this->Url->build(['controller'=>'Blogs','action'=>'index']); ?>" class="txt2 hov1">
								Home
							</a>
						</span>						
					</div>
					<?= $this->Form->end() ?>
				</form>
			</div>
		</div>
	</div>
