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
                        <div id="map" class="map-view"><?php echo $map['html'] ?></div>
                        <script>
                        
// var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
//         streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});
                        // var mymap = L.map('mapid').setView([0.5129, 101.4567], 12);
                        // // var mymap = L.map('mapid').setView([51.505, -0.09], 13);
                        // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        //     maxZoom: 18,
                        //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        //     '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        //     'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        //     id: 'mapbox.streets'
                        // }).addTo(mymap);

                        // var popup = L.popup();
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