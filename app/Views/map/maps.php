<?=$this->extend('layout/base')?>

<?=$this->section('con')?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Map</h1>
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
                <p class="card-title"><?=$da?></p>
                <a href="<?=base_url('dashboard/add-map')?>" class="btn btn-dark btn-sm float-right" >Tambah Data</a>          
                <div class="table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>nama</th>
                            <th>Koordinat</th>      
                            <th>Action</th>               
                            </tr>
                        </thead>
                        <tbody> 
                          <?php
                            $no = 1;
                            foreach($map as $row):
                          ?>
                          <tr>
                            <td><?=$no++?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['koordinat']?></td>
                            <td>
                              <?php if(session()->status == 'admin') {?>
                                <button data-id="<?=$row['id']?>" class="btn-danger btn-sm del"><i class="nav-icon fas fa-trash"></i></button>
                              <?php } ?>  
                                <a href="<?=base_url('dashboard/edit-map/'.$row['id'])?>" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                            </td>
                          </tr>    

                          <?php endforeach;?>
                        </tbody>
                    </table>
              </div>
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
  $('.del').on('click',function(){
    // alert($(this).data('id'));

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

          $.ajax({
                url: "<?=base_url('dashboard/delete-map/')?>/"+$(this).data('id'),
                method:"get"
            });

            location.reload();

        } else {
          swal("Your imaginary file is safe!");
        }
      });
  });
</script>

<?=$this->endSection()?>