<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS Kasir Modern</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background:#f5f7fb; }
    .product-card{cursor:pointer;transition:.2s;border-radius:12px}
    .product-card:hover{transform:translateY(-4px);box-shadow:0 10px 25px rgba(0,0,0,.08)}
    .cart-item{border-bottom:1px solid #e5e5e5;padding-bottom:10px;margin-bottom:10px}
    .sidebar{background:#fff;height:100vh;overflow-y:auto;border-right:1px solid #ddd;position:sticky;top:0}
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Kiri: Produk -->
    <div class="col-md-8 p-4">
      <h3 class="mb-3 fw-bold">POS Kasir</h3>

      <!-- Search -->
      <div class="input-group mb-3">
        <input type="text" id="searchProduct" class="form-control" placeholder="Cari produk...">
        <button class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
      </div>

      <!-- Grid Produk -->
      <div class="row g-3" id="productGrid">
        <!-- Auto-filled by JS -->
      </div>
    </div>

    <!-- Kanan: Keranjang -->
    <div class="col-md-4 sidebar p-4">
      <h5 class="fw-bold mb-3">Keranjang</h5>
      <div id="cartList"></div>

      <div class="d-flex justify-content-between fw-bold fs-5 mt-3">
        <span>Total:</span>
        <span id="totalPrice">Rp 0</span>
      </div>

      <button class="btn btn-success w-100 mt-4 py-2" id="btnBayar"><i class="fa fa-money-bill me-2"></i>Bayar</button>
      <button class="btn btn-outline-danger w-100 mt-2" id="btnClear">Clear</button>

      <div id="paymentArea" class="mt-4 d-none">
        <label class="form-label fw-bold">Jumlah Bayar</label>
        <input type="number" id="payInput" class="form-control mb-2">
        <button class="btn btn-primary w-100" id="btnProcess">Proses Pembayaran</button>
        <div class="mt-2 fw-bold" id="changeArea"></div>
      </div>
    </div>
  </div>
</div>

<script>
// Produk dummy
const products=[
  {id:1,name:'Aqua Botol',price:5000,img:'https://images.unsplash.com/photo-1581091012184-5c8af7fd3437?w=600'},
  {id:2,name:'Indomie Goreng',price:3500,img:'https://images.unsplash.com/photo-1626808642875-0aa545482dfb?w=600'},
  {id:3,name:'Roti Tawar',price:15000,img:'https://images.unsplash.com/photo-1608198093002-ad4e005484ec?w=600'},
  {id:4,name:'Teh Kotak',price:6000,img:'https://images.unsplash.com/photo-1510627490-0b6c6bfa2b8c?w=600'},
  {id:5,name:'Kopi Sachet',price:2000,img:'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600'},
  {id:6,name:'Snack Ring',price:8000,img:'https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?w=600'}
];

let cart={};

function formatIDR(x){return 'Rp '+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,'.');}

function loadProducts(){
  const wrap=document.getElementById('productGrid');
  wrap.innerHTML='';
  products.forEach(p=>{
    const col=document.createElement('div');
    col.className='col-6 col-lg-4';
    col.innerHTML=`
      <div class='product-card p-2 shadow-sm bg-white' onclick='addToCart(${p.id})'>
        <img src='${p.img}' class='w-100 rounded mb-2' style='height:120px;object-fit:cover;'>
        <div class='fw-bold small'>${p.name}</div>
        <div class='text-primary fw-bold'>${formatIDR(p.price)}</div>
      </div>`;
    wrap.appendChild(col);
  });
}

function addToCart(id){
  if(!cart[id]) cart[id]=1; else cart[id]++;
  renderCart();
}

function changeQty(id,val){
  cart[id]+=val;
  if(cart[id]<=0) delete cart[id];
  renderCart();
}

function renderCart(){
  const wrap=document.getElementById('cartList');
  wrap.innerHTML='';
  let total=0;

  for(const id in cart){
    const p=products.find(x=>x.id==id);
    const qty=cart[id];
    total+=p.price*qty;

    wrap.innerHTML+=`
      <div class='cart-item d-flex justify-content-between'>
        <div>
          <div class='fw-bold small'>${p.name}</div>
          <div class='text-muted small'>${formatIDR(p.price)} x ${qty}</div>
        </div>
        <div>
          <button class='btn btn-sm btn-outline-secondary' onclick='changeQty(${id},-1)'>-</button>
          <button class='btn btn-sm btn-outline-secondary' onclick='changeQty(${id},1)'>+</button>
        </div>
      </div>`;
  }

  document.getElementById('totalPrice').textContent=formatIDR(total);
}

document.getElementById('btnClear').onclick=function(){ cart={}; renderCart(); };

document.getElementById('btnBayar').onclick=function(){
  document.getElementById('paymentArea').classList.remove('d-none');
};

document.getElementById('btnProcess').onclick=function(){
  const total=parseInt(document.getElementById('totalPrice').textContent.replace(/\D/g,''));
  const pay=parseInt(document.getElementById('payInput').value);
  if(pay<total){
    document.getElementById('changeArea').innerHTML='<span class="text-danger">Uang kurang!</span>';
  } else {
    document.getElementById('changeArea').innerHTML='Kembalian: <span class="text-success">'+formatIDR(pay-total)+'</span>';
    cart={}; renderCart();
  }
};

loadProducts();
</script>
</body>
</html>