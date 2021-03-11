<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        <h1>Ressources</h1>
        <table class = "table table-striped">
            <thead>
            <th scope="col"></th>
            <th scope="col">hashtag</th>
            <th scope="col">auteur</th>
            <th scope="col">description</th>
            </thead>
            <tbody>
            <?php foreach($table as $k){ ?>


            <tr>
                <th scope="row"></th>
                <td><?php echo $k['hashtag'];?></td>
                <td><?php echo $k['auteur'];?></td>
                <td><?php echo $k['description'];?></td>

            </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</body>
</html>