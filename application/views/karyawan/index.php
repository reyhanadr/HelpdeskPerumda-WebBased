<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?php echo $jml_fixed?></h2>
                        <div class="m-b-5">TOTAL REQUEST FIXED</div><i
                            class="fa-solid fa-screwdriver-wrench widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?php echo $jml_pending?></h2>
                        <div class="m-b-5">TOTAL REQUEST PENDING</div><i
                            class="fa-solid fa-list-check widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?php echo $jml_notfixed?></h2>
                        <div class="m-b-5">TOTAL REQUEST NOT FIXED</div><i
                            class="fa-solid fa-circle-exclamation widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"><?php echo $jml_perangkat?></h2>
                        <div class="m-b-5">PERANGKAT YANG DIMILIKI</div><i
                            class="fa-solid fa-desktop widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">DAFTAR REQUEST</div>
                        <!-- <div>
                                    <a class="btn btn-info btn-sm" href="javascript:;">Buat Request</a>
                                </div> -->
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="tambah-request.html" class="dropdown-item">Buat Request</a>
                                <a href="kelola-request.html" class="dropdown-item">Lihat Semua Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Permasalahan</th>
                                    <th>Perangkat</th>
                                    <th>Status</th>
                                    <th width="91px">Tanggal Penyelesaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < min(5, count($tickets)); $i++) : ?>
                                    <?php $ticket = $tickets[$i]; ?>
                                    <tr>
                                        <td>
                                            <a href="invoice.html"><?php echo $ticket->request_id?></a>
                                        </td>
                                        <td><?php echo $ticket->deskripsi_permasalahan?></td>
                                        <td><?php echo $ticket->nama_perangkat?></td>
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
                                    </tr>
                                <?php endfor; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Daftar Perangkat</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">
                            <?php for ($i = 0; $i < min(4, count($perangkat)); $i++) : ?>
                                <?php $item = $perangkat[$i]; ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img src="<?php echo base_url(); ?>./assets/img/perangkat/<?php echo $item->foto?>" width="50px;" />
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"><?php echo $item->nama_perangkat?></a>
                                            <?php if ($item->status_perangkat == 'PENDING'): ?>
                                                <span class="font-16 float-right badge badge-warning"><?php echo $item->status_perangkat; ?></span>
                                            <?php elseif ($item->status_perangkat == 'FIXED'): ?>
                                                <span class="font-16 float-right badge badge-success"><?php echo $item->status_perangkat; ?></span>
                                            <?php elseif ($item->status_perangkat == 'RUNNING'): ?>
                                                <span class="font-16 float-right badge badge-success"><?php echo $item->status_perangkat; ?></span>
                                            <?php else: ?>
                                                <span class="font-16 float-right badge badge-danger"><?php echo $item->status_perangkat; ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="font-13"><?php echo $item->nama_kategori?></div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="ibox-footer text-center">
                        <a href="<?= base_url()?>index.php/Karyawan/KelolaPerangkat">Lihat Semua Perangkat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Visitors Statistics</div>
                    </div>
                    <div class="ibox-body">
                        <div id="world-map" style="height: 300px;"></div>
                        <table class="table table-striped m-t-20 visitors-table">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Visits</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/us.png" />USA
                                    </td>
                                    <td>755</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                style="width:52%; height:5px;" aria-valuenow="52" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">52%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/Canada.png" />Canada
                                    </td>
                                    <td>700</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                style="width:48%; height:5px;" aria-valuenow="48" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">48%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/India.png" />India
                                    </td>
                                    <td>410</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                style="width:37%; height:5px;" aria-valuenow="37" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">37%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/Australia.png" />Australia
                                    </td>
                                    <td>304</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                style="width:36%; height:5px;" aria-valuenow="36" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">36%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/Singapore.png" />Singapore
                                    </td>
                                    <td>203</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar" role="progressbar"
                                                style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">35%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/uk.png" />UK
                                    </td>
                                    <td>202</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                style="width:35%; height:5px;" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">35%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="m-r-10"
                                            src="<?php echo base_url(); ?>./assets/img/flags/UAE.png" />UAE
                                    </td>
                                    <td>180</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                style="width:30%; height:5px;" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <span class="progress-parcent">30%</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tasks</div>
                        <div>
                            <a class="btn btn-info btn-sm" href="javascript:;">New Task</a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <ul class="list-group list-group-divider list-group-full tasks-list">
                            <li class="list-group-item task-item">
                                <div>
                                    <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                        <input type="checkbox">
                                        <span class="input-span"></span>
                                        <span class="task-title">Meeting with Eliza</span>
                                    </label>
                                </div>
                                <div class="task-data"><small class="text-muted">10 July 2018</small></div>
                                <div class="task-actions">
                                    <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item task-item">
                                <div>
                                    <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                        <input type="checkbox" checked="">
                                        <span class="input-span"></span>
                                        <span class="task-title">Check your inbox</span>
                                    </label>
                                </div>
                                <div class="task-data"><small class="text-muted">22 May 2018</small></div>
                                <div class="task-actions">
                                    <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item task-item">
                                <div>
                                    <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                        <input type="checkbox">
                                        <span class="input-span"></span>
                                        <span class="task-title">Create Financial Report</span>
                                    </label>
                                    <span class="badge badge-danger m-l-5"><i class="ti-alarm-clock"></i> 1
                                        hrs</span>
                                </div>
                                <div class="task-data"><small class="text-muted">No due date</small></div>
                                <div class="task-actions">
                                    <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item task-item">
                                <div>
                                    <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                        <input type="checkbox" checked="">
                                        <span class="input-span"></span>
                                        <span class="task-title">Send message to Mick</span>
                                    </label>
                                </div>
                                <div class="task-data"><small class="text-muted">04 Apr 2018</small></div>
                                <div class="task-actions">
                                    <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item task-item">
                                <div>
                                    <label class="ui-checkbox ui-checkbox-gray ui-checkbox-success">
                                        <input type="checkbox">
                                        <span class="input-span"></span>
                                        <span class="task-title">Create new page</span>
                                    </label>
                                    <span class="badge badge-success m-l-5">2 Days</span>
                                </div>
                                <div class="task-data"><small class="text-muted">07 Dec 2018</small></div>
                                <div class="task-actions">
                                    <a href="javascript:;"><i class="fa fa-edit text-muted m-r-10"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash text-muted"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Messages</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="<?php echo base_url(); ?>./assets/img/users/u1.jpg"
                                        width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Jeanne Gonzalez <small
                                            class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="<?php echo base_url(); ?>./assets/img/users/u2.jpg"
                                        width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs
                                            ago</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="<?php echo base_url(); ?>./assets/img/users/u3.jpg"
                                        width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs
                                            ago</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="<?php echo base_url(); ?>./assets/img/users/u6.jpg"
                                        width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Connor Perez <small
                                            class="float-right text-muted">Today</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting.</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th width="91px">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2584</a>
                                    </td>
                                    <td>@Jack</td>
                                    <td>$564.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT2575</a>
                                    </td>
                                    <td>@Amalia</td>
                                    <td>$220.60</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT1204</a>
                                    </td>
                                    <td>@Emma</td>
                                    <td>$760.00</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT7578</a>
                                    </td>
                                    <td>@James</td>
                                    <td>$87.60</td>
                                    <td>
                                        <span class="badge badge-warning">Expired</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0158</a>
                                    </td>
                                    <td>@Ava</td>
                                    <td>$430.50</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="invoice.html">AT0127</a>
                                    </td>
                                    <td>@Noah</td>
                                    <td>$64.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Best Sellers</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="<?php echo base_url(); ?>./assets/img/image.jpg" width="50px;" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="javascript:;">Samsung</a>
                                        <span class="font-16 float-right">1200</span>
                                    </div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="<?php echo base_url(); ?>./assets/img/image.jpg" width="50px;" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="javascript:;">iPhone</a>
                                        <span class="font-16 float-right">1150</span>
                                    </div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="<?php echo base_url(); ?>./assets/img/image.jpg" width="50px;" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="javascript:;">iMac</a>
                                        <span class="font-16 float-right">800</span>
                                    </div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="<?php echo base_url(); ?>./assets/img/image.jpg" width="50px;" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="javascript:;">apple Watch</a>
                                        <span class="font-16 float-right">705</span>
                                    </div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ibox-footer text-center">
                        <a href="javascript:;">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    