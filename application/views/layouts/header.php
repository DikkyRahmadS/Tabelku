<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Purchase: https://1.envato.market/nobleui_admin
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title><?= $title ?></title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- End plugin css for this page -->


	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

	<!-- Layout styles -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo1/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<!-- End layout styles -->

	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/app/auth-happy.png" />

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/simplemde/simplemde.min.css">
	<!-- End plugin css for this page -->


	<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
	<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
	<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@latest/dist/select2-bootstrap.min.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.css"> -->
	<style>
		@import "~bootstrap/scss/functions";
		@import "~bootstrap/scss/variables";

		:root {
			--bs-soft-primary: #61A6F0;
			--bs-soft-success: #6ecb8e;
			--bs-soft-info: #a0e4e4;
			--bs-soft-warning: #fbd994;
			--bs-soft-danger: #ff8bb4;
			--bs-soft-secondary: #7987a1;
			--bs-soft-light: #f3f6f8;
			--bs-soft-dark: #3f4e66;
			--bs-soft-blue: #7fa7f9;
			--bs-soft-indigo: #a68df7;
			--bs-soft-purple: #a687c6;
			--bs-soft-pink: #e978ad;
			--bs-soft-red: #e09ca4;
			--bs-soft-orange: #fda16e;
			--bs-soft-yellow: #ffe0a4;
			--bs-soft-green: #9edb9f;
			--bs-soft-teal: #80d4bd;
			--bs-soft-cyan: #7ddef7;
		}

		.bg-soft-primary {
			background-color: var(--bs-soft-primary);
		}
		
		.btn-soft-primary {
			background-color: var(--bs-soft-primary);
			color: white;
		}

		.bg-soft-success {
			background-color: var(--bs-soft-success);
		}
		
		.btn-soft-success {
			background-color: var(--bs-soft-success);
			color: white;
		}

		.bg-soft-info {
			background-color: var(--bs-soft-info);
		}
		
		.btn-soft-info {
			background-color: var(--bs-soft-info);
			color: white;
		}

		.bg-soft-warning {
			background-color: var(--bs-soft-warning);
		}
		
		.btn-soft-warning {
			background-color: var(--bs-soft-warning);
			color: white;
		}

		.bg-soft-danger {
			background-color: var(--bs-soft-danger);
		}
		
		.btn-soft-danger {
			background-color: var(--bs-soft-danger);
			color: white;
		}

		.bg-soft-secondary {
			background-color: var(--bs-soft-secondary);
		}
		
		.btn-soft-secondary {
			background-color: var(--bs-soft-secondary);
			color: white;
		}

		.bg-soft-light {
			background-color: var(--bs-soft-light);
		}
		
		.btn-soft-light {
			background-color: var(--bs-soft-light);
			color: white;
		}

		.bg-soft-dark {
			background-color: var(--bs-soft-dark);
		}
		
		.btn-soft-dark {
			background-color: var(--bs-soft-dark);
			color: white;
		}


		.bg-blue {
			background-color: var(--bs-blue);
		}

		.bg-soft-blue {
			background-color: var(--bs-soft-blue);
		}
		
		.btn-soft-blue {
			background-color: var(--bs-soft-blue);
			color: white;
		}

		.text-blue {
			color: var(--bs-blue);
		}

		.btn-blue {
			background-color: var(--bs-blue);
			color: white;
		}

		.bg-indigo {
			background-color: var(--bs-indigo);
		}

		.bg-soft-indigo {
			background-color: var(--bs-soft-indigo);
		}
		
		.btn-soft-indigo {
			background-color: var(--bs-soft-indigo);
			color: white;
		}

		.text-indigo {
			color: var(--bs-indigo);
		}

		.btn-indigo {
			background-color: var(--bs-indigo);
			color: white;
		}

		.bg-purple {
			background-color: var(--bs-purple);
		}

		.bg-soft-purple {
			background-color: var(--bs-soft-purple);
		}
		
		.btn-soft-purple {
			background-color: var(--bs-soft-purple);
			color: white;
		}

		.text-purple {
			color: var(--bs-purple);
		}

		.btn-purple {
			background-color: var(--bs-purple);
			color: white;
		}

		.bg-pink {
			background-color: var(--bs-pink);
		}

		.bg-soft-pink {
			background-color: var(--bs-soft-pink);
		}
		
		.btn-soft-pink {
			background-color: var(--bs-soft-pink);
			color: white;
		}

		.text-pink {
			color: var(--bs-pink);
		}

		.btn-pink {
			background-color: var(--bs-pink);
			color: white;
		}

		.bg-red {
			background-color: var(--bs-red);
		}

		.bg-soft-red {
			background-color: var(--bs-soft-red);
		}
		
		.btn-soft-red {
			background-color: var(--bs-soft-red);
			color: white;
		}

		.text-red {
			color: var(--bs-red);
		}

		.btn-red {
			background-color: var(--bs-red);
			color: white;
		}

		.bg-orange {
			background-color: var(--bs-orange);
		}

		.bg-soft-orange {
			background-color: var(--bs-soft-orange);
		}
		
		.btn-soft-orange {
			background-color: var(--bs-soft-orange);
			color: white;
		}

		.text-orange {
			color: var(--bs-orange);
		}

		.btn-orange {
			background-color: var(--bs-orange);
			color: white;
		}

		.bg-yellow {
			background-color: var(--bs-yellow);
		}

		.bg-soft-yellow {
			background-color: var(--bs-soft-yellow);
		}
		
		.btn-soft-yellow {
			background-color: var(--bs-soft-yellow);
			color: white;
		}

		.text-yellow {
			color: var(--bs-yellow);
		}

		.btn-yellow {
			background-color: var(--bs-yellow);
			color: white;
		}

		.bg-green {
			background-color: var(--bs-green);
		}

		.bg-soft-green {
			background-color: var(--bs-soft-green);
		}
		
		.btn-soft-green {
			background-color: var(--bs-soft-green);
			color: white;
		}

		.text-green {
			color: var(--bs-green);
		}

		.btn-green {
			background-color: var(--bs-green);
			color: white;
		}

		.bg-teal {
			background-color: var(--bs-teal);
		}

		.bg-soft-teal {
			background-color: var(--bs-soft-teal);
		}
		
		.btn-soft-teal {
			background-color: var(--bs-soft-teal);
			color: white;
		}

		.text-teal {
			color: var(--bs-teal);
		}

		.btn-teal {
			background-color: var(--bs-teal);
			color: white;
		}

		.bg-cyan {
			background-color: var(--bs-cyan);
		}

		.bg-soft-cyan {
			background-color: var(--bs-soft-cyan);
		}
		
		.btn-soft-cyan {
			background-color: var(--bs-soft-cyan);
			color: white;
		}

		.text-cyan {
			color: var(--bs-cyan);
		}

		.btn-cyan {
			background-color: var(--bs-cyan);
			color: white;
		}

		.bg-gray {
			background-color: var(--bs-gray);
		}

		.bg-soft-gray {
			background-color: var(--bs-soft-gray);
		}
		
		.btn-soft-gray {
			background-color: var(--bs-soft-gray);
			color: white;
		}

		.text-gray {
			color: var(--bs-gray);
		}

		.btn-gray {
			background-color: var(--bs-gray);
			color: white;
		}
	</style>
</head>

<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->