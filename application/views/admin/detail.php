 <?php if ($_SESSION['status'] == "Admin") { ?>
     <link rel="stylesheet" type="text/css" href="">
     <section class="content">
         <div class="container-fluid">
             <div class="block-header">
                 <h2>
                     Data Sekolah
                     <small>
                         <ol class="breadcrumb breadcrumb-col-pink">
                             <li><a href="<?php echo site_url('cberanda') ?>"><i class="material-icons"></i> Home</a></li>
                             <li class="active"><i class="material-icons">library_books</i> <?php echo $judul ?></li>
                         </ol>
                     </small>
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
                                 </li>
                             </ul>
                         </div>

                         <div class="body">
                             <?php echo validation_errors(); ?>
                             <?php echo form_open_multipart(current_url()); ?>
                             <label for="email_address">NIP</label>
                             <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?php echo set_value('NIP', $dat->nip) ?>" id="nip" name="nip" class="form-control" disabled>
                                 </div>
                             </div>
                             <label for="email_address">Nama Guru</label>
                             <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?php echo set_value('nama_guru', $dat->nama_guru) ?>" id="nama_guru" name="nama_guru" class="form-control" disabled>
                                 </div>
                             </div>
                             <label for="email_address">Asal Sekolah</label>
                             <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?php echo set_value('asal_sekolah', $dat->asal_sekolah) ?>" id="asal_sekolah" name="asal_sekolah" class="form-control">
                                 </div>
                             </div>
                             <label for="email_address">Tujuan Sekolah</label>
                             <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?php echo set_value('tujuan_sekolah', $dat->tujuan_sekolah) ?>" id="tujuan_sekolah" name="tujuan_sekolah" class="form-control">
                                 </div>
                             </div>
                             <label for="email_address">Mapel</label>
                             <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" value="<?php echo set_value('mapel', $dat->mapel) ?>" id="mapel" name="mapel" class="form-control">
                                 </div>
                             </div>

                             <button class="btn btn-primary waves-effect" type="submit">Update</button>
                             <a class="btn btn-default waves-effect" href="<?php echo base_url() ?>index.php/admin/permohonan">Kembali</a>
                             <?php echo form_close(); ?>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- #END# Example -->
         </div>
     </section>
 <?php } else {
        redirect("login");
    }