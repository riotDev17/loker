<header class="z-40" :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
    <div class="shadow-sm">
        <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
            <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2">
                <a href="<?= base_url('') ?>" class="main-logo flex shrink-0 items-center">
                    <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="assets/images/logo.svg" alt="logo navbar" />
                    <span class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline">VRISTO</span>
                </a>
            </div>
            <div class="hidden ltr:mr-2 rtl:ml-2 sm:block">
                <ul class="flex items-center space-x-2 rtl:space-x-reverse dark:text-[#d0d2d6]">
                </ul>
            </div>
            <div x-data="header" class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2">
                <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                    <form id="liveSearchForm" class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0" action="<?= base_url('search') ?>">
                        <div class="relative">
                            <input type="text" name="fr" id="liveSearchInput" class="peer form-input bg-gray-100 placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pl-9 rtl:pr-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4" placeholder="Search Jobs..." />
                            <button type="submit" class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-primary ltr:right-auto rtl:left-auto">
                                <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="submit" class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden" @click="search = true">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <button type="button" class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden" @click="search = ! search">
                        <svg class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <div>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'light'" href="javascript:;" class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('dark')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'dark'" href="javascript:;" class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('system')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'system'" href="javascript:;" class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('light')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z" stroke="currentColor" stroke-width="1.5" />
                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
                <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                    <a href="javascript:;" class="relative block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60" @click="toggle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>

                        <span class="absolute top-0 flex h-3 w-3 ltr:right-0 rtl:left-0">
                            <span class="absolute -top-[3px] inline-flex h-full w-full animate-ping rounded-full bg-success/50 opacity-75 ltr:-left-[3px] rtl:-right-[3px]"></span>
                            <span class="relative inline-flex h-[6px] w-[6px] rounded-full bg-success"></span>
                        </span>
                    </a>
                    <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="top-11 w-[300px] divide-y !py-0 text-dark ltr:-right-2 rtl:-left-2 dark:divide-white/10 dark:text-white-dark sm:w-[350px]" style="display: none;">
                        <li>
                            <div class="flex items-center justify-between px-4 py-2 font-semibold hover:!bg-transparent">
                                <h4 class="text-lg">Notification</h4>
                                <template x-if="notifications.length">
                                    <span class="badge bg-primary/80" x-text="notifications.length + 'New'"></span>
                                </template><span class="badge bg-primary/80" x-text="notifications.length + 'New'">3New</span>
                            </div>
                        </li>
                        <template x-for="notification in notifications">
                            <li class="dark:text-white-light/90">
                                <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                    <div class="grid place-content-center rounded">
                                        <div class="relative h-12 w-12">
                                            <img class="h-12 w-12 rounded-full object-cover" :src="`assets/images/${notification.profile}`" alt="image">
                                            <span class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                        <div class="ltr:pr-3 rtl:pl-3">
                                            <h6 x-html="notification.message"></h6>
                                            <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time"></span>
                                        </div>
                                        <button type="button" class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto" @click="removeNotification(notification.id)">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                                <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </template>
                        <li class="dark:text-white-light/90">
                            <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                <div class="grid place-content-center rounded">
                                    <div class="relative h-12 w-12">
                                        <img class="h-12 w-12 rounded-full object-cover" :src="`assets/images/${notification.profile}`" alt="image" src="assets/images/user-profile.jpeg">
                                        <span class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                    </div>
                                </div>
                                <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                    <div class="ltr:pr-3 rtl:pl-3">
                                        <h6 x-html="notification.message"><strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong></h6>
                                        <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time">45 min ago</span>
                                    </div>
                                    <button type="button" class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto" @click="removeNotification(notification.id)">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="dark:text-white-light/90">
                            <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                <div class="grid place-content-center rounded">
                                    <div class="relative h-12 w-12">
                                        <img class="h-12 w-12 rounded-full object-cover" :src="`assets/images/${notification.profile}`" alt="image" src="assets/images/profile-34.jpeg">
                                        <span class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                    </div>
                                </div>
                                <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                    <div class="ltr:pr-3 rtl:pl-3">
                                        <h6 x-html="notification.message"><strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong></h6>
                                        <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time">9h Ago</span>
                                    </div>
                                    <button type="button" class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto" @click="removeNotification(notification.id)">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="dark:text-white-light/90">
                            <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                <div class="grid place-content-center rounded">
                                    <div class="relative h-12 w-12">
                                        <img class="h-12 w-12 rounded-full object-cover" :src="`assets/images/${notification.profile}`" alt="image" src="assets/images/profile-16.jpeg">
                                        <span class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                    </div>
                                </div>
                                <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                    <div class="ltr:pr-3 rtl:pl-3">
                                        <h6 x-html="notification.message"><strong class="text-sm mr-1">Anna Morgan</strong>Upload a file</h6>
                                        <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time">9h Ago</span>
                                    </div>
                                    <button type="button" class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto" @click="removeNotification(notification.id)">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <template x-if="notifications.length">
                            <li>
                                <div class="p-4">
                                    <button class="btn btn-primary btn-small block w-full" @click="toggle">Read All Notifications</button>
                                </div>
                            </li>
                        </template>
                        <li>
                            <div class="p-4">
                                <button class="btn btn-primary btn-small block w-full" @click="toggle">Read All Notifications</button>
                            </div>
                        </li>
                        <template x-if="!notifications.length">
                            <li>
                                <div class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                    <div class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                        <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z" fill="currentColor"></path>
                                            <path d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z" fill="currentColor"></path>
                                            <path d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    No data available.
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
                    <?php if ($this->session->userdata('id_pelamar')) : ?>
                        <a href="javascript:;" class="group relative" @click="toggle()">
                            <span>
                                <?php $getData = $this->Pelamar_model->getData('data_pelamar', ['id_pelamar' => $this->session->userdata('id_pelamar')]);
                                $d = $getData->row(); ?>

                                <img class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100" src="<?= base_url('assets/img/pelamar/' . $d->photo) ?>" alt="image" />
                            </span>
                        </a>
                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90">
                            <li>
                                <div class="flex items-center px-4 py-4">
                                    <div class="flex-none">
                                        <img class="h-10 w-10 rounded-md object-cover" src="<?= base_url('assets/img/pelamar/' . $d->photo) ?>" alt="image" />
                                    </div>
                                    <div class="truncate ltr:pl-4 rtl:pr-4">
                                        <h4 class="text-base">
                                            <?= $this->session->userdata('username') ?>
                                        </h4>
                                        <a class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white" href="javascript:;"><?= $this->session->userdata('email') ?></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="<?= base_url('profil') ?>" class="dark:hover:text-white" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    Profile</a>
                            </li>
                            <li>
                                <a href="<?= base_url('status') ?>" class="dark:hover:text-white" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10ZM7 12l4 3l5-7" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    Status Pelamaran</a>
                            </li>
                            <li>
                                <a href="<?= base_url('riwayat') ?>" class="dark:hover:text-white" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path opacity="0.5" d="M11.962 20q-3.047 0-5.311-1.99Q4.387 16.022 4.03 13h1.011q.408 2.58 2.351 4.29Q9.337 19 11.962 19q2.925 0 4.962-2.037T18.962 12q0-2.925-2.038-4.963T11.962 5q-1.552 0-2.918.656q-1.365.656-2.41 1.806h2.481v1H4.962V4.308h1v2.388q1.16-1.273 2.718-1.984Q10.238 4 11.962 4q1.663 0 3.118.626q1.455.626 2.542 1.713t1.714 2.543q.626 1.455.626 3.118q0 1.663-.626 3.118q-.626 1.455-1.714 2.543q-1.087 1.087-2.542 1.713q-1.455.626-3.118.626m3.203-4.146l-3.646-3.646V7h1v4.792l3.354 3.354z" />
                                    </svg>
                                    Riwayat Pelamaran</a>
                            </li>
                            <li class="border-t border-white-light dark:border-white-light/10">
                                <a href="<?php echo base_url('logout') ?>" class="!py-3 text-danger" @click="toggle">
                                    <svg class="h-4.5 w-4.5 shrink-0 rotate-90 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    <?php else : ?>
                        <a href="<?= base_url('login') ?>" class="dark:hover:text-white" @click="toggle">
                            Login</a>
                        |
                        <a href="<?= base_url('registrasi') ?>" class="dark:hover:text-white" @click="toggle">
                            Register</a>
                    <?php endif ?>
                </div>
            </div>
        </div>


        <!-- horizontal menu -->
        <!-- <ul class="horizontal-menu border-t border-[#ebedf2] bg-white px-6 py-1.5 font-semibold text-black rtl:space-x-reverse dark:border-[#191e3a] dark:bg-[#0e1726] dark:text-white-dark lg:space-x-1.5 xl:space-x-8">
            <li class="menu nav-item relative">
                <a href="javascript:;" class="nav-link active">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4 21q-.825 0-1.412-.587T2 19V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v11q0 .825-.587 1.413T20 21zm6-15h4V4h-4z" />
                        </svg>
                        <span class="px-1">Jobs</span>
                    </div>
                    <div class="right_arrow">
                        <svg class="h-4 w-4 rotate-90" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="index.html" class="active">All Jobs</a>
                    </li>
                    <li>
                        <a href="sales.html">Sales</a>
                    </li>
                    <li>
                        <a href="analytics.html">UI / UX</a>
                    </li>
                    <li>
                        <a href="finance.html">Web Developer</a>
                    </li>
                    <li>
                        <a href="crypto.html">Cyber Security</a>
                    </li>
                </ul>
            </li>
        </ul> -->
    </div>
</header>