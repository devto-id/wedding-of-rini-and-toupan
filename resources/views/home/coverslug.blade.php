@extends('layouts.invite')

@section('content')
<section id="cover" class="p-20 max-md:p-16 max-sm:p-10 max-sm:pt-20 bg-center bg-no-repeat bg-cover w-full h-screen" style="background-image: url( '{{ asset('img/background/cover/cover.png') }}' );">
    <div class="container">
        <div class="content text-center">
            <div class="title flex justify-evenly flex-wrap max-w-md m-auto text-cyan-700 mb-[25vh] max-sm:mb-[15vh]">
                <h3 class="text-lg tracking-widest">U N D A N G A N</h3>
                <h3 class="text-lg tracking-widest">P E R N I K A H A N</h3>
            </div>
            <div class="tamu-undangan w-[25%] max-2xl:w-[50%] max-sm:w-full h-24 border-2 border-cyan-600 m-auto text-center text-cyan-600 p-2">
                <p class="text-sm">
                    Kepada Bapak/Ibu/Saudara/I
                </p>
                <p class="text-xl my-1">
                    {{ $visitor->name }}
                </p>
                <p class="text-sm">
                    di Tempat
                </p>
            </div>
            <div class="apologize m-auto w-[25%] max-2xl:w-full max-sm:w-full text-sm text-cyan-600">
                <p>*mohon maaf apababila ada kesalahan nama dan gelar</p>
            </div>
            <div class="name-bride mb-5 mt-10">
                <h1 class="text-4xl font-heading text-cyan-700">{{ $profile->first_name_bride }} & {{ $profile->first_name_groom }}</h1>
            </div>
            <div class="line max-w-sm h-0.5 bg-cyan-500 m-auto"></div>
            <div class="date mt-5 flex justify-center max-w-xs m-auto text-xl text-cyan-700">
                @php
                    $carbonDate = \Carbon\Carbon::parse($date);
                @endphp
                <p class="mx-4">{{ $carbonDate->format('d') }}</p>
                <p class="mx-4">.</p>
                <p class="mx-4">{{ $carbonDate->format('m') }}</p>
                <p class="mx-4">.</p>
                <p class="mx-4">{{ $carbonDate->format('Y') }}</p>
            </div>
            <div class="open-button mt-5 mx-auto w-fit h-fit px-10 py-2 bg-cyan-700 text-white text-md max-sm:text-sm tracking-[.45rem] hover:bg-cyan-800 transition-colors cursor-pointer" id="openButton">
                <a href="home">BUKA UNDANGAN</a>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('openButton').addEventListener('click', function() {
        var cover = document.getElementById('cover');
        cover.style.transition = 'opacity .3s';
        cover.style.opacity = '0';
    });
</script>
@endsection