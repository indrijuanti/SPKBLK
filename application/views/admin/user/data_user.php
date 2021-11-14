<?php $this->load->view('admin/layout/header_user'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data User</h4>
        </div>
        <div class="card-body"><a href="<?= site_url('admin/user/create'); ?>" class="btn btn-sm btn-info"><i class="fas fa-user-plus"></i>&nbsp; Input User</a>

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

          <div class="table-responsive">
            <table class="table">
              <thead class=" text-dark">
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Level</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                <?php if (empty($jumlah_user)) {

                  echo "
                        <td colspan='7' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                } else {
                  $no = 1;
                  foreach ($data_user as $user) {
                    echo
                    "<tr>
                        <td>$no</td>
                        <td>$user->name</td>
                        <td>$user->email</td>"; ?>
                    <?php
                    echo "     
                        <center><td><img src='" . base_url('assets/img/' . $user->image) . "' width='100'></td></center>
                        
                        <td>$user->level</td>"; ?>

                    <?php if ($user->level == "admin") {
                      echo "<td align='center'>
                          <a href='" . site_url('admin/user/view_edit/' . $user->id_user) . "' class='btn btn-sm btn-success'><i class='fas fa-user-edit'></i> Edit </a>
                          <a href='" . site_url('admin/user/delete/' . $user->id_user) . "' class='btn btn-sm btn-danger ml-2'><i class='far fa-trash-alt'></i> Delete </a>
                    
                        </td>";
                    } elseif ($user->level == "user") {
                      echo "<td align='center'>
                          <a href='" . site_url('admin/user/view_edit/' . $user->id_user) . "' class='btn btn-sm btn-success'><i class='fas fa-user-edit'></i> Edit </a>
                          <a href='" . site_url('admin/user/delete/' . $user->id_user) . "' class='btn btn-sm btn-danger ml-2'><i class='far fa-trash-alt'></i> Delete </a>
                        </td>";
                    } ?>
                    </tr>
                <?php $no++;
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3" style="text-align: center;">
            <a href="#" class="btn btn-sm btn-default" style="text-align: center; border-radius: 10px; font-size: 12px;">Total Record: <?= $jumlah_user; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('admin/layout/footer'); ?>