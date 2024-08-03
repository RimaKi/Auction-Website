<x-app-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-7/12 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div>
                @include('layouts.auction.product-info',['data'=>$data,'product'=>$data['product']])
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
