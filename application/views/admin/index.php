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
                            <a href="javascript:;" class="text-primary hover:underline">Beranda</a>
                        </li>
                    </ul>

                    <div class="pt-5">
                        <div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
                            <!-- Users Visit -->
                            <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                                <div class="flex justify-between">
                                    <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Users Visit</div>
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <a href="javascript:;" @click="toggle">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                            <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                            <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-5 flex items-center">
                                    <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">$170.46</div>
                                    <div class="badge bg-white/30">+ 2.35%</div>
                                </div>
                                <div class="mt-5 flex items-center font-semibold">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                        <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    Last Week 44,700
                                </div>
                            </div>

                            <!-- Sessions -->
                            <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                                <div class="flex justify-between">
                                    <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Sessions</div>
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <a href="javascript:;" @click="toggle">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                            <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                            <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-5 flex items-center">
                                    <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">74,137</div>
                                    <div class="badge bg-white/30">- 2.35%</div>
                                </div>
                                <div class="mt-5 flex items-center font-semibold">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                        <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    Last Week 84,709
                                </div>
                            </div>

                            <!-- Time On-Site -->
                            <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                                <div class="flex justify-between">
                                    <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Time On-Site</div>
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <a href="javascript:;" @click="toggle">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                            <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                            <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-5 flex items-center">
                                    <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">38,085</div>
                                    <div class="badge bg-white/30">+ 1.35%</div>
                                </div>
                                <div class="mt-5 flex items-center font-semibold">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                        <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    Last Week 37,894
                                </div>
                            </div>

                            <!-- Bounce Rate -->
                            <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                                <div class="flex justify-between">
                                    <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Bounce Rate</div>
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <a href="javascript:;" @click="toggle">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                                <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                            <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                            <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-5 flex items-center">
                                    <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">49.10%</div>
                                    <div class="badge bg-white/30">- 0.35%</div>
                                </div>
                                <div class="mt-5 flex items-center font-semibold">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                        <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    Last Week 50.01%
                                </div>
                            </div>
                        </div>
                    </div>
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