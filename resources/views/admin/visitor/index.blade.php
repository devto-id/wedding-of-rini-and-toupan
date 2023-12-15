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
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Nama Tamu</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Link Undangan Tertuju</th>
                                    <th class="px-4 py-2 text-black font-bold whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($visitors))
                                    @foreach ($visitors as $visitor)
                                        <tr class="border border-zinc-700 ">
                                            <td class="px-4 py-2">{{ $visitor->name }}</td>
                                            <td class="px-4 py-2">
                                                <a href="{{ route('invite.coverSlug', $visitor->name) }}" target="_blank" rel="noopener noreferrer">/{{ $visitor->name }}</a>
                                            </td>
                                            <td class="px-4 py-2">
                                                <a style="text-decoration: none;"
                                                    href="{{ route('admin.visitor.edit', $visitor->id) }}"
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
