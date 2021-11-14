<?php $this->load->view('admin/layout/header_program'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit Program</h4>
        </div>
        <div class="card-body">
          <form action="<?= site_url('admin/program/edit/' . $view->id_program); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Program</label>
                  <input type="text" name="nama_program" id="nama_program" class="form-control" required oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="setCustomValidity('')" placeholder="Nama Program" value="<?= $view->nama_program; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" required oninvalid="this.setCustomValidity('Umur/Usia Tidak Boleh Kosong')" oninput="setCustomValidity('')" class="form-control" name="kode" id="kode" placeholder="kode" value="<?= $view->kode; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kategori</label>
                  <textarea class="form-control textarea" name="kategori" id="kategori" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->kategori ?></textarea>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Banyak Pendaftar</label>
                  <textarea class="form-control textarea" name="banyak_pendaftar" id="banyak_pendaftar" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->banyak_pendaftar ?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Instruktur</label>
                  <textarea class="form-control textarea" name="instruktur" id="instruktur" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->instruktur ?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Fasilitas</label>
                  <textarea class="form-control textarea" name="fasilitas" id="fasilitas" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->fasilitas ?></textarea>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alumni</label>
                  <textarea class="form-control textarea" name="alumni" id="alumni" rows="5" required oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')"><?= $view->alumni ?></textarea>
                </div>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Save</button><a href="<?= site_url('admin/program/index'); ?>"><button type="button" class="btn btn-dark btn-round">Back</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>