@extends('layouts.main')

@section('content')
    <div class="flex flex-col mb-4 rounded mt-16">
        <p class="text-lg font-semibold italic">Welcome, {{ auth()->user()->name }}</p>
        <p>{{ $tanggal }}</p>
    </div>

    <div
        class="bg-white shadow rounded-md p-6 mb-4 flex flex-col md:flex-row items-center md:space-x-4 space-y-4 md:space-y-0">
        <img src="img/image.jpg" alt="Inventory Image" class="w-[350px]">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-bold text-blue-900">SELAMAT DATANG!</h1>
            <p class="text-xl text-gray-700">
                SISTEM INFORMASI INVENTARIS LABORATORIUM PSTE
            </p>
            <p class="text-md text-gray-700 italic">
                Website Pengelola Inventaris Barang Di Laboratorium Program Studi Teknik Elektro(PSTE)
            </p>
        </div>
    </div>

    <div class="mb-4 flex flex-row items-center md:space-x-4 space-y-4 md:space-y-0">
        <div class="flex flex-col items-center flex-auto bg-white shadow rounded-md p-6">
            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                    d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
            </svg>
            <p class="text-xl font-bold text-blue-900 mb-1">Total User</p>
            <p class="text-4xl font-semibold">{{ $totalUser }}</p>
        </div>
        <div class="flex flex-col items-center flex-auto bg-white shadow rounded-md p-6">
            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8" />
            </svg>
            <p class="text-xl font-bold text-blue-900 mb-1">Total Barang</p>
            <p class="text-4xl font-semibold">{{ $totalBarang }}</p>
        </div>
    </div>
@endsection
