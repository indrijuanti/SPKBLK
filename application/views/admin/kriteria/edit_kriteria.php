<?php $this->load->view('admin/layout/header_kriteria'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit Kriteria</h4>
        </div>
        <div class="card-body">
          <form action="<?= site_url('admin/kriteria/edit/' . $view->id_kriteria); ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input type="text" name="kode_kriteria" id="kode_kriteria" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kode Kriteria" value="<?= $view->kode_kriteria; ?>">
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kriteria</label>
                  <input type="text" name="kriteria" id="kriteria" class="form-control" required oninvalid="this.setCustomValidity('Kriteria Tidak Boleh Kosong')" oninput="setCustomValidity('')" placeholder="Kriteria" value="<?= $view->kriteria; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Bobot</label>
                  <input type="text" required oninvalid="this.setCustomValidity('Nilai Bobot Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?= $view->bobot; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Tipe</label>
                  <input type="text" required oninvalid="this.setCustomValidity('Tipe Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?= $view->tipe; ?>">
                </div>
              </div>
            </div>


            <hr>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Save</button><a href="<?= site_url('admin/kriteria/index'); ?>"><button type="button" class="btn btn-dark btn-round">Back</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>