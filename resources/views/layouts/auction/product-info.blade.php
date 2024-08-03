<div class="flex">
    <div class="w-1/4 ml-14 my-auto inline-block">
        <img src="{{asset('/storage/'.$product['media'][0]['path'])}}"
             class="w-5/6 ">
    </div>
    <div class="inline-block">
        <div>
            <table class="ml-9 my-11 table-auto">
                <tr>
                    <td class="font-black">Title :</td>
                    <td class="pl-2">{{$product['name']}}</td>
                </tr>
                <tr>
                    <td class="font-black w-28">Description :</td>
                    <td class="pl-2">{{$product['description']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Link :</td>
                    <td class="pl-2">{{$product['link']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Type :</td>
                    <td class="pl-2">{{$product['type']['name']}}</td>
                </tr>
                @if(auth()->check() && auth()->user()->is_admin)
                    <tr>
                        <td class="font-black">Owner :</td>
                        <td class="pl-2">{{$product['user']['first_name']." ".$product['last_name']}}</td>
                    </tr>
                @endif
                <tr>
                    <td class="font-black">Bid Amount :</td>
                    <td class="pl-2">{{$product['bid_amount']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Min Price :</td>
                    <td class="pl-2">{{$product['min_price']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Closing Price :</td>
                    <td class="pl-2">{{$product['closing_price']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Reach Rate :</td>
                    <td class="pl-2">{{$product['reach_rate']}}</td>
                </tr>
                <tr>
                    <td class="font-black">Status :</td>
                    <td class="pl-2 {{$product['status'] == 'publish' ? 'text-green-500':($product['status'] == "pending" ? 'text-fuchsia-600' :'text-red-600') }}">{{$product['status']}}</td>
                </tr>

                @if(isset($data))
                    <tr>
                        <td class="font-black">Top Offer :</td>
                        <td class="pl-2 text-green-500">{{$data['top_offer']}}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

</div>
