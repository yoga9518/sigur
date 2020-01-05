<!--<?php if($_SESSION['status']=="Admin"){?> -->
<div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('gambar/'.$this->session->userdata('nama_file'));?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username');?></div>
                    <div class="email"><?php echo $this->session->userdata('email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url();?>index.php/admin/profil"><i class="material-icons">person</i>Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <?php } 
else{
     // redirect("login");
}
    ?>