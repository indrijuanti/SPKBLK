<?php $this->load->view('admin/layout/header_dashboard'); ?>

<div class="content">
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4">
      <div class="card card-stats ">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-user text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category ">User</p>
                <p class="card-title"><?= $jumlah_user ?>
                <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <a href="<?= site_url('admin/user/index'); ?>">Tampilkan data</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-7 col-sm-7">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-users text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Alternatif Program </p>
                <p class="card-title"><?= $jumlah_program ?>
                <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <a href="<?= site_url('admin/program/index'); ?>">Tampilkan data</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-trophy text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Hasil Rekomendasi</p>
                <?php

                foreach ($sql->result() as $data) {
                ?>
                  <p class="card-title"><?= $data->nama_program; ?>
                  <?php } ?>
                  <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <a href="<?= site_url('admin/analisa/index'); ?>">Tampilkan data</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="fa fa-list text-sucess"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category"> Data Kriteria</p>
                <?php

                foreach ($sql1->result() as $data1) {
                ?>
                  <p class="card-title"><?= $data1->kriteria ?>
                  <?php } ?>
                  <p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <a href="<?= site_url('admin/kriteria/index'); ?>">Tampilkan data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Selamat datang !</h4>
          <p class="card-category">
            Sistem Pendukung Keputusan Pemilihan Program Kerja dengan Metode MABAC</p>
        </div>
        <div class="card-body">
          <div class="mapcontainer">
            <div class="map">
              <span>Sistem Pendukung Keputusan ini dibangun bertujuan untuk memilih program pelatihan kerja terbaik yang ada di Balai Pelatihan Kerja Kabupaten Sragen didasarkan pada bobot kriteria dari masing-masing alternatif yang telah ditetapkan , sistem ini juga menerapkan konsep dari salah satu metode sistem pendukung keputusan yaitu Multi Attributive Border Approximation Area Comparison (MABAC) .</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('admin/layout/footer'); ?>