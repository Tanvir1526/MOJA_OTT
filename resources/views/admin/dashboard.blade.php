@extends('admin.layouts.main')
@section('content')

<div class="main-panel">
            <div class="content-wrapper">
                
                <div class="row">
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Totol User</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"> {{$userCount}}</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Premium User</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$premiumUserCount}}</h3>
                                    <i class=" ti-crown icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Admin</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$adminUserCount}}</h3>
                                    <i class=" ti-crown icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Production House</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$productionUserCount}}</h3>
                                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Total Content</p>
                                <div
                                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$contentCount}}</h3>
                                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

@endsection