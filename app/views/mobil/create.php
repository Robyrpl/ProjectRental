  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Mobil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/Mobil/simpan" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Id</label>
                    <input type="hidden" class="form-control" placeholder="masukkan id mobil..." name="id">
                  </div>
                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control" placeholder="masukkan nama mobil..." name="nama">
                  </div>
                  <div class="form-group">
                    <label >Merk</label>
                    <input type="text" class="form-control" placeholder="masukkan merk mobil..." name="merk">
                  </div>
                  <div class="form-group">
                    <label >Waktu</label>
                    <input type="date" class="form-control" placeholder="masukkan waktu mobil..." name="waktu">
                  </div>
                  <div class="form-group">
                    <label >jumlah</label>
                    <input type="number" class="form-control" placeholder="..." name="jumlah">
                  </div>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" class="form-control" placeholder="masukkan harga mobil..." name="harga">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->