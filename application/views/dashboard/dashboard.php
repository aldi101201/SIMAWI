<?php include('application/views/layout/header.php'); ?>

<div class="container mt-3">
    <h2>Dashboard</h2>


    <div class="card mb-3">
        <div class="card-header">Kode ICD terbanyak</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode ICD</th>
                        <th>Deskripsi Penyakit</th>
                        <th>Jumlah Kasus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top_icd_code as $icd): ?>
                    <tr>
                        <td><?= $icd->icd10_code; ?></td>
                        <td><?= $icd->icd_description ? $icd->icd_description : '-'; ?></td>
                        <!-- Gunakan deskripsi jika ada -->
                        <td><?= $icd->count; ?> Kasus</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card mb-3">
        <div class="card-header">Pasien Terbaru</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor RM</th>
                        <th>Nama</th>
                        <th>Tanggal Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_patient as $patient): ?>
                    <tr>
                        <td><?= $patient->record_number; ?></td>
                        <td><?= $patient->name; ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($patient->created_at)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('application/views/layout/footer.php'); ?>