<style>
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        /* Adjust the margin as needed */
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <h4 class="card-title">Data User</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="<?= base_url('controller_reminder') ?>" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari data ..."
                                            name="keyword" autocomplete="off" autofocus>
                                        <input class="btn btn-gradient-dark" type="submit" name="submit">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">  
                            <div class="input-group mb-3 d-md-flex justify-content-md-end">
                                <a href="<?= base_url('controller_reminder/tambah') ?>" class="btn btn-success">+
                                    Tambah Reminder</a>
                            </div>
                        </div>
                        <h6>Hasil :
                            <?= $total_rows; ?>
                        </h6>


                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Deskripsi</th>
                                    <th>Tenggat Waktu</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($pengingat_pembayaran as $p): ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$start; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["nama_lengkap"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["deskripsi"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["tanggal_jatuh_tempo"]; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $label_color = ($p["status_pembayaran"] == "Dibayar") ? "badge-gradient-info" : "badge-gradient-danger";
                                            ?>
                                            <label class="badge <?php echo $label_color; ?>">
                                                <?php echo $p["status_pembayaran"]; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('controller_reminder/edit/') . $p['reminder_id']; ?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo site_url('controller_reminder/delete/' . $p['reminder_id']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah data ingin dihapus?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                            </tbody>

                        </table>
                        <div class="pagination-container">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>