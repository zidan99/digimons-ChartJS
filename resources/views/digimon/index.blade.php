@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col">
                                    <form action="#" data-url="{{ route('digimons.show', ['']) }}">
                                        <div class="form-group mb-2">
                                            <label for="digimon_id" class="col">Data Digimon ({{ $data }} Digimons)</label>
                                            <div class="col">
                                                <select name="digimon_id" id="digimon_id" class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary mb-2 float-right" onclick="reloadChart()">Detail</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="20%">Digimon</td>
                                                <td width="5%">:</td>
                                                <td id="digimon"></td>
                                            </tr>
                                            <tr>
                                                <td>Stage</td>
                                                <td>:</td>
                                                <td id="stage"></td>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td>:</td>
                                                <td id="type"></td>
                                            </tr>
                                            <tr>
                                                <td>Attribute</td>
                                                <td>:</td>
                                                <td id="attribute"></td>
                                            </tr>
                                            <tr>
                                                <td>Memory</td>
                                                <td>:</td>
                                                <td id="memory"></td>
                                            </tr>
                                            <tr>
                                                <td>Equip Slot</td>
                                                <td>:</td>
                                                <td id="equip_slots"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <canvas id="digimon_chart" width="100" height="50%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var digimon_chart = null;
        $(document).ready(function () {
            $("#digimon_id").select2({
                placeholder: 'Select ...',
                ajax: {
                    dataType: 'json',
                    url: '{{ route("digimons.get.data") }}',
                    delay: 10,
                    data: function(params) {
                        return {
                            term: params.term,
                        }
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.text,
                                };
                            })
                        };
                    },
                }
            });

            var data = [
                0,
                0,
                0,
                0,
                0,
                0,
            ];
            // for (i=0; i<6; i++) {
            //     data[i] = getRandomInt(5, 100);
            // }

            var ctx = document.getElementById('digimon_chart').getContext('2d');
            digimon_chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Attack',
                        'Defend',
                        'Speed',
                        'HP',
                        'Intelligence',
                        'SP'
                    ],
                    datasets: [{
                        label: 'All stats shown are at Level 50',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            min: 0,
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            reloadChart();
        });

        function reloadChart() {
            let id = $("#digimon_id").val();
            $.ajax({
                url: "{{ route('digimons.show', ['']) }}/"+id,
                success: function(data) {
                    // console.log(data);
                    $('#digimon').text(data.name ?? "");
                    $('#stage').text(data.stage ?? "");
                    $('#type').text(data.type ?? "");
                    $('#attribute').text(data.attribute ?? "");
                    $('#memory').text(data.memory ?? "");
                    $('#equip_slots').text(data.equip_slots ?? "");

                    digimon_chart.data.datasets[0].data[0] = data.lv50_atk ?? 0;
                    digimon_chart.data.datasets[0].data[1] = data.lv50_def ?? 0;
                    digimon_chart.data.datasets[0].data[2] = data.lv50_spd ?? 0;
                    digimon_chart.data.datasets[0].data[3] = data.lv50_hp ?? 0;
                    digimon_chart.data.datasets[0].data[4] = data.lv50_int ?? 0;
                    digimon_chart.data.datasets[0].data[5] = data.lv50_sp ?? 0;
                    digimon_chart.update();
                }
            });
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
@endpush
