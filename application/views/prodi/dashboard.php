
<!DOCTYPE html>
<html>
<head>
    <title> Dashboard Prodi</title>
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
                PRODI
              </a>
              <a href="" class="list-group-item"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nim</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NamaMk</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Dosen</th>
                      <th scope="col">Pertemuan</th>
                      <th scope="col">Thun Akademik</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Tanggal Kirim</th>
                      <th scope="col">Gambar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no=1; 
                    foreach ($join3 as $row) { ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $row->nim;?></td>
                      <td><?php echo $row->nama;?></td>
                      <td><?php echo $row->nama_matkul;?></td>
                      <td><?php echo $row->kelas;?></td>
                      <td><?php echo $row->nama_dosen;?></td>
                      <td><?php echo $row->pertemuan_matkul;?></td>
                      <td><?php echo $row->thn_akademik;?></td>
                      <td><?php echo $row->semester;?></td>
                      <td><?php echo $row->tglKirim;?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?= $no.'gambar'; ?>">Lihat</button>
                          
                        <!-- Modal -->
                        <div id="<?= $no.'gambar'?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-body">                             
                                <img src="<?= base_url('images/').$row->gambar;?>" style="width: 565px; height: 325px;"/>
                              </div>

                              <div class="modal-footer">
                                <form method="post" action="<?php echo base_url()."index.php/gambar/status1" ?>">
                                  <label for="">Status : <?php echo $row->status; ?></label>
                                  <input type="hidden" name="id" readonly value="<?php echo $row->id_kompensasi; ?>">    
                                  <input class="btn btn-danger" type="submit" name="status" value="Tolak">
                                  <input class="btn btn-primary" type="submit" name="status" value="Terima">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

