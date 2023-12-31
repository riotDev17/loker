<!DOCTYPE html>
<html lang="en">

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
    <div class="container min-h-screen text-black dark:text-white-dark">

        <!-- start main content section -->
        <div class="flex min-h-screen">
            <div class="hidden min-h-screen w-1/2 flex-col items-center justify-center bg-gradient-to-t from-[#ff1361bf] to-[#44107A] p-4 text-white dark:text-black lg:flex">
                <div class="mx-auto mb-5 w-full">
                    <img src="<?= base_url('assets/images/auth-register-2.svg') ?> " alt="coming_soon" class="mx-auto lg:max-w-[370px] xl:max-w-[500px]" />
                </div>
            </div>
            <div class="relative flex w-full items-center justify-center lg:w-1/2">
                <div class="w-full p-5  md:p-16">
                    <h2 class="mb-3 text-3xl font-bold">Sign Up</h2>
                    <p class="mb-7">Enter your name, username and password to register</p>
                    <form class="space-y-5 mb-12" action="<?= base_url('auth/regis') ?>" method="POST">
                        <div>
                            <label for="email">Email</label>
                            <input name="email" id="email" type="text" class="form-input py-3" placeholder="Enter Email" />
                            <div class="invalid-feedback">
                                <?= form_error('email', '<p class="error-message">', '</p>'); ?>
                            </div>
                        </div>
                        <div>
                            <label for="username">Username</label>
                            <input name="username" id="username" type="text" class="form-input py-3" placeholder="Enter Username" />
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-input py-3" placeholder="Enter Password" />
                        </div>
                        <div>
                            <label for="password">Repeat Password</label>
                            <input name="password2" id="password2" type="password" class="form-input py-3" placeholder="Enter Repeat Password" />
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary w-full py-4">SIGN UP</button>
                    </form>

                    <p class="text-center">
                        Already have an account ? <a href="<?php echo base_url('login') ?>" class="font-bold text-primary hover:underline">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- end main content section -->
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
    <?php $this->load->view("_partials/script.php") ?>
</body>

</html>