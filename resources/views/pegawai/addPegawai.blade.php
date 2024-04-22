@extends('master')
@section('title', 'Tambah Pegawai')
@section('content')
				<div class="row">
								<div class="col-12">
												<div class="card card-primary">
																<div class="card-header">
																				<h3 class="card-title">Form Tambah Pegawai</h3>
																</div>
																<!-- /.card-header -->
																<!-- form start -->
																<form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
																				@csrf
																				<div class="card-body">
																								<div class="row">
																												<div class="col-6">
																																<div class="form-group">
																																				<label>Nama</label>
																																				<input name="nama" type="text" class="form-control"
																																								placeholder="Masukkan Nama Pegawai">
																																</div>
																																<div class="form-group">
																																				<label>NIP</label>
																																				<input name="nip" type="text" class="form-control"
																																								placeholder="Masukkan NIP Pegawai">
																																</div>
																																<div class="form-group">
																																				<label>Golongan</label>
																																				<input name="golongan" type="text" class="form-control"
																																								placeholder="Masukkan Golongan Pegawai">
																																</div>
																												</div>
																												<div class="col-6">
																																<div class="form-group">
																																				<label>Jabatan</label>
																																				<input name="jabatan" type="text" class="form-control"
																																								placeholder="Masukkan Jabatan Pegawai">
																																</div>

																																<div class="form-group">
																																				<label>Status</label>
																																				<input name="status" type="text" class="form-control"
																																								placeholder="Masukkan Status Pegawai">
																																</div>
																																<div class="form-group">
																																				<label for="exampleInputFile">File input</label>
																																				<div class="input-group">
																																								<div>
																																												<input name="foto" type="file" id="foto"
																																																accept="image/jpeg, image/png, , image/jpg">
																																								</div>
																																				</div>
																																</div>
																												</div>
																								</div>

																				</div>
																				<div class="card-footer">
																								<button type="submit" class="btn btn-primary">Simpan</button>
																				</div>
																</form>
												</div>
								</div>
				</div>
@endsection

@section('scripts')
				<script>
								document.getElementById('foto').addEventListener('change', function() {
												var fileInput = this;
												var maxSize = 500 * 1024; // 500KB dalam bytes
												var files = fileInput.files;

												if (files.length > 0) {
																var fileSize = files[0].size; // Mendapatkan ukuran file pertama yang dipilih
																if (fileSize > maxSize) {
																				alert('Ukuran file melebihi batas maksimum (500KB). Silakan pilih file lain.');
																				fileInput.value = ''; // Menghapus file yang sudah dipilih
																}
												}
								});
				</script>
@endsection
