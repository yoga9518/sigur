 <?php if($_SESSION['status']=="Admin"){?> 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PETA SEBARAN GURU
                    <small><ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="<?php echo site_url('cberanda')?>"><i class="material-icons"></i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> <?php echo $judul ?></li>
                            </ol></small>
                </h2>
            </div>
            
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div id="map" class="map-view"><php echo $map['html'] ?></div> -->
                        <div id="map" style="width: 100%; height: 460px;"></div>
                        <script>
                        var map;
                        var markersLayer = new L.LayerGroup();	//layer contain searched elements
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
                        // var map = new L.Map('map').setView([0.5129, 101.4567], 12);	//set center from first location
                        // map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer
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

                        var data = <?php echo json_encode($marker);?>;
                        var base_url = "<?php echo base_url('assets/images/');?>";
                        var redIcon = L.icon({
                            iconUrl: base_url + "marker-red-2x.png",
                            iconSize: [25, 41]
                            });
                        var blueIcon = L.icon({iconUrl: base_url + "marker-icon.png"});
                        // populate map with markers from sample data
                        for(i in data) {
                            var title       = data[i].npsn,	//value searched
                                lat         = data[i].lat,		//position found
                                long        = data[i].long,	//position found
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
                                    <img src='<?php echo base_url('gambar/');?>"+nama_file+"' width='100' name='gambar'>\
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
            <!-- #END# Example -->
        </div>
    </section>
 <?php } 
else{
     redirect("login");
}
    ?>