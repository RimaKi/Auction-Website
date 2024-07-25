@vite(['resources/css/table-auction.css'])
<div class="py-12">
    <div id="auctions">
        <div class="bg-white mx-auto overflow-hidden shadow-sm sm:rounded-lg w-10/12">
            <section class="text-center">
                <a href="/" class="block text-center my-5"><strong> Available Auction</strong></a>
                <form method="GET" action="{{ route('dashboard') }}">
                    <div class="items-center">
                        <input class="inline-block rounded-md" id="search" type="search" placeholder="Search Data..."
                               value="{{isset($search)?$search:''}}" onchange="this.name = 'search'">
                        <div class="inline-block my-3">
                            <div class="inline-block">
                                <label class="mx-3">from</label>
                                <input type="date" class="rounded-md" value="{{isset($start_date)?$start_date:''}}"
                                       onchange="this.name = 'start_date'">
                            </div>
                            <div class="inline-block">
                                <label class="mx-3">to</label>
                                <input type="date" class="rounded-md" value="{{isset($end_date)?$end_date:''}}"
                                       onchange="this.name = 'end_date'">
                            </div>
                        </div>
                        <input type="submit" class="text-fuchsia-500 mx-7 text-lg" value="Search">
                    </div>
                </form>
            </section>
            <section class="table__body">
                <table class="mx-auto w-10/12">
                    <thead>
                    <tr>
                        <th class="bg-fuchsia-500/15"> Title</th>
                        <th class="bg-fuchsia-500/15"> Description</th>
                        <th class="bg-fuchsia-500/15"> Start Date</th>
                        <th class="bg-fuchsia-500/15"> End Date</th>
                        <th class="bg-fuchsia-500/15"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($auctions as $auction)
                        <tr>
                            <td> {{$auction['title']}}</td>
                            <td> {{ \Illuminate\Support\Str::words($auction['description'],10)}} </td>
                            <td>  {{$auction['start_date']}}</td>
                            <td>  {{$auction['end_date']}}</td>
                            <td>
                                <a id="show" href="{{url("/auction/".$auction['id'])}}"
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
