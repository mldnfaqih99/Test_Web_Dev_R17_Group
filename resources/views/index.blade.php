<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Datatables CSS -->
    <link href="{{asset('assets/Datatables/datatables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <title>{{$DataDiri['nama']}} | {{$DataDiri['title']}}</title>
</head>
<body>
    <nav class="navbar bg-primary mb-5">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">{{$DataDiri['nama']}}</span>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="row text-center">
                    <div class="text-center my-auto">
                        <div class="card card-block d-flex" style="height: 120px; background-color:#E9ECEF">
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <strong>
                                {{$DataDiri['company']}} - {{$DataDiri['title']}}
                                <br>
                                {{$DataDiri['nama']}}
                                <br>
                                {{$DataDiri['email']}}
                            </strong>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                @if (Session::has('Success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('Success') }}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputULRS">API</span>
                    <input type="text" id="APIURLS" class="form-control" placeholder="URL" aria-label="URL" aria-describedby="inputULRS" value="">
                    <button class="btn btn-primary" type="button" onclick="SubmitURLS()">Submit</button>
                </div>
                <div id="addData" class="mb-3" style="display:none">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalAdd">New Data</button>
                </div>
                <table id="Datatables" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('modal')
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Jquery Assets -->
    <script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
    <!-- Datatables Assets -->
    <script src="{{asset('assets/Datatables/datatables.min.js')}}"></script>
    @include('script')
</body>
</html>
