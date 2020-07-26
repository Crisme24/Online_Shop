<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_tag'];?></title>
</head>
<body>
    <?php dep($data); ?>
    <section id= "<?php echo $data['page_id']; ?>">
        <?php echo $data['page_title'];?>
        <?php echo $data['page_content'];?>
    </section>

    <?php echo "Password ".passGenerator(); ?>
    <br>
    <?php echo "Token ".token(); ?>
    <br>
    <?php echo "Cantidad ".formatMoney(67546)." ".SMONEY; ?>
</body>
</html>
