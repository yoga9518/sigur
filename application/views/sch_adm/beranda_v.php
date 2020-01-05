 <?php if($_SESSION['status']=="Operator"){?> 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
                <small><ol class="breadcrumb breadcrumb-col-pink">
                                <li><!--<a href="<?php echo base_url();?>index.php">--><i class="material-icons">home</i> Beranda</a></li>
                                <!--<li class="active"><i class="material-icons">library_books</i> <?php echo $judul ?></li>-->
                            </ol></small>
            </div>
            <?php 
            // echo var_dump($data);
            ?>
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">SEKOLAH DASAR</div>
                            <div class="number count-to" data-from="0" data-to="<?php $this->db->from('tbl_sekolah'); echo $this->db->count_all_results(); ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_pin</i>
                        </div>
                        <div class="content">
                            <div class="text">GURU</div>
                            <div class="number count-to" data-from="0" data-to="<?php $this->db->from('tbl_guru'); echo $this->db->count_all_results();?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_library</i>
                        </div>
                        <div class="content">
                            <div class="text">RUANGAN KELAS</div>
                            <div class="number count-to" data-from="0" data-to="<?php $this->db->from('tbl_sekolah'); echo $this->db->count_all_results();?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">FASILITAS</div>
                            <div class="number count-to" data-from="0" data-to="<?php $this->db->from('tbl_fasilitas'); echo $this->db->count_all_results();?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 align="center">SELAMAT DATANG DI SISTEM INFORMASI SEBARAN GURU</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">

                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
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