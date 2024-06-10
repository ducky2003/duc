@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- <div>
            <a href="{{route('place.create')}}" class = "btn btn-primary">Add new</a>
        </div> -->
        <div class="container" style="margin-bottom:150px">
    <h1 class="my-4">Giỏ hàng của bạn</h1>
    <div class="card m-10">
        <div class="card-header">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="card-body">
            @if($orders->isEmpty())
                <p>Giỏ hàng của bạn hiện đang trống.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Đơn Hàng</th>
                            <th>Ngày Đặt</th>
                            <th>Ghi Chú</th>
                            <th>Tour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id_order }}</td>
                                <td>{{ $order->date_order }}</td>
                                <td>{{ $order->note }}</td>
                                <td>{{ $order->tour->pack_title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
    </div>
    
@endsection