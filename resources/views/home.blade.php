@extends('master')
@section('content')
				<div class="row">
								<div class="col-md-3 col-sm-6 col-12">
												<div class="info-box">
																<span class="info-box-icon bg-info">100</span>
																<div class="info-box-content">
																				<span class="info-box-text">
																								<h4>Jumlah BA</h4>
																				</span>
																</div>

												</div>
								</div>
								<div class="col-md-3 col-sm-6 col-12">
												<div class="info-box">
																<span class="info-box-icon bg-warning">2</span>
																<div class="info-box-content">
																				<span class="info-box-text">
																								<h4>Habis Masa <br> Pinjam</h4>
																				</span>
																</div>

												</div>
								</div>
				</div>
				<div class="card">
								<div class="card-body">
												<div class="row" style="display: flex; justify-content: center; align-items: center;">
																<img src="{{ asset('vendors/img/gedung.jpg') }}" style="width: 100%; height: ; object-fit: cover"
																				alt="img gedung setda">
												</div>
												<div class="row">
																<div class="col-6">
																				<div style="display: flex; justify-content: center; align-items: center;">
																								<h4 style="margin-top: 20px"><strong>Visi</strong></h4>
																				</div>
																				<br>
																				<div style="text-align: justify;">
																								<p>Mengenai Visi dan Misi Instansi, telah diatur dalam Permendagri Nomor 86 Tahun 2017 yang
																												menjelaskan bahwa tiap-tiap organisasi perangkat daerah tidak memiliki visi dan misi lagi, akan
																												tetapi menjalankan visi dan misi dari kepala daerahnya. Oleh karena itu, Biro Umum dan
																												Perlengkapan tidak memiliki visi dan misi, melainkan menjalankan visi dan misi Gubernur Sumatera
																												Selatan. Visi Gubernur Sumatera Selatan yaitu : “Sumsel Maju Untuk Semua”</p>
																				</div>
																</div>
																<div class="col-6">
																				<div style="display: flex; justify-content: center; align-items: center;">
																								<h4 style="margin-top: 20px"><strong>Misi</strong></h4>
																				</div>
																				<br>
																				<div style="text-align: justify">
																								<ol>
																												<li>Membangun Sumsel berbasis ekonomi kerakyatan, yang didukung sektor pertanian, industri dan
																																UMKM yang tangguh untuk mengatasi pengangguran dan kemiskinan baik di perkotaan maupun di
																																pedesaan.</li>
																												<li>Meningkatkan kualitas SDM, baik laki-laki maupun perempuan, yang sehat, berpendidikan,
																																profesional, dan menjunjung tinggi nilai-nilai keimanan, ketaqwaan, kejujuran, dan
																																integrasi.</li>
																												<li>Mewujudkan tata kelola pemerintah yang bebas korupsi, kolusi, dan nepotisme dengan
																																mengedepankan transparansi dan akuntabilitas yang didukung aparatur pemerintah yang jujur,
																																berintegrasi, profesional, dan responsif.</li>
																												<li>Membangun dan meningkatkan kualitas dan kuantitas infrastruktur, termasuk infrastruktur
																																dasar guna percepatan pembangunan wilayah pedalaman dan perbatasan. Hal ini untuk
																																memperlancar arus barang dan mobilitas penduduk serta mewujudkan daya saing daerah dengan
																																mempertimbangkan pemerataan dan keseimbangan daerah.</li>
																												<li>Meningkatkan kehidupan beragama, seni, dan budaya untuk membangun karakter kehidupan sosial
																																yang agamis dan berbudaya, dengan ditopang fisik yang sehat melalui kegiatan olahraga,
																																sedangkan pengembangan pariwisata berorientasi pada pariwisata religius.</li>
																								</ol>

																				</div>
																</div>
												</div>
								</div>
				</div>

				<script>
								document.addEventListener("DOMContentLoaded", function() {
												var deleteButtons = document.querySelectorAll('.delete-btn');

												deleteButtons.forEach(function(button) {
																button.addEventListener('click', function(event) {
																				event.preventDefault();
																				var id = this.getAttribute('data-id');
																				var confirmDelete = confirm('Apakah Anda yakin ingin menghapus pegawai ini?');

																				if (confirmDelete) {
																								document.getElementById('deleteForm' + id).submit();
																				}
																});
												});
								});
				</script>
@endsection
