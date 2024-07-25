<?php
session_start();
?>
<div style="display: none;">{{$_SESSION['auction_id']=$data['id']}}</div>

<x-app-layout>
    <div class="py-12 max-80 ">
        <div id="auctions">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-11/12 mx-auto">
                <div>
                    <a href="{{asset('/auction/'.$data['id'])}}">
                        <table class="mx-auto my-11 w-2/3 table-auto">
                            <tr>
                                <td class="font-black">Title :</td>
                                <td class="pl-2">{{$data['title']}}</td>
                            </tr>
                            <tr>
                                <td class="font-black w-28">Description :</td>
                                <td class="pl-2">{{$data['description']}}</td>
                            </tr>
                            <tr>
                                <td class="font-black">Start Date :</td>
                                <td class="pl-2">{{$data['start_date']}}</td>
                            </tr>
                            <tr>
                                <td class="font-black">End Date :</td>
                                <td class="pl-2">{{$data['end_date']}}</td>
                            </tr>
                        </table>
                        <div class="text-right mr-60 my-8">
                            <a href="{{route('formAddProduct')}}"
                               class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50">
                                Add Product</a>
                        </div>
                    </a>

                    <hr>
                    <div class="mx-auto w-2/3 h-24 flex">
                        @foreach($types as $type)
                            <a href="{{url('/auction/'.$data['id'].'/'.$type['id'])}}"
                               class="mx-auto my-auto inline-block">
                                <img class="w-16 h-16" src="{{asset('/storage/'.$type['media']['path'])}}">
                            </a>
                        @endforeach
                    </div>
                    <hr>
                    <center class="mt-9">
                        @foreach($data['auction_products'] as $item)
                            @if($item['product'] != null)
                                <div class="inline-block mx-8">
                                    <div class="w-[350px] h-[460px] mb-6 mx-auto border border-fuchsia-500 rounded-lg ">
                                        <img src="{{asset('/storage/'.$item['product']['media'][0]['path'])}}"
                                             alt="{{$item['product']['name']}}"
                                             class="mx-auto my-4 w-40 h-44">
                                        <table class="mx-4">
                                            <tr>
                                                <td class="font-black w-28">Name :</td>
                                                <td>{{$item['product']['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-black w-28">Description :</td>
                                                <td>{{\Illuminate\Support\Str::words($item['product']['description'],5)}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-black w-28">Status :</td>
                                                <td class="rounded-lg  {{$item['product']['status'] == 'publish' ? 'text-green-500' :'text-red-500' }}">{{$item['product']['status'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-black w-28">Top Offer :</td>
                                                <td>{{$item['topOffer'] ?? "none"}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-black w-28">Type :</td>
                                                <td>{{$item['product']['type']['name']}}</td>
                                            </tr>

                                        </table>
                                        <center class="my-6">
                                            <a href="{{route('view-auction-product',['id'=>$item['id']])}}"
                                               class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50">
                                                SHOW MORE
                                            </a>
                                        </center>
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
