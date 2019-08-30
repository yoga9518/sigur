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
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
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
                                <?php foreach ($hasil as $d) { 

                                $a = $d->id;
                                // $s = $d->Number;

                                //echo var_dump($d);
                            
                                ?>
                            <form id="form_advanced_validation" action="<?php echo base_url();?>index.php/halaman/dieditsekolah" method="POST" novalidate="novalidate">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->npsn ?>" class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">NPSN</label>
                                    </div>
                                    <div class="help-info">NPSN</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" id="id" name="id" value="<?php echo $d->id; ?>">
                                        <input type="text" value="<?php echo $d->nama_sekolah ?>" id="nama_sekolah" name="nama_sekolah" class="form-control" name="minmaxvalue" min="10" max="200" required="" aria-required="true">
                                        <label class="form-label">Nama Sekolah</label>
                                    </div>
                                    <div class="help-info">Min. Value: 10, Max. Value: 200</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->pd ?>" id="pd" name="pd"class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">Peserta Didik</label>
                                    </div>
                                    <div class="help-info">Peserta Didik</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->r_kelas ?>" id="r_kelas" name="r_kelas" class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">Ruang Kelas</label>
                                    </div>
                                    <div class="help-info">Numbers only</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->rombel ?>" id="rombel" name="rombel" class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">Rombel</label>
                                    </div>
                                    <div class="help-info">Robmel</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->guru ?>" id="guru" name="guru" class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">Guru</label>
                                    </div>
                                    <div class="help-info">Numbers only</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" value="<?php echo $d->pegawai ?>" id="pegawai" name="pegawai" class="form-control" name="number" required="" aria-required="true">
                                        <label class="form-label">Pegawai</label>
                                    </div>
                                    <div class="help-info">Numbers only</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="creditcard" pattern="[0-9]{13,16}" required="" aria-required="true">
                                        <label class="form-label">Credit Card</label>
                                    </div>
                                    <div class="help-info">Ex: 1234-5678-9012-3456</div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Update</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example -->
        </div>
    </section>
    <?php } ?>