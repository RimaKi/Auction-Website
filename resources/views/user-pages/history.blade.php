@vite(['resources/css/tailwind.css'])
<x-app-layout>
    <div class="my-16 mx-auto px-8 sm:px-0">
        <div class="sm:w-7/12 sm:mx-auto">
            <div
                role="tablist"
                aria-label="tabs"
                class="relative mx-auto h-12 grid grid-cols-2 items-center px-[3px] rounded-full bg-fuchsia-600/40 overflow-hidden shadow-2xl shadow-900/20 transition"
            >
                <div
                    class="absolute indicator h-11 my-auto top-0 bottom-0 left-0 rounded-full bg-white shadow-md"></div>
                <button
                    role="tab"
                    aria-selected="true"
                    aria-controls="panel-1"
                    id="tab-1"
                    tabindex="0"
                    class="relative block h-10 px-6 tab rounded-full"
                >
                    <span class="text-gray-800">Product</span>
                </button>
                <button
                    role="tab"
                    aria-selected="false"
                    aria-controls="panel-2"
                    id="tab-2"
                    tabindex="-1"
                    class="relative block h-10 px-6 tab rounded-full"
                >
                    <div><span class="text-gray-800">Purchase Offers</span></div>
                </button>
            </div>
            <div class="mt-6 relative rounded-3xl bg-purple-50">
                {{--products--}}
                <div
                    role="tabpanel"
                    id="panel-1"
                    class="tab-panel p-6 transition duration-300"
                >
                    <h2 class="text-xl font-semibold text-gray-800">Your products</h2>
                    @foreach($products as $product)
                        <div class="flex border border-gray-400/50 rounded my-6">

                            <div class="inline-flex w-3/4">
                                <table class="mx-4">
                                    <tr>
                                        <td class="font-black w-28">Name :</td>
                                        <td>{{$product['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-28">Description :</td>
                                        {{--                                        <td>{{\Illuminate\Support\Str::words($product['description'],5)}}</td>--}}
                                        <td>{{$product['description']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-28">Link :</td>
                                        <td>{{$product['link']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-28">Status :</td>
                                        <td class="rounded-lg  {{$product['status'] == 'publish' ? 'text-green-500' : ($product['status']== 'pending' ? 'text-fuchsia-500' :'text-red-500') }}">
                                            {{$product['status'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{route('product-details',['id'=>$product['id']])}}"
                                               class="flex justify-end mr-2 underline text-fuchsia-500/75">view
                                                offers</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="inline-flex w-1/4">
                                <img src="{{asset('/storage/'.$product['media'][0]['path'])}}"
                                     alt="{{$product['name']}}"
                                     class="mx-auto my-auto h-2/3">
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--Purchase offer--}}
                <div
                    role="tabpanel"
                    id="panel-2"
                    class="w-10/12 absolute top-0 invisible opacity-0 tab-panel p-6 transition duration-300"
                >
                    <h2 class="text-xl font-semibold text-gray-800">Your purchase offers</h2>
                    <div>
                        @foreach($offers as $offer)
                            <div class="border border-gray-400/50 my-6 rounded">
                                <table class="mx-4">
                                    <tr>
                                        <td class="font-black pr-3">Product Name :</td>
                                        <td>{{$offer['auction_product']['product']['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black pr-3">Product link :</td>
                                        <td>{{$offer['auction_product']['product']['link']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black pr-3">Top Offer :</td>
                                        <td>{{$offer['auction_product']['topOffer']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black pr-3">Amount Your Offer:</td>
                                        <td>{{$offer['amount']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black pr-3">created At :</td>
                                        <td>{{$offer['created_at']}}</td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/history.js');
</x-app-layout>



