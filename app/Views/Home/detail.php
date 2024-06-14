<?php $this->extend('header'); ?>
            
<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<section class="page-banner">
            <div class="image-layer" style="background-image:url(<?= base_url(); ?>/assets/images/banner.jpg);"></div>
            <div class="banner-bottom-pattern"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix"></div>
                </div>
            </div>
        </section>
        <div class="container">
            <?= alert(); ?>
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="pb-4">
                                Nama Lengkap
                                <h5><?= $users['name']; ?></h5>
                            </div>
                            <div class="pb-4">
                                No. Telp/WA
                                <h5><?= $users['phone']; ?></h5>
                            </div>
                            <div class="pb-4">
                                Email
                                <h5><?= $users['email']; ?></h5>
                            </div>
                            <div class="pb-4">
                                Fasilitas yang dipilih
                                <h5><?= $users['facility']; ?></h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pb-4">
                                Ketersedian Fasilitas
                                <h5><?php if ($users['availability'] == 'Menunggu Formulir') { echo '<div class="btn btn-warning">Menunggu Formulir</div>'; } else if ($users['availability'] == 'Dalam Pengecekan') { echo '<div class="btn btn-info">Dalam Pengecekan</div>'; } else if ($users['availability'] == 'Tersedia') { echo '<div class="btn btn-success">Tersedia</div>'; } else { echo '<div class="btn btn-danger mr-2">Tidak Tersedia</div><a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#chooseFacilityModal">Pilih Fasilitas</a>'; } ?></h5>
                                <?php if ($users['availability'] == 'Menunggu Formulir') { ?>
                                
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Formulir</label>
                                        <div class="input-group">
                                            <div>
                                                <input type="file" class="form-control" name="formulir">
                                            </div>
                                            <div class="input-group-append">
                                                <button type="submit" name="upload" value="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                                
                            </div>
                            <div class="pb-4">
                                Status Formulir
                                <h5><?php if ($users['form'] == 'Menunggu') { echo '<div class="btn btn-warning">Menunggu</div>'; } else if ($users['form'] == 'Diterima') { echo '<div class="btn btn-success mr-2">Diterima</div>'; } else { echo '<div class="btn btn-danger mr-2">Ditolak</div>'; } ?></h5>
                            </div>
                            <div class="pb-4">
                                Status Peminjaman
                                <h5><?php if ($users['status'] == 'Menunggu') { echo '<div class="btn btn-warning">Menunggu</div>'; } else if ($users['status'] == 'Disetujui') { echo '<div class="btn btn-success">Disetujui</div>'; } else { echo '<div class="btn btn-danger">Ditolak</div>'; } ?></h5>
                            </div>
                            <?php if ($users['file_signature']) { ?>
                            
                            <div class="pb-4">
                                <h5><a href="<?= base_url() ?>/assets/files/<?= $users['file_signature'] ?>" class="btn btn-primary">Download Dokumen Diterima</a></h5>
                            </div>
                            <?php } ?>
                            
                        </div>
                        <?php if ($users['availability'] == 'Tidak Tersedia') { ?>
                        
                        <div class="modal fade" id="chooseFacilityModal" tabindex="-1" aria-labelledby="chooseFacilityModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="chooseFacilityModalLabel">Fasilitas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <div class="row facility mb-3">
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_1" value="Ruang Kegiatan Untuk Ekstenal dan Internal PUSDAI" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_1">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Ruang Kegiatan Ekstenal dan Internal</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_2" value="Pelayanan Transit Bus" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_2">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Pelayanan Transit Bus</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_3" value="Pelayanan Reklame" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_3">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Pelayanan Reklame</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Pelayanan Peminjaman Ruang Kegiatan</label>
                                                <div class="row facility mb-3">
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_5" value="Ruang Seminar" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_5">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Ruang Seminar</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_6" value="Plaza" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_6">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Plaza</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_7" value="Multimedia" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_7">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Multimedia</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_8" value="Masjid" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_8">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Masjid</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 col-12 mb-2">
                                                        <input type="radio" class="form-check-input" id="facility_9" value="Taman" name="facility">
                                                        <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_9">
                                                            <span class="fw-bold d-block mb-1" style="font-size: 14px;">Taman</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="float-right">
                                                <button type="submit" name="save_facility" value="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } if ($users['form'] == 'Ditolak') { ?>
                        
                        <div class="modal fade" id="rejectedModal" tabindex="-1" aria-labelledby="rejectedModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectedModalLabel">Formulir Ditolak</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-danger text-center font-weight-bold">Periksa kembali Formulir anda, Pastikan data sudah benar.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php if (session('success') == 'Fasilitas berhasil dipilih.') { ?>
        
        <script>
            function downloadFile() {
                fetch(window.location.href)
                .then(response => response.url)
                .then(url => {
                    const baseUrl = new URL(url).origin;
                    window.location.href = '<?= base_url(); ?>/assets/word/Formulir Penggunaan Fasilitas.docx';
                })
                .catch(error => console.error(error));
            }
            
            setTimeout(function() {
                downloadFile();
            }, 1000);
        </script>
        <?php } ?>
        
        <script>
            $(document).ready(function() {
                $('#chooseFacilityModal').modal('show');
                $('#rejectedModal').modal('show');
            });
            $(".form-check-label.p-3.text-center.rounded-3.border").on("click", function(){
                $(".form-check-label.p-3.text-center.rounded-3.border.active").removeClass("active");
                $(this).addClass("active");
            });
        </script>
<?php $this->endSection(); ?>