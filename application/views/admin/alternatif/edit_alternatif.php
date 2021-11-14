<?php $this->load->view('admin/layout/header_alternatif'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit Alternatif</h4>
        </div>
        <div class="card-body">
          <form action="<?= site_url('admin/alternatif/edit/'. $view->id_alternatif); ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="program" id="program" class="form-control" value="<?= $view->id_program; ?>">
            <input type="hidden" name="kriteria" id="kriteria" class="form-control" value="<?= $view->id_kriteria; ?>">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nilai</label>
                  <input type="number" name="nilai" value="<?= $view->nilai ?>" id="nilai" class="form-control" placeholder="Nilai">
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" onkeyup="view()" name="keterangan" id="keterangan" value="<?= $view->keterangan ?>" class="form-control" placeholder="Keterangan">
                </div>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Save</button><a href="<?= site_url('admin/alternatif/index'); ?>"><button type="button" class="btn btn-default btn-round">Back</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>