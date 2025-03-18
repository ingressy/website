<?php
$servername = "...";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    header("Location: https://ingressy.de");
    exit();
}

$SID = $_GET['id'];

$sql = "SELECT * FROM artikel WHERE id = $SID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe des 'name' Wertes der Zeile mit id = 1
    $row = $result->fetch_assoc();

    $NAME = $row['name'];
    $DATE = $row['date'];

    $TITEL_1_0 = $row['title_1_0'];
    $TEXT_1_0 = $row['text_1_0'];
    $TITEL_1_1 = $row['title_1_1'];
    $TEXT_1_1 = $row['text_1_1'];
    $TITEL_1_2 = $row['title_1_2'];
    $TEXT_1_2 = $row['text_1_2'];

    $TITEL_2_0 = $row['title_2_0'];
    $TEXT_2_0 = $row['text_2_0'];

    $TITEL_3_0 = $row['title_3_0'];
    $TEXT_3_0 = $row['text_3_0'];


    $getext = $NAME . $DATE . $TITEL_1_0 . $TEXT_1_0  . $TITEL_1_1 . $TEXT_1_1 . $TITEL_1_1 . $TEXT_1_1 . $TITEL_2_0 . $TEXT_2_0  . $TITEL_3_0 . $TEXT_3_0;

    $woerter = str_word_count($getext);
    $lesegeschwindigkeit = 200;
    $lesezeitMinuten = $woerter / $lesegeschwindigkeit;
    $gerundet = round($lesezeitMinuten, 2);
?>
    

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jannik Czinzoll">
    <meta name="keywords" content="Segeln, Ingressy, Elektrotechnik, Technik">
    <meta name="description" content="Artikel über <?php echo $TITEL_1_0;?> und vieles mehr findest du hier!">

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Ingressy | <?php echo $NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ingressy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Zuhause</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="segeln.php">Segeln</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="elektrotechnik.php">Eletrotechnik</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ich?
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="eigene_dienste.php">Eigene Dienste</a></li>
                        <li><a class="dropdown-item" href="ausruestung.php">Ausrüstung</a></li>
                        <li><a class="dropdown-item" href="https://console.ingressy.de">Webinterface</a></li>
                        <li><a class="dropdown-item" href="uebermich.php">Über mich</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="impressum.php">Impressum</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-dark text-white">
        <li class="breadcrumb-item"><a href="/blog.php" class="text-white">Blog</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $NAME; ?></li>
    </ol>
</nav>

<div class="row">
    <div class="col-4">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link text-white" href="#item-1"><?php echo $TITEL_1_0; ?></a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1 text-white" href="#item-1-1"><?php echo $TITEL_1_1; ?></a>
                    <a class="nav-link ms-3 my-1 text-white" href="#item-1-2"><?php echo $TITEL_1_2; ?></a>
                </nav>
                <a class="nav-link text-white" href="#item-2"><?php echo $TITEL_2_0; ?></a>
                <?php
                if (isset($TITEL_3_0)) {
                    ?>
                <a class="nav-link text-white" href="#item-3"><?php echo $TITEL_3_0; ?></a>
                    <?php
                }
                ?>
            </nav>
        </nav>
    </div>
    <div class="col-8 bg-dark text-white">
        <h3><?php echo $NAME; ?></h3>
        <p>geschrieben am: <?php echo $DATE; ?> | Lesezeit <?php echo $gerundet; ?>min</p>
        <br>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
            <div id="item-1">
                <h4><?php echo $TITEL_1_0; ?></h4>
                <p><?php echo $TEXT_1_0; ?></p>
            </div>
            <div id="item-1-1">
                <h5><?php echo $TITEL_1_1; ?></h5>
                <p><?php echo $TEXT_1_1; ?></p>
            </div>
            <div id="item-1-2">
                <h5><?php echo $TITEL_1_2; ?></h5>
                <p><?php echo $TEXT_1_2; ?></p>
            </div>
            <div id="item-2">
                <h4><?php echo $TITEL_2_0; ?></h4>
                <p><?php echo $TEXT_2_0; ?></p>
            </div>
            <?php
                if (isset($TITEL_3_0)) {
                    ?>
            <div id="item-3">
                <h4><?php echo $TITEL_3_0; ?></h4>
                <p><?php echo $TEXT_3_0; ?></p>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: '/';
        color: white; /* Weißes Slash */
    }

</style>

<?php
} else {
    echo "Keine Ergebnisse gefunden.";
}

$conn->close();
?>
