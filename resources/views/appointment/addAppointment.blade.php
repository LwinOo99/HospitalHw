<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Add Appointment</title>
</head>

<body class="bg-blue-950">
    <div class="relative m-5 overflow-x-auto mx-14">
        <div class="text-white text-xl font-bold mb-3">{{ __('text.addNewApm') }}</div>

        <form action="/appointment" method="POST">
            @csrf
            <div class="mb-6 ">
                <label for="d_drName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('text.drName') }}</label>
                <select id="d_drName" name="d_drName"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose Doctor</option>
                    @foreach ($docList as $doc)
                        <option value="{{ $doc->d_drName }}">{{ $doc->d_drName }}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="mb-6">
                <label for="a_room" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('text.rNum') }}</label>
                <input type="number" id="a_room" name="a_room"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <div class="mb-6">
                <label for="a_dateTime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('text.apmDT') }}</label>
                <input type="datetime-local" id="a_dateTime" name="a_dateTime"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('text.addApm') }}</button>
        </form>
        <a href="/appointment">
            <button
                class="mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                {{ __('text.cancel') }}</button></a>
    </div>



</body>

</html>
