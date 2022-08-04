    
<?=$this->extend('frontend/base')?>

<?=$this->section('css')?>
<style>
   #map { height: 300px; }
</style>
<?=$this->endsection()?>

<?=$this->section('content')?>

    <!-- Header -->
    <header id="header" style="background-color:white;padding-top:3rem;margin-top:5rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Map</h1>
                    <div id="map"></div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->
    <?=$this->endSection()?>


<?=$this->section('js')?>

<script>
    var map = L.map('map').setView([-7.711, 110.369], 7);


    <?php foreach($map as $row): ?>

    var marker = L.marker([<?=$row['koordinat']?>]).addTo(map);
    marker.bindPopup("<?=$row['nama']?>").openPopup();

    <?php endforeach;?>




    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.on('click', function(ev) {
    alert(ev.latlng); // ev is an event object (MouseEvent in this case)
});
</script>

<?=$this->endsection()?>