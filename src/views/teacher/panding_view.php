<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100 font-sans">
    <script>
        <?php if (!empty($result["status"]) and $result["status"] == "On hold"): ?>
            Swal.fire({
                title: 'warning!',
                text: '<?php echo "you need the admin to accept you"; ?>',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600'
                }
            });
          
        <?php endif;
        ?>
    </script>
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
            <div class="space-x-6">
                <a href="/teacher/dashboard" class="text-gray-700 hover:text-blue-500">Dashboard</a>
         
                <a href="/logout" class="text-gray-700 hover:text-blue-500">Logout</a>
            </div>
        </div>
    </nav>

   <div class="flex justify-center items-center mt-20">
    <h1 class="text-xl">your account is panding go back : <a class="text-blue-500" href="/home/view">home</a></h1>
   </div>
</body>
</html>