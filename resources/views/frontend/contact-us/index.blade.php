@extends('frontend.layouts.main')
@section('title', 'Laundry')

@section('content')
    <section id="intro">
        <div class="container-fluid" style="margin-top: 2%">

            <div class="section-header">
                <h1 class="text-center text-white-th"> ติดต่อเรา</h1>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-lg-12">
                    <div class="map mb-4 mb-lg-0">
                        <iframe src="https://maps.google.com/maps?q=%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%99%E0%B8%8B%E0%B8%B1%E0%B8%81%E0%B8%A3%E0%B8%B5%E0%B8%94%E0%B8%9A%E0%B8%B8%E0%B8%A3%E0%B8%B5%E0%B8%A3%E0%B8%B1%E0%B8%A1%E0%B8%A2%E0%B9%8C%20%E0%B8%AA.%E0%B8%AA%E0%B8%B0%E0%B8%AD%E0%B8%B2%E0%B8%94%E0%B8%9A%E0%B8%B8%E0%B8%A3%E0%B8%B5%E0%B8%A3%E0%B8%B1%E0%B8%A1%E0%B8%A2%E0%B9%8C&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center interval-top-about">
                <div class="info ">
                    <i class="fab fa-periscope text-white-th"> 45 sadao plubplachai</i>
                    <p></p>
                </div>

                <div class=" info interval-about">
                    <i class="ion-ios-email-outline text-white-th">  laundry@gmail.com</i>
                    <p></p>
                </div>
                <div class="info interval-about text-white-th">
                    <i class="ion-ios-telephone-outline">  091-365-6985</i>
                    <p></p>
                </div>
            </div>

        </div>
    </section>
@endsection