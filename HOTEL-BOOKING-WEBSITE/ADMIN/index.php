<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN PANEL</title>
    <?php require("inc/links.php") ?>
    <style>
        .form-design{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="form-design border shadow text-center rounded overflow-hidden">
        <form>
            <h4 class="bg-dark h-font text-white p-3 mb-4">ADMIN LOGIN PANEL</h4>
            <div class="mb-3 text-center px-4">
                <input type="text" class="form-control shadow-none text-center" placeholder="Admin email">
            </div>
            <div class="mb-3 text-center px-4">
                <input type="password" class="form-control shadow-none mb-4 text-center"
                    placeholder="Admin Password">
            </div>
            <button type="submit" class="btn w-50 text-white custom-bg shadow-none mb-3">Login</button>
        </form>


    </div>



    <?php require('inc/scripts.php') ?>
</body>

</html>