INSERT INTO produk (nama_produk, jenis_produk, harga, stok) VALUES
('Laptop ASUS ROG', 'Elektronik', 15000000, 10),
('Mouse Logitech', 'Elektronik', 250000, 50),
('Keyboard Mechanical', 'Elektronik', 750000, 30),
('Monitor LG 24 inch', 'Elektronik', 2500000, 20),
('Headset Gaming', 'Elektronik', 500000, 25),
('Flashdisk 32GB', 'Elektronik', 100000, 100),
('Printer Canon', 'Elektronik', 1800000, 15),
('Webcam HD', 'Elektronik', 600000, 40),
('Buku Programming PHP', 'Buku', 125000, 60),
('Buku Database MySQL', 'Buku', 150000, 45);

INSERT INTO pelanggan (nama_pelanggan, alamat, telepon) VALUES
('Ahmad Rizki', 'Jl. Merdeka No. 10, Jakarta', '081234567890'),
('Siti Nurhaliza', 'Jl. Sudirman No. 25, Bandung', '082345678901'),
('Budi Santoso', 'Jl. Gatot Subroto No. 15, Surabaya', '083456789012'),
('Dewi Lestari', 'Jl. Ahmad Yani No. 30, Yogyakarta', '084567890123'),
('Eko Prasetyo', 'Jl. Diponegoro No. 5, Semarang', '085678901234'),
('Fitri Handayani', 'Jl. Pahlawan No. 20, Malang', '086789012345'),
('Gilang Ramadhan', 'Jl. Veteran No. 12, Solo', '087890123456'),
('Hana Pertiwi', 'Jl. Pemuda No. 8, Medan', '088901234567');

INSERT INTO penjualan (tanggal, id_pelanggan) VALUES
('2025-01-15', 1),
('2025-01-16', 2),
('2025-01-17', 3),
('2025-02-01', 1),
('2025-02-05', 4),
('2025-02-10', 5),
('2025-03-12', 2),
('2025-03-20', 6),
('2025-04-05', 7),
('2025-04-15', 3);

INSERT INTO detail_penjualan (id_penjualan, id_produk, jumlah, subtotal) VALUES
(1, 1, 1, 15000000.00),
(1, 2, 2, 500000.00),
(1, 3, 1, 750000.00),
(2, 4, 1, 2500000.00),
(2, 5, 1, 500000.00),
(3, 6, 5, 500000.00),
(3, 9, 2, 250000.00),
(4, 7, 1, 1800000.00),
(4, 8, 1, 600000.00),
(5, 2, 3, 750000.00),
(5, 3, 1, 750000.00),
(6, 10, 3, 450000.00),
(6, 9, 1, 125000.00),
(7, 1, 1, 15000000.00),
(8, 4, 2, 5000000.00),
(8, 5, 2, 1000000.00),
(9, 6, 10, 1000000.00),
(9, 8, 1, 600000.00),
(10, 7, 1, 1800000.00),
(10, 2, 1, 250000.00);
