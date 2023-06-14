<div class="">
    <h1 class="text-xl text-black pb-6 ">Dashboard</h1>

    <div class="flex pt-4 mb-4 overflow-x-auto">
            <div
                class="border-l-2 shadow-xl border-yellow-600 br-4 w-64 h-24 p-8 flex items-center rounded-lg text-gray-600 mr-4 mb-2 ml-2">
                <div class="text-yellow-600 p-4 w-full">
                    Today <br>
                    {{$order_count}}
                </div>
                <div class="flex justify-center  w-36">
                    <div class="text-yellow-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-receipt" viewBox="0 0 16 16">
                            <path
                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>

                </div>

            </div>
            <div
                class="border-l-2 shadow-xl border-green-600 br-4 w-64 h-24 p-8 flex items-center rounded-lg text-gray-600 mr-4 mb-2">
                <div class="text-green-600 p-4 w-full">
                    Total deliveries <br>
                    {{$delivery_count}}
                </div>
                <div class="flex justify-center  w-36">
                    <div class="text-green-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path
                                d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                        </svg>
                    </div>

                </div>
            </div>
            <div
                class="border-l-2 shadow-xl border-blue-600 br-4 w-64 h-24 p-8 flex items-center rounded-lg text-gray-600 mr-4 mb-2">
                <div class="text-blue-600 p-4 w-full">
                    Last week<br>
                    R {{$total_amount}}
                </div>
                <div class="flex justify-center  w-36">
                    <div class="text-blue-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-pin-fill" viewBox="0 0 16 16">
                            <path
                                d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z" />
                        </svg>
                    </div>

                </div>
            </div>
            <div
                class="border-l-2 shadow-xl border-yellow-600 br-4 w-64 h-24 p-8 flex items-center rounded-lg text-gray-600 mr-4 mb-2">
                <div class="text-yellow-600 p-4 w-full">
                    Total users <br>
                    {{$clients}}
                </div>
                <div class="flex justify-center  w-36">
                    <div class="text-yellow-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-receipt" viewBox="0 0 16 16">
                            <path
                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>

                </div>

            </div>
            <div
                class="border-l-2 shadow-xl border-green-600 br-4 w-64 h-24 p-8 flex items-center rounded-lg text-gray-600 mr-4 mb-2">
                <div class="text-green-600 p-4 w-full">
                    Total Products <br>
                    {{$productCount}}
                </div>
                <div class="flex justify-center  w-36">
                    <div class="text-green-600 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path
                                d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                        </svg>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-row lg:w-1/2 w-full">
        <input wire:model="start_date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date" id="start_date"
            name="start_date">
        <span class="mx-2 mt-2">to</span>
        <input wire:model="end_date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date" id="end_date"
            name="end_date">
            <button wire:click="$emit('filter')" class="px-4 py-2 ml-4 text-white font-light tracking-wider bg-gray-900 rounded">Filter</button>

    </div>

    <div class="flex flex-row lg:flex-row mt-6 justify-between overflow-x-auto" wire:ignore>
        <div class="flex flex-col w-full lg:w-1/2 pr-0 lg:pr-2 mr-4">
            <p class="text-xl pb-3 flex items-center">
            <i class="bi bi-card-checklist mr-3"></i> Orders
            </p>
            <div class="p-6 bg-white" style="">
                <canvas id="chartOne" width="" height="200"></canvas>
            </div>
        </div>

        <div class="flex flex-row w-full lg:w-1/2 pl-0 lg:pl-2 lg:mt-0">
        <div class="flex flex-col w-full lg:w-1/2 pr-0 lg:pr-2 mr-4">
            <p class="text-xl pb-3 flex items-center">
            <i class="bi bi-card-checklist mr-3"></i> Orders
            </p>
            <div class="p-6 bg-white" style="">
                <canvas id="chartTwo" width="" height="400"></canvas>
            </div>
        </div>
        </div>
    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var chartOne = document.getElementById('chartOne');
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nameArray); ?> ,
            datasets : [{
                label: '# of Orders',
                data: <?php echo json_encode($countArray); ?> ,
                backgroundColor : [
                    '#ADD8E6',
                    '#F08080',
                    '#E0FFFF',
                    '#D3D3D3',
                    '#20B2AA',
                    '#B0C4DE',
                    '##FAF0E6',
                    '##48D1CC',
                    '#C71585',
                    '#F5FFFA',
                    '#AFEEEE',
                    '#DA70D6',
                    '#FFEFD5',
                    '#B0E0E6',
                    '#FFFAFA',
                    '#9ACD32',
                ],
                borderColor: [
                    '#ADD8E6',
                    '#F08080',
                    '#E0FFFF',
                    '#D3D3D3',
                    '#20B2AA',
                    '#B0C4DE',
                    '##FAF0E6',
                    '##48D1CC',
                    '#C71585',
                    '#F5FFFA',
                    '#AFEEEE',
                    '#DA70D6',
                    '#FFEFD5',
                    '#B0E0E6',
                    '#FFFAFA',
                    '#9ACD32',
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            scale: {
                ticks: {
                precision: 0
                }
            },
            xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }   
        }]
        }
    });

    window.addEventListener('updateChart', event => {
        myChart.data.datasets[0].data = event.detail.count;
        myChart.update()
    })

    var chartTwo = document.getElementById('chartTwo');
    var myPieChart = new Chart(chartTwo, {
        type: 'pie',
        responsive: true,
        maintainAspectRatio: false,
        data: {
            labels: ['Collections', 'Deliveries'],
            datasets: [{
                label: '',
                data: <?php echo json_encode($orderTypeArray); ?>,
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
        
    });

    window.addEventListener('updateChart', event => {
        myPieChart.data.datasets[0].data = event.detail.order_type;
        myPieChart.update();
    })

</script>
</div>