<style>
	.sidebar-h {
		border-radius: 0 2% 0 0;
	}
</style>
<nav class="sidebar">
	<div class="sidebar-header sidebar-h <?= app_tampilan('warna_sidebar') ?>">
		<a href="#" class="sidebar-brand">
			<!-- <?= app_brand() ?> -->
			<img src="<?= base_url('assets/img/' . app_web('logo')); ?>" class="w-50" alt="">
			<!-- <img src="<?= base_url('/assets/img/logo/sidebar-logo.png') ?>" class="" alt="" style="margin-left: -40px;"> -->
		</a>
		<div class="sidebar-toggler not-active">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="sidebar-body sidebar-h <?= app_tampilan('warna_sidebar') ?>">
		<ul class="nav">
			<?php
			$role_id = $this->session->userdata('role_id');
			$queryMenu = "SELECT um.id, menu FROM user_menu AS um JOIN user_access_menu AS uam ON um.id = uam.menu_id WHERE uam.role_id = $role_id AND active = 1 ORDER BY uam.menu_id ASC";
			$menu = $this->db->query($queryMenu)->result();

			foreach ($menu as $m) : ?>
				<li class="nav-item nav-category" style="color: aliceblue;"><?= $m->menu ?></li>
				<?php
				$queryMenu = "SELECT * FROM user_sub_menu AS usm JOIN user_menu AS um ON usm.menu_id = um.id WHERE usm.menu_id = $m->id AND usm.is_active = 1";
				$subMenu = $this->db->query($queryMenu)->result();
				foreach ($subMenu as $sm) : ?>
					<li class="nav-item <?= ($sm->title == $title) ? 'active' : '' ?> ">
						<a href="<?= base_url($sm->url) ?>" class="nav-link text-light a-hov">
							<i class="link-icon" data-feather="<?= $sm->icon ?>"></i>
							<span class="link-title"><?= $sm->title ?></span>
						</a>
					</li>
					<style>
						.a-hov :hover {
							color: var(--bs-<?= app_tampilan('warna_soft') ?>);
						}
					</style>
			<?php
				endforeach;
			endforeach; ?>
		</ul>
	</div>
</nav>
<nav class="settings-sidebar">
	<div class="sidebar-body">
		<a href="#" class="settings-sidebar-toggler">
			<i data-feather="settings"></i>
		</a>
		<h6 class="text-muted mb-2">Sidebar:</h6>
		<div class="mb-3 pb-3 border-bottom">
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
				<label class="form-check-label" for="sidebarLight">
					Light
				</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
				<label class="form-check-label" for="sidebarDark">
					Dark
				</label>
			</div>
		</div>
		<div class="theme-wrapper">
			<h6 class="text-muted mb-2">Light Theme:</h6>
			<a class="theme-item active" href="../demo1/dashboard.html">
				<img src="<?= base_url() ?>/assets/images/screenshots/light.jpg" alt="light theme">
			</a>
			<h6 class="text-muted mb-2">Dark Theme:</h6>
			<a class="theme-item" href="../demo2/dashboard.html">
				<img src="<?= base_url() ?>/assets/images/screenshots/dark.jpg" alt="light theme">
			</a>
		</div>
	</div>
</nav>
<!-- partial -->

<div class="page-wrapper">