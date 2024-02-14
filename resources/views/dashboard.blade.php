<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <div class="flex-1 min-w-0 ms-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                <button id='pending_btn' name="pending_btn"
                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Pending
                </button>
                <button id='future_btn' name="future_btn"
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Future
                </button>
                <button id='completed_btn' name="completed_btn"
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Completed
                </button>
                <button id='expired_btn' name="expired_btn"
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Expired
                </button>
                <button id='new_btn' name="expired_btn"
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    New duty
                </button>
            </div>
        </div>

    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-2 py-9">

        <div id="duty_form" class="hidden w-full mx-auto sm:rounded-lg sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form name="data" id="data" {{-- action="{{ route('db.upload') }}" method="POST" --}}>
                        {{-- @csrf --}}
                        <div class="">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duty name*</label>
                            <input required type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                        </div>
                        <br>
                        <div class="">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duty description
                                (optional)</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-400 focus:border-indigo-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600"
                                placeholder="Write a description..."></textarea>
                        </div>
                        <br>
                        <div class="">
                            <label for="st_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duty start
                                date*</label>
                            <input required type="date" name="st_date" id="st_date" value="{{ $current_date }}"
                                min="{{ $current_date }}" id="st_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                            <input type="time" name="st_time" value='{{ $current_time }}' id="st_clock"
                                class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                        </div>
                        <br>
                        <div class="">
                            <label for="exp_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duty expiration
                                date*</label>
                            <input required type="date" name="exp_date" min="{{ $current_date }}" id="exp_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                            <input type="time" name="exp_time" value='00:00:00' id="exp_clock"
                                class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                        </div>
                        <br>
                        <button type="submit" id="save"
                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="pending_duties" class="w-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Pending Duties</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($duties as $duty)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button id='modyfy_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Completed
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $duty->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $duty->description }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button id='modyfy_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Modify
                                        </button>
                                        <button id='delete_btn'
                                            class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $duties->links() }}
                </div>
            </div>
        </div>

        <div id="completed_duties" class="hidden w-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Completed Duties</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($comp_duties as $duty)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button id='completed_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Completed
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $duty->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $duty->description }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button id='modify_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Modify
                                        </button>
                                        <button id='delete_btn'
                                            class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $comp_duties->links() }}
                </div>
            </div>
        </div>

        <div id="future_duties" class="hidden w-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Future Duties</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($future_duties as $duty)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button id='completed_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Completed
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $duty->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $duty->description }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button id='modify_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Modify
                                        </button>
                                        <button id='delete_btn'
                                            class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $future_duties->links() }}
                </div>
            </div>
        </div>

        <div id="expired_duties" class="hidden w-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Expired Duties</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($exp_duties as $duty)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button id='completed_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Completed
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $duty->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $duty->description }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button id='modify_btn'
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Modify
                                        </button>
                                        <button id='delete_btn'
                                            class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $exp_duties->links() }}
                </div>
            </div>
        </div>
    </div>



    <script type="module">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $('#new_btn').click(function() {
                if($('#duty_form').hasClass("hidden")){
                    $('#duty_form').removeClass("hidden");
                }else{
                    $('#duty_form').addClass("hidden");
                }
            });
            $('#pending_btn').click(function() {
                if($('#pending_duties').hasClass("hidden")){
                    $('#pending_duties').removeClass("hidden");
                }else{
                    $('#pending_duties').addClass("hidden");
                }
            });
            $('#future_btn').click(function() {
                if($('#future_duties').hasClass("hidden")){
                    $('#future_duties').removeClass("hidden");
                }else{
                    $('#future_duties').addClass("hidden");
                }
            });
            $('#completed_btn').click(function() {
                if($('#completed_duties').hasClass("hidden")){
                    $('#completed_duties').removeClass("hidden");
                }else{
                    $('#completed_duties').addClass("hidden");
                }
            });
            $('#expired_btn').click(function() {
                if($('#expired_duties').hasClass("hidden")){
                    $('#expired_duties').removeClass("hidden");
                }else{
                    $('#expired_duties').addClass("hidden");
                }
            });
            var form = $('#data')[0];
            // console.log(form);
            $('#save').click(function() {
                var formData = new FormData(form);
                // console.log(formData);
                $.ajax({
                    url: '{{route('db.upload')}}',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        console.log('success');
                        console.log(response);
                    },
                    error: function(error) {
                        if(error){
                            console.log(error.responseJSON.errors.name)
                        }
                    }
                });
            });
        });
    </script>

</x-app-layout>
