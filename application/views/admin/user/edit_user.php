<?php $this->load->view('admin/layout/header_user'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit user</h4>
        </div>
        <div class="card-body">
          <form action="<?= site_url('admin/user/edit/' . $view->id_user); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" required oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="name" value="<?= $view->name ?>" id="name" class="form-control" placeholder="Nama">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" required oninvalid="this.setCustomValidity('Email Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?= $view->email ?>" class="form-control" name="email" id="email" placeholder="Email">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="<?= $view->password ?>" class="form-control" name="password" id="password" placeholder="Password">
                </div>
              </div>
            </div>



            <div class="checkbox">
              <label>
                <input name="tampil" style="border-color: #fff;" align="right" class="tampil" id="tampil" type="checkbox" value="Tampilkan"><b> Tampilkan</b>
              </label>
            </div>

            <?php if ($view->image > 0) {
              echo "<div class='row'>
                    <div class='col-md-12'>
                      <div class='form-group'>
                        <img src='" . base_url('assets/img/' . $view->image) . "' width='100'>
                      </div>
                    </div>
                  </div>";
              echo "<div class='row'>
                    <div class='col-md-12'>
                      <div class='form-group'>
                      <label>URL</label>
                        <input class='form-control' readonly value='assets/img/$view->image' id='foto' name='foto'>
                      </div>
                    </div>
                  </div>";
            } ?>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="btn btn-success" style="color: #fff;"><span class="fa fa-camera"></span> Upload Foto</la bel>
                    <input type="file" required oninvalid="this.setCustomValidity('Foto Harus Diisi Tidak Boleh Kosong')" oninput="setCustomValidity('')" name="image" id="image">
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Save</button><a href="<?= site_url('admin/user/index'); ?>"><button type="button" class="btn btn-default btn-round">Back</button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>

<script>
  $(document).ready(function() {
    $('.tampil').click(function() {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>