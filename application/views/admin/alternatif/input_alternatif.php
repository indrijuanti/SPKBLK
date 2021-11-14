<?php $this->load->view('admin/layout/header_alternatif') ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Input Alternatif</h4>
        </div>
        <div class="card-body">

          <?php
          if ($this->session->flashdata('tambah')) : ?>
            <?php
            if ($this->session->flashdata('tambah') == TRUE) : ?>
              <div class="alert alert-success">Berhasil Tersimpan</div>
            <?php elseif ($this->session->flashdata('tambah') == FALSE) : ?>
              <div class="alert alert-danger">Gagal Tersimpan</div>
            <?php endif; ?>
          <?php endif; ?>

          <?php
          if ($this->session->flashdata('hapus')) : ?>
            <div class="alert alert-success">Berhasil Terhapus</div>
          <?php endif; ?>

          <?php
          if ($this->session->flashdata('edit')) : ?>
            <?php
            if ($this->session->flashdata('edit') == TRUE) : ?>
              <div class="alert alert-success">Berhasil Diedit</div>
            <?php elseif ($this->session->flashdata('edit') == FALSE) : ?>
              <div class="alert alert-danger">Gagal Diedit</div>
            <?php endif; ?>
          <?php endif; ?>

          <?php
          $warning = $this->session->flashdata('warning');

          if (!empty($warning)) { ?>

            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> <?= $this->session->flashdata('warning'); ?><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>

          <?php }

          ?>

          <form action="<?= site_url('admin/alternatif/tambah'); ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="program" id="program" class="form-control" value="<?= $view->id_program; ?>">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kriteria</label>
                  <select name="kriteria" id="kriteria" class="form-control">
                    <option value="">Silahkan Pilih</option>
                    <?php foreach ($data_kriteria as $kriteria) {
                      echo "<option value='$kriteria->id_kriteria'>$kriteria->kriteria</option>";
                    } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nilai</label>
                  <select name="nilai" id="nilai" class="form-control">
                    <option value="0.1">0.1</option>
                    <option value="0.2">0.2</option>
                    <option value="0.3">0.3</option>
                    <option value="0.4">0.4</option>
                    <option value="0.5">0.5</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" onkeyup="view()" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
                </div>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Save</button><a href="<?= site_url('admin/alternatif/index'); ?>"><button type="button" class="btn btn-dark btn-round">Back</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>



    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Alternatif</h4>
        </div>

        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-blue">
                <tr class="tr-thead">
                  <th>No.</th>
                  <th>Kriteria</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($data_alternatif) == 0) {

                  echo "
                        <td colspan='7' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                } else {
                  $no = 1;
                  foreach ($data_alternatif as $alternatif) {
                    echo
                    "<tr>
                        <td>$no</td>
                        <td>$alternatif->kriteria</td>
                        <td>$alternatif->keterangan</td>
                        <td>$alternatif->nilai</td>
                        <td align='center'>
                          <a href='" . site_url('admin/alternatif/view_edit/' . $alternatif->id_alternatif) . "' class='btn btn-sm btn-success'><i class='fas fa-user-edit'></i></a>
                          <a href='" . site_url('admin/alternatif/delete/' . $alternatif->id_alternatif) . "' class='btn btn-sm btn-danger ml-2'><i class='far fa-trash-alt'></i></a>
                        </td>
                      </tr>";
                    $no++;
                  }
                } ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('admin/layout/footer') ?>

<script type="text/javascript">
  function view() {
    var nilai = document.getElementById("nilai").value;
    if (nilai > 0.5) {
      document.getElementById("keterangan").innerHTML = "Sangat Bagus";
    } else if (nilai < 0.4) {
      document.getElementById("keterangan").innerHTML = "Bagus";
    } else if (nilai < 0.3) {
      document.getElementById("keterangan").innerHTML = "Cukup";
    } else if (nilai < 0.2) {
      document.getElementById("keterangan").innerHTML = "Kurang";
    } else if (nilai > 0.1) {
      document.getElementById("keterangan").innerHTML = "Sangat Kurang";
    }
  };
</script>