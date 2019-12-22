<!DOCTYPE html>
<html>
<head>
    <title> Input Kompensasi</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KOMPENSASI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>index.php/user/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                MAHASISWA
              </a>
              <a href="" class="list-group-item"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b>
               <!--  <?php echo form_open_multipart('kompensasi/upload'); ?> -->
              
              </div>
              <div class="panel-body">
                 <?php echo form_open("gambar/save", array('enctype'=>'multipart/form-data')); ?>
                <form>
                 
                  <div class="form-group row">
                    <label for="nim" class="col-sm-3 col-form-label">Nim Mahasiswa</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan Nim">
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="jurusan" value="<?php echo set_value('jurusan'); ?>" placeholder="Masukkan Jurusan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_matkul" class="col-sm-3 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama_matkul" value="<?php echo set_value('nama_matkul'); ?>" placeholder="Masukkan nama matakuliah">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jmlh_sks" class="col-sm-3 col-form-label">Jumlah Sks</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="jmlh_sks" value="<?php echo set_value('jmlh_sks'); ?>" placeholder="Masukkan jumlah sks">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="kelas" value="<?php echo set_value('kelas'); ?>" placeholder="Masukkan kelas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_dosen" class="col-sm-3 col-form-label">Nama Dosen</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="nama_dosen" value="<?php echo set_value('nama_dosen'); ?>" placeholder="Masukkan nama dosen">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pertemuan_matkul" class="col-sm-3 col-form-label">Pertemuan Matakuliah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="pertemuan_matkul" value="<?php echo set_value('pertemuan_matkul'); ?>" placeholder="Masukkan pertemuan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="thn_akademik" class="col-sm-3 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="thn_akademik" value="<?php echo set_value('thn_akademik'); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="semester" value="<?php echo set_value('semester'); ?>" placeholder="Masukkan semester">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="gambar" class="col-sm-3 col-form-label">Upload Kompensasi</label>
                    <div class="col-sm-9">
                      <input type="file"  id="gambar" name="input_gambar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button onclicsk="myfunction()" type="submit" name="submit"class="btn btn-primary" value="Simpan" data-toggle="modal" data-target="#exampleModal">Submit</button>
                      <script type="text/javascript">
                        function myfunction(){
                          alert("berhasil Upload");
                        }
                      </script>
                      <a href="<?php echo base_url(); ?>">
                    </div>
          

                  </div>
                </form>
                <?php echo form_close() ?>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js.js"></script>

</body>
</html>