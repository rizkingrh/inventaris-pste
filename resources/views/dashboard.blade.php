@extends('layouts.main')

@section('content')
    <div class="flex flex-col mb-4 rounded mt-16">
        <p class="text-lg font-semibold italic">Welcome, {{ auth()->user()->name }}</p>
        <p>{{ $tanggal }}</p>
    </div>

    <div class="bg-white shadow rounded-md p-8 flex flex-col md:flex-row items-center md:space-x-4 space-y-4 md:space-y-0">
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
@endsection
