<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Drug Store</title>
</head>

<body class="bg-blue-950">
    <div class="mt-3">
        <a href="/lang/mm" class="text-white float-right mr-5 underline">Myanmar</a>
        <a href="/lang/en" class="text-white float-right  mr-5 underline">English</a>
        <a href="/hospital" class="ml-5 mt-4 text-white bg-red-600 p-2 px-3 rounded-md">{{ __("text.back") }}</a>
    </div>
    <div class=" grid grid-flow-row grid-rows-2 xl:grid-flow-col">
        
        {{-- DRUG STORES --}}
        <div class="m-5">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-white ">
                    <thead class="text-xs  bg-teal-700 orange:bg-orange-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="text-base align-middle">
                                    <iconify-icon icon="icon-park-solid:medicine-chest"></iconify-icon>
                                </span>{{ __("text.dStore") }}
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
                        @forelse ($drugstore as $drug)
                            <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 underline text-blue-400 font-medium  whitespace-nowrap dark:text-blue">
                                    <a href="/drug/{{ $drug->id }}">{{ $drug->d_name }}</a> 
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
                                <td class="px-6 py-4 text-right"> 
                                    <a href="/drug/{{$drug->id}}/edit" class="text-green-500 underline ">{{ __("text.edit") }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/drug/{{ $drug->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="text-red-600 underline">{{ __("text.del") }}</button></form>
                                </td>
                            </tr>


                        @empty
                        @endforelse

                    </tbody>
                </table>
                <a href="/drug/create">
                    <button class="uppercase bg-teal-700 rounded-sm text-white my-3 px-4 py-1 float-right"> 
                        {{ __("text.addDrug") }}</button>
                </a>
            </div>
            {{-- pagination --}}
            <div class="mt-5 ">
                {{ $drugstore->links() }}
            </div>
        </div>

    </div>
</body>

</html>
