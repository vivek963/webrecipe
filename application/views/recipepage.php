
<br/>
<div class="container">

    <div class="col-10">
        <?php if (array_key_exists('name', $recipeData)) { ?>
            <h2><?php echo $recipeData['name']; ?></h2>
            <img src="<?php echo $recipeData['image']; ?>" class="img-fluid" alt="<?php echo $recipeData['name']; ?>">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Prepare Time: <?php echo $recipeData['prepare_time']; ?></th>
                        <th scope="col">Cooking Time: <?php echo $recipeData['cooking_time']; ?></th>
                        <th scope="col">Calories: <?php echo $recipeData['calories']; ?></th>
                        <th scope="col">Difficulty: <?php echo $recipeData['difficulty']; ?></th>
                    </tr>
                </thead>
            </table>

            <h3>Ingredients</h3>
            <?php echo $recipeData['Ingredients']; ?>
            <br/>

            <h3>Directions</h3>
            <?php echo $recipeData['directions']; ?>
        <?php } else { ?>
            <h2><?php echo $recipeData['failure']; ?></h2>
        <?php } ?>

    </div>
</div>