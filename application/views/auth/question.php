<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo/logo.png') ?>" alt="Logo"></a>
                <!-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a> -->
            </div>
            <h1 class="auth-title">Forgot Password</h1>
            <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url('auth/question/' . $pertanyaan_keamanan['pid']) ?>">
                <div class="form-group position-relative has-icon-left mb-4">
                    <label><?= $pertanyaan_keamanan['p1'] ?></label>
                    <input type="text" class="form-control form-control-xl" id="jawaban_1" placeholder="" name="jawaban_1" value="<?= set_value('jawaban_1') ?>">
                    <?= form_error('jawaban_1', '<small class="text-danger pl-3">', '</small>') ?>

                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <label><?= $pertanyaan_keamanan['p2'] ?></label>
                    <input type="text" class="form-control form-control-xl" id="jawaban_2" placeholder="" name="jawaban_2" value="<?= set_value('jawaban_2') ?>">
                    <?= form_error('jawaban_2', '<small class="text-danger pl-3">', '</small>') ?>

                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <button type="submit" class="btn <?= app_web('warna_button') ?> btn-block btn-lg shadow-lg mt-5">
                    Next
                </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Remember your account? <a href="<?= base_url() ?>" class="font-bold">Log in</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>