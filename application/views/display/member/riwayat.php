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
                        <h4 class="card-title">Riwayat Transaksi</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="<?= base_url('controller_riwayat') ?>" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari data tranksaksi..."
                                            name="keyword" autocomplete="off" autofocus>
                                        <input class="btn btn-gradient-dark" type="submit" name="submit">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">  
                            <div class="input-group mb-3 d-md-flex justify-content-md-end">
                                <a href="<?= base_url('controller_dashboard1/pembayaran') ?>" class="btn btn-success">+
                                    Buat Transaksi</a>
                            </div>
                        </div>
                        <h6>Hasil :
                            <?= $total_rows; ?>
                        </h6>


                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Transaksi</th>
            

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($transaksi as $t): ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$start; ?>
                                        </td>
                                        <td>
                                            <?php echo $t["deskripsi"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $t["jumlah"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $t["tanggal_transaksi"]; ?>
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