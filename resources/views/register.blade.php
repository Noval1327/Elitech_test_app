<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <div class="h-screen w-full flex justify-center items-center px-4 md:px-20">
        <div class="w-full md:flex">
            <div class="bg-[url('/public/images/banner.jpg')] bg-cover bg-center bg-no-repeat rounded-l-lg  w-3/5 hidden md:inline-block">

            </div>
            <div class="px-4 flex flex-col md:px-10 bg-white rounded-lg md:rounded-r-lg w-full md:w-2/5 pb-8 pt-6">

                <p class="text-2xl md:text-4xl font-medium text-slate-600 md:mt-36">Sign <span class="text-sky-500">Up</span></p>
                <p class="text-slate-400 mt-2 font-medium text-xs md:text-sm">Welcome To Elitech Technovision Website</p>
                <form class="mt-10 w-full" action="{{route('register.proses')}}" method="post">
                    @csrf
                    <div class="mb-5">
                        <label for="username" class="block mb-2 text-xs md:text-sm font-medium text-gray-900 dark:text-white"> Username</label>
                        <input type="username" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 md:p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="JohnDoe" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-xs md:text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 md:p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required />
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4  border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>
                        <label for="remember" class="ms-2 text-xs md:text-sm font-medium text-gray-700 dark:text-gray-300">I agree to the terms of service</label>
                    </div>
                    <button type="submit" class="text-white  bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account</button>

                </form>

            </div>
        </div>

    </div>
</body>

</html>