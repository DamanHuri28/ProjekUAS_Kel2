
                </div>
                <?= $this->session->flashdata('message'); ?>
                <h4>Selamat Datang</h4>
                <h6 class="font-weight-light">Silahkan login untuk melanjutkan.</h6>
                <form action="<?= base_url('controller_auth/cek_login'); ?>" method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >Log In</button>
                  </div>
                </form>
                <div class="text-center mt-4 font-weight-light"> Tidak mempunyai akun? <a href="<?= base_url('controller_auth/register'); ?>" class="text-primary">Buat</a>
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
   