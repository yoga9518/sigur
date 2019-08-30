 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Data Sekolah
                    <small><ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="<?php echo base_url();?>index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> <?php echo $judul ?></li>
                            </ol></small>
                </h2>
            </div>
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NPSN</th>
                                            <th>Nama Sekolah</th>
                                            <th>Peserta Didik</th>
                                            <th>Ruang Kelas</th>
                                            <th>Rombel</th>
                                            <th>Guru</th>
                                            <th>Pegawai</th>
                                            <th width="80">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($data as $dt) {
                                         ?>
                                        <tr>
                                            <td><?php echo ++$no; ?></td>
                                            <td><?php echo $dt['npsn']; ?></td>
                                            <td><?php echo $dt['nama_sekolah']; ?></td>
                                            <th><?php echo $dt['pd'];?></th>
                                            <td><?php echo $dt['rombel']; ?></td>
                                            <td><?php echo $dt['r_kelas'] ?></td>
                                            <td><?php echo $dt['guru']; ?></td>
                                            <td><?php echo $dt['pegawai']; ?></td>
                                            <td><a href="#" class="btn bg-blue waves-effect"><i class="material-icons">edit</i></a>
                                                <a  href="#" class="btn btn-danger waves-effect" ><i class="material-icons">delete</i></a>
                                                <!-- <button data-toggle="modal" data-target="#delete-data"  type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button> -->
                                                </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example -->
        </div>
    </section>