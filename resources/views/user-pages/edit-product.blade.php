<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-7/12  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="border border-gray-600/500 p-6 ">
                <h1 class="text-fuchsia-600/90 font-bold-900 text-2xl my-6">Edit Product Files</h1>
                <hr>
                <div class="my-6 flex">

                    <form method="POST" action="{{route('edit-file')}}" enctype="multipart/form-data" class="mx-auto">
                        @csrf
                        @foreach($product['media'] as $m)
                            <div class="border mx-7 inline-block">
                                <div>
                                    <img src="{{asset('/storage/'.$m->path)}}" class="w-36 h-36 mx-auto my-4">
                                </div>
                                <div>
                                    <center>
                                        {{--TODO edit id--}}
                                        <input id="input-hidden" type="hidden" name="files[][id]" value="{{$m['id']}}">
                                        <input type="file" id="file" name="files[][file]" accept=".png, .jpg, .jpeg"
                                               class="w-3/4 my-4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        />
                                    </center>
                                </div>
                            </div>
                        @endforeach
                        <div class="items-center my-4 justify-end flex mr-6">
                            <x-primary-button class="ms-4 h-8">
                                {{ __('Edit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border border-gray-600/500 p-6 my-6">
                <h1 class="text-fuchsia-600/90 font-bold-900 text-2xl my-6">Edit Product Information</h1>
                <form method="POST" action="{{url('/product/edit/'.$product['id'])}}">
                    @csrf
                    @method('PUT')
                    <!--Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="w-2/3 block mt-1" type="text" name="name"
                                      :value="old('name',$product['name'])"
                                      required autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('description')"/>
                        <textarea id="message" rows="3" name="description"
                                  class="block p-2.5 w-2/3 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Leave a description..."
                                  autocomplete="description">{{$product['description']}}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <!-- Link -->
                    <div class="mt-4">
                        <x-input-label for="link" :value="__('Link')"/>
                        <x-text-input id="link" class="block mt-1 w-2/3" type="text" name="link"
                                      :value="old('link',$product['link'])"
                                      required autocomplete="link"/>
                        <x-input-error :messages="$errors->get('link')" class="mt-2"/>
                    </div>
                    <!-- Type_id -->
                    <div class="mt-4">
                        <x-input-label for="type_id" :value="__('Type')"/>
                        <select name="type_id" id="type_id" required autocomplete="type_id"
                                class="my-1.5 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach($types as $type)
                                <option
                                    value="{{$type['id']}}" @selected($type['id']==$product['type_id'])>{{$type['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
                        <!-- Bid amount -->
                        <div class="mt-4 inline-block">
                            <x-input-label for="bid_amount" :value="__('Bid Amount')"/>
                            <input type="number" step=any name="bid_amount" id="bid_amount" required
                                   autocomplete="bid_amount" value="{{$product['bid_amount']}}"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                        </div>

                        <!-- Min price -->
                        <div class="mx-auto mt-4 inline-block">
                            <x-input-label for="min_price" :value="__('Min Price')"/>
                            <input type="number" step=any name="min_price" id="min_price" required
                                   autocomplete="min_price" value="{{$product['min_price']}}"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('min_price')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="flex">
                        <!-- Closing Price -->
                        <div class=" mt-4 inline-block">
                            <x-input-label for="closing_price" :value="__('closing_price')"/>
                            <input type="number" step=any name="closing_price" id="closing_price"
                                   onchange="this.name = 'closing_price'" autocomplete="closing_price"
                                   value="{{$product['closing_price']}}"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('closing_price')" class="mt-2"/>
                        </div>
                        <!-- Reach Rate -->
                        <div class="mx-auto mt-4 inline-block">
                            <x-input-label for="reach_rate" :value="__('Reach Rate')"/>
                            <input type="number" step=any id="reach_rate"
                                   onchange="this.name = 'reach_rate'" autocomplete="reach_rate"
                                   value="{{$product['reach_rate']}}"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('reach_rate')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <div class="inline-flex items-center  mt-4">
                            <a id="show" href="{{route('formAddProduct')}}"
                               class="inline-flex items-center px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                BACK
                            </a>
                        </div>
                        <div class="inline-flex items-center mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Edit') }}
                            </x-primary-button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
