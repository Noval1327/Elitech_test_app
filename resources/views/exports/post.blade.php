<!DOCTYPE html>
<html>

<head>
    <title>archive</title>
</head>

<body>
    <h1>Archives Post</h1>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        File
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deleted at
                    </th>

                </tr>
            </thead>
            <tbody>
                @php
                $no= 1;
                @endphp

                @foreach($posts as $post)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$no++}}
                    </th>
                    <td class="px-6 py-4">
                        {{$post->files->name_file}}
                    </td>
                    <td class="px-6 py-4">
                        {{$post->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        {{$post->deleted_at}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>