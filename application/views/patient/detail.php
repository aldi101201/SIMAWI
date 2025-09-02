<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="record_number">Rekam Medis</label>
                            <h5 class="card-title form-control">
                                <?=$patient['record_number']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <h5 class="card-title form-control">
                                <?=$patient['name']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="birth">Tanggal lahir</label>
                            <h5 class="card-title form-control">
                                <?=$patient['birth']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <h5 class="card-title form-control">
                                <?=$patient['nik']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <h5 class="card-title form-control">
                                <?=$patient['phone']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <h5 class="card-title form-control">
                                <?=$patient['address']; ?>
                            </h5>
                        </div>
                        <div class="form-froup">
                            <label for="blood_type">Gol. Darah</label>
                            <h5 class="card-title form-control">
                                <?=$patient['blood_type']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="weight">Berat Badan</label>
                            <h5 class="card-title form-control">
                                <?=$patient['weight']; ?>
                            </h5>
                        </div>
                        <div class="form-group">
                            <label for="height">Tinggi Badan</label>
                            <h5 class="card-title form-control">
                                <?=$patient['height']; ?>
                            </h5>
                        </div>
                        <a href="<?= base_url('patient');?>" class="btn btn-primary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>