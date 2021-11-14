<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK Pemilihan Program Pelatihan Kerja</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="<?= base_url('assets/js/plugins/nucleo/css/nucleo.css'); ?>" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="<?= base_url('assets/css/argon-dashboard.css'); ?>" rel="stylesheet" />
</head>

<body class="bg-gradient">
  <div class="main-content">

    <div class="header bg-gradient py-6 py-lg-7">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <center><img src="<?= base_url('assets/img/profile/sragen.png') ?>" height="100">
                <span>
                  <h1 style="color: #000000; font-size: 20px; height: 20px;">SPK Pemilihan Program Pelatihan Kerja </h1>
                  <a style="color: #000000; font-size: 15px;">UPTD BLK Kabupaten Sragen</a>
                </span>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt--7 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header">
              <center>
                <p class="text-lead text-dark">Silahkan login dahulu sebelum masuk ke sistem</p>
              </center>

            </div>
            <div class="card-body px-lg-5 py-lg-5">

              <form action="<?= site_url('login/auth'); ?>" method="post" enctype="multipart/form-data">

                <?php
                $gagal = $this->session->flashdata('gagal');

                if (!empty($gagal)) { ?>

                  <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>

                <?php }

                ?>

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input class="form-control" name="email" id="email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Tampilkan Password</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/js/plugins/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/argon-dashboard.min.js'); ?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    $(document).ready(function() {
      $('.custom-control-input').click(function() {
        if ($(this).is(':checked')) {
          $('#password').attr('type', 'text');
        } else {
          $('#password').attr('type', 'password');
        }
      });
    });
  </script>
</body>

</html>