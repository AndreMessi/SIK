
<!DOCTYPE html>
<html>
<head>
    <title> Dashboard Pengajaran</title>
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
                PENGAJARAN
              </a>
              <a href="" class="list-group-item"><i class="fa fa-home"></i> Home</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
              <form class="form-inline pull-right" role="form" action="<?php echo site_url().'/admin/dashboard/cari/hasil';?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" id="cari" name="cari" placeholder="cari nama mahasiswa">
                </div>
                <input class="btn btn-primary" type="submit" name="cari" value="Cari">
              </form>
              <div class="panel-heading">
                Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b>
              </div>
              <div class="panel-body">
                <table class="table">
                  <tbody>
                  <?php
                    if(count($cari)>0)
                    {
                        foreach ($cari as $data) {
                        echo $data->nama . " => " . $data->nim ."<br>";
                        }
                    }
                    else
                    {
                        echo "Data tidak ditemukan";
                    }
                  ?>
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

