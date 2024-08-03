<x-app-layout>
    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-2/3  mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                @include('layouts.auction.product-info',['product'=>$product])
                </div>
                <hr>
                <div>
                    @if(count($product['auction_products'])>0)
                        <h1 class="font-bold mx-auto w-1/6  my-6">Auctions</h1>
                    @endif
                    <div>
                        @foreach($product['auction_products'] as $item )
                            <div class="w-3/4 mx-auto my-8 border border-gray-500/50">
                                <table class="m-3">
                                    <tr>
                                        <td class="font-black w-1/5">Auction Name :</td>
                                        <td class="pl-2">{{$item['auction']['title']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-1/5">Auction Description :</td>
                                        <td class="pl-2">{{$item['auction']['description']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-1/5">Auction Start Date :</td>
                                        <td class="pl-2">{{$item['auction']['start_date']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-1/5">Auction End Date :</td>
                                        <td class="pl-2">{{$item['auction']['end_date']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-1/5">Top Offer :</td>
                                        <td class="pl-2">{{$item['topOffer']}}</td>
                                    </tr>

                                    @if(count($item['purchase_offers']) >0)
                                        <tr>
                                            <td class="font-black w-1/5">Purchase Offers :</td>
                                        </tr>
                                        <div class="relative overflow-x-auto">
                                            <table
                                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        User Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Amount
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Created At
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Is Selected
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($item['purchase_offers'] as $offer)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{$offer['user']['first_name']." ".$offer['user']['last_name']}}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{$offer['amount']}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$offer['created_at']}}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{$item['purchase_offer_id'] == $offer['id'] ? 'true' : false}}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    @endif

                                </table>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
