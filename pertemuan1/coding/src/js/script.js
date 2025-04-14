// script.js

// Simulasi data login admin
const adminCredentials = {
    username: "admin",
    password: "1234"
};

// Fungsi untuk menangani login
function handleLogin(event) {
    event.preventDefault();
    
    const usernameInput = document.getElementById("username").value;
    const passwordInput = document.getElementById("password").value;
    
    if (usernameInput === adminCredentials.username && passwordInput === adminCredentials.password) {
        localStorage.setItem("isAdmin", "true"); // Simpan status login
        window.location.href = "dashboard.html"; // Redirect ke dashboard
    } else {
        document.getElementById("login-error").style.display = "block";
    }
}

// Cek jika user sudah login saat membuka halaman login
if (window.location.pathname.includes("login.html")) {
    document.getElementById("login-form").addEventListener("submit", handleLogin);
}

// Fungsi logout
function logout() {
    localStorage.removeItem("isAdmin");
    window.location.href = "index.html";
}

// Cek status login admin di halaman lain
if (window.location.pathname.includes("dashboard.html")) {
    if (!localStorage.getItem("isAdmin")) {
        window.location.href = "login.html"; // Paksa kembali ke login jika belum login
    }
}

// ==========================
// Fungsi untuk Menambah, Mengedit, Menghapus, dan Mengelola Stok Menu
// ==========================
function addMenuItem(event) {
    event.preventDefault();
    
    let name = document.getElementById("menu-name").value;
    let price = parseInt(document.getElementById("menu-price").value);
    let category = document.getElementById("menu-category").value;
    let stock = parseInt(document.getElementById("menu-stock").value);
    
    if (!name || isNaN(price) || !category || isNaN(stock)) {
        alert("Mohon isi semua kolom dengan benar!");
        return;
    }
    
    let menu = JSON.parse(localStorage.getItem("menu")) || [];
    menu.push({ name: name, price: price, category: category, stock: stock });
    localStorage.setItem("menu", JSON.stringify(menu));
    alert("Menu berhasil ditambahkan!");
    loadMenu();
}

function editMenuItem(index) {
    let menu = JSON.parse(localStorage.getItem("menu")) || [];
    let item = menu[index];
    
    let newName = prompt("Edit Nama Menu:", item.name);
    let newPrice = prompt("Edit Harga Menu:", item.price);
    let newCategory = prompt("Edit Kategori Menu:", item.category);
    let newStock = prompt("Edit Stok Menu:", item.stock);
    
    if (newName && newPrice && newCategory && newStock) {
        menu[index] = { name: newName, price: parseInt(newPrice), category: newCategory, stock: parseInt(newStock) };
        localStorage.setItem("menu", JSON.stringify(menu));
        loadMenu();
    }
}

// ==========================
// Pencarian dan Filter Menu
// ==========================
function setupSearch() {
    document.getElementById("search-menu").addEventListener("input", function() {
        loadMenu(this.value);
    });
}

if (document.getElementById("search-menu")) {
    setupSearch();
    loadMenu();
}

// ==========================
// Fitur Keranjang, Checkout, dan Struk Pesanan
// ==========================
let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(index) {
    let menu = JSON.parse(localStorage.getItem("menu")) || [];
    let selectedItem = menu[index];
    if (selectedItem.stock > 0) {
        cart.push(selectedItem);
        selectedItem.stock -= 1;
        localStorage.setItem("menu", JSON.stringify(menu));
        localStorage.setItem("cart", JSON.stringify(cart));
        alert("Item ditambahkan ke keranjang!");
        loadCart();
        loadMenu();
    } else {
        alert("Stok habis!");
    }
}

function checkout() {
    if (cart.length === 0) {
        alert("Keranjang kosong!");
        return;
    }
    
    let orders = JSON.parse(localStorage.getItem("orders")) || [];
    let newOrder = { id: Date.now(), items: cart, total: cart.reduce((sum, item) => sum + item.price, 0) };
    orders.push(newOrder);
    localStorage.setItem("orders", JSON.stringify(orders));
    
    cart = [];
    localStorage.removeItem("cart");
    alert("Checkout berhasil! Struk telah dibuat.");
    generateReceipt(newOrder);
    loadCart();
}

// Fungsi untuk membuat struk pesanan
function generateReceipt(order) {
    let receiptWindow = window.open("", "_blank");
    receiptWindow.document.write(`<h2>Struk Pesanan</h2>`);
    receiptWindow.document.write(`<p>ID Pesanan: ${order.id}</p>`);
    receiptWindow.document.write(`<ul>`);
    order.items.forEach(item => {
        receiptWindow.document.write(`<li>${item.name} - Rp${item.price}</li>`);
    });
    receiptWindow.document.write(`</ul>`);
    receiptWindow.document.write(`<p>Total: Rp${order.total}</p>`);
    receiptWindow.document.write(`<button onclick="window.print()">Cetak Struk</button>`);
}

// ==========================
// Mode Tema Gelap/Terang
// ==========================
function toggleTheme() {
    let body = document.body;
    let currentTheme = body.classList.toggle("dark-theme");
    localStorage.setItem("theme", currentTheme ? "dark" : "light");
}

if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-theme");
}

document.getElementById("theme-toggle").addEventListener("click", toggleTheme);

// ==========================
// Notifikasi Pesanan Baru
// ==========================
function checkNewOrders() {
    let orders = JSON.parse(localStorage.getItem("orders")) || [];
    if (orders.length > 0) {
        document.getElementById("order-notification").style.display = "block";
    }
}

setInterval(checkNewOrders, 5000);
