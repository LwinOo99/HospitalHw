<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Doctor List</title>
</head>

<body class="bg-blue-950">
    <div class="flex flex-row">
        <div class=" w-52 h-screen bg-gray-700 text-white ">
            <h1 class="text-center m-3 text-xl font-semibold ">Sakura Hospital </h1>
            <div class="flex flex-col mt-10 ml-7 text-lg">
                <a href="/hospital" class="mb-5">
                    <iconify-icon icon="ic:round-dashboard"></iconify-icon> Dashboard
                </a>
                <a href="/doctor" class="mb-5">
                    <iconify-icon icon="maki:doctor"></iconify-icon> Doctor List
                </a>

            </div>
        </div>
        {{-- <div class="mt-3">
        <a href="/hospital" class="ml-5 mt-4 text-white bg-red-600 p-2 px-3 rounded-md">{{ __("text.back") }}</a>
    </div> --}}
        <div class="w-full">

            {{-- Doctor list --}}
            <div class="m-5">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-white ">
                        <thead class="text-xs  bg-gray-700 orange:bg-orange-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    <span class=" align-middle text-lg">
                                        <iconify-icon icon="maki:doctor"></iconify-icon> Doctors List
                                    </span>
                                </th>

                                <th scope="col" class="px-6 py-3 ">
                                    Age
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Specialized Area
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Experience
                                </th>
                                <th scope="col" class="px-6 py-3 ">
                                    Medical Licese Number
                                </th>
                                <th scope="col" class="px-6 py-3 text-center" colspan="2">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doc)
                                <tr class="bg-white border-b dark:bg-gray-400 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black ">
                                        <a href="/doctor/{{ $doc->id }}">Dr.{{ $doc->d_drName }}</a>

                                    </th>

                                    <td class="px-6 py-4  text-black  ">
                                        {{ $doc->d_age }}
                                    </td>
                                    <td class="px-6 py-4  text-black ">
                                        {{ $doc->d_phone }}
                                    </td>
                                    <td class="px-6 py-4  text-black  ">
                                        {{ $doc->d_address }}
                                    </td>
                                    <td class="px-6 py-4  text-black  ">
                                        {{ $doc->specialist->s_specialized ?? 'error' }}
                                    </td>
                                    <td class="px-6 py-4  text-black  ">
                                        {{ $doc->specialist->s_experience }}
                                    </td>
                                    <td class="px-6 py-4  text-black  ">
                                        {{ $doc->specialist->s_license }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        {{-- <a href="/message/{{$msg->id}}/edit" class="text-blue-600 underline ">{{ __("text.edit") }}</a> --}}
                                        <a href="/doctor/{{ $doc->id }}/edit"
                                            class="text-blue-600 underline ">{{ __('text.edit') }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="/doctor/{{ $doc->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 underline">{{ __('text.del') }}</button>
                                        </form>
                                    </td>
                                </tr>


                            @empty
                            @endforelse

                        </tbody>
                    </table>
                    <a href="/doctor/create">
                        <button class=" border-2 border-white text-white my-3 px-4 py-1 float-right">
                            Add New Doctor</button>
                    </a>
                </div>
                {{-- pagination --}}
                <div class="mt-5 ">
                    {{ $doctors->links() }}
                </div>
            </div>

        </div>
    </div>
    
</body>

</html>
