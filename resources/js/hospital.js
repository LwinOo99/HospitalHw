
$(document).ready(function () {
    let hCount = 0;
    $("#plus").click(function () {
        let hospital = $("#h_hospitalName").val();
        let started = $("#h_started").val();
        let resigned = $("#h_resigned").val();
        let sLength = started.length;
        let rLength = resigned.length;
        hCount++
        console.log(hospital + hCount)
            ;
        
        if (hospital && started && resigned != "" ) {

            if (checkExp(started, resigned)&&checkExpLength(sLength,rLength) == true) {
                // alert("OK")
                $("#addbelow").append(
                    `
            <div class="flex flex-row gap-4" id="del${hCount}">
                            <div>
                                <label for="h_hospitalName"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Hospital Name</label>
                                <input type="text" id="h_hospitalName${hCount}" name="h_hospitalName${hCount}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="" required disabled value="${hospital}" >
                            </div>
                            <div>
                                <label for="h_started"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Started Year</label>
                                <input type="number" id="h_started${hCount}" name="h_started${hCount}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="" disabled required value="${started}" >
                            </div>
                            <div>
                                <label for="h_resigned"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Resigned Year</label>
                                <input type="number" id="h_resigned${hCount}" name="h_resigned${hCount}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="" disabled required value="${resigned}" >
                            </div>
                            <div>
                                <iconify-icon icon="icon-park-solid:delete-five" id="delete${hCount}" onclick="delHistory(${hCount})" 
                                    class="text-red-500 hover:text-red-700 text-5xl mt-6"></iconify-icon>
                            </div>
                        </div>
            `)

                $("#h_hospitalName").val("");
                $("#h_started").val("");
                $("#h_resigned").val("");
            }




        } else {
            alert("Please Fill all the Forms")
        }

    });


});


function checkExp(start, resign) {

    if (Number(start) > Number(resign)) {
        alert("Started Year Shouldn't be Greater than Resigned Year.")
        return false;
    } else {
        return true
    }
}

function checkExpLength(start,resign){
    return (start == 4 ? true : alert("Year must contain 4 numerical number"));
}