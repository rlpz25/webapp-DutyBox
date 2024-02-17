<x-app-layout>
    {{ date_default_timezone_set('America/Mexico_City') }}
    <x-slot name="header">
        <div class="flex items-center">
            <div class="flex-1 min-w-0 ms-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                <button id='show_pd_duties'
                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Pending
                </button>
                <button id='show_ft_duties'
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Future
                </button>
                <button id='show_cp_duties'
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Completed
                </button>
                <button id='show_xp_duties'
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    Expired
                </button>
                <button id='new_btn'
                    class="ml-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    New duty
                </button>
            </div>
        </div>
    </x-slot>

    <div id="main_grid" class="grid grid-cols-1 py-9 gap-y-4">

        <div id="duty_form"
            class="hidden w-full h-full mx-auto sm:rounded-lg sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            <div class="w-full h-full mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form name="data" id="data">
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
                            <input required type="date" name="st_date" id="st_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                            <input type="time" name="st_time" id="st_clock"
                                class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                        </div>
                        <br>
                        <div class="">
                            <label for="exp_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duty expiration
                                date*</label>
                            <input required type="date" name="exp_date" id="exp_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                            <input type="time" name="exp_time" value='00:00:00' id="exp_clock"
                                class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-400 focus:border-indigo-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
                        </div>
                        <input type="" class="hidden" id="check" name="new" value="0">
                        <br>
                    </form>
                    <button type="submit" id="save"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-indigo-800">Save</button>
                    <button id="cancel"
                        class="mt-4 text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        <div id="pd_duties_ls" class="duties_list hidden w-full h-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full h-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Pending Duties</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($duties as $duty)
                            @if ($duty->completed == null && $duty->st_date <= date('Y-m-d H:i:00') && $duty->exp_date > date('Y-m-d H:i:00'))
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="complete_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Complete
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
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="modify_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Modify
                                            </button>
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="delete_duty_btn ml-4 text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-700 dark:hover:bg-rose-800 dark:focus:ring-rose-800">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div id="cp_duties_ls" class="duties_list hidden w-full h-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full h-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Completed Duties</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($duties as $duty)
                            @if ($duty->completed != null)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="complete_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
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
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="modify_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Modify
                                            </button>
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="delete_duty_btn ml-4 text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-700 dark:hover:bg-rose-800 dark:focus:ring-rose-800">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div id="ft_duties_ls" class="duties_list hidden w-full h-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full h-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Future Duties</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($duties as $duty)
                            @if ($duty->completed == null && $duty->st_date > date('Y-m-d H:i:00'))
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="complete_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Complete
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
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="modify_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Modify
                                            </button>
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="delete_duty_btn ml-4 text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-700 dark:hover:bg-rose-800 dark:focus:ring-rose-800">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div id="xp_duties_ls" class="duties_list hidden w-full h-full mx-auto sm:px-6 lg:px-8">
            <div
                class="w-full h-full p-4 lg:p bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Expired Duties</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($duties as $duty)
                            @if ($duty->completed == null && $duty->exp_date < date('Y-m-d H:i:00'))
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="complete_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Complete
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
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="modify_duty_btn text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                                Modify
                                            </button>
                                            <button data-id="{{ $duty->id }}" data-name="{{ $duty->name }}"
                                                data-description="{{ $duty->description }}"
                                                data-st_date="{{ $duty->st_date }}"
                                                data-exp_date="{{ $duty->exp_date }}"
                                                data-completed="{{ $duty->completed }}"
                                                class="delete_duty_btn ml-4 text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-rose-700 dark:hover:bg-rose-800 dark:focus:ring-rose-800">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <script type="module">
        $(document).ready(function() {

            switch (sessionStorage.getItem('page_indicator')) {
                case '0':
                    $('#pd_duties_ls').show();
                    break;
                case '1':
                    $('#ft_duties_ls').show();
                    break;
                case '2':
                    $('#cp_duties_ls').show();
                    break;
                case '3':
                    $('#xp_duties_ls').show();
                    break;
                default:
                    $('#pd_duties_ls').show();
                    break;
            }
            $('.modify_duty_btn').click(function() {
                $('.modify_duty_btn').html('Modify');
                let ths = $(this);
                ths.html('Modifying');
                let name = ths.data('name');
                let description = ths.data('description');
                let st_date = ths.data('st_date');
                let exp_date = ths.data('exp_date');
                let id = ths.data('id');
                setFormValues(name, description, st_date, exp_date, ['modify', id]);
                $('#duty_form').show();
                $('#main_grid').addClass('lg:grid-cols-2');
            });
            $('#save').click(function() {
                let formData = new FormData($('#data')[0]);
                ajaxPost(formData);
            });
            $('.complete_duty_btn').click(function() {
                $('#check').attr('name', 'complete');
                $('#check').val($(this).data('id'));
                let formData = new FormData($('#data')[0]);
                ajaxPost(formData);
            });
            $('.delete_duty_btn').click(function() {
                if (confirm("Are you sure you want to delete this duty?")) {
                    $('#check').attr('name', 'remove');
                    $('#check').val($(this).data('id'));
                    let formData = new FormData($('#data')[0]);
                    ajaxPost(formData);
                }
            });
            $('#new_btn').click(function() {
                setFormValues("", "", "{{ date('Y-m-d H:i:00') }}", "00:00:00", ["new", "0"]);
                $('.modify_duty_btn').html('Modify');
                $('#duty_form').show();
                $('#main_grid').addClass('lg:grid-cols-2');
            });
            $('#cancel').click(function() {
                $('.modify_duty_btn').html('Modify');
                $('#duty_form').hide();
                $('#main_grid').removeClass('lg:grid-cols-2');
            });
            $('#show_pd_duties').click(function() {
                sessionStorage.setItem('page_indicator', 0);
                $('.duties_list').hide();
                $('#pd_duties_ls').show();
            });
            $('#show_ft_duties').click(function() {
                sessionStorage.setItem('page_indicator', 1);
                $('.duties_list').hide();
                $('#ft_duties_ls').show();
            });
            $('#show_cp_duties').click(function() {
                sessionStorage.setItem('page_indicator', 2);
                $('.duties_list').hide();
                $('#cp_duties_ls').show();
            });
            $('#show_xp_duties').click(function() {
                sessionStorage.setItem('page_indicator', 3);
                $('.duties_list').hide();
                $('#xp_duties_ls').show();
            });

        });

        function setFormValues(name, description, st_date, exp_date, check) {
            let st_day, st_clock, exp_day, exp_clock;
            if (st_date.length < 10) {
                st_day = "";
                st_clock = st_date;
            } else {
                st_day = st_date.substr(0, 10);
                st_clock = st_date.substr(11, 17);
            }
            if (exp_date.length < 10) {
                exp_day = "";
                exp_clock = exp_date;
            } else {
                exp_day = exp_date.substr(0, 10);
                exp_clock = exp_date.substr(11, 17);
            }
            $('#name').val(name);
            $('#description').val(description);
            $('#st_date').val(st_day);
            $('#st_clock').val(st_clock);
            $('#exp_date').val(exp_day);
            $('#exp_clock').val(exp_clock);
            $('#check').attr('name', check[0]);
            $('#check').val(check[1]);
        }

        function ajaxPost(formData) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: "{{ route('db.upload') }}",
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    if (typeof response == "string" && response != "1") {
                        alert(response)
                    } else {
                        location.reload();
                    }
                },
                error: function(error) {
                    if (error) {
                        alert(error.responseJSON.errors.message)
                    }
                }
            });
        }
    </script>

</x-app-layout>
