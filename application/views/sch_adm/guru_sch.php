<?php if($_SESSION['status']=="Operator"){?> 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $judul?>
                    <small><ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="<?php echo site_url('cberanda')?>"><i class="material-icons"></i> Home</a></li>
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
                        confirmButtonText: "Ya, Hapus User!",
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
                                    <a href="<?php echo base_url();?>index.php/admin/guru/tambah">
                                        <button type="button" class="btn bg-indigo btn-xs waves-effect"><i class="material-icons">add</i></button>
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
  <th>Nama</th>
  <th>TTL</th>
  <th>JK</th>
  <th>Mapel</th>
  <th>Pendidikan</th>
  <th>Status Guru</th>
  <th>Sekolah</th>
  <th>Aksi</th>
</tr>
</thead>
<?php $no = 0;
if( ! empty($tabel)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($tabel as $data){
  
    echo "<tr>";
    echo "<td>".++$no."</td>";
    echo "<td>".$data->nama."</td>";
    echo "<td>".$data->tanggal_lahir."</td>";
    echo "<td>".$data->jk."</td>";
    echo "<td>".$data->mapel."</td>";
    echo "<td>".$data->pendidikan."</td>";
    echo "<td>".$data->status_guru."</td>";
    echo "<td>".$data->nama_sekolah."</td>";

    echo "<td><a href='".site_url("admin/guru/edit_guru/".$data->id_guru)."'> "
    ."<button type='submit' class='btn bg-cyan btn-xs waves-effect' data-type='confirm'><i class='material-icons'>edit</i></button>"
    ."</a> 
    <a class='hapus-link' href='".site_url("admin/guru/delete/".$data->id_guru)."'> "
    ."<button onclick='return confirm('Yakin data ".$data->nama." ingin di hapus??')' type='submit' class='btn btn-danger btn-xs waves-effect' data-type='confirm'><i class='material-icons'>delete</i></button>"
    ."</a>";
    // echo "</tr>";

    // echo "<td align='center'> <a href='javascript:;'data-id=".$data->username." data-npsn=".$data->nama_lengkap." data-namasekolah=".$data->stts." data-pd=".$data->email." data-rombel=".$data->alamat."
    //    data-toggle='modal' data-target='#edit-data'
    //    class='btn bg-cyan btn-xs waves-effect' data-toggle='modal' ><i class='material-icons'>edit</i></a>
    //    <a class='hapus-link' href='#'> 
    //    <button type='submit' class='btn btn-danger btn-xs waves-effect' data-type='confirm'><i class='material-icons'>delete</i></button>
    // </a>";


    //  echo "<td><a class='btn bg-cyan btn-xs waves-effect' href='".site_url("halaman/edit_user/".$data->id)."'> "
    // ."<button type='submit' class='btn bg-cyan btn-xs waves-effect' data-type='confirm'><i class='material-icons'>edit</i></button>"
    // ."</a>";
    // echo "<td><a class='btn btn-danger btn-xs waves-effect  ' href='".site_url("halaman/delete_user/".$data->id)."'> "
    // ."<button type='submit' class='btn btn-danger btn-xs waves-effect' data-type='confirm'><i class='material-icons'>delete</i></button>"
    // ."</a>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>
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
                            <h4 align="center" class="modal-title" id="defaultModalLabel">Tambah Data User</h4>
                        </div>

                        
                        <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
                        <?php  //echo form_open("halaman/tambah", array('enctype'=>'multipart/form-data')); ?>
                        <div class="modal-body">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('halaman/tambah');?>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <input type="text" id="username" name="username" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Status</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="stts" type="radio" value="admin" class="with-gap" id="radio_1" checked  />
                                                <label for="radio_1">Admin</label>
                                                <input name="stts" type="radio" value="member" class="with-gap" id="radio_2"  />
                                                <label for="radio_2">Member</label>
                                                <input name="stts" type="radio" value="pegawai" class="with-gap" id="radio_3"  />
                                                <label for="radio_3">Pegawai</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Email</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <input type="email" id="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Alamat</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <textarea type="text" id="alamat" name="alamat" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">gambar</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="input_gambar" name="input_gambar" >
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="text" class="form-control" id="namasekolah" name="namasekolah" placeholder="Tuliskan Nama"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                            <button type="submit" name="submit" value="Simpan" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>

                        <!-- <table cellpadding="8">
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>"></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td><input type="file" name="input_gambar"></td>
                            </tr>
                        </table> -->
                        <!-- <hr> -->
                        <!-- <input type="submit" name="submit" value="Simpan"> -->
                        <!-- <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a> -->
                        <?php echo form_close(); ?>
                        <!-- </div> -->
                       <!--  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- <div class="modal fade" id="edit-data" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 align="center" class="modal-title" id="defaultModalLabel">Tambah Data User</h4>
                        </div>

                        
                        <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
                        <?php echo form_open("halaman/tambah", array('enctype'=>'multipart/form-data')); ?>
                        <div class="modal-body">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="text" id="nama_lengkap" name="username" value="<?php echo set_value('username'); ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                               <!--  <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div> --> 
<!--                                 <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Status</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="stts" type="radio" value="admin" class="with-gap" id="radio_1" checked <?php echo set_radio('admin', 'member', 'pegawai');?> />
                                                <label for="radio_1">Admin</label>
                                                <input name="stts" type="radio" value="member" class="with-gap" id="radio_2" <?php echo set_radio('admin', 'member', 'pegawai');?> />
                                                <label for="radio_2">Member</label>
                                                <input name="stts" type="radio" value="pegawai" class="with-gap" id="radio_3" <?php echo set_radio('admin', 'member', 'pegawai');?> />
                                                <label for="radio_3">Pegawai</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
 -->


                                
<!--                                 <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Email</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line"> -->
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="npsn">Alamat</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line"> -->
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <textarea type="text" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">gambar</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="input_gambar" name="input_gambar" > -->
                                                <!-- <input type="hidden" id="id" name="id"> -->
                                                <!-- <input type="text" class="form-control" id="namasekolah" name="namasekolah" placeholder="Tuliskan Nama"> -->
                                            <!-- </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="modal-footer">
                            <button type="submit" name="submit" value="Simpan" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div> -->

                        <!-- <table cellpadding="8">
                            <tr>
                                <td>Deskripsi</td>
                                <td><input type="text" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>"></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td><input type="file" name="input_gambar"></td>
                            </tr>
                        </table> -->
                        <!-- <hr> -->
                        <!-- <input type="submit" name="submit" value="Simpan"> -->
                        <!-- <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a> -->
                        <?php echo form_close(); ?>
                        <!-- </div> -->
                       <!--  <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div> -->
                   <!--  </div>
                </div>
            </div>  -->
            
            <script>
                                $(document).ready(function () {
                                    // Untuk sunting
                                    $('#edit-data').on('show.bs.modal', function (event) {
                                        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                                        var modal = $(this)

                                        // Isi nilai pada field
                                        modal.find('#id').attr("value", div.data('id'));
                                        modal.find('#username').attr("value", div.data('username'));
                                        modal.find('#namalengkap').attr("value", div.data('nama_lengkap'));
                                        modal.find('#stts').html(div.data('stts'));
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

    <?php } 
else{
     redirect("login");
}
    ?>