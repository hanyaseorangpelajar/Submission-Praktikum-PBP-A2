<!-- 
    Name: Adri Audifirst
    NIM: 24060121140152
    Date: 15 September 2023
 -->
<html>

<head>
    <title>Pemrosesan Form</title>
</head>

<body>
    <form method="GET" autocomplete="on" action="">
        <div class="form-group">
            <label for="nama">Nama: </label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" />
        </div>
        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" />Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" />Wanita
            </label>
        </div>
        <br />
        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding" />Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" />UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" />Data Science
            </label>
        </div>
        <br />
        <!-- submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">
            Submit
        </button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
    <?php
    if (isset($_GET["submit"])) {
        echo "<h3>Your Input:</h3>";
        echo 'Nama = ' . $_GET['nama'] . '<br />';
        echo 'Email = ' . $_GET['email'] . '<br />';
        echo 'Kota ' . $_GET['kota'] . '<br />';
        echo 'Jenis Kelamin = ' . $_GET['jenis_kelamin'] . '<br />';

        $minat = $_GET['minat'];
        if (!empty($minat)) {
            echo 'Peminatan yang dipilih: ';
            foreach ($minat as $minat_item) {
                echo "<br />" . "{$minat_item}";
            }
        }
    }

    ?>
</body>

</html>