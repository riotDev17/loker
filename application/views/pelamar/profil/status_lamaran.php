<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- screen loader -->
    <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
            <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
            </path>
            <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
    <!-- scroll to top button -->
    <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button" class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary" @click="goToTop">
                <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z" fill="currentColor" />
                    <path d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z" fill="currentColor" />
                </svg>
            </button>
        </template>
    </div>


    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <div class="flex flex-col min-h-screen">

            <!-- start header section -->
            <?php $this->load->view("layouts/navbar.php") ?>

            <!-- end header section -->

            <!-- start main content section -->
            <div class="animate__animated p-6 container" :class="[$store.app.animation]">
                <div>
                    <!-- start main content section -->
                    <div>
                        <div>
                            <a href="javascript:void(0);" onclick="window.history.go(-1);" class="flex items-center justify-start mb-10 gap-5">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12" />
                                </svg>
                                <h1 class="text-base">Kembali</h1>
                            </a>
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <h2 class="text-xl">Status Job</h2>
                        </div>
                        <div class="panel mt-5 overflow-hidden border-0 p-0">
                            <div>
                                <div class="table-responsive">
                                    <table class="table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="font-bold">Nama Pekerjaan</th>
                                                <th class="font-bold">Nama Perusahaan</th>
                                                <th class="font-bold">Gaji</th>
                                                <th class="font-bold">Durasi Kerja</th>
                                                <th class="font-bold">Status</th>
                                                <th class="!text-center font-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div>
                                                <?php foreach ($lamaran as $item) : ?>
                                                    <tr>

                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $item['nama_pekerjaan'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $item['nama_perusahaan'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $item['gaji'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $item['tipe_kerja'] ?></div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <?php
                                                                if ($item['status'] == '1') {
                                                                ?>
                                                                    <div class="btn btn-sm btn-success">Diterima</div>
                                                                <?php
                                                                } else if ($item['status'] == '2') {
                                                                ?>
                                                                    <div class="btn btn-sm btn-danger">Tidak Diterima</div>
                                                                <?php
                                                                } else if ($item['status'] == '0') {
                                                                ?>
                                                                    <div class="btn btn-sm btn-warning">Proses</div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <?php
                                                            $encrypted_id = urlencode(base64_encode($this->encryption->encrypt($item['id_lamaran']))); ?>
                                                            <div class="flex items-center justify-center gap-4">
                                                                <a href="<?= base_url('status/detail/') ?><?= $encrypted_id ?>/<?= url_title($item['nama_pekerjaan']); ?>">
                                                                    <button type="button" class="btn btn-sm btn-outline-success">
                                                                        Lihat
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    <?php endforeach ?>
                                                    </tr>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end main content section -->
                </div>
            </div>
            <!-- end main content section -->

            <!-- start footer section -->
            <div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                © <span id="footer-year">2023</span>. Thomas Alberto All rights reserved.
            </div>
            <!-- end footer section -->
        </div>
    </div>
    <?php if ($this->session->flashdata('error')) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toast = window.Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em',
                });

                toast.fire({
                    icon: 'error',
                    title: '<?= $this->session->flashdata('error') ?>',
                    padding: '2em',
                });
            });
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toast = window.Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em',
                });

                toast.fire({
                    icon: 'success',
                    title: '<?= $this->session->flashdata('success') ?>',
                    padding: '2em',
                });
            });
        </script>
    <?php endif; ?>
    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script defer src="assets/js/apexcharts.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false
            }));

            // sidebar section
            Alpine.data('sidebar', () => ({
                init() {
                    const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.click();
                                });
                            }
                        }
                    }
                }
            }));

            // header section
            Alpine.data('header', () => ({
                init() {
                    const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.classList.add('active');
                                });
                            }
                        }
                    }
                },
            }));
        });
    </script>
</body>

</html>