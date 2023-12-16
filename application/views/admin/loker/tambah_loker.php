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
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/style.css" />
  <link defer rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/css/animate.css" />
  <script src="<?php echo base_url() ?>assets/js/perfect-scrollbar.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/tippy-bundle.umd.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/quill.snow.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
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
          <form action="<?= base_url('admin/loker/insertloker') ?>" class="mt-10" method="POST" id="myForm">
            <!-- Isi formulir -->
            <div class="mb-5">
              <label for="inputLarge">Nama Pekerjaan</label>
              <input id="inputLarge" type="text" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Nama Perusahaan</label>
              <input id="inputLarge" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Lokasi</label>
              <input id="inputLarge" type="text" name="lokasi" placeholder="Masukkan Lokasi..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Gaji</label>
              <input id="inputLarge" type="text" name="gaji" placeholder="Masukkan Gaji..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Pengalaman</label>
              <input id="inputLarge" type="text" name="pengalaman" placeholder="Masukkan Minimal Pengalaman..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Usia</label>
              <input id="inputLarge" type="number" name="usia" placeholder="Masukkan Usia..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="jenis_kelaminSelect">Jenis Kelamin</label>
              <select class="form-multiselect selectjenis_kelamin" name="jenis_kelamin">
                <option selected value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Semua Jenis Kelamin">Perempuan</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="syaratSelect">Benefit</label>
              <select class="form-multiselect selectbenefit" name="benefit[]" multiple="multiple">
                <option value="BPJS">BPJS</option>
                <option value="Gaji Pokok">Gaji Pokok</option>
                <option value="Upah Lembur">Upah Lembur</option>
                <option value="THR">THR</option>
                <option value="Uang Makan">Uang Makan</option>
                <option value="Asuransi Kesehatan">Asuransi Kesehatan</option>
                <option value="Pelatihan/Kursus">Pelatihan/Kursus</option>
                <option value="Bonus Kinerja">Bonus Kinerja</option>
                <option value="Tunjangan Transportasi">Tunjangan Transportasi</option>
                <option value="Tunjangan Tempat Tinggal">Tunjangan Tempat Tinggal</option>
                <option value="Tunjangan Komunikasi">Tunjangan Komunikasi</option>
                <option value="Cuti">Cuti</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="tipekerjaSelect">Tipe kerja</label>
              <select class="form-multiselect selecttipekerja" name="tipe_kerja">
                <option value="Full-time">Full-time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Magang">Magang</option>
                <option value="Freelance">Freelance</option>
                <option value="Kontrak">Kontrak</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="kebijakanSelect">Kebijakan Pekerjaan</label>
              <select class="form-multiselect selectkebijakan" name="kebijakan">
                <option value="Kerja di kantor">Kerja di kantor</option>
                <option value="Kerja di rumah">Kerja di rumah</option>
                <option value="Kerja di lapangan">Kerja di lapangan</option>
                <option value="Kerja di kantor/rumah">Kerja di kantor/rumah</option>
                <option value="Remote di lokasi tertentu">Remote di lokasi tertentu</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="inputLarge">Hari Kerja</label>
              <select id="daySelectawal" name="hari_awal">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
              </select>
              <select id="daySelectakhir" name="hari_akhir">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
              </select>
            </div>
            <div class="mb-5">
              <label for="inputLarge">Jam Kerja Awal</label>
              <input type="time" name="jam_awal" placeholder="Masukkan Jam Awal Loker... " />

              <label for="inputLarge">Jam Kerja Akhir</label>
              <input type="time" name="jam_akhir" placeholder="Masukkan Jam Akhir Loker... " />
            </div>
            <div class="mb-9">
              <label for="">Deskripsi Pekerjaan</label>
              <div id="editortunjangg">
              </div>
              <textarea name="deskripsi" style="display:none" id="tunjang"></textarea>
            </div>

            <div class="mb-5">
              <label for="pendidikanSelect">Pendidikan</label>
              <select class="form-multiselect selectpendidikan" name="pendidikan">
                <option value="Minimal SMA/SMK/Sederajat">Minimal SMA/ SMK/ Sederajat</option>
                <option value="Minimal SMP/MTS/Sederajat">Minimal SMP/ MTS/ Sederajat</option>
                <option value="Minimal D3">Minimal D3</option>
                <option value="Minimal D3/D4">Minimal D3/ D4</option>
                <option value="Minimal S1">Minimal S1</option>
                <option value="Minimal S1/S2">Minimal S1/S2</option>
                <option value="Semua Jenjang">Semua Jenjang</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="skillsSelect">Kategori Pekerjaan</label>
              <select class="form-multiselect selectkategori" name="kategori[]" multiple="multiple">
                <?php foreach ($kategori as $k) : ?>
                  <option value="<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                <?php endforeach; ?>
              </select>
              <input type="hidden" name="kategori_baru" id="kategoriBaru">
            </div>

            <div class="mb-5">
              <label for="skillsSelect">Skills</label>
              <select class="form-multiselect selectskills" name="skills[]" multiple="multiple" placeholder="Select skills">
                <?php foreach ($skill as $s) : ?>
                  <option value="<?= $s['nama_skill'] ?>"><?= $s['nama_skill'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-5">
              <label for="inputLarge">Batas Akhir Loker</label>
              <input id="inputLarge" type="date" name="tgl_akhir_loker" placeholder="Masukkan Batas Akhir Loker... " class="form-input form-input-md" />
            </div>

            <div class="flex items-center gap-3 justify-end mt-5">
              <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
              <button type="button" class="btn btn-danger">Batal</button>
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
  <script src="<?php echo base_url() ?>assets/js/quill.js"></script>

  <script>
    $(document).ready(function() {
      $('.selectbenefit').select2({
        tags: true,
        placeholder: "Pilih Benefit Pekerjaan"
      });

      $('.selectbenefit').on('select2:select', function(e) {
        var data = e.params.data;
        if (data.id === data.text) {

        }
      });
    });
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

    $(document).ready(function() {
      $(".selectjenis_kelamin").select2({
        placeholder: "Pilih Jenis Kelamin "
      });
    });
    $(document).ready(function() {
      $(".selectkategori").select2({
        placeholder: "Pilih Kategori Pekerjaan"
      });
    });
    $(document).ready(function() {
      $(".selectpendidikan").select2({
        placeholder: "Pilih Minimal Pendidikan"
      });
    });
    $(document).ready(function() {
      $(".selectskills").select2({
        placeholder: "Pilih Skill Pekerjaan"
      });
    });
    $(document).ready(function() {
      $(".selecttipekerja").select2({
        placeholder: "Pilih Tipe Pekerjaan"
      });
    });
    $(document).ready(function() {
      $(".selectkebijakan").select2({
        placeholder: "Pilih Kebijakan Pekerjaan"
      });
    });
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
  <script>
    var quillt = new Quill('#editortunjangg', {
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
    document.getElementById('submitButton').addEventListener('click', function(e) {
      var quillData = quillt.root.innerHTML;
      $('#tunjang').val(quillData);
    });
  </script>


</body>

</html>