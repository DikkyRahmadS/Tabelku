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
						<h6 class="card-title mb-0"><?= $title ?></h6>
						<div class="dropdown mb-2">
							<button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
								<a class="dropdown-item d-flex align-items-center" href="javascript:;" data-bs-toggle="modal" data-bs-target="#setRoleModal"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
							</div>
						</div>
					</div>
					<?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Role"></div>
					<?= $this->session->flashdata('message'); ?>
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($role as $r) : ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $r['role'] ?></td>
										<td>
											<a href="<?= base_url("admin/roleAccess/$r[id]"); ?>" class="badge bg-warning">Akses</a>
											<a href="<?= base_url("admin/updateRole/$r[id]"); ?>" class="badge bg-success updateRoleModalButton" data-bs-toggle="modal" data-bs-target="#setRoleModal" data-id="<?= $r['id'] ?>">Ubah</a>
											<a href="<?= base_url("admin/deleteRole/$r[id]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="role">Delete</a>
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

<!-- Modal -->
<div class="modal fade" id="setRoleModal" tabindex="-1" aria-labelledby="setRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="setRoleModalLabel">Set Role pengguna</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('admin/role') ?>" method="post">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<label for="role">Role</label>
						<input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn <?= app_web('warna_button') ?>">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>