<div class="page-content <?= app_tampilan('warna_latar') ?>">

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0"><?= $title ?></h4>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-xl-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<section class="row">
						<div class="col-lg-6">
							<?= $this->session->flashdata('message'); ?>
							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kata Sandi"></div>
							<form action="<?= base_url('user/changePassword') ?>" method="post">
								<div class="mb-3">
									<label for="current_password">Current Password</label>
									<input type="password" class="form-control" id="current_password" name="current_password">
									<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="mb-3">
									<label for="new_password1">New Password</label>
									<input type="password" class="form-control" id="new_password1" name="new_password1">
									<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="mb-3">
									<label for="new_password2">Repeat Password</label>
									<input type="password" class="form-control" id="new_password2" name="new_password2">
									<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="mb-3">
									<button type="submit" class="btn  <?= app_web('warna_button') ?>">
										Change Password
									</button>
								</div>

							</form>
						</div>
					</section>
				</div>
			</div>
		</div> <!-- row -->

	</div>