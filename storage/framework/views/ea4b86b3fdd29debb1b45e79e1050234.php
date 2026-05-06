<?php $__env->startSection('title', 'Detail Pengguna'); ?>
<?php $__env->startSection('subtitle', $user->name); ?>

<?php $__env->startSection('header-actions'); ?>
<a href="<?php echo e(route('admin.user.index')); ?>"
  class="flex items-center gap-2 px-4 py-2 border-2 border-gray-200 text-gray-500 font-bold text-sm rounded-xl hover:bg-gray-50 transition-colors">
  <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

  
  <div class="bg-white rounded-2xl border border-orange-50 shadow-sm p-8 text-center">
    <div class="w-24 h-24 rounded-full mx-auto mb-4 flex items-center justify-center font-black text-3xl
      <?php echo e($user->role === 'admin' ? 'bg-[#FF5C00] text-white' : 'bg-orange-100 text-[#FF5C00]'); ?>">
      <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

    </div>
    <h3 class="font-black text-xl text-on-surface mb-1"><?php echo e($user->name); ?></h3>
    <p class="text-gray-400 text-sm mb-3"><?php echo e($user->email); ?></p>
    <?php if($user->role === 'admin'): ?>
      <span class="bg-[#FF5C00] text-white text-xs font-bold px-4 py-1.5 rounded-full">Admin</span>
    <?php else: ?>
      <span class="bg-orange-100 text-[#FF5C00] text-xs font-bold px-4 py-1.5 rounded-full">Customer</span>
    <?php endif; ?>

    <div class="mt-6 pt-6 border-t border-gray-100 space-y-3 text-left">
      <div>
        <p class="text-xs text-gray-400 font-bold uppercase">Telepon</p>
        <p class="font-semibold text-sm"><?php echo e($user->telepon ?? '-'); ?></p>
      </div>
      <div>
        <p class="text-xs text-gray-400 font-bold uppercase">Alamat</p>
        <p class="font-semibold text-sm"><?php echo e($user->alamat ?? '-'); ?></p>
      </div>
      <div>
        <p class="text-xs text-gray-400 font-bold uppercase">Bergabung</p>
        <p class="font-semibold text-sm"><?php echo e($user->created_at->format('d M Y')); ?></p>
      </div>
    </div>

    <a href="<?php echo e(route('admin.user.edit', $user)); ?>"
      class="mt-6 w-full bg-[#FF5C00] text-white font-bold py-3 rounded-xl hover:scale-105 transition-all flex items-center justify-center gap-2 text-sm">
      <span class="material-symbols-outlined text-sm">edit</span> Edit Pengguna
    </a>
  </div>

  
  <div class="lg:col-span-2 bg-white rounded-2xl border border-orange-50 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100">
      <h3 class="font-bold text-on-surface">Riwayat Pesanan (<?php echo e($pesanans->count()); ?>)</h3>
    </div>
    <div class="divide-y divide-gray-50">
      <?php $__empty_1 = true; $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php
        $sc = [
          'menunggu'    => ['bg-orange-100', 'text-orange-700'],
          'dikonfirmasi'=> ['bg-yellow-100', 'text-yellow-700'],
          'diproses'    => ['bg-blue-100',   'text-blue-700'],
          'dikirim'     => ['bg-purple-100', 'text-purple-700'],
          'selesai'     => ['bg-green-100',  'text-green-700'],
          'dibatalkan'  => ['bg-red-100',    'text-red-700'],
        ][$pesanan->status] ?? ['bg-gray-100', 'text-gray-700'];
      ?>
      <div class="p-5 flex items-center justify-between hover:bg-orange-50/30 transition-colors">
        <div>
          <p class="font-black text-sm">#<?php echo e($pesanan->kode_pesanan); ?></p>
          <p class="text-xs text-gray-400"><?php echo e($pesanan->created_at->format('d M Y, H:i')); ?></p>
        </div>
        <div class="flex items-center gap-4">
          <span class="<?php echo e($sc[0]); ?> <?php echo e($sc[1]); ?> text-xs font-bold px-3 py-1 rounded-full">
            <?php echo e(ucfirst($pesanan->status)); ?>

          </span>
          <p class="font-black text-sm text-[#FF5C00]">Rp<?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></p>
          <a href="<?php echo e(route('admin.pesanan.show', $pesanan->id)); ?>"
            class="text-[#FF5C00] hover:underline font-bold text-xs">Detail</a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="p-12 text-center">
        <span class="text-4xl block mb-3">📦</span>
        <p class="font-bold text-gray-400">Belum ada pesanan</p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\user\show.blade.php ENDPATH**/ ?>