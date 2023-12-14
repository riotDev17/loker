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
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/style.css" />
  <link defer rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/animate.css" />
  <script src="<?php echo base_url() ?>assets/js/perfect-scrollbar.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/tippy-bundle.umd.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/quill.snow.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/nice-select2.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Sertakan library Select2 dari CDN -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
              <a href="javascript:;" class="text-primary hover:underline">Tambah Lowongan Kerja</a>
            </li>
          </ul>

          <!-- MAIN -->
          <form action="" class="mt-10">
            <div class="mb-5">
              <label for="inputLarge">Nama Pekerjaan</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Nama Pekerjaan..." class="form-input form-input-lg" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Nama Perusahaan</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Nama Perusahaan..." class="form-input form-input-lg" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Gaji</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Gaji..." class="form-input form-input-lg" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Durasi Kerja</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Durasi Kerja..." class="form-input form-input-lg" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Hari Kerja</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Hari Kerja..." class="form-input form-input-lg" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Lokasi</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Lokasi..." class="form-input form-input-lg" />
            </div>
            <!-- 
            <div class="mb-5">
              <label for="ctnSelect1">Persyaratan Kerja</label>
              <select class="selectize" multiple='multiple'>
                <option value="orange">Persyaratan Kerja 1</option>
                <option value="White">Persyaratan Kerja 2</option>
                <option value="White">Persyaratan Kerja 3</option>
              </select>
            </div> -->
            <div class="mb-5">
              <label for="syaratSelect">Persyaratan Kerja</label>
              <select class="form-multiselect selectsyarat" name="skills[]" multiple="multiple" placeholder="Select skills">
                <option value="orange">Persyaratan Kerja 1</option>
                <option value="White">Persyaratan Kerja 2</option>
                <option value="White">Persyaratan Kerja 3</option>
              </select>
            </div>
            <div class="mb-5">
              <label for="skillsSelect">Skills</label>
              <select class="form-multiselect selectskills" name="skills[]" multiple="multiple" placeholder="Select skills">
                <option value="UI">UI</option>
                <option value="UX">UX</option>
                <option value="Design">Design</option>
              </select>
            </div>

            <div class=" mb-5">
              <label for="inputLarge">Tunjangan & Keuntungan</label>
              <input id="inputLarge" type="text" placeholder="Masukkan Tunjangan & Keuntungan..." class="form-input form-input-lg" />
            </div>
            <div class="mb-9">
              <label for="">Tunjangan & Keuntungan</label>
              <div id="editortunjang">
                <h1>This is a heading text...</h1>
                <br />
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed,
                  mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium auctor tortor, bibendum
                  placerat elit feugiat et. Ut ac turpis nec dui ullamcorper ornare. Vestibulum finibus quis magna at
                  accumsan. Praesent a purus vitae tortor fringilla tempus vel non purus. Suspendisse eleifend nibh
                  porta dolor ullamcorper laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam,
                  iaculis at erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque at
                  lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet. Pellentesque sagittis lacus
                  non libero fringilla faucibus. Aenean ullamcorper enim et metus vestibulum, eu aliquam nunc placerat.
                  Praesent fringilla dolor sit amet leo pulvinar semper. </p>
                <br />
              </div>
            </div>
            <div class="mb-5">
              <label for="">Deskripsi Pekerjaan</label>
              <div id="editor">
                <h1>This is a heading text...</h1>
                <br />
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed,
                  mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium auctor tortor, bibendum
                  placerat elit feugiat et. Ut ac turpis nec dui ullamcorper ornare. Vestibulum finibus quis magna at
                  accumsan. Praesent a purus vitae tortor fringilla tempus vel non purus. Suspendisse eleifend nibh
                  porta dolor ullamcorper laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam,
                  iaculis at erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque at
                  lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet. Pellentesque sagittis lacus
                  non libero fringilla faucibus. Aenean ullamcorper enim et metus vestibulum, eu aliquam nunc placerat.
                  Praesent fringilla dolor sit amet leo pulvinar semper. </p>
                <br />
              </div>
            </div>

            <div class="flex items-center gap-3 justify-end mt-5">
              <a href="kategori.html">
                <button type="button" class="btn btn-primary">Simpan</button>
              </a>
              <a href="kategori.html">
                <button type="button" class="btn btn-danger">Batal</button>
              </a>
            </div>
          </form>
        </div>
      </div>
      <!-- end main content section -->

      <!-- start footer section -->
      <div class="mt-auto p-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
        © <span id="footer-year">2022</span>. Vristo All rights reserved.
      </div>
      <!-- end footer section -->
    </div>
  </div>

  <script src="<?php echo base_url() ?>assets/js/alpine-collaspe.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/alpine-persist.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine-ui.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine-focus.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

  <!-- start hightlight js -->
  <script src="<?php echo base_url() ?>assets/js/highlight.min.js"></script>
  <!-- end hightlight js -->

  <script src="<?php echo base_url() ?>assets/js/nice-select2.js"></script>
  <script src="<?php echo base_url() ?>assets/js/quill.js"></script>
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
        placeholder: "Select Skills"
      });
    });
    $(document).ready(function() {
      $(".selectsyarat").select2({
        placeholder: "Select Syarat"
      });
    });

    new Quill('#editortunjang', {
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
  <script>
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