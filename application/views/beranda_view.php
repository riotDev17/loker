<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">

	<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">

		<!-- Navbar -->
		<?php $this->load->view("layouts/navbar.php") ?>
		<div class="container px-3" :class="[$store.app.animation]">
			<!-- start main content section -->
			<div class="mt-10">
				<?php if (empty($record)) : ?>
					<h1 class="text-2xl dark:text-white">Jobs Not Found</h1>
				<?php else : ?>
					<h1 class="text-2xl dark:text-white"><?= count($record) ?> Jobs Found</h1>
					
				<?php endif ?>
			</div>
			<!-- List Jobs -->
			<?php if (!empty($record)) : ?>
				<div class="grid xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 mt-20 gap-5">
					<?php foreach ($record as $row) : ?>
						<!-- Job-->
						<div class="border dark:bg-white border-gray-500/20 rounded-xl shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 ">
							<div class="bg-primary text-white-light w-16 h-16 rounded-md flex items-center justify-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path fill="currentColor" d="M4 21q-.825 0-1.412-.587T2 19V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v11q0 .825-.587 1.413T20 21zm6-15h4V4h-4z" />
								</svg>
							</div>
							<h5 class="text-dark text-lg font-bold mb-3.5 dark:text-white-light mt-5"><?= $row['nama_pekerjaan']; ?></h5>
							<p class="text-white-dark text-[15px] mb-3.5 text-base "><?= ucwords($row['lokasi']) ?></p>
							<!-- <?php
									$deskripsi = $row['deskripsi'];
									$words = explode(' ', $deskripsi);
									$deskripsisingkat = implode(' ', array_slice($words, 0, 15));
									?>
							<p class=" text-white-dark text-[15px] mb-3.5 text-base "> <?= $deskripsisingkat; ?></p> -->
							<div class=" grid grid-cols-3 mb-10 gap-3">
								<?php $dataarray = explode(" ", $row['kategori']);
								foreach ($dataarray as $data) {
									$arrayd = explode(" ", $data);
									$kataAcak = $arrayd[array_rand($arrayd)];
									echo '<span class="badge badge-outline-primary rounded-md text-center py-3">' . str_replace('_', ' ', $kataAcak) . '</span>';
								}
								?>
							</div>
							<div class="flex md:flex-row flex-col items-start justify-start gap-5">
								<a href="<?= base_url('detail/') ?><?= $row['id_loker']; ?>/<?= url_title($row['nama_pekerjaan']); ?>" class="btn btn-primary py-3 w-full">Apply Now</a>

								<a href="<?= base_url('detail/') ?><?= $row['id_loker']; ?>/<?= url_title($row['nama_pekerjaan']); ?>" class="btn btn-dark py-3 w-full">See Job</a>
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
	<?php $this->load->view("_partials/script.php") ?>
</body>

</html>