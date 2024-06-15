<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('dashboard') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ Request::is('dashboard') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-5">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                    aria-controls="manage-user" data-collapse-toggle="manage-user">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 text-left whitespace-nowrap">Manage User</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="manage-user" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/user"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-12 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('user') ? 'bg-gray-100' : '' }}">Daftar
                            User</a>
                    </li>
                    <li>
                        <a href="/level"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-12 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('level') ? 'bg-gray-100' : '' }}">Level
                            User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/supplier"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('supplier') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('supplier') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Manage Supplier</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                    aria-controls="dropdown-barang" data-collapse-toggle="dropdown-barang">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 text-left whitespace-nowrap">Manage Barang</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-barang" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/barang"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-12 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('barang') ? 'bg-gray-100' : '' }}">Daftar
                            Barang</a>
                    </li>
                    <li>
                        <a href="/kategori-barang"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-12 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('kategori-barang') ? 'bg-gray-100' : '' }}">Kategori
                            Barang</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="/ruangan-lab"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('ruangan-lab') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('ruangan-lab') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Ruangan Lab</span>
                </a>
            </li>
            <li>
                <a href="/barang-inventaris"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('barang-inventaris') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('barang-inventaris') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                        <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Barang Inventaris</span>
                </a>
            </li>
            <li>
                <a href="/pengadaan"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('pengadaan') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('pengadaan') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Pengadaan</span>
                </a>
            </li>
            <li>
                <a href="/penempatan"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('penempatan') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('penempatan') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 ms-5 whitespace-nowrap">Penempatan</span>
                </a>
            </li>
            <li>
                <a href="/mutasi"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('mutasi') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('mutasi') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Mutasi</span>
                </a>
            </li>
            <li>
                <a href="/peminjaman"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ Request::is('peminjaman') ? 'bg-gray-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 dark:text-white transition duration-75 group-hover:text-gray-900 {{ Request::is('peminjaman') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-5 whitespace-nowrap">Peminjaman</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
