<div class="page-content <?= app_tampilan('warna_latar') ?>">
    <style>
        /* Gaya untuk radio button */
        input[type="radio"].radio-hidden {
            display: none;
        }

        /* Gaya untuk label sebagai indikator kotak warna */
        label.color-radio {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
        }

        /* Tambahkan kelas dan warna sesuai dengan warna lainnya */

        /* Gaya untuk label pilihan warna yang terpilih */
        input[type="radio"]:checked+label.color-radio {
            box-shadow: 0 0 3px 3px rgba(0, 123, 255, 0.5);
            /* Warna biru primary dengan efek bayangan */
        }

        /* Gaya untuk label pilihan warna yang terpilih ketika di-hover */
        input[type="radio"]:checked:hover+label.color-radio {
            box-shadow: 0 0 5px 3px rgba(0, 123, 255, 0.7);
            /* Warna biru primary dengan efek bayangan ketika di-hover */
        }

        /* Gaya untuk setiap baris warna */
        .color-row {
            margin-bottom: 10px;
        }
    </style>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-0 mb-md-0"><?= $title ?></h4>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0"><?= $title ?></h6>
                    </div>
                    <form action="<?= base_url('App/app') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?= $app['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-0">
                                    <label>Warna Button</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_button-<?= $warna['warna'] ?>" name="warna_button" value="btn-<?= $warna['warna'] ?>" class="radio-hidden" <?= ($app['warna_button'] == 'btn-'.$warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_button-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_button', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $app['deskripsi'] ?></textarea>
                                    <?= form_error('deskripsi', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-4 m-1">
                                        <img src="<?= base_url('assets/img/' . $app['logo']) ?>" class="img-thumbnail img-preview bg-secondary">
                                    </div>
                                    <label for="logo">logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                    <?= form_error('logo', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <button type="submit" class="btn text-light <?= app_web('warna_button') ?> float-end">Simpan</button>
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
        $('#logo').change(function() {
            const file = this.files[0];
            const imgPreview = $('.img-preview img')[0];

            const oFReader = new FileReader();
            oFReader.readAsDataURL(file);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        });
    });
</script>