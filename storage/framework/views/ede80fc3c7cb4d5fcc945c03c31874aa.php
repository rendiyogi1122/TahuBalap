<?php $__env->startSection('title', 'Menu Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-12">
  <header class="mb-10 relative overflow-hidden rounded-3xl aspect-[4/1] bg-primary-fixed flex items-center justify-center group">
    <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
    <div class="relative z-10 text-center text-white">
      <h1 class="text-display-lg font-black mb-2">Menu Tahu Kami 🧀</h1>
      <p class="text-body-lg opacity-90">Pilih tahu favoritmu, balapan ke meja Anda!</p>
    </div>
    <div class="absolute inset-0 opacity-10 group-hover:scale-105 transition-transform duration-500">
      <span class="text-[20rem] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">🧀</span>
    </div>
  </header>

  
  <div class="flex gap-3 overflow-x-auto pb-4 mb-8">
    <a href="<?php echo e(route('produk.index')); ?>" class="flex-none px-5 py-2 rounded-full font-bold text-sm transition-all <?php echo e(!request('kategori') ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-primary-fixed'); ?>">
      Semua
    </a>
    <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('produk.index', ['kategori' => $kat->slug])); ?>" class="flex-none px-5 py-2 rounded-full font-bold text-sm transition-all <?php echo e(request('kategori') === $kat->slug ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-primary-fixed'); ?>">
      <?php echo e($kat->nama); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  
  <?php if($produks->count() > 0): ?>
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white rounded-3xl shadow-sm border border-outline-variant group hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col">
      <a href="<?php echo e(route('produk.show', $produk->slug)); ?>" class="relative overflow-hidden rounded-t-3xl aspect-square bg-primary-fixed flex items-center justify-center">
        <?php if($produk->gambar): ?>
          <img src="<?php echo e(Storage::url($produk->gambar)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="<?php echo e($produk->nama); ?>">
        <?php else: ?>
          <span class="text-6xl">🧀</span>
        <?php endif; ?>
        <?php if($produk->stok <= 0): ?>
          <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <span class="bg-error-container text-on-error-container font-bold text-xs px-3 py-1 rounded-full">Habis</span>
          </div>
        <?php elseif($produk->stok <= 10): ?>
          <span class="absolute top-3 right-3 bg-secondary-container text-on-secondary-container font-bold text-xs px-2 py-1 rounded-full">Sisa <?php echo e($produk->stok); ?></span>
        <?php endif; ?>
      </a>

      <div class="p-4 flex flex-col flex-grow">
        <p class="text-xs text-on-surface-variant mb-1"><?php echo e($produk->kategori->nama); ?></p>
        <a href="<?php echo e(route('produk.show', $produk->slug)); ?>" class="font-bold text-sm text-on-surface mb-1 hover:text-primary-container transition-colors line-clamp-2"><?php echo e($produk->nama); ?></a>
        <div class="flex items-center gap-1 text-secondary mb-3">
          <span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1">star</span>
          <span class="text-xs font-bold">4.8</span>
        </div>
        <div class="mt-auto">
          <p class="font-black text-primary text-lg mb-3">Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
          <?php if($produk->stok > 0): ?>
            <?php if(auth()->guest() || !auth()->user()->isAdmin()): ?>
            <form action="<?php echo e(route('keranjang.tambah')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="produk_id" value="<?php echo e($produk->id); ?>">
              <button class="w-full bg-on-surface text-white font-bold text-xs py-2.5 rounded-xl hover:bg-primary-container active:scale-95 transition-all flex items-center justify-center gap-1">
                <span class="material-symbols-outlined text-xs">add_shopping_cart</span> Tambah
              </button>
            </form>
            <?php endif; ?>
          <?php else: ?>
          <button disabled class="w-full bg-surface-container text-on-surface-variant font-bold text-xs py-2.5 rounded-xl cursor-not-allowed">
            Stok Habis
          </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <?php if($produks->hasPages()): ?>
  <div class="mt-10 flex justify-center">
    <?php echo e($produks->links()); ?>

  </div>
  <?php endif; ?>

  <?php else: ?>
  <div class="text-center py-24">
    <span class="text-8xl block mb-6">🔍</span>
    <h3 class="font-bold text-on-surface mb-2">Produk tidak ditemukan</h3>
    <p class="text-on-surface-variant text-sm">Coba kategori lain atau kembali ke semua produk</p>
    <a href="<?php echo e(route('produk.index')); ?>" class="mt-6 inline-block bg-primary-container text-white font-bold px-6 py-3 rounded-xl hover:scale-105 transition-all">
      Lihat Semua Produk
    </a>
  </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\produk\index.blade.php ENDPATH**/ ?>