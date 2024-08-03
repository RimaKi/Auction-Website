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
                            </table>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
