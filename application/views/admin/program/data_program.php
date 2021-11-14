<?php $this->load->view('admin/layout/header_program'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Program Pelatihan</h4>
        </div>
        <div class="card-body"><a href="<?= site_url('admin/program/create'); ?>" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i> &nbsp; Input Program</a>

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
            if ($this->session->flashdata('delete') == TRUE) : ?>

              <div class="alert alert-success">Berhasil Terhapus</div>

            <?php elseif ($this->session->flashdata('delete') == FALSE) : ?>
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

          <!-- card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="thead-blue">
                  <tr class="thead-blue">
                    <th class="thead-custom" scope="col">No.</th>
                    <th class="thead-custom" scope="col">Kode</th>
                    <th class="thead-custom" scope="col">Nama Program </th>
                    <th class="thead-custom" scope="col">Kategori</th>
                    <th class="thead-custom" scope="col">Pendaftar</th>
                    <th class="thead-custom" scope="col">Instruktur</th>
                    <th class="thead-custom" scope="col">Fasilitas</th>
                    <th class="thead-custom" scope="col">Alumni</th>
                    <th class="thead-custom" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($jumlah_program)) {

                    echo "
                        <td colspan='10' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                  } else {
                    $no = 1;
                    foreach ($data_program->result() as $program) {
                      echo
                      "<tr>
                        <td>$no</td>
                        <td>$program->kode</td>
                        <td>$program->nama_program</td>
                        <td>$program->kategori</td>
                        <td>$program->banyak_pendaftar</td>  
                        <td>$program->instruktur</td>  
                        <td>$program->fasilitas</td>
                        <td>$program->alumni</td>    

                      
                        <td align='center'>
                          <a href='" . site_url('admin/program/view_edit/' . $program->id_program) . "' class='btn btn-sm btn-success'><i class='fas fa-user-edit'></i></a>
                          <a href='" . site_url('admin/program/delete/' . $program->id_program) . "' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></a>
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
        <div class="row">
          <div class="col-md-3" style="text-align: center;">
            <a href="#" class="btn btn-sm btn-default" style="text-align: center; border-radius: 10px; font-size: 12px;">Total Record: <?= $jumlah_program; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('admin/layout/footer'); ?>