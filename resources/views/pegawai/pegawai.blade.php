@extends('master')
@section('title', 'Pegawai')
@section('content')
				<div class="card">
								<div class="card-header">
												<h3 class="card-title">Data Pegawai</h3>
												<a href="{{ url('pegawai/create') }}" class="btn btn-primary float-right">Tambah Pegawai</a>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
												<table id="example1" class="table-bordered table-striped table">
																<thead>
																				<tr>
																								<th>Nama</th>
																								<th>NIP</th>
																								<th>Golongan</th>
																								<th>Jabatan</th>
																								<th>Status</th>
																								<th>Foto</th>
																								<th>Aksi</th>
																				</tr>
																</thead>
																<tbody>
																				@foreach ($pegawai as $item)
																								<tr>
																												<td>{{ $item->nama }}</td>
																												<td>{{ $item->nip }}</td>
																												<td>{{ $item->golongan }}</td>
																												<td>{{ $item->jabatan }}</td>
																												<td>{{ $item->status }}</td>
																												<td><img src="{{ asset('storage/foto/' . $item->foto) }}" alt="Foto Pegawai" width="100"></td>
																												<td>
																																<div class="row">
																																				<div class= "col-6">
																																								<a class="btn btn-block btn-outline-warning"
																																												href="{{ url('pegawai/' . $item->id . '/edit') }}">Edit</a>
																																				</div>
																																				<div class= "col-6">
																																								<form id="deleteForm{{ $item->id }}" action="{{ url('pegawai/' . $item->id) }} "
																																												method="POST">
																																												@csrf
																																												<input type="hidden" name="_method" value="DELETE">
																																												<button class="btn btn-block btn-outline-danger delete-btn">Hapus</button>
																																								</form>
																																				</div>
																																</div>
																												</td>
																								</tr>
																				@endforeach
																</tbody>
																<tfoot>
																				<tr>
																								<th>Nama</th>
																								<th>NIP</th>
																								<th>Golongan</th>
																								<th>Jabatan</th>
																								<th>Status</th>
																								<th>Foto</th>
																								<th>Aksi</th>
																				</tr>
																</tfoot>
												</table>
								</div>
								<!-- /.card-body -->
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
