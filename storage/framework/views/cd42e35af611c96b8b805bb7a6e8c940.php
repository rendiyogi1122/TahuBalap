<?php $__env->startSection('title', 'Edit Kategori'); ?>
<?php $__env->startSection('subtitle', 'Ubah informasi kategori produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
  <div class="bg-white rounded-xl shadow-sm border border-orange-50 overflow-hidden">
    <div class="p-8">
      <form action="<?php echo e(route('admin.kategori.update', $kategori)); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Nama Kategori -->
        <div>
          <label for="nama" class="block text-sm font-bold text-gray-700 mb-2">Nama Kategori <span class="text-red-500">*</span></label>
          <input type="text" id="nama" name="nama" value="<?php echo e(old('nama', $kategori->nama)); ?>"
            class="w-full px-4 py-3 border <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg focus:ring-2 focus:ring-[#FF5C00] focus:outline-none transition"
            placeholder="Contoh: Tahu Mentah, Tahu Goreng, Tahu Sutra">
          <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Deskripsi -->
        <div>
          <label for="deskripsi" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi <span class="text-gray-400 text-xs">(Opsional)</span></label>
          <textarea id="deskripsi" name="deskripsi" rows="5"
            class="w-full px-4 py-3 border <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg focus:ring-2 focus:ring-[#FF5C00] focus:outline-none transition"
            placeholder="Jelaskan jenis dan karakteristik produk dalam kategori ini..."><?php echo e(old('deskripsi', $kategori->deskripsi)); ?></textarea>
          <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-4 border-t border-gray-100">
          <a href="<?php echo e(route('admin.kategori.index')); ?>"
            class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition text-center">
            Batal
          </a>
          <button type="submit"
            class="flex-1 px-6 py-3 bg-[#FF5C00] text-white font-bold rounded-lg hover:scale-105 active:scale-95 transition">
            Perbarui Kategori
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\kategori\edit.blade.php ENDPATH**/ ?>