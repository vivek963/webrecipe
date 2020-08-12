<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Restaurants</h1>

        </div>
        <hr>
        <div class="col-12">
            <p class="lead">Famous Restaurants in Dublin</p>
        </div>
    </div>


    <div class="row" id="restaurantsFood">
        <!--        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        
                    <div class="card mb-4">
                        <img class="card-img-top" src="" alt="card image cap">
                        <div class="card-body">
        
                            <h2 class="h4 card-title">Name</h2>
                            <p class="card-text"></p>
                            <h3 class="h5 card-subtitle mb-3">Rating 4.5/5 (Reviews)</h3>
                            <h3 class="h5 card-subtitle mb-3">Address:</h3>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">More info</a>
        
                        </div>
                    </div>
                </div>-->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/common.js"  type="text/javascript"></script>

    <script>
        getRestaurant();
        function getRestaurant() {
            let url = "<?php echo base_url(); ?>" + 'Restaurants/restaurantsFood';
            $.ajax({
                url: url,
                crossDomain: true,
                type: 'GET',
                dataType: 'json',
                success: function (res) {
                    if (res.responseCode == 'OK') {
                        let data = '';
                        let image_ref = '';
                        let image = '';
                        let status = 'NA';
                        let status_val = '';
                        for (let i = 0; i < res.data.results.length; i++) {
                            image_ref = res.data.results[i].photos[0].photo_reference;
                            image = 'https://maps.googleapis.com/maps/api/place/photo?&key=AIzaSyAHeTasNwmuENWkUYfkQAhi9-YHTlQwiXA&maxheight=700&maxwidth=700&photoreference=' + image_ref;
                            if ("opening_hours" in res.data.results[i]) {
                                status = res.data.results[i].opening_hours['open_now'];
                                if (status == true) {
                                    status_val = "OPEN";
                                } else {
                                    status_val = "CLOSED";
                                }
                            }

                            data += `<div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="card mb-4">
            <img class="card-img-top" height="300" src="` + image + `" alt="card image cap">
            <div class="card-body">
                <p class="h4 card-title">` + res.data.results[i].name + `</p>
        
                <h3 class="h5 card-subtitle mb-3">User's Rating: ` <p>+ res.data.results[i].rating + </p>`/5</h3>
                <h3 class="h5 card-subtitle mb-3">Address: `<p> + res.data.results[i].vicinity + </p>`</h3>
                <h3 class="h5 card-subtitle mb-3">Status: ` <p> + status_val + </p> `</h3>

            </div>
        </div>
    </div>`;
                        }
                        $('#restaurantsFood').html(data);
                    } else {
                        alert(res.message);
                    }
                }
            });
        }
    </script>





