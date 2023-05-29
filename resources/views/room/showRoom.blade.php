<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Room Information</title>
</head>

<body class="bg-blue-950">
    <div class="m-5 flex flex-col justify-center ">
        <div class="text-white text-xl font-bold mb-3 ">{{ __('text.rInfo')}}</div>


        <div
            class=" text-white place-content-center block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p> {{ __('text.rNum')}} - {{$roomInfo->r_number}}</p>
            <br>
            <p>{{ __('text.rSts')}} - {{$roomInfo->r_status}}</p>
            <br>
            <p>{{ __('text.gNum')}} - {{$roomInfo->r_guestNumber}}</p>
            <br>
            <p>{{ __('text.rFees')}} -  $ {{$roomInfo->r_fees}}</p>
        </div>
        <a href="/room">
            <button class="border-2 border-white text-white my-3 px-4 py-1 rounded-md"><-{{ __('text.back')}}</button>
        </a>
    </div>

</body>

</html>
