<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    @include('partials.sidebar', ['user' => Auth::user()])
    <div class="h-full w-full">
        <div class="w-full pr-20 pl-28 ">
            <div class="flex flex-col mt-8 mb-16">
                <a href="{{route('account')}}" class="flex gap-x-4">
                    <img src="{{asset('/images/arrow.png')}}" class="mt-1  w-6 h-6">
                    <p class="font-semibold text-xl">Arsip</p>
                </a>
            </div>
            <button id="dropdownDefaultButton" data-modal-target="small-modal" data-modal-toggle="small-modal" class="text-white bg-gradient-to-r from-teal-500 to-emerald-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6 mb-4" type="button">Export
            </button>

            <!-- Small Modal -->
            <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Export Post
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <select id="formatSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose Format</option>
                                <option value="Excel">Excel</option>
                                <option value="Pdf">Pdf</option>
                            </select>
                            <select id="dateSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose date</option>
                                @foreach($posts as $post)
                                <option value="{{$post->deleted_at}}">{{$post->deleted_at->format('d-m-Y')}}</option>
                                @endforeach
                            </select>
                            <button class="py-2 px-2.5 text-white bg-blue-500 rounded-lg btnSelectFormat">Download</button>
                        </div>
                    </div>
                </div>
            </div>


            <table id="search-table" class="">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                No
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>


                        <th>
                            <span class="flex items-center">
                                FILE
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                TANGGAL POST
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                TANGGAL HAPUS POST
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                CAPTION
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                AKSI
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                    </tr>
                </thead>

                <tbody class="t-body">
                    @php
                    $no = 1;
                    @endphp
                    @foreach($posts as $post)

                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p>{{$no++}}</p>
                        </td>
                        <td>
                            <button type="button" class="text-white bg-blue-500 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" data-modal-target="{{$post->id}}" data-modal-toggle="{{$post->id}}">Preview</button>

                            <!-- Small Modal -->
                            <div id="{{$post->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                Post Archive
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$post->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            @if($post->extension === 'mp4' || $post->extension === 'mov')
                                            <video class="w-full" controls>
                                                <source src="{{asset('storage/file/'.$post->files->name_file)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @else
                                            <img src="{{ asset('storage/file/'.$post->files->name_file) }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>{{$post->files->created_at->format('d-m-Y')}}</td>
                        <td>{{$post->deleted_at->format('d-m-Y')}}</td>
                        <td>{{$post->caption}}</td>

                        <td>
                            <div class="flex gap-2">
                                <div class="cursor-pointer">
                                    <a href="{{ route('archives.restore', $post->id) }}"
                                        class="text-white bg-green-500 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                        Restore
                                    </a>
                                    <a href="" id="btnDeletePermanent" class="text-white bg-red-500 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" data-id="{{$post->id}}">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>





        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

        <script>
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                fixedHeight: true,
                sortable: true,
                perPageSelect: [10, 15, 20, 25]
            });
            $(document).on('ready', function() {
                $('.previewFile').on('click', function() {
                    // alert('click')
                });
            })

            let valFormatSelect, valDateSelect;
            $('#formatSelect').on('change', function() {
                valFormatSelect = $('#formatSelect').val();
            })
            $('#dateSelect').on('change', function() {
                valDateSelect = $('#dateSelect').val();
            })

            $(document).on('click', '.btnSelectFormat', function() {
                if (valFormatSelect === 'Excel') {
                    window.location = `/archives/export/excel/${valDateSelect}`
                } else {
                    window.location = `/archives/export/pdf/${valDateSelect}`
                }
            })

            $(document).on('click', '#btnDeletePermanent', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Delete Data",
                    text: "Are you sure delete this post for permanent? ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Post successfully deleted permanent!",
                            icon: "success",
                            timer: 5000,
                        }).then(() => {
                            window.location = "archives/delete/" + $(this).data('id');
                        });
                    }
                });
            })
        </script>
</body>

</html>