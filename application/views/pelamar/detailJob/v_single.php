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
	<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">


		<!-- Navbar -->
		<?php $this->load->view("layouts/navbar.php") ?>

		<!-- end header section -->
		<div class="container px-3" :class="[$store.app.animation]">
			<!-- start main content section -->

			<!-- Desktop -->
			<div class="mt-10">
				<div>
					<a href="javascript:void(0);" onclick="window.history.go(-1);" class="flex items-center justify-start mb-10 gap-5">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
							<path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H69l51.52 51.51a12 12 0 0 1-17 17l-72-72a12 12 0 0 1 0-17l72-72a12 12 0 0 1 17 17L69 116h147a12 12 0 0 1 12 12" />
						</svg>
						<h1 class="text-base">Kembali</h1>
					</a>
				</div>
				<div class="lg:block hidden">
					<div class="lg:flex hidden gap-5 border-b-2 pb-5">
						<div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
							<iconify-icon icon="material-symbols:work" class="text-white" width="25"></iconify-icon>
						</div>
						<!-- Main Frame-->
						<?php foreach ($record as $r) : ?>
							<!-- Header -->
							<div class="w-full">
								<div class="flex items-center justify-between">
									<h1 class="text-2xl font-bold mb-auto"><?= $r['nama_pekerjaan']; ?></h1>

									<div class="flex items-center font-semibold gap-3 mt-2 text-primary">
										<iconify-icon icon="vaadin:office" width="20"></iconify-icon>
										<p class="text-base"><?= $r['nama_perusahaan']; ?></p>
									</div>
								</div>
								<div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
									<p class="text-base"><?= $r['tipe_kerja'] ?> &nbsp;
									<ul style="list-style-type:disc;">
										<li><?= $r['kebijakan'] ?></li>
									</ul>
									</p>
								</div>
								<div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
									<p class="text-base">IDR <?= $r['gaji'] ?>/ Bulan</p>
								</div>


								<div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="carbon:location" width="22"></iconify-icon>
									<p class="text-base"><?= $r['lokasi']  ?> | <?= ucwords($r['kota']) . ', ' . ucwords($r['kabupaten']) . ', ' . ucwords($r['provinsi']) ?></p>
								</div>

								<!-- <div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="mdi:worker" width="22"></iconify-icon>
									<p class="text-base">Pengalaman kurang dari <?= $r['pengalaman'] ?> Tahun</p>
								</div> -->

								<div class="flex items-center font-semibold gap-3 mt-2">
									<iconify-icon icon="mingcute:time-fill" width="22"></iconify-icon>
									<p class="text-base"><?= $r['hari_kerja'] ?> / <?= $r['jam_kerja'] ?></p>
								</div>
								<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="mdi:calendar" width="22"></iconify-icon>
								<p class="text-base mt-1"><?= $r['tgl_akhir_loker'] ?>
							   </p>
								</div>
								<?php if ($this->session->userdata('username')) : ?>
									<?php
									$encrypted_id = urlencode(base64_encode($this->encryption->encrypt($r['id_loker']))); ?>
									<?php if ($this->Lamaran_model->SudahApply($this->session->userdata('id_pelamar'), $r['id_loker'])) : ?>
										<button class="btn btn-success mt-10 px-16" disabled>
											Sudah Apply
										</button>
									<?php else : ?>
										<?php if ($this->Riwayat_model->SudahApply($this->session->userdata('id_pelamar'), $r['id_loker'])) : ?>
											<button class=" btn btn-primary mt-10 px-16">
												<a href="<?= base_url('applyloker') . '/' . $encrypted_id ?>" onclick="showApply(event)">
													Apply Now
												</a>
											</button>
										<?php else : ?>
											<button class=" btn btn-primary mt-10 px-16">
												<a href="<?= base_url('applyloker') . '/' . $encrypted_id ?>" onclick="showAlert(event)">
													Apply Now
												</a>
											</button>
										<?php endif; ?>
									<?php endif; ?>
								<?php else : ?>
									<button class=" btn btn-primary mt-10 px-16">
										<a href="<?= base_url('login') ?>">
											Apply Now
										</a>
									</button>
								<?php endif; ?>
							</div>
					</div>
					<!-- Persyaratan -->
					<div class=" block">
						<div class="mt-5">
							<h1 class="text-xl font-bold">Persyaratan</h1>
						</div>
						<div class="flex items-center mt-3 gap-3">
							<span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari <?= $r['pengalaman'] ?> Tahun</span>
							<span class="badge badge-outline-primary rounded-md text-center py-3"><?= $r['pendidikan'] ?></span>
						</div>
					</div>

					<!-- Skills -->
					<div class="block mt-5">
						<h1 class="text-xl font-bold">Skill yang harus dimiliki</h1>
						<div class="flex items-center mt-3 gap-3">

							<?php $dataarray = explode(" ", $r['skills']);
							foreach ($dataarray as $data) {
								$arrayd = explode(" ", $data);
								$kataAcak = $arrayd[array_rand($arrayd)];
								echo '<span class="badge badge-outline-primary rounded-md text-center py-3">' . str_replace('_', ' ', ucwords($kataAcak)) . '</span>';
							}
							?>
						</div>
					</div>

					<!-- Tunjangan & Keuntungan -->
					<?php if (empty($r['tunjangan'])) : ?>
					<?php else : ?>
						<div class="block mt-10">
							<h1 class="text-xl font-bold ">Tunjangan Dan Keuntungan</h1>
							<div class="grid lg:grid-cols-32 mt-3 gap-5">
								<!-- Tunjangan  -->
								<div class="w-full p-5 bg-info-light rounded-lg">
									<div class="flex gap-5">
										<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
										</div>
										<p>
											<?= $r['tunjangan'] ?>
										</p>
									</div>
								</div>
							<?php endif ?>
							<?php if (empty($r['keuntungan'])) : ?>
							<?php else : ?>
								<!-- Keuntungan  -->
								<div class="w-full p-5 bg-info-light rounded-lg">
									<div class="flex gap-5">
										<div class="outline outline-primary text-white-light rounded-xl flex items-center justify-center">
										</div>
										<p>

											<?= $r['keuntungan']; ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>

					<!-- Deskripsi -->
					<div class="block mt-10">
						<h1 class="font-bold text-lg">Deskripsi Pekerjaan <?= $r['nama_pekerjaan']; ?> <?= $r['nama_perusahaan']; ?></h1>
						<div class="mt-5">
							<ul class=" space-y-1 list-disc list-inside text-base flex flex-col gap-5">
								<?= $r['deskripsi']; ?>

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
							<h1 class="text-2xl font-bold mb-auto"><?= $r['nama_pekerjaan']; ?></h1>

							<div class="flex items-center font-semibold gap-3 mt-2 text-primary">
								<iconify-icon icon="vaadin:office" width="20"></iconify-icon>
								<p class="text-base"><?= $r['nama_perusahaan']; ?></p>
							</div>

						</div>
						<hr />
					</div>

					<!-- Main Frame-->
					<div class="w-full mt-5">

						<div>
							<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="material-symbols:attach-money" width="22"></iconify-icon>
								<p class="text-base">IDR <?= $r['benefit'] ?> / Bulan</p>
							</div>

							<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="game-icons:sands-of-time" width="22"></iconify-icon>
								<p class="text-base"><?= $r['jam_kerja'] ?></p>
							</div>

							<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="mdi:education-outline" width="22"></iconify-icon>
								<p class="text-base">Minimal SMA / SMK</p>
							</div>

							<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="mdi:worker" width="22"></iconify-icon>
								<p class="text-base">Pengalaman kurang dari <?= $r['pengalaman'] ?></p>
							</div>

							<div class="flex items-center font-semibold gap-3 mt-2">
								<iconify-icon icon="mingcute:time-fill" width="22"></iconify-icon>
								<p class="text-base">Senin - Jumat / 07:00 - 16:00</p>
							</div>
						</div>


						<!-- Persyaratan -->
						<div class="block mt-10">
							<h1 class="text-xl font-bold">Persyaratan</h1>
							<div class="grid grid-cols-2 mt-3 gap-3">
								<span class="badge badge-outline-primary rounded-md text-center py-3">Pengalaman Kurang Dari <?= $r['pengalaman'] ?></span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Minimal SMA / SMK</span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Figma</span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Menguasai Adobe XD</span>
							</div>
						</div>

						<!-- Skills -->
						<div class="block mt-5">
							<h1 class="text-xl font-bold">Skill</h1>
							<div class="flex items-center mt-3 gap-3">
								<span class="badge badge-outline-primary rounded-md text-center py-3">Adobe XD</span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Figma</span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Manajemen Waktu</span>
								<span class="badge badge-outline-primary rounded-md text-center py-3">Kreatif</span>
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
							<h1 class="font-bold text-lg">Deskripsi Pekerjaan <?= $r['nama_pekerjaan']; ?> <?= $r['nama_perusahaan']; ?></h1>
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
		</div>
	<?php endforeach ?>
	<!-- end main content section --

		<!-- Footer -->
	<?php $this->load->view("layouts/footer.php") ?>
	</div>
	<script>
		async function showApply(event) {
			event.preventDefault();

			const result = await new window.Swal({
				icon: 'warning',
				title: 'Ingin Apply Kembali?',
				text: "Anda Sudah Apply Pada Pekerjaan ini sebelumnya",
				showCancelButton: true,
				confirmButtonText: 'Apply',
			});
			if (result.value) {
				window.location.href = event.target.getAttribute('href');
			}
		}
	</script>
	<script>
		async function showAlert(event) {
			event.preventDefault();
			const result = await new window.Swal({
				icon: 'warning',
				title: 'Ingin Apply Pekerjaan ini?',
				text: "Pastikan Data Anda Sesuai Pada Pekerjaan ini!",
				showCancelButton: true,
				confirmButtonText: 'Apply',
				padding: '2em',
			});

			if (result.value) {
				// Arahkan pengguna ke URL penghapusan setelah konfirmasi diterima
				window.location.href = event.target.getAttribute('href');

			}
		}
	</script>
	<?php $this->load->view("_partials/script.php") ?>
</body>

</html>