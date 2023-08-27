<body class="fixed-navbar">
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Update Perangkat</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Update Perangkat Yang Telah Diberikan Kepada Anda</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Update Data Perangkat Anda</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                    <?php if ($this->session->flashdata('error_upload')): ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error_upload'); ?></div>
                    <?php endif; ?>
                        <form class="form-horizontal" action="<?php echo site_url('Karyawan/KelolaPerangkat/updatePerangkat/'.$perangkat->id); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomer Seri</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nomer_seri" id="nomer_seri" value="<?php echo $perangkat->nomer_seri ?>">
                                    <input class="form-control" type="text" name="perangkat_id" id="nomer_seri" value="<?php echo $perangkat->id ?>" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="penanggungjawab" value="<?php echo $users->nama ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Perangkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nama_perangkat" id="nama_perangkat" value="<?php echo $perangkat->nama_perangkat ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Perangkat</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kategori_id">
                                        <?php foreach ($kategori as $item) : ?>
                                            <option value="<?php echo $item->kategori_id; ?>" <?php if ($item->kategori_id === $perangkat->kategori_id) echo 'selected'; ?>>
                                                <?php echo $item->nama_kategori; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Spesifikasi Perangkat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="spesifikasi" id="spesifikasi"><?php echo $perangkat->spesifikasi ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lokasi Perangkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" rows="4" name="lokasi_fisik" value="<?php echo $perangkat->lokasi_fisik ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Perangkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="status_perangkat" id="status_perangkat" readonly value="<?php echo $perangkat->status_perangkat ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Catatan Untuk Perangkat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="catatan" id="catatan"><?php echo $perangkat->catatan ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gambar Perangkat (max 2MB)</label>
                                <div class="col-sm-10">
                                    <img id="previewImage" src="<?php echo base_url('assets/img/perangkat/' . $perangkat->foto); ?>" width="250px">
                                    <input id="inputImage" class="form-control" type="file" name="foto" onchange="previewImage(event)" value="<?php echo $perangkat->foto; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="<?= base_url('Karyawan/KelolaPerangkat'); ?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>