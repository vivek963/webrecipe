<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Nutrition Fact</h1>

        </div>
        <hr>
        <div class="col-12">
            <p class="lead">Enter a query like " 1 cup mashed potatoes and 2 tbsp gravy " to see how it works. We support tens of thousands of foods, including international dishes.</p>

            <div class="md-form">
                <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea>
            </div>
            </br>
            <div class="text-center text-md-left">
                <a class="btn btn-primary" id="calulate">Calculate Foods</a>
            </div>
            </br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Images</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Food</th>
                        <th scope="col">Calories</th>
                        <th scope="col">Protein</th>
                        <th scope="col">Sugar</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Food Group</th>
                    </tr>
                </thead>
                <tbody id="table_data">
<!--                    <tr>
                        <th scope="row"><a href="https://nix-tag-images.s3.amazonaws.com/775_highres.jpg"></a></th>
                        <td>3</td>
                        <td>large</td>
                        <td>eggs</td>
                        <td>214.5 kcal</td>
                        <td>37g</td>
                        <td>620mg</td>
                        <td>150g</td>
                        <td>Dairy</td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="https://nix-tag-images.s3.amazonaws.com/775_highres.jpg"></a></th>
                        <td>3</td>
                        <td>large</td>
                        <td>eggs</td>
                        <td>214.5 kcal</td>
                        <td>37g</td>
                        <td>620mg</td>
                        <td>150g</td>
                        <td>Dairy</td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="https://nix-tag-images.s3.amazonaws.com/775_highres.jpg"></a></th>
                        <td>3</td>
                        <td>large</td>
                        <td>eggs</td>
                        <td>214.5 kcal</td>
                        <td>37g</td>
                        <td>620mg</td>
                        <td>150g</td>
                        <td>Dairy</td>
                    </tr>-->
                </tbody>
            </table>

        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.js"  type="text/javascript"></script>

<script>
    $(document).on('click', '#calulate', function (e) {
        e.preventDefault();
        let message = $('#message').val();
        if (message == '') {
            alert('Please enter valid message');
            return false;
        } else {
            let data_array = {};
            data_array['message'] = message;
            let params = {
                'url': "<?php echo base_url(); ?>" + 'nutrition/calulateFood',
                'requestType': "POST",
                'data': data_array
            }
            let response = doAjax(params, function (err, res) {
//                if (res.foods != '') {
                if ("foods" in res) {
                    let data = '';

                    let food_group = "";
                    for (let i = 0; i < res.foods.length; i++) {
                        switch (res.foods[i].tags['food_group']) {
                            case 1:
                                food_group = 'Dairy';
                                break;
                            case 2:
                                food_group = 'Protein';
                                break;
                            case 3:
                                food_group = 'Fruit';
                                break;
                            case 4:
                                food_group = 'Vegetable';
                                break;
                            case 5:
                                food_group = 'Grain';
                                break;
                            case 6:
                                food_group = 'Fat';
                                break;
                            case 7:
                                food_group = 'Legume';
                                break;
                            case 8:
                                food_group = 'Combination(multiple food groups, not discernable)';
                                break;
                            case 9:
                                food_group = '';
                                break;
                        }
                        
                        data += `<tr>
                        <th scope="row"><image width="50" src="` + res.foods[i].photo['highres'] + `"></image></th>
                        <td>` + res.foods[i].serving_qty + `</td>
                        <td>` + res.foods[i].serving_unit + `</td>
                        <td>` + res.foods[i].food_name + `</td>
                        <td>` + res.foods[i].nf_calories + ` kcal</td>
                        <td>` + Math.round(res.foods[i].full_nutrients[0]['value'] * 100) / 100 + ` g</td>
                        <td>` + Math.round(res.foods[i].full_nutrients[10]['value'] * 100) / 100 + ` g</td>
                        <td>` + res.foods[i].serving_weight_grams + ` g</td>
                        <td>` + food_group + `</td>
                    </tr>`;
                    }
                    $('#table_data').html(data);
                } else {
                    alert(res.message);
                }
            })
        }
    });
</script>