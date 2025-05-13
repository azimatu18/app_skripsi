<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary"><i class="bi bi-person-lines-fill me-2"></i>Chat Konsumen</h4>
    </div>

    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="card" id="chat3" style="border-radius: 15px;">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                                    <div class="p-3">

                                        <div data-mdb-perfect-scrollbar-init style="position: relative; height: 500px; overflow-y: scroll;">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                foreach ($konsumen as $data):
                                                    $pesan_terakhir = $data->chat_konsumen()->orderBy('waktu', 'desc')->first();
                                                ?>
                                                    <li class="p-2 border-bottom">
                                                        <a href="?id=<?= $data->id ?>" class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row">
                                                                <div>
                                                                    <img
                                                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                        alt="avatar" class="d-flex align-self-center me-3" width="60">
                                                                    <span class="badge bg-success badge-dot"></span>
                                                                </div>
                                                                <div class="pt-1">
                                                                    <p class="fw-bold mb-0"><?= $data->nama ?></p>
                                                                    <?php if ($pesan_terakhir): ?>
                                                                        <p class="small text-muted"><?= $pesan_terakhir->pesan ?></p>
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                            <div class="pt-1">
                                                                <?php if ($pesan_terakhir): ?>
                                                                    <p class="small text-muted mb-1"><?= date('H:i', strtotime($pesan_terakhir->waktu)) ?></p>
                                                                <?php endif ?>
                                                                <!-- <span class="badge bg-danger rounded-pill float-end">3</span> -->
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-7 col-xl-8">
                                    <?php if ($idKonsumen = service('request')->getGet('id')): ?>
                                        <div class="p-3 bg-secondary rounded text-white">Chat dengan Azi</div>
                                        <div class="p-3" id="data-chat" data-mdb-perfect-scrollbar-init
                                            style="position: relative; height: 500px; overflow-y: scroll;">
                                            <?php
                                            foreach (App\Models\ChatModel::where('konsumen_id', $idKonsumen)->get() as $chat):
                                            ?>
                                                <?php if ($chat->user_id): ?>
                                                    <!-- untuk pemasaran -->
                                                    <div class="d-flex flex-row justify-content-start">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                                        <div>
                                                            <p class="small p-2 ms-3 mb-1 rounded-3 bg-light"><?= $chat->pesan ?></p>
                                                            <p class="small ms-3 mb-3 rounded-3 text-muted"><?= $chat->waktu ?></p>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <!-- untuk konsumen -->
                                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                        <div>
                                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary"><?= $chat->pesan ?></p>
                                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end"><?= $chat->waktu ?></p>
                                                        </div>
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>

                                        <form action="/chat/tambah" method="post" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                            <input type="text" name="pesan" class="form-control form-control-lg" id="exampleFormControlInput1"
                                                placeholder="Type message">
                                                <input type="hidden" name="konsumen" value="<?= $idKonsumen ?>">
                                            <button class="btn btn-light ms-3" href="#!"><i class="ti ti-send"></i></button>
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const chatBody = document.getElementById('data-chat');
                                                if (chatBody) {
                                                    chatBody.scrollTop = chatBody.scrollHeight;
                                                }
                                            });
                                        </script>
                                    <?php else: ?>
                                        <div class="p-5 border">
                                            <h5>Silahkan Pilih user di sebelah kiri untuk membuka chat</h5>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->endSection() ?>