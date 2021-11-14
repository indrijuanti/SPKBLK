<?php $this->load->view('admin/layout/header_kriteria'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Kriteria</h4>
        </div>
        <div class="card-body"><a href="<?= site_url('admin/kriteria/create'); ?>" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Input Kriteria</a>
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

            <?php
            if ($this->session->flashdata('hapus') == TRUE) : ?>

              <div class="alert alert-success">Berhasil Terhapus</div>

            <?php elseif ($this->session->flashdata('hapus') == FALSE) : ?>

              <div class="alert alert-danger">Gagal Terhapus</div>

            <?php endif; ?>


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


          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-blue">
                <tr class="thead-blue">
                  <th>No.</th>
                  <th>Kode Kriteria</th>
                  <th>Kriteria</th>
                  <th>Bobot</th>
                  <th>Tipe</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($jumlah_kriteria)) {
                  echo "
                        <td colspan='7' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                } else {
                  $no = 1;
                  foreach ($data_kriteria->result() as $kriteria) {
                    echo
                    "<tr>
                        <td>$no</td>
                        <td>$kriteria->kode_kriteria</td>
                        <td>$kriteria->kriteria</td>
                        <td>$kriteria->bobot</td>
                        <td>$kriteria->tipe</td>
                        <td align='center'>
                          <a href='" . site_url('admin/kriteria/view_edit/' . $kriteria->id_kriteria) . "' class='btn btn-sm btn-success'><i class='fas fa-user-edit'></i></a>
                          <a href='" . site_url('admin/kriteria/delete/' . $kriteria->id_kriteria) . "' class='btn btn-sm btn-danger ml-2'><i class='far fa-trash-alt'> </i></a>
                        </td>
                      </tr>";
                    $no++;
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3" style="text-align: center;">
            <a href="#" class="btn btn-sm btn-default" style="text-align: center; border-radius: 10px; font-size: 12px;">Total Record: <?= $jumlah_kriteria; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('admin/layout/footer'); ?>