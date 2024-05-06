@extends('master')
@section('title', 'Tambah Data')
@section('content')
				<div class="row">
								<div class="col-12">
												<div class="card card-info">
																<div class="card-header">
																				<h3 class="card-title">Form Tambah Data</h3>
																</div>
																<!-- /.card-header -->
																<!-- form start -->
																<form action="{{ route('data.update', $data->id) }}" method="POST" enctype="multipart/form-data">
																				@csrf
																				@method('PUT')
																				<div class="card-body">
																								<div class="row">
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Jenis Kendaraan</label>
																																				<input name="jenis" type="text" class="form-control" value="{{ $data->jenis }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>No Polisi</label>
																																				<input name="nopol" type="text" class="form-control" value="{{ $data->nopol }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Rangka</label>
																																				<input name="rangka" type="text" class="form-control" value="{{ $data->rangka }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Mesin</label>
																																				<input name="mesin" type="text" class="form-control" value="{{ $data->mesin }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Tahun Pembuatan</label>
																																				<input name="tahun_pembuatan" type="text" class="form-control"
																																								value="{{ $data->tahun_pembuatan }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Pemakai</label>
																																				<input name="pemakai" type="text" class="form-control" value="{{ $data->pemakai }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>SKPD</label>
																																				<input name="skpd" type="text" class="form-control" value="{{ $data->skpd }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Tanggal Berita Acara</label>
																																				<input value="{{ $data->tgl_ba }}" id="tgl_ba" name="tgl_ba" type="date"
																																								class="form-control" placeholder="Masukkan SKPD" onchange="calculateEndDate()">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>No BPKB</label>
																																				<input name="no_bpkb" type="text" class="form-control" value="{{ $data->no_bpkb }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>No Berita Acara</label>
																																				<input name="no_ba" type="text" class="form-control" value="{{ $data->no_ba }}">
																																</div>
																												</div>
																												<div class="col-3">
																																<div class="form-group">
																																				<label>Habis Masa Pinjam</label>
																																				<input id="habis_masa_pinjam" name="habis_masa_pinjam" type="text"
																																								class="form-control" placeholder="Tanggal Habis Masa Pinjam" readonly
																																								value="{{ $data->habis_masa_pinjam }}">
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
								function calculateEndDate() {
												var tgl_ba = document.getElementById('tgl_ba').value;
												var date = new Date(tgl_ba);

												// Tambahkan 5 tahun ke tanggal berita acara
												date.setFullYear(date.getFullYear() + 5);

												// Ubah format tanggal menjadi yyyy-mm-dd
												var yyyy = date.getFullYear();
												var mm = String(date.getMonth() + 1).padStart(2, '0');
												var dd = String(date.getDate()).padStart(2, '0');
												var endDate = yyyy + '-' + mm + '-' + dd;

												// Set nilai input habis_masa_pinjam dengan tanggal yang dihitung
												document.getElementById('habis_masa_pinjam').value = endDate;
								}
				</script>
@endsection
