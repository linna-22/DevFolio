<?php
require_once "../config/app.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevFolio Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/DEVFOLIO/assets/images/dev-folio-round-logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans text-gray-900">
    <div class="min-h-screen flex flex-col">
        <?php require_once "../config/app.php"; ?>
        <?php include 'header.php'; ?>

        <div class="flex flex-1">

            <?php include 'sidebar.php'; ?>

            <main class="flex-1 p-6 ">
                <?php echo $content; ?>
            </main>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= BASE_URL ?>/assets/js/user.js"></script>
</body>

</html>