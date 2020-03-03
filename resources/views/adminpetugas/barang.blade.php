@php $page = 'barang' @endphp
@extends('adminpetugas/base')
@section('title','Barang')
@section('content')
<h2>Data Barang</h2>
<div class="float-right mb-4">
  <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarang"><span
      class="fa fa-plus"></span></button>
</div>
<!-- DataTables Example -->
<div class="table-responsive mb-5">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Id Barang</th>
        <th>Nama Barang</th>
        <th>Tanggal Input</th>
        <th>Harga Awal</th>
        <th>Detail Barang</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Id Barang</th>
        <th>Nama Barang</th>
        <th>Tanggal Input</th>
        <th>Harga Awal</th>
        <th>Detail Barang</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($list_barang as $l)
      <tr>
        <td>{{ $l->id_barang }}</td>
        <td>{{ $l->nama_barang }}</td>
        <td>{{ $l->tgl }}</td>
        <td>{{ $l->harga_awal }}</td>
        <td><button class="btn btn-primary btn-sm" onclick="modalDetail({{ $l->id_barang }})"><span class="fa fa-bars"></span></button></td>
        <td>
          <button class="btn btn-success btn-sm"><span class="fa fa-pen"></span></button>
          <button class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- Modal Tambah Barang -->
<div class="modal" tabindex="-1" role="dialog" id="modalTambahBarang">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="barang" method="POST" enctype="multipart/form-data" onsubmit="return cekform()">
          @csrf
          <label class="form-label">Nama Barang</label>
          <input type="text" id="inNama" name="nama_barang" class="form-control" placeholder="Isi nama barang di sini">

          <label class="form-label mt-3">Harga Awal</label>
          <input type="number" id="inHarga" name="harga_awal" class="form-control" placeholder="Ketikkan angka di sini">

          <label class="form-label mt-3">Deskripsi Barang</label>
          <textarea id="inDes" name="deskripsi_barang" class="form-control"
            placeholder="Berikan deskripsi di sini"></textarea> </textarea>

          <label class="form-label mt-3">Upload Foto</label>
          <input type="file" name="photo[]" multiple class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Modal Tambah Barang -->
<!-- Modal Detail Barang -->
<div class="modal" tabindex="-1" role="dialog" id="detailBarang">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Barang</h5>
        <button class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="barangId" id="barangId">
        <h6>Nama Barang</h6>
        <p id="namaBarang"></p>

        <h6>Tanggal Input</h6>
        <p id="tglBarang"></p>

        <h6>Harga Awal</h6>
        <p id="hargaBarang"></p>

        <h6>Deskripsi Barang</h6>
        <p id="desBarang"></p>

        <img id="photoBarang" width="100" height="100">
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- /Modal Detail Barang -->
<!-- JS Cek Form -->
<script>
  function modalDetail(idBarang) {
      $.ajax(
        {
          type: "GET",
          url: "barang/"+idBarang,
          success:function(data){
            console.log(data);
            $('#namaBarang').html(data.data[0].nama_barang);
            $('#tglBarang').html(data.data[0].tgl);
            $('#hargaBarang').html(data.data[0].harga_awal);
            $('#desBarang').html(data.data[0].deskripsi_barang);
            $('#photoBarang').attr('src','barangPhotos/'+data.photo[0].photo_name);
          }
        });
      $('#detailBarang').modal();
  }

  function cekform() {
    var namaB = document.getElementById('inNama').value;
    var hargaB = document.getElementById('inHarga').value;
    var desB = document.getElementById('inDes').value;

    if (namaB.length == 0) {
      swal('Peringatan', 'Nama barang wajib diisi!', 'warning')
      return false
    } else {
      if (hargaB.length == 0) {
        swal('Peringatan', 'Harga barang wajib diisi!', 'warning')
        return false
      } else {
        if (desB.length == 0) {
          swal('Peringatan', 'Deskripsi barang wajib diisi!', 'warning')
          return false
        } else {
          return true
        }
      }
    }
  }
</script>
<!-- /JS Cek Form -->
@endsection