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
                                        <div class="ibox-title">Chat dengan Teknisi</div>
                                    </div>
                                    <div class="ibox-body">
                                        <div class="message">
                                            <!-- Menampilkan Pesan Pengirim/Sender (karyawan) -->
                                            <div class="message">
                                                <?php
                                                    $combinedChats = array_merge($chats, $chats_teknisi);

                                                    // Urutkan array kombinasi berdasarkan timestamp
                                                    usort($combinedChats, function($a, $b) {
                                                        return strtotime($a->timestamp) - strtotime($b->timestamp);
                                                    });
                                                ?>
                                                <?php foreach ($combinedChats as $message): ?>
                                                    <?php if ($message->sender_id == $this->session->userdata('user_id') ): ?>
                                                        <!-- Pesan dari pengguna saat ini (misalnya, karyawan) -->
                                                        <li class="media media-right">
                                                            <div class="media-body text-right">
                                                                <h6 class="media-heading"><?= $message->nama ?></h6>
                                                                <span><?= $message->message ?></span> <br>
                                                                <span class="badge badge-default m-b-5" style="font-size:8px"><?= $message->timestamp ?></span>
                                                            </div>
                                                            <a class="" href="javascript:;" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; margin-left: 10px">
                                                                <img src="<?php echo base_url(); ?>/assets/img/users/<?= $message->foto_user ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                                            </a>
                                                        </li>
                                                    <?php else: ?>
                                                        <!-- Pesan dari aktor lain (misalnya, teknisi) -->
                                                        <li class="media" id="<?= $message->id ?>">
                                                            <a class="" href="javascript:;" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; margin-right: 8px">
                                                                <img src="<?php echo base_url(); ?>/assets/img/users/<?= $message->foto_user ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading"><?= $message->nama ?></h6>
                                                                <span><?= $message->message ?></span> <br>
                                                                <span class="badge badge-default m-b-5" style="font-size:8px"><?= $message->timestamp ?></span>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>


                                        </div>


                                        <form action="<?php echo site_url('/KelolaPesan/kirimPesan'); ?>" method="POST" >
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="sesi_pesan" value="<?= $sesi_pesan ?>" hidden>
                                                <input class="form-control" type="text" name="kategori_id" value="<?= $kategori_id?>" hidden>
                                                <input class="form-control" type="text" name="sender_id" value="<?php echo $this->session->userdata('user_id'); ?>" hidden>
                                                <input class="form-control" type="text" name="receiver_id" 
                                                value="<?php if ($message->receiver_id === NULL): ?>
                                                    NULL
                                                <?php else: ?>
                                                    <?= $message->receiver_id ?>
                                                <?php endif; ?> "
                                            
                                                hidden>


                                                <textarea class="form-control" type="text" placeholder="Pesan Anda" name="message"> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Kirim Pesan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>