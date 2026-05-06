
<?php $__env->startSection('title', $produk->nama); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-12">

  
  <div class="flex items-center gap-2 text-sm text-gray-400 mb-8">
    <a href="<?php echo e(route('home')); ?>" class="hover:text-[#FF5C00] transition-colors">Beranda</a>
    <span>/</span>
    <a href="<?php echo e(route('produk.index')); ?>" class="hover:text-[#FF5C00] transition-colors">Produk</a>
    <span>/</span>
    <span class="text-on-surface font-semibold"><?php echo e($produk->nama); ?></span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

    
    <div class="relative">
      <div class="aspect-square rounded-3xl overflow-hidden bg-orange-50 flex items-center justify-center shadow-xl">
        <?php if($produk->gambar): ?>
          <img src="<?php echo e(Storage::url($produk->gambar)); ?>" class="w-full h-full object-cover" alt="<?php echo e($produk->nama); ?>">
        <?php else: ?>
          <span class="text-9xl">🧀</span>
        <?php endif; ?>
      </div>
      <?php if($produk->stok <= 10 && $produk->stok > 0): ?>
      <div class="absolute top-4 right-4 bg-secondary-container text-on-secondary-container font-bold text-sm px-4 py-2 rounded-full shadow-lg">
        ⚡ Sisa <?php echo e($produk->stok); ?> <?php echo e($produk->satuan); ?>

      </div>
      <?php endif; ?>
    </div>

    
    <div class="sticky top-24">
      <span class="inline-block bg-orange-100 text-[#FF5C00] text-xs font-bold px-3 py-1 rounded-full mb-4">
        <?php echo e($produk->kategori->nama ?? 'Tanpa Kategori'); ?>

      </span>
      <h1 class="text-3xl font-black text-on-surface mb-3"><?php echo e($produk->nama); ?></h1>

      <div class="flex items-center gap-4 mb-6">
        <div class="flex items-center gap-1 text-yellow-500">
          <?php for($i = 0; $i < 5; $i++): ?>
          <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">star</span>
          <?php endfor; ?>
          <span class="font-bold text-sm text-gray-500 ml-1">4.9 (120+ ulasan)</span>
        </div>
      </div>

      <p class="text-gray-500 text-base mb-8 leading-relaxed"><?php echo e($produk->deskripsi); ?></p>

      
      <div class="flex items-center justify-between mb-8 p-5 bg-orange-50 rounded-2xl border border-orange-100">
        <div>
          <p class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-1">Harga</p>
          <p class="text-3xl font-black text-[#FF5C00]">Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
          <p class="text-xs text-gray-400">per <?php echo e($produk->satuan); ?></p>
        </div>
        <div class="text-right">
          <p class="text-xs text-gray-400 uppercase tracking-widest font-bold mb-1">Stok</p>
          <p class="font-black text-2xl <?php echo e($produk->stok <= 10 ? 'text-red-500' : 'text-on-surface'); ?>"><?php echo e($produk->stok); ?></p>
          <p class="text-xs text-gray-400">tersedia</p>
        </div>
      </div>

      
      <?php if($produk->stok > 0): ?>
        <?php if(!auth()->check() || !auth()->user()->isAdmin()): ?>
        <form action="<?php echo e(route('keranjang.tambah')); ?>" method="POST" class="flex gap-4 mb-6">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="produk_id" value="<?php echo e($produk->id); ?>">

          
          <div class="flex items-center bg-gray-100 rounded-xl border border-gray-200">
            <button type="button" id="btn-kurang"
              class="w-12 h-12 flex items-center justify-center text-[#FF5C00] hover:bg-orange-100 rounded-l-xl transition-colors">
              <span class="material-symbols-outlined">remove</span>
            </button>
            <input type="number" name="jumlah" id="jumlah" value="1" min="1" max="<?php echo e($produk->stok); ?>"
              class="w-16 text-center font-black border-none bg-transparent focus:outline-none text-sm">
            <button type="button" id="btn-tambah"
              class="w-12 h-12 flex items-center justify-center text-[#FF5C00] hover:bg-orange-100 rounded-r-xl transition-colors">
              <span class="material-symbols-outlined">add</span>
            </button>
          </div>

          <button type="submit"
            class="flex-1 bg-[#FF5C00] text-white font-black py-3 rounded-xl hover:bg-[#e05000] active:scale-95 transition-all shadow-lg shadow-orange-200 flex items-center justify-center gap-2">
            <span class="material-symbols-outlined">add_shopping_cart</span> Tambah ke Keranjang
          </button>
        </form>
        <?php else: ?>
        <div class="bg-gray-100 rounded-2xl p-4 text-center text-gray-400 font-bold text-sm mb-6">
          <span class="material-symbols-outlined block text-2xl mb-1">admin_panel_settings</span>
          Anda login sebagai Admin
        </div>
        <?php endif; ?>
      <?php else: ?>
      <button disabled class="w-full bg-gray-100 text-gray-400 font-bold py-4 rounded-xl cursor-not-allowed mb-6">
        Stok Habis
      </button>
      <?php endif; ?>

      
      <div class="grid grid-cols-3 gap-3">
        <div class="text-center p-3 bg-green-50 rounded-xl">
          <span class="material-symbols-outlined text-green-600 text-sm block mb-1">bolt</span>
          <p class="text-xs font-bold text-on-surface">15 Menit</p>
          <p class="text-[10px] text-gray-400">Pengiriman</p>
        </div>
        <div class="text-center p-3 bg-yellow-50 rounded-xl">
          <span class="material-symbols-outlined text-yellow-600 text-sm block mb-1">verified</span>
          <p class="text-xs font-bold text-on-surface">Terjamin</p>
          <p class="text-[10px] text-gray-400">Kualitas</p>
        </div>
        <div class="text-center p-3 bg-orange-50 rounded-xl">
          <span class="material-symbols-outlined text-[#FF5C00] text-sm block mb-1">replay</span>
          <p class="text-xs font-bold text-on-surface">Garansi</p>
          <p class="text-[10px] text-gray-400">Uang Kembali</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
const jumlah = document.getElementById('jumlah');
const btnKurang = document.getElementById('btn-kurang');
const btnTambah = document.getElementById('btn-tambah');

if (btnKurang) {
  btnKurang.onclick = () => { if(jumlah.value > 1) jumlah.value--; };
}
if (btnTambah) {
  btnTambah.onclick = () => { if(jumlah.value < <?php echo e($produk->stok); ?>) jumlah.value++; };
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\produk\show.blade.php ENDPATH**/ ?>