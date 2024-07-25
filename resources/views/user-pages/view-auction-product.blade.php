<x-app-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-7/12 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                <table class="mx-auto my-11 w-2/3 table-auto">
                    <tr>
                        <td class="font-black">Title :</td>
                        <td class="pl-2">{{$data['product']['name']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black w-28">Description :</td>
                        <td class="pl-2">{{$data['product']['description']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Link :</td>
                        <td class="pl-2">{{$data['product']['link']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Type :</td>
                        <td class="pl-2">{{$data['product']['type']['name']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Bid Amount :</td>
                        <td class="pl-2">{{$data['product']['bid_amount']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Min Price :</td>
                        <td class="pl-2">{{$data['product']['min_price']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Closing Price :</td>
                        <td class="pl-2">{{$data['product']['closing_price']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Reach Rate :</td>
                        <td class="pl-2">{{$data['product']['reach_rate']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Status :</td>
                        <td class="pl-2 {{$data['product']['status'] == 'publish' ? 'text-green-500':'text-red-600' }}">{{$data['product']['status']}}</td>
                    </tr>
                    <tr>
                        <td class="font-black">Top Offer :</td>
                        <td class="pl-2 text-green-500">{{$data['top_offer']}}</td>
                    </tr>

                </table>
                <div class="mb-8">
                    @if($data['product']['status'] == 'publish')
                        @if(count($data['purchase_offers'])!=0)
                            <div class="border border-fuchsia-600/50 rounded w-5/12 mx-auto p-8">
                                <center><h1 class="mb-6 font-bold">Your Offer</h1></center>
                                <form action="{{url('/offer/edit/'.$data['purchase_offers'][0]['id'])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <table>
                                        <tr>
                                            <td>
                                                <label class="mr-3" for="amount">Amount</label>
                                            </td>
                                            <td>
                                                <input type="number" step="{{$data['product']['bid_amount']}}"
                                                       name="amount"
                                                       value="{{$data['purchase_offers'][0]['amount']}}"
                                                       min="{{$data['product']['min_price']}}"
                                                       class="inline-block rounded">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="mr-3" for="created_at">Created At</label>
                                            </td>
                                            <td>
                                                <input type="text" name="created_at" readonly
                                                       value="{{$data['purchase_offers'][0]['created_at']}}"
                                                       class="bg-gray-300/50 inline-block rounded">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="flex justify-end mt-4">
                                        <x-primary-button class="ms-4 h-8">
                                            {{ __('Edit') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="border border-fuchsia-600/50 rounded w-5/12 mx-auto p-8">
                                <center><h1 class="mb-6 font-bold">Add Offer</h1></center>
                                <form action="{{url('/offer/add/'.$data['id'])}}" method="POST">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>
                                                <label class="mr-3" for="amount">Amount</label>
                                            </td>
                                            <td>
                                                <input type="number" step="{{$data['product']['bid_amount']}}"
                                                       min="{{$data['product']['min_price']}}"
                                                       value="{{$data['top_offer']}}"
                                                       name="amount"
                                                       class="inline-block rounded">
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="flex justify-end mt-4">
                                        <x-primary-button class="ms-4 h-8">
                                            {{ __('Add') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>

                        @endif

                    @else
                        @if(count($data['purchase_offers'])!=0)
                            <div class="border border-fuchsia-600/50 rounded w-5/12 mx-auto p-8">
                                <center><h1 class="mb-6 font-bold">Your Offer</h1></center>
                                <table>
                                    <tr>
                                        <td>
                                            <label class="mr-3" for="amount">Amount</label>
                                        </td>
                                        <td>
                                            <input type="number" step="{{$data['product']['bid_amount']}}"
                                                   name="amount" readonly
                                                   value="{{$data['purchase_offers'][0]['amount']}}"
                                                   class="inline-block rounded">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="mr-3" for="created_at">Created At</label>
                                        </td>
                                        <td>
                                            <input type="text" name="created_at" readonly
                                                   value="{{$data['purchase_offers'][0]['created_at']}}"
                                                   class="bg-gray-300/50 inline-block rounded">
                                        </td>
                                    </tr>
                                </table>
                                </form>
                            </div>

                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
