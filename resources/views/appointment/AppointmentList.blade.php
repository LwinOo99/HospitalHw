<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Appointment List</title>
</head>

<body class="bg-blue-950">
    <div class="mt-3">
        <a href="/lang/mm" class="text-white float-right mr-5 underline">Myanmar</a>
        <a href="/lang/en" class="text-white float-right  mr-5 underline">English</a>
        <a href="/hospital" class="ml-5 mt-4 text-white bg-red-600 p-2 px-3 rounded-md">{{ __("text.back")}}</a>
    </div>
    <div class=" grid grid-flow-row grid-rows-2 xl:grid-flow-col">
        
        {{-- Message list--}}
        <div class="m-5">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-white ">
                    <thead class="text-xs  bg-gray-700 orange:bg-orange-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="text-base align-middle">
                                    <iconify-icon icon="ion:calendar-sharp"></iconify-icon>
                                </span>{{ __("text.Apm")}}
                            </th>
                            <th scope="col" class="px-6 py-3 " >
                            </th>
                            <th scope="col" class="px-6 py-3 " >
                            </th>
                            <th scope="col" class="px-6 py-3 " colspan="2">
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($apms as $apm)
                        <tr class="bg-white border-b dark:bg-gray-400 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black col-span-2">
                                <a href="/appointment/{{ $apm->id }}">Meet Dr.{{ $apm->a_drName }}</a>
                                
                            </th>

                            <td class="px-6 py-4 col-span-2 text-black text-right">
                                Room {{ $apm->a_room }}
                            </td>
                            <td class="px-6 py-4 col-span-2 text-black text-right">
                                {{ $apm->a_dateTime }}
                            </td>
                            <td class="px-6 py-4 text-right"> 
                                <a href="/appointment/{{$apm->id}}/edit" class="text-blue-600 underline ">{{ __("text.edit")}}</a>
                            </td> 
                            <td class="px-6 py-4">
                                <form action="/appointment/{{ $apm->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="text-red-600 underline">{{ __("text.del")}}</button></form>
                            </td>
                        </tr>


                        @empty
                        @endforelse

                    </tbody>
                </table>
                <a href="/appointment/create">
                    <button class="uppercase bg-zinc-700 text-white my-3 px-4 py-1 float-right">
                        {{ __("text.addApm")}}</button>
                </a>
            </div>
            {{-- pagination --}}
            <div class="mt-5 ">
                {{ $apms->links() }}
            </div>
        </div>

    </div>
</body>

</html>
