<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>VRISTO - Multipurpose Tailwind Dashboard Template</title>
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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/quill.snow.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

            <div class="animate__animated p-6 container" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <div class="pt-5">
                        <div>
                            <a href="javascript:void(0);" onclick="window.history.go(-1);" class="flex items-center justify-start mb-10 gap-5">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12" />
                                </svg>
                                <h1 class="text-base">Kembali</h1>
                            </a>
                        </div>
                        <div class="mb-5 flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
                        </div>
                        <div>
                            <div>
                                <form class="mb-5 rounded-md border border-[#ebedf2] bg-white p-6 dark:border-[#191e3a] dark:bg-[#0e1726]">
                                    <h6 class="mb-5 text-lg font-bold">General Information</h6>
                                    <div class="flex flex-col sm:flex-row">
                                        <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                            <img src="assets//images/user-profile.jpeg" alt="image" class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32" />

                                            <div class="mt-3">
                                                <div>
                                                    <label for="ctnFile" class="text-center mt-10">Profile
                                                        Picture</label>
                                                    <input id="ctnFile" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                            <div>
                                                <label for="name">Full Name</label>
                                                <input id="name" type="text" placeholder="Input Your Name..." class="form-input py-3" />
                                            </div>
                                            <div>
                                                <label for="address">Address</label>
                                                <input id="address" type="text" placeholder="Input Your Address..." class="form-input py-3" />
                                            </div>
                                            <div>
                                                <label for="gender">Gender</label>
                                                <select id="gender" class="form-select text-dark py-3">
                                                    <option>-- Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="email">Email</label>
                                                <input id="address" type="email" placeholder="Input Your Email..." class="form-input py-3" />
                                            </div>
                                            <div>
                                                <label for="phone">Phone</label>
                                                <input id="phone" type="nummber" placeholder="Input Your Number Phone..." class="form-input py-3" />
                                            </div>
                                            <div>
                                                <label for="ctnFile">Resume</label>
                                                <input id="ctnFile" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
                                            </div>

                                            <div>
                                                <label for="ctnSelect1">Skills</label>
                                                <select class="form-multiselect selectskills" name="skills[]" multiple="multiple" placeholder="Select skills">
                                                    <?php foreach ($skill as $s) : ?>
                                                        <option value="<?= $s['nama_skill'] ?>"><?= $s['nama_skill'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end main content section -->

            </div>

            <!-- start footer section -->
            <?php $this->load->view("layouts/footer.php") ?>
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

    <script src="<?= base_url() ?>assets/js/quill.js"></script>

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
        $(document).ready(function() {
            $(".selectskills").select2({
                placeholder: "Pilih Skill Pekerjaan"
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