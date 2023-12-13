<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

    <div class="container min-h-screen text-black dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen">
            <div class="hidden min-h-screen w-1/2 flex-col items-center justify-center bg-gradient-to-t from-[#ff1361bf] to-[#44107A] p-4 text-white dark:text-black lg:flex">
                <div class="mx-auto mb-5 w-full">
                    <img src="assets/images/auth-register-2.svg" alt="coming_soon" class="mx-auto lg:max-w-[370px] xl:max-w-[500px]" />
                </div>
            </div>
            <div class="relative flex w-full items-center justify-center lg:w-1/2">
                <div class="w-full p-5  md:p-16">
                    <h2 class="mb-3 text-3xl font-bold">Sign Up</h2>
                    <p class="mb-7">Enter your name, username and password to register</p>
                    <form class="space-y-5 mb-12" @submit.prevent="window.location='auth-login.html'">
                        <div>
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-input py-3" placeholder="Enter Name" />
                        </div>
                        <div>
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-input py-3" placeholder="Enter Username" />
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-input py-3" placeholder="Enter Password" />
                        </div>
                        <div>
                            <label class="cursor-pointer">
                                <input type="checkbox" class="form-checkbox" />
                                <span class="text-white-dark">Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-full py-4">SIGN UP</button>
                    </form>


                    <p class="text-center">
                        Already have an account ? <a href="<?php echo base_url('login_view.php') ?>" class="font-bold text-primary hover:underline">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>

    <?php $this->load->view("_partials/script.php") ?>
</body>

</html>