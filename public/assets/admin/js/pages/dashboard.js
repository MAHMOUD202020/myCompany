
/*
    ================================
        Revenue Monthly | Render
    ================================
*/

var options1 = {
    chart: {
        fontFamily: 'Cairo, sans-serif',
        height: 365,
        type: 'area',
        zoom: {
            enabled: false
        },
        dropShadow: {
            enabled: true,
            opacity: 0.3,
            blur: 5,
            left: -7,
            top: 22
        },
        toolbar: {
            show: false
        },
        events: {
            mounted: function(ctx, config) {
                const highest1 = ctx.getHighestValueInSeries(0);
                const highest2 = ctx.getHighestValueInSeries(1);

                ctx.addPointAnnotation({
                    x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                    y: highest1,
                    label: {
                        style: {
                            cssClass: 'd-none'
                        }
                    },
                    customSVG: {
                        SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                        cssClass: undefined,
                        offsetX: -8,
                        offsetY: 5
                    }
                })

                ctx.addPointAnnotation({
                    x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                    y: highest2,
                    label: {
                        style: {
                            cssClass: 'd-none'
                        }
                    },
                    customSVG: {
                        SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                        cssClass: undefined,
                        offsetX: -8,
                        offsetY: 5
                    }
                })
            },
        }
    },
    colors: ['#1b55e2', '#e7515a'],
    dataLabels: {
        enabled: false
    },
    markers: {
        discrete: [{
            seriesIndex: 0,
            dataPointIndex: 7,
            fillColor: '#000',
            strokeColor: '#000',
            size: 5
        }, {
            seriesIndex: 2,
            dataPointIndex: 11,
            fillColor: '#000',
            strokeColor: '#000',
            size: 4
        }]
    },
    subtitle: {
        text: 'اجمالي الزيارات',
        align: 'right',
        margin: 0,
        offsetX: -100,
        offsetY: 35,
        floating: false,
        style: {
            fontSize: '14px',
            color:  '#888ea8'
        }
    },
    title: {
        text: $('#revenueMonthly').attr('data-distTotal'),
        align: 'right',
        margin: 0,
        offsetX: -90,
        offsetY: 0,
        floating: false,
        style: {
            fontSize: '25px',
            color:  '#0e1726'
        },
    },
    stroke: {
        show: true,
        curve: 'smooth',
        width: 2,
        lineCap: 'square'
    },
    series: [{
        name: 'زياره',
        data: JSON.parse($('#revenueMonthly').attr('data-series'))
    }],
    labels: JSON.parse($('#revenueMonthly').attr('data-labels')),
    xaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            show: true
        },
        labels: {
            offsetX: 0,
            offsetY: 5,
            style: {
                fontSize: '12px',
                fontFamily: 'Cairo, sans-serif',
                cssClass: 'apexcharts-xaxis-title',
            },
        }
    },
    yaxis: {
        labels: {
            formatter: function(value, index) {
                return (value / 1000) + 'K'
            },
            offsetX: -25,
            offsetY: 0,
            style: {
                fontSize: '12px',
                fontFamily: 'Cairo, sans-serif',
                cssClass: 'apexcharts-yaxis-title',
            },
        }
    },
    grid: {
        borderColor: '#e0e6ed',
        strokeDashArray: 5,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        }
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        offsetY: -50,
        fontSize: '16px',
        fontFamily: 'Cairo, sans-serif',
        markers: {
            width: 10,
            height: 10,
            strokeWidth: 0,
            strokeColor: '#fff',
            fillColors: undefined,
            radius: 12,
            onClick: undefined,
            offsetX: 0,
            offsetY: 0
        },
        itemMargin: {
            horizontal: 0,
            vertical: 20
        }
    },
    tooltip: {
        theme: 'dark',
        marker: {
            show: true,
        },
        x: {
            show: false,
        }
    },
    fill: {
        type:"gradient",
        gradient: {
            type: "vertical",
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .28,
            opacityTo: .05,
            stops: [45, 100]
        }
    },
    responsive: [{
        breakpoint: 575,
        options: {
            legend: {
                offsetY: -30,
            },
        },
    }]
}

var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();


/*
    =================================
        Sales By Category | Render
    =================================
*/

var options = {
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#1161cb', '#05485d', '#5c1ac3', '#e2a03f', '#e7515a',],
    dataLabels: {
        enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
            width: 10,
            height: 10,
        },
        itemMargin: {
            horizontal: 0,
            vertical: 8
        }
    },
    plotOptions: {
        pie: {
            donut: {
                size: '65%',
                background: 'transparent',
                labels: {
                    show: true,
                    name: {
                        show: true,
                        fontSize: '29px',
                        fontFamily: 'Cairo, sans-serif',
                        color: undefined,
                        offsetY: -10
                    },
                    value: {
                        show: true,
                        fontSize: '26px',
                        fontFamily: 'Cairo, sans-serif',
                        color: '20',
                        offsetY: 16,
                        formatter: function (val) {
                            return val
                        }
                    },
                    total: {
                        show: true,
                        showAlways: true,
                        label: 'Total',
                        color: '#888ea8',
                        formatter: function (w) {
                            return w.globals.seriesTotals.reduce( function(a, b) {
                                return a + b
                            }, 0)
                        }
                    }
                }
            }
        }
    },
    stroke: {
        show: true,
        width: 25,
    },
    series: JSON.parse($('#chart-2').attr('data-series')),
    labels:   JSON.parse($('#chart-2').attr('data-labels')),
    responsive: [{
        breakpoint: 1599,
        options: {
            chart: {
                width: '350px',
                height: '400px'
            },
            legend: {
                position: 'bottom'
            }
        },

        breakpoint: 1439,
        options: {
            chart: {
                width: '250px',
                height: '390px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                    }
                }
            }
        },
    }]
}

var chart = new ApexCharts(
    document.querySelector("#chart-2"),
    options
);

chart.render();
