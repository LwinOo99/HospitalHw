<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    {{-- <script type="text/javascript" src="{{asset('js/jquery3.6.0.js')}}"></script> --}}
    @vite('resources/share/jquery3.6.0.js')
    <script type="text/javascript" src="{{ asset('js/historyDel.js') }}"></script>

    @vite('resources/js/hospital.js')
    {{-- @vite('resources/js/custom.js') --}}

    @vite('resources/css/app.css')

    <title>Add New Doctor</title>
</head>

<body class="bg-blue-950">

    <div class="relative overflow-x-auto  flex flex-col w-full justify-center ">
        <form action="/doctor" method="POST">
            @csrf
            <div class=" flex flex-row m-5">

                {{-- dr information --}}
                <div>
                    <div class="mb-6 ">
                        <div class="text-white text-xl font-bold mb-3" id="test">Add New Doctor</div>
                        <label for="d_drName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('text.drName') }}</label>
                        <input type="text" id="d_drName" name="d_drName"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="d_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Age</label>
                        <input type="number" id="d_age" name="d_age"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="d_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Phone</label>
                        <input type="number" id="d_phone" name="d_phone"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="d_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Address</label>
                        <textarea type="text" id="d_address" name="d_address"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="s_specialized" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Specialized Area</label>
                        <input type="text" id="s_specialized" name="s_specialized"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="s_experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Experience Year</label>
                        <input type="number" id="s_experience" name="s_experience"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="s_license" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Medical License Number</label>
                        <input type="number" id="s_license" name="s_license"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                </div>
                {{-- hospital history  --}}
                <div class="ml-5 ">
                    <h1 class="text-white text-2xl mb-2 ">Hospital Histroy</h1>
                    <div id="addbelow">
                        {{-- input start --}}
                        <div class="flex flex-row gap-4">

                            <div>
                                <label for="d_drName"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Hospital Name</label>
                                <input type="text" id="h_hospitalName" name="h_hospitalName"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Previous Hospital Name" >
                            </div>
                            <div>
                                <label for="h_started"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Started Year</label>
                                <input type="number" id="h_started" name="h_started"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="eg.2019" >
                            </div>
                            <div>
                                <label for="h_resigned"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Resigned Year</label>
                                <input type="number" id="h_resigned" name="h_resigned"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="eg.2022" >
                            </div>
                            <div>
                                {{-- <p class="text-white text-center transparent" id="testing"  >Add</p> --}}
                                <iconify-icon icon="ic:round-add-box" id="plus" 
                                    class="text-green-500 text-5xl mt-6 "></iconify-icon>
                                    
                            </div>
                        </div>
                        {{-- input end --}}
                    </div>
                </div>

            </div>
            {{-- save btn --}}
            <div class="flex flex-col justify-center m-5 place-items-center ">
                <div><button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-72  px-5  py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-center">
                        Add New Doctor</button>
                </div>
                <div>
                    <a href="/appointment">
                        <button
                            class="mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            {{ __('text.cancel') }}</button></a>
                </div>

            </div>
        </form>


    </div>


</body>

</html>
