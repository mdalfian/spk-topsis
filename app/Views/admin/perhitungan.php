<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Metrik Keputusan (X)</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <?php foreach ($kriteria as $kri) : ?>
                            <th class="text-center"><?= $kri->kode_kriteria ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($perhitungan as $per) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $per->nama_alternatif ?></td>
                                <?php foreach ($kriteria as $kri) : ?>
                                    <?php foreach ($penilaian as $nilai) : ?>
                                        <?php if ($nilai->id_kriteria == $kri->id_kriteria && $nilai->id_alternatif == $per->id_alternatif) : ?>
                                            <td class="text-center"><?= $nilai->nilai ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria (W)</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <?php foreach ($kriteria as $kri) : ?>
                            <th class="text-center"><?= $kri->kode_kriteria ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($kriteria as $kri) : ?>
                                <?php foreach ($kriteria as $kr) : ?>
                                    <?php if ($kri->id_kriteria == $kr->id_kriteria) : ?>
                                        <td class="text-center"><?= $kr->bobot_kriteria ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi (R)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <?php foreach ($kriteria as $kri) : ?>
                            <th class="text-center"><?= $kri->kode_kriteria ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        <?php foreach ($perhitungan as $per) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $per->nama_alternatif ?></td>
                                <?php foreach ($kriteria as $kri) : ?>
                                    <?php foreach ($penilaian as $nilai) : ?>
                                        <?php if ($nilai->id_kriteria == $kri->id_kriteria && $nilai->id_alternatif == $per->id_alternatif) : ?>
                                            <?php foreach ($total as $tot) : ?>
                                                <?php if ($nilai->id_kriteria == $tot->id_kriteria) : ?>
                                                    <td class="text-center"><?= normalisasi($nilai->nilai, $tot->total) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Y</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <?php foreach ($kriteria as $kri) : ?>
                            <th class="text-center"><?= $kri->kode_kriteria ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        <?php foreach ($perhitungan as $per) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $per->nama_alternatif ?></td>
                                <?php foreach ($kriteria as $kri) : ?>
                                    <?php foreach ($penilaian as $nilai) : ?>
                                        <?php if ($nilai->id_kriteria == $kri->id_kriteria && $nilai->id_alternatif == $per->id_alternatif) : ?>
                                            <?php foreach ($total as $tot) : ?>
                                                <?php if ($nilai->id_kriteria == $tot->id_kriteria) : ?>
                                                    <td class="text-center">
                                                        <?= normalisasi($nilai->nilai, $tot->total) * $kri->bobot_kriteria ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solusi Ideal Positif A<sup>+</sup></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <?php $terbobot = []; ?>
                        <?php foreach ($kriteria as $kri) : ?>
                            <th class="text-center"><?= $kri->kode_kriteria ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach ($penilaian as $pen) {
                                foreach ($kriteria as $krit) {
                                    foreach ($total as $tott) {
                                        if ($krit->id_kriteria == $pen->id_kriteria && $tott->id_kriteria == $krit->id_kriteria) {
                                            array_push($terbobot, $pen->nilai);
                                        }
                                    }
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <?php print_r($terbobot) ?>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/kriteria/add') ?>" method="post">
                        <div class="row">
                            <div class="control-group mb-3 col">
                                <label class="control-label" for="kode_kriteria">Kode Kriteria</label>
                                <div class="controls">
                                    <input type="text" name="kode_kriteria" id="kode_kriteria"
                                        placeholder="Masukkan Kode Kriteria" class="form-control bg-light small"
                                        required>
                                </div>
                            </div>
                            <div class="control-group mb-3 col">
                                <label class="control-label" for="nama_kriteria">Nama Kriteria</label>
                                <div class="controls">
                                    <input type="text" name="nama_kriteria" id="nama_kriteria"
                                        placeholder="Masukkan Nama Kriteria" class="form-control bg-light small"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group mb-3 col">
                                <label class="control-label" for="bobot">Bobot</label>
                                <div class="controls">
                                    <input type="number" name="bobot_kriteria" id="bobot" placeholder="Masukkan Bobot"
                                        class="form-control bg-light small" required>
                                </div>
                            </div>
                            <div class="control-group mb-3 col">
                                <label class="control-label" for="jenis_kriteria">Nama Kriteria</label>
                                <div class="controls">
                                    <select name="jenis_kriteria" id="jenis_kriteria"
                                        class="form-control bg-light small" required>
                                        <option value="" selected>Pilih...</option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split mb-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection() ?>