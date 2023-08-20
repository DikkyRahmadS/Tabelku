<div class="col-md-6 col-xl-6 mx-auto" id="auth-happy">
</div>
<div class="col-md-6 col-xl-6 mx-auto">
    <div class="card" style="background-color: #61A6F0; border-color: #61A6F0;">
        <div class="row">
            <div class="col-md-12 ps-md-0">
                <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2"><img src="<?= base_url('assets/img/' . app_web('logo')) ?>" alt=""></a>
                    <h5 class="text-light fw-normal mb-4">Buat Akun Gratis!!</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('auth/registration') ?>" class="forms-sample">
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
                        <div>
                            <button type="submit" class="btn <?= app_web('warna_button') ?> text-white me-2 mb-2 mb-md-0">Daftar</button>
                        </div>
                        <a href="<?= base_url('auth') ?>" class="d-block mt-3 text-light">Sudah Punya akun? Masuk!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>