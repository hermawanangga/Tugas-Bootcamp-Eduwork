// Data Produk

const products = [
  {
    nama: "Laptop ASUS",
    harga: 8500000,
    deskripsi: "Laptop untuk kuliah",
    gambar: "img/laptop.jpg",
    kategori: "Laptop",
  },
  {
    nama: "Laptop ASUS",
    harga: 8500000,
    deskripsi: "Laptop untuk kuliah",
    gambar: "img/laptop.jpg",
    kategori: "Laptop",
  },
  {
    nama: "Mouse Logitech",
    harga: 250000,
    deskripsi: "Mouse Wireless",
    gambar: "img/mouse.jpg",
    kategori: "Aksesoris",
  },
  {
    nama: "Keyboard",
    harga: 150000,
    deskripsi: "Keyboard Mechanical",
    gambar: "img/keyboard.jpg",
    kategori: "Aksesoris",
  },
  {
    nama: "iPhone 16",
    harga: 25000000,
    deskripsi: "Smartphone Apple",
    gambar: "img/iphone.jpg",
    kategori: "Handphone",
  },
  {
    nama: "iPhone 16",
    harga: 25000000,
    deskripsi: "Smartphone Apple",
    gambar: "img/iphone.jpg",
    kategori: "Handphone",
  },
  {
    nama: "Speaker Samba",
    harga: 250000,
    deskripsi: "Speaker Bluetooth",
    gambar: "img/speaker.jpg",
    kategori: "Audio",
  },
  {
    nama: "Speaker Samba",
    harga: 250000,
    deskripsi: "Speaker Bluetooth",
    gambar: "img/speaker.jpg",
    kategori: "Audio",
  },
  {
    nama: "NMAX 155",
    harga: 35000000,
    deskripsi: "Motor Yamaha",
    gambar: "img/yamaha.jpg",
    kategori: "Motor",
  },
  {
    nama: "NMAX 155",
    harga: 35000000,
    deskripsi: "Motor Yamaha",
    gambar: "img/yamaha.jpg",
    kategori: "Motor",
  },
];
// Ambil Element HTML

const productList = document.getElementById("product-list");
const filter = document.getElementById("filterKategori");

// Function Menampilkan Produk

function tampilkanProduk(data) {
  // Kosongkan isi product-list
  productList.innerHTML = "";

  // Loop semua data produk
  data.forEach(function (product) {
    productList.innerHTML += `
            <div class="card">
                <img src="${product.gambar}" alt="${product.nama}" width="200">
                <h2>${product.nama}</h2>
                <p>${product.deskripsi}</p>
                <h3>Rp ${product.harga.toLocaleString("id-ID")}</h3>
                <small>${product.kategori}</small>
            </div>
        `;
  });
}

// Menampilkan Semua Produk

tampilkanProduk(products);

// Event Filter

filter.addEventListener("change", function () {
  const kategori = this.value;

  if (kategori === "all") {
    tampilkanProduk(products);
  } else {
    const hasilFilter = products.filter(function (product) {
      return product.kategori === kategori;
    });

    tampilkanProduk(hasilFilter);
  }
});
