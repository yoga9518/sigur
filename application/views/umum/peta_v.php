<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/leaflet.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/leaflet/leaflet-search.css" />
    <link rel="icon" href="<?php echo base_url();?>assets/umum/img/logoo.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/slick.css">
    <!-- style CSS -->


    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/css/themes/all-themes.css" rel="stylesheet" />






    <link rel="stylesheet" href="<?php echo base_url();?>assets/umum/css/style.css">
    <script src="<?php echo base_url();?>assets/leaflet.js" ></script>
    <script src="<?php echo base_url();?>assets/leaflet/leaflet-search.js" ></script>
    <style>
    .custom .leaflet-popup-tip,
    .custom .leaflet-popup-content-content {
        width: 300px;
    }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="<?php echo base_url();?>assets/umum/img/logo-1.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo base_url();?>index.php/umum/umum">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>index.php/umum/profil">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>index.php/umum/peta">Peta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>index.php/umum/kontak">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
    <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
                        var map;
                        var markersLayer = new L.LayerGroup();  //layer contain searched elements
                        // map.addLayer(markersLayer);
                        var controlSearch = new L.Control.Search({
                            position:'topleft',     
                            layer: markersLayer,
                            initial: false,
                            zoom: 16,
                            marker: false,
                        });
                        // map.addControl( controlSearch );
                        var google = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}'),
                            osm    = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png');
                            var cities = L.layerGroup();
                        var map = new L.Map('map', {
                            center: [0.5129, 101.4567],
                            zoom: 12,
                            layers: [osm, cities]
                        });
                        // var map = new L.Map('map').setView([0.5129, 101.4567], 12);  //set center from first location
                        // map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));  //base layer
                        map.addLayer(markersLayer);
                        map.addControl( controlSearch );

                        var baseMaps = {
                            "Google Maps": google,
                            "Open Street Maps": osm
                        };
                        var overlayMaps = {
                            "Cities": cities
                        };
                        L.control.layers(baseMaps, overlayMaps).addTo(map);

                        var data        = <?php echo json_encode($marker);?>;
                        var base_url    = "<?php echo base_url('assets/images/');?>";
                        var gambar      = "<?php echo base_url('gambar/') ;?>";
                        var redIcon     = L.icon({
                            iconUrl: base_url + "marker-red-2x.png",
                            iconSize: [25, 41]
                            });
                        var blueIcon = L.icon({iconUrl: base_url + "marker-icon.png"});
                        // populate map with markers from sample data
                        for(i in data) {
                            var title       = data[i].npsn, //value searched
                                lat         = data[i].lat,      //position found
                                long        = data[i].long, //position found
                                nm_sekolah  = data[i].nama_sekolah,
                                alamat      = data[i].alamat,
                                nama        = data[i].nama,
                                mapel       = data[i].mapel,
                                nm_guru     = data[i].nama,
                                sertifikasi = data[i].Sertifikasi,
                                sts_guru    = data[i].status_guru,
                                labor       = data[i].r_lab,
                                kelas       = data[i].r_kelas,
                                perpus      = data[i].r_perpus;
                                nama_file   = data[i].nama_file;
                                if (mapel == "MUATAN LOKAL") {
                                    var marker = new L.Marker(new L.latLng(lat, long), {title: nm_sekolah, icon: blueIcon} );
                                }else if (mapel == "PJOK") {
                                    var marker = new L.Marker(new L.latLng(lat, long), {title: nm_sekolah, icon: blueIcon} );
                                }else if (mapel == "PENDIDIKAN AGAMA ISLAM") {
                                    var marker = new L.Marker(new L.latLng(lat, long), {title: nm_sekolah, icon: blueIcon} );
                                }else{
                                    var marker = new L.Marker(new L.latLng(lat, long), {title: nm_sekolah, icon: redIcon} );//see property searched
                                }
                            var customPopup = "<div class='body'>\
                            <ul class='nav nav-tabs tab-nav-right' role='tablist'>\
                            <li role='presentation' class='active'><a href='#home' data-toggle='tab' aria-expanded='true'>Sekolah</a></li>\
                            <li role='presentation' class=''><a href='#profile' data-toggle='tab' aria-expanded='false'>Guru</a></li>\
                            <li role='presentation' class=''><a href='#messages' data-toggle='tab' aria-expanded='false'>Fasilitas</a></li>\
                            </ul>\
                            <div class='tab-content'>\
                                <div role='tabpanel' class='tab-pane fade active in' id='home'>\
                                <table>\
                                    <tr>\
                                        <td><b>NPSN</b></td>\
                                        <td>: "+ title +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Sekolah</b></td>\
                                        <td> : "+nm_sekolah +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Alamat</b></td>\
                                        <td> : "+alamat +"</td>\
                                    </tr>\
                                </table>\
                                <div>\
                                    <img src='<?php echo base_url('gambar/') ;?>"+nama_file+"' width='100' name='gambar'>\
                                </div>\
                                </div>\
                                <div role='tabpanel' class='tab-pane fade ' id='profile'>\
                                <table>\
                                    <tr>\
                                        <td><b>Mapel</b></td>\
                                        <td>: "+ mapel +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Nama Guru</b></td>\
                                        <td> : "+nm_guru +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Sertifikasi</b></td>\
                                        <td> : "+sertifikasi +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Status Guru</b></td>\
                                        <td> : "+sts_guru +"</td>\
                                    </tr>\
                                </table>\
                                </div>\
                                <div role='tabpanel' class='tab-pane fade' id='messages'>\
                                <table>\
                                    <tr>\
                                        <td><b>Ruangan Lab</b></td>\
                                        <td>: "+ labor +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Ruangan Kelas</b></td>\
                                        <td>: "+ kelas +"</td>\
                                    </tr>\
                                    <tr>\
                                        <td><b>Ruangan Perpus</b></td>\
                                        <td>: "+ perpus +"</td>\
                                    </tr>\
                                </table>\
                                </div>\
                            </div>\
                        </div>";
                        var customOptions = {
                            'keepInView' : true,
                            'autoClose' : true,
                            'className' : 'custom'
                            }
                        marker.bindPopup(customPopup, customOptions);
                        markersLayer.addLayer(marker);
                        cities.addLayer(marker);
                        
                       
                        
                        
                    }
                    </script>
        </div>
      </div>
    </div>
  </section>
    <!-- banner part start-->
    <!-- <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Every child yearns to learn</h5>
                            <h1>Sistem Informasi Sebaran Tenaga Guru</h1>
                            <p>Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales
                                his void unto last session for bite. Set have great you'll male grass yielding yielding
                                man</p>
                            <a href="#" class="btn_1">View Course </a>
                            <a href="#" class="btn_2">Get Started </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- banner part start-->



    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url();?>assets/js/demo.js"></script>





    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo base_url();?>assets/umum/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo base_url();?>assets/umum/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url();?>assets/umum/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?php echo base_url();?>assets/umum/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url();?>assets/umum/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url();?>assets/umum/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?php echo base_url();?>assets/umum/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/umum/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url();?>assets/umum/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>assets/umum/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/umum/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url();?>assets/umum/js/custom.js"></script>



</body>

</html>