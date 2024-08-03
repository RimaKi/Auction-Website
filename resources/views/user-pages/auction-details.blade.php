<?php
session_start();
?>
<div style="display: none;">{{$_SESSION['auction_id']=$data['id']}}</div>

<x-app-layout>
    @include('layouts.auction.auction-info',['path'=>'view-auction-product'])
</x-app-layout>
