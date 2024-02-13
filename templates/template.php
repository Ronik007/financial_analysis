<!doctype html>
<html lang="en">

<head>
    <title>
        <?php echo isset($page_title) ? $page_title : 'Financial Analysis' ?>
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href='Asset/CSS/style.css' >
</head>

<body>
    <header>
        <?php include 'includes/header.php'; ?>
    </header>
    <main>
        <aside>
            <!-- Siderbar -->
            <?php include 'includes/siderbar.php'; ?>
        </aside>
        <div class="main-content">
            <?php include(isset($page_content) ? $page_content : 'views/dashboard_content.php') ?>
        </div>
    </main>
    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>