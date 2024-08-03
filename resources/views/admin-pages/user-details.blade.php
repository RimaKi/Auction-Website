@extends('admin-pages.admin')

@section('body')

    <div class="py-12 max-80 ">
        <div id="auctions">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-11/12 mx-auto">
                <div class="flex">

                        <div class="w-1/4 ml-14 my-auto inline-block">
                            @if($data['media'] != null)
                            <img src="{{asset('/storage/'.$data['media']['path'])}}"
                                 class="w-5/6 ">
                            @endif

                        </div>
                    <div class="inline-block">
                        <div>
                            <a href="{{redirect()->back()}}">
                                <table class="mx-auto my-11 table-auto">
                                    <tr>
                                        <td class="font-black">First Name :</td>
                                        <td class="pl-2">{{$data['first_name']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black w-28">First Name :</td>
                                        <td class="pl-2">{{$data['last_name']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black">Email :</td>
                                        <td class="pl-2">{{$data['email']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black">Phone :</td>
                                        <td class="pl-2">{{$data['phone']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-black">Gender :</td>
                                        <td class="pl-2">{{$data['is_male'] ? 'Male' : 'Female'}}</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                    </div>
                </div>
                <div>


                </div>
                <div>
                    <center class="mt-9 ">
                        <hr class="my-8">
                        @foreach($data['products'] as $item)
                            <div class="flex mx-auto">
                                <div class="w-[350px] h-[460px] mb-6 mx-8 border border-fuchsia-500 rounded-lg mx-auto ">
                                    <img src="{{asset('/storage/'.$item['media'][0]['path'])}}"
                                         alt="{{$item['name']}}"
                                         class="mx-auto my-4 w-40 h-44">
                                    <table class="mx-4">
                                        <tr>
                                            <td class="font-black w-28">Name :</td>
                                            <td>{{$item['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-black w-28">Description :</td>
                                            <td>{{\Illuminate\Support\Str::words($item['description'],5)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-black w-28">Status :</td>
                                            <td class="rounded-lg  {{$item['status'] == 'publish' ? 'text-green-500' :($item['status']=='pending'?'text-fuchsia-600':'text-red-500') }}">{{$item['status'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-black w-28">Type :</td>
                                            <td>{{$item['type']['name']}}</td>
                                        </tr>

                                    </table>
                                    <center class="my-6">
                                        <a href="{{route('product-details',['id'=>$item['id']])}}"
                                           class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50">
                                            SHOW MORE
                                        </a>
                                    </center>
                                </div
                        @endforeach

                    </center>
                </div>
            </div>
        </div>
    </div>

@endsection
