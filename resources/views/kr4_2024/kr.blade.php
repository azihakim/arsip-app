@extends('master')
@section('title', 'Dokumen')
@section('content')
				@if (session('success'))
								<div class="alert alert-success">
												{{ session('success') }}
								</div>
				@endif
				<div class="card">
								<div class="card-header">
												<h3 class="card-title">Dokumen Pegawai</h3>
												<div class="card-tools"><a href="{{ route('data.create') }}" class="btn btn-block btn-outline-primary">Tambah</a>
												</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
												<table id="example1" class="table-bordered table-striped table">
																<thead>
																				<tr>
																								<th>No</th>
																								<th>Aksi</th>
																								<th>Jenis Kendaraan</th>
																								<th>No Polisi</th>
																								<th>Rangka</th>
																								<th>Mesin</th>
																								<th>Tahun Pembuatan</th>
																								<th>Pemakai</th>
																								<th>SKPD</th>
																								<th>Tanggal Berita Acara</th>
																								<th>No BPKB</th>
																								<th>No Berita Acara</th>
																								<th>Habis Masa Pinjam</th>
																								<th>Dokumen BA</th>
																				</tr>
																</thead>
																<tbody>
																				@foreach ($data as $item)
																								<tr>
																												<td>{{ $loop->iteration }}</td>
																												<td>
																																<div class="row">
																																				<div class="col-6">
																																								<a class="btn btn-block btn-outline-warning"
																																												href="{{ route('data.edit', $item->id) }}"><i
																																																class="nav-icon fas fa-pen-alt"></i>
																																								</a>
																																				</div>
																																				<div class="col-6">
																																								<form id="deleteForm{{ $item->id }}"
																																												action="{{ route('data.destroy', $item->id) }}" method="POST">
																																												@csrf
																																												@method('DELETE')
																																												<button type="submit" class="btn btn-outline-danger btn-block"
																																																onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
																																																<i class="fa fa-trash"></i>
																																												</button>
																																								</form>

																																				</div>
																																</div>
																												</td>
																												<td>{{ $item->jenis }}</td>
																												<td>{{ $item->nopol }}</td>
																												<td>{{ $item->rangka }}</td>
																												<td>{{ $item->mesin }}</td>
																												<td>{{ $item->tahun_pembuatan }}</td>
																												<td>{{ $item->pemakai }}</td>
																												<td>{{ $item->skpd }}</td>
																												<td>{{ $item->tgl_ba }}</td>
																												<td>{{ $item->no_bpkb }}</td>
																												<td>{{ $item->no_ba }}</td>
																												<td>{{ $item->habis_masa_pinjam }}</td>
																												<td><a href="{{ asset('storage/dokumen/' . $item->dok_ba) }}" download>Download</a></td>
																								</tr>
																				@endforeach
																</tbody>
																<tfoot>
																				<tr>
																								<th>No</th>
																								<th>Aksi</th>
																								<th>Jenis Kendaraan</th>
																								<th>No Polisi</th>
																								<th>Rangka</th>
																								<th>Mesin</th>
																								<th>Tahun Pembuatan</th>
																								<th>Pemakai</th>
																								<th>SKPD</th>
																								<th>Tanggal Berita Acara</th>
																								<th>No BPKB</th>
																								<th>No Berita Acara</th>
																								<th>Habis Masa Pinjam</th>
																								<th>Dokumen BA</th>Dokumen BA
																				</tr>
																</tfoot>
												</table>
								</div>
								<!-- /.card-body -->
				</div>
@endsection

@section('scripts')
				<script>
								document.getElementById('linkToNextPage').addEventListener('click', function(event) {
												// Mencegah perilaku bawaan dari tautan
												event.preventDefault();

												// Mendapatkan nilai dari input namaBiro
												var namaBiro = encodeURIComponent(document.querySelector('input[name="namaBiro"]').value);

												// Membuat URL dengan parameter query namaBiro
												var newUrl = "/laporan?namaBiro=" + namaBiro;

												// Pindah ke halaman dengan URL baru
												window.location.href = newUrl;
								});
				</script>

@endsection
