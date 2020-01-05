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
                                    $a = $d->mapel;
                                    $b = $d->pendidikan;
                                    $c = $d->status_guru;
                                    $e = $d->npsn;
                                    $jk = $d->jk;
                                    //echo var_dump($d);

                                    // echo $d->stts;
                                ?>
                            <!-- <form id="form_advanced_validation" action="<?php echo base_url();?>index.php/halaman/updateuser" method="POST" novalidate="novalidate"> -->
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart(current_url());?>
                            <label for="email_address">NIP</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo set_value('nip', $d->nip)?>" id="nip" name="nip" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">npsn</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="hidden" name="npsn" value="<?php echo $d->npsn?>"> -->
                                        <!-- <input type="hidden" value="<?php echo set_value('npsn', $d->npsn)?>" id="npsn" name="npsn" class="form-control"> -->
                                        <input type="text" value="<?php echo set_value('npsn', $d->npsn)?>" id="npsn" name="npsn" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="hidden" name="npsn" value="<?php echo $d->npsn?>"> -->
                                        <!-- <input type="hidden" value="<?php echo set_value('npsn', $d->npsn)?>" id="npsn" name="npsn" class="form-control"> -->
                                        <input type="text" value="<?php echo set_value('nama', $d->nama)?>" id="nama" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" id="male" name="gender" <?php if($jk == 'L'){ echo 'checked';} ?> value="L" class="with-gap">
                                    <label for="male">Laki-Laki</label>

                                    <input type="radio" id="female" name="gender" <?php if($jk == 'P'){ echo 'checked';} ?> value="P" class="with-gap">
                                    <label for="female" class="m-l-20">Perempuan</label>
                                </div>
                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" value="<?php echo set_value('tanggal_lahir', $d->tanggal_lahir)?>" name="ttl" id="ttl" class="form-control" placeholder="Pilih Tanggal lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="mapel" id="mapel" value="" class="form-control show-tick">
                                        <option name="mapel" id="mapel" value="">-- Mapel --</option>
                                        <?php foreach($mapel as $st){?>
                                            <?php 
                                            if ($st['mapel'] == $a) {
                                                echo "<option value='".$st['mapel']."' selected>".$st['mapel']."</option>";
                                            }else{
                                                echo "<option value='".$st['mapel']."'>".$st['mapel']."</option>";
                                            }?>
                                            <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="pend" id="pend" value="" class="form-control show-tick">
                                        <option name="pend" id="pend" value="">-- Mapel --</option>
                                        <?php foreach($pend as $st){?>
                                            <?php 
                                            if ($st['pendidikan'] == $b) {
                                                echo "<option value='".$st['pendidikan']."' selected>".$st['pendidikan']."</option>";
                                            }else{
                                                echo "<option value='".$st['pendidikan']."'>".$st['pendidikan']."</option>";
                                            }?>
                                            <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="stguru" id="stguru" value="" class="form-control show-tick">
                                        <option name="stguru" id="stguru" value="">-- Status Guru --</option>
                                        <?php foreach($stguru as $st){?>
                                            <?php 
                                            if ($st['status_guru'] == $c) {
                                                echo "<option value='".$st['status_guru']."' selected>".$st['status_guru']."</option>";
                                            }else{
                                                echo "<option value='".$st['status_guru']."'>".$st['status_guru']."</option>";
                                            }?>
                                            <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="npsn" id="npsn" value="" class="form-control show-tick">
                                        <option name="npsn" id="npsn" value="">-- Asal Sekolah --</option>
                                        <?php foreach($sekolah as $st){?>
                                            <?php 
                                            if ($st['npsn'] == $e) {
                                                echo "<option value='".$st['npsn']."' selected>".$st['nama_sekolah']."</option>";
                                            }else{
                                                echo "<option value='".$st['npsn']."'>".$st['nama_sekolah']."</option>";
                                            }?>
                                            <?php  }?>
                                    </select>
                                </div>
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