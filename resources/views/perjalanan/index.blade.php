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
      

<!-- Default Table -->
        </div>
        <div class="col-10">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
<form action="/perjalanan/create" method="POST">
@csrf
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Suhu tubuh</label>
    <input name="suhu_tubuh" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Jam</label>
    <input name="jam" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal</label>
    <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  {{-- alamat --}}
                                    {{-- provinsi --}}
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Provinsi</label>
                                         <div class="col-md-8 col-lg-9">
                                            <select class="custom-select" name="selectProvinsi" id="selectProvinsi">
                                                {{-- <option>Provinsi</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    {{-- kabupaten/kota --}}
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">kabupaten/kota</label>
                                         <div class="col-md-8 col-lg-9">
                                            <select class="custom-select" name="selectKabupaten" id="selectKabupaten">
                                                {{-- <option>Kabupaten</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    {{-- kecamatan --}}
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">kecamatan</label>
                                         <div class="col-md-8 col-lg-9">
                                            <select class="custom-select" name="selectKecamatan" id="selectKecamatan">
                                                {{-- <option value="Kecamatan"></option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    {{-- kelurahan --}}
                                    <div class="row mb-3">
                                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                                         <div class="col-md-8 col-lg-9">
                                            <select class="custom-select" name="selectKelurahan" id="selectKelurahan">
                                                {{-- <option> Kelurahan </option> --}}
                                            </select>
                                        </div>
                                    </div>

                                    {{-- final alamat --}}
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="lokasi" id="alamat">{{$data->alamat ?? ''}}</textarea>
                                    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="col-10">
        <h5 class="card-title">Perjalanan </h5>
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">suhu tubuh</th>
                    <th scope="col">jam</th>
                    <th scope="col" ><center> lokasi</center></th>
                    <th scope="col">aksi</th>
                   
                  </tr>
                </thead>
                <tbody>
                @foreach ($user->perjalanan as $a => $i)
                  <tr>
                    <th scope="row">{{$a+1}}</th>
                    <th>{{$i->tanggal}}</th>
                    <td>{{$i->suhu_tubuh}}</td>
                    <td>{{$i->jam}}</td>
                    <td> <center> {{$i->lokasi}}</center></td>
                    <td><a href="/perjalanan/delete/{{$i->id}}" class="btn btn-sm btn-danger" >delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
   
              
             

              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
    </div>
    </body>
    <script>
        let selectProvinsi = document.getElementById('selectProvinsi');
        let selectKabupaten = document.getElementById('selectKabupaten');
        let selectKecamatan = document.getElementById('selectKecamatan');
        let selectKelurahan = document.getElementById('selectKelurahan');
        let alamat = document.getElementById('alamat');
        document.addEventListener('DOMContentLoaded', function(){
            fetchProvinsi();
            selectKabupaten.style.display = "none";
            selectKecamatan.style.display = "none";
            selectKelurahan.style.display = "none";
            getValueToAlamat();
        });
        const config = {
            method : 'GET'
        }
        // fetch provinsi get data
        async function fetchProvinsi(){
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`;
            await fetch(URL, config)
            .then(response => response.json())
            // .then(provinsi => console.log(provinsi))
            .then(provinsi => {
                if(provinsi != null || undefined){
                    provinsi.map(data=>{
                        let opt = document.createElement('option');
                        opt.value = data.id;
                        opt.innerHTML = data.name;
                        selectProvinsi.appendChild(opt);
                        // console.log(selectProvinsi)
                    })
                }else{
                    let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectProvinsi.appendChild(opt);
                }
            }).catch(error => alert(`Data provinsi tidak ada`));
        }
        // fetch kabupaten/kota get data
        async function fetchKabupaten(id){
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
            .then(response => response.json())
            .then(kabupaten =>{
                if (kabupaten !== null || undefined) {
                        kabupaten.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKabupaten.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKabupaten.appendChild(opt);
                    }
            })
        }
        // fetch kecamatan get data
        async function fetchKecamatan(id){
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/districts/${id === undefined || null ? ""  : id}.json`;
            await fetch(URL, config)
            .then(response => response.json())
            .then(kecamatan =>{
                if (kecamatan !== null || undefined) {
                        kecamatan.map(data => {
                            let opt = document.createElement('option');
                            opt.value = data.id;
                            opt.innerHTML = data.name;
                            selectKecamatan.appendChild(opt);
                        })
                    } else {
                        let opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "Data tidak tersedia";
                        selectKecamatan.appendChild(opt);
                    }
            })
        }
    
        async function fetchKelurahan(id){
            const URL = `http://www.emsifa.com/api-wilayah-indonesia/api/villages/${id === undefined || null ? "" : id}.json`;
            await fetch(URL, config)
            .then(response => response.json())
            .then(kelurahan => {
                if(kelurahan !== null || undefined){
                    kelurahan.map(data => {
                        let opt = document.createElement('option');
                        opt.value = data.id;
                        opt.innerHTML = data.name;
                        selectKelurahan.appendChild(opt);
                    })
                }else{
                    let opt = document.createElement('option');
                    opt.value = "";
                    opt.innerHTML = "Data Tidak Tersedia";
                    selectKelurahan.appendChild(opt);
                }
            })
        }
        selectProvinsi.addEventListener('change', () => {
            fetchKabupaten(selectProvinsi.value);
            selectKabupaten.style.display = "block";
            selectKabupaten.innerHTML = '';
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        
        selectKabupaten.addEventListener('change', () => {
            fetchKecamatan(selectKabupaten.value);
            selectKecamatan.style.display = "block";
            selectKecamatan.innerHTML = '';
            selectKelurahan.innerHTML = '';
        });
        
        selectKecamatan.addEventListener('change', () => {
            fetchKelurahan(selectKecamatan.value);
            selectKelurahan.style.display = "block";
            selectKelurahan.innerHTML = '';
        });
        function getValueToAlamat() {
            alamat.addEventListener('change', () => {
                let alamatText = alamat.value;
                document.getElementById('alamat').value = `${alamatText}, ${selectKelurahan.options[selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKabupaten.options[selectKabupaten.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `;
                // console.log(`${alamatText}, ${selectKelurahan.options[  selectKelurahan.selectedIndex].text}, ${selectKecamatan.options[selectKecamatan.selectedIndex].text}, ${selectKabupaten.options[selectKabupaten.selectedIndex].text}, ${selectProvinsi.options[selectProvinsi.selectedIndex].text}, `);
                
            });
        }
    </script>
 </html>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>