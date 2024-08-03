@vite(['resources/css/table-auction.css'])
@extends('admin-pages.admin')

@section('body')
    <div class="py-12">
        <div id="auctions">
            <div class="bg-white mx-auto overflow-hidden shadow-sm sm:rounded-lg w-10/12">
                <section class="text-center">
                    <a href="/" class="block text-center my-5"><strong> Available Auction</strong></a>
                    <form method="GET" action="{{ route('view-users-form') }}">
                        <div class="items-center">
                            <input class="inline-block rounded-md" id="search" type="search" placeholder="Search Data..."
                                   value="{{isset($search)?$search:''}}" onchange="this.name = 'search'">
                            <input type="submit" class="text-fuchsia-500 mx-7 text-lg" value="Search">
                        </div>
                    </form>
                </section>
                <section class="table__body">
                    <table class="mx-auto w-10/12">
                        <thead>
                        <tr>
                            <th class="bg-fuchsia-500/15"> First Name</th>
                            <th class="bg-fuchsia-500/15"> Last Name</th>
                            <th class="bg-fuchsia-500/15"> Email</th>
                            <th class="bg-fuchsia-500/15"> Phone</th>
                            <th class="bg-fuchsia-500/15"> Gender</th>
                            <th class="bg-fuchsia-500/15"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td> {{$item['first_name']}}</td>
                                <td> {{$item['last_name']}}</td>
                                <td> {{$item['email']}}</td>
                                <td> {{$item['phone']}}</td>
                                <td> {{$item['is_male'] ? 'Male' : 'Female'}}</td>
                                <td>
                                    <a id="show" href="{{route('user-details',['id'=>$item['id']])}}"
                                       class="px-4 py-2 bg-fuchsia-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-fuchsia-500/50 focus:bg-fuchsia-500/50 active:bg-gray-900/50">
                                        view
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

@endsection
