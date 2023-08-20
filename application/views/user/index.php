<div class="page-content <?= app_tampilan('warna_latar') ?>">

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<!-- <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4> -->
		</div>
		<!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
			<div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
				<span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
				<input type="text" class="form-control border-primary bg-transparent">
			</div>
			<button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
				<i class="btn-icon-prepend" data-feather="printer"></i>
				Print
			</button>
			<button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
				<i class="btn-icon-prepend" data-feather="download-cloud"></i>
				Download Report
			</button>
		</div> -->
	</div>
	<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
		<div class="row">
			<div class="col-12 col-xl-12 stretch-card">
				<div class="row flex-grow-1">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body" style="overflow: auto;">
								<div>
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Pembelian Bulanan</h6>
										<!-- Dropdown menu code... -->
									</div>
									<p class="text-muted">Pembelian Bulanan.</p>
									<style>
										#chart {
											width: 80%;
										}
									</style>
									<div id="chart-container">
										<div id="chart"></div>
									</div>
								</div>
							</div>
							<div class="card-body" style="overflow: auto;">
								<div>
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Laporan Kualitas Bulanan</h6>
										<!-- Dropdown menu code... -->
									</div>
									<p class="text-muted">Total Kualitas Bulanan.</p>
									<style>
										#chart2 {
											width: 80%;
										}
									</style>
									<div id="chart-container2">
										<div id="chart2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php elseif ($this->session->userdata('role_id') == 2) : ?>
		<div class="row" style="margin-top: 300px;">
			<div class="col-12 col-xl-12 stretch-card">
				<div class="row flex-grow-1">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body text-center" style="background-color: #61A6F0;">
								<h1 class="text-light">SELAMAT DATANG DI WEBSITE TABELKU, <?= $user['name'] ?>!!</h1>
							</div>
							<div class="card-body text-justify">
								<p class="<?= app_tampilan('ukuran_font') ?>">
									<?= app_web('deskripsi') ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
<script>
	// Fungsi untuk mengubah angka menjadi format rupiah
	function formatRupiah(number) {
		return new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR'
		}).format(number);
	}
	var data_pendapatan = <?= json_encode($data_pendapatan) ?>;

	// Ubah format tanggal dari "YYYY-MM" menjadi "MMMM YYYY"
	var formattedData = data_pendapatan.map(item => {
		var dateParts = item.bulan.split('-');
		var month = parseInt(dateParts[1], 10);
		var monthName = new Date(Date.UTC(2000, month - 1, 1)).toLocaleString('id-ID', {
			month: 'long'
		});
		return {
			bulan: monthName + ' ' + dateParts[0],
			total_pendapatan: item.total_pendapatan
		};
	});

	var options = {
		chart: {
			type: 'bar'
		},
		series: [{
			name: 'Total Pendapatan',
			data: formattedData.map(item => item.total_pendapatan)
		}],
		xaxis: {
			categories: formattedData.map(item => item.bulan)
		},
		plotOptions: {
			bar: {
				horizontal: false,
				barWidth: '50%' // Mengatur lebar batang menjadi 50%
			}
		},
		// Menggunakan formatter untuk menampilkan nilai dalam format rupiah pada tooltip
		tooltip: {
			y: {
				formatter: function(val) {
					return formatRupiah(val);
				}
			}
		}
	};

	var chart = new ApexCharts(document.querySelector("#chart"), options);
	chart.render();

	var data_kualitas = <?= json_encode($data_kualitas) ?>;
	var formattedDataKualitas = data_kualitas.map(item => {
		var dateParts = item.bulan.split('-');
		var month = parseInt(dateParts[1], 10);
		var monthName = new Date(Date.UTC(2000, month - 1, 1)).toLocaleString('id-ID', {
			month: 'long'
		});
		return {
			bulan: monthName + ' ' + dateParts[0],
			total_bobot_besar: item.total_bobot_besar,
			total_bobot_kecil: item.total_bobot_kecil
		};
	});

	var bulanKategoriKualitas = formattedDataKualitas.map(item => item.bulan);

	var dataSeriesKualitas = ['Besar', 'Kecil'].map(function(kualitas) {
		return {
			name: kualitas,
			data: formattedDataKualitas.map(function(item) {
				return item['total_bobot_' + kualitas.toLowerCase()] || 0; // Menggunakan properti yang sesuai
			})
		};
	});


	var opsiKualitas = {
		chart: {
			type: 'bar'
		},
		series: dataSeriesKualitas,
		xaxis: {
			categories: bulanKategoriKualitas
		},
		plotOptions: {
			bar: {
				horizontal: false,
				barWidth: '50%'
			}
		}
	};

	var chart2 = new ApexCharts(document.querySelector("#chart2"), opsiKualitas);
	chart2.render();

	// console.log(dataSeriesKualitas)
	// console.log(formattedDataKualitas)
</script>
