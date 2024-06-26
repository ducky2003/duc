@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- <div>
            <a href="{{route('place.create')}}" class = "btn btn-primary">Add new</a>
        </div> -->
        <div class="container" style="margin-bottom:150px">
    <div class="card m-10">
        <div class="card-header">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="card-body">
            @if($order->isEmpty())
                <p>Giỏ hàng của bạn hiện đang trống.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Đơn Hàng</th>
                            <th>Ngày Đặt</th>
                            <th>Ghi Chú</th>
                            <th>Tour</th>
                            <th>Status</th>
                            <th>Customer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $o)
                            <tr>
                                <td>{{ $o->id_order }}</td>
                                <td>{{ $o->date_order }}</td>
                                <td>{{ $o->note }}</td>
                                <td>{{ $o->tour->pack_title }}</td>
                                <td>
                                    @if ($o->state == 0)
                                        <span class="text-danger">Đang chờ</span>
                                    @else
                                        <span class="text-success">Đã xử lý</span>
                                    @endif
                                </td>
                                <td>{{ $o->user->name }}</td>
                                <td>
                                <a href="{{route('order.edit', $o->id_order)}}" class = "btn btn-primary btn-sm">Edit State</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div>
            {{$order->links('pagination::bootstrap-5')}}
        </div>
        </div>
    </div>
</div>
    </div>
    
@endsection