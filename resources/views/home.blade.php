@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 style="margin: 0px 0px 0px 28.5%; color: #6cb2eb;">SM Lanang Restaurant List</h1></div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <task-component></task-component>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="card border-info mb-3" style="top: 14.5%; position: absolute;">
    <a class="twitter-timeline" data-width="390" data-height="800" daata-theme="light" href="https://twitter.com/SMLanangPremier?ref_src=twsrc%5Etfw">Tweets by SMLanangPremier</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    
</div>
<div class="card border-info mb-3" style="top: 14.5%; right: 0%; position: absolute;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.233205450274!2d125.62885521445997!3d7.098947318176177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f96d246bac4b79%3A0xb413f019edade0fa!2sSM%20Lanang%20Premier!5e0!3m2!1sen!2sph!4v1589972148864!5m2!1sen!2sph" width="390" height="800" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
</div>







@endsection
