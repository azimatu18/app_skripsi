<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary">Data Konsumen</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($konsumen as $no => $data): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1 ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['email'] ?></td>
                    </tr>


                    <!-- Modal -->
                    <!-- <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModal<?= $data['id'] ?>Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModal<?= $data['id'] ?>Label">reset Password <?= $data['nama'] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/konsumen/reset-password/<?= $data['id'] ?>" method="post">
                                                <label>Password</label>
                                                <input type="text" class="form-control mb-2" name="password" value="12345678">
                                                <button class="btn btn-primary">
                                                    Reset password
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>