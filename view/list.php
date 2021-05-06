<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php foreach ($formDataList as $formData) { ?>
    <div class="jumbotron">
        <h1><?php echo $formData->getTitle(); ?></h1>
        <p class="lead"><?php echo $formData->getDescription(); ?></p>
        <p class="lead"><?php echo $formData->getAuthor(); ?></p>
    </div>
    <?php } ?>
</div>
</body>
</html>