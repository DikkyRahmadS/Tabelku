<div class="page-content <?= app_tampilan('warna_latar') ?>">

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0"><?= $title ?></h4>
		</div>
	</div>
	<?php if (validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif ?>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data User"></div>
	<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-12 col-xl-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0"></h6>
						<div class="dropdown mb-2">
							<button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Pelanggan</th>
									<th scope="col">Alamat</th>
									<th scope="col">No Telephone</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Tanggal Lahir</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($user_data as $key) : ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $key['name'] ?></td>
										<td><?= $key['address'] ?></td>
										<td><?= $key['phone_number'] ?></td>
										<td><?= $key['gender'] ?></td>
										<td><?= $key['birthday'] ?></td>
										<td>
											<a href="#" class="badge bg-success btn-update" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $key['uid'] ?>" data-username="<?= $key['username'] ?>" data-name="<?= $key['name'] ?>" data-email="<?= $key['email'] ?>" data-gender="<?= $key['gender'] ?>" data-birthday="<?= $key['birthday'] ?>" data-phone_number="<?= $key['phone_number'] ?>" data-address="<?= $key['address'] ?>" data-image="<?= $key['image'] ?>" data-role_id="<?= $key['role_id'] ?>">Ubah</a>
											<a href="<?= base_url("Tabelku/deletePelanggan/$key[uid]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="user">Hapus</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- row -->

</div>

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="addModalLabel">Tambah Data Pelanggan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('Tabelku/pelanggan') ?>" method="post">
				<input type="hidden" name="aksi" value="add">
				<div class="modal-body">
					<div class="mb-3">
						<label for="name" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="gender" class="form-label">Jenis Kelamin</label>
						<select class="form-select <?= (form_error('gender')) ? 'is-invalid' : '' ?>" name="gender" id="gender">
							<option value="" disabled selected>Pilih Gender</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="birthday" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control <?= (form_error('birthday')) ? 'is-invalid' : '' ?>" id="birthday" name="birthday" placeholder="Tanggal Lahir" value="<?= set_value('birthday') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('birthday', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="phone_number" class="form-label">Nomor Telepon</label>
						<input type="number" class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : '' ?>" id="phone_number" name="phone_number" placeholder="Nomor Telepon" value="<?= set_value('phone_number') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="address" class="form-label">Alamat</label>
						<textarea class="form-control <?= (form_error('address')) ? 'is-invalid' : '' ?>" id="address" name="address" rows="3" placeholder="Alamat"><?= set_value('address') ?></textarea>
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn <?= app_web('warna_button') ?>">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="editModalLabel">Edit Data Pelanggan</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('Tabelku/pelanggan') ?>" method="post">
				<input type="hidden" name="aksi" value="update">
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="mb-3">
						<label for="name" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
					</div>

					<div class="mb-3">
						<label for="gender" class="form-label">Jenis Kelamin</label>
						<select class="form-select <?= (form_error('gender')) ? 'is-invalid' : '' ?>" name="gender" id="gender">
							<option value="" disabled selected>Pilih Gender</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="birthday" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control <?= (form_error('birthday')) ? 'is-invalid' : '' ?>" id="birthday" name="birthday" placeholder="Tanggal Lahir" value="<?= set_value('birthday') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('birthday', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="phone_number" class="form-label">Nomor Telepon</label>
						<input type="number" class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : '' ?>" id="phone_number" name="phone_number" placeholder="Nomor Telepon" value="<?= set_value('phone_number') ?>">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="address" class="form-label">Alamat</label>
						<textarea class="form-control <?= (form_error('address')) ? 'is-invalid' : '' ?>" id="address" name="address" rows="3" placeholder="Alamat"><?= set_value('address') ?></textarea>
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn <?= app_web('warna_button') ?>">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
	$(document).on("click", ".btn-update", function() {
		var id = $(this).data('id');
		$(".modal-body  #id").val(id);
		var name = $(this).data('name');
		$(".modal-body  #name").val(name);
		var gender = $(this).data('gender');
		$(".modal-body  #gender").val(gender);
		var birthday = $(this).data('birthday');
		$(".modal-body  #birthday").val(birthday);
		var phone_number = $(this).data('phone_number');
		$(".modal-body  #phone_number").val(phone_number);
		var address = $(this).data('address');
		$(".modal-body  #address").val(address);
		// var image = $(this).data('image');
		// $(".modal-body  #image").val(image);
	});
</script>
