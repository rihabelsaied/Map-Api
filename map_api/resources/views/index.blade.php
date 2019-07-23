@extends('layouts.master')
@section('content')
    <div class="container-fluid">
    <span class="alert-success text-center" style="margin-left:38%;font-size:20px">
    <?php
        $msg = Session::get('mesage');
        if($msg){
            echo "$msg";
            Session::put('mesage',null);
        }
    ?>
</span>
        <div class=" error col-md-4 col-md-offset-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </div>
    <form class="text-center border border-light p-5" action="{{url('/store')}}" method="post">
    @csrf
    <p class="h4 mb-4">Add New Branch</p>
       
        
        <div class="">
            <input type="text" name="branch_name" placeholder="Plz enter branch name" class="form-control mb-4">

        </div>
        <div class="form-group">

            <input type="text"  id="search" name="address" placeholder="Plz enter your add" class="form-control mb-4">
            <input type="hidden" name="lat" id="latclicked">
            <input type="hidden" name="lng" id="longclicked">
        </div>
        <div id="map"></div>
        <div class="button">
        <input type="submit" class="btn btn-info btn-block" value="Save">
        </div>
        </form>
    </div>

 
            
@endsection