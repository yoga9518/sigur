<!-- Load Leaflet from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>


  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.3.0/dist/esri-leaflet.js"></script>


  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.14/dist/esri-leaflet-geocoder.css">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.14/dist/esri-leaflet-geocoder.js"></script>

  <style>
    body { margin:0; padding:0; }
    #map { position: absolute; top:0; bottom:0; right:0; left:0; }
  </style>
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
                <small><ol class="breadcrumb breadcrumb-col-pink">
                                <li><a href="<?php echo base_url();?>index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> <?php echo $judul ?></li>
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
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div id="map" style="width: 1006px; height: 400px;"></div>
                        <script>
  // var gray = L.layerGroup();

  // // more than one service can be grouped together and passed to the control together
  // L.esri.basemapLayer('DarkGray').addTo(gray);
  // L.esri.basemapLayer('GrayLabels').addTo(gray);
  
// var mar = L.marker([0.5129, 101.4567]).bindPopup('dsfdfdf'),
//     mat = L.marker([0.5159, 101.4517]).bindPopup('dsfdfdf');
// var cities = L.layerGroup();
var cities = L.esri.featureLayer({
    url: 'https://sampleserver6.arcgisonline.com/arcgis/rest/services/Census/MapServer/3',
    style: function (feature) {
      return { color: '#bada55', weight: 2 };
    }
  });

// L.marker([0.5129, 101.4567]).bindPopup('dsfdfdf').addTo(cities)
    // L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities),
    // L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities),
    // L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);
  

  var renderingRule = {
    rasterFunction: 'Hillshade',
    rasterFunctionArguments: {
      Azimuth: 215,
      Altitude: 60,
      ZFactor: 1
    },
    variableName: 'DEM'
  };

  var Imagery = L.layerGroup();
  L.esri.basemapLayer('Imagery').addTo(Imagery);
  // L.esri.basemapLayer('ImageryLabels').addTo(Imagery);

  var Streets = L.layerGroup();
  L.esri.basemapLayer('Streets').addTo(Streets);
  // L.esri.basemapLayer('StreetsLabels').addTo(Streets);

  // var map = L.map('map').setView([0.5129, 101.4567], 12);
  var map = L.map('map',{
    center: [0.5129, 101.4567],
    zoom: 12,
    layers: [Imagery, Streets]
  });

  // L.esri.basemapLayer('Imagery').addTo(map);

  // L.esri.imageMapLayer({
  //   url: 'https://sampleserver3.arcgisonline.com/ArcGIS/rest/services/Earthquakes/SanAndreasLidar/ImageServer',
  //   renderingRule: renderingRule,
  //   useCors: false
  // }).addTo(map);

  var baseLayers = {
    // Grayscale: gray,
    // MapImage: L.esri.basemapLayer('Imagery'),
    // Streetmap: L.esri.basemapLayer('Streets')
    MapImage: Imagery,
    Streetmap: Streets
  };

  var overlays = {
    "Cities": cities
  };

  // https://leafletjs.com/reference.html#control-layers
  L.control.layers(baseLayers, overlays).addTo(map);
  // L.control.layers(baseMaps, overlayMaps).addTo(map);

  var searchControl = L.esri.Geocoding.geosearch().addTo(map);

  var results = L.layerGroup().addTo(map);

  searchControl.on('results', function (data) {
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
    }
  });
</script>

                    </div>
                </div>
            </div>
            <!-- #END# Example -->
        </div>
    </section>