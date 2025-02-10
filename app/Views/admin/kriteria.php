<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
        </div>
        <div class="card-body">
            <!-- Add Button -->
            <button class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#addModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </button>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kriteria as $kri) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kri->kode_kriteria ?></td>
                            <td><?= $kri->nama_kriteria ?></td>
                            <td><?= $kri->bobot_kriteria ?></td>
                            <td><?= $kri->jenis_kriteria ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" data-tooltip="tooltip" data-placement="bottom"
                                    title="Edit" data-toggle="modal" data-target="#editModal<?= $kri->id_kriteria ?>"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="bottom"
                                    title="Delete" onclick="hapus_kriteria(<?= $kri->id_kriteria ?>)"><i
                                        class="fas fa-trash"></i></button>
                            </td>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?= $kri->id_kriteria ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="<?= base_url('Admin/kriteria/edit/' . $kri->id_kriteria . '') ?>"
                                                method="post">
                                                <div class="row">
                                                    <div class="control-group mb-3 col">
                                                        <label class="control-label" for="kode_kriteria">Kode
                                                            Kriteria</label>
                                                        <div class="controls">
                                                            <input type="text" name="kode_kriteria" id="kode_kriteria"
                                                                placeholder="Masukkan Kode Kriteria"
                                                                class="form-control bg-light small"
                                                                value="<?= $kri->kode_kriteria ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3 col">
                                                        <label class="control-label" for="nama_kriteria">Nama
                                                            Kriteria</label>
                                                        <div class="controls">
                                                            <input type="text" name="nama_kriteria" id="nama_kriteria"
                                                                placeholder="Masukkan Nama Kriteria"
                                                                class="form-control bg-light small"
                                                                value="<?= $kri->nama_kriteria ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="control-group mb-3 col">
                                                        <label class="control-label" for="bobot">Bobot</label>
                                                        <div class="controls">
                                                            <input type="text" name="bobot_kriteria" id="bobot"
                                                                placeholder="Masukkan Bobot"
                                                                class="form-control bg-light small"
                                                                value="<?= $kri->bobot_kriteria ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3 col">
                                                        <label class="control-label" for="jenis_kriteria">Nama
                                                            Kriteria</label>
                                                        <div class="controls">
                                                            <select name="jenis_kriteria" id="jenis_kriteria"
                                                                class="form-control bg-light small" required>
                                                                <option value="">Pilih...</option>
                                                                <option value="Benefit"
                                                                    <?= $kri->jenis_kriteria == 'Benefit' ? 'selected' : '' ?>>
                                                                    Benefit</option>
                                                                <option value="Cost"
                                                                    <?= $kri->jenis_kriteria == 'Cost' ? 'selected' : '' ?>>
                                                                    Cost</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning btn-icon-split mb-3">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
                                    <input type="text" name="bobot_kriteria" id="bobot" placeholder="Masukkan Bobot"
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