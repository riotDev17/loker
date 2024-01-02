<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<style>
		/* CSS untuk hasil pencarian */
		#autocompleteResults {
			position: absolute;
			left: 0;
			margin-top: 2px;
			width: 100%;
			max-height: 200px;
			overflow-y: auto;
			background-color: white;
			border: 1px solid #ccc;

			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			display: none;
		}

		#autocompleteResults div {
			padding: 8px;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		#autocompleteResults div:hover {
			background-color: #f0f0f0;
		}
	</style>

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

		<!-- Tempat untuk menampilkan data -->

		<div class="container px-3" :class="[$store.app.animation]">

			<!-- start main content section -->
			<div class="mt-7">
				<form class="mx-auto w-full sm:w-1/2 mb-5" action="<?= base_url('search') ?>">
					<div class=" relative">
						<input type="text" placeholder="Cari pekerjaan dan lokasi yang anda inginkan..." name="fr" class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" id="autocompleteInput" />
						<button type="submit" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
								<path fill="currentColor" d="m18.031 16.617l4.283 4.282l-1.415 1.415l-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9s9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617m-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.867-3.133-7-7-7s-7 3.133-7 7s3.133 7 7 7a6.977 6.977 0 0 0 4.875-1.975z" />
							</svg>
						</button>
						<div id="autocompleteResults" class="absolute left-0 mt-2 w-full bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
					</div>
				</form>
				<?php if (empty($record)) : ?>
					<h1 class="text-2xl dark:text-white">Jobs Not Found</h1>
				<?php else : ?>
					<h1 class="text-2xl dark:text-white"><?= count($record) ?> Jobs Found</h1>

				<?php endif ?>
			</div>

			<!-- searchbar -->


			<!-- List Jobs -->
			<?php if (!empty($record)) : ?>
				<div class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 mt-10 gap-5">
					<?php foreach ($record as $row) : ?>
						<!-- Job-->
						<div class="border dark:bg-white border-gray-500/20 rounded-xl shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 ">
							<div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path fill="currentColor" d="M4 21q-.825 0-1.412-.587T2 19V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v11q0 .825-.587 1.413T20 21zm6-15h4V4h-4z" />
								</svg>
							</div>
							<h5 class="text-dark text-lg font-bold mb-3.5 dark:text-white-light mt-5"><?= $row['nama_pekerjaan']; ?></h5>
							<p class="text-primary text-[15px] mb-3.5 text-base "><?= $row['nama_perusahaan']; ?></p>
							<p class="text-white-dark text-[15px] mb-3.5 text-base ">
								<?= $row['lokasi']  ?> | <?= ucwords($row['kota']) . ', ' . ucwords($row['kabupaten']) . ', ' . ucwords($row['provinsi']) ?></p>
							<!-- <?php
									$deskripsi = $row['deskripsi'];
									$words = explode(' ', $deskripsi);
									$deskripsisingkat = implode(' ', array_slice($words, 0, 15));
									?>
							<p class=" text-white-dark text-[15px] mb-3.5 text-base "> <?= $deskripsisingkat; ?></p> -->
							<div class=" grid grid-cols-3 mb-7 gap-3">
								<!-- <?php $dataarray = explode(" ", $row['kategori']);
										foreach ($dataarray as $data) {
											$arrayd = explode(" ", $data);
											$kataAcak = $arrayd[array_rand($arrayd)];
											echo '<span class="badge badge-outline-primary rounded-md text-center py-2">' . str_replace('_', ' ', $kataAcak) . '</span>';
										}
										?> -->
								<span class="badge badge-outline-primary rounded-md text-center py-2"><?= $row['kebijakan'] ?></span>
								<span class="badge badge-outline-primary rounded-md text-center py-2"><?= $row['tipe_kerja'] ?></span>
								<span class="badge badge-outline-primary rounded-md text-center py-2"><?= $row['pendidikan'] ?></span>
								<span class="badge badge-outline-primary rounded-md text-center py-2"><?= $row['pengalaman'] ?> Tahun</span>
							</div>

							<div class="flex md:flex-row flex-col items-start justify-start gap-5 mb-3">
								<?php

								$encrypted_id = urlencode(base64_encode($this->encryption->encrypt($row['id_loker']))); ?>
								<a href="<?= base_url('detail/') ?><?= $encrypted_id ?>/<?= url_title($row['nama_pekerjaan']); ?>" class="btn btn-primary py-3 w-full">Apply Now</a>

								<a href="<?= base_url('detail/') ?><?= $encrypted_id ?>/<?= url_title($row['nama_pekerjaan']); ?>" class="btn btn-dark py-3 w-full">See Job</a>
							</div>
							<div class="flex justify-between font-semibold gap-3 mt-2">
								<div class="flex items-center justify-center">
								
								<p class="text-white-dark text-base" style="font-size: 13px; text-align:right;">
								<iconify-icon icon="ion:time-outline" width="15"></iconify-icon>
									<?= time_since($row['created_at']); ?>
								</p>
								</div>
								<p>
								<iconify-icon icon="mdi:calendar"></iconify-icon>
									<?= url_title($row['tgl_akhir_loker']); ?> 
								</p>
							</div>
						</div>
					<?php endforeach ?>
				<?php else : ?>
				<?php endif ?>
				</div>
				<!-- end main content section -->
		</div>

		<!-- Footer -->
		<?php $this->load->view("layouts/footer.php") ?>
	</div>
	<script>
		$(document).ready(function() {
			var autocompleteInput = $('#autocompleteInput');
			var autocompleteResults = $('#autocompleteResults');

			autocompleteInput.on('input', function() {
				var searchValue = $(this).val();
				console.log(searchValue);
				$.ajax({
					url: "<?php echo base_url('beranda/get_data'); ?>",
					type: "POST",
					data: {
						search: searchValue
					},
					dataType: "json",
					success: function(data) {
						autocompleteResults.empty();
						$.each(data.items, function(index, item) {
							var resultItem = $('<div class="result-item">' + item.nama_pekerjaan + '</div>');
							autocompleteResults.append(resultItem);
						});
						autocompleteResults.show();
					}
				});
			});

			// Event delegation untuk menangani hasil yang diklik
			autocompleteResults.on('click', '.result-item', function() {
				var selectedItem = $(this).text();
				autocompleteInput.val(selectedItem);
				autocompleteResults.hide();
			});

			// Sembunyikan hasil pencarian saat klik di luar elemen input atau hasil
			$(document).on('click', function(event) {
				if (!$(event.target).closest('#autocompleteInput, #autocompleteResults').length) {
					autocompleteResults.hide();
				}
			});
		});
	</script>

	<?php if ($this->session->flashdata('success')) : ?>
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
					icon: 'success',
					title: '<?= $this->session->flashdata('success') ?>',
					padding: '2em',
				});
			});
		</script>
	<?php endif; ?>
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
	<!-- <?php if ($logout_message) : ?>
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
					icon: 'success',
					title: '<?= $logout_message; ?>',
					padding: '2em',
				});
			});
		</script>
	<?php endif; ?> -->
	<?php if ($logout_message) : ?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				alert('<?= $logout_message; ?>');
			});
		</script>
	<?php endif; ?>
	<?php $this->load->view("_partials/script.php") ?>

</body>

</html>