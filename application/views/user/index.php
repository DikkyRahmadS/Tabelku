<div class="page-content <?= app_tampilan('warna_latar') ?>">

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>

		</div>
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
							<div class="card-body" style="overflow: auto;">
								<div>
									<div class="d-flex justify-content-between align-items-baseline mb-2">
										<h6 class="card-title mb-0">Laporan Data Pelanggan</h6>
										<!-- Dropdown menu code... -->
									</div>
									<p class="text-muted">Laporan Data Pelanggan.</p>
									<style>
										#chart3 {
											width: 80%;
										}
									</style>
									<div id="chart-container2">
										<div id="chart3"></div>
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

	var data_pelanggan = <?= json_encode($data_pelanggan) ?>;

	// Ubah format tanggal dari "YYYY-MM" menjadi "MMMM YYYY"
	var formattedDataPel = data_pelanggan.map(item => {
		var dateParts = item.bulan.split('-');
		var month = parseInt(dateParts[1], 10);
		var monthName = new Date(Date.UTC(2000, month - 1, 1)).toLocaleString('id-ID', {
			month: 'long'
		});
		return {
			bulan: monthName + ' ' + dateParts[0],
			nama_penjual: item.nama_penjual,
			total_bobot_besar: item.total_bobot_besar,
			total_bobot_kecil: item.total_bobot_kecil
		};
	});

	var penjuals = Array.from(new Set(formattedDataPel.map(item => item.nama_penjual))); // Ambil daftar unik nama penjual
	var uniqueMonths = Array.from(new Set(formattedDataPel.map(item => item.bulan))); // Ambil daftar unik bulan

	var seriesBesar = penjuals.map(penjual => {
		var data = [];

		uniqueMonths.forEach(bulan => {
			var dataPenjual = formattedDataPel.find(item => item.nama_penjual === penjual && item.bulan === bulan);
			if (dataPenjual) {
				data.push(dataPenjual.total_bobot_besar);
			} else {
				data.push(0);
			}
		});

		return {
			name: penjual + ' (Besar)',
			data: data
		};
	});

	var seriesKecil = penjuals.map(penjual => {
		var data = [];

		uniqueMonths.forEach(bulan => {
			var dataPenjual = formattedDataPel.find(item => item.nama_penjual === penjual && item.bulan === bulan);
			if (dataPenjual) {
				data.push(dataPenjual.total_bobot_kecil);
			} else {
				data.push(0);
			}
		});

		return {
			name: penjual + ' (Kecil)',
			data: data
		};
	});

	var optionsPel = {
		chart: {
			type: 'bar'
		},
		series: [...seriesBesar, ...seriesKecil],
		xaxis: {
			categories: uniqueMonths
		},
		plotOptions: {
			bar: {
				horizontal: false,
				barWidth: '30%'
			}
		},
		tooltip: {
			y: {
				formatter: function(val) {
					return val.toFixed(2);
				}
			}
		}
	};

	var chart3 = new ApexCharts(document.querySelector("#chart3"), optionsPel);
	chart3.render();


	//console.log(data_pelanggan)
	// console.log(formattedDataKualitas)
</script>
