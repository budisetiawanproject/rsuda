<?php
$page = $this->uri->segment(1);
$page2 = $this->uri->segment(2);
$tgl = date('Y-m-d');
$total = $this->db->query("SELECT COUNT(*) AS total FROM v_registrasi WHERE reg_tgl = '$tgl'")->row_array();
?>
<aside class="main-sidebar sidebar-light-danger elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('index') ?>" class="brand-link">
		<img src="<?= base_url() ?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><b>RSUD AMURANG</b></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php if ($user['us_image'] == '') { ?><?= base_url() ?>assets/foto/avatar5.png <?php } else { ?> <?= base_url() ?>assets/foto/<?= $user['us_image']; ?> <?php } ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('profil') ?>" class="d-block"><?= $user['us_nama'] ?></a><span class="right badge badge-success"><?= $user['role_name']; ?></span>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('auth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-power-off"></i>
						<p>
							<span class="left badge badge-danger">Keluar</span>
						</p>
					</a>
				<li class="nav-item">
					<a href="<?= base_url('download') ?>" class="nav-link">
						<i class="far fa-file-pdf nav-icon"></i>
						<span class="left badge badge-success">Download Tutorial</span>
					</a>
				</li>
				</li>
				<li class="nav-header">MENU</li>
				<li class="nav-item">
					<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($page == 'dashboard') {
																				echo 'active';
																			} ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<?php if ($session == '2') { ?>
					<li class="nav-item has-treeview <?php if ($page == 'usulproduk' || $page == 'timeline' || $page == 'detailpengajuan') {
															echo 'menu-open';
														} ?>">
					<li class="nav-item">
						<a href="<?= base_url('pendaftaran') ?>" class="nav-link <?php if ($page == 'pendaftaran') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Pendaftaran</p>
							<span style="font-size: 15px;" class="badge badge-danger navbar-badge"></span>
						</a>
					</li>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('registrasi') ?>" class="nav-link <?php if ($page == 'registrasi') {
																					echo 'active';
																				} ?>">
							<i class="far fa-user nav-icon"></i>
							<p>Registrasi</p>
							<span style="font-size: 15px;" class="badge badge-success navbar-badge"><?= $total['total'] ?></span>
						</a>
					</li>
					</li>

					<li class="nav-item">
						<a href="<?= base_url('registrasidata') ?>" class="nav-link <?php if ($page == 'registrasidata') {
																						echo 'active';
																					} ?>">
							<i class="far fa-user nav-icon"></i>
							<p>Data Registrasi</p>
						</a>
					</li>
					</li>

					</li>
				<?php } ?>


				<?php if ($session == '3') { ?>
					<li class="nav-item">
						<a href="<?= base_url('registrasidata/regirja') ?>" class="nav-link <?php if ($page == 'registrasidata') {
																								echo 'active';
																							} ?>">
							<i class="far fa-user nav-icon"></i>
							<p>Registrasi Pasien</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('asisten') ?>" class="nav-link <?php if ($page == 'asisten') {
																					echo 'active';
																				} ?>">
							<i class="far fa-user nav-icon"></i>
							<p>Asistensi Dokter</p>
						</a>
					</li>
			</ul>
			</li>
		<?php } ?>

		<?php if ($session == '4') { ?>
			<li class="nav-item">
				<a href="<?= base_url('registrasidata/regugd') ?>" class="nav-link <?php if ($page == 'registrasidata') {
																						echo 'active';
																					} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Registrasi Pasien</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('operator') ?>" class="nav-link <?php if ($page == 'operator') {
																			echo 'active';
																		} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Asistensi Dokter</p>
				</a>
			</li>
			</ul>
			</li>
		<?php } ?>

		<?php if ($session == '5') { ?>
			<li class="nav-item">
				<a href="<?= base_url('registrasidata/irna') ?>" class="nav-link <?php if ($page == 'registrasidata') {
																						echo 'active';
																					} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Registrasi Pasien</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('operator') ?>" class="nav-link <?php if ($page == 'operator') {
																			echo 'active';
																		} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Asistensi Dokter</p>
				</a>
			</li>
			</ul>
			</li>
		<?php } ?>

		<?php if ($session == '6') { ?>
			<li class="nav-item">
				<a href="<?= base_url('dokter/pasien') ?>" class="nav-link <?php if ($page2 == 'pasien' || $page2 == 'pemeriksaan') {
																				echo 'active';
																			} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Daftar Pasien</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('operator') ?>" class="nav-link <?php if ($page == 'operator') {
																			echo 'active';
																		} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Dokter</p>
				</a>
			</li>
			</ul>
			</li>
		<?php } ?>


		<!-- tambahan riyan untuk menu pergudangan -->
		<?php if ($session == '9') { ?>

			<li class="nav-item">
				<a href="<?= base_url('pergudangan') ?>" class="nav-link <?php if ($page2 == 'pasien' || $page2 == '') {
																				echo 'active';
																			} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Input barang</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('operator') ?>" class="nav-link <?php if ($page == 'operator') {
																			echo 'active';
																		} ?>">
					<i class="far fa-user nav-icon"></i>
					<p>Dokter</p>
				</a>
			</li>
			</ul>
			</li>
		<?php } ?>
		<!-- end Riyan dari Menu Pergudangan -->




		<?php if ($session == '1') { ?>


			<li class="nav-item has-treeview <?php if ($page == 'pasien' || $page == 'registrasi' || $page == 'wisata') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page == 'pasien' || $page == 'registrasi' || $page == 'wisata') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-user"></i>
					<p>
						Pasien
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('pasien') ?>" class="nav-link <?php if ($page == 'pasien') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Data Pasien</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('registrasi/irja') ?>" class="nav-link <?php if ($page2 == 'irja') {
																							echo 'active';
																						} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Registrasi IRJA</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('registrasi/ugd') ?>" class="nav-link <?php if ($page2 == 'ugd') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Registrasi UGD</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('registrasi/irna') ?>" class="nav-link <?php if ($page == 'irna') {
																							echo 'active';
																						} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Registrasi IRNA</p>
						</a>
					</li>
			</li>
			</ul>
			</li>

			<li class="nav-item has-treeview <?php if ($page2 == 'kelas' || $page2 == 'kamar' || $page2 == 'bed') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page2 == 'kelas' || $page2 == 'kamar' || $page2 == 'bed') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-check-square"></i>
					<p>
						Ruangan Kamar
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('ruangan/kelas') ?>" class="nav-link <?php if ($page2 == 'kelas') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Kelas Perawatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('ruangan/kamar') ?>" class="nav-link <?php if ($page2 == 'kamar') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Kamar</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('ruangan/bed') ?>" class="nav-link <?php if ($page2 == 'bed') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Bed</p>
						</a>
					</li>
			</li>
			</ul>
			</li>

			<li class="nav-item">
				<a href="<?= base_url('unit') ?>" class="nav-link <?php if ($page == 'unit') {
																		echo 'active';
																	} ?>">
					<i class="nav-icon fas fa-home"></i>
					<p>
						Unit
					</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url('unitkategori') ?>" class="nav-link <?php if ($page == 'unitkategori') {
																				echo 'active';
																			} ?>">
					<i class="nav-icon fas fa-sitemap"></i>
					<p>
						Kategori Unit
					</p>
				</a>
			</li>

			<li class="nav-item has-treeview <?php if ($page == 'dokter' || $page == 'show' || $page == 'wisata') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page == 'dokter' || $page == 'show' || $page == 'wisata') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-users"></i>
					<p>
						Dokter
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('dokter') ?>" class="nav-link <?php if ($page == 'dokter') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Daftar Dokter</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('dokter') ?>" class="nav-link <?php if ($page == 'dokter') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Departement</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('dokter') ?>" class="nav-link <?php if ($page == 'dokter') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Spesialis</p>
						</a>
					</li>
			</li>
			</ul>
			</li>

			<li class="nav-item has-treeview <?php if ($page == 'pegawai' || $page == 'kategoripeg' || $page == 'wisata') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page == 'pegawai' || $page == 'kategoripeg' || $page == 'wisata') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-users"></i>
					<p>
						Pegawai
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('pegawai') ?>" class="nav-link <?php if ($page == 'pegawai') {
																					echo 'active';
																				} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Daftar Pegawai</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('kategoripeg') ?>" class="nav-link <?php if ($page == 'kategoripeg') {
																						echo 'active';
																					} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Kategori Pegawai</p>
						</a>
					</li>
			</li>
			</ul>
			</li>


			<li class="nav-item has-treeview <?php if ($page == 'berita' || $page == 'show' || $page == 'wisata') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page == 'berita' || $page == 'show' || $page == 'wisata') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-newspaper"></i>
					<p>
						Publik
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('show') ?>" class="nav-link <?php if ($page == 'show') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Slide Show</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('berita') ?>" class="nav-link <?php if ($page == 'berita') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Berita</p>
						</a>
					</li>
			</li>
			</ul>
			</li>


			<li class="nav-item has-treeview <?php if ($page == 'berita' || $page == 'slide' || $page == 'settinguser' || $page == 'role') {
													echo 'menu-open';
												} ?>">
				<a href="#" class="nav-link <?php if ($page == 'berita' || $page == 'slide' || $page == 'settinguser' || $page == 'role') {
												echo 'active';
											} ?>">
					<i class="nav-icon fas fa-cogs"></i>
					<p>
						Setting
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url('berita') ?>" class="nav-link <?php if ($page == 'berita') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Struktur Organisasi</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('slide') ?>" class="nav-link <?php if ($page == 'slide') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Visi dan Misi</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('role') ?>" class="nav-link <?php if ($page == 'role') {
																				echo 'active';
																			} ?>">
							<i class="far fa-check-circle nav-icon"></i>
							<p>Role User</p>
						</a>
					</li>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('settinguser') ?>" class="nav-link <?php if ($page == 'settinguser') {
																				echo 'active';
																			} ?>">
					<i class="far fa-check-circle nav-icon"></i>
					<p>User</p>
				</a>
			</li>
			</ul>
			</li>
		<?php } ?>


		</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>