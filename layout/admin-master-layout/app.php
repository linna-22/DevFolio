<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevFolio Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-900">
    <div class="min-h-screen flex flex-col">
        <?php include 'header.php'; ?>
        
        <div class="flex flex-1">
            <?php include 'sidebar.php'; ?>
            
            <main class="flex-1 p-6 ">
                <?php echo $content; ?>
            </main>
        </div>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>