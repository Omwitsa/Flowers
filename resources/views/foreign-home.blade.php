@extends('shared.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <div class="card landing-card">
                    <div class="card-header">
                        <div class="text-center"><h3>FLOWERS PORTAL</h3></div>
                        <div style="text-align: right">
                            <a style="color: #FFFFFF" href="/logout">logout <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="card-block">
                        <!-- <img src="assets/images/rosebg.jpg" alt="roses" style="width:100%; height:500px;"> -->
                        <!-- <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-lg">Log in</a> -->
                        <div class="row home-section">
                            <div class="col-xs-12 col-sm-6">
                                <div class="row type">
                                    <div class="col-xs-12 col-sm-6">
                                        <img src="assets/images/flowers/singleflower.jpg" alt="Flowers" style="width:100%;">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 text-center">
                                        <h1>Single <br> Rose Box</h1><br>
                                        <a href="/foreign-dashboard" style="color: #FFFFFF" class="btn waves-effect waves-light btn-primary btn-outline-primary" wire:navigate>
                                            <i class="ti-shopping-cart"></i>Order Now </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="row type">
                                    <div class="col-xs-12 col-sm-6">
                                        <img src="assets/images/flowers/mix-rose.jpg" alt="Flowers" style="width:100%;">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 text-center">
                                        <h1>Mixed <br> Rose Box</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <i>For immediate support call</i> &nbsp; 
                        <i class="fa fa-phone" aria-hidden="true"></i> <i>+254 730 779 200 </i> Or <br>
                        email <i class="fa fa-envelope" aria-hidden="true">&nbsp; flowersales@aaagrowers.co.ke</i><br><br>
                        AAA IT TEAM © 2024
                    </div>
                </div>
            </div>
        </div>
    </div>  
@stop