<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-primary leading-tight">
                Profile
            </h2>

            <x-primary-button style="text-decoration: none;" as="a" href="{{ route('admin.profileBride.create') }}">
                Tambah Profile
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white md:border border-black shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-black">
                    <div class="overflow-x-auto max-h-[350px]">
                        <table class="table-auto w-full border border-collapse border-black">
                            <thead class="bg-gray-300">
                                <tr class="text-left">

                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Foto Profil Pria</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Foto Profil Wanita</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Nama Pria</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Nama Wanita</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Putra Ke</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Putri Ke</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Kota Asal Pria</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Kota Asal Wanita</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Ig Pria</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Ig Wanita</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($profileBrides))
                                    @foreach ($profileBrides as $profileBride)
                                        <tr class="border border-zinc-700 ">
                                            <td class="px-4 py-2">
                                                <div style="border-radius: 100%;" class="profilePhoto">
                                                    <img src="{{ asset($profileBride->photo_groom) }}" alt="User"
                                                        class="h-[35px]">
                                                </div>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div style="border-radius: 100%;" class="profilePhoto">
                                                    <img src="{{ asset($profileBride->photo_bride) }}" alt="User"
                                                        class="h-[35px]">
                                                </div>
                                            </td>
                                            <td class="px-4 py-2">{{ $profileBride->first_name_groom }} {{ $profileBride->last_name_groom }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->first_name_bride }} {{ $profileBride->last_name_bride }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->son_of }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->daughter_of }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->hometown_groom }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->hometown_bride }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->ig_groom }}</td>
                                            <td class="px-4 py-2">{{ $profileBride->ig_bride }}</td>
                                            <td class="px-4 py-2">
                                                <a style="text-decoration: none;"
                                                    href="{{ route('admin.profileBride.edit', $profileBride->id) }}"
                                                    class="text-blue-700">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-gray-700">
                                            Tidak ada data.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
