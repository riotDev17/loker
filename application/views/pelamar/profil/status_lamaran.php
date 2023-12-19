<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

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
                                                <th class="font-bold">Alamat</th>
                                                <th class="!text-center font-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div>
                                                <tr>
                                                    <td>
                                                        <div class="flex w-max items-center">
                                                            <div>UI / UX Designer</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex w-max items-center">
                                                            <div>PT. Orang Ganteng</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex w-max items-center">
                                                            <div>IDR3.000.000 - 8.000.000 / Bulan</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex w-max items-center">
                                                            <div>Penuh Waktu</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex w-max items-center">
                                                            <div>Jl.Imam Bonjol</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center justify-center gap-4">
                                                            <a href="<?= base_url('status/detail') ?>">
                                                                <button type="button" class="btn btn-sm btn-outline-success">
                                                                    Lihat
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
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