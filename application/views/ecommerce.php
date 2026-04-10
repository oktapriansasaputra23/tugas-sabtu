<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TokoKeren — E‑Commerce Template</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root{--brand:#0069ff;--soft:#f7f9ff}
    body{background:linear-gradient(180deg,#ffffff 0%,var(--soft) 100%)}
    .navbar-brand{font-weight:700;letter-spacing:0.4px}
    .product-card{transition:transform .18s ease,box-shadow .18s}
    .product-card:hover{transform:translateY(-6px);box-shadow:0 12px 30px rgba(16,24,40,.08)}
    .badge-discount{position:absolute;left:12px;top:12px;background:linear-gradient(90deg,#ff7a18,#ff4e50);color:#fff;padding:.25rem .45rem;border-radius:.45rem;font-size:.8rem}
    .card-img-top{height:200px;object-fit:cover}
    .offcanvas-cart{width:420px;max-width:100%}
    .filter-chip{cursor:pointer}
    .hero{background:linear-gradient(90deg,rgba(0,105,255,.08),rgba(0,105,255,.02));border-radius:14px}
    footer{background:#0b1321;color:#fff}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:40px;height:40px;font-weight:700">TK</span>
      <span>TokoKeren</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <form class="mx-auto d-flex w-50">
        <input class="form-control me-2" type="search" placeholder="Cari produk, mis. sepatu" aria-label="Search" id="searchInput">
        <button class="btn btn-outline-secondary" type="button" id="btnSearch"><i class="fa fa-search"></i></button>
      </form>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
          <a class="nav-link" href="#">Kategori</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#">Promo</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link position-relative" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
            <i class="fa fa-shopping-cart fa-lg"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary" href="#">Masuk / Daftar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section class="container py-4">
  <div class="row align-items-center hero p-4">
    <div class="col-md-6">
      <h1 class="display-6 fw-bold">Belanja Online Lebih Mudah</h1>
      <p class="lead text-muted">Pilihan produk terkurasi, pengiriman cepat, dan harga menarik. Temukan produk favoritmu sekarang juga.</p>
      <div class="d-flex gap-2">
        <a href="#products" class="btn btn-primary btn-lg">Belanja Sekarang</a>
        <a href="#" class="btn btn-outline-secondary btn-lg">Lihat Promo</a>
      </div>
      <div class="mt-3">
        <small class="text-muted">Top categories:</small>
        <div class="mt-2">
          <span class="badge bg-light text-dark filter-chip me-1">Sepatu</span>
          <span class="badge bg-light text-dark filter-chip me-1">Jaket</span>
          <span class="badge bg-light text-dark filter-chip me-1">Aksesoris</span>
          <span class="badge bg-light text-dark filter-chip me-1">Elektronik</span>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-center d-none d-md-block">
      <img src="https://images.unsplash.com/photo-1521334884684-d80222895322?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.0.3&s=2c2b9b9bb5b2b0bf8a2b7c3e6d9f6f4b" alt="hero" class="img-fluid rounded">
    </div>
  </div>
</section>

<!-- Filters + Products -->
<section class="container" id="products">
  <div class="row">
    <!-- Sidebar filters -->
    <aside class="col-lg-3 mb-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="mb-3">Filter</h6>
          <label class="form-label">Harga</label>
          <div class="d-flex gap-2">
            <input type="number" class="form-control" id="priceMin" placeholder="Min">
            <input type="number" class="form-control" id="priceMax" placeholder="Max">
          </div>
          <hr>
          <label class="form-label">Brand</label>
          <div>
            <div class="form-check">
              <input class="form-check-input brand-filter" type="checkbox" value="Brand A" id="brandA">
              <label class="form-check-label" for="brandA">Brand A</label>
            </div>
            <div class="form-check">
              <input class="form-check-input brand-filter" type="checkbox" value="Brand B" id="brandB">
              <label class="form-check-label" for="brandB">Brand B</label>
            </div>
          </div>
          <hr>
          <label class="form-label">Rating</label>
          <select class="form-select" id="ratingFilter">
            <option value="0">Semua</option>
            <option value="4">4 ★ ke atas</option>
            <option value="3">3 ★ ke atas</option>
          </select>
          <div class="d-grid mt-3">
            <button class="btn btn-outline-primary" id="applyFilter">Terapkan</button>
          </div>
        </div>
      </div>

      <div class="card shadow-sm mt-3">
        <div class="card-body text-center">
          <h6>Gratis ongkir</h6>
          <p class="small text-muted">Untuk pembelian di atas Rp 200.000</p>
          <a href="#" class="btn btn-sm btn-outline-success">Lihat Syarat</a>
        </div>
      </div>
    </aside>

    <!-- Product grid -->
    <main class="col-lg-9">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <strong id="resultsCount">12</strong> produk ditemukan
        </div>
        <div class="d-flex gap-2">
          <select class="form-select form-select-sm w-auto" id="sortSelect">
            <option value="popular">Paling Populer</option>
            <option value="new">Terbaru</option>
            <option value="price-asc">Harga: Rendah &uarr;</option>
            <option value="price-desc">Harga: Tinggi &darr;</option>
          </select>
          <button class="btn btn-outline-secondary btn-sm" id="toggleView"><i class="fa fa-th-large"></i></button>
        </div>
      </div>

      <div class="row g-3" id="productList">
        <!-- Product card template will be inserted by JS -->
      </div>

      <!-- Pagination -->
      <nav class="mt-4" aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination"></ul>
      </nav>
    </main>
  </div>
</section>

<!-- Product modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="" id="modalImage" class="img-fluid rounded">
          </div>
          <div class="col-md-6">
            <h4 id="modalTitle"></h4>
            <p class="text-muted small" id="modalBrand"></p>
            <div class="mb-3">
              <strong id="modalPrice"></strong>
              <span class="text-muted ms-2" id="modalOldPrice"></span>
            </div>
            <p id="modalDesc" class="small text-muted"></p>
            <div class="mb-3">
              <label for="qty" class="form-label">Jumlah</label>
              <input type="number" min="1" class="form-control w-25" id="modalQty" value="1">
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-primary" id="addToCartBtn"><i class="fa fa-cart-plus me-2"></i>Tambah ke Keranjang</button>
              <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Offcanvas Cart -->
<div class="offcanvas offcanvas-end offcanvas-cart" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasCartLabel">Keranjang</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
    <div id="cartItems" class="mb-3"></div>
    <div class="mt-auto">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <strong>Total</strong>
        <strong id="cartTotal">Rp 0</strong>
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-primary">Checkout</button>
        <button class="btn btn-outline-danger" id="clearCart">Kosongkan</button>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="pt-5 pb-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>TokoKeren</h5>
        <p class="small text-muted">Marketplace contoh — desain modern untuk toko online Anda.</p>
      </div>
      <div class="col-md-2 mb-3">
        <h6>Perusahaan</h6>
        <ul class="list-unstyled small">
          <li>Tentang Kami</li>
          <li>Karir</li>
          <li>Kontak</li>
        </ul>
      </div>
      <div class="col-md-3 mb-3">
        <h6>Bantuan</h6>
        <ul class="list-unstyled small">
          <li>Pusat Bantuan</li>
          <li>Pengembalian</li>
          <li>Pengiriman</li>
        </ul>
      </div>
      <div class="col-md-3 mb-3 text-md-end">
        <h6>Ikuti Kami</h6>
        <div class="mt-2">
          <i class="fa fa-facebook fa-lg me-2"></i>
          <i class="fa fa-instagram fa-lg me-2"></i>
          <i class="fa fa-twitter fa-lg"></i>
        </div>
      </div>
    </div>
    <hr class="mt-4" />
    <div class="text-center small">© <span id="year"></span> TokoKeren. All rights reserved.</div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Simple JS to mock products and cart functionality -->
<script>
  // Mock product data
  const products = [
    {id:1,title:'Sneakers Retro',brand:'Brand A',price:350000,oldPrice:450000,rate:4.5,img:'https://images.unsplash.com/photo-1528701800489-4767b8b8f2fb?q=80&w=800&auto=format&fit=crop'},
    {id:2,title:'Jaket Bomber',brand:'Brand B',price:220000,oldPrice:null,rate:4.0,img:'https://images.unsplash.com/photo-1542317854-6e6e6b8b5d85?q=80&w=800&auto=format&fit=crop'},
    {id:3,title:'Headphone Wireless',brand:'Brand A',price:580000,oldPrice:690000,rate:4.7,img:'https://images.unsplash.com/photo-1518443892000-6b5b8b7f1f3a?q=80&w=800&auto=format&fit=crop'},
    {id:4,title:'Tas Ransel',brand:'Brand B',price:150000,oldPrice:199000,rate:4.2,img:'https://images.unsplash.com/photo-1516594798940-8d6a54b2d8c0?q=80&w=800&auto=format&fit=crop'},
    {id:5,title:'Kacamata Hitam',brand:'Brand C',price:89000,oldPrice:null,rate:3.9,img:'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?q=80&w=800&auto=format&fit=crop'},
    {id:6,title:'Smartwatch',brand:'Brand D',price:999000,oldPrice:1199000,rate:4.8,img:'https://images.unsplash.com/photo-1511732351990-1f1b9e9d6f3a?q=80&w=800&auto=format&fit=crop'},
  ];

  let cart = {};

  function formatIDR(val){
    return 'Rp ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  function renderProducts(list){
    const container = document.getElementById('productList');
    container.innerHTML = '';
    list.forEach(p=>{
      const col = document.createElement('div');
      col.className = 'col-6 col-md-4';
      col.innerHTML = `
        <div class="card product-card position-relative">
          ${p.oldPrice?"<div class='badge-discount'>SALE</div>":''}
          <img src="${p.img}" class="card-img-top" alt="${p.title}">
          <div class="card-body">
            <h6 class="card-title mb-1">${p.title}</h6>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <div class="small text-muted">${p.brand}</div>
                <div class="fw-bold">${formatIDR(p.price)}</div>
              </div>
              <div class="text-end small text-warning">${p.rate} ★</div>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-sm btn-outline-primary w-100" onclick="openModal(${p.id})">Lihat</button>
              <button class="btn btn-sm btn-primary" onclick="quickAdd(${p.id})"><i class='fa fa-cart-plus'></i></button>
            </div>
          </div>
        </div>`;
      container.appendChild(col);
    });
    document.getElementById('resultsCount').textContent = list.length;
  }

  function openModal(id){
    const p = products.find(x=>x.id===id);
    document.getElementById('modalImage').src = p.img;
    document.getElementById('modalTitle').textContent = p.title;
    document.getElementById('modalBrand').textContent = p.brand;
    document.getElementById('modalPrice').textContent = formatIDR(p.price);
    document.getElementById('modalOldPrice').textContent = p.oldPrice?formatIDR(p.oldPrice):'';
    document.getElementById('modalDesc').textContent = 'Deskripsi singkat produk. Bahan berkualitas, garansi 1 tahun.';
    document.getElementById('modalQty').value = 1;
    const modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();

    document.getElementById('addToCartBtn').onclick = ()=>{
      addToCart(id, parseInt(document.getElementById('modalQty').value || 1));
      modal.hide();
      showOffcanvas();
    }
  }

  function quickAdd(id){
    addToCart(id,1);
    // small feedback
    const btn = event.currentTarget;
    btn.innerHTML = '<i class="fa fa-check"></i>';
    setTimeout(()=>btn.innerHTML = '<i class="fa fa-cart-plus"></i>',700);
  }

  function addToCart(id,qty){
    if(!cart[id]) cart[id]=0;
    cart[id]+=qty;
    renderCart();
  }

  function renderCart(){
    const wrap = document.getElementById('cartItems');
    wrap.innerHTML = '';
    let total = 0;
    for(const id in cart){
      const p = products.find(x=>x.id==id);
      const qty = cart[id];
      const sub = p.price * qty;
      total += sub;
      const div = document.createElement('div');
      div.className = 'd-flex align-items-center mb-3';
      div.innerHTML = `
        <img src="${p.img}" style="width:64px;height:64px;object-fit:cover;border-radius:.5rem" class="me-3">
        <div class="flex-grow-1">
          <div class="small">${p.title}</div>
          <div class="small text-muted">${formatIDR(p.price)} x ${qty}</div>
        </div>
        <div class="text-end">
          <div class="fw-bold">${formatIDR(sub)}</div>
          <div class="small mt-1">
            <button class="btn btn-sm btn-outline-secondary me-1" onclick="changeQty(${id},${qty-1})">-</button>
            <button class="btn btn-sm btn-outline-secondary" onclick="changeQty(${id},${qty+1})">+</button>
          </div>
        </div>`;
      wrap.appendChild(div);
    }
    document.getElementById('cartTotal').textContent = formatIDR(total);
    document.getElementById('cartCount').textContent = Object.keys(cart).reduce((s,k)=>s+cart[k],0);
  }

  function changeQty(id,newQty){
    if(newQty<=0){ delete cart[id]; } else cart[id]=newQty;
    renderCart();
  }

  function showOffcanvas(){
    const off = new bootstrap.Offcanvas(document.getElementById('offcanvasCart'));
    off.show();
  }

  document.getElementById('clearCart').addEventListener('click',()=>{ cart={}; renderCart(); });

  // Basic search & filter handlers
  document.getElementById('btnSearch').addEventListener('click',()=>{
    const q = document.getElementById('searchInput').value.toLowerCase();
    renderProducts(products.filter(p=>p.title.toLowerCase().includes(q) || p.brand.toLowerCase().includes(q)));
  });

  document.querySelectorAll('.filter-chip').forEach(el=>el.addEventListener('click',()=>{
    document.getElementById('searchInput').value = el.textContent.trim();
    document.getElementById('btnSearch').click();
  }));

  document.getElementById('applyFilter').addEventListener('click',()=>{
    const min = parseInt(document.getElementById('priceMin').value || 0);
    const max = parseInt(document.getElementById('priceMax').value || Infinity);
    const rating = parseFloat(document.getElementById('ratingFilter').value || 0);
    const brands = Array.from(document.querySelectorAll('.brand-filter:checked')).map(x=>x.value);
    let res = products.filter(p=>p.price>=min && p.price<=max && p.rate>=rating);
    if(brands.length) res = res.filter(p=>brands.includes(p.brand));
    renderProducts(res);
  });

  // initial render
  renderProducts(products);
  renderCart();
  document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>
