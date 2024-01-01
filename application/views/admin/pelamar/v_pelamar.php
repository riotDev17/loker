<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/style.css" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/animate.css" />
    <script src="<?= base_url() ?>assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/tippy-bundle.umd.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/nice-select2.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/quill.snow.css" />
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
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>


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
        <!-- start sidebar section -->
        <?php $this->load->view("/admin/layouts/sidebar.php") ?>

        <!-- end sidebar section -->

        <div class="main-content flex min-h-screen flex-col">
            <!-- start header section -->
            <?php $this->load->view("admin/layouts/navbar.php") ?>

            <!-- end header section -->


            <!-- start main content section -->
            <div class="animate__animated p-6" :class="[$store.app.animation]">
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="javascript:;" class="text-primary hover:underline">Detail</a>
                        </li>
                    </ul>

                    <?php foreach ($pelamar as $p) : ?>
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <h2 class="text-xl mt-5">Detail <?= $p['nama'] ?></h2>
                        </div>


                        <!-- MAIN -->
                        <form action="" class="mt-10">
                            <!-- Nama Lengkap -->
                            <div class="mb-5">
                                <label for="inputLarge">Nama Lengkap</label>
                                <input id="inputLarge" type="text" value="<?= $p['nama'] ?>" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                            </div>

                            <!-- Alamat -->
                            <div class="mb-5">
                                <label for="inputLarge">Alamat</label>
                                <input id="inputLarge" type="text" value="<?= $p['alamat'] ?>" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="mb-5">
                                <label for="inputLarge">Jenis Kelamin</label>
                                <input id="inputLarge" type="text" value="Jawir" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                            </div>

                            <!-- Email -->
                            <div class="mb-5">
                                <label for="inputLarge">Email</label>
                                <input id="inputLarge" type="text" value="<?= $p['email'] ?>" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                            </div>

                            <!-- No Telp -->
                            <div class="mb-5">
                                <label for="inputLarge">Email</label>
                                <input id="inputLarge" type="text" value="<?= $p['no_telp'] ?>" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                            </div>

                            <!-- Resume -->
                            <?php
                            $cv = $this->lamaran->datacv($p['id_cv']);
                            $file_cv = isset($cv['file_cv']) ? $cv['file_cv'] : '';
                            $file_cv_safe = htmlentities($file_cv, ENT_QUOTES, 'UTF-8');
                            $cv_path = base_url('assets/cv/' . $file_cv_safe);
                            ?>
                            <div x-data="dropdown" class="mb-5 dropdown">
                                <label id="dropdownLeft">Resume</label>
                                <div class="flex">
                                    <div class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] cursor-pointer" @click="toggle" @click.outside="open = false">Resume</div>
                                    <input id="dropdownLeft" type="text" value="<?= $file_cv_safe ?>" class="form-input disabled:pointer-events-none disabled:bg-[#eee] dark:disabled:bg-[#1b2e4b] cursor-not-allowed" disabled />
                                </div>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:left-0 rtl:right-0">
                                    <li><a href="<?= $cv_path ?>" download="<?= $file_cv_safe ?>" @click="toggle">Download</a></li>
                                    <li><a href="<?= $cv_path ?>" target="_blank">Lihat</a></li>
                                </ul>
                            </div>



                            <?php
                            $encrypted_id = urlencode(base64_encode($this->encryption->encrypt($p['id_pelamar']))); ?>
                            <div class="flex items-center gap-3 justify-end mt-5">

                                <a href="<?= base_url('admin/pelamar/ubah/') . $encrypted_id  ?>" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="<?= base_url('admin/pelamar/delete/') . $encrypted_id ?>" class="btn btn-danger" onclick="showAlert(event)">
                                    Hapus
                                </a>
                                <a href="javascript:void(0);" onclick="window.history.go(-1);">
                                    <button type="button" class="btn btn-secondary">Batal</button>
                                </a>
                            </div>
                        <?php endforeach ?>
                        </form>
                </div>
            </div>
            <!-- end main content section -->

            <!-- start footer section -->
            <?php $this->load->view("admin/layouts/footer.php") ?>

            <!-- end footer section -->
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/alpine-collaspe.min.js"></script>
    <script src="<?= base_url() ?>assets/js/alpine-persist.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/alpine-ui.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/alpine-focus.min.js"></script>
    <script defer src="<?= base_url() ?>assets/js/alpine.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/highlight.min.css" />
    <script src="<?= base_url() ?>assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->
    <script src="<?= base_url() ?>assets/js/nice-select2.js"></script>

    <script src="<?= base_url() ?>assets/js/quill.js"></script>
    <script>
        async function showAlert(event) {
            event.preventDefault(); // Mencegah tindakan default dari tautan

            const result = await new window.Swal({
                icon: 'warning',
                title: 'Apakah Anda Yakin?',
                text: "Ingin Menghapus Pelamar Ini?",
                showCancelButton: true,
                confirmButtonText: 'Delete',
            });

            if (result.value) {
                // Arahkan pengguna ke URL penghapusan setelah konfirmasi diterima
                window.location.href = event.target.getAttribute('href');

            }
        }
    </script>
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
                },
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false,
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
                },
            }));
        });

        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });

        new Quill('#editor', {
            theme: 'snow'
        });
        var toolbar = quill.container.previousSibling;
        toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');
    </script>


</body>

</html>