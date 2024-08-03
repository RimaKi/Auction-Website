@extends('admin-pages.admin')

@section('body')
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-3/5 mx-auto mt-11 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-fuchsia-600/90 font-bold-900 text-2xl my-6">Edit Auction</h1>

            <form method="POST" action="{{route('edit-auction',['id'=>$auction['id']])}}">
                @csrf

                <!--title -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')"/>
                    <x-text-input id="title" class="w-5/6 block mt-1" type="text" name="title" value="{{$auction['title']}}"
                                  required autocomplete="title"/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>

                <!-- description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')"/>
                    <textarea id="description" rows="3" name="description"
                              class="block p-2.5 w-5/6 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Leave a description..." autocomplete="description">{{$auction['description']}}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <div class="flex">
                    <!-- Start Date-->
                    <div class="inline-block w-5/12 mt-4">
                        <x-input-label for="start_date" :value="__('Start Date')"/>
                        <input type="date" id="start_date" name="start_date" required  value="{{$auction['start_date']}}"
                               class="block w-5/6 p-2.5 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                    </div>
                    <!-- End Date-->
                    <div class="inline-block w-5/12 mx-auto mt-4">
                        <x-input-label for="end_date" :value="__('End Date')"/>
                        <input type="date" id="end_date" name="end_date" required value="{{$auction['end_date']}}"
                               class="block w-5/6 p-2.5 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                    </div>
                </div>

                <div class="flex items-center justify-end m-6">
                    <x-primary-button class="ms-4">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var start = document.getElementById('start_date');
        var end = document.getElementById('end_date');
        start.addEventListener("input", updateMinValue);

        function updateMinValue(e) {
            end.min = start.value;
        }
    </script>
@endsection


