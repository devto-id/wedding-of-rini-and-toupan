@extends('layouts.invite')

@section('content')
    <x-navbar></x-navbar>
    <audio id="myAudio" src="{{ asset('mp3/_2_Ed Sheeran - Perfect.mp3') }}" autoplay></audio>
    <section id="jumbotron" class="w-full h-screen bg-no-repeat bg-cover bg-center max-sm:bg-left" style="background-image: url('{{ asset('img/background/jumbotron/jumbotron.png') }}')" >
        <div class="container m-auto">
            <div class="name-bride text-center pt-[50vh]">
                <h1 class="text-[9vh] max-sm:text-[7vh] font-heading text-cyan-700 -mb-5 m-auto">{{ $profile->first_name_bride }} &</h1>
                <h1 class="text-[9vh] max-sm:text-[7vh] font-heading text-cyan-700 -mt-5 m-auto">{{ $profile->first_name_groom }}</h1>
            </div>
            <div class="date m-auto mt-5 p-2 w-[30%] max-xl:w-[75%] max-sm:w-[80%] h-24 border-t border-b border-cyan-500 text-cyan-600 flex">
                <div class="countdown w-[50%] h-full border-r border-cyan-500" id="countdown">
                    <div class="days-hours flex justify-evenly">
                        <div class="day text-center">
                            <span id="days">00</span>
                            <p class="-mt-2">Hari</p>
                        </div>
                        <div class="hour text-center">
                            <span id="hours">00</span>
                            <p class="-mt-2">Jam</p>
                        </div>
                    </div>
                    <div class="minutes-seconds flex justify-evenly">
                        <div class="minute text-center">
                            <span id="minutes">00</span>
                            <p class="-mt-2">Menit</p>
                        </div>
                        <div class="second text-center">
                            <span id="seconds">00</span>
                            <p class="-mt-2">Detik</p>
                        </div>
                    </div>
                </div>
                <div class="date-save w-[50%] h-full text-center flex flex-col justify-center">
                    <div class="text mb-1">
                        <p>Save The Date</p>
                    </div>
                    <div class="date-start flex justify-center mt-1">
                        @php
                            $carbonDate = \Carbon\Carbon::parse($date);
                        @endphp
                        <p class="mx-[2px]">{{ $carbonDate->format('d') }}</p>
                        <p class="mx-[2px]">.</p>
                        <p class="mx-[2px]">{{ $carbonDate->format('m') }}</p>
                        <p class="mx-[2px]">.</p>
                        <p class="mx-[2px]">{{ $carbonDate->format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="quotes" class="w-full h-fit bg-cyan-600 flex max-sm:flex-col max-sm:text-center py-20 text-white">
        <div class="initial w-[25%] m-auto max-sm:mb-10 text-7xl font-medium">
            <div class="text w-full flex justify-center m-auto pt-4 px-4 border-t border-x border-white rounded-t-full">
                <div class="groom">
                    <h1 class="font-heading -mr-5">{{ $profile ? substr($profile->first_name_groom, 0, 1) : '' }}</h1>
                </div>
                <div class="bride">
                    <h1 class="font-heading -ml-5">{{ $profile ? substr($profile->first_name_bride, 0, 1) : '' }}</h1>
                </div>
            </div>
            <div class="line h-px w-20 m-auto mt-5 border-t border-white"></div>
        </div>
        <div class="quotes w-[75%] m-auto">
            <div class="title font-semibold mb-3">
              <h6>QS. Ar-Rum Ayat 21</h6>
            </div>
            <div class="arab font-medium text-xl mb-3">
                <p>وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا لِّتَسْكُنُوْٓا اِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَّوَدَّةً وَّرَحْمَةً ۗاِنَّ فِيْ ذٰلِكَ لَاٰيٰتٍ لِّقَوْمٍ يَّتَفَكَّرُوْنَ</p>
            </div>
            <div class="terjemah">
              <p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir."</p>
            </div>
        </div>
    </section>
    <section id="couple" class="bg-cyan-900 w-full h-fit py-20 px-5 ">
        <div class="bride flex h-fit w-full items-center max-sm:flex-col">
            <div class="image flex h-fit w-[40%] mr-16 max-sm:mr-0 max-sm:w-full items-center">
                <div class="title max-sm:-mr-6 font-heading text-vertical text-white font-bold text-6xl max-sm:text-5xl">
                    THE BRIDE
                </div>
                <div class="photo w-[25vw] max-2xl:w-[30vw] max-xl:w-full max-lg:w-[40] max-sm:h-[75vw] max-sm:w-[60vw] bg-cyan-300">
                    <img src="{{ asset('img/profile/profilePhotoBride.jpg') }}" alt="" width="100%">
                </div>
            </div>
            <div class="line-center h-1 w-[20%] bg-white max-sm:hidden"></div>
            <div class="text-profile w-[40%] pl-16 max-sm:pl-6 max-sm:mt-6 max-sm:w-full">
                <div class="full-name font-heading font-medium text-white text-4xl">
                    <p>{{ $profile->first_name_bride }} {{ $profile->last_name_bride }}</p>
                </div>
                <div class="child-of">
                    <p class="font-heading font-medium text-white text-xl">
                        Putri {{ $profile->daughter_of }} Dari:
                    </p>
                    <p class="font-light text-white text-xl">
                        Bapak {{ $parent->name_dad_of_bride }} dan
                    </p>
                    <p class="font-light text-white text-xl">
                        Ibu {{ $parent->name_mom_of_bride }}
                    </p>
                    <p class="font-light text-white text-xl">
                        Dari {{ $profile->hometown_bride }}
                    </p>
                    <a href="https://www.instagram.com/{{ $profile->ig_bride }}" class="font-light text-white text-md hover:underline underline-offset-8 transition-all">
                        <i class="fa-brands fa-instagram"></i> {{ $profile->ig_bride }}
                    </a>
                </div>
            </div>
        </div>
        <div class="groom flex h-fit w-full items-center max-sm:flex-col-reverse text-end">
            <div class="text-profile w-[40%] pr-16 max-sm:pr-6 max-sm:mb-6 max-sm:w-full">
                <div class="full-name font-heading font-medium text-white text-4xl">
                    <p>{{ $profile->first_name_groom }} {{ $profile->last_name_groom }}</p>
                </div>
                <div class="child-of">
                    <p class="font-heading font-medium text-white text-xl">
                        Putra {{ $profile->son_of }} Dari:
                    </p>
                    <p class="font-light text-white text-xl">
                        Bapak {{ $parent->name_dad_of_groom }} dan
                    </p>
                    <p class="font-light text-white text-xl">
                        Ibu {{ $parent->name_mom_of_groom }}
                    </p>
                    <p class="font-light text-white text-xl">
                        Dari {{ $profile->hometown_groom }}
                    </p>
                    <a href="https://www.instagram.com/{{ $profile->ig_groom }}" class="font-light text-white text-md hover:underline underline-offset-8 transition-all">
                        <i class="fa-brands fa-instagram"></i> {{ $profile->ig_groom }}
                    </a>
                </div>
            </div>
            <div class="line-center h-1 w-[20%] bg-white max-sm:hidden"></div>
            <div class="image flex h-fit w-[40%] ml-16 max-sm:ml-0 max-sm:w-full justify-end items-center mt-10">
                <div class="photo w-[25vw] max-2xl:w-[30vw] max-xl:w-full max-lg:w-[40] max-sm:w-[60vw] bg-cyan-300">
                    <img src="{{ asset('img/profile/profilePhotoGroom.jpg') }}" alt="" width="100%">
                </div>
                <div class="title max-sm:-ml-6 font-heading text-vertical text-white font-bold text-6xl max-sm:text-4xl">
                    THE GROOM
                </div>
            </div>
        </div>
    </section>
    <section id="gallery" class="bg-no-reapeat bg-center max-sm:bg-left bg-cover w-full h-fit py-12 px-5" style="background-image: url('{{ asset('img/background/gallery/gallery.png') }}')">
        <div class="container w-full m-auto">
            <div class="title w-full m-auto text-center">
                <p class="font-heading text-cyan-600 text-6xl">Gallery</p>
            </div>
            <swiper-container class="mySwiper w-[35%] max-xl:w-[50%] max-lg:w-[65%] max-md:w-[75%] max-sm:w-full max-h-[800px] mt-8 border-[35px] border-gray-200 rounded-xl bg-gray-200 " pagination="true" pagination-clickable="true" navigation="true" space-between="30"
                centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false" grabCursor="true"
                centeredSlides="true">
                <swiper-slide class="max-h-[500px] mb-10 overflow-hidden rounded-lg">
                    <img src="{{ asset('img/gallery/1.jpg') }}" alt="gallery">
                </swiper-slide>
                <swiper-slide class="max-h-[500px] mb-10 overflow-hidden rounded-lg">
                    <img src="{{ asset('img/gallery/2.jpg') }}" alt="gallery">
                </swiper-slide>
                <swiper-slide class="max-h-[500px] mb-10 overflow-hidden rounded-lg">
                    <img src="{{ asset('img/gallery/3.jpg') }}" alt="gallery">
                </swiper-slide>
                <swiper-slide class="max-h-[500px] mb-10 overflow-hidden rounded-lg">
                    <img src="{{ asset('img/gallery/4.jpg') }}" alt="gallery">
                </swiper-slide>
            </swiper-container>
        </div>
    </section>
    <section id="rundown" class="bg-cyan-900 py-16">
        <div class="container-fluid w-full m-auto">
            <div class="title w-full m-auto text-center">
                <div class="title w-full m-auto text-center">
                    <p class="font-heading text-white text-6xl">Rundown</p>
                </div>
            </div>
            <div class="content flex flex-col w-full mt-10">
                <div class="akad bg-white h-fit w-[40%] max-lg:w-[50%] max-md:w-[80%] max-sm:w-[95%] px-10 py-10 mt-5">
                    <div class="sub-title">
                        <p class="font-heading font-semibold text-cyan-600 text-4xl">
                            Akad Nikah
                        </p>
                    </div>
                    <div class="date mt-1">
                        <p class="text-xl text-cyan-600">
                            Selasa, 26 Desember 2023
                        </p>
                        <p class="text-xl text-cyan-600">
                            08.00 AM - Selesai
                        </p>
                    </div>
                    <div class="address mt-5">
                        <p class="text-lg text-cyan-600">Kp Sukahurip RT01 RW02 Kec.Culamega Kab. Tasikmalaya, Jawabarat, Indonesia </p>
                    </div>
                </div>
                <div class="resepsi text-right ml-[auto] bg-white h-fit w-[40%] max-lg:w-[50%] max-md:w-[80%] max-sm:w-[95%] px-10 py-10 mt-5">
                    <div class="sub-title">
                        <p class="font-heading font-semibold text-cyan-600 text-4xl">
                            Resepsi
                        </p>
                    </div>
                    <div class="date mt-1">
                        <p class="text-xl text-cyan-600">
                            Selasa, 26 Desember 2023
                        </p>
                        <p class="text-xl text-cyan-600">
                            01.00 PM - Selesai
                        </p>
                    </div>
                    <div class="address mt-5">
                        <p class="text-lg text-cyan-600">Kp Sukahurip RT01 RW02 Kec.Culamega Kab. Tasikmalaya, Jawabarat, Indonesia </p>
                    </div>
                </div>
                <div class="map bg-white h-fit w-[40%] max-lg:w-[50%] max-md:w-[80%] max-sm:w-[95%] px-10 py-10 mt-16 m-auto rounded-md">
                    <iframe class="rounded-md border-cyan-900" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126553.03943429263!2d107.87471543719187!3d-7.598636058775529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e66083c06d3cbdb%3A0xd4175d0a9d9fe25b!2sKec.%20Culamega%2C%20Kabupaten%20Tasikmalaya%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1702382998155!5m2!1sid!2sid" 
                    width="100%" 
                    height="350" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                  </iframe>
                  <p class="text-xl text-cyan-600 mt-5 text-center">Kp Sukahurip RT01 RW02 Kec.Culamega Kab. Tasikmalaya, Jawabarat, Indonesia </p>
                  <div class="button-map mt-10 m-auto w-fit bg-cyan-900 py-2 px-3 text-white rounded-md ring-cyan-700 hover:ring-4 transition-all">
                    <a href="https://maps.app.goo.gl/d9KSkouLRoiiTmx4A">
                      Lihat Lokasi
                    </a>
                  </div>
                  </div>
            </div>
        </div>
    </section>
    <section id="amplop" class="bg-cyan-600 w-full py-16">
        <div class="container px-5 w-full m-auto">
            <div class="title w-fit mx-auto text-white text-6xl font-heading text-center">
                <p>Amplop Digital</p>
              </div>
              <div class="ucapan-syukur mt-10 w-fit mx-auto text-center text-white text-lg">
                <p>
                  Doa Restu Anda merupakan
                  karunia yang sangat berarti bagi kami.
                </p>
                <p>
                  Dan jika memberi adalah ungkapan tanda kasih
                  Anda, Anda dapat memberi kado secara cashless.
                </p>
              </div>
              <div class="rekening mt-10 w-fit mx-auto text-center text-cyan-600 text-lg bg-white p-10 rounded-lg">
                <div class="rini">
                  <p class="font-semibold">BANK BCA <br> A/N RINI MULYASARI</p>
                  <div class="nomor hover:underline underline-offset-8 transition-all flex justify-evenly w-fit mx-auto">
                    <a href="#amplop" class="copy-rek-rini mr-5" onclick="copyRekening('rek-rini')">
                      <i class="fa-regular fa-copy"></i>
                    </a>
                      <p id="rek-rini">7401345888</p>
                  </div>
                </div>
                <div class="rini mt-5">
                  <p class="font-semibold">I . Saku <br> A/N RINI MULYASARI</p>
                  <div class="nomor hover:underline underline-offset-8 transition-all flex justify-evenly w-fit mx-auto">
                    <a href="#amplop" class="copy-rek-iSaku mr-5" onclick="copyRekening('rek-iSaku')">
                      <i class="fa-regular fa-copy"></i>
                    </a>
                      <p id="rek-iSaku">082321245817</p>
                  </div>
                </div>
              </div>
        </div>
    </section>

    <section id="wish" class="py-16 px-5 bg-cyan-900">
        <div class="container m-auto">
            <div class="title mt-5">
                <center>
                    <p class="font-heading text-6xl text-white">
                        Ucapan Dan Doa
                    </p>
                </center>
            </div>
            <div class="note">
                <center>
                    <p class="text-lg text-white mb-20">Berikan Ucapan Dan Doa Untuk Kedua Mempelai Di Moment Bahagia Mereka.</p>
                </center>
            </div>
            <div class="content mt-5 flex justify-evenly max-md:flex-col">
                <div class="form-sign w-[45%] h-[350px] max-md:w-full">
                    <form method="POST" action="{{ route('invite.feedback.store') }}">
                        @csrf
                            <div class="my-5 w-full">
                                <input type="text" class="w-full bg-cyan-600 text-white" id="name" name="name" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="my-5 w-full">
                                <input type="text" class="w-full bg-cyan-600 text-white" id="addres" name="addres" placeholder="Alamat" required>
                            </div>
                            <div class="my-5 w-full">
                                <select id="presensi" class="w-full bg-cyan-600 text-cyan-700" name="presensi" onchange="changeTextColor()">
                                    <option selected disabled>Konfirmasi Kehadiran</option>
                                    <option class="text-white" value="Hadir">Hadir</option>
                                    <option class="text-white" value="TidakBisaHadir">Tidak Bisa Hadir</option>
                                </select>
                            </div>
                            <div class="my-5 w-full">
                                <textarea class="w-full bg-cyan-600 text-white" id="message" name="message" placeholder="Tuliskan Ucapan Anda"></textarea>
                            </div>
                            <div class="my-5 w-full">
                                <button type="submit" class="bg-cyan-600 py-1 px-10 border-gray-400 border text-white">KIRIM SEKARANG</button>
                            </div>
                    </form>
                </div>
                <div class="greeting w-[45%] h-[350px] overflow-y-auto text-white max-md:w-full max-md:mt-5">
                    @foreach ($feedbacks as $feedback)
                        <div class="list my-5">
                            <div class="name w-full h-fit text-lg font-semibold px-2 py-4 border-b border-white">
                                <p>{{ $feedback->name }}.</p>
                            </div>
                            <div class="addres w-full h-fit text-md font-semibold px-2 py-1">
                                <p>di {{ $feedback->addres }} - {{ $feedback->presensi }}.</p>
                            </div>
                            <div class="addres w-full h-fit text-md font-semibold px-2 py-1">
                                <p>"{{ $feedback->message }}."</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="turut-mengundang" class="bg-cyan-600 w-full py-16 text-white text-center px-5">
        <div class="container px-5 w-full m-auto">
            <div class="katapengantar mb-12 max-w-[300px] ml-auto">
                Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila, Bapak / Ibu / Saudara / i. berkenan hadir untuk memberikan do'a restunya kami ucapkan terimakasih.
            </div>
            <div class="title font-bold text-xl max-w-[300px] mb-3 ml-auto">
                <p>Turut Mengundang :</p>
            </div>
            <div class="list max-w-[300px] ml-auto">
                <p>PT. INDOMARCO PRISMATAMA Cab. Bogor 2</p>
                <p>Alumni SMKN CIPATUJAH</p>
                <p>Alumni SMPN CULAMEGA</p>
                <p>Alumni SDN 3 CINTABODAS</p>
            </div>
            <div class="name-bride max-w-[300px] italic mt-5 text-left ml-auto">
                <h1 class="text-[9vh] max-sm:text-[7vh] font-heading -mb-5 m-auto">{{ $profile->first_name_bride }}</h1>
                <h1 class="text-[9vh] max-sm:text-[7vh] font-heading -mt-5 m-auto">& {{ $profile->first_name_groom }}</h1>
            </div>
        </div>
    </section>
    @include('home.partials.footer')

    <script>
        // Ambil tanggal target dari database atau sumber lainnya
        var targetDate = new Date("{{ $rundown->start_date }}").getTime();
    
        var countdown = setInterval(function() {
            var currentDate = new Date().getTime();
            var timeDifference = targetDate - currentDate;
    
            var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
    
            // Tampilkan hasil hitung mundur di elemen HTML
            document.getElementById('days').innerHTML = padZero(days);
            document.getElementById('hours').innerHTML = padZero(hours);
            document.getElementById('minutes').innerHTML = padZero(minutes);
            document.getElementById('seconds').innerHTML = padZero(seconds);
    
            // Hentikan hitung mundur jika waktu target sudah tercapai
            if (timeDifference < 0) {
                clearInterval(countdown);
                document.getElementById('countdown').innerHTML = 'Waktu Habis';
            }
        }, 1000);
    
        // Fungsi untuk menambahkan "0" di depan angka jika kurang dari 10
        function padZero(number) {
            return (number < 10 ? '0' : '') + number;
        }

        function changeTextColor() {
            var presensiSelect = document.getElementById('presensi');
            var selectedOption = presensiSelect.options[presensiSelect.selectedIndex];

            if (selectedOption.value !== "") {
                presensiSelect.classList.remove('text-cyan-700');
                presensiSelect.classList.add('text-white');
            } else {
                presensiSelect.classList.remove('text-white');
                presensiSelect.classList.add('text-cyan-700');
            }
        }
    </script>
@endsection