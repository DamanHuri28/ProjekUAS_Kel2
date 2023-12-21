</div>
<h4>Baru disini?</h4>
<h6 class="font-weight-light">Membuat akun hanya dengan beberapa langkah</h6>
<form action="<?= base_url('controller_auth/cek_register'); ?>" method="post" class="pt-3">
  <div class="form-group">
    <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="text" name="nama_lengkap" class="form-control form-control-lg" id="nama_lengkap"
      placeholder="Nama lengkap">

  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
  </div>

  <div class="mt-3">
    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
</form>
</div>
<div class="text-center mt-4 font-weight-light"> Sudah Mempunyai akun? <a href="<?= base_url('controller_auth'); ?>"
    class="text-primary">Login</a>
</div>
</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->