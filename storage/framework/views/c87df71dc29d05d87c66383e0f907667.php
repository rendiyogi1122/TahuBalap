<?php $__env->startSection('title', 'Detail Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-6 py-12">
  <div class="flex items-center gap-4 mb-8">
    <a href="<?php echo e(route('pesanan.index')); ?>"
      class="p-2 bg-surface-container rounded-full hover:bg-surface-container-high transition-colors">
      <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <div>
      <p class="text-xs uppercase tracking-[0.3em] text-gray-400 mb-1">Nomor Pesanan</p>
      <h1 class="text-3xl font-black text-on-surface">#<?php echo e($pesanan->kode_pesanan); ?></h1>
      <p class="text-sm text-on-surface-variant mt-1">Dibuat <?php echo e($pesanan->created_at->format('d M Y H:i')); ?></p>
    </div>
  </div>

  <?php
    $statusMap = [
      'menunggu'    => ['bg-orange-100', 'text-orange-700', 'Menunggu Pesanan', 'Silakan selesaikan pembayaran atau tunggu konfirmasi admin.'],
      'dikonfirmasi'=> ['bg-amber-100',  'text-amber-700',  'Pesanan Dikonfirmasi', 'Pembayaran diterima dan pesanan akan diproses.'],
      'diproses'    => ['bg-blue-100',   'text-blue-700',   'Sedang Diproses', 'Pesanan sedang disiapkan.'],
      'dikirim'     => ['bg-purple-100', 'text-purple-700', 'Dalam Pengiriman', 'Pesanan sedang dalam perjalanan.'],
      'selesai'     => ['bg-green-100',  'text-green-700',  'Pesanan Selesai', 'Terima kasih atas pesanan Anda!'],
      'dibatalkan'  => ['bg-red-100',    'text-red-700',    'Pesanan Dibatalkan', 'Pesanan ini telah dibatalkan.'],
    ];
    $status = $statusMap[$pesanan->status] ?? ['bg-gray-100', 'text-gray-700', ucfirst($pesanan->status), ''];
  ?>

  
  <div class="rounded-3xl p-5 mb-8 bg-gradient-to-r from-orange-50 to-white border border-orange-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <p class="text-xs uppercase tracking-[0.3em] text-gray-400 mb-2">Status Pesanan</p>
      <p class="text-xl font-black <?php echo e($status[1]); ?>"><?php echo e($status[2]); ?></p>
      <p class="text-sm <?php echo e($status[1]); ?> mt-1"><?php echo e($status[3]); ?></p>
    </div>
    <div class="rounded-2xl px-4 py-3 <?php echo e($status[0]); ?> text-sm font-bold <?php echo e($status[1]); ?>">
      <?php echo e(strtoupper($pesanan->status)); ?>

    </div>
  </div>

  <div class="grid gap-6 lg:grid-cols-[1.7fr_1fr]">
    <div class="space-y-6">

      
      <div class="bg-white rounded-3xl border border-orange-100 p-6">
        <h2 class="font-bold mb-4 flex items-center gap-2 text-lg">
          <span class="material-symbols-outlined text-[#FF5C00]">receipt_long</span> Item Pesanan
        </h2>
        <div class="space-y-3">
          <?php $__currentLoopData = $pesanan->detailPesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="flex items-center gap-4 p-4 bg-orange-50 rounded-3xl">
            
            <div class="w-14 h-14 rounded-2xl overflow-hidden bg-orange-100 flex items-center justify-center flex-shrink-0">
              <?php if($detail->produk && $detail->produk->gambar): ?>
                <img src="<?php echo e(Storage::url($detail->produk->gambar)); ?>" class="w-full h-full object-cover" alt="<?php echo e($detail->produk->nama ?? ''); ?>">
              <?php else: ?>
                <span class="text-2xl">🧀</span>
              <?php endif; ?>
            </div>
            
            <div class="flex-1">
              <p class="font-bold text-sm text-on-surface">
                <?php echo e($detail->produk->nama ?? 'Produk telah dihapus'); ?>

              </p>
              <p class="text-xs text-on-surface-variant mt-1">
                <?php echo e($detail->jumlah); ?> x Rp<?php echo e(number_format($detail->harga_satuan, 0, ',', '.')); ?>

              </p>
            </div>
            
            <p class="font-black text-sm text-[#FF5C00] flex-shrink-0">
              Rp<?php echo e(number_format($detail->subtotal, 0, ',', '.')); ?>

            </p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-6 rounded-3xl bg-surface-container p-4 border border-gray-200">
          <div class="flex justify-between text-sm text-on-surface-variant mb-2">
            <span>Subtotal</span>
            <span>Rp<?php echo e(number_format($pesanan->total_harga - $pesanan->ongkos_kirim, 0, ',', '.')); ?></span>
          </div>
          <div class="flex justify-between text-sm text-on-surface-variant mb-2">
            <span>Ongkos Kirim</span>
            <span>Rp<?php echo e(number_format($pesanan->ongkos_kirim, 0, ',', '.')); ?></span>
          </div>
          <div class="flex justify-between text-base font-black text-on-surface border-t border-gray-200 pt-2 mt-2">
            <span>Total</span>
            <span class="text-[#FF5C00]">Rp<?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></span>
          </div>
        </div>
      </div>

      
      <div class="bg-white rounded-3xl border border-orange-100 p-6">
        <h2 class="font-bold mb-4 flex items-center gap-2 text-lg">
          <span class="material-symbols-outlined text-[#FF5C00]">location_on</span> Info Pengiriman
        </h2>
        <div class="space-y-4 text-sm">
          <div>
            <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">Penerima</p>
            <p class="font-semibold"><?php echo e($pesanan->user->name); ?></p>
          </div>
          <div>
            <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">Telepon</p>
            <p class="font-semibold"><?php echo e($pesanan->telepon); ?></p>
          </div>
          <div>
            <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">Alamat</p>
            <p class="font-semibold leading-relaxed"><?php echo e($pesanan->alamat_pengiriman); ?></p>
          </div>
          <?php if($pesanan->catatan): ?>
          <div>
            <p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-1">Catatan</p>
            <p class="font-semibold"><?php echo e($pesanan->catatan); ?></p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    
    <div class="space-y-6">
      <div class="bg-white rounded-3xl border border-orange-100 p-6">
        <h2 class="font-bold mb-4 flex items-center gap-2 text-lg">
          <span class="material-symbols-outlined text-[#FF5C00]">payments</span> Pembayaran
        </h2>

        <?php if($pesanan->pembayaran && $pesanan->pembayaran->metode_bayar === 'cod'): ?>
          
          <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-4 mb-4">
            <p class="text-xs uppercase tracking-[0.2em] text-yellow-700 mb-2">Bayar di Tempat (COD)</p>
            <p class="font-black text-yellow-800 text-xl">Rp<?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></p>
            <p class="text-sm text-yellow-700 mt-2">Bayar tunai saat kurir tiba di alamat Anda.</p>
          </div>
          <?php if($pesanan->pembayaran->status === 'menunggu'): ?>
          <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
            <p class="font-bold">Menunggu Konfirmasi Admin</p>
            <p class="mt-1">Pesanan akan diproses setelah admin memeriksa.</p>
          </div>
          <?php else: ?>
          <div class="rounded-2xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            <p class="font-bold">Pembayaran Dikonfirmasi ✓</p>
            <p class="mt-1">Dikonfirmasi pada <?php echo e($pesanan->pembayaran->updated_at->format('d M Y H:i')); ?></p>
          </div>
          <?php endif; ?>

        <?php elseif(!$pesanan->pembayaran || $pesanan->pembayaran->status === 'ditolak'): ?>
          
          <div class="rounded-2xl border border-orange-200 bg-orange-50 p-4 mb-4">
            <p class="text-xs uppercase tracking-[0.2em] text-orange-700 mb-2">Transfer ke Rekening</p>
            <p class="font-black">BCA · 1234567890</p>
            <p class="text-sm text-gray-500">a.n. TahuBalap Indonesia</p>
            <p class="font-black text-[#FF5C00] mt-3 text-xl">Rp<?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></p>
          </div>
          <form action="<?php echo e(route('pesanan.bayar', $pesanan->kode_pesanan)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
              <label class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2">Upload Bukti Transfer</label>
              <input type="file" name="bukti_transfer" accept="image/*" required
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:font-bold file:bg-orange-100 file:text-[#FF5C00] hover:file:bg-orange-200">
            </div>
            <button type="submit"
              class="w-full bg-[#FF5C00] text-white font-bold py-3 rounded-xl hover:bg-[#e05000] active:scale-95 transition-all text-sm">
              Kirim Bukti Pembayaran
            </button>
          </form>

        <?php elseif($pesanan->pembayaran->status === 'menunggu'): ?>
          
          <div class="text-center py-6">
            <span class="material-symbols-outlined text-4xl text-yellow-500 mb-3 block" style="font-variation-settings: 'FILL' 1">pending</span>
            <p class="font-bold mb-1">Bukti Transfer Dikirim!</p>
            <p class="text-xs text-gray-500 mb-4">Menunggu konfirmasi admin. Biasanya 1-2 jam.</p>
            <img src="<?php echo e(Storage::url($pesanan->pembayaran->bukti_transfer)); ?>"
              class="mx-auto w-36 h-36 object-cover rounded-2xl border">
          </div>

        <?php elseif($pesanan->pembayaran->status === 'dikonfirmasi'): ?>
          
          <div class="text-center py-6">
            <span class="material-symbols-outlined text-4xl text-green-500 mb-3 block" style="font-variation-settings: 'FILL' 1">check_circle</span>
            <p class="font-bold mb-1">Pembayaran Dikonfirmasi! ✓</p>
            <p class="text-xs text-gray-500">Dikonfirmasi pada <?php echo e($pesanan->pembayaran->updated_at->format('d M Y H:i')); ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\pesanan\show.blade.php ENDPATH**/ ?>