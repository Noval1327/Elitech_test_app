<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Profil Page</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-gray-50">
    <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40  h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-5 py-4 overflow-y-auto bg-white dark:bg-gray-800 shadow-sm">
            <ul class="space-y-4  font-medium py-4 ">
                <li class="mb-10">
                    <a href="#" class="flex items-center p-2 text-black rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 hover:shadow-md shadow-md group">
                        <img src="{{asset('/images/instagram.png')}}" class="w-6 h-6">
                    </a>
                </li>

                <li>
                    <a href="{{route('post')}}" class="flex items-center p-2 text-black rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 group">
                        <img src="{{asset('/images/more.png')}}" class="w-6 h-6">
                    </a>
                </li>
                <li>
                    <img src="{{asset('storage/foto/'.$user->account->path_foto)}}" class="w-8 h-8 rounded-full">
                </li>
                <li>
                    <a href="{{route('logout')}}" class="flex items-center p-2 text-black rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700  group">
                        <img src="{{asset('/images/log-out.png')}}" class="w-6 h-6">
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="ms-24 mt-2 py-8 px-20 ">
        <div class="mt-8 flex gap-x-14 ">
            <img src="{{asset('storage/foto/'.$user->account->path_foto)}}" class="w-36 h-36 rounded-full">
            <div class="">
                <div class="flex">
                    <h2 class="font-medium text-xl me-4">{{$user->username}}</h2>
                    <div class="flex ms-auto">
                        <a href="{{route('account.edit')}}">
                            <button type="button" class="text-white bg-gray-500 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Edit profil</button>
                        </a>
                        <a href="{{route('archives')}}">
                            <button type="button" class="text-white bg-gray-500 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Lihat arsip</button>
                        </a>
                    </div>
                </div>
                <div class="flex gap-x-8 mt-2">
                    <h2 class="font-medium text-lg">2 Kiriman</h2>
                    <h2 class="font-medium text-lg">478 pengikut</h2>
                    <h2 class="font-medium text-lg">917 diikuti</h2>
                </div>
                <p class="font-bold mt-4">{{$user->account->nickname}}</p>
                <p class="font-semibold mt-1">{{$user->account->bio}}</p>
            </div>
        </div>
        <div class="flex justify-center border-t border-gray-700 gap-16 text-sm text-gray-400 mt-14">
            <div class="flex items-center gap-x-2">
                <img src="{{asset('/images/pixels.png')}}" class="w-4 h-4">
                <a href="#" class="relative py-2 font-semibold text-black after:absolute after:top-0 after:right-5 after:h-[2px] after:w-full after:bg-black after:scale-x-125 after:origin-left after:transition-transform active">
                    POSTINGAN
                </a>
            </div>
            <div class="flex items-center gap-x-2">
                <img src="{{asset('/images/save-instagram.png')}}" class="w-4 h-4">
                <a href="#" class="font-semibold relative py-2 text-black after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-white after:scale-x-100 after:origin-left after:transition-transform active">
                    TERSIMPAN
                </a>
            </div>
            <div class="flex items-center gap-x-2">
                <img src="{{asset('/images/comment.png')}}" class="w-5 h-5">
                <a href="#" class="font-semibold relative py-2 text-black after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-white after:scale-x-100 after:origin-left after:transition-transform active">
                    DITANDAI
                </a>
            </div>
        </div>

        <div class="flex flex-col">
            <select id="formatSelect" class=" ms-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-48 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Feed per row</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <div class="grid grid-cols-3 gap-x-4 gap-y-4 mt-4 h-screen" id="container">
                @foreach($posts as $post)
                @if($post->extension === 'mp4' || $post->extension === 'mov')
                <div class="relative bg-cover bg-center bg-no-repeat cursor-pointer card-post w-full h-64 post" data-modal-target="post-modal-{{ $post->id }}" data-id="{{$post->id}}" data-modal-toggle="post-modal-{{ $post->id }}"
                    style="background-image: url('{{ asset('images/video.png') }}');">
                    <div class="hidden items-center justify-center h-full overflow-hidden status-post w-full">
                        <img src="{{asset('/images/love.png')}}" class="w-6 h-6">
                        <p class="text-white font-semibold ms-2">0</p>
                        <img src="{{asset('/images/chat.png')}}" class="w-6 h-6 ms-3">
                        <p class="text-white font-semibold ms-2">0</p>
                    </div>
                    <div class="absolute inset-0 hover:bg-gray-300 hover:opacity-20">
                    </div>
                </div>
                @else
                <div class="relative bg-cover bg-center bg-no-repeat cursor-pointer card-post w-full h-64 post" data-modal-target="post-modal-{{ $post->id }}" data-id="{{$post->id}}" data-modal-toggle="post-modal-{{ $post->id }}"
                    style="background-image: url('{{ asset('storage/file/'.$post->thumbnail) }}');">
                    <div class="hidden items-center justify-center h-full overflow-hidden status-post w-full">
                        <img src="{{asset('/images/love.png')}}" class="w-6 h-6">
                        <p class="text-white font-semibold ms-2">0</p>
                        <img src="{{asset('/images/chat.png')}}" class="w-6 h-6 ms-3">
                        <p class="text-white font-semibold ms-2">0</p>
                    </div>
                    <div class="absolute inset-0 hover:bg-gray-300 hover:opacity-20">
                    </div>
                </div>
                @endif


                <!-- Modal untuk setiap post -->
                <div id="post-modal-{{ $post->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-7xl max-h-full ">
                        <!-- Modal content -->
                        <div class="relative bg-white shadow dark:bg-gray-700">
                            <!-- Modal body -->
                            <div class="gap-x-2 grid grid-cols-2">
                                @if($post->extension === 'mp4' || $post->extension === 'mov')
                                <video class="w-full" controls>
                                    <source src="{{asset('storage/file/'.$post->files->name_file)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                @else
                                <img src="{{ asset('storage/file/'.$post->files->name_file) }}">
                                @endif
                                <div class="w-full">
                                    <div class="flex gap-x-4 p-3">
                                        <img src="{{ asset('storage/foto/'.$user->account->path_foto) }}" class="w-10 h-10 rounded-full ">
                                        <p class="font-semibold mt-2">{{ $user->username }}</p>
                                        <button class="text-red-500 ms-auto mt-1 font-semibold btnDelete">Delete</button>

                                    </div>
                                    <div class="h-80 border-y">
                                        <div class="flex  items-center">
                                            <img src="{{ asset('storage/foto/'.$user->account->path_foto) }}" class="w-10 h-10 rounded-full ms-3 mt-2">
                                            <p class="font-semibold ms-2">{{ $user->username}}</p>
                                            <p class="font-normal ms-2">{{ $post->caption}}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-1 mt-3 border-y py-4">
                                        <img src="{{ asset('/images/heart.png') }}" class="w-6 h-6">
                                        <img src="{{ asset('/images/chat-2.png') }}" class="w-6 h-6 ms-3">
                                        <img src="{{ asset('/images/save-instagram.png') }}" class="w-6 h-6 ms-auto me-2">
                                    </div>
                                    <form action="" class="w-full relative">
                                        <input
                                            type="text"
                                            class="w-[calc(100%-50px)]"
                                            placeholder="Tambahkan komentar..."
                                            style="outline: none; box-shadow: none; border: none;">
                                        <button class="absolute py-2 text-blue-500">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.card-post').on('mouseover', function() {
            $(this).find('.status-post').removeClass('hidden').addClass('flex');
        })
        $('.card-post').on('mouseout', function() {
            $(this).find('.status-post').removeClass('flex').addClass('hidden');
        })

        $('.post').on('click', function() {
            const postId = $(this).data('id');
            $('.btnDelete').on('click', function() {
                Swal.fire({
                    title: "Delete Data",
                    text: "Are you sure for delete this post? ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Post successfully deleted! You can restore this post at archive page",
                            icon: "success",
                            timer: 5000,
                        }).then(() => {
                            window.location = "account/post/delete/" + postId
                        });
                    }
                });
            })
        })

        $('#formatSelect').on('change', function() {
            let grid = $(this).val(); // Ambil nilai dari select option
            $('#container').removeClass('grid-cols-3 grid-cols-4 grid-cols-5'); // Hapus semua kelas grid-cols yang sudah diketahui
            $('#container').addClass(`grid-cols-${grid}`); // Tambahkan kelas baru
        });
    </script>
</body>

</html>