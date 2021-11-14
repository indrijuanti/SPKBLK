<?php $this->load->view('admin/layout/header_analisa'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Matriks Awal (X)</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-blue">
                <tr class="thead-blue">
                  <th>No.</th>
                  <th>Nama Program</th>
                  <?php
                  $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM alternatif,kriteria WHERE alternatif.id_kriteria=kriteria.id_kriteria");
                  foreach ($kr2->result() as $a) {
                  ?>
                    <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                  <?php } ?>
                  <th class="text-center"></th></small>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = $this->db->query("SELECT * FROM program ");
                foreach ($sql->result() as $a) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_program; ?></td>
                    <?php
                    $id = $a->id_program;
                    $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,alternatif.nilai FROM alternatif,kriteria WHERE alternatif.id_kriteria=kriteria.id_kriteria AND alternatif.id_program='$id'");
                    foreach ($sql2->result() as $a) {
                    ?>
                      <td align="center"><?php echo $a->nilai; ?></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!--Normalisasi -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Normalisasi (N)</h4>
        </div>
        <div class="card-body">

          <a href="<?= site_url('admin/analisa/proses_normalisasi'); ?>" class="btn btn-sm btn-info ">Normalisasi</a>
          <a href="<?= site_url('admin/analisa/delete_normalisasi'); ?>" class="btn btn-sm btn-danger  ">Bersihkan</a>

          <?php
          $gagal = $this->session->flashdata('gagal');

          if (!empty($gagal)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>




          <?php }

          ?>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-blue">
                <tr class="thead-blue">
                  <th>No.</th>
                  <th>Nama Program</th>
                  <?php
                  $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria");
                  foreach ($kr2->result() as $a) {
                  ?>
                    <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                $sql = $this->db->query("SELECT * FROM program");
                foreach ($sql->result() as $a) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_program; ?></td>
                    <?php
                    $id = $a->id_program;
                    $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,normalisasi.normalisasi FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria AND normalisasi.id_program='$id'");
                    foreach ($sql2->result() as $a) { ?>
                      <td align="center"><?php echo $a->normalisasi; ?></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!--Matriks keputusan awal (V) -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Matriks Bobot Keputusan (V)</h4>
        </div>
        <div class="card-body">

          <a href="<?= site_url('admin/analisa/proses_keputusan'); ?>" class="btn btn-sm btn-info ">Keputusan</a>
          <a href="<?= site_url('admin/analisa/delete_keputusan'); ?>" class="btn btn-sm btn-danger ">Bersihkan</a>

          <?php
          $gagal = $this->session->flashdata('gagal');

          if (!empty($gagal)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>

          <?php }

          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-dark">
                <th>No.</th>
                <th>Nama Program</th>
                <?php
                $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM keputusan,kriteria WHERE keputusan.id_kriteria=kriteria.id_kriteria");
                foreach ($kr2->result() as $a) {
                ?>
                  <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                <?php } ?>
              </thead>
              <tbody>
                <?php $no = 1;
                $sql = $this->db->query("SELECT * FROM program");
                foreach ($sql->result() as $a) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_program; ?></td>
                    <?php
                    $id = $a->id_program;
                    $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,keputusan.bobot_keputusan FROM keputusan,kriteria WHERE keputusan.id_kriteria=kriteria.id_kriteria AND keputusan.id_program='$id'");
                    foreach ($sql2->result() as $a) { ?>
                      <td align="center"><?php echo $a->bobot_keputusan; ?></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!--Matriks Batas G -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Nilai Matriks Batas (G) </h4>
        </div>
        <div class="card-body">


          <a href="<?= site_url('admin/analisa/proses_matriks_batas'); ?>" class="btn btn-sm btn-info "> Matrik Batas</a>
          <a href="<?= site_url('admin/analisa/delete_matriks_batas'); ?>" class="btn btn-sm btn-danger ">Bersihkan</a>

          <?php
          $gagal = $this->session->flashdata('gagal');

          if (!empty($gagal)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>



          <?php }

          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-dark">
                <?php
                $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM matriks_batas,kriteria WHERE matriks_batas.id_kriteria=kriteria.id_kriteria");
                foreach ($kr2->result() as $a) {
                ?>
                  <th style="text-align:center;"><?php echo $a->kriteria; ?></th>
                <?php } ?>
              </thead>
              <tbody>

                <tr>
                  <?php
                  $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,matriks_batas.nilai_batas FROM matriks_batas,kriteria WHERE matriks_batas.id_kriteria=kriteria.id_kriteria");
                  foreach ($sql2->result() as $a) { ?>
                    <td align="center"><?php echo $a->nilai_batas; ?></td>
                  <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <!--Jarak Daerah Perbatasan Q -->

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Matriks Jarak Alternatif Dari Daerah Perkiraan Perbatasan (Q)</h4>
        </div>
        <div class="card-body">

          <a href="<?= site_url('admin/analisa/proses_perkiraan_batas'); ?>" class="btn btn-sm btn-info ">Matriks Jarak Alternatif</a>
          <a href="<?= site_url('admin/analisa/delete_perkiraan_batas'); ?>" class="btn btn-sm btn-danger ">Bersihkan</a>

          <?php
          $gagal = $this->session->flashdata('gagal');

          if (!empty($gagal)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>



          <?php }

          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-dark">
                <th>No.</th>
                <th>Nama Program</th>
                <?php
                $kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM perkiraan_perbatasan,kriteria WHERE perkiraan_perbatasan.id_kriteria=kriteria.id_kriteria");
                foreach ($kr2->result() as $a) {
                ?>
                  <th align="center"><?php echo $a->kriteria; ?></th>
                <?php } ?>
              </thead>
              <tbody>
                <?php $no = 1;
                $sql = $this->db->query("SELECT * FROM program");
                foreach ($sql->result() as $a) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_program; ?></td>
                    <?php
                    $id = $a->id_program;
                    $sql2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,perkiraan_perbatasan.nilai_perkiraan FROM perkiraan_perbatasan,kriteria WHERE perkiraan_perbatasan.id_kriteria=kriteria.id_kriteria AND perkiraan_perbatasan.id_program='$id'");
                    foreach ($sql2->result() as $a) { ?>
                      <td align="center"><?php echo $a->nilai_perkiraan; ?></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!--Nilai Hasil rangking -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Hasil Rangking </h4>
        </div>
        <div class="card-body">
          <a href="<?= site_url('admin/analisa/proses_peringkat'); ?>" class="btn btn-sm btn-info ">Analisa</a>
          <a href="<?= site_url('admin/analisa/delete_analisa'); ?>" class="btn btn-sm btn-danger ">Bersihkan</a>

          <?php
          $gagal = $this->session->flashdata('gagal');

          if (!empty($gagal)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('gagal'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>



          <?php }

          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-dark">
                <th>No.</th>
                <th>Nama Program</th>
                <th style="text-align:center;">Hasil</th>
                <th style="text-align:center;">Status</th>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $kr1 = $this->db->query("SELECT program.nama_program, program.id_program, peringkat.nilai_peringkat FROM program,peringkat WHERE program.id_program=peringkat.id_program order by peringkat.nilai_peringkat desc");
                foreach ($kr1->result() as $a) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_program; ?></td>
                    <?php
                    $id_program = $a->id_program;
                    $nilai_peringkat = $a->nilai_peringkat;
                    ?>
                    <td align="center"><?php echo $nilai_peringkat; ?></td>
                    <?php if ($nilai_peringkat < 0.1) {
                      echo "<td align='center' style='color:red; text-weight:bold;'>Belum Direkomendasikan</td>";
                    } elseif ($nilai_peringkat > 0.1) {
                      echo "<td align='center' style='color:green; text-weight:bold;'>Direkomendasikan</td>";
                    }
                    ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>