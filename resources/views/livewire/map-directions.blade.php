<div>
    <div id="map-container">
      <div id="map">
    </div>

    <div id="msg"></div>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->

  <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FiLWRhLWRldiIsImEiOiJjbDZma214MncwODFuM2pyeDJxa2ZpaDc0In0.rc2tDeF2hFnxJX0p67MfEg';
      const map = new mapboxgl.Map({
        units: 'kilometers',
        container: 'map', // Container ID
        style: 'mapbox://styles/mapbox/streets-v11', // Map style to use
        center: [29.171079, -25.871937], // Starting position [lng, lat]
        zoom: 14 // Starting zoom level
      });
      map.resize();

      const start = [29.171079, -25.871937];

      // create a function to make a directions request
      async function getRoute(end) {
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
        document.querySelector('#msg').innerHTML = `${distance.toFixed(2)} km`;
        // add turn instructions here at the end
      }

      const geocoder = new MapboxGeocoder({
        // Initialize the geocoder
        accessToken: mapboxgl.accessToken, // Set the access token
        mapboxgl: mapboxgl, // Set the mapbox-gl instance
        marker: false, // Do not use the default marker style
        placeholder: 'Search for your location', // Placeholder text for the search bar
        // bbox: [-122.30937, 37.84214, -122.23715, 37.89838], // Boundary for Berkeley
        // proximity: {
        // longitude: -122.25948,
        // latitude: 37.87221
        // } // Coordinates of UC Berkeley
      });
      
      // Add the geocoder to the map
      map.addControl(geocoder);

      map.on('load', () => {
        // make an initial directions request that
        // starts and ends at the same location
        getRoute(start);

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

      map.on('click', (event) => {
      const coords = Object.keys(event.lngLat).map((key) => event.lngLat[key]);
      const end = {
        type: 'FeatureCollection',
        features: [
          {
            type: 'Feature',
            properties: {},
            geometry: {
              type: 'Point',
              coordinates: coords
            }
          }
        ]
      };
      if (map.getLayer('end')) {
        map.getSource('end').setData(end);
      } else {
        map.addLayer({
          id: 'end',
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
                    coordinates: coords
                  }
                }
              ]
            }
          },
          paint: {
            'circle-radius': 10,
            'circle-color': '#f30'
          }
        });
      }
      getRoute(coords);
    });

        map.on('result', (event) => { 
        console.log(event.result.geometry.coordinates);
        map.getSource('single-point').setData(event.result.geometry);
        
        alert('test');
        window.livewire.emit('addCoordinates', event.result.geometry.coordinates);
        });
      
        geocoder.on('result', (event) => { 
          alert('test 5');
          var address = document.querySelector('.mapboxgl-ctrl-geocoder--input').value;
        console.log(address);
        // console.log(event.result.geometry.coordinates);
        getRoute(event.result.geometry.coordinates);
        map.getSource('single-point').setData(event.result.geometry);
        window.livewire.emit('addCoordinates', event.result.geometry.coordinates);
        
        });
      
      

  </script>
</div>