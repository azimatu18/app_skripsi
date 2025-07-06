<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary">Data Staf</h4>
        <a href="#" class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="ti ti-user-plus"> </i> Tambah Staf
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_staf as $no => $staf): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1 ?></td>
                        <td><strong><?= $staf['nama'] ?></strong></td>
                        <td><span class="badge bg-secondary"><?= $staf['email'] ?></span></td>
                        <td><?= $staf['level'] ?></td>
                        <td class="text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $staf['id'] ?>" class="btn btn-sm btn-warning mb-1">
                                <i class="ti ti-edit"></i> Edit
                            </a>
                            <form action="<?= base_url('admin/staf/hapus/' . $staf['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus staf ini?');">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="ti ti-trash"></i> Hapus
                                </button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal Edit Staf-->
                    <div class="modal fade" id="exampleModal<?= $staf['id'] ?>" tabindex="-1" aria-labelledby="exampleModal<?= $staf['id'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModal<?= $staf['id'] ?>Label">Edit Akun Staf</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/staf/update/<?= $staf['id'] ?>" method="post">
                                        <label>Nama</label>
                                        <input type="text" class="form-control mb-2" name="nama" value="<?= $staf['nama'] ?>">
                                        <label>Email</label>
                                        <input type="email" class="form-control mb-2" name="email" value="<?= $staf['email'] ?>">
                                        <label>Password</label>
                                        <input type="password" class="form-control mb-2" name="password">
                                        <label>Level</label>
                                        <select name="level" class="form-control mb-2">
                                            <option value="pemasaran" <?= $staf['level'] != 'Staf Pemasaran' ?: 'selected' ?>>Pemasaran</option>
                                            <option value="operasional" <?= $staf['level'] != 'Staf Operasional' ?: 'selected' ?>>Operasional</option>
                                        </select>
                                        <button class="btn btn-primary">
                                            Simpan Perubahan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Tambah Staf-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun Staf</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/staf/submit" method="post">
                    <label>Nama</label>
                    <input type="text" class="form-control mb-2" name="nama" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    <label>Email</label>
                    <input type="email" class="form-control mb-2" name="email" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    <label>Password</label>
                    <input type="password" class="form-control mb-2" name="password" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    <label>Level</label>
                    <select name="level" class="form-control mb-2">
                        <option value="pemasaran">Pemasaran</option>
                        <option value="operasional">Operasional</option>
                    </select>
                    <button class="btn btn-primary">
                        Buat Akun Staf
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>