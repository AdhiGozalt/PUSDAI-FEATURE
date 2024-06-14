<?php $this->extend('header-admin'); ?>
            
<?php $this->section('css'); ?>
<?php $this->endSection(); ?>



<?php $this->section('content'); ?>
<div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5>User</h5>
                            <a href="<?= base_url(); ?>/admin/logout" class="btn btn-danger btn-sm ml-auto">Keluar</a>
                        </div>
                        <div>
                            <!-- Tambahkan ini di tempat yang sesuai dalam file view -->
                            <button id="exportBtn">Export to Excel</button>

                            <script>
                                document.getElementById('exportBtn').addEventListener('click', function() {
                                    window.location.href = '<?= base_url('/admin/home/export') ?>';
                                });
                            </script>  
                        </div>
                        <div class="card-body">
                            <?= alert(); ?>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama&nbsp;Lengkap</th>
                                            <th>No.&nbsp;Telp/WA</th>
                                            <th>Email</th>
                                            <th>Fasilitas</th>
                                            <th>File</th>
                                            <th>Ketersedian&nbsp;Fasilitas</th>
                                            <th>Status&nbsp;Formulir</th>
                                            <th>Status&nbsp;Peminjaman</th>
                                            <th>Formulir&nbsp;Tanda&nbsp;Tangan</th>
                                            <th>Tanggal&nbsp;Submit</th>
                                            <th>Update&nbsp;Terakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($users as $loop): ?>
                                        
                                        <tr>
                                            <td width="10"><?= $no++; ?></td>
                                            <td><?= $loop['name']; ?></td>
                                            <td><?= $loop['phone']; ?></td>
                                            <td><?= $loop['email']; ?></td>
                                            <td><?= $loop['facility']; ?></td>
                                            <td>
                                                <a href="https://docs.google.com/viewer?url=<?= urlencode(base_url('assets/files/'.$loop['file'])) ?>" target="_blank"><?= $loop['file']; ?></a>
                                                <h5><a href="<?= base_url() ?>/assets/files/<?= $loop['file']; ?>" class="btn btn-primary btn-sm">Download</a></h5>
                                            </td>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-<?= $availability[$loop['availability']]['color'] ?> btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $loop['availability']; ?></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php
                                                        foreach ($availability as $akey => $avalue) {
                                                        ?>
                                                        
                                                        <a class="dropdown-item" href="<?= base_url('admin/home/availability/'.$loop['id'].'/'.$akey) ?>"><?= $avalue['name'] ?></a>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-<?= $form[$loop['form']]['color'] ?> btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $loop['form']; ?></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php
                                                        foreach ($form as $fkey => $fvalue) {
                                                        ?>
                                                        
                                                        <a class="dropdown-item" href="<?= base_url('admin/home/form/'.$loop['id'].'/'.$fkey) ?>"><?= $fvalue['name'] ?></a>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-<?= $status[$loop['status']]['color'] ?> btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $loop['status']; ?></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php
                                                        foreach ($status as $skey => $svalue) {
                                                        ?>
                                                        
                                                        <a class="dropdown-item" href="<?= base_url('admin/home/status/'.$loop['id'].'/'.$skey) ?>"><?= $svalue['name'] ?></a>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($loop['file_signature']) { ?>
                                                
                                                <a href="https://docs.google.com/viewer?url=<?= urlencode(base_url('assets/files/'.$loop['file_signature'])) ?>" target="_blank"><?= $loop['file_signature']; ?></a>
                                                <h5><a href="<?= base_url() ?>/assets/files/<?= $loop['file_signature']; ?>" class="btn btn-primary btn-sm">Download</a></h5>
                                                <?php } ?>
                                                
                                                <form method="POST" enctype="multipart/form-data" style="width: 400px;">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div>
                                                                <input type="hidden" name="id" value="<?= $loop['id']; ?>">
                                                                <input type="file" class="form-control" name="document">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="submit" name="upload" value="submit" class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li style="width: 170px;">Tanggal : <?= format_date($loop['created_at']); ?></li>
                                                    <li>Waktu : <?= format_time($loop['created_at']); ?></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li style="width: 170px;">Tanggal : <?= format_date($loop['updated_at']); ?></li>
                                                    <li>Waktu : <?= format_time($loop['updated_at']); ?></li>
                                                </ul>
                                            </td>
                                            <td><a href="<?= base_url('admin/home/delete_user/'.$loop['id'].'') ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a></td>
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>
<?php $this->endSection(); ?>