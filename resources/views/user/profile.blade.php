@extends('layout.master')
@section('content')

<section class="section profile">
    
       
<div class="row">
   <div class="col-xl-9">
    
<div class="card">
  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

    <img src="{{asset ('foto/'.Auth::user()->foto)}}" alt="Profile" class="rounded-circle">
    <h2>{{Auth()->user()->name}}</h2>
    <h3>Perjalanan</h3>
   
</div>

</div>
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

                <li class="nav-item"> 
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{Auth()->user()->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">email</div>
                    <div class="col-lg-9 col-md-8">{{Auth()->user()->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">nik</div>
                    <div class="col-lg-9 col-md-8">{{Auth()->user()->nik}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{Auth()->user()->alamat}}</div>
                  </div>

                 
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="/profile/edit/{{$user->id}}"  method="post" enctype="multipart/form-data">
                    @csrf
                

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{$user->name}}">
                      </div>
                    </div>

                  
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nik" type="text" class="form-control" id="company" value="{{$user->nik}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">NO.Telepon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_telp" type="text" class="form-control" id="company" value="{{$user->no_telp}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">foto</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="foto" type="file" class="form-control" id="foto" value="">
                      </div>
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
                                        <textarea class="form-control" name="alamat" id="alamat">{{$data->alamat ?? ''}}</textarea>
                                    </div>



                  

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked="">
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked="">
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked="" disabled="">
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
      
    </section>
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

@endsection