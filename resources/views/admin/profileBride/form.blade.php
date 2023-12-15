<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Profile
            </h2>
        </div>
    </x-slot>

    {{-- Jika ada data profil (sedang mengedit), gunakan method PUT --}}
    <form method="post"
        action="{{ isset($data) ? route('admin.profileBride.update', $data->id) : route('admin.profileBride.store') }}"
        class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        {{-- Jika ada data profil (sedang mengedit), gunakan method PUT --}}
        @isset($data)
            @method('put')
        @endisset

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white md:border border-black overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <x-row>
                            <x-col :col-md="6">
                                <div>
                                    <!-- Menampilkan gambar yang sudah ada atau gambar yang baru dipilih -->
                                    @if (isset($data) && $data->photo_groom)
                                        <img id="previewImageGroom" src="{{ asset($data->photo_groom) }}" alt="Foto Profil Pria"
                                            width="150px">
                                        <!-- Input hidden untuk menyimpan nama file gambar yang sudah ada -->
                                        <input type="hidden" name="existingphoto_groom"
                                            value="{{ $data->photo_groom }}">
                                    @else
                                        <img id="previewImageGroom" src="{{ asset('/profile-photos/placeholder.jpg') }}"
                                            alt="Foto Profil Pria" width="150px">
                                    @endif
                                    <x-input-label style="color: black;" for="photo_groom" value="Foto Profil Pria" />
                                    <!-- Input untuk memilih gambar baru -->
                                    <input id="photo_groom" name="photo_groom" type="file"
                                        class="mt-1 block w-full">
                                    <x-input-error class="mt-2" :messages="$errors->get('photo_groom')" />
                                </div>
                            </x-col>

                            <x-col :col-md="6">
                                <div>
                                    <!-- Menampilkan gambar yang sudah ada atau gambar yang baru dipilih -->
                                    @if (isset($data) && $data->photo_bride)
                                        <img id="previewImageBride" src="{{ asset($data->photo_bride) }}" alt="Foto Profil Wanita"
                                            width="150px">
                                        <!-- Input hidden untuk menyimpan nama file gambar yang sudah ada -->
                                        <input type="hidden" name="existingphoto_bride"
                                            value="{{ $data->photo_bride }}">
                                    @else
                                        <img id="previewImageBride" src="{{ asset('/profile-photos/placeholder.jpg') }}"
                                            alt="Foto Profil Wanita" width="150px">
                                    @endif
                                    <x-input-label style="color: black;" for="photo_bride" value="Foto Profil Wanita" />
                                    <!-- Input untuk memilih gambar baru -->
                                    <input id="photo_bride" name="photo_bride" type="file"
                                        class="mt-1 block w-full">
                                    <x-input-error class="mt-2" :messages="$errors->get('photo_bride')" />
                                </div>
                            </x-col>

                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="first_name_groom" value="Nama Depan Pria" />
                                    <x-text-input id="first_name_groom" name="first_name_groom" type="text" class="mt-1 block w-full"
                                        :value="old('first_name_groom', $data->first_name_groom ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('first_name_groom')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="last_name_groom" value="Nama Belakang Pria" />
                                    <x-text-input id="last_name_groom" name="last_name_groom" type="text" class="mt-1 block w-full"
                                        :value="old('last_name_groom', $data->last_name_groom ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_name_groom')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="first_name_bride" value="Nama Depan Wanita" />
                                    <x-text-input id="first_name_bride" name="first_name_bride" type="text" class="mt-1 block w-full"
                                        :value="old('first_name_bride', $data->first_name_bride ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('first_name_bride')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="last_name_bride" value="Nama Belakang Wanita" />
                                    <x-text-input id="last_name_bride" name="last_name_bride" type="text" class="mt-1 block w-full"
                                        :value="old('last_name_bride', $data->last_name_bride ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_name_bride')" />
                                </div>
                            </x-col>

                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="son_of" value="Putra Ke" />
                                    <x-text-input id="son_of" name="son_of" type="text" class="mt-1 block w-full"
                                        :value="old('son_of', $data->son_of ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('son_of')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="daughter_of" value="Putri Ke" />
                                    <x-text-input id="daughter_of" name="daughter_of" type="text" class="mt-1 block w-full"
                                        :value="old('daughter_of', $data->daughter_of ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('daughter_of')" />
                                </div>
                            </x-col>

                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="hometown_groom" value="Kota Asal Pria" />
                                    <x-text-input id="hometown_groom" name="hometown_groom" type="text" class="mt-1 block w-full"
                                        :value="old('hometown_groom', $data->hometown_groom ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('hometown_groom')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="hometown_bride" value="Kota Asal Wanita" />
                                    <x-text-input id="hometown_bride" name="hometown_bride" type="text" class="mt-1 block w-full"
                                        :value="old('hometown_bride', $data->hometown_bride ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('hometown_bride')" />
                                </div>
                            </x-col>

                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="ig_groom" value="Instagram Pria" />
                                    <x-text-input id="ig_groom" name="ig_groom" type="text" class="mt-1 block w-full"
                                        :value="old('ig_groom', $data->ig_groom ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('ig_groom')" />
                                </div>
                            </x-col>
                            <x-col :col-md="6">
                                <div>
                                    <x-input-label style="color: black;" for="ig_bride" value="Instagram Wanita" />
                                    <x-text-input id="ig_bride" name="ig_bride" type="text" class="mt-1 block w-full"
                                        :value="old('ig_bride', $data->ig_bride ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('ig_bride')" />
                                </div>
                            </x-col>

                        </x-row>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-end mt-4">
                    @isset($data)
                        {{-- Data-toggle="delete-button" untuk memicu alert sebelum menghapus (lihat public/script/admin.js) --}}
                        <x-danger-button type="button" data-toggle="delete-button"
                            href="{{ route('admin.profileBride.destroy', $data->id) }}" class="mr-auto">
                            Hapus
                        </x-danger-button>
                    @endisset

                    <x-back-button as="a" href="{{ route('admin.profileBride.index') }}">
                        Batal
                    </x-back-button>

                    <x-primary-button type="submit" class="ml-2 bg-primary">
                        Simpan
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function previewImage(input, previewId) {
            var previewImage = document.getElementById(previewId);
            var file = input.files[0];

            if (file) {
                var objectURL = URL.createObjectURL(file);
                previewImage.src = objectURL;
                previewImage.style.display = 'block';
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
            }
        }

        document.getElementById("photo_groom").addEventListener("change", function(e) {
            previewImage(this, "previewImageGroom");
        });

        document.getElementById("photo_bride").addEventListener("change", function(e) {
            previewImage(this, "previewImageBride");
        });
    </script>
</x-app-layout>
