@extends('layouts.app')

@section('page-title')
    <h1 class="page-title"> لوحة التحكم
        <small> تعديل اعدادت الموقع </small>
    </h1>
@endsection

@section('content')


    {{--
            `name`, `email`, `phone`, `password`, `api_token`, `role`, `status`, `city`, `address`, `verify`
    --}}
    <div class="row">
        <div class="col-md-6" style="margin-right: 200px">

            <div class="portlet-body">
                <div class="caption">
                    <i class="icon-bar-chart font-green-haze"></i>
                    <span class="caption-subject bold uppercase font-green-haze"> تقرير عن كمية المبيعات خلال السنة  </span>
                </div>
                <div id="sells" class="chart" style="height: 500px; width:750px"> </div>
            </div>

        </div>

        <div class="col-md-6" style="margin-right: 200px">
            <div class="portlet-body">
                <div class="caption">
                    <i class="icon-bar-chart font-green-haze"></i>
                    <span class="caption-subject bold uppercase font-green-haze"> تقرير عن الايرادات خلال السنة  </span>

                    <div id="chart_5" class="chart" style="height: 400px;"> </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        //  sells amount


        var ChartsAmcharts = function() {

            var initChartSample1 = function() {
                var chart = AmCharts.makeChart("sells", {
                    "type": "serial",
                    "theme": "light",
                    "pathToImages": App.getGlobalPluginsPath() + "amcharts/amcharts/images/",
                    "autoMargins": false,
                    "marginLeft": 30,
                    "marginRight": 8,
                    "marginTop": 10,
                    "marginBottom": 26,

                    "fontFamily": 'Open Sans',
                    "color":    '#888',

                    "dataProvider": [
                       @foreach($orderpermonth as $key => $value)
                        {
                        "year":'{{monthName($key)}}',
                        "income": {{$value}},
                        "expenses": {{$value}},
                         },
                        @endforeach


                    ],
                    "valueAxes": [{
                        "axisAlpha": 0,
                        "position": "left"
                    }],
                    "startDuration": 1,
                    "graphs": [{
                        "alphaField": "alpha",
                        "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                        "dashLengthField": "dashLengthColumn",
                        "fillAlphas": 1,
                        "title": "Income",
                        "type": "column",
                        "valueField": "income"
                    }, {
                        "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                        "bullet": "round",
                        "dashLengthField": "dashLengthLine",
                        "lineThickness": 3,
                        "bulletSize": 7,
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "useLineColorForBulletBorder": true,
                        "bulletBorderThickness": 3,
                        "fillAlphas": 0,
                        "lineAlpha": 1,
                        "title": "Expenses",
                        "valueField": "expenses"
                    }],
                    "categoryField": "year",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha": 0,
                        "tickLength": 0
                    }
                });

                $('#chart_1').closest('.portlet').find('.fullscreen').click(function() {
                    chart.invalidateSize();
                });
            }

            var initChartSample5 = function() {
                var chart = AmCharts.makeChart("chart_5", {
                    "theme": "light",
                    "type": "serial",
                    "startDuration": 2,

                    "fontFamily": 'Open Sans',

                    "color":    '#888',

                    "dataProvider": [
                        @foreach($income as $key => $value)
                        {
                        "country": "{{monthName($key)}}",
                        "visits": {{$value}},
                        "color": "#FF0F00"
                    },
                        @endforeach

                    ],
                    "valueAxes": [{
                        "position": "left",
                        "axisAlpha": 0,
                        "gridAlpha": 0
                    }],
                    "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "colorField": "color",
                        "fillAlphas": 0.85,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "topRadius": 1,
                        "valueField": "visits"
                    }],
                    "depth3D": 40,
                    "angle": 30,
                    "chartCursor": {
                        "categoryBalloonEnabled": false,
                        "cursorAlpha": 0,
                        "zoomable": false
                    },
                    "categoryField": "country",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha": 0,
                        "gridAlpha": 0

                    },
                    "exportConfig": {
                        "menuTop": "20px",
                        "menuRight": "20px",
                        "menuItems": [{
                            "icon": '/lib/3/images/export.png',
                            "format": 'png'
                        }]
                    }
                }, 0);

                jQuery('.chart_5_chart_input').off().on('input change', function() {
                    var property = jQuery(this).data('property');
                    var target = chart;
                    chart.startDuration = 0;

                    if (property == 'topRadius') {
                        target = chart.graphs[0];
                    }

                    target[property] = this.value;
                    chart.validateNow();
                });

                $('#chart_5').closest('.portlet').find('.fullscreen').click(function() {
                    chart.invalidateSize();
                });
            }
            return {
                //main function to initiate the module

                init: function() {

                    initChartSample1();
                    initChartSample5();

                }

            };

        }();

        jQuery(document).ready(function() {
            ChartsAmcharts.init();
        });

    </script>

@endsection
