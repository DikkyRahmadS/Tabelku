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
					<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Sub Menu"></div>
					<?= $this->session->flashdata('message'); ?>
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">Hierarchy Form</h6>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- row -->
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


<script>
	function previewImg() {
		$('.img-input').each(function(index) {
			const image = this;
			const imgPreview = $('.img-preview').eq(index); // Ambil elemen .img-preview yang sesuai berdasarkan indeks
			imgPreview.css('display', 'block');
			const oFReader = new FileReader();
			oFReader.readAsDataURL(image.files[0]);

			oFReader.onload = function(oFREvent) {
				imgPreview.attr('src', oFREvent.target.result);
			};
		});
	}
</script>
<script>
	$(document).on("click", ".update", function() {
		var id = $(this).data('id');
		$(".modal-body #id").val(id);
	});
</script>