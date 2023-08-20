<div class="page-content <?= app_tampilan('warna_latar') ?>">

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0"><?= $title ?></h4>
		</div>
	</div>


	<div class="row">
		<div class="col-12 col-xl-12 stretch-card">
			<div class="card">
				<div class="card-body">

					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0"><?= $title ?></h6>
						<!-- <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Tambah</span></a>
                            </div>
                        </div> -->
					</div>
					<form action="<?= base_url('Tabelku/index') ?>" method="post">
						<input type="hidden" name="aksi" value="add">
						<div class="row form-update">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="nama_penjual">Nama penjual</label>
									<!-- <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" placeholder="Nama penjual"> -->
									<select class="form-select" name="nama_penjual" id="nama_penjual">
										<option value="" disabled selected>--- Pilih Nama Penjual ---</option>
										<?php foreach ($user_data as $r) : ?>
											<option value="<?= $r['name'] ?>"><?= $r['name'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="mb-3">
									<label for="tanggal_pembelian">Tanggal Pembelian</label>
									<input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" max="<?php echo date('Y-m-d'); ?>" placeholder="Nama penjual">
									<?= form_error('tanggal_pembelian', '<div class="invalid-feedback">', '</div>') ?>
								</div>
								<div class="mb-3">
									<label for="kualitas">Kualitas</label>
									<select class="form-control" id="kualitas" name="kualitas" placeholder="Nama penjual">
										<option value="" selected disabled>Pilih Kualitas</option>
										<option value="Besar">Besar</option>
										<option value="Kecil">Kecil</option>
									</select>
									<?= form_error('kualitas', '<div class="invalid-feedback">', '</div>') ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="bobot">Bobot (kg)</label>
									<input type="text" pattern="[0-9]+([\.][0-9]+)?" class="form-control" id="bobot" name="bobot" placeholder="Bobot">
									<?= form_error('bobot', '<div class="invalid-feedback">', '</div>') ?>
								</div>
								<div class="mb-3">
									<label for="harga_beli">Harga Beli</label>
									<input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
									<?= form_error('harga_beli', '<div class="invalid-feedback">', '</div>') ?>
								</div>
								<div class="mb-3">
									<label for="total_bayar">Total Bayar</label>
									<input type="number" class="form-control" id="total_bayar" name="total_bayar" placeholder="Nama penjual">
									<?= form_error('total_bayar', '<div class="invalid-feedback">', '</div>') ?>
								</div>
							</div>
							<div class="d-grid gap-2 col-2 mx-auto">
								<button type="submit" class="btn btn-block  <?= app_web('warna_button') ?>">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- row -->
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		function updateHarga() {
			var bobot = $(".form-update #bobot").val();
			var harga_beli = $(".form-update #harga_beli").val();

			// Make sure both fields are filled before making the AJAX request
			if (harga_beli && bobot) {
				// AJAX request to get the updated harga
				$.ajax({
					url: "<?= base_url('Tabelku/hitungHarga') ?>", // Replace this with your server endpoint URL that returns the updated harga
					method: "POST", // Use "POST" or "GET" depending on your server implementation
					data: {
						harga_beli: harga_beli,
						bobot: bobot
					},
					dataType: "json", // Use "json" if your server returns JSON, or "text" for plain text response
					success: function(data) {
						// Update the harga field with the retrieved value
						$(".form-update #total_bayar").val(data);
					},
					error: function(xhr, status, error) {
						// Handle errors if any
						console.error(error);
					}
				});
			}
		};
		// Trigger the AJAX request when the user types in the bobot field
		$(".form-update #bobot").on("input", updateHarga);

		// Trigger the AJAX request when the harga_beli selection changes
		$(".form-update #harga_beli").on("input", updateHarga);
	});
</script>
