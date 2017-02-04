@extends('Admin.site')



@section('content')
    @include('admin.partial.breadcrumbTrail')
    <div class="h-content">


        <table class="ui primary striped selectable table hotel-table " id="orderTable" style="margin:0 auto">

            <thead>
            <tr>
                <th>酒店图片</th>
                <th>酒店名称</th>
                <th>酒店地址</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($manageHotelList as $hotelitem)
                <tr>
                    {{--<td class="s-td"><input type="checkbox" value="{{$hotelitem->id}}"></td>--}}
                    <td class="m-td"> <img class="hotel-img" src = '../GbhMobile/img/tu2.png'></td>
                    <td class="m-td">{{$hotelitem->name}}</td>
                    <td><i class="icon marker large"></i><span>{{$hotelitem->addressInfo}}</span></td>
                    <td class="l-td">

                        <div class="header-option f-left">
                            <a href="/admin/manageRoomPrice/show/{{$hotelitem->id}}">
                                <img src = '/Admin/img/编辑.png'/>
                                <span class="edit">管理房价</span>
                            </a>

                            <a href="/admin/manageRoomPrice/processRoomPriceRequest/{{$hotelitem->id}}">
                                <img src = '/Admin/img/编辑.png'/>
                                <span class="edit">管理房价申请</span>
                            </a>

                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){


        })
    </script>
@stop