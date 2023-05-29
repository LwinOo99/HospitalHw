<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Room List</title>
</head>

<body class="bg-blue-950">
    <div class="mt-3">
        <a href="/lang/mm" class="text-white float-right mr-5 underline">Myanmar</a>
        <a href="/lang/en" class="text-white float-right  mr-5 underline">English</a>
        <a href="/hospital" class="ml-5 mt-4 text-white bg-red-600 p-2 px-3 rounded-md">{{ __("text.back") }}</a>
    </div>
    <h1 class="text-white text-3xl m-5">{{ trans_choice('text.roomcount', $roomCount) }}</h1>
    <div class=" grid grid-flow-row grid-rows-2 xl:grid-flow-col">

        {{-- Room list --}}
        <div class="m-5">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-white ">
                    <thead class="text-xs  bg-orange-700 orange:bg-orange-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="text-base align-middle">
                                    <iconify-icon icon="material-symbols:bed"></iconify-icon>
                                </span>@lang('text.roomsts')
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3 ">
                            </th>
                            <th scope="col" class="px-6 py-3 " colspan="2">
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                            <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 underline text-blue-400 font-medium  whitespace-nowrap dark:text-blue">
                                    <a href="/room/{{ $room->id }}">Rm.{{ $room->r_number }}</a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $room->r_status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $room->r_guestNumber }}
                                </td>
                                <td class="px-6 py-4">
                                    ${{ $room->r_fees }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="/room/{{ $room->id }}/edit" class="text-green-500 underline ">@lang('text.edit')</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/room/{{ $room->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 underline">@lang('text.del')</button>
                                    </form>
                                </td>
                            </tr>


                        @empty
                        @endforelse

                    </tbody>
                </table>
                <a href="/room/create">
                    <button class="uppercase bg-orange-700 rounded-sm text-white my-3 px-4 py-1 float-right">
                        {{ __('text.add') }} </button>
                </a>
            </div>
            {{-- pagination --}}
            <div class="mt-5 ">
                {{ $rooms->links() }}
            </div>
        </div>

    </div>
</body>

</html>
