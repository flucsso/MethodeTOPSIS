<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Methode TOPSIS') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0">
                <li class="flex-auto text-center">
                    @php
                        $active = true; // Atau sesuaikan dengan logika Anda untuk menentukan apakah tautan saat ini aktif
                    @endphp
                    <a href="{{ route('kriteria') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out {{ $active ? 'border-b-2 border-indigo-400 ' : 'border-b-2 border-transparent text-black' }}">
                        Kriteria
                    </a>
                </li>
        
                <li class="flex-auto text-center">
                    <a href="{{ route('alternatif') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out ">
                        Alternatif
                    </a>
                </li>
                <li class="flex-auto text-center">
                    <a href="{{ route('data.value') }}"
                        class="inline-flex items-center px-1 py-5 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out ">
                        Data
                    </a>
                </li>
            </ul>

            <!--Tabs content-->
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12">
                    <div>
                        @if (Session::has('success'))
                            <div id="success-alert"
                                class="alert alert-success mt-3 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                {{ Session::get('success') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    var successAlert = document.getElementById('success-alert');
                                    successAlert.style.display = 'none';
                                }, 5000);
                            </script>
                        @endif
                        <a href="{{ route('kriteria.create') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4 tambah-kriteria-button">Tambah
                            Kriteria</a>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-5">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kriteria
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Bobot
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $kriteria)
                                        <tr class="bg-white dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $kriteria->kriteria }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $kriteria->bobot }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <form
                                                    onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data?');"
                                                    action="{{ route('kriteria.destroy', ['id' => $kriteria->id]) }}"
                                                    method="POST">
                                                    <a href="{{ route('kriteria.edit', ['id' => $kriteria->id]) }}"
                                                        class="font-medium bg-blue-600 text-white hover:bg-blue-800 py-2 px-4 rounded-md mr-4">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="font-medium bg-red-600 text-white hover:bg-red-800 py-2 px-4 rounded-md">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
