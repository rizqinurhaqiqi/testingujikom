@extends('layout.master')
@section('content')
 <h1>
     hi! {{Auth()->user()->name}}
</h1>
<br>
selamat datang di Pedulidiri

 @stop