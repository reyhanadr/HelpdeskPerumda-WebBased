<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Kelola Perangkat</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('karyawan/Home'); ?>"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Perangkat</div>
                <a href="<?= base_url()?>index.php/Karyawan/KelolaPerangkat/tampilTambahPerangkat">
                    <button class="btn btn-primary" type="submit">Tambah Perangkat</button>
                </a>
            </div>
            <div class="ibox-body">
                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>


                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Nomer Seri</th>
                            <th class="text-center">Gambar Perangkat</th>
                            <th class="text-center">Nama Perangkat</th>
                            <th class="text-center">Jenis Perangkat</th>
                            <th class="text-center">Spesifikasi Perangkat</th>
                            <th class="text-center">Lokasi Fisik</th>
                            <th class="text-center">Status Perangkat</th>
                            <th class="text-center">Catatan</th>
                            <th class="text-center">Penanggung Jawab</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perangkat as $item) : ?>
                            <tr class="text-center">
                                <td><?php echo $item->nomer_seri; ?></td>
                                <td class="text-center">
                                    <a href="detail-perangkat.html">
                                        <img src="<?php echo base_url(); ?>/assets/img/perangkat/<?php echo $item->foto?>" width="45px">
                                    </a>
                                </td>
                                <td><?php echo $item->nama_perangkat; ?></td>
                                <td><?php echo $item->nama_kategori; ?></td>
                                <td><?php echo $item->spesifikasi; ?></td>
                                <td><?php echo $item->lokasi_fisik; ?></td>
                                <td>
                                    <?php if ($item->status_perangkat == 'PENDING'): ?>
                                        <span class="badge badge-warning"><?php echo $item->status_perangkat; ?></span>
                                    <?php elseif ($item->status_perangkat == 'FIXED'): ?>
                                        <span class="badge badge-success"><?php echo $item->status_perangkat; ?></span>
                                    <?php elseif ($item->status_perangkat == 'RUNNING'): ?>
                                        <span class="badge badge-success"><?php echo $item->status_perangkat; ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"><?php echo $item->status_perangkat; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $item->catatan; ?></td>
                                <td><?php echo $item->nama; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- Menggunakan flexbox untuk tata letak sejajar horizontal -->
                                        <a href="update-status-perangkat" class="mr-2">
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip"
                                                data-original-title="Fixed"><i
                                                    class="fa-solid fa-check-to-slot font-14"></i></button>
                                        </a>
                                        <a href="<?php echo base_url('index.php/Karyawan/KelolaPerangkat/tampilEditPerangkat/'.$item->id); ?>" class="mr-2">
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                        </a>
                                        <a href="<?php echo base_url('index.php/Karyawan/KelolaPerangkat/hapusPerangkat/'.$item->id); ?>"class="mr-2">
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->