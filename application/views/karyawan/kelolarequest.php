<div class="content-wrapper">
   <!-- START PAGE CONTENT-->
   <div class="page-heading">
      <h1 class="page-title">Kelola Request</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="<?= base_url('karyawan/Home'); ?>"><i class="la la-home font-20"></i></a>
         </li>
      </ol>
   </div>
   <div class="page-content fade-in-up">
      <div class="ibox">
         <div class="ibox-head">
            <div class="ibox-title">Data Request</div>
            <a href="<?= base_url()?>index.php/Karyawan/KelolaRequest/tampilTambahRequest">
            <button class="btn btn-primary" type="submit">Buat Request</button>
            </a>
         </div>
         <div class="ibox">
            <?php if ($this->session->flashdata('success')): ?>
               <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
               <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
            <div class="ibox-body">
               <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                  <thead class="thead-default">
                     <tr>
                        <th class="text-center">ID Request</th>
                        <th class="text-center">Nama Perangkat</th>
                        <th class="text-center">Penanggung Jawab</th>
                        <th class="text-center">Departemen</th>
                        <th class="text-center">Tanggal Pelaporan</th>
                        <th class="text-center">Deskripsi Masalah</th>
                        <th class="text-center">Prioritas</th>
                        <th class="text-center">Gambar Kerusakan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tanggal Penyelesaian</th>
                        <th class="text-center">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($tickets as $ticket) : ?>
                        <tr class="text-center">
                           <td><?php echo $ticket->request_id; ?></td>
                           <td><?php echo $ticket->nama_perangkat; ?></td>
                           <td><?php echo $ticket->nama; ?></td>
                           <td><?php echo $ticket->nama_departemen ; ?></td>
                           <td><?php echo $ticket->tanggal_dibuat; ?></td>
                           <td><?php echo $ticket->deskripsi_permasalahan; ?></td>
                           <td><?php echo $ticket->prioritas; ?></td>
                           <td><img src="<?php echo base_url(); ?>/assets/img/request/<?php echo $ticket->foto?>" width="45px">
                           </td>
                           <td>
                              <?php if ($ticket->status == 'PENDING'): ?>
                                 <span class="badge badge-warning"><?php echo $ticket->status; ?></span>
                              <?php elseif ($ticket->status == 'FIXED'): ?>
                                 <span class="badge badge-success"><?php echo $ticket->status; ?></span>
                              <?php elseif ($ticket->status == 'RUNNING'): ?>
                                 <span class="badge badge-success"><?php echo $ticket->status; ?></span>
                              <?php else: ?>
                                 <span class="badge badge-danger"><?php echo $ticket->status; ?></span>
                              <?php endif; ?>
                           </td>
                           <td><?php echo !empty($ticket->tanggal_ditangani) ? $ticket->tanggal_ditangani : "Belum Selesai"; ?></td>

                           <td>
                              <div class="d-flex justify-content-center">
                                 <!-- Menggunakan flexbox untuk tata letak sejajar horizontal -->
                                 <a href="<?php echo base_url('index.php/Karyawan/KelolaRequest/setStatusToRunning/'.$ticket->request_id); ?>" class="mr-2">
                                       <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Running">
                                          <i class="fa-solid fa-check-to-slot font-14"></i>
                                       </button>
                                 </a>
                                 <a href="<?php echo base_url('index.php/Karyawan/KelolaRequest/tampilEditRequest/'.$ticket->request_id); ?>" class="mr-2">
                                       <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Edit">
                                          <i class="fa fa-pencil font-14"></i>
                                       </button>
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
   </div>
   <!-- END PAGE CONTENT-->
</div>