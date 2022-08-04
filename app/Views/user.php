<?=$this->extend('layout/base')?>

<?=$this->section('con')?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
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
                <div class="table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>                     
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no =1;
                            foreach($user as $row) :
                            ?>
                            <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->username?></td>
                            <td><?=$row->email?></td>   
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