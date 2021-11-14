<?php $this->load->view('admin/layout/header_alternatif'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Data Program Pelatihan</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="datatable">
              <thead class=" text-dark">
                <th>No.</th>
                <th>Kriteria</th>
                <th>Kategori</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                <?php if (empty($jumlah_program)) {
                  echo "
                        <td colspan='7' align='center' style='color: green;'><b>Data tidak ditemukan</b></td>";
                } else {
                  $no = 1;
                  foreach ($data_program->result() as $program) {
                    echo
                    "<tr>
                        <td>$no</td>
                        <td>$program->nama_program</td>
                        <td>$program->kategori</td>
                        <td align='center'>
                          <a href='" . site_url('admin/alternatif/create/' . $program->id_program) . "' class='btn btn-sm btn-info'><i class='fas fa-user-plus'></i>&nbsp;  Input Data </a>
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
            <a href="#" class="btn btn-sm btn-default" style="text-align: center; border-radius: 10px; font-size: 12px;">Total Record: <?= $jumlah_program; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('admin/layout/footer') ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable({});
  });
</script>