@extends('admin-pages.admin')

@section('body')

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-5/6  mt-8 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @include('layouts.auction.product-info',['product'=>$data['product'],'data'=>$data])
            <hr>
            <div>
                <center class="mt-9">
                    @if(count($data['purchase_offers']) >0)
                        <h1 class="font-bold my-6">Purchase Offers</h1>
                        <hr class="my-9">
                        @foreach($data['purchase_offers'] as $offer)

                            <div class="inline-block mx-8">
                                <div class="w-[270px] h-[180px] mb-6 mx-auto border border-gray-400/50 rounded-lg ">

                                    <table class="mx-4">
                                        <tr>
                                            <td class="font-black w-28">User Name :</td>
                                            <td>{{$offer['user']['first_name']." ".$offer['user']['last_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-black w-28">Amount :</td>
                                            <td>{{$offer['amount']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-black w-28">Is Selected :</td>
                                            <td
                                                class=" {{$data['purchase_offer_id'] == $offer['id'] ? "text-green-600" : "text-red-600"}}"
                                            >
                                                {{$data['purchase_offer_id'] == $offer['id'] ? "true" : "false"}}
                                            </td>
                                        </tr>

                                    </table>
                                </div>

                            </div>

                        @endforeach
                    @endif
                </center>
            </div>
        </div>
    </div>

@endsection
