<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Resume Maker</title>
</head>
<body>
<div class="wrapper">
    <h1 class="center">Welcome to the Resume Maker</h1>
    <div class="container">
        <?php require_once __DIR__ . '/../Views/LeftSidebarView.php'; ?>
        <div class="body-container">
            <div class="body">
                <p>
                    A web application where you can create your personal resume.
                    More features will be added in the future.
                </p>
            </div>
        </div>
        <?php require_once __DIR__ . '/../Views/RightSidebarView.php'; ?>
    </div>
</div>
</body>
    <?php require_once __DIR__ . '/../Views/FooterView.php'; ?>
</html>