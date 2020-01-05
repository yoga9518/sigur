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
                        <div class="body">
                            <div class="body">
                                <?php foreach ($data as $d) { 
                                    $a = $d->status;
                                    // echo $d->stts;
                                ?>
                            <!-- <form id="form_advanced_validation" action="<?php echo base_url();?>index.php/halaman/updateuser" method="POST" novalidate="novalidate"> -->
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart(current_url('admin/user'));?>
                            <label for="email_address">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('username', $d->username)?>" id="username" name="username" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Nama Lengkap</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('nama_lengkap', $d->nama_lengkap)?>" id="nama_lengkap" name="nama_lengkap" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Status</label>
                                <div class="form-group">
                                    <select name="status" id="status" value="" class="form-control show-tick">
                                        <option name="status" id="status" value="">-- Pilih Status --</option>
                                        <?php foreach($status as $st){?>
                                            <?php 
                                            // $idgroup = $dt['GroupID'];
                                            if ($st['status'] == $a) {
                                                echo "<option value='".$st['status']."' selected>".$st['status']."</option>";
                                            }else{
                                                echo "<option value='".$st['status']."'>".$st['status']."</option>";
                                            }
                                            ?>
                                            <!-- <option value="<?php //echo $dt['GroupID'];?>" selected><?php //echo $dt['NameGroup']; //echo var_dump($dt); ?></option>-->
                                            <?php  }?>
                                        <!-- <option value="20">Operator</option>
                                        <option value="30">Umum</option> -->
                                    </select>
                                </div>
                                <!-- <label for="email_address">Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="group1" type="radio" class="with-gap" id="radio_1" checked />
                                        <label for="radio_1">Admin</label>
                                        <input name="group1" type="radio" class="with-gap" id="radio_2" />
                                        <label for="radio_2">member</label>
                                        <input name="group1" type="radio" class="with-gap" id="radio_3" />
                                        <label for="radio_3">Pegawai</label>
                                    </div>
                                </div> -->
                                <label for="email_address">Alamat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" id="alamat" name="alamat" class="form-control"><?php echo set_value('alamat', $d->alamat)?></textarea>
                                    </div>
                                </div>
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" value="<?php echo set_value('email', $d->email)?>" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Gambar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="<?php echo base_url()?>gambar/<?php echo $d->nama_file ?>" width="100" alt="" name="gambar">
                                        <input type="file" id="gambar" name="gambar" class="form-control">
                                    </div>
                                </div>

                                <br><br>

                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
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