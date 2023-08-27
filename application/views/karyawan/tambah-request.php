        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Buat Request</h1>
                <ol class="breadcrumb"> 
                    <li class="breadcrumb-item">Buat Request Untuk Mengatasi Masalah Perangkat Anda</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Buat Request Permasalahan</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" action="<?php echo site_url('Karyawan/KelolaRequest/simpanRequest/'); ?>"  method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Request ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="request_id_tampil" value="<?php echo $newReqID?>" disabled>
                                    <input class="form-control" type="text" name="request_id" value="<?php echo $newReqID?>" hidden>
                                    <input class="form-control" type="text" name="user_id" value="<?php echo $users->user_id?>" hidden>
                                    <input class="form-control" type="text" name="role_id" value="<?php echo $users->role_id?>" hidden>
                                    <input class="form-control" type="text" name="department_id" value="<?php echo $users->departemen_id?>" hidden>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perangkat</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="perangkat_id">
                                        <?php foreach ($perangkat as $item) : ?>
                                            <option value="<?php echo $item->id; ?>"><?php echo $item->nama_perangkat; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori Masalah</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kategori_id">
                                        <?php foreach ($kategori as $kategori) : ?>
                                            <option value="<?php echo $kategori->kategori_id; ?>"><?php echo $kategori->nama_kategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi Masalah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="deskripsi_permasalahan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" id="date_1">
                                <label class="col-sm-2 col-form-label">Tanggal Pelaporan</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" type="text" name="" value="<?php echo $tanggalHariIni?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prioritas</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="prioritas">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="foto">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="2" name="catatan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Perangkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="status_perangkat" value="PENDING" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-default" href="kelola-request.html">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
