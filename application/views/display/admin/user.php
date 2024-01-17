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
                        <div class="col-md-5">
                            <form action="<?= base_url('controller_pengguna') ?>" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari data user..."
                                        name="keyword" autocomplete="off" autofocus>
                                    <input class="btn btn-gradient-dark" type="submit" name="submit">
                                </div>
                            </form>
                        </div>
                        <h6>Hasil :
                            <?= $total_rows; ?>
                        </h6>


                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>nama Lengkap</th>
                                    <th>Peran</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($pengguna as $p): ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$start; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["username"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["nama_lengkap"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $p["peran"]; ?>
                                        </td>
                                        <td>
                                         
                                        <a href="<?= base_url('controller_pengguna/edit/') . $p['user_Id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                
                                            <a href="<?php echo site_url('controller_pengguna/delete/' . $p['user_Id']); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('apakah data ingin dihapus?')">Hapus</a>
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




