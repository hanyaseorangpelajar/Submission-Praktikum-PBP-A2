<!--
Nama: Adri Audifirst
NIM: 24060121140152
-->
<?php
// File: show_cart.php
// Deskripsi: untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart
session_start();
$id = $_GET['id'];
if ($id == "") {
    // Jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
    // $_SESSION['cart'] merupakan array asosiatif
    // Indeksnya berisi ISBN buku yang dipilih
    // Value-nya berisi jumlah (qty) dari buku dengan ISBN tersebut
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Jika $_SESSION['cart'] dengan indeks ISBN buku yang dipilih sudah ada,
    // tambahkan value-nya dengan 1, jika belum ada, buat elemen baru dengan indeks tersebut dan set nilainya dengan 1
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

// Menampilkan isi shopping cart
include('../header.php');
?>
<br>
<div class="card">
    <div class="card-header">Shopping Cart</div>
    <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Price Qty</th>
            </tr>
            <?php
            // Include our login information
            require_once('../lib/db_login.php');
            $sum_qty = 0; // inisialisasi total item di shopping cart
            $sum_price = 0; // inisialisasi total price di shopping cart

            if (is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id => $qty) {
                    $query = "SELECT * FROM books WHERE isbn='" . $id . "'";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                    }

                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $row->isbn . '</td>';
                        echo '<td>' . $row->author . '</td>';
                        echo '<td>' . $row->title . '</td>';
                        $sum_price += ($row->price * $qty);
                        echo '<td></td><td></td><td></td><td></td><td>' . $qty . '</td><td>' . ($row->price * $qty) . '</td>';
                    }

                    $sum_qty += $qty;
                    $result->free();
                }

                $db->close();
            } else {
                echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
            }
            ?>
        </table>
        Total items = <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br /><br />
    </div>
</div>
<?php include('../footer.php'); ?>