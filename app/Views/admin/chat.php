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
                                                                        src="/homepage/images/user.png"
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
                                    <?php if ($idKonsumen = service('request')->getGet('id')):
                                        $nama = \App\Models\UserModel::find($idKonsumen)?->nama;
                                    ?>
                                        <div class="p-3 bg-secondary rounded text-white">Chat dengan <?= esc($nama) ?></div>
                                        <div class="p-3" id="chat-body" data-mdb-perfect-scrollbar-init
                                            style="position: relative; height: 500px; overflow-y: scroll;">

                                        </div>

                                        <form id="form-chat" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                            <img src="/admin/images/profile/admin.png"
                                                alt="avatar 3" style="width: 40px; height: 100%;">
                                            <input type="hidden" id="form-chat-last_id" value="0">
                                            <input type="text" name="pesan" class="form-control form-control-lg" id="form-chat-pesan"
                                                placeholder="Ketik pesan" required>
                                            <input type="hidden" id="konsumen_id" value="<?= $idKonsumen ?>">
                                            <button class="btn btn-light ms-3" href="#!"><i class="ti ti-send"></i></button>
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const chatBody = document.getElementById('chat-body');
                                                if (chatBody) {
                                                    chatBody.scrollTop = chatBody.scrollHeight;
                                                }
                                            });
                                        </script>


                                        <script src="/jquery.min.js"></script>

                                        <script>
                                            //untuk ajax chat
                                            $(document).ready(function() {
                                                $('#form-chat').on('submit', function(e) {
                                                    e.preventDefault();
                                                    let pesan = $('#form-chat-pesan').val()
                                                    let konsumen = $('#konsumen_id').val()
                                                    let now = new Date();
                                                    let waktu = now.getHours() + ":" + now.getMinutes()
                                                    $.post('/chat/tambah', {
                                                        pesan: pesan,
                                                        konsumen: konsumen
                                                    }, function(result) {
                                                        $('#form-chat-last_id').val(result.last_id)
                                                        $('#form-chat-pesan').val('')
                                                        $('#chat-body').append(`
                                                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                                <div>
                                                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${pesan}</p>
                                                                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${waktu}</p>
                                                                </div>
                                                                <img src="/admin/images/profile/admin.png"
                                                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                                            </div>
                                                        `)
                                                        const chatBody = document.getElementById('chat-body');
                                                        if (chatBody) {
                                                            chatBody.scrollTop = chatBody.scrollHeight;
                                                        }
                                                    })
                                                })

                                                setInterval(function() {
                                                    var last_id = $('#form-chat-last_id').val()
                                                    let konsumen = $('#konsumen_id').val()
                                                    $.get('/chat/load', {
                                                        last_id: last_id,
                                                        konsumen: konsumen
                                                    }, function(result) {
                                                        let data = result.chat
                                                        data.forEach(chat => {
                                                            $('#form-chat-last_id').val(chat.id)
                                                            if (chat.user_id) {
                                                                $('#chat-body').append(`
                                                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                                                        <div>
                                                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${chat.pesan}</p>
                                                                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${chat.waktu}</p>
                                                                        </div>
                                                                        <img src="/admin/images/profile/admin.png"
                                                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                                                    </div>
                                                                `)
                                                            } else {
                                                                $('#chat-body').append(`
                                                                <div class="d-flex flex-row justify-content-start">
                                                                            <img src="/homepage/images/user.png"
                                                                                alt="avatar 1" style="width: 45px; height: 100%;">
                                                                            <div>
                                                                                <p class="small p-2 ms-3 mb-1 rounded-3 bg-light">${chat.pesan}</p>
                                                                                <p class="small ms-3 mb-3 rounded-3 text-muted">${chat.waktu}</p>
                                                                            </div>
                                                                        </div>
                                                                `)
                                                            }

                                                            const chatBody = document.getElementById('chat-body');
                                                            if (chatBody) {
                                                                chatBody.scrollTop = chatBody.scrollHeight;
                                                            }
                                                        });
                                                    })
                                                }, 1000)
                                            })
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