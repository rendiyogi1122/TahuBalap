<?php $__env->startSection('title', 'Keranjang Belanja'); ?>

<?php $__env->startSection('content'); ?>
<main class="max-w-7xl mx-auto px-6 py-12">
  <header class="mb-10">
    <h1 class="text-display-lg font-black text-on-surface mb-2">Keranjang Saya</h1>
    <p class="text-body-md text-on-surface-variant">Review pesanan Anda sebelum checkout.</p>
  </header>

  <?php if(empty($keranjang)): ?>
  
  <div class="flex flex-col items-center justify-center py-24 text-center">
    <span class="text-8xl mb-6">🛒</span>
    <h2 class="text-headline-md font-bold text-on-surface mb-3">Keranjang masih kosong</h2>
    <p class="text-on-surface-variant mb-8 max-w-sm">Yuk tambahkan tahu favorit kamu ke keranjang dulu!</p>
    <a href="<?php echo e(route('produk.index')); ?>" class="bg-primary-container text-white font-bold px-8 py-4 rounded-xl hover:scale-105 active:scale-95 transition-all shadow-lg shadow-orange-200">
      Lihat Menu
    </a>
  </div>
  <?php else: ?>
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

    
    <div class="lg:col-span-8 space-y-6">
      <?php $__currentLoopData = $keranjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-surface-variant flex flex-col sm:flex-row gap-6 items-center">
        
        <div class="w-32 h-32 rounded-lg overflow-hidden flex-shrink-0 bg-primary-fixed flex items-center justify-center">
          <?php if($item['gambar']): ?>
            <img src="<?php echo e(Storage::url($item['gambar'])); ?>" class="w-full h-full object-cover" alt="<?php echo e($item['nama']); ?>">
          <?php else: ?>
            <span class="text-5xl">🧀</span>
          <?php endif; ?>
        </div>

        
        <div class="flex-grow text-center sm:text-left">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
            <h3 class="text-headline-md font-bold text-on-surface"><?php echo e($item['nama']); ?></h3>
            <span class="text-headline-md font-bold text-primary">Rp<?php echo e(number_format($item['harga'] * $item['jumlah'], 0, ',', '.')); ?></span>
          </div>
          <p class="text-sm text-on-surface-variant mb-1">Harga satuan: Rp<?php echo e(number_format($item['harga'], 0, ',', '.')); ?></p>

          <div class="flex items-center justify-center sm:justify-start gap-6 mt-4">
            
            <form action="<?php echo e(route('keranjang.update', $id)); ?>" method="POST" class="flex items-center">
              <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
              <div class="flex items-center bg-surface-container-low rounded-full px-2 py-1 border border-outline-variant">
                <button type="submit" name="jumlah" value="<?php echo e(max(1, $item['jumlah'] - 1)); ?>" class="w-8 h-8 flex items-center justify-center text-primary hover:bg-primary-fixed rounded-full transition-colors">
                  <span class="material-symbols-outlined text-sm">remove</span>
                </button>
                <span class="px-4 font-bold text-sm"><?php echo e($item['jumlah']); ?></span>
                <button type="submit" name="jumlah" value="<?php echo e($item['jumlah'] + 1); ?>" class="w-8 h-8 flex items-center justify-center text-primary hover:bg-primary-fixed rounded-full transition-colors">
                  <span class="material-symbols-outlined text-sm">add</span>
                </button>
              </div>
            </form>

            
            <form action="<?php echo e(route('keranjang.hapus', $id)); ?>" method="POST">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="text-error text-xs font-bold flex items-center gap-1 hover:underline">
                <span class="material-symbols-outlined text-sm">delete</span> Hapus
              </button>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="lg:col-span-4">
      <div class="bg-surface-container-lowest p-8 rounded-xl shadow-xl shadow-orange-900/5 border border-surface-variant sticky top-28">
        <h2 class="text-headline-lg font-bold text-on-surface mb-6">Ringkasan</h2>

        <div class="space-y-4 mb-8">
          <div class="flex justify-between text-sm text-on-surface-variant">
            <span>Subtotal (<?php echo e(count($keranjang)); ?> item)</span>
            <span>Rp<?php echo e(number_format($total, 0, ',', '.')); ?></span>
          </div>
          <div class="flex justify-between text-sm text-on-surface-variant">
            <span>Ongkos Kirim</span>
            <span class="text-tertiary font-bold">Rp5.000</span>
          </div>
          <div class="h-px bg-outline-variant"></div>
          <div class="flex justify-between font-bold text-on-surface">
            <span>Total</span>
            <span class="text-primary-container text-headline-md">Rp<?php echo e(number_format($total + 5000, 0, ',', '.')); ?></span>
          </div>
        </div>

        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('checkout')); ?>" class="block w-full bg-primary-container text-white font-bold py-4 rounded-xl text-center hover:scale-105 active:scale-95 transition-all shadow-lg shadow-orange-200 mb-4">
          Checkout Sekarang
        </a>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class="block w-full bg-primary-container text-white font-bold py-4 rounded-xl text-center hover:scale-105 active:scale-95 transition-all shadow-lg shadow-orange-200 mb-4">
          Masuk untuk Checkout
        </a>
        <?php endif; ?>

        <a href="<?php echo e(route('produk.index')); ?>" class="block w-full text-center text-primary-container font-bold text-sm py-3 hover:underline">
          Lanjut Belanja
        </a>

        
        <div class="mt-6 pt-6 border-t border-outline-variant space-y-3">
          <div class="flex items-center gap-3 text-xs text-on-surface-variant">
            <span class="material-symbols-outlined text-tertiary text-sm">verified_user</span> Pembayaran Aman & Terenkripsi
          </div>
          <div class="flex items-center gap-3 text-xs text-on-surface-variant">
            <span class="material-symbols-outlined text-tertiary text-sm">bolt</span> Pengiriman Cepat 15 Menit
          </div>
          <div class="flex items-center gap-3 text-xs text-on-surface-variant">
            <span class="material-symbols-outlined text-tertiary text-sm">replay</span> Garansi Uang Kembali
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\keranjang.blade.php ENDPATH**/ ?>