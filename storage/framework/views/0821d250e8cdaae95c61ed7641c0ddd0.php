
<?php $__env->startSection('title', 'Manajemen Resep'); ?>
<?php $__env->startSection('subtitle', 'Kelola semua resep tahu TahuBalap'); ?>

<?php $__env->startSection('header-actions'); ?>
<a href="<?php echo e(route('admin.resep.create')); ?>"
  style="display:flex; align-items:center; gap:8px; padding:10px 20px; background:#FF5C00; color:white; font-weight:800; font-size:13px; border-radius:12px; text-decoration:none; box-shadow:0 4px 12px rgba(255,92,0,0.3);">
  <span class="material-symbols-outlined" style="font-size:16px;">add</span> Tambah Resep
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="background:white; border-radius:16px; border:1px solid #f3f4f6; overflow:hidden;">

  <div style="padding:20px 24px; border-bottom:1px solid #f3f4f6; display:flex; justify-content:space-between; align-items:center;">
    <p style="margin:0; font-size:14px; color:#6b7280;">Total <strong><?php echo e($reseps->total()); ?></strong> resep</p>
  </div>

  <div style="overflow-x:auto;">
    <table style="width:100%; border-collapse:collapse;">
      <thead>
        <tr style="background:#f9fafb; border-bottom:1px solid #f3f4f6;">
          <th style="padding:12px 24px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Resep</th>
          <th style="padding:12px 16px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Kategori</th>
          <th style="padding:12px 16px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Waktu</th>
          <th style="padding:12px 16px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Level</th>
          <th style="padding:12px 16px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Status</th>
          <th style="padding:12px 24px; text-align:left; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $reseps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr style="border-bottom:1px solid #f9fafb; transition:background 0.15s;"
          onmouseover="this.style.background='#fffbf7'" onmouseout="this.style.background='white'">
          <td style="padding:16px 24px;">
            <div style="display:flex; align-items:center; gap:12px;">
              <div style="width:48px; height:48px; border-radius:12px; background:#fff7ed; display:flex; align-items:center; justify-content:center; font-size:24px; flex-shrink:0; overflow:hidden;">
                <?php if($resep->gambar): ?>
                  <img src="<?php echo e(Storage::url($resep->gambar)); ?>" style="width:100%; height:100%; object-fit:cover;">
                <?php else: ?>
                  <?php echo e($resep->emoji); ?>

                <?php endif; ?>
              </div>
              <div>
                <p style="font-size:14px; font-weight:800; color:#1f2937; margin:0 0 4px;"><?php echo e($resep->nama); ?></p>
                <span style="background:<?php echo e($resep->badge_color); ?>; color:white; font-size:10px; font-weight:800; padding:2px 8px; border-radius:4px;">
                  <?php echo e($resep->badge); ?>

                </span>
              </div>
            </div>
          </td>
          <td style="padding:16px;">
            <span style="background:#f3f4f6; color:#4b5563; font-size:12px; font-weight:700; padding:4px 12px; border-radius:20px;">
              <?php echo e($resep->kategori); ?>

            </span>
          </td>
          <td style="padding:16px; font-size:13px; color:#6b7280; font-weight:600;"><?php echo e($resep->waktu); ?> min</td>
          <td style="padding:16px; font-size:13px; color:#6b7280; font-weight:600;"><?php echo e($resep->level); ?></td>
          <td style="padding:16px;">
            <?php if($resep->aktif): ?>
              <span style="background:#f0fdf4; color:#16a34a; font-size:12px; font-weight:800; padding:4px 12px; border-radius:20px;">Aktif</span>
            <?php else: ?>
              <span style="background:#fef2f2; color:#ef4444; font-size:12px; font-weight:800; padding:4px 12px; border-radius:20px;">Nonaktif</span>
            <?php endif; ?>
          </td>
          <td style="padding:16px 24px;">
            <div style="display:flex; gap:8px;">
              <a href="<?php echo e(route('admin.resep.edit', $resep)); ?>"
                style="width:34px; height:34px; background:#f3f4f6; border-radius:8px; display:flex; align-items:center; justify-content:center; text-decoration:none; transition:background 0.15s;"
                onmouseover="this.style.background='#fff7ed'" onmouseout="this.style.background='#f3f4f6'">
                <span class="material-symbols-outlined" style="font-size:16px; color:#6b7280;">edit</span>
              </a>
              <form action="<?php echo e(route('admin.resep.destroy', $resep)); ?>" method="POST"
                onsubmit="return confirm('Yakin hapus resep ini?')">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button style="width:34px; height:34px; background:#fef2f2; border:none; border-radius:8px; cursor:pointer; display:flex; align-items:center; justify-content:center;">
                  <span class="material-symbols-outlined" style="font-size:16px; color:#ef4444;">delete</span>
                </button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="6" style="padding:48px; text-align:center;">
            <div style="font-size:48px; margin-bottom:12px;">📖</div>
            <p style="font-weight:700; color:#9ca3af; margin:0 0 16px;">Belum ada resep</p>
            <a href="<?php echo e(route('admin.resep.create')); ?>"
              style="background:#FF5C00; color:white; font-weight:800; font-size:13px; padding:10px 24px; border-radius:10px; text-decoration:none;">
              + Tambah Resep Pertama
            </a>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <?php if($reseps->hasPages()): ?>
  <div style="padding:20px; border-top:1px solid #f3f4f6; display:flex; justify-content:center;">
    <?php echo e($reseps->links()); ?>

  </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\resep\index.blade.php ENDPATH**/ ?>