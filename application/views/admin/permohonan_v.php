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
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                        	<th>NIP</th>
                                        	<th>Nama Guru</th>
                                        	<th>Asal Sekolah</th>
                                        	<th>Tujuan Sekolah</th>
                                        	<th>Mapel</th>
                                        	<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 0;
                                    if( ! empty($tabel)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                    	foreach($tabel as $data){
                                            // echo var_dump($data);
    										echo "<tr>";
    										echo "<td>".++$no."</td>";
    										echo "<td>".$data->nip."</td>";
    										echo "<td>".$data->nama_guru."</td>";
    										echo "<td>".$data->asal_sekolah."</td>";
    										echo "<td>".$data->tujuan_sekolah."</td>";
    										echo "<td>".$data->mapel."</td>";

    										echo "<td><a href='".site_url("admin/fasilitas/edit/".$data->nip)."'> "
    										."<button type='submit' class='btn bg-cyan btn-xs waves-effect' data-type='confirm'><i class='material-icons'>edit</i></button>"
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