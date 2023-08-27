                <div class="content-wrapper">
                    <!-- START PAGE CONTENT-->
                    <div class="page-heading">
                        <h1 class="page-title">Chat dengan Teknisi</h1>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">Chat dengan Teknisi untuk membantu permasalahan anda.</div>
                                    </div>
                                    <div class="ibox-body">
                                        <form action="<?php echo site_url('kelolaPesan/start_chat'); ?>" method="POST">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jenis permasalahan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kategori_id">
                                                        <?php foreach ($kategori as $kategori) : ?>
                                                            <option value="<?php echo $kategori->kategori_id; ?>"><?php echo $kategori->nama_kategori; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pesan Keluhan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="4" name="message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10 ml-sm-auto">
                                                    <button class="btn btn-primary" type="submit" >Mulai Chat</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>