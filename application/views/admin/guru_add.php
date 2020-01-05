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
                                TAMBAH DATA GURU
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
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart('admin/guru/tambah');?>
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <input type="number" name="nip" class="form-control" placeholder="NIP"> -->
                                        <input type="number" name="nip" class="form-control" placeholder="NIP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="gender" id="male" value="L" class="with-gap">
                                    <label for="male">Laki-Laki</label>

                                    <input type="radio" name="gender" id="female" value="P" class="with-gap">
                                    <label for="female" class="m-l-20">Perempuan</label>
                                </div>
                                <label for="email_address">Tanggal Lahir</label>
                                <div class="form-group">
                                	<div class="form-line" id="bs_datepicker_container">
                                		<input type="text" name="ttl" id="ttl" class="form-control" placeholder="Pilih Tanggal lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="mapel" id="mapel" value="" class="form-control show-tick">
                                        <option name="mapel" id="mapel" value="">-- Mata Pelajaran --</option>
                                        <?php foreach($mapel as $st){?>
                                        <option value="<?php echo $st['mapel']?>"><?php echo $st['mapel'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="pend" id="pend" value="" class="form-control show-tick">
                                        <option name="pend" id="pend" value="">-- Pendidikan --</option>
                                        <?php foreach($pend as $st){?>
                                        <option value="<?php echo $st['pendidikan']?>"><?php echo $st['pendidikan'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="stguru" id="stguru" value="" class="form-control show-tick">
                                        <option name="stguru" id="stguru" value="">-- Status Guru --</option>
                                        <?php foreach($stguru as $st){?>
                                        <option value="<?php echo $st['status_guru']?>"><?php echo $st['status_guru'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="npsn" id="npsn" value="" class="form-control show-tick">
                                        <option name="npsn" id="npsn" value="">-- Sekolah --</option>
                                        <?php foreach($sekolah as $st){?>
                                        <option value="<?php echo $st['npsn']?>"><?php echo $st['nama_sekolah'];?></option>
                                        <?php  }?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <select name="sekolah" id="sekolah" value="" class="form-control show-tick">
                                        <option name="sekolah" id="sekolah" value="">-- Asal Sekolah --</option>
                                        <?php foreach($sekolah as $st){?>
                                        <option value="<?php echo $st['nama_sekolah']?>"><?php echo $st['nama_sekolah'];?></option>
                                        <?php  }?>
                                    </select>
                                </div> -->
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
     redirect("login");
}
    ?>