        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Edit Request</h1>
                <ol class="breadcrumb"> 
                    <li class="breadcrumb-item">Edit Request Untuk Kesalahan Input</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Request Permasalahan</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" action="<?php echo site_url('Karyawan/KelolaRequest/updateRequest/'.$request->request_id); ?>"  method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Request ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="id_request" value="<?php echo $request->request_id?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perangkat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="id_request" value="<?php echo $request->nama_perangkat?>" readonly>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi Masalah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="deskripsi"><?php echo $request->deskripsi_permasalahan; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row" id="date_1">
                                <label class="col-sm-2 col-form-label">Tanggal Pelaporan</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" type="text" value="<?php echo $request->tanggal_dibuat; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Prioritas</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="prioritas">
                                        <option value="High" <?php if ($request->prioritas === 'High') echo 'selected'; ?>>High</option>
                                        <option value="Medium" <?php if ($request->prioritas === 'Medium') echo 'selected'; ?>>Medium</option>
                                        <option value="Low" <?php if ($request->prioritas === 'Low') echo 'selected'; ?>>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <img id="previewImage" src="<?php echo base_url('assets/img/request/' . $request->foto); ?>" width="250px">
                                    <input id="inputImage" class="form-control" type="file" name="foto" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="2" name="catatan"><?php echo $request->catatan; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-default" href="<?php echo base_url()?>index.php/Karyawan/KelolaRequest/">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
