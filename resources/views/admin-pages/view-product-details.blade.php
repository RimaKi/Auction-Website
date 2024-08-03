@extends('admin-pages.admin')

@section('body')

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-2/3  mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                @include('layouts.auction.product-info',['product'=>$product])
                <div class="justify-end flex mb-6">
                    <form method="POST" action="{{route('change-status',['id'=>$product['id']])}}">
                        @csrf
                        <button type="submit" name="status" value=1
                                class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50"
                        >Accept
                        </button>
                        <button type="submit" name="status" value=0
                                class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50"
                        >Reject
                        </button>

                    </form>
                </div>
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

@endsection
