<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>

<body>
    @include('partials.sidebar', ['user' => Auth::user()])
    <div class="h-full w-full flex justify-center items-center">
        <div class="flex flex-col w-2/4 mt-8">
            <a href="{{route('account')}}" class="flex gap-x-4">
                <img src="{{asset('images/arrow.png')}}" class="w-8 h-8">
                <h1 class="mb-10 font-bold self-start text-xl">Create New Post</h1>
            </a>

            <form action="#" id="form-upload">
                <div class="p-4 shadow-md rounded-lg ">
                    <label id="drop-area" for="dropzone-file" class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100  max-[470px]:max-w-80">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <img class="w-10 h-10" src="{{asset('/images/upload-file.png')}}" />
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 mt-2"><span class="font-semibold text-black underline underline-offset-4">Click to upload</span> or drag and drop</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" multiple name="file[]" required />
                    </label>
                    <div id="uploadedFile-container" class="mt-3 w-full text-left h-full rounded-lg"></div>
                </div>
                <div>
                    <h1 class="mb-4 font-bold self-start text-xl mt-6">Caption</h1>
                    <textarea id="captionTextArea" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write caption here..." required></textarea>
                </div>
                <button type="submit" class="ms-auto flex text-white mt-4 bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                    <svg class="w-5 h-5 text-white dark:text-white ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('change', '#changeFoto', function() {
                const curFiles = this.files;
                if (curFiles.length > 0) {
                    const file = curFiles[0]; // Mengambil file pertama yang dipilih
                    // Membuat URL sementara untuk gambar yang di-upload
                    const imageUrl = URL.createObjectURL(file);
                    // Mengubah background-image pada div dengan id "profileImage"
                    $('#profileImage').css('background-image', 'url(' + imageUrl + ')');

                    let formData = new FormData();
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    formData.append('File', file);

                    $.ajax({
                        url: "update/foto",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response, XHR) {
                            if (response.success === true) {
                                Swal.fire({
                                    title: "Upload",
                                    text: response.message,
                                    icon: "success",
                                    timer: 5000,
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: XHR.responseJSON.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: xhr.responseJSON.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                })
                            }
                        }
                    })
                }

            });


            $(document).on('submit', '#formUpdate', function() {
                event.preventDefault();
                var form = $(this)[0];
                var formData = new FormData(form);
                $.ajax({
                    url: 'update',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Update!",
                                text: response.message,
                                icon: "success",
                                timer: 5000,
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Error update data",
                                icon: "error",
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            Swal.fire({
                                title: "Error!",
                                text: "Please check again!",
                                icon: "error",
                            }); // Validasi error
                            var errors = xhr.responseJSON.errors;
                            // Bersihkan pesan error sebelumnya
                            $('.text-red-500').remove();
                            // Tampilkan pesan error di input terkait
                            $.each(errors, function(key, message) {
                                let input = $('[name="' + key + '"]');
                                input.after('<div class="text-red-500 text-sm">' + message + '</div>');
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Terjadi kesalahan server, silahkan refresh halaman dan coba lagi!",
                                icon: "error",
                            });
                        }
                    }
                });
            })


            $(document).on('dragover', ('#drop-area'), function(e) {
                e.preventDefault();
                e.stopPropagation();
                // $('#drop-area').addClass('bg-blue-700');
                $(this).removeClass('bg-gray-50')
                $(this).addClass('bg-blue-100')
            })
            $(document).on('dragenter', ('#drop-area'), function(e) {
                e.preventDefault();
                e.stopPropagation();
            })
            $(document).on('dragleave', ('#drop-area'), function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('bg-blue-50');
            })

            //Sebuah Script untuk upload files (Drag & Drop)
            $(document).on('drop', '#drop-area', function(e) {
                e.preventDefault();
                const files = e.originalEvent.dataTransfer.files; // FileList
                // Reset kontainer file
                $('#uploadedFile-container').text("");

                // Loop setiap file yang di-drop
                Array.from(files).forEach(function(item, index) {
                    let size = (item.size / (1024 * 1024)).toFixed(2); // Konversi ke MB
                    $('#uploadedFile-container').append(`
                        <div class="mt-3 p-3 w-full text-left bg-slate-100 rounded-lg">
                            <div class="flex items-center">
                                <img src="{{asset('/images/file.png')}}" alt="file" class="w-6 h-6 me-4">
                                <div class="w-full">
                                    <p class="text-xs text-slate-800 dark:text-gray-400 font-semibold">${item.name}</p>
                                    <span class="flex w-full">
                                        <p class="text-xs text-slate-600">${size} MB</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    `);
                });

                // Tambahkan file ke input form untuk keperluan lain (opsional)
                const fileInput = $('#dropzone-file')[0];
                const dataTransfer = new DataTransfer();
                Array.from(files).forEach(file => {
                    dataTransfer.items.add(file);
                });
                fileInput.files = dataTransfer.files;
            });

            $(document).on('change', '#dropzone-file', function() {
                let files = $(this)[0].files;
                Array.from(files).forEach(function(item, index) {
                    let size = (item.size / (1024 * 1024)).toFixed(2); // Konversi ke MB
                    $('#uploadedFile-container').append(`
                        <div class="mt-3 p-3 w-full text-left bg-slate-100 rounded-lg">
                            <div class="flex items-center">
                                <img src="{{asset('/images/file.png')}}" alt="file" class="w-6 h-6 me-4">
                                <div class="w-full">
                                    <p class="text-xs text-slate-800 dark:text-gray-400 font-semibold">${item.name}</p>
                                    <span class="flex w-full">
                                        <p class="text-xs text-slate-600">${size} MB</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    `);
                });
            })

            $(document).on('submit', '#form-upload', function(e) {
                e.preventDefault();
                let formData = new FormData();
                let fileInput = $('#dropzone-file')[0];

                let files = fileInput.files;
                let caption = $('#captionTextArea').val();

                formData.append('_token', $('meta[name="csrf-token"]').attr('content')); // Tambahkan CSRF token
                formData.append('caption', caption); // Tambahkan CSRF token
                Array.from(files).forEach(function(file) {
                    formData.append('File[]', file); // Nama "File" harus sesuai dengan validasi di Laravel
                })
                $.ajax({
                    url: '/account/post/process',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                                timer: 5000,
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, message) {
                                Swal.fire({
                                    title: "Error!",
                                    text: message,
                                    icon: "error",
                                });
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Terjadi kesalahan server, silahkan refresh halaman dan coba lagi!",
                                icon: "error",
                            });
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>