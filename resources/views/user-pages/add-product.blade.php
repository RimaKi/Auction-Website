<?php
session_start();
?>

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-2/3  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if(count($products) >0)
                <div class="border border-gray-600/500 p-6 my-6">
                    <h1 class="text-fuchsia-600/90 font-bold-900 text-2xl my-6">Add Old Product</h1>
                    <form method="POST" action="{{route('add-old-product',['auction_id'=>$_SESSION['auction_id']])}}">
                        @csrf

                        <div class="flex">
                            @foreach($products as $i => $product)
                                <div class="inline-block  w-1/4 mx-auto">
                                    <div class="border border-gray-500/50">
                                        <div style="height: 350px;">
                                            <img src="{{asset('/storage/'.$product['media'][0]['path'])}}"
                                                 alt="{{$product['name']}} photo"
                                                 class="mx-auto my-3 w-24 h-32">
                                            <table class="mx-4 my-12">
                                                <tr class="my-4">
                                                    <td class="font-black w-28">Name :</td>
                                                    <td>{{$product['name']}}</td>
                                                </tr>
                                                <tr class="my-4">
                                                    <td class="font-black w-28">Description :</td>
                                                    <td>{{\Illuminate\Support\Str::words($product['description'],6)}}</td>
                                                </tr>
                                                <tr class="my-4">
                                                    <td class="font-black w-28">Type :</td>
                                                    <td>{{$product['type']['name']}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <a href="{{url('/product/edit-form/'.$product["id"])}}"
                                           class="flex justify-end mr-2 underline text-fuchsia-500/75"> Edit Product
                                            Info</a>

                                    </div>
                                    <input id="default-checkbox" type="checkbox" name="product_ids[{{$i}}]" value="{{$product['id']}}"
                                           class="mx-auto w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Select
                                        Product</label>
                                </div>

                            @endforeach
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            @endif
            <div class="border border-gray-600/500 p-6 my-6">
                <h1 class="text-fuchsia-600/90 font-bold-900 text-2xl my-6">Add New Product</h1>

                <form method="POST" action="{{ route('add-new-product',['auction_id'=>$_SESSION['auction_id']]) }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{--product photos--}}
                    <div>
                        <x-input-label for="files" :value="__('Files')"/>
                        <input type="file" id="files" name="files[]" accept=".png, .jpg, .jpeg" multiple="multiple"
                               required
                               class="w-2/3 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        />
                        <x-input-error :messages="$errors->get('files')" class="mt-2"/>
                    </div>

                    <!--Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="w-2/3 block mt-1" type="text" name="name"
                                      :value="old('name')"
                                      required autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('description')"/>
                        <textarea id="message" rows="3" onchange="this.name = 'description'"
                                  class="block p-2.5 w-2/3 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Leave a description..." autocomplete="description"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <!-- Link -->
                    <div class="mt-4">
                        <x-input-label for="link" :value="__('Link')"/>
                        <x-text-input id="link" class="block mt-1 w-2/3" type="text" name="link" :value="old('link')"
                                      required autocomplete="link"/>
                        <x-input-error :messages="$errors->get('link')" class="mt-2"/>
                    </div>
                    <!-- Type_id -->
                    <div class="mt-4">
                        <x-input-label for="type_id" :value="__('Type')"/>
                        <select name="type_id" id="type_id" required autocomplete="type_id"
                                class="my-1.5 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach($types as $type)
                                <option value="{{$type['id']}}">{{$type['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
                        <!-- Bid amount -->
                        <div class="mt-4 inline-block">
                            <x-input-label for="bid_amount" :value="__('Bid Amount')"/>
                            <input type="number" step=any name="bid_amount" id="bid_amount" required autocomplete="bid_amount"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                        </div>

                        <!-- Min price -->
                        <div class="mx-auto mt-4 inline-block">
                            <x-input-label for="min_price" :value="__('Min Price')"/>
                            <input type="number" step=any name="min_price" id="min_price" required autocomplete="min_price"
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
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('closing_price')" class="mt-2"/>
                        </div>
                        <!-- Reach Rate -->
                        <div class="mx-auto mt-4 inline-block">
                            <x-input-label for="reach_rate" :value="__('Reach Rate')"/>
                            <input type="number" step=any id="reach_rate"
                                   onchange="this.name = 'reach_rate'" autocomplete="reach_rate"
                                   class="w-80 formbold-form-input border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('reach_rate')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Add') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
