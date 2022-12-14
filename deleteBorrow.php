<?php
include 'variable.php';
$variant = variable();

if (isset($_GET['borrow_id'])) {

  $servername = $variant[0];
  $username = $variant[1];
  $password = $variant[2];
  $dbname = $variant[3];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM borrow WHERE borrow_id = ".$_GET['borrow_id'];
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
    echo "<script>console.log('Borrow deleted successfully')</script>";
    } else {
    echo "Error deleting borrow: " . $conn->error;
    }
    $conn->close();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/delete.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .container {
        background-color: white;
        box-shadow: 0px 5px 10px;
        border-radius: 10px;
      }
      body {
        background-image: linear-gradient(to right, red, blue, green )
      }
      .btn {
        -webkit-box-shadow: 0px 3px 0px rgba(4, 4, 4, 0.3);
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container mt-4">
  <main>
    <div class="py-5 text-center">
      <h2>Menghapus data buku pinjaman</h2>
      <p class="lead">Buku pinjaman berhasil dihapus</p>
    </div>
    <a href="readBorrow.php" class="d-flex justify-content-center btn btn-lg btn-danger my-1 mx-5" >Kembali</a>

  </main>

  <?php
    but();
  ?>

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
<?php
} else {
    echo "Invalid borrow_id!";
}
?>
</html>
