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
            <form class="user" method="post" action="<?= base_url('auth/forgotPassword2') ?>">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
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