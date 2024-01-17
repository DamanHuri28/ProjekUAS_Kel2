<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Reminder</h4>
                        <!-- edit_user.php -->
                        <form action="" method="POST">
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <select name="nama_lengkap" id="nama_lengkap" class="form-control">
                                    <?php foreach ($pengguna as $p): ?>
                                        <option value="<?= $p['user_Id']; ?>">
                                            <?= $p['nama_lengkap']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                    value="<?= set_value('deskripsi'); ?>">
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                                <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo"
                                    class="form-control" value="<?= set_value('tanggal_jatuh_tempo'); ?>">
                                <?= form_error('tanggal_jatuh_tempo', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <div class="form-group">
                                <label for="status_pembayaran">Status Pembayaran</label>
                                <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                    <option value="Dibayar" <?php echo set_select('status_pembayaran', 'Dibayar'); ?>>
                                        Dibayar</option>
                                    <option value="Belum Dibayar" <?php echo set_select('status_pembayaran', 'Belum Dibayar'); ?>>Belum Dibayar</option>
                                </select>
                                <?= form_error('status_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambahkan Reminder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>