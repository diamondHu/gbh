@extends('Gbh.site')

@section('resources')
@stop



@section('content')

    <title>团队介绍</title>
    <div >

        @include('partial.homeNav')

        <div class="ui container">

            <div class="about-menu-nav " >

                <a href="/aboutUs" class="dark-anchor"><span>关于我们</span></a>
                <a href="/team" class="dark-anchor"><span>团队介绍</span></a>
                <a href="/history"  class="dark-anchor"><span>团队经历</span></a>
                <a href="/joinUs"  class="dark-anchor"><span>加入我们</span></a>
                <a href="/contactUs"  class="dark-anchor"><span>联系我们</span></a>

            </div>

            <div class="team-member">

                <div class="mem-left" >
                    <img src = 'Gbh/img/w-right.png'  data-title="jacky 王" data-content="2016年1月加入联盟,毕业于悉尼大学，现在在联盟担任技术合伙人一职位" >
                </div>

                <div class="mem-middle">
                    <img src = 'Gbh/img/w-middle.png'>
                </div>

                <div class="mem-right">
                    <img src = 'Gbh/img/w-left.png'>
                </div>

            </div>



        </div>


    </div>
@stop


@section('script')

    <script type="text/javascript">

        $(document).ready(function(){
            $('.mem-left').hover(function(){
                        $(this).find('img').transition('tada').attr('src','Gbh/img/w-middle.png');

                    },
                    function(){
                        $(this).find('img').attr('src','Gbh/img/w-right.png');
                    })

            $('.mem-right').hover(function(){
                        $(this).find('img').transition('tada').attr('src','Gbh/img/w-middle.png');

                    },
                    function(){
                        $(this).find('img').attr('src','Gbh/img/w-left.png');
                    })

            $('.mem-left').find('img')
                    .popup({

                        position : 'right center'

                    })
            ;
        })
    </script>

@stop