<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="all.css" rel="stylesheet" type="text/css">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css' rel='stylesheet' />

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />

    <style>

[x-cloak] { display: none !important; }

</style>

<style>
      #map-container {
    position: relative;
    height: 250px;
    width: 100%;
}

#map {
    position: relative;
    height: inherit;
    width: inherit;
}
    </style>

</head>

<body x-cloak x-data="{ overlay: false, open: false, product: false, order: false, user: false}" id="body" class="bg-white font-family-karla flex flex-col scroll-smooth">
    
    
    <div :class="overlay ? 'z-50 absolute w-full h-full bg-black opacity-50' : ''" class="overlay" style="z-index: 5;"></div>
    <div class="w-max bg-cover bg-center bg-fixed"></div>
    
        <main class="bg-gray-100 w-full lg:w-full sm:w-full">
        <div class="flex row">
        
            <div class="w-1/4">
                @include('partials.side-nav-bar')
            </div>
            <div :class="open ? 'w-full' : 'w-full'">
                <div class="w-full px-0 sm:px-0 lg:px-0">
                    @include('partials.nav-bar')
                </div>
                <div class="p-8">
                    @yield('content')
                </div>
            </div>
        </div>
        </main>


        @livewireScripts


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script> -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <x-livewire-alert::scripts />

    <script>
            const firebaseConfig = {
                apiKey: "AIzaSyDSfpAaT359Se8iEIsR5jzVEd9fmM0sPDg",
                authDomain: "mdelivery-e98d3.firebaseapp.com",
                projectId: "mdelivery-e98d3",
                storageBucket: "mdelivery-e98d3.appspot.com",
                messagingSenderId: "713684858867",
                appId: "1:713684858867:web:14c2e3b1289e94d4a44486"
            };

            const user_id = {{auth()->user()->id}}
            
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            @if ($token == '')
            messaging
            .requestPermission()
            .then(function () {
                // alert("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                // alert("token is : " + token);
                try {
                    saveToken(token)
                    return data;
                } catch (e) {
                    return e;
                } 
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });
            @endif

            messaging.onMessage(function (payload) {
                const title = payload.notification.title;
                const options = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                alert('New alert');
                new Notification(title, options);
            });

        async function saveToken(token) {
            const config = {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            token: token,
                            user_id: user_id
                        })
                    };

                    @if(App::environment('production')) 
                        const fetchResponse = await fetch("{{url('/')}}/api/v1/fcm-token", config);
                    @else
                        const fetchResponse = await fetch(`http://localhost:81/api/v1/fcm-token`, config);
                    @endif
            const jsonData = await fetchResponse.json();
            console.log(jsonData);
        }

</script>
    
    
  
@stack('scripts')

</body>

</html>
