<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
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
                            <a href="javascript:;" class="text-primary hover:underline">Data Pelamar</a>
                        </li>
                    </ul>

                    <!-- start main content section -->
                    <div x-data="contacts">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <h2 class="text-xl mt-5">Data Pelamar</h2>
                        </div>
                        <div class="panel mt-5 overflow-hidden border-0 p-0">
                            <div>
                                <div class="table-responsive">
                                    <table class="table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="font-bold">Nama Lengkap</th>
                                                <th class="font-bold">Email</th>
                                                <th class="font-bold">No Telpon</th>
                                                <th class="font-bold">Status</th>
                                                <th class="!text-center font-bold">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datapelamar as $dp) : ?>
                                                <div>
                                                    <tr>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $dp['nama'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $dp['email'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $dp['no_telp'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex w-max items-center">
                                                                <div><?= $dp['alamat'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex items-center justify-center gap-4">
                                                                <a href="<?= base_url('admin/lamaran/detail_pelamar' . '/' . $dp['id_pelamar'] . '/' . $dp['nama_pekerjaan']); ?>">
                                                                    <button type="button" class="btn btn-sm btn-outline-success">
                                                                        Lihat
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </div>
                                            <?php endforeach ?>
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
            <?php $this->load->view("admin/layouts/footer.php") ?>
            <!-- end footer section -->
        </div>
    </div>

    <?php $this->load->view("_partials/script.php") ?>
</body>

</html>