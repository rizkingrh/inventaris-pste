@foreach ($data as $item)
    <div id="show-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Detail Barang - {{ $item->barang->kode_barang }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="show-modal-{{ $item->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <dl class="p-4 md:p-5">
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Barang</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->nama_barang }}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Keterangan</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->keterangan }}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Merk</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->merk }}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jumlah</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->jumlah }}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Satuan</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->satuan }}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                        {{ $item->barang->kategoribarang->nama_kategori }}
                    </dd>
                </dl>
            </div>
        </div>
    </div>
@endforeach
