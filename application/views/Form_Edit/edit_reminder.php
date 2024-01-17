<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Reminder</h4>
                        <!-- edit_user.php -->
                        <form action="" method="POST">
                            <?php echo $this->session->flashdata('message'); ?>
                            <input type="hidden" name="reminder_id" value="<?= $pengingat_pembayaran['reminder_id']; ?>" id="user_Id">
                            <div class="form-group">
                                <label for="username">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap"class="form-control"
                                    value="<?= $pengingat_pembayaran['nama_lengkap']; ?>" readonly>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                    value="<?= $pengingat_pembayaran['deskripsi']; ?>" >
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="status_pembayaran">Status Pembayaran</label>
                                <select name="status_pembayaran" value="<?= $pengingat_pembayaran['status_pembayaran']; ?>"id="status_pembayaran" class="form-control" >
                               
                                <option value="Dibayar" <?php if ($pengingat_pembayaran['status_pembayaran'] == "Dibayar") {
                                    echo "selected";
                                } ?>>Dibayar</option>
                                <option value="Belum Dibayar" <?php if ($pengingat_pembayaran['status_pembayaran'] == "Belum Dibayar") {
                                    echo "selected";
                                } ?>>Belum Dibayar</option>
                                </select>
                                <?= form_error('status_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>