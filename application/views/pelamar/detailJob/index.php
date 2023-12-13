<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
			:class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">


	<!-- Navbar -->
    <?php $this->load->view("layouts/navbar.php") ?>

	<div class="container px-3" :class="[$store.app.animation]">
		<!-- start main content section -->
		<div class="mt-10">
			<!-- Desktop -->
			<div class="lg:block hidden">
				<div class="lg:flex hidden gap-5 border-b-2 pb-5">
					<div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
						<iconify-icon icon="material-symbols:work" class="text-white" width="25"></iconify-icon>
					</div>

					<!-- Main Frame-->

					<!-- Header -->
					<div class="w-full">
						<div class="flex items-center justify-between">
							<h1 class="text-2xl font-bold mb-auto">UI / UX Designer</h1>

							<div class="flex items-center font-semibold gap-3 mt-2 text-primary">
								<iconify-icon icon="vaadin:office" width="20"></iconify-icon>
								<p class="text-base">PT. Orang Ganteng</p>
							</div>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
							<p class="text-base">IDR3.000.000 - 8.000.000 / Bulan</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
							<p class="text-base">Penuh Waktu</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="mdi:education-outline" width="22"></iconify-icon>
							<p class="text-base">Minimal SMA / SMK</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="mdi:worker" width="22"></iconify-icon>
							<p class="text-base">Pengalaman kurang dari 1 tahun</p>
						</div>

						<button class="btn btn-primary mt-10 px-16">
							Apply Now
						</button>
					</div>
				</div>

				<!-- Persyaratan -->
				<div class="block">
					<div class="mt-5">
						<h1 class="text-xl font-bold">Persyaratan</h1>
					</div>
					<div class="flex items-center mt-3 gap-3">
                                <span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari 1
                                    Tahun</span>
						<span class="badge badge-outline-primary rounded-md text-center py-3">Minimal SMA / SMK</span>
						<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Figma</span>
						<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Adobe XD</span>
					</div>
				</div>

				<!-- Tunjangan & Keuntungan -->
				<div class="block mt-10">
					<h1 class="text-xl font-bold ">Tunjangan Dan Keuntungan</h1>
					<div class="grid lg:grid-cols-3 mt-3 gap-5">

						<!-- Tunjangan 1 -->
						<div class="w-full p-5 bg-info-light rounded-lg">
							<div class="flex gap-5">
								<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
								</div>
								<p>
									Perusahaan dapat menyediakan dana untuk pelatihan tambahan, kursus online, atau konferensi terkait
									desain UI/UX. Ini membantu para desainer untuk tetap terkini dengan tren terbaru dan teknologi
									baru dalam industri.
								</p>
							</div>
						</div>

						<!-- Tunjangan 2 -->
						<div class="w-full p-5 bg-info-light rounded-lg">
							<div class="flex gap-5">
								<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
								</div>
								<p>
									Beberapa perusahaan menawarkan fleksibilitas dalam waktu kerja, seperti jam kerja yang fleksibel,
									bekerja dari rumah, atau jadwal kerja yang bisa disesuaikan, memungkinkan desainer untuk
									menyesuaikan kehidupan kerja dengan kebutuhan pribadi mereka.
								</p>
							</div>
						</div>

						<!-- Tunjangan 3 -->
						<div class="w-full p-5 bg-info-light rounded-lg">
							<div class="flex gap-5">
								<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
								</div>
								<p>
									Paket asuransi kesehatan yang komprehensif, yang mencakup kesehatan fisik dan mental, seringkali
									menjadi tunjangan yang sangat dihargai oleh para pekerja.
								</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Deskripsi -->
				<div class="block mt-10">
					<h1 class="font-bold text-lg">Deskripsi Pekerjaan UI / UX Designer PT.Orang Ganteng</h1>
					<div class="mt-5">
						<ul class=" space-y-1 list-disc list-inside text-base flex flex-col gap-5">
							<li>Melakukan wawancara, survei, dan observasi untuk memahami kebutuhan pengguna.</li>
							<li>Menganalisis data untuk menemukan pola perilaku pengguna.</li>
							<li>Membuat persona pengguna untuk memahami karakteristik target audiens.</li>
							<li>Merancang sketsa, wireframe, dan prototype untuk menggambarkan pengalaman pengguna.</li>
							<li>Mengidentifikasi alur kerja (workflow) dan perancangan tata letak (layout) yang efisien.</li>
							<li>Menciptakan desain yang intuitif dan mudah dipahami oleh pengguna.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile & Tablet -->
		<div class="mt-10">
			<div class="md:block lg:hidden gap-5">
				<div class="flex gap-4 border-b-2 pb-5">
					<div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
						<iconify-icon icon="material-symbols:work" class="text-white" width="25"></iconify-icon>
					</div>
					<div class="block items-center justify-between">
						<h1 class="text-2xl font-bold mb-auto">UI / UX Designer</h1>

						<div class="flex items-center font-semibold gap-3 mt-2 text-primary">
							<iconify-icon icon="vaadin:office" width="20"></iconify-icon>
							<p class="text-base">PT. Orang Ganteng</p>
						</div>

					</div>
					<hr />
				</div>

				<!-- Main Frame-->
				<div class="w-full mt-5">

					<div>
						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
							<p class="text-base">IDR3.000.000 - 8.000.000 / Bulan</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
							<p class="text-base">Penuh Waktu</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="mdi:education-outline" width="22"></iconify-icon>
							<p class="text-base">Minimal SMA / SMK</p>
						</div>

						<div class="flex items-center font-semibold gap-3 mt-2">
							<iconify-icon icon="mdi:worker" width="22"></iconify-icon>
							<p class="text-base">Pengalaman kurang dari 1 tahun</p>
						</div>
					</div>


					<!-- Persyaratan -->
					<div class="block">
						<div class="mt-5">
							<h1 class="text-xl font-bold">Persyaratan</h1>
						</div>
						<div class="grid grid-cols-2 mt-3 gap-3">
                                    <span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari 1
                                        Tahun</span>
							<span class="badge badge-outline-primary rounded-md text-center py-3">Minimal SMA / SMK</span>
							<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Figma</span>
							<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Adobe XD</span>
						</div>
					</div>

					<!-- Tunjangan & Keuntungan -->
					<div class="block mt-10">
						<h1 class="text-xl font-bold ">Tunjangan Dan Keuntungan</h1>
						<div class="grid grid-cols-1 mt-3 gap-5">

							<!-- Tunjangan 1 -->
							<div class="w-full p-5 bg-info-light rounded-lg">
								<div class="flex gap-5">
									<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
									</div>
									<p>
										Perusahaan dapat menyediakan dana untuk pelatihan tambahan, kursus online, atau konferensi
										terkait
										desain UI/UX. Ini membantu para desainer untuk tetap terkini dengan tren terbaru dan teknologi
										baru dalam industri.
									</p>
								</div>
							</div>

							<!-- Tunjangan 2 -->
							<div class="w-full p-5 bg-info-light rounded-lg">
								<div class="flex gap-5">
									<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
									</div>
									<p>
										Beberapa perusahaan menawarkan fleksibilitas dalam waktu kerja, seperti jam kerja yang
										fleksibel,
										bekerja dari rumah, atau jadwal kerja yang bisa disesuaikan, memungkinkan desainer untuk
										menyesuaikan kehidupan kerja dengan kebutuhan pribadi mereka.
									</p>
								</div>
							</div>

							<!-- Tunjangan 3 -->
							<div class="w-full p-5 bg-info-light rounded-lg">
								<div class="flex gap-5">
									<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
									</div>
									<p>
										Paket asuransi kesehatan yang komprehensif, yang mencakup kesehatan fisik dan mental, seringkali
										menjadi tunjangan yang sangat dihargai oleh para pekerja.
									</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Deskripsi -->
					<div class="block mt-10 mx-auto">
						<h1 class="font-bold text-lg">Deskripsi Pekerjaan UI / UX Designer PT.Orang Ganteng</h1>
						<div class="mt-5">
							<ul class="max-w-md space-y-1 list-disc list-inside text-base flex flex-col gap-5">
								<li>Melakukan wawancara, survei, dan observasi untuk memahami kebutuhan pengguna.</li>
								<li>Menganalisis data untuk menemukan pola perilaku pengguna.</li>
								<li>Membuat persona pengguna untuk memahami karakteristik target audiens.</li>
								<li>Merancang sketsa, wireframe, dan prototype untuk menggambarkan pengalaman pengguna.</li>
								<li>Mengidentifikasi alur kerja (workflow) dan perancangan tata letak (layout) yang efisien.</li>
								<li>Menciptakan desain yang intuitif dan mudah dipahami oleh pengguna.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main content section -->
	</div>

	<!-- Footer -->
    <?php $this->load->view("layouts/footer.php") ?>
</div>


<?php $this->load->view("_partials/script.php") ?>
</body>

</html>