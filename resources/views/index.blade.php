<!DOCTYPE html>
<html>
<head>
	<title>ArkaShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
	<div class="container">
   <a class="navbar-brand" href="#">
    <img src="./asset/logo.svg" height="61" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline col-11">
      <input class="form-point-nav mr-sm-2 col-12" type="search" placeholder="Search" aria-label="Search">
    </form>
      <ul class="navbar-nav">
      <li class="nav-item active">
        <button type="button" class="btn shadow-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#exampleModalLong">ADD</button>
      </li>
    </ul>
  </div>
</div>
</nav>
<div class="container justify-content-center pt-5">
<table class="table col-8 m-auto bg-white shadow" border="0">
  <thead class="shadow-sm">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="tbody">
    @foreach($data as $n)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$n->nama_produk}}</td>
        <td>{{$n->keterangan}}</td>
        <td>{{$n->harga}}</td>
        <td>{{$n->jumlah}}</td>
        <td data-id="{{$n->id}}">
          <button type="button" class="btn btn-success edit-item" data-toggle="modal" data-target="#edit-item">Edit</button>
          <a href="/delete/{{$n->id}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('api.store')}}">
          {{csrf_field()}}
          <div class="form-group">
           <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Harga" name="harga">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="PUT" action="/api">
          {{csrf_field()}}
          <input type="hidden" name="id">
          <div class="form-group">
           <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Harga" name="harga">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary crud-submit-edit">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete -->
<!-- Modal -->
  <script type="text/javascript" src="{{ asset('asset/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <script type="text/javascript">
    var url = "<?= route('api.index') ?>";
  </script>
  <script type="text/javascript" src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>