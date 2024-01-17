<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>

    </div>
      <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="<?= base_url('assets/') ?>/images/dashboard/circle.svg" class="card-img-absolute"
              alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jumlah Kegiatan <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp
                        <?php echo number_format($transaksi['total'], 2, ',', '.'); ?> </h2>
            <h6 class="card-text">Selama 5 Tahun</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="<?= base_url('assets/') ?>/images/dashboard/circle.svg" class="card-img-absolute"
              alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Pengeluaran <i
                class="mdi mdi-trending-down mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?php echo number_format($pengeluaran['total_keluar'], 2, ',', '.'); ?> </h2>
            <h6 class="card-text">Selama 5 tahun</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="<?= base_url('assets/') ?>/images/dashboard/circle.svg" class="card-img-absolute"
              alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Dana Tersisa <i class="mdi mdi-tooltip-edit mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?php echo number_format($sisa, 2, ',', '.'); ?> </h2>
            <h6 class="card-text">Pada tahun 2023</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">Traffic pengeluaran & pemasukan</h4>
              <h6 >Pada tahun 2020</h6>
              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right">
              </div>
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Traffic Berdasarkan tahun</h4>
            <canvas id="traffic-chart"></canvas>
            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Status Dana terkini</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Dana </th>
                    <th> Kategori </th>
                    <th> Tipe </th>
                    <th> Jatuh Tempo </th>
                    <th> Jumlah Terkumpul </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Bantuan Bencana Palestina
                    </td>
                    <td> Bantuan </td>
                    <td>
                      <label class="badge badge-gradient-info">Pengeluaran</label>
                    </td>
                    <td> 6 Desember 2021 </td>
                    <td> Rp.240.032 </td>
                  </tr>
                  <tr>
                    <td>
                      iuaran Bulan juni 2023
                    </td>
                    <td> iuaran</td>
                    <td>
                      <label class="badge badge-gradient-success">Pemasukan</label>
                    </td>
                    <td> 9 Juni 2023</td>
                    <td> Rp130.234 </td>
                  </tr>
                  <tr>
                    <td>
                      Sumbangan Fakir Miskin
                    </td>
                    <td> Bantuan </td>
                    <td>
                      <label class="badge badge-gradient-info">Pengeluaran</label>
                    </td>
                    <td> 12 January 2019 </td>
                    <td> Rp200.120 </td>
                  </tr>
                  <tr>
                    <td>
                      Sumbangan Panti Asuhan Porwo
                    </td>
                    <td> Bantuan </td>
                    <td>
                      <label class="badge badge-gradient-info">Pengeluaran</label>
                    </td>
                    <td> 17 Juli 2018 </td>
                    <td> Rp70.200 </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan1.jpg" class="mb-2 mw-100 w-100 rounded"
                  alt="image">
                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan2.jpg" class="mw-100 w-100 rounded"
                  alt="image">
              </div>
              <div class="col-6 ps-1">
                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan3.jpg" class="mb-2 mw-100 w-100 rounded"
                  alt="image">
                <img src="<?= base_url('assets/') ?>/images/dashboard/bantuan4.jpg" class="mw-100 w-100 rounded"
                  alt="image">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>