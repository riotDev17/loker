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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/flatpickr.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
  <!-- sidebar menu overlay -->
  <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

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
          <form action="<?= base_url('admin/loker/insertloker') ?>" class="mt-10" method="post" id="myForm">
            <!-- Isi formulir -->
            <div class=" mb-5">
              <div :class="[isSubmitForm1 ? (form1.name ? 'has-success' : 'has-error') : '']">
                <label for="inputLarge">Nama Pekerjaan</label>
                <input id="inputLarge" type="text" name="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan..." x-model="form1.name" class="form-input form-input-md" />
                <template x-if="isSubmitForm1 && form1.name">
                  <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                </template>
                <template x-if="isSubmitForm1 && !form1.name">
                  <p class="text-danger mt-1">Masukan Nama Lengkap</p>
                </template>
              </div>
            </div>

            <div class="mb-5">
              <label for="inputLarge">Nama Perusahaan</label>
              <input id="inputLarge" type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan..." class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Lokasi</label>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <select class="form-select" id="provinsi" name="provinsi">
                  <option>Provinsi</option>
                </select>
                <select class="form-select" id="kab" name="kab">
                  <option>Kabupaten</option>
                </select>
                <select class="form-select" id="kota" name="kota">
                  <option>Kota</option>
                </select>
              </div>
            </div>
            <div class="mb-5">
              <input id="inputLarge" type="text" name="lokasi" placeholder="Nama Jalan, Gedung, No.Rumah (Optional)" class="form-input form-input-md" />
            </div>

            <div class="mb-5">
              <label for="inputLarge">Gaji</label>
              <div class="grid grid-cols-1 sm:flex justify-between gap-5">
                <input id="priceInputawal" type="text" name="gajiawal" placeholder="Mulai" class="form-input form-input-md " />
                <input id="priceInputakhir" type="text" name="gajiakhir" placeholder="Sampai" class="form-input form-input-md " />
              </div>
            </div>
            <div class="mb-5">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="inputLarge">Tunjangan</label>
                  <input id="inputLarge" type="text" name="tunjangan" placeholder="Tunjangan (Optional)" class="form-input form-input-md " />
                </div>
                <div>
                  <label for="inputLarge">Keuntungan</label>
                  <input id="inputLarge" type="text" name="keuntungan" placeholder="Keuntungan (Optional)" class="form-input form-input-md " />
                </div>
              </div>
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
              <select class="form-select" name="jenis_kelamin">
                <option selected value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Semua Jenis Kelamin">Semua Jenis Kelamin</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="syaratSelect">Benefit</label>
              <select class="form-select selectbenefit" name="benefit[]" multiple="multiple">
                <option value="BPJS">BPJS</option>
                <option value="Gaji_Pokok">Gaji Pokok</option>
                <option value="Upah_Lembur">Upah Lembur</option>
                <option value="THR">THR</option>
                <option value="Uang_Makan">Uang Makan</option>
                <option value="Asuransi_Kesehatan">Asuransi Kesehatan</option>
                <option value="Pelatihan/Kursus">Pelatihan/Kursus</option>
                <option value="Bonus_Kinerja">Bonus Kinerja</option>
                <option value="Tunjangan_Transportasi">Tunjangan Transportasi</option>
                <option value="Tunjangan_Tempat Tinggal">Tunjangan Tempat Tinggal</option>
                <option value="Tunjangan_Komunikasi">Tunjangan Komunikasi</option>
                <option value="Cuti">Cuti</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="tipekerjaSelect">Tipe kerja</label>
              <select class="form-select" name="tipe_kerja">
                <option value="Full-time">Full-time</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Magang">Magang</option>
                <option value="Freelance">Freelance</option>
                <option value="Kontrak">Kontrak</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="kebijakanSelect">Kebijakan Pekerjaan</label>
              <select class="form-select " name="kebijakan">
                <option value="Kerja di kantor">Kerja di kantor</option>
                <option value="Kerja di rumah">Kerja di rumah</option>
                <option value="Kerja di lapangan">Kerja di lapangan</option>
                <option value="Kerja di kantor/rumah">Kerja di kantor/rumah</option>
                <option value="Remote di lokasi tertentu">Remote di lokasi tertentu</option>
              </select>
            </div>

            <div class="mb-5">
              <label for="inputLarge">Hari Kerja</label>
              <div class="grid grid-cols-1 sm:flex justify-between gap-5">
                <select class="form-select" id="daySelectawal" name="hari_awal">
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
                <select class="form-select" id="daySelectakhir" name="hari_akhir">
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
              </div>
            </div>
            <div class="mb-5">
              <label for="inputLarge">Jam Kerja</label>
              <div class="grid grid-cols-1 sm:flex justify-between gap-5">
                <input id="preloading-timeawal" x-data="jamawal" name="jam_awal" x-model="date4" class="form-input" />
                <input id="preloading-timeakhir" x-data="jamakhir" name="jam_akhir" x-model="date4" class="form-input" />
              </div>
            </div>

            <div class="mb-9">
              <label for="">Deskripsi Pekerjaan</label>
              <div id="editortunjangg">
              </div>
              <textarea name="deskripsi" style="display:none" id="tunjang"></textarea>
            </div>

            <div class="mb-5">
              <label for="pendidikanSelect">Pendidikan</label>
              <select class="form-select" name="pendidikan">
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
              <select class="form-select selectkategori" name="kategori[]" multiple="multiple">
                <?php foreach ($kategori as $k) : ?>
                  <option value="<?= str_replace(' ', '_', $k['nama_kategori']); ?>"><?= $k['nama_kategori'] ?></option>
                <?php endforeach; ?>

              </select>
              <input type="hidden" name="kategori_baru" id="kategoriBaru">
            </div>

            <div class="mb-5">
              <label for="skillsSelect">Skills</label>
              <select class="form-select selectskills" name="skills[]" multiple="multiple" placeholder="Select skills">
                <optgroup label="Software Skills">
                  <option value="figma">Figma</option>
                  <option value="office">Microsoft Office Suite</option>
                  <option value="premiere_pro">Adobe Premiere Pro</option>
                  <option value="photoshop">Adobe Photoshop</option>
                  <option value="html">HTML</option>
                  <option value="php">PHP</option>
                  <option value="react">React.js</option>
                  <option value="vue">Vue.js</option>
                  <option value="angular">Angular</option>
                  <option value="reactNative">React Native</option>
                  <option value="flutter">Flutter</option>
                  <option value="xamarin">Xamarin</option>
                  <option value="git">Git</option>
                  <option value="github">GitHub</option>
                  <option value="gitlab">GitLab</option>
                  <option value="mysql">MySQL</option>
                  <option value="postgresql">PostgreSQL</option>
                  <option value="mongodb">MongoDB</option>
                  <option value="node">Node.js</option>
                  <option value="express">Express.js</option>
                  <option value="django">Django (Python)</option>
                  <option value="apiDesign">API Design</option>
                  <option value="swagger">Swagger</option>
                  <option value="openapi">OpenAPI</option>
                  <option value="docker">Docker</option>
                  <option value="kubernetes">Kubernetes</option>
                  <option value="unitTesting">Unit Testing</option>
                  <option value="integrationTesting">Integration Testing</option>
                  <option value="testAutomation">Test Automation</option>
                  <option value="jenkins">Jenkins</option>
                  <option value="travisCI">Travis CI</option>
                  <option value="gitlabCI">GitLab CI</option>
                  <option value="aws">Amazon Web Services (AWS)</option>
                  <option value="azure">Microsoft Azure</option>
                  <option value="gcp">Google Cloud Platform (GCP)</option>
                  <option value="apache">Apache</option>
                  <option value="nginx">Nginx</option>
                  <option value="npm">npm (Node Package Manager)</option>
                  <option value="yarn">Yarn</option>
                  <option value="grunt">Grunt</option>
                  <option value="gulp">Gulp</option>
                  <option value="vsCode">Visual Studio Code</option>
                  <option value="sublimeText">Sublime Text</option>
                  <option value="atom">Atom</option>
                  <option value="intelliJ">IntelliJ IDEA</option>
                  <option value="https">HTTPS</option>
                  <option value="xss">Cross-Site Scripting (XSS) Prevention</option>
                  <option value="csrf">Cross-Site Request Forgery (CSRF) Prevention</option>
                  <option value="eslint">ESLint (JavaScript)</option>
                  <option value="codeigniter">Codeigniter</option>
                  <option value="lighthouse">Lighthouse</option>
                  <option value="pageSpeed">PageSpeed Insights</option>
                  <option value="adobeIllustrator">Adobe Illustrator</option>
                  <option value="sketch">Sketch</option>
                  <option value="premierePro">Adobe Premiere Pro</option>
                  <option value="finalCutPro">Final Cut Pro</option>
                  <option value="audacity">Audacity</option>
                  <option value="garageBand">GarageBand</option>
                  <option value="adobeAfterEffects">Adobe After Effects</option>
                  <option value="davinciResolve">DaVinci Resolve</option>
                  <option value="hitFilm">HitFilm</option>
                  <option value="abletonLive">Ableton Live</option>
                  <option value="logicPro">Logic Pro</option>
                  <option value="flStudio">FL Studio</option>
                  <option value="java">Java</option>
                  <option value="cSharp">C#</option>
                  <option value="ruby">Ruby</option>
                  <option value="go">Go</option>
                  <option value="swift">Swift</option>
                  <option value="kotlin">Kotlin</option>
                  <option value="bootstrap">Bootstrap</option>
                  <option value="tailwindCss">Tailwind CSS</option>
                  <option value="laravel">Laravel (PHP)</option>
                  <option value="spring">Spring Boot (Java)</option>
                  <option value="rubyOnRails">Ruby on Rails</option>
                  <option value="ionic">Ionic</option>
                  <option value="phoneGap">PhoneGap</option>
                  <option value="tensorflow">TensorFlow</option>
                  <option value="pyTorch">PyTorch</option>
                  <option value="pandas">Pandas</option>
                  <option value="numpy">NumPy</option>
                  <option value="unity">Unity</option>
                  <option value="unrealEngine">Unreal Engine</option>
                  <option value="ansible">Ansible</option>
                  <option value="terraform">Terraform</option>
                  <option value="raspberryPi">Raspberry Pi</option>
                  <option value="arduino">Arduino</option>
                  <option value="figma">Figma</option>
                  <option value="sketch">Sketch</option>
                  <option value="adobeXD">Adobe XD</option>
                  <option value="jira">Jira</option>
                  <option value="trello">Trello</option>
                  <option value="slack">Slack</option>
                  <option value="microsoftTeams">Microsoft Teams</option>
                  <option value="virtualBox">VirtualBox</option>
                  <option value="vmWare">VMware</option>
                  <option value="wireshark">Wireshark</option>
                  <option value="nmap">Nmap</option>
                </optgroup>
                <!-- Soft Skills -->
                <optgroup label="Soft Skills">
                  <option value="komunikasi">Kemampuan Komunikasi</option>
                  <option value="kerja_tim">Kemampuan Berkolaborasi (Kerja Tim)</option>
                  <option value="problem_solving">Problem Solving</option>
                  <option value="manajemen_waktu">Manajemen Waktu</option>
                  <option value="kepemimpinan">Kepemimpinan</option>
                  <!-- Tambahkan opsi keterampilan lunak lainnya -->
                </optgroup>

                <!-- Hard Skills -->
                <optgroup label="Hard Skills">
                  <option value="analisis_data">Analisis Data</option>
                  <option value="koding">Koding dan Pengembangan Perangkat Lunak</option>
                  <option value="manajemen_proyek">Manajemen Proyek</option>
                  <option value="pemasaran_digital">Pemasaran Digital</option>
                  <option value="jaringan_komputer">Jaringan Komputer</option>
                  <!-- Tambahkan opsi keterampilan keras lainnya -->
                </optgroup>

                <!-- Keterampilan Staf Kantor -->
                <optgroup label="Skills Staf Kantor">
                  <option value="dukungan_administratif">Dukungan Administratif</option>
                  <option value="input_data">Input Data</option>
                  <option value="pelayanan_pelanggan">Pelayanan Pelanggan</option>
                  <option value="kemampuan_organisasi">Kemampuan Organisasi</option>
                  <option value="manajemen_waktu">Manajemen Waktu</option>
                  <!-- Tambahkan opsi keterampilan staf kantor lainnya -->
                </optgroup>

                <!-- Keterampilan Staf Restoran -->
                <optgroup label="Skills Staf Restoran">
                  <option value="pelayanan_pelanggan">Pelayanan Pelanggan</option>
                  <option value="penanganan_makanan">Penanganan Makanan</option>
                  <option value="komunikasi_di_restoran">Komunikasi di Restoran</option>
                  <option value="penanganan_uang_tunai">Penanganan Uang Tunai</option>
                  <option value="kerja_tim">Berkolaborasi dalam Tim Restoran</option>
                  <!-- Tambahkan opsi keterampilan staf restoran lainnya -->
                </optgroup>

                <!-- Keterampilan Kurir/Pengiriman -->
                <optgroup label="Skills Kurir/Pengiriman">
                  <option value="optimasi_rute_pengiriman">Optimasi Rute Pengiriman</option>
                  <option value="manajemen_waktu_pengiriman">Manajemen Waktu Pengiriman</option>
                  <option value="interaksi_dengan_pelanggan">Interaksi dengan Pelanggan</option>
                  <option value="perhatian_terhadap_detail">Perhatian terhadap Detail</option>
                  <option value="pengemudi_aman">Pengemudi Aman</option>
                  <!-- Tambahkan opsi keterampilan kurir/pengiriman lainnya -->
                </optgroup>

                <!-- Keterampilan Penjualan -->
                <optgroup label="Skills Penjualan">
                  <option value="prospek">Prospek</option>
                  <option value="pembangunan_hubungan">Pembangunan Hubungan</option>
                  <option value="negosiasi">Negosiasi</option>
                  <option value="penutupan">Penutupan</option>
                  <option value="komunikasi_efektif">Komunikasi Efektif</option>
                  <option value="pengetahuan_produk">Pengetahuan Produk</option>
                  <option value="pelayanan_pelanggan">Pelayanan Pelanggan</option>
                  <option value="problem_solving">Problem Solving</option>
                  <option value="manajemen_waktu">Manajemen Waktu</option>
                  <option value="keterampilan_presentasi">Keterampilan Presentasi</option>
                  <option value="tindak_lanjut">Tindak Lanjut</option>
                  <option value="persuasi">Persuasi</option>
                  <option value="manajemen_hubungan_pelanggan">Manajemen Hubungan Pelanggan</option>
                  <option value="teknik_penutupan">Teknik Penutupan</option>
                  <option value="perencanaan_strategis">Perencanaan Strategis</option>
                  <option value="riset_pasar">Riset Pasar</option>
                  <!-- Tambahkan opsi keterampilan penjualan lainnya -->
                </optgroup>

                <!-- Keterampilan Pemasaran Digital -->
                <optgroup label="Skills Pemasaran Digital">
                  <option value="seo">Search Engine Optimization (SEO)</option>
                  <option value="sem">Search Engine Marketing (SEM)</option>
                  <option value="pemasaran_media_sosial">Pemasaran Media Sosial</option>
                  <option value="pemasaran_konten">Pemasaran Konten</option>
                  <option value="pemasaran_email">Pemasaran Email</option>
                  <option value="google_analytics">Google Analytics</option>
                  <option value="iklan_digital">Iklan Digital</option>
                  <option value="analisis_web">Analisis Web</option>
                  <option value="optimasi_konversi">Optimasi Konversi</option>
                  <option value="pencitraan_online">Pencitraan Online</option>
                  <option value="afiliasi_pemasaran">Afiliasi Pemasaran</option>
                  <option value="pemasaran_pengaruh">Pemasaran Pengaruh</option>
                  <option value="analisis_data">Analisis Data dalam Pemasaran Digital</option>
                  <option value="otomatisasi_pemasaran">Otomatisasi Pemasaran</option>
                  <option value="pemasaran_mobile">Pemasaran Mobile</option>
                  <option value="pemetaan_perjalanan_pelanggan">Pemetaan Perjalanan Pelanggan</option>
                  <option value="pengujian_a_b">Pengujian A/B</option>
                  <option value="crm">Manajemen Hubungan Pelanggan (CRM)</option>
                  <option value="manajemen_media_sosial">Manajemen Media Sosial</option>
                  <option value="pemasaran_video">Pemasaran Video</option>
                  <option value="desain_web">Desain Web Dasar untuk Pemasar</option>
                  <!-- Tambahkan opsi keterampilan pemasaran digital lainnya -->
                </optgroup>

                <!-- Keterampilan Pengajaran -->
                <optgroup label="Skills Pengajaran">
                  <option value="perencanaan_pembelajaran">Perencanaan Pembelajaran</option>
                  <option value="manajemen_kelas">Manajemen Kelas</option>
                  <option value="desain_kurikulum">Desain Kurikulum</option>
                  <option value="penilaian_siswa">Penilaian Siswa</option>
                  <option value="pengajaran_berdiferensiasi">Pengajaran Berdiferensiasi</option>
                  <option value="integrasi_teknologi">Integrasi Teknologi dalam Pengajaran</option>
                  <option value="strategi_pembelajaran_interaktif">Strategi Pembelajaran Interaktif</option>
                  <option value="pengajaran_kolaboratif">Pengajaran Kolaboratif</option>
                  <option value="keterampilan_berkomunikasi">Keterampilan Berkomunikasi Efektif dengan Siswa dan Orang Tua</option>
                  <option value="adaptabilitas">Adaptabilitas</option>
                  <option value="teknologi_kelas">Penggunaan Teknologi dalam Kelas</option>
                  <option value="pendidikan_inklusif">Pendidikan Inklusif</option>
                  <option value="strategi_pengajaran_efektif">Strategi Pengajaran Efektif</option>
                  <option value="teknik_motivasi_siswa">Teknik Motivasi Siswa</option>
                  <option value="komunikasi_orang_tua_guru">Komunikasi Orang Tua-Guru</option>
                  <option value="penilaian_dan_umpan_balik">Penilaian dan Umpan Balik</option>
                  <option value="keterlibatan_kelas">Keterlibatan Kelas</option>
                  <option value="pemajuan_berpikir_kritis">Pemajuan Berpikir Kritis</option>
                  <option value="inovasi_kelas">Inovasi Kelas</option>
                  <option value="alat_teknologi_pendidikan">Alat Teknologi Pendidikan</option>
                  <!-- Tambahkan opsi keterampilan pengajaran lainnya -->
                </optgroup>

                <!-- Other Skills -->
                <optgroup label="Lainnya">
                  <option value="sales">Penjualan</option>
                  <option value="marketing">Pemasaran</option>
                  <option value="public_speaking">Berbicara di Depan Umum</option>
                  <option value="inventory_management">Manajemen Inventaris</option>
                  <option value="problem_solving">Problem Solving</option>
                  <!-- Tambahkan opsi skill lainnya sesuai kebutuhan -->
                </optgroup>
              </select>
            </div>

            <div class="mb-5" x-data="tgl">
              <label for="inputLarge">Batas Akhir Loker</label>
              <input id="basic" name="tgl_akhir_loker" x-model="date1" class="form-input" />
            </div>
            <!-- <label class="inline-flex">
              <input id="CheckboxId" type="checkbox" class="form-checkbox rounded-full" />
              <span>Tanpa CV</span>
            </label> -->
            <div class="flex items-center gap-3 justify-end mt-5">
              <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
              <a href="javascript:void(0);" onclick="window.history.go(-1);">
                <button type="button" class="btn btn-danger">Batal</button>
              </a>
            </div>
            <!-- </form> -->
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
  <!-- Script -->
  <script src="<?php echo base_url() ?>assets/js/alpine-collaspe.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/alpine-persist.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine-ui.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine-focus.min.js"></script>
  <script defer src="<?php echo base_url() ?>assets/js/alpine.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/js/highlight.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/quill.js"></script>
  <script src="<?php echo base_url() ?>assets/js/flatpickr.js"></script>
  <!-- end script -->

  <!-- text/javascript -->
  <script>
    // checkbox
    const checkbox = document.getElementById('CheckboxId');
    checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
        console.log('Checkbox checked');
        new window.Swal({
          icon: 'warning',
          title: 'Anda Yakin?',
          text: "Pekerjaan ini tanpa menggunakan CV?",
          showCancelButton: true,
          confirmButtonText: 'Yes',
          padding: '2em',
        }).then((result) => {
          if (result.value) {
            const checkbox = document.getElementById('checkboxId');
            checkbox.checked = true;
            new window.Swal('Confirm!', 'Your checkbox has been activated.', 'success');
          } else {
            checkbox.checked = false;
          }
        });
      } else {
        console.log('Checkbox unchecked');
      }
    });
  </script>
  <!-- 
  <script>
    // Validate Input
    document.addEventListener("alpine:init", () => {
      Alpine.data("form", () => ({
        form1: {
          name: ''
        },
        isSubmitForm1: false,
        submitForm1() {
          this.isSubmitForm1 = true;
          if (this.name) {
            this.showMessage('Form submitted successfully.');
          }
        },
        showMessage(msg = '', type = 'success') {
          const toast = window.Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
          });
          toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px'
          });
        },
      }));
    });
  </script> -->

  <script>
    // format gaji dan waktu
    $(document).ready(function() {
      $('#priceInputakhir').on('input', function() {
        var rawValue = $(this).val().replace(/\D/g, '');
        var numericValue = parseInt(rawValue, 10);
        if (!isNaN(numericValue)) {
          var formattedValue = numericValue.toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
          });
          $(this).val(formattedValue);
        } else {
          $(this).val('');
        }
      });
    });
    $(document).ready(function() {
      $('#priceInputawal').on('input', function() {
        var rawValue = $(this).val().replace(/\D/g, '');
        var numericValue = parseInt(rawValue, 10);
        if (!isNaN(numericValue)) {
          var formattedValue = numericValue.toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
          });
          $(this).val(formattedValue);
        } else {
          $(this).val('');
        }
      });
    });

    document.addEventListener("alpine:init", () => {
      Alpine.data("jamawal", () => ({
        date4: '07:00',
        init() {
          flatpickr(document.getElementById('preloading-timeawal'), {
            defaultDate: this.date4,
            noCalendar: true,
            enableTime: true,
            dateFormat: 'H:i'
          })
        }
      }));
    });

    document.addEventListener("alpine:init", () => {
      Alpine.data("jamakhir", () => ({
        date4: '12:00',
        init() {
          flatpickr(document.getElementById('preloading-timeakhir'), {
            defaultDate: this.date4,
            noCalendar: true,
            enableTime: true,
            dateFormat: 'H:i'
          })
        }
      }));
    });
  </script>

  <!-- Provinsi -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
          var data = provinces;
          var prov = '<option>Provinsi</option>';
          data.forEach(element => {
            prov += `<option  data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
          });
          document.getElementById('provinsi').innerHTML = prov;
        });
    });
  </script>

  <script>
    // Kabupaten
    const selectProvinsi = document.getElementById('provinsi');
    selectProvinsi.addEventListener('change', (e) => {
      var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
        .then(response => response.json())
        .then(regencies => {
          var data = regencies;
          var kab = '<option>Kabupaten</option>';
          data.forEach(element => {
            kab += `<option  data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
          });
          document.getElementById('kab').innerHTML = kab;
        });
    });
    // Kota
    const selectKab = document.getElementById('kab');
    selectKab.addEventListener('change', (e) => {
      var kab = e.target.options[e.target.selectedIndex].dataset.dist;
      fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kab}.json`)
        .then(response => response.json())
        .then(districts => {
          var data = districts;
          var kota = '<option>Kota</option>';
          data.forEach(element => {
            kota += `<option  data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
          });
          document.getElementById('kota').innerHTML = kota;
        });
    });
  </script>

  <script>
    // Select benefit
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
    $(document).ready(function() {
      $(".selectkategori").select2({
        placeholder: "Pilih Kategori Pekerjaan"
      });
    });
    $(document).ready(function() {
      $(".selectskills").select2({
        placeholder: "Pilih Skill Pekerjaan"
      });
    });
  </script>

  <script>
    // tgl
    document.addEventListener("alpine:init", () => {
      Alpine.data("tgl", () => ({
        date1: '2022-07-05',
        init() {
          flatpickr(document.getElementById('basic'), {
            dateFormat: 'Y-m-d',
            defaultDate: this.date1,
          })
        }
      }));
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
      Alpine.data('customizer', () => ({
        showCustomizer: false,
      }));

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
  </script>

  <!-- Quill -->
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