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
    @include('partials.sidebar')
    <div class="h-full w-full flex justify-center items-center">
        <div class="flex flex-col w-2/4 mt-8">
            <div>
                <div class="flex flex-col mt-8 mb-16">
                    <a href="{{route('account')}}" class="flex gap-x-4">
                        <img src="{{asset('/images/arrow.png')}}" class="mt-1  w-6 h-6">
                        <p class="font-bold text-xl">Edit profile</p>
                    </a>
                </div>
                <div class="p-4 bg-[#262626] flex rounded-2xl ">
                    <div class="rounded-full p-10 bg-cover bg-center bg-no-repeat" id="profileImage"
                        style="background-image: url('{{ asset('storage/foto/'.$user->account->path_foto) }}');">
                    </div>
                    <div class="flex w-full justify-between ms-3">
                        <div>
                            <p class="font-semibold text-white text-xl">{{$user->username}}</p>
                            <p class="text-gray-300">{{$user->account->nickname}}</p>
                        </div>
                        <div class="flex items-center">
                            <form action="{{route('update.foto')}}" enctype="multipart/form-data">
                                @csrf
                                <label for="changeFoto" class="text-white  bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change foto</label>
                                <input type="file" id="changeFoto" class="hidden" name="File">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <form id="formUpdate" class="flex flex-col" method="POST">
                @csrf
                <div>
                    <h1 class="mb-4 font-bold self-start text-xl mt-6">Username</h1>
                    <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-semibold" value="{{$user->username}}" name="username">
                </div>
                <div class="flex flex-col">
                    <h1 class="mb-4 font-bold self-start text-xl mt-6">Bio</h1>
                    <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-semibold" value="{{$user->account->bio}}" name="bio">
                </div>
                <button type="submit" id="test-btn" class="text-white self-end mt-4 bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
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
        })
    </script>
</body>

</html>