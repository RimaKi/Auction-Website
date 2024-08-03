@extends('admin-pages.admin')

@section('body')

    @include('layouts.auction.auction-info',['path'=>'product-info-admin','data'=>$data,'product'=>$data['product']])

@endsection
