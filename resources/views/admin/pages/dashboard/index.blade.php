@extends('admin.master')

@section('content')

    @include('admin.pages.dashboard.counter')


@endsection

@section('css')
    <style>
        .container {
            margin-top: 100px
        }

        .counter-box {
            display: block;
            background: #f6f6f6;
            padding: 40px 20px 37px;
            text-align: center
        }

        .counter-box p {
            margin: 5px 0 0;
            padding: 0;
            color: #909090;
            font-size: 18px;
            font-weight: 500
        }

        .counter-box i {
            font-size: 60px;
            margin: 0 0 15px;
            color: #d2d2d2
        }

        .counter {
            display: block;
            font-size: 32px;
            font-weight: 700;
            color: #666;
            line-height: 28px
        }

        .counter-box.colored {
            background: #1274cb
        }

        .counter-box.colored p,
        .counter-box.colored i,
        .counter-box.colored .counter {
            color: #fff
        }
    </style>
@endsection


@section('js')

    <script>

        $(document).ready(function() {

            $('.counter').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

        });

    </script>
@endsection


