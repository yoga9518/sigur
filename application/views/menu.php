<div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if($act==1){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/beranda">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li <?php if($act==3){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/peta">
                            <i class="material-icons">map</i>
                            <span>Peta</span>
                        </a>
                    </li>
                    <li <?php if($act==5){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/guru">
                            <i class="material-icons">person_pin</i>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li <?php if($act==2){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/sekolah">
                            <i class="material-icons">school</i>
                            <span>Data Sekolah</span>
                        </a>
                    </li>
                    <li <?php if($act==6){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/fasilitas">
                            <i class="material-icons">location_city</i>
                            <span>Fasilitas</span>
                        </a>
                    </li>
                    <li <?php if($act==4){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/admin/user">
                            <i class="material-icons">contacts</i>
                            <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/auth/logout">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>