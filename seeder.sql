-- Insert Data Produk
INSERT INTO produk (nama_produk, jenis_produk, harga, stok) VALUES 
('Laptop Asus ROG', 'Elektronik', 15000000, 10),
('Mouse Logitech', 'Aksesoris', 150000, 50),
('Keyboard Mechanical', 'Aksesoris', 500000, 30),
('Monitor Samsung 24"', 'Elektronik', 2000000, 15),
('Printer Epson', 'Elektronik', 2500000, 5),
('Headset Gaming', 'Aksesoris', 300000, 20);

-- Insert Data Pelanggan
INSERT INTO pelanggan (nama_pelanggan, alamat, telepon) VALUES 
('Andi Saputra', 'Jl. Merdeka No. 1', '081234567890'),
('Budi Santoso', 'Jl. Sudirman No. 45', '081298765432'),
('Citra Lestari', 'Jl. Diponegoro No. 10', '081345678901'),
('Dewi Anggraini', 'Jl. Pahlawan No. 5', '081398765432'),
('Eko Prasetyo', 'Jl. Ahmad Yani No. 8', '081456789012');

-- Insert Data Penjualan (Hanya Andi, Budi, dan Citra yang beli. Dewi dan Eko tidak)
INSERT INTO penjualan (tanggal, id_pelanggan) VALUES 
('2023-10-01', 1), -- Andi
('2023-10-02', 2), -- Budi
('2023-10-03', 1), -- Andi lagi
('2023-10-05', 3); -- Citra

-- Insert Data Detail Penjualan (Produk: Laptop, Mouse, Keyboard, Monitor terjual. Printer dan Headset belum)
-- Asumsi ID auto increment mulai dari 1 setelah tabel dikosongkan/dibuat ulang
INSERT INTO detail_penjualan (id_penjualan, id_produk, jumlah, subtotal) VALUES 
(1, 1, 1, 15000000), -- Andi beli Laptop
(1, 2, 1, 150000),   -- Andi beli Mouse
(2, 3, 2, 1000000),  -- Budi beli 2 Keyboard
(3, 2, 1, 150000),   -- Andi beli Mouse lagi
(4, 4, 1, 2000000);  -- Citra beli Monitor
