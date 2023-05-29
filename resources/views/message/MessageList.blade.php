<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Message List</title>
</head>

<body class="bg-blue-950">
    <div class="mt-3">
        <a href="/lang/mm" class="text-white float-right mr-5 underline">Myanmar</a>
        <a href="/lang/en" class="text-white float-right  mr-5 underline">English</a>
        <a href="/hospital" class="ml-5 mt-4 text-white bg-red-600 p-2 px-3 rounded-md">{{ __("text.back") }}</a>
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
                                    <iconify-icon icon="ic:outline-mark-email-unread"></iconify-icon>
                                </span>{{ __("text.unreadMsg") }}
                            </th>
                            
                            <th scope="col" class="px-6 py-3 " colspan="3">
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($msgs as $msg)
                        <tr class="bg-white border-b dark:bg-gray-400 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black col-span-2">
                                <a href="/message/{{ $msg->id }}">{{ $msg->m_message }}</a>
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
                            <td class="px-6 py-4 text-right"> 
                                <a href="/message/{{$msg->id}}/edit" class="text-blue-600 underline ">{{ __("text.edit") }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/message/{{ $msg->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="text-red-600 underline">{{ __("text.del") }}</button></form>
                            </td>
                        </tr>


                        @empty
                        @endforelse

                    </tbody>
                </table>
                <a href="/message/create">
                    <button class=" border-2 border-white text-white my-3 px-4 py-1 float-right">
                        {{ __("text.addmsg") }}</button>
                </a>
            </div>
            {{-- pagination --}}
            <div class="mt-5 ">
                {{ $msgs->links() }}
            </div>
        </div>

    </div>
</body>

</html>
