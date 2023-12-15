@extends('layouts.invite')


@section('content')
    {{-- Jumbotron --}}
    <section id="jumbotron">
        <div style="padding-top:74px; height:calc(100vh - 44px);" class="flex flex-col justify-center items-center">
            <h2 class="text-center mx-10 ">
                Ucapan Berhasil Terkirim, Terimakasih Atas Perhatiannya.
            </h2>

            <a href="{{ url('/home') }}" class="py-2 px-10 bg-cyan-600 text-white mt-5">Kembali</a>

        </div>
    </section>



    {{-- copyright --}}
    @include('home.partials.footer')
@endsection
