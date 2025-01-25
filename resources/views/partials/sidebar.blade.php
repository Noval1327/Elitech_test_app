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