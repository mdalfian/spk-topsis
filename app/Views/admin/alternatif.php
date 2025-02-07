<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
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
                        <th>Nama Alternatif</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($alternatif as $alt) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $alt->nama_alternatif ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" data-tooltip="tooltip" data-placement="bottom"
                                    title="Edit" data-toggle="modal"
                                    data-target="#editModal<?= $alt->id_alternatif ?>"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="bottom"
                                    title="Delete" onclick="hapus_alternatif(<?= $alt->id_alternatif ?>)"><i
                                        class="fas fa-trash"></i></button>
                            </td>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?= $alt->id_alternatif ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="<?= base_url('Admin/alternatif/edit/' . $alt->id_alternatif . '') ?>"
                                                method="post">
                                                <div class="control-group mb-3 col">
                                                    <label class="control-label" for="nama_alternatif">Nama
                                                        Alternatif</label>
                                                    <div class="controls">
                                                        <input type="text" name="nama_alternatif" id="nama_alternatif"
                                                            placeholder="Masukkan Nama Alternatif"
                                                            class="form-control bg-light small"
                                                            value="<?= $alt->nama_alternatif ?>" required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/alternatif/add') ?>" method="post">
                        <div class="control-group mb-3 col">
                            <label class="control-label" for="nama_alternatif">Nama
                                Alternatif</label>
                            <div class="controls">
                                <input type="text" name="nama_alternatif" id="nama_alternatif"
                                    placeholder="Masukkan Nama Alternatif" class="form-control bg-light small" required>
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