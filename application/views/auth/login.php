<div class="col-md-8 col-xl-4 mx-auto">
	<div class="card" style="background-color: #61A6F0; border-color: #61A6F0;">
		<div class="row">
			<div class="col-md-12 ps-md-0">
				<div class="auth-form-wrapper px-4 py-5">
					<a href="#" class="noble-ui-logo d-block mb-2"><img src="<?= base_url('assets/img/'. app_web('logo')) ?>" alt=""></a>
					<h5 class="text-light fw-normal mb-4">Selamat datang! Silahkan Login.</h5>
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= base_url('auth/') ?>" method="post" class="forms-sample">
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control <?= (form_error('username')) ? "is-invalid" : '' ?>" name="username" id="username" placeholder="Username" autocomplete="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
							<?= form_error('username', '<div class="invalid-feedback">', '</div>') ?>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control <?= (form_error('password')) ? "is-invalid" : '' ?>" name="password" id="password" placeholder="Password" autocomplete="current-password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
							<?= form_error('password', '<div class="invalid-feedback">', '</div>') ?>
						</div>
						<!-- <div class="form-check mb-3">
							<input type="checkbox" class="form-check-input" id="authCheck">
							<label class="form-check-label" for="authCheck">
								Remember me
							</label>
						</div> -->
						<div>
							<button type="submit" class="btn <?= app_web('warna_button') ?> me-2 mb-2 mb-md-0 text-white">Login</button>
						</div>
						<!-- <a href="<?= base_url('/auth/registration') ?>" class="d-block mt-3 text-light">Belum Punya akun? Ayo Daftar</a> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>