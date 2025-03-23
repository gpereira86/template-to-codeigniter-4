<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File CodeIgniter 4</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,600;1,100&display=swap">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <div class="d-flex justify-content-md-center align-items-center vh-100">
            <div class="bg bg-light p-2 border border-secondary rounded">
                <h2>Upload de Arquivo</h2>
                <form action="<?php echo url_to('upload')?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="userfile" class="form-control-file">
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>