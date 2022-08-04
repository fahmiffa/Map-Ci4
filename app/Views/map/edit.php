<?=$this->extend('layout/base')?>

<?=$this->section('css')?>
<style>
   #map { height: 300px; }
</style>
<?=$this->endsection()?>

<?=$this->section('con')?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$da?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">                                
                <form action="<?=base_url('dashboard/update-map/'.$map['id'])?>" method="post">
                    <?=csrf_field()?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?=$map['nama']?>" name="nama" placeholder="Masukan nama">
                        <small class="text-danger"><?=(isset(session()->err['nama'])) ? session()->err['nama'] : null ?></small>   
                    </div>

                    <div class="form-group">
                        <div id="map"></div>
                    </div>

                    <div class="form-group">
                        <label>Koordinat</label>
                        <input type="text" class="form-control" value="<?=$map['koordinat']?>"  id="koordinat" name="koordinat" placeholder="titik koordinat" readonly>
                        <small class="text-danger"><?=(isset(session()->err['koordinat'])) ? session()->err['koordinat'] : null ?></small>   
                    </div>

                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </form>        
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?=$this->endSection()?>


<?=$this->section('js')?>

<script>
    var map = L.map('map').setView([-7.711, 110.369], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

var marker = L.marker([<?=$map['koordinat']?>],{draggable : true}).addTo(map);
    marker.bindPopup("<?=$map['nama']?>").openPopup();


marker.on('dragend',function(e){   
   document.getElementById('koordinat').value = marker.getLatLng().lat+','+marker.getLatLng().lng;
});

</script>

<?=$this->endsection()?>