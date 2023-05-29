<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Add Room</title>
</head>

<body class="bg-blue-950">
    <div class="relative m-5 overflow-x-auto mx-14">
        <div class="text-white text-xl font-bold mb-3">{{ __("text.addRoom") }}</div>

        <form action="/room" method="POST">
            @csrf
            <div class="mb-6 ">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __("text.newRnum") }}</label>
                <input type="number" id="roomNum" name="r_number"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="" required>
            </div>
            <div class="mb-6">
                <input type="radio" name="r_status" id="avilable" value="avaliable" checked>
                <label for="avilable" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Avilable</label>

                <input type="radio" name="r_status" id="active" value="active">
                <label for="active" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Active</label>

                <input type="radio" name="r_status" id="lock" value="lock">
                <label for="lock" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">lock</label>
            </div>
            <div class="mb-6">
                <label for="guestnum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __("text.newGnum") }}</label>
                <input type="number" id="guestnum" name="r_guestNumber"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <div class="mb-6">
                <label for="fees" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __("text.newRfees") }}</label>
                <input type="number" id="fees" name="r_fees"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __("text.addRbtn") }}</button>
        </form>
        <a href="/room">
            <button
                class="mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                {{ __("text.cancel") }}</button></a>
    </div>



</body>

</html>
