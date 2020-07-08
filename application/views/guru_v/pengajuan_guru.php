 <!-- <?php if($_SESSION['status']=="Guru"){?>  -->
 <link rel="stylesheet" type="text/css" href="">
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PENGAJUAN
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
                                PENGAJUAN PERMOHONAN GURU
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

                        <!-- <?php echo var_dump($data); ?> -->
                        <div class="body">
                            <div class="body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('admin/guru/tambah');?>
                                <label for="email_address">NIP</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="number" name="nip" class="form-control" placeholder="NIP"> -->
                                        <input type="number" name="nip" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" disabled>
                                    </div>
                                </div>
                                <label for="email_address">Nama Lengkap</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" disabled>
                                    </div>
                                </div>
                                <label for="email_address">Asal Sekolah</label>
                                <div class="form-group">
                                    <select name="npsn" id="npsn" value="" class="form-control show-tick">
                                        <option name="npsn" id="npsn" value="">-- Sekolah Asal --</option>
                                        <?php foreach($sekolah as $st){?>
                                        <option value="<?php echo $st['npsn']?>"><?php echo $st['nama_sekolah'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <label for="email_address">Tujuan Sekolah</label>
                                <div class="form-group">
                                    <select name="npsn" id="npsn" value="" class="form-control show-tick">
                                        <option name="npsn" id="npsn" value="">-- Sekolah Tujuan --</option>
                                        <?php foreach($sekolah as $st){?>
                                        <option value="<?php echo $st['npsn']?>"><?php echo $st['nama_sekolah'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <label for="email_address">Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" name="nama" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Submit</button>
                            <?php echo form_close();?>
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
     // redirect("login");
}
    ?>