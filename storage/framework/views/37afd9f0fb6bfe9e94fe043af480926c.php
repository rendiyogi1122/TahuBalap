<?php $__env->startSection('title', 'Detail Pesanan'); ?>
<?php $__env->startSection('subtitle', 'Pesanan #' . $pesanan->kode_pesanan); ?>

<?php $__env->startSection('header-actions'); ?>
    <a href="<?php echo e(route('admin.pesanan.index')); ?>"
        class="flex items-center gap-2 px-4 py-2 border-2 border-gray-200 text-gray-500 font-bold text-sm rounded-xl hover:bg-gray-50 transition-colors">
        <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 xl:grid-cols-[360px_1fr] gap-6">
        <div class="bg-white rounded-2xl border border-orange-50 shadow-sm p-6 space-y-6">
            <div>
                <p class="text-xs uppercase tracking-[0.24em] text-gray-400 mb-2">Informasi Pesanan</p>
                <div class="text-sm text-gray-600 space-y-2">
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-semibold">Kode Pesanan</span>
                        <span class="text-right text-gray-500">#<?php echo e($pesanan->kode_pesanan); ?></span>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-semibold">Tanggal</span>
                        <span class="text-right text-gray-500"><?php echo e($pesanan->created_at->format('d M Y, H:i')); ?></span>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-semibold">Total Harga</span>
                        <span
                            class="text-right text-gray-500">Rp<?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></span>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-semibold">Ongkos Kirim</span>
                        <span
                            class="text-right text-gray-500">Rp<?php echo e(number_format($pesanan->ongkos_kirim ?? 0, 0, ',', '.')); ?></span>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <span class="font-semibold">Telepon</span>
                        <span class="text-right text-gray-500"><?php echo e($pesanan->telepon); ?></span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 rounded-2xl p-4">
                <p class="text-xs uppercase tracking-[0.24em] text-gray-400 mb-3">Alamat Pengiriman</p>
                <p class="text-sm text-gray-700"><?php echo e($pesanan->alamat_pengiriman); ?></p>
                <?php if($pesanan->catatan): ?>
                    <p class="mt-3 text-sm text-gray-500"><span class="font-semibold">Catatan:</span> <?php echo e($pesanan->catatan); ?>

                    </p>
                <?php endif; ?>
            </div>

            <div class="bg-white rounded-2xl border border-orange-50 p-5">
                <p class="text-xs uppercase tracking-[0.24em] text-gray-400 mb-3">Informasi Customer</p>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Nama</span>
                        <span><?php echo e($pesanan->user->name); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Email</span>
                        <span><?php echo e($pesanan->user->email); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Role</span>
                        <span class="capitalize"><?php echo e($pesanan->user->role); ?></span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-orange-50 p-5">
                <p class="text-xs uppercase tracking-[0.24em] text-gray-400 mb-3">Pembayaran</p>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Metode</span>
                        <span class="capitalize"><?php echo e($pesanan->pembayaran->metode_bayar ?? 'Belum Ada'); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Status</span>
                        <span class="capitalize"><?php echo e($pesanan->pembayaran->status ?? '-'); ?></span>
                    </div>
                    <?php if($pesanan->pembayaran && $pesanan->pembayaran->bukti_transfer): ?>
                        <div>
                            <p class="font-semibold text-sm mb-2">Bukti Transfer</p>
                            <img src="<?php echo e(asset('storage/' . $pesanan->pembayaran->bukti_transfer)); ?>" alt="Bukti Transfer"
                                class="w-full rounded-2xl border border-gray-200" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-orange-50 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="font-bold text-xl">Detail Item</h2>
                        <p class="text-sm text-gray-500"><?php echo e($pesanan->detailPesanans->count()); ?> produk</p>
                    </div>
                    <span class="text-xs uppercase tracking-[0.24em] text-gray-400">Status:
                        <?php echo e(ucfirst($pesanan->status)); ?></span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100">
                            <tr>
                                <th class="px-4 py-3">Produk</th>
                                <th class="px-4 py-3">Qty</th>
                                <th class="px-4 py-3">Harga</th>
                                <th class="px-4 py-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php $__currentLoopData = $pesanan->detailPesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-4">
                                        <div class="font-semibold"><?php echo e($detail->produk->nama); ?></div>
                                        <div class="text-xs text-gray-400"><?php echo e($detail->produk->satuan); ?></div>
                                    </td>
                                    <td class="px-4 py-4"><?php echo e($detail->jumlah ?? $detail->qty ?? 0); ?></td>
                                    <td class="px-4 py-4">
                                        Rp<?php echo e(number_format($detail->harga_satuan ?? $detail->harga, 0, ',', '.')); ?></td>
                                    <td class="px-4 py-4 font-semibold">
                                        Rp<?php echo e(number_format(($detail->harga_satuan ?? $detail->harga) * ($detail->jumlah ?? $detail->qty ?? 0), 0, ',', '.')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-orange-50 shadow-sm p-6">
                <h3 class="font-bold text-lg mb-4">Ubah Status Pesanan</h3>

                <form action="<?php echo e(route('admin.pesanan.status', $pesanan->id)); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <label class="block text-sm font-semibold text-gray-700">Pilih status baru</label>
                    <select name="status" class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm">
                        <?php $__currentLoopData = ['menunggu', 'dikonfirmasi', 'diproses', 'dikirim', 'selesai', 'dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>" <?php echo e($pesanan->status === $status ? 'selected' : ''); ?>>
                                <?php echo e(ucfirst($status)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit"
                        class="w-full bg-[#FF5C00] text-white font-bold py-3 rounded-xl hover:bg-[#e65100] transition-all">Simpan
                        Status</button>
                </form>

                <?php if($pesanan->pembayaran && $pesanan->pembayaran->status === 'menunggu'): ?>
                    <form action="<?php echo e(route('admin.pesanan.konfirmasi', $pesanan->id)); ?>" method="POST" class="mt-4">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit"
                            class="w-full bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition-all">Konfirmasi
                            Pembayaran</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\pesanan\show.blade.php ENDPATH**/ ?>