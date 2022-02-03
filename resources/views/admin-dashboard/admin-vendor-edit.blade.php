@extends('layouts.dashboard')
@section('content')
<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="dashboard-page-header">
                    <h3 class="dashboard-page-title">Edit Vendor</h3>
                </div>
            </div>
        </div>
        <div class="card">
            @if(session('success'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{session('success')}}</strong>
            </div>
            @endif
            @if(session('errors'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{session('errors')}}</strong>
            </div>
            @endif
            <div class="card-header">
                <h4 class="mb0">About Vendor</h4>
            </div>
            <div class="">
                <form action="{{ url('admin-edit-vendor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="venue-form-info card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <input name="id" type="hidden" value="{{ $Vendor->id }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input id="name" name="name" type="text" placeholder="Name" value="{{ $Vendor->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="email" name="email" value="{{ $Vendor->email }}" type="text" placeholder="Email" class="form-control ">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" for="Phone Number">Phone Number</label>
                                    <input id="phone_number" name="phone_number" value="{{ $Vendor->phone_number }}" type="text" placeholder="Phone Number" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="profile-upload-img">
                                    <div class="row">
                                        @if($Vendor->image)
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div id="image-preview">
                                                <img src="../user-image/{{ $Vendor->image }}" alt="" class="rounded-circle">
                                            </div>
                                            <input type="file" name="image" id="image" class="upload-profile-input">
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <div id="image-preview">
                                                <img src="../user-image/grey.jpg" alt="" class="rounded-circle">
                                            </div>
                                            <input type="file" name="image" id="image" class="upload-profile-input">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @if($Vendor->status == 0)
                        <div class="form-group px-4">
                            <input class="form-check-input" name="blocked" type="checkbox" value="blocked" id="flexCheckDefault">
                            <label class="form-check-label font-weight-bold" for="flexCheckDefault">
                                Status
                            </label>
                        </div>
                        @else
                        <div class="form-group px-4">
                            <input class="form-check-input" name="blocked" type="checkbox" value="blocked" id="flexCheckChecked" checked>
                            <label class="form-check-label font-weight-bold" for="flexCheckDefault">
                                Blocked
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="social-form-info card-body border-top">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-default" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection