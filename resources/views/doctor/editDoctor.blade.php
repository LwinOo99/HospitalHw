<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
    <title>Edit Doctor Information</title>
</head>

<body class="bg-blue-950">
    <div class="relative m-5 overflow-x-auto mx-14 flex flex-col items-center justify-center">
        <div class="text-white text-xl font-bold mb-3">Edit Doctor Information</div>

        <form action="/doctor/{{ $docInfo->id }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-6 ">
                <label for="d_drName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __("text.drName")}}</label>
                <input type="text" id="d_drName" name="d_drName"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="" required value="{{ $docInfo->d_drName }}">
            </div>

            <div class="mb-6">
                <label for="d_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Age</label>
                <input type="number" id="d_age" name="d_age"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required  value="{{ $docInfo->d_age }}">
            </div>
            <div class="mb-6">
                <label for="d_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Phone</label>
                <input type="number" id="d_phone" name="d_phone"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $docInfo->d_phone }}">
            </div>
            <div class="mb-6">
                <label for="d_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Address</label>
                <textarea type="text" id="d_address" name="d_address"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>{{ $docInfo->d_address }}</textarea>
            </div>
            <div class="mb-6">
                <label for="s_specialized" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Specialized Area</label>
                <input type="text" id="s_specialized" name="s_specialized"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $docInfo->specialist->s_specialized }}">
            </div>
            <div class="mb-6">
                <label for="s_experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Experience Year</label>
                <input type="number" id="s_experience" name="s_experience"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $docInfo->specialist->s_experience }}">
            </div>
            <div class="mb-6">
                <label for="s_license" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Medical License Number</label>
                <input type="number" id="s_license" name="s_license"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $docInfo->specialist->s_license }}">
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm ml-3 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Edit Information</button>
        </form>
        <a href="/appointment">
            <button
                class="mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                {{ __("text.cancel")}}</button></a>
    </div>



</body>

</html>
