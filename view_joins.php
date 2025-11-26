<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh SQL Joins</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #333;
            margin-top: 30px;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
        }

        .section-title {
            color: #2730aeff;
        }

        p.desc {
            font-style: italic;
            color: #666;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background: #4facfe;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f8ff;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .back-btn:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <a href="index.php" class="back-btn">Kembali ke Home</a>
    <h1>Demonstrasi SQL JOIN</h1>

    <!-- 1. INNER JOIN -->
    <h2 class="section-title">1. INNER JOIN</h2>
    <p class="desc">Nampilin data penjualan sing punya data pelanggan (Cuma yang udah pernah beli).</p>
    <table>
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('koneksi.php');
            $query = "SELECT penjualan.id_penjualan, penjualan.tanggal, pelanggan.nama_pelanggan 
                      FROM penjualan 
                      INNER JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id_penjualan']}</td>
                            <td>{$row['tanggal']}</td>
                            <td>{$row['nama_pelanggan']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- 2. LEFT JOIN -->
    <h2 class="section-title">2. LEFT JOIN</h2>
    <p class="desc">Nampilin SEMUA pelanggan, termasuk yang belum ada riwayat transaksi (NULL kalo emang gak ada).</p>
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>ID Penjualan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT pelanggan.nama_pelanggan, penjualan.id_penjualan 
                      FROM pelanggan 
                      LEFT JOIN penjualan ON pelanggan.id_pelanggan = penjualan.id_pelanggan";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['id_penjualan'] ? "<span style='color:green; font-weight:bold;'>Membeli</span>" : "<span style='color:red; font-style:italic;'>Belum Membeli</span>";
                    $id_jual = $row['id_penjualan'] ? $row['id_penjualan'] : "-";
                    echo "<tr>
                            <td>{$row['nama_pelanggan']}</td>
                            <td>{$id_jual}</td>
                            <td>{$status}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- 3. RIGHT JOIN -->
    <h2 class="section-title">3. RIGHT JOIN</h2>
    <p class="desc">Nampilin SEMUA produk, dan ngeliat apakah produk tersebut udah ada di detail penjualan (Terjual).</p>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>ID Penjualan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT detail_penjualan.id_penjualan, produk.nama_produk 
                      FROM detail_penjualan 
                      RIGHT JOIN produk ON detail_penjualan.id_produk = produk.id_produk";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = $row['id_penjualan'] ? "<span style='color:green; font-weight:bold;'>Terjual</span>" : "<span style='color:orange; font-style:italic;'>Belum Terjual</span>";
                    $id_jual = $row['id_penjualan'] ? $row['id_penjualan'] : "-";
                    echo "<tr>
                            <td>{$row['nama_produk']}</td>
                            <td>{$id_jual}</td>
                            <td>{$status}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- 4. CROSS JOIN -->
    <h2 class="section-title">4. CROSS JOIN</h2>
    <p class="desc">Nampilin semua kombinasi antara pelanggan dan produk (ini tuh yang namanya Cartesian Product).</p>
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT pelanggan.nama_pelanggan, produk.nama_produk FROM pelanggan CROSS JOIN produk";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['nama_pelanggan']}</td>
                            <td>{$row['nama_produk']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2' style='text-align:center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>