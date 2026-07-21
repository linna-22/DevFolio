<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Creative & Developer</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts (Plus Jakarta Sans for a sleek modern look) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/frontend.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fafafa] text-gray-900 selection:bg-indigo-500 selection:text-white">

    <!-- Navigation Header -->
   <?php include 'header.php'; ?>

    <!-- Main Dynamic Content Wrapper -->
    <div class="pt-20">
        <?php echo $frontend_content; ?>
    </div>

    <!-- Frontend Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>