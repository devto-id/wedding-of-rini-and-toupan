<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white md:border border-zinc-700 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-4 md:p-6 text-black">
                    <h1 class="text-xl">
                        👋 Welcome, {{ auth()->user()->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
