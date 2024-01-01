<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">


        <!-- Navbar -->
        <?php $this->load->view("layouts/navbar.php") ?>

        <!-- end header section -->
        <div class="container px-3" :class="[$store.app.animation]">
            <!-- start main content section -->

            <!-- Desktop -->
            <div class="mt-10">
                <div>
                    <a href="javascript:void(0);" onclick="window.history.go(-1);" class="flex items-center justify-start mb-10 gap-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                            <path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12" />
                        </svg>
                        <h1 class="text-base">Kembali</h1>
                    </a>
                </div>
                <div class="lg:block hidden">
                    <div class="lg:flex hidden gap-5 border-b-2 pb-5">
                        <div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
                            <iconify-icon icon="material-symbols:work" class="text-white" width="25"></iconify-icon>
                        </div>
                        <!-- Main Frame-->
                        <?php foreach ($riwayat as $r) : ?>
                            <!-- Header -->
                            <div class="w-full">
                                <div class="flex items-center justify-between">
                                    <h1 class="text-2xl font-bold mb-auto"><?= $r['nama_pekerjaan']; ?></h1>

                                    <div class="flex items-center font-semibold gap-3 mt-2 text-primary">
                                        <iconify-icon icon="vaadin:office" width="20"></iconify-icon>
                                        <p class="text-base"><?= $r['nama_perusahaan']; ?></p>
                                    </div>
                                </div>
                                <div class="flex items-center font-semibold gap-3 mt-2">
                                    <iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
                                    <p class="text-base"><?= $r['tipe_kerja'] ?> &nbsp;
                                    <ul style="list-style-type:disc;">
                                        <li><?= $r['kebijakan'] ?></li>
                                    </ul>
                                    </p>
                                </div>
                                <div class="flex items-center font-semibold gap-3 mt-2">
                                    <iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
                                    <p class="text-base">IDR <?= $r['gaji'] ?>/ Bulan</p>
                                </div>


                                <div class="flex items-center font-semibold gap-3 mt-2">
                                    <iconify-icon icon="carbon:location" width="22"></iconify-icon>
                                    <p class="text-base"><?= $r['lokasi']  ?> | <?= ucwords($r['kota']) . ', ' . ucwords($r['kabupaten']) . ', ' . ucwords($r['provinsi']) ?></p>
                                </div>

                                <!-- <div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="mdi:worker" width="22"></iconify-icon>
									<p class="text-base">Pengalaman kurang dari <?= $r['pengalaman'] ?> Tahun</p>
								</div> -->

                                <div class="flex items-center font-semibold gap-3 mt-2">
                                    <iconify-icon icon="mingcute:time-fill" width="22"></iconify-icon>
                                    <p class="text-base"><?= $r['hari_kerja'] ?> / <?= $r['jam_kerja'] ?></p>
                                </div>
                                <?php
                                if ($r['status'] == '1') {
                                ?>
                                    <div x-data="modal">
                                        <button class="btn btn-success mt-10 px-16" @click="toggle">
                                            Diterima
                                        </button>
                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                                    <div class="flex py-2 bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-center">
                                                        <span class="flex items-center justify-center w-16 h-16 rounded-full bg-[#f1f2f3] dark:bg-white/10">
                                                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                <path opacity="0.5" d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="p-5">
                                                        <div class="py-5 text-white-dark text-center">
                                                            <p>Edo Ganteng Abiez</p>
                                                        </div>
                                                        <div class="flex justify-end items-center mt-8">
                                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else if ($r['status'] == '2') {
                                ?>
                                    <div x-data="modal">
                                        <button class="btn btn-danger mt-10 px-16" @click="toggle">
                                            Tidak Diterima
                                        </button>
                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                                                    <div class="flex py-2 bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-center">
                                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                                            <span class="flex items-center justify-center w-16 h-16 rounded-full bg-[#f1f2f3] dark:bg-white/10">
                                                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
                                                                    <path opacity="0.5" d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                                </svg>
                                                            </span>
                                                    </div>
                                                    <div class="p-5">
                                                        <div class="py-5 text-white-dark text-center">
                                                            <strong>
                                                                <p>Maaf anda belum mendapatkan kesempatan pada pekerjaan ini,
                                                                    Semangat ye siane</p>
                                                            </strong>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else if ($r['status'] == '0') {
                                ?>
                                    <?php
                                    $encrypted_id = urlencode(base64_encode($this->encryption->encrypt($r['id_lamaran']))); ?>
                                    <button class=" btn btn-danger mt-10 px-16">
                                        <a href="<?= base_url('lamaran/batal_lamar/' . $encrypted_id) ?>">
                                            Batal Lamar
                                        </a>
                                    </button>
                                <?php
                                }
                                ?>

                            </div>
                    </div>

                    <!-- Persyaratan -->
                    <div class=" block">
                        <div class="mt-5">
                            <h1 class="text-xl font-bold">Persyaratan</h1>
                        </div>
                        <div class="flex items-center mt-3 gap-3">
                            <span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari <?= $r['pengalaman'] ?> Tahun</span>
                            <span class="badge badge-outline-primary rounded-md text-center py-3"><?= $r['pendidikan'] ?></span>
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="block mt-5">
                        <h1 class="text-xl font-bold">Skill yang harus dimiliki</h1>
                        <div class="flex items-center mt-3 gap-3">

                            <?php $dataarray = explode(" ", $r['skills']);
                            foreach ($dataarray as $data) {
                                $arrayd = explode(" ", $data);
                                $kataAcak = $arrayd[array_rand($arrayd)];
                                echo '<span class="badge badge-outline-primary rounded-md text-center py-3">' . str_replace('_', ' ', ucwords($kataAcak)) . '</span>';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Tunjangan & Keuntungan -->
                    <?php if (empty($r['tunjangan'])) : ?>
                    <?php else : ?>
                        <div class="block mt-10">
                            <h1 class="text-xl font-bold ">Tunjangan Dan Keuntungan</h1>
                            <div class="grid lg:grid-cols-32 mt-3 gap-5">
                                <!-- Tunjangan  -->
                                <div class="w-full p-5 bg-info-light rounded-lg">
                                    <div class="flex gap-5">
                                        <div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
                                        </div>
                                        <p>
                                            <?= $r['tunjangan'] ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if (empty($r['keuntungan'])) : ?>
                            <?php else : ?>
                                <!-- Keuntungan  -->
                                <div class="w-full p-5 bg-info-light rounded-lg">
                                    <div class="flex gap-5">
                                        <div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
                                        </div>
                                        <p>

                                            <?= $r['keuntungan']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <!-- Deskripsi -->
                    <div class="block mt-10">
                        <h1 class="font-bold text-lg">Deskripsi Pekerjaan <?= $r['nama_pekerjaan']; ?> <?= $r['nama_perusahaan']; ?></h1>
                        <div class="mt-5">
                            <ul class=" space-y-1 list-disc list-inside text-base flex flex-col gap-5">
                                <?= $r['deskripsi']; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile & Tablet -->
            <div class="mt-10">
                <div class="md:block lg:hidden gap-5">

                    <div class="flex gap-4 border-b-2 pb-5">
                        <div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
                            <iconify-icon icon="material-symbols:work" class="text-white" width="25"></iconify-icon>
                        </div>
                        <div class="block items-center justify-between">
                            <h1 class="text-2xl font-bold mb-auto"><?= $r['nama_pekerjaan']; ?></h1>

                            <div class="flex items-center font-semibold gap-3 mt-2 text-primary">
                                <iconify-icon icon="vaadin:office" width="20"></iconify-icon>
                                <p class="text-base"><?= $r['nama_perusahaan']; ?></p>
                            </div>

                        </div>
                        <hr />
                    </div>

                    <!-- Main Frame-->
                    <div class="w-full mt-5">

                        <div>
                            <div class="flex items-center font-semibold gap-3 mt-2">
                                <iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
                                <p class="text-base">IDR <?= $r['benefit'] ?> / Bulan</p>
                            </div>

                            <div class="flex items-center font-semibold gap-3 mt-2">
                                <iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
                                <p class="text-base"><?= $r['jam_kerja'] ?></p>
                            </div>

                            <div class="flex items-center font-semibold gap-3 mt-2">
                                <iconify-icon icon="mdi:education-outline" width="22"></iconify-icon>
                                <p class="text-base">Minimal SMA / SMK</p>
                            </div>

                            <div class="flex items-center font-semibold gap-3 mt-2">
                                <iconify-icon icon="mdi:worker" width="22"></iconify-icon>
                                <p class="text-base">Pengalaman kurang dari <?= $r['pengalaman'] ?></p>
                            </div>

                            <div class="flex items-center font-semibold gap-3 mt-2">
                                <iconify-icon icon="mingcute:time-fill" width="22"></iconify-icon>
                                <p class="text-base">Senin - Jumat / 07:00 - 16:00</p>
                            </div>
                        </div>


                        <!-- Persyaratan -->
                        <div class="block mt-10">
                            <h1 class="text-xl font-bold">Persyaratan</h1>
                            <div class="grid grid-cols-2 mt-3 gap-3">
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari <?= $r['pengalaman'] ?></span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Minimal SMA / SMK</span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Figma</span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Adobe XD</span>
                            </div>
                        </div>

                        <!-- Skills -->
                        <div class="block mt-5">
                            <h1 class="text-xl font-bold">Skill</h1>
                            <div class="flex items-center mt-3 gap-3">
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Adobe XD</span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Figma</span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Manajemen Waktu</span>
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Kreatif</span>
                            </div>
                        </div>

                        <!-- Tunjangan & Keuntungan -->
                        <div class="block mt-10">
                            <h1 class="text-xl font-bold ">Tunjangan Dan Keuntungan</h1>
                            <div class="grid grid-cols-1 mt-3 gap-5">

                                <!-- Tunjangan 1 -->
                                <div class="w-full p-5 bg-info-light rounded-lg">
                                    <div class="flex gap-5">
                                        <div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
                                        </div>
                                        <p>
                                            Perusahaan dapat menyediakan dana untuk pelatihan tambahan, kursus online, atau konferensi
                                            terkait
                                            desain UI/UX. Ini membantu para desainer untuk tetap terkini dengan tren terbaru dan teknologi
                                            baru dalam industri.
                                        </p>
                                    </div>
                                </div>

                                <!-- Tunjangan 2 -->
                                <div class="w-full p-5 bg-info-light rounded-lg">
                                    <div class="flex gap-5">
                                        <div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
                                        </div>
                                        <p>
                                            Beberapa perusahaan menawarkan fleksibilitas dalam waktu kerja, seperti jam kerja yang
                                            fleksibel,
                                            bekerja dari rumah, atau jadwal kerja yang bisa disesuaikan, memungkinkan desainer untuk
                                            menyesuaikan kehidupan kerja dengan kebutuhan pribadi mereka.
                                        </p>
                                    </div>
                                </div>

                                <!-- Tunjangan 3 -->
                                <div class="w-full p-5 bg-info-light rounded-lg">
                                    <div class="flex gap-5">
                                        <div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
                                        </div>
                                        <p>
                                            Paket asuransi kesehatan yang komprehensif, yang mencakup kesehatan fisik dan mental, seringkali
                                            menjadi tunjangan yang sangat dihargai oleh para pekerja.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="block mt-10 mx-auto">
                            <h1 class="font-bold text-lg">Deskripsi Pekerjaan <?= $r['nama_pekerjaan']; ?> <?= $r['nama_perusahaan']; ?></h1>
                            <div class="mt-5">
                                <ul class="max-w-md space-y-1 list-disc list-inside text-base flex flex-col gap-5">
                                    <li>Melakukan wawancara, survei, dan observasi untuk memahami kebutuhan pengguna.</li>
                                    <li>Menganalisis data untuk menemukan pola perilaku pengguna.</li>
                                    <li>Membuat persona pengguna untuk memahami karakteristik target audiens.</li>
                                    <li>Merancang sketsa, wireframe, dan prototype untuk menggambarkan pengalaman pengguna.</li>
                                    <li>Mengidentifikasi alur kerja (workflow) dan perancangan tata letak (layout) yang efisien.</li>
                                    <li>Menciptakan desain yang intuitif dan mudah dipahami oleh pengguna.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- end main content section --

		<!-- Footer -->
    <?php $this->load->view("layouts/footer.php") ?>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("modal", (initialOpenState = false) => ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    </script>
    <!-- <script>
        async function showAlert(event) {
            event.preventDefault(); // Mencegah tindakan default dari tautan

            const result = await new window.Swal({
                icon: 'warning',
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonText: 'Apply',
                padding: '2em',
            });

            if (result.value) {
                // Arahkan pengguna ke URL penghapusan setelah konfirmasi diterima
                window.location.href = event.target.getAttribute('href');

            }
        }
    </script> -->
    <script src="<?php echo base_url("assets/js/cstm.js") ?>"></script>

    <?php $this->load->view("_partials/script.php") ?>
</body>

</html>