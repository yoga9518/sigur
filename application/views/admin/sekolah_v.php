<?php if($_SESSION['status']=="Admin"){?> 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Data Sekolah
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
                                    <a href="<?php echo base_url()?>index.php/admin/sekolah/tambah">
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
                                        	<th>Alamat</th>
                                        	<th>Lat</th>
                                        	<th>Long</th>
                                        	<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 0;
                                    if( ! empty($tabel)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                    	foreach($tabel as $data){
    										echo "<tr>";
    										echo "<td>".++$no."</td>";
    										echo "<td>".$data->npsn."</td>";
    										echo "<td>".$data->nama_sekolah."</td>";
    										echo "<td>".substr($data->alamat, 0, 15)."</td>";
    										echo "<td>".$data->lat."</td>";
    										echo "<td>".$data->long."</td>";

    										echo "<td><a href='".site_url("admin/sekolah/edit/".$data->id_sekolah)."'> "
    										."<button type='submit' class='btn bg-cyan btn-xs waves-effect' data-type='confirm'><i class='material-icons'>edit</i></button>"
    										."</a> 
    										<a class='hapus-link' href='".site_url("admin/sekolah/delete/".$data->id_sekolah)."'> "
    										."<button onclick='return confirm('Yakin data ingin di hapus??')' type='submit' class='btn btn-danger btn-xs waves-effect' data-type='confirm'><i class='material-icons'>delete</i></button>"
    										."</a>";
    										echo "</tr>";
    									}
    									}else{ // Jika data tidak ada
    										echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    									}?>
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
    <?php } 
else{
     redirect("login");
}
    ?>