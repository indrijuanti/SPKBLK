<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/basketball.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>SPK Pemilihan Program Pelatihan Kerja</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="<?= base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('https://fonts.googleapis.com/css?family=Montserrat:400,700,200'); ?>" rel="stylesheet" />
  <link href="<?= base_url('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/paper-dashboard.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="info">
      <div class="logo">
        <div class="simple-text logo-normal">
          BLK Kabupaten Sragen
        </div>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?= site_url('admin/dashboard/index'); ?>">
              <i class="fa fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/program/index'); ?>">
              <i class="fa fa-users"></i>
              <p>Data Pelatihan</p>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/kriteria/index'); ?>">
              <i class="fa fa-list-alt"></i>
              <p>Kriteria</p>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/alternatif/index'); ?>">
              <i class="fa fa-keyboard"></i>
              <p>Alternatif</p>
            </a>
          </li>
          <li class="active">
            <a href="<?= site_url('admin/analisa/index'); ?>">
              <i class="fa fa-chart-bar"></i>
              <p>Hasil Analisis</p>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/user/index'); ?>">
              <i class="fa fa-user"></i>
              <p>User</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">

      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-warning bg-warning">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div class="navbar-left navbar-form nav-search mr-md-3">
            <a class="navbar-brand" href="#">
              <img src=<?= base_url('assets/img/profile/sragen.png') ?> alt="Logo" style="width:40px;">
              <img src=<?= base_url('assets/img/profile/uin.png') ?> alt="Logo" style="width:25px;">
            </a>
            <span class="navbar-text">
              Sistem Pendukung Keputusan Pemilihan Program Pelatihan Kerja dengan Metode MABAC
            </span>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  $users = $this->db->query("SELECT * FROM user WHERE id_user='" . $this->session->userdata('id_user') . "'");
                  foreach ($users->result() as $data) {

                    echo "<img src='" . base_url('assets/img/' . $data->image) . "' style='height: 25px; border-radius: 50px; width: 25px;''>";
                  } ?>
                  <p>
                    <span class="d-lg-none d-md-block"></span><span><small> <?= $this->session->userdata('name'); ?></small></span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= site_url('login/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>