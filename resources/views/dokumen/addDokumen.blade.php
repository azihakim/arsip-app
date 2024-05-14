@extends('master')
@section('title', 'Tambah Dokumen')
@section('content')
				<div class="row">
								<div class="col-12">
												<div class="card card-info">
																<div class="card-header">
																				<h3 class="card-title">Form Tambah Dokumen</h3>
																</div>
																<!-- /.card-header -->
																<!-- form start -->
																<form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
																				@csrf
																				<div class="card-body">
																								<div class="row">
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Nama</label>
																																				<input name="nama" type="text" class="form-control"
																																								placeholder="Masukkan Nama Pegawai">
																																</div>
																												</div>

																												<div class="col-3">
																																<div class="form-group">
																																				<label>NIP</label>
																																				<input name="nip" type="text" class="form-control"
																																								placeholder="Masukkan NIP Pegawai">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Golongan</label>
																																				<input name="golongan" type="text" class="form-control"
																																								placeholder="Masukkan Golongan Pegawai">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Jabatan</label>
																																				<input name="jabatan" type="text" class="form-control"
																																								placeholder="Masukkan Jabatan Pegawai">
																																</div>
																												</div>
																								</div>

																								<div class="row">
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Jenis Dokumen</label>
																																				<select class="form-control select2" style="width: 100%;">
																																								<option selected="selected">Alabama</option>
																																								<option>Alaska</option>
																																								<option>California</option>
																																								<option>Delaware</option>
																																								<option>Tennessee</option>
																																								<option>Texas</option>
																																								<option>Washington</option>
																																				</select>
																																</div>
																												</div>

																												<div class="col-3">
																																<div class="form-group">
																																				<label>File Dokumen</label>
																																				<div class="input-group">
																																								<input name="file" type="file">
																																				</div>
																																</div>
																												</div>
																								</div>

																				</div>
																				<div class="card-footer">
																								<button type="submit" class="btn btn-info">Simpan</button>
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
