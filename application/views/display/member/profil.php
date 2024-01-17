<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profil</h4>
                        <div class="row no-gutters">
                        <img src="<?= base_url('assets/images/faces/default.png') . $pengguna['gambar']; ?>" class="card-img">
                            <div class="col-md-16">
                                <div class="card-body">
                                    <hs class="card-title"><?=$pengguna['username']; ?></hs>
                                    <p class="card-text">Nama : <?=$pengguna['nama_lengkap']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>