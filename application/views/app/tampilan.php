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
                    <form action="<?= base_url('App/tampilan') ?>" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $tampilan['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-0">
                                    <label>Warna Skema</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_skema-<?= $warna['warna'] ?>" name="warna_skema" value="<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_skema'] == $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_skema-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_skema', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-0">
                                    <label>Warna Soft</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_soft-<?= $warna['warna'] ?>" name="warna_soft" value="<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_soft'] == $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_soft-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_soft', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-0">
                                    <label>Warna Latar</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_latar-<?= $warna['warna'] ?>" name="warna_latar" value="bg-<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_latar'] == 'bg-' . $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_latar-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_latar', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_font">Jenis Font</label>
                                    <select class="form-control" id="jenis_font" name="jenis_font">
                                        <option value="" selected disabled>Pilih Font</option>
                                        <?php foreach ($font_families as $font_family) : ?>
                                            <option value='<?= $font_family['font_family'] ?>' <?= ($tampilan['jenis_font'] == $font_family['font_family']) ? 'selected' : ''; ?> style="font-family: <?= $font_family['font_family'] ?>;"><?= $font_family['font_family'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenis_font', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-0">
                                    <label>Warna Sidebar</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_sidebar-<?= $warna['warna'] ?>" name="warna_sidebar" value="bg-<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_sidebar'] == 'bg-' . $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_sidebar-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_sidebar', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-0">
                                    <label>Warna Topbar</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_topbar-<?= $warna['warna'] ?>" name="warna_topbar" value="bg-<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_topbar'] == 'bg-' . $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_topbar-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_topbar', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-0">
                                    <label>Warna Font teks khusus</label>
                                    <div class="radio-container">
                                        <?php $counter = 0; ?>
                                        <?php foreach ($warnas as $warna) : ?>
                                            <?php if ($counter % 12 === 0) : ?>
                                                <div class="color-row">
                                                <?php endif; ?>
                                                <input type="radio" id="warna_font-<?= $warna['warna'] ?>" name="warna_font" value="text-<?= $warna['warna'] ?>" class="radio-hidden" <?= ($tampilan['warna_font'] == 'text-' . $warna['warna']) ? 'checked' : '' ?>>
                                                <label for="warna_font-<?= $warna['warna'] ?>" class="color-radio bg-<?= $warna['warna'] ?>"></label>
                                                <?php if (($counter + 1) % 12 === 0 || ($counter + 1) === count($warnas)) : ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <?= form_error('warna_font', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="ukuran_font">Ukuran Font</label>
                                    <select class="form-control" id="ukuran_font" name="ukuran_font">
                                        <option value="" selected disabled>Pilih Font</option>
                                        <option value="fs-6" <?= ($tampilan['ukuran_font'] == 'fs-6') ? 'selected' : ''; ?>>fs-6</option>
                                        <option value="fs-5" <?= ($tampilan['ukuran_font'] == 'fs-5') ? 'selected' : ''; ?>>fs-5</option>
                                        <option value="fs-4" <?= ($tampilan['ukuran_font'] == 'fs-4') ? 'selected' : ''; ?>>fs-4</option>
                                        <option value="fs-3" <?= ($tampilan['ukuran_font'] == 'fs-3') ? 'selected' : ''; ?>>fs-3</option>
                                        <option value="fs-2" <?= ($tampilan['ukuran_font'] == 'fs-2') ? 'selected' : ''; ?>>fs-2</option>
                                        <option value="fs-1" <?= ($tampilan['ukuran_font'] == 'fs-1') ? 'selected' : ''; ?>>fs-1</option>
                                    </select>
                                    <small><a href="https://getbootstrap.com/docs/5.3/utilities/text/#font-size">Lihat keterangan ukuran font</a></small>
                                    <?= form_error('ukuran_font', '<div class="invalid-feedback">', '</div>') ?>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <button type="submit" class="btn btn-block text-light <?= app_web('warna_button') ?>">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>