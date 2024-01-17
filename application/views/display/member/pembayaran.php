<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaksi</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="deskripsi">Nama Pembayaran</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                    value="<?= set_value('deskripsi'); ?>">
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select name="tipe" id="tipe" class="form-control">
                                    <option value="pengeluaran" <?php echo set_select('tipe', 'pengeluaran'); ?>>
                                        Pengeluaran</option>
                                    <option value="pemasukan" <?php echo set_select('tipe', 'pemasukan'); ?>>Pemasukan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah"
                                    class="form-control" value="<?= set_value('jumlah'); ?>">
                                <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <input type="hidden" name="user_id" value="<?= $pengguna['user_Id']; ?>">

                            <button type="submit" name="tambah" class="btn btn-primary">Buat Transaksi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
