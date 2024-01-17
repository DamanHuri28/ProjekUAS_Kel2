<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <!-- edit_user.php -->
                        <form action="" method="POST">
                            <?php echo $this->session->flashdata('message'); ?>
                            <input type="hidden" name="user_Id" value="<?= $pengguna['user_Id']; ?>" id="user_Id">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username"class="form-control"
                                    value="<?= $pengguna['username']; ?>" >
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    value="<?= $pengguna['nama_lengkap']; ?>" >
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="peran">Peran</label>
                                <select name="peran" value="<?= $pengguna['peran']; ?>"id="peran" class="form-control" >
                                <option value="Member" <?php if ($pengguna['peran'] == "member") {
                                    echo "selected";
                                } ?>>Member</option>
                                <option value="Admin" <?php if ($pengguna['peran'] == "admin") {
                                    echo "selected";
                                } ?>>Admin</option>
                                 <option value="Kaprodi" <?php if ($pengguna['peran'] == "Kaprodi") {
                                    echo "selected";
                                } ?>>Kaprodi</option>
                                </select>
                                <?= form_error('peran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>