<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-black leading-tight">
                Tamu Undangan
            </h2>
        </div>
    </x-slot>

    {{-- Jika ada data profil (sedang mengedit), gunakan method PUT --}}
    <form method="post"
        action="{{ isset($data) ? route('admin.visitor.update', $data->id) : route('admin.visitor.store') }}"
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
                            <x-col :col-md="12">
                                <div>
                                    <x-input-label style="color: black;" for="name" value="Nama Tamu" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name', $data->name ?? null)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </x-col>
                        </x-row>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-end mt-4">
                    @isset($data)
                        {{-- Data-toggle="delete-button" untuk memicu alert sebelum menghapus (lihat public/script/admin.js) --}}
                        <x-danger-button type="button" data-toggle="delete-button"
                            href="{{ route('admin.visitor.destroy', $data->id) }}" class="mr-auto">
                            Hapus
                        </x-danger-button>
                    @endisset

                    <x-back-button as="a" href="{{ route('admin.visitor.index') }}">
                        Batal
                    </x-back-button>

                    <x-primary-button type="submit" class="ml-2 bg-primary">
                        Simpan
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
