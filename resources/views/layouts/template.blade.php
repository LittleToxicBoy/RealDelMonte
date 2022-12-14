<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argonTemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Logo_de_los_Pueblos_M%C3%A1gicos_de_M%C3%A9xico.svg/1200px-Logo_de_los_Pueblos_M%C3%A1gicos_de_M%C3%A9xico.svg.png">
    <title>
        Dashboard RealDelMonte
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('argonTemplate/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('argonTemplate/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('argonTemplate/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('argonTemplate/css/argon-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admLugares.css') }}">
    <!-- MAPA LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    @livewireStyles
</head>

<body class="g-sidenav-show dark-version bg-gray-600">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @livewire('fix.menu-lateral')


    <main class="main-content position-relative border-radius-lg ">
        @livewire('fix.nav-bar')

        {{-- @livewire('fix.cards-dashboard') --}}

        @yield('content')

        @livewire('fix.footer')
    </main>



    <!--   Core JS Files   -->
    <script src="{{ asset('argonTemplate/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('argonTemplate/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('argonTemplate/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('argonTemplate/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('argonTemplate/js/plugins/chartjs.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $('#iconNavbarSidenav').click(function() {
            console.log('aaa');
            setTimeout(() => {
                $('#sidenav-main').removeClass('bg-white');
            }, 100);
        })
    </script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        window.addEventListener('alert', function(e) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: e.detail.type,
                title: `<h5 style="color:#000000 !important;">${e.detail.message}</h5>`,
            })
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('argonTemplate/js/argon-dashboard.min.js') }}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
