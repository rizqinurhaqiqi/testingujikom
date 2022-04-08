@extends('layout.master')

@section('content')

<DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    </head>
    <body>
        <div class="container">

        <div class="row">
            <div class="col-10">
            <h5 class="card-title">Data User PeduliDiri </h5>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <a  href="/admin/cetak/user_pdf" class="btn btn-primary"  target="_blank">CETAK PDF</a>
                </div>
            </div>
            <table class="table">
                    <thead>
                      <tr>
                          <th scope="col">nik</th>
                        <th scope="col">nama</th>
                        <th scope="col">alamat</th>
                        <th scope="col">email</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $a)
                        <tr>

                            <td>{{$a->nik}}</td>
                            <td>{{$a->name}}</td>
                            <td>{{$a->alamat}}</td>
                            <td>{{$a->email}}</td>
                            <td><a href="/admin/delete/{{$a->id}}" class="btn btn-sm btn-danger">delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
            </div>




<!-- Default Table -->
        </div>


        </div>


              <!-- End Default Table Example -->

    </body>
 </html>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
