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
        
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="text-center">FORMULIR</h4>
                <h4 class="text-center">Penggunaan Fasilitas</h4>
                <form method="POST">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telp/WA</label>
                        <input type="number" class="form-control" name="phone" placeholder="No. Telp/WA" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <div class="text-center mb-3">Fasilitas</div>
                        <div class="row facility mb-3">
                            <div class="col-md-4 col-12 mb-2">
                                <input type="radio" class="form-check-input" id="facility_1" value="Ruang Kegiatan Eksternal dan Internal" name="facility">
                                <label class="form-check-label p-3 text-center rounded-3 border w-100" for="facility_1">
                                    <span class="fw-bold d-block mb-1" style="font-size: 14px;">Ruang Kegiatan Eksternal dan Internal</span>
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
                        <button type="submit" name="download" value="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mb-5">
            <form method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <button type="submit" name="check" value="submit" class="btn btn-primary">Cek Status</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Container to display the image and description -->
    <div id="facilityDetails" style="display: none; text-align: center;">
        <img id="facilityImage" src="" alt="Facility Image" style="max-width: 100%; height: 800px; margin: 0 auto; display: block; border: 10px solid green; border-radius: 8px;">
        <div id="facilityDescription">
    </div>




    <?php if (session('success') == 'Formulir berhasil didownload.') { ?>
    <script>
        function downloadFile(filename) {
            const link = document.createElement('a');
            link.href = '<?= base_url(); ?>/assets/word/' + filename;
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        const facility = "<?= session('facility') ?>";
        const filesToDownload = [];

        if (facility === "Ruang Kegiatan Eksternal dan Internal PUSDAI") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Pengunaan Ruang Kegiatan Untuk Ekstenal dan Internal PUSDAImerge.docx");
        } else if (facility === "Pelayanan Transit Bus") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Transit Busmerge.docx");
        } else if (facility === "Pelayanan Reklame") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Reklamemerge.docx");
        } else if (facility === "Ruang Seminar") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Ruang Kegiatan (Ruang Seminar, Plaza, Multimedia, Masjid, Taman)merge.docx");
        } else if (facility === "Taman") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Ruang Kegiatan (Ruang Seminar, Plaza, Multimedia, Masjid, Taman)merge.docx");
        } else if (facility === "Plaza") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Ruang Kegiatan (Ruang Seminar, Plaza, Multimedia, Masjid, Taman)merge.docx");
        } else if (facility === "Multimedia") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Ruang Kegiatan (Ruang Seminar, Plaza, Multimedia, Masjid, Taman)merge.docx");
        } else if (facility === "Masjid") {
            filesToDownload.push("Formulir Penggunaan Fasilitas.docx", "SOP Pelayanan Peminjaman Ruang Kegiatan (Ruang Seminar, Plaza, Multimedia, Masjid, Taman)merge.docx");
        }

        filesToDownload.forEach((file, index) => {
            setTimeout(() => downloadFile(file), index * 1000);
        });
    </script>
    <?php } ?>


    <script>
        // JavaScript function to show facility details
        function showFacilityDetails(facility) {
            const facilityDetails = document.getElementById('facilityDetails');
            const facilityImage = document.getElementById('facilityImage');
            const facilityDescription = document.getElementById('facilityDescription');
            
            // Define images and descriptions for each facility
            const facilityInfo = {
                "Ruang Kegiatan Eksternal dan Internal": {

                    img: "./assets/images/team/ruangSeminarBesar.jpg",          
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Pelayanan Transit Bus": {
                    img: "./assets/images/team/sample.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Pelayanan Reklame": {
                    img: "./assets/images/team/sample2.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Ruang Seminar": {
                    img: "./assets/images/team/sample3.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Plaza": {
                    img: "./assets/images/team/sample4.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Multimedia": {
                    img: "./assets/images/team/ruangMultimedia.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Masjid": {
                    img: "./assets/images/team/ruangSeminarBesar.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                },
                "Taman": {
                    img: "./assets/images/team/sample7.jpg",
                    desc: "Tambahkan : Deskripsi Fasilitas beserta Besaran INFAQ di sini\n"
                }
            };

            // Update the image and description based on the selected facility
            if (facilityInfo[facility]) {
                facilityImage.src = facilityInfo[facility].img;
                facilityDescription.textContent = facilityInfo[facility].desc;
                facilityDetails.style.display = 'block';
            } else {
                facilityDetails.style.display = 'none';
            }
        }

        // Event listeners for radio buttons
        document.querySelectorAll('input[name="facility"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                showFacilityDetails(this.value);
            });
        });

        // Handle active class toggling for labels
        $(".form-check-label.p-3.text-center.rounded-3.border").on("click", function(){
            $(".form-check-label.p-3.text-center.rounded-3.border.active").removeClass("active");
            $(this).addClass("active");
        });
    </script>



    

    <?php $this->endSection(); ?>
