<?php if($_SESSION['status']=="Operator"){?> 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $judul?>
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
                        confirmButtonText: "Ya, Hapus User!",
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
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo base_url('gambar/'.$this->session->userdata('nama_file'));?>" width='150' height='150' alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $this->session->userdata('nama_lengkap');?></h3>
                                <p><?php echo $this->session->userdata('email');?></p>
                                <p><?php echo $this->session->userdata('alamat');?></p>
                                <p><?php echo $this->session->userdata('status');?></p>
                            </div>
                        </div>
                        <!-- <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Followers</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Following</span>
                                    <span>1.201</span>
                                </li>
                                <li>
                                    <span>Friends</span>
                                    <span>14.252</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                        </div> -->
                    </div>
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>DESKRIPSI SEKOLAH</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Alumni Sekolah
                                    </div>
                                    <div class="content">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Lokasi mengajar saat ini
                                    </div>
                                    <div class="content">
                                        Malibu, California
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Mata pelajaran
                                    </div>
                                    <div class="content">
                                        <span class="label bg-red">Penjas</span>
                                        <span class="label bg-teal">Agama Islam</span>
                                        <span class="label bg-blue">Muatan Lokal Armel</span>
                                        <span class="label bg-amber">Bahasa  Indonesia</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <!-- <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li> -->
                                    <!-- <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
 -->

                                <li role="presentation" class="active">
                                    <a href="#home_sch" data-toggle="tab">
                                        <i class="material-icons">home</i> HOME
                                    </a>
                                </li>
                                <!-- <li role="presentation">
                                    <a href="#change_password_settings" data-toggle="tab">
                                        <i class="material-icons">face</i> PROFILE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">email</i> MESSAGES
                                    </a>
                                </li> -->
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> SETTINGS
                                    </a>
                                </li>



                                </ul>


                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in" id="home">
                                        <div class="body">
                     s
                                
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </div>
                                
                                
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Location
                                    </div>
                                    <div class="content">
                                        Malibu, California
                                    </div>
                               
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content">
                                        <span class="label bg-red">UI Design</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-amber">Node.js</span>
                                    </div>
                                
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                    </div>
                                </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in active" id="home_sch">
                                        <form class="form-horizontal">
                                            <div class="card-about-me">
                                                <div class="body">
                                                    <ul>
                                                        <li>
                                                            <div class="title">
                                                                <i class="material-icons">school</i>
                                                                Nama Sekolah
                                                            </div>
                                                            <div class="content">
                                                                <?php echo $this->session->userdata('username');?>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                            <i class="material-icons">perm_contact_calendar</i>
                                                            No Telepon
                                                        </div>
                                                        <div class="content">
                                                            <?php echo $this->session->userdata('alamat');?>
                                                        </div>
                                                        <li>
                                                            <div class="title">
                                                            <i class="material-icons">location_on</i>
                                                            Alamat
                                                        </div>
                                                        <div class="content">
                                                            <?php echo $this->session->userdata('alamat');?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            <i class="material-icons">library_add</i>
                                                            Fasilitas
                                                        </div>
                                                        <div class="content">
                                                            <span class="label bg-red">Ruang Kelas</span>
                                                            <span class="label bg-teal">Ruang Perpus</span>
                                                            <span class="label bg-blue">Ruang Laboratorium</span>
                                                            <!-- <span class="label bg-amber">Bahasa  Indonesia</span> -->
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            <i class="material-icons">notes</i>
                                                            Keterangan
                                                        </div>
                                                        <div class="content">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                            <!-- <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">NPSN</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="username" placeholder="<?php echo $this->session->userdata('username');?>" value="<?php echo $this->session->userdata('username');?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama Sekolah</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="<?php echo $this->session->userdata('nama_lengkap');?>" value="<?php echo $this->session->userdata('nama_lengkap');?>" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="<?php echo $this->session->userdata('email');?>" value="<?php echo $this->session->userdata('email');?>" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Alamat</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="alamat" rows="3" disabled placeholder="<?php echo $this->session->userdata('alamat');?>"><?php echo $this->session->userdata('alamat');?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Status</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="status" placeholder="<?php echo $this->session->userdata('status');?>" value="<?php echo $this->session->userdata('status');?>">
                                                    </div>
                                                </div>
                                            </div> -->

                                            <!--<div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div>-->
                                            <!-- <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="settings_with_icon_title">
                                        <form class="form-horizontal">
                                            


                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">NPSN</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="username" placeholder="<?php echo $this->session->userdata('username');?>" value="<?php echo $this->session->userdata('username');?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama Sekolah</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="<?php echo $this->session->userdata('nama_lengkap');?>" value="<?php echo $this->session->userdata('nama_lengkap');?>" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="<?php echo $this->session->userdata('email');?>" value="<?php echo $this->session->userdata('email');?>" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Alamat</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="alamat" rows="3" disabled placeholder="<?php echo $this->session->userdata('alamat');?>"><?php echo $this->session->userdata('alamat');?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Status</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="status" placeholder="<?php echo $this->session->userdata('status');?>" value="<?php echo $this->session->userdata('status');?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Latitute</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="status" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Longitute</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="status" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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