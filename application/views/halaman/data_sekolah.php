
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

            <?php echo $this->session->flashdata('pesan'); ?>
            <script type="text/javascript">
            function showSuccessMessage() {
                swal("Good job!", "You clicked the button!", "success");
            }
           </script>

<script>
        jQuery(document).ready(function($){
            $('.hapus-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "Apakah Anda Yakin?",
                        text: "Kamu tidak dapat mengembalikan file yang sudah hilang!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Hapus sekolah!",
                        closeOnConfirm: false,
                        },function(){
                            window.location.href = getLink
                    });
                return false;
            });
        });
    </script>
            
        
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $judul?> 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a>
                                        <button data-toggle="modal" data-target="#add-data"  type="button" class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">add</i></button>
                                    </a>
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
                                            <td align="center"><!-- <a href="<?php echo base_url()."index.php/halaman/edit_sekolah/".$dt['id']; ?>" class="btn bg-blue waves-effect"><i class="material-icons">edit</i></a> -->
                                                <a  
                                                href="javascript:;"
                                                    data-id="<?php echo $dt['id'] ?>"
                                                    data-npsn="<?php echo $dt['npsn'] ?>"
                                                    data-namasekolah="<?php echo $dt['nama_sekolah'] ?>"
                                                    data-pd="<?php echo $dt['pd'] ?>"
                                                    data-rombel="<?php echo $dt['rombel'] ?>"
                                                    data-rkelas="<?php echo $dt['r_kelas'] ?>"
                                                    data-guru="<?php echo $dt['guru'] ?>"
                                                    data-pegawai="<?php echo $dt['pegawai'] ?>"
                                                    data-toggle="modal" data-target="#edit-data"
                                                 class="btn bg-cyan btn-xs waves-effect" data-toggle="modal" ><i class="material-icons">edit</i></a>
                                                 <a class="hapus-link" href="<?php echo base_url() . "index.php/halaman/hapussekolah/" . $dt['id']; ?>"> 
                                                    <button type="submit" class="btn btn-danger btn-xs waves-effect" data-type="confirm"><i class="material-icons">delete</i></button>
                                                </a>

                                               

                                                
                                               <!--  <a class="row clearfix js-sweetalert">
                                                    <button class="btn btn-danger btn-xs waves-effect" type="button" data-type="confirm"><i class="material-icons">delete</i></button>
                                                </a> -->
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
            <div class="modal fade" id="add-data" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 align="center" class="modal-title" id="defaultModalLabel">Tambah Data sekolah</h4>
                        </div>
                        
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo base_url('index.php/halaman/tambahsekolah')?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">NPSN</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="npsn" name="npsn" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Sekolah</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="namasekolah" name="namasekolah" >
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="text" class="form-control" id="namasekolah" name="namasekolah" placeholder="Tuliskan Nama"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label>Peserta Didik</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="pd" name="pd" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label>Ruang Kelas</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="rkelas" name="rkelas" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Rombel</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="rombel" name="rombel" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label>Guru</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="guru" name="guru" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Pegawai</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="pegawai" name="pegawai" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect" data-type="confirm">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                            </form>
                        </div>
                       <!--  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit-data" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit Data sekolah</h4>
                        </div>
                        
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo base_url('index.php/halaman/dieditsekolah')?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">NPSN</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="hidden" id="id" name="id">
                                                <input type="number" id="npsn" name="npsn" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Sekolah</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="namasekolah" name="namasekolah" >
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="text" class="form-control" id="namasekolah" name="namasekolah" placeholder="Tuliskan Nama"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Peserta Didik</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pd" name="pd" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Ruang Kelas</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="rkelas" name="rkelas" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Rombel</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="rombel" name="rombel" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Guru</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="guru" name="guru" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Pegawai</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pegawai" name="pegawai" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                            </form>
                        </div>
                       <!--  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div> -->
                    </div>
                </div>
            </div>
            
            <script>
                                $(document).ready(function () {
                                    // Untuk sunting
                                    $('#edit-data').on('show.bs.modal', function (event) {
                                        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                                        var modal = $(this)

                                        // Isi nilai pada field
                                        modal.find('#id').attr("value", div.data('id'));
                                        modal.find('#npsn').attr("value", div.data('npsn'));
                                        modal.find('#namasekolah').attr("value", div.data('namasekolah'));
                                        modal.find('#pd').attr("value", div.data('pd'));
                                        modal.find('#rombel').attr("value", div.data('rombel'));
                                        modal.find('#rkelas').attr("value", div.data('rkelas'));
                                        modal.find('#guru').attr("value", div.data('guru'));
                                        modal.find('#pegawai').attr("value", div.data('pegawai'));
                                        
                                    });
                                });
                    </script>
    
            <!-- #END# Example -->
        </div>
    </section>
    