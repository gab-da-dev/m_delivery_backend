<div>
    <input type="text" name="" id="search">
    <div id="details"></div>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->

    <script>
        let autocomplete;
        // Initialize and add the map
        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById("search"), {
                    // bounds: defaultBounds,
                    componentRestrictions: {
                        country: "ZA"
                    },
                    fields: ["address_components", "geometry", "icon", "name"],
                    strictBounds: false,
                    types: ["street_address"],
                }
            )
          
            autocomplete.addListener('place_changed', onPlaceChanged)
        }

        function onPlaceChanged(){
          var place = autocomplete.getPlace();

          if(!place.geometry){
            document.getElementById('autocomplete').placeholder = 'Enter valid place';
          }else{
            document.getElementById('details').innerHTML = place.name;
            console.log(place);
            window.livewire.emit('setStoreLocation', place);
          }
        }
    </script>




    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 300px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

    </style>
</div>
