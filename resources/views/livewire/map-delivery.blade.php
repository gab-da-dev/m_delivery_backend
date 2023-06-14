<div>
    <div id="map-container">
      <div id="map">
    </div>

    <div id="msg"></div>
    <div id="duration"></div>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->

  <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FiLWRhLWRldiIsImEiOiJjbDZma214MncwODFuM2pyeDJxa2ZpaDc0In0.rc2tDeF2hFnxJX0p67MfEg';
      const map = new mapboxgl.Map({
        units: 'kilometers',
        container: 'map', // Container ID
        style: 'mapbox://styles/mapbox/streets-v11', // Map style to use
        center: [{{$driver_position[1]}}, {{$driver_position[0]}}], // Starting position [lng, lat]
        zoom: 14 // Starting zoom level
      });

      const start = [{{$driver_position[1]}}, {{$driver_position[0]}}];
      const end = [{{$user_position[1]}}, {{$user_position[0]}}];
      
      
      // create a function to make a directions request
      async function getRoute(end) { //alert(end);
        // make a directions request using cycling profile
        // an arbitrary start will always be the same
        // only the end or destination will change
        const query = await fetch(
          `https://api.mapbox.com/directions/v5/mapbox/driving/${start[0]},${start[1]};${end[0]},${end[1]}?steps=true&geometries=geojson&access_token=pk.eyJ1IjoiZ2FiLWRhLWRldiIsImEiOiJjbDZma214MncwODFuM2pyeDJxa2ZpaDc0In0.rc2tDeF2hFnxJX0p67MfEg`,
          { method: 'GET' }
        );
        const json = await query.json();
        const data = json.routes[0];
        const route = data.geometry.coordinates;
        const geojson = {
          type: 'Feature',
          properties: {},
          geometry: {
            type: 'LineString',
            coordinates: route
          }
        };
        // if the route already exists on the map, we'll reset it using setData
        if (map.getSource('route')) {
          map.getSource('route').setData(geojson);
        }
        // otherwise, we'll make a new request
        else {
          map.addLayer({
            id: 'route',
            type: 'line',
            source: {
              type: 'geojson',
              data: geojson
            },
            layout: {
              'line-join': 'round',
              'line-cap': 'round'
            },
            paint: {
              'line-color': '#3887be',
              'line-width': 5,
              'line-opacity': 0.75
            }
          });
        }

        console.log(data);
        window.livewire.emit('addCoordinates', data);
        let distance = data.distance / 1000;
        let duration = data.duration / 60;
        document.querySelector('#msg').innerHTML = `${distance.toFixed(2)} km to destination.`;
        document.querySelector('#duration').innerHTML = `${distance.toFixed()} minutes to arrival.`;
        // add turn instructions here at the end
      }

      
      
      // Add the geocoder to the map
      // map.addControl(geocoder);

      map.on('load', () => {
        // make an initial directions request that
        // starts and ends at the same location
        getRoute(end);

        // Add starting point to the map
        map.addLayer({
          id: 'point',
          type: 'circle',
          source: {
            type: 'geojson',
            data: {
              type: 'FeatureCollection',
              features: [
                {
                  type: 'Feature',
                  properties: {},
                  geometry: {
                    type: 'Point',
                    coordinates: start
                  }
                }
              ]
            }
          },
          paint: {
            'circle-radius': 10,
            'circle-color': '#3887be'
          }
        });
        // this is where the code from the next step will go
      });

      
    

     
  </script>
</div>
</div>