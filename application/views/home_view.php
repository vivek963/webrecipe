
</br>

<div class="container">
    <h2> Latest Recipes </h2>

    <div class="row" id="recipeData">
        

    </div>


</div>
<script>

    function getRecipes() {
        let params = {
            'url': "<?php echo base_url(); ?>Recipe/getRecipes",
            'requestType': "POST"
        }
        let response = doAjax(params, function (err, res) {
            if (res.success === true) {
                let data = '';
                for (let i = 0; i < 12; i++) {
                    data += `<div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card mb-4">
                    <img height="300" class="card-img-top" src="` + res.recipeData[i].image + `" alt="` + name + `">
                    <div class="card-body">
                    <h4 class="card-title">Name</h4>
                    <h5 class=" card-title">` + res.recipeData[i].name + `</h5>
                    <h3 class="card-subtitle mb-3">Category</h4>
                    <h5 class="card-subtitle mb-3">` + res.recipeData[i].category + `</h5>
                    <h3 class="card-subtitle mb-3">Difficulty</h4>
                    <h5 class="card-subtitle mb-3">` + res.recipeData[i].difficulty + `</h5>
                    <div onclick="getRecipeData(` + res.recipeData[i].recipe_id + `)" class="btn btn-primary">Go to Recipe</div>
                </div>
            </div>
        </div>`;
                }

                var heights = $(".card-body").map(function ()
                {
                     return $(this).height();
                     }).get();

                    maxHeight = Math.max.apply(null, heights);


                $('#recipeData').html(data);
                console.log(res);

            } else {
                alert(res.message);
            }
        });
    }

    function getRecipeData(id) {
<?php if ($this->session->userdata('logged_in')) { ?>
            window.location.href = "<?php echo base_url(); ?>Home/recipepage/" + id;
<?php } else { ?>
            window.location.href = "<?php echo base_url(); ?>Home/login";
<?php } ?>
    }
    $(document).ready(function () {
        getRecipes();
    })

</script>



