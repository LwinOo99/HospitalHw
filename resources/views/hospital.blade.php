<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/hospital.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Hosptal</title>
</head>

<body class="bg-blue-950">
    <div class="absolute top-0 right-0  ">
        <a href="/lang/mm" class="text-white mr-5 underline">Myanmar</a>
        <a href="/lang/en" class="text-white mr-5 underline">English</a>
        {{-- <h1 class="text-white text-3xl m-5">@lang('text.hello',["username"=> session("username")])</h1> --}}
    </div>
    <div class="flex flex-row gap-5 ">
        <div class="w-2/12 h-screen bg-gray-700 text-white ">
            <h1 class="text-center m-3 text-xl font-semibold " id="test" >Sakura Hospital </h1>
            <div class="flex flex-col mt-10 ml-7 text-lg">
                <a href="/hospital" class="mb-5" > <iconify-icon icon="ic:round-dashboard"></iconify-icon> Dashboard</a>
                <a href="/doctor" class="mb-5"><iconify-icon icon="maki:doctor"></iconify-icon> Doctor List</a>

            </div>
        </div>


        <div class="flex flex-wrap gap-4 mt-10">

            {{-- ROOM --}}
            <div class="w-2/5">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-white ">
                        <thead class="text-xs  bg-orange-700 orange:bg-orange-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="text-base align-middle">
                                        <iconify-icon icon="material-symbols:bed"></iconify-icon>
                                    </span> @lang('text.roomsts')
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rooms as $room)
                                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Rm.{{ $room->r_number }}
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
                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                    <a href="/room" class="uppercase bg-orange-700 text-white mt-3 px-4 py-1 float-right">
                        @lang('text.sAll')</a>
                </div>

            </div>
            {{-- MESSAGES --}}
            <div class="w-7/12">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-white ">
                        <thead class="text-xs  bg-gray-700 orange:bg-orange-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="text-base align-middle">
                                        <iconify-icon icon="ic:outline-mark-email-unread"></iconify-icon>
                                    </span> @lang('text.unreadMsg')
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($msgs as $msg)
                                <tr class="bg-white border-b dark:bg-gray-400 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black col-span-2">
                                        {{ $msg->m_message }}
                                        @if ($msg->m_vip == 1)
                                            <div><span>
                                                    <iconify-icon class="text-base align-top text-orange-700"
                                                        icon="material-symbols:flag-rounded"></iconify-icon>
                                                </span> VIP Message</div>
                                        @endif
                                    </th>

                                    <td class="px-6 py-4 col-span-2 text-black text-right">
                                        {{ $msg->created_at }}
                                    </td>

                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                    <a href="/message"
                        class=" border-2 border-white text-white mt-3 px-4 py-1 float-right">@lang('text.rMore')</a>
                </div>

            </div>
            {{-- DRUG STORES --}}
            <div class="w-2/5">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-white ">
                        <thead class="text-xs  bg-teal-700 orange:bg-orange-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="text-base align-middle">
                                        <iconify-icon icon="icon-park-solid:medicine-chest"></iconify-icon>
                                    </span>@lang('text.dStore')
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($drugs as $drug)
                                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $drug->d_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $drug->d_amount }}mg
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($drug->d_stock == 0)
                                            Out of Stock
                                        @else
                                            {{ $drug->d_stock }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ $drug->d_price }}/per item

                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                    <a href="/drug" class="uppercase bg-teal-700 text-white my-3 px-4 py-1 float-right">
                        @lang('text.cAll')</a>
                </div>

            </div>
            
            {{-- APPOINTMENTS --}}
            <div class="w-7/12">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-white ">
                        <thead class="text-xs  bg-zinc-700 orange:bg-orange-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    <span class="text-base align-middle">
                                        <iconify-icon icon="ion:calendar-sharp"></iconify-icon>
                                    </span>@lang('text.Apm')
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr class="bg-white border-b dark:bg-gray-400 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                                        Meet Dr.{{ $appointment->a_drName }}
                                    </th>
                                    <td class="px-6 py-4 text-black">
                                        Room {{ $appointment->a_room }}
                                    </td>
                                    <td class="px-6 py-4 text-black text-right">
                                        {{ $appointment->a_dateTime }}
                                    </td>

                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                    <a href="/appointment"
                        class="uppercase bg-zinc-700 text-white my-3 px-4 py-1 float-right">@lang('text.sAll')</a>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
