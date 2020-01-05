 <?php if($_SESSION['status']=="Admin"){?> 
 <link rel="stylesheet" type="text/css" href="">
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
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $judul ?>
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
                        <?php foreach ($data as $d) { 
                                    // echo $d->stts;
                                ?>
                        <div class="body">
                            <div class="body">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open_multipart(current_url());?>
                                <label for="email_address">NPSN</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('npsn', $d->npsn)?>" id="npsn" name="npsn" class="form-control" disabled>
                                    </div>
                                </div>
                                <label for="email_address">Nama Sekolah</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('namasekolah', $d->nama_sekolah)?>" id="namasekolah" name="namasekolah" class="form-control" disabled>
                                    </div>
                                </div>
                                <label for="email_address">Ruang Kelas</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('ruangkelas', $d->r_kelas)?>" id="ruangkelas" name="r_kelas" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Ruang Perpustakaan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('ruangperpus', $d->r_perpus)?>" id="ruangperpus" name="r_perpus" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Ruang Laboratorium</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('ruanglab', $d->r_lab)?>" id="ruanglab" name="r_lab" class="form-control">
                                    </div>
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                                <a class="btn btn-default waves-effect" href="<?php echo base_url()?>index.php/admin/sekolah">Kembali</a>
                            <?php echo form_close();?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example -->
        </div>
    </section>
<?php } ?>
    <?php } 
else{
     redirect("login");
}
    ?>