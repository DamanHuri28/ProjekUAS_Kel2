<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
        </div>

        <div class="col-md-12 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="<?= base_url('assets/') ?>/images/dashboard/circle.svg" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Sumbangan <i
                            class="mdi mdi-trending-down mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Rp
                        <?php echo number_format($transaksi['total_sum'], 2, ',', '.'); ?>
                    </h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <?php echo $this->session->flashdata('message'); ?>
                        <h4 class="card-title">Reminder Pembayaran</h4>
                        <?php if (!empty($pengingat_pembayaran)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Sosial </th>
                                            <th> Jatuh Tempo </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengingat_pembayaran as $index => $p): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $index + 1; ?>
                                                </td>
                                                <td>
                                                    <?php echo $p->deskripsi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $p->tanggal_jatuh_tempo; ?>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>Tidak ada Pembayaran Yang Harus Dilakukan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dokumentasi</h4>
                        <div class="d-flex">
                            <div class="d-flex align-items-center text-muted font-weight-light">
                                <i class="mdi mdi-clock icon-sm me-2"></i>
                                <span>2018-2021</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 pe-1">
                                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan1.jpg"
                                    class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan2.jpg"
                                    class="mw-100 w-100 rounded" alt="image">
                            </div>
                            <div class="col-6 ps-1">
                                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan3.jpg"
                                    class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan4.jpg"
                                    class="mw-100 w-100 rounded" alt="image">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>