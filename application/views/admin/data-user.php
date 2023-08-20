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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($user_data as $key) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $key['name'] ?></td>
                                        <td><?= $key['email'] ?></td>
                                        <td><?= $key['role'] ?></td>
                                        <td>
                                            <?php
                                            if ($key['is_active'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Deactive";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $key['date_created'] ?></td>
                                        <td><img src="<?= base_url("assets/img/$key[image]") ?>" class="img-thumbnail"></td>
                                        <td>
                                            <a href="" class="badge bg-warning setRoleButton" data-bs-toggle="modal" data-bs-target="#setRoleModal" data-id="<?= $key['uid'] ?>">Set Role</a>

                                            <a href="#" class="badge bg-success btn-update" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $key['uid'] ?>" data-username="<?= $key['username'] ?>" data-name="<?= $key['name'] ?>" data-email="<?= $key['email'] ?>" data-gender="<?= $key['gender'] ?>" data-birthday="<?= $key['birthday'] ?>" data-phone_number="<?= $key['phone_number'] ?>" data-address="<?= $key['address'] ?>" data-image="<?= $key['image'] ?>" data-role_id="<?= $key['role_id'] ?>">Ubah</a>
                                            <a href="<?= base_url("Admin/deleteUser/$key[uid]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="user">Hapus</a>
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
            <form action="<?= base_url('admin/setRole/') ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select class="form-select" name="role_id" id="role_id">
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endforeach ?>
                        </select>
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

<!-- Modal Add-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Admin/dataUser') ?>" method="post">
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
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
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select class="form-select" name="role_id" id="role_id">
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password1" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control <?= (form_error('password1')) ? 'is-invalid' : '' ?>" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="bi bi-shield-lockdanger pl-3">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password2" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control <?= (form_error('password2')) ? 'is-invalid' : '' ?>" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
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
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Data user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Admin/dataUser') ?>" method="post">
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
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
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select class="form-select" name="role_id" id="role_id">
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password1" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control <?= (form_error('password1')) ? 'is-invalid' : '' ?>" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="bi bi-shield-lockdanger pl-3">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password2" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control <?= (form_error('password2')) ? 'is-invalid' : '' ?>" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
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
        var username = $(this).data('username');
        $(".modal-body  #username").val(username);
        var name = $(this).data('name');
        $(".modal-body  #name").val(name);
        var email = $(this).data('email');
        $(".modal-body  #email").val(email);
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
        var role_id = $(this).data('role_id');
        $(".modal-body  #role_id").val(role_id);
    });
</script>