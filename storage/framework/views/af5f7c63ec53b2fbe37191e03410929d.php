<?php $__env->startSection('title', 'Manajemen Kategori'); ?>
<?php $__env->startSection('subtitle', 'Kelola kategori produk tahu'); ?>

<?php $__env->startSection('header-actions'); ?>
<a href="<?php echo e(route('admin.kategori.create')); ?>"
  class="bg-[#FF5C00] text-white font-bold text-sm px-6 py-3 rounded-xl shadow-lg shadow-orange-200/40 flex items-center gap-2 hover:scale-105 active:scale-95 transition-all">
  <span class="material-symbols-outlined text-sm">add</span> Tambah Kategori
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <?php $__empty_1 = true; $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <div class="bg-white rounded-2xl border border-orange-50 shadow-sm p-6 hover:shadow-lg transition-all group">
    <div class="flex justify-between items-start mb-4">
      <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
        <span class="material-symbols-outlined text-[#FF5C00]">category</span>
      </div>
      <div class="flex gap-2">
        <a href="<?php echo e(route('admin.kategori.edit', $kat)); ?>"
          class="p-2 bg-gray-100 hover:bg-orange-100 hover:text-[#FF5C00] rounded-lg transition-colors">
          <span class="material-symbols-outlined text-sm">edit</span>
        </a>
        <form action="<?php echo e(route('admin.kategori.destroy', $kat)); ?>" method="POST"
          onsubmit="return confirm('Yakin hapus kategori ini?')">
          <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <button class="p-2 bg-red-50 text-red-500 hover:bg-red-100 rounded-lg transition-colors">
            <span class="material-symbols-outlined text-sm">delete</span>
          </button>
        </form>
      </div>
    </div>
    <h3 class="font-black text-on-surface mb-1"><?php echo e($kat->nama); ?></h3>
    <p class="text-xs text-gray-400 mb-3"><?php echo e($kat->deskripsi ?? 'Tidak ada deskripsi'); ?></p>
    <div class="flex items-center gap-2">
      <span class="bg-orange-100 text-[#FF5C00] text-xs font-bold px-3 py-1 rounded-full">
        <?php echo e($kat->produks_count); ?> Produk
      </span>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <div class="md:col-span-3 text-center py-20">
    <span class="text-5xl block mb-4">🗂️</span>
    <p class="font-bold text-gray-400 mb-4">Belum ada kategori</p>
    <a href="<?php echo e(route('admin.kategori.create')); ?>"
      class="bg-[#FF5C00] text-white font-bold text-sm px-6 py-3 rounded-xl hover:scale-105 transition-all">
      + Tambah Kategori Pertama
    </a>
  </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\kategori\index.blade.php ENDPATH**/ ?>