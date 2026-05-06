
<?php $__env->startSection('title', 'Pengaturan Toko'); ?>
<?php $__env->startSection('subtitle', 'Kelola tampilan dan informasi toko'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('admin.setting.update')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>

  <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">

    
    <div style="background:white; border-radius:16px; border:1px solid #f3f4f6; padding:24px;">
      <h3 style="font-size:15px; font-weight:800; color:#1f2937; margin:0 0 20px; display:flex; align-items:center; gap:8px;">
        <span class="material-symbols-outlined" style="font-size:18px; color:#FF5C00;">image</span> Foto Hero Beranda
      </h3>

      
      <?php $heroImage = \App\Models\Setting::get('hero_image'); ?>
      <?php if($heroImage): ?>
      <div style="margin-bottom:16px;">
        <p style="font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; margin-bottom:8px;">Foto Saat Ini</p>
        <img src="<?php echo e(Storage::url($heroImage)); ?>" style="width:100%; height:200px; object-fit:cover; border-radius:12px; border:1px solid #f3f4f6;">
      </div>
      <?php endif; ?>

      <div style="border:2px dashed #ffe4cc; border-radius:12px; padding:24px; text-align:center; cursor:pointer;"
           onclick="document.getElementById('hero-input').click()">
        <span class="material-symbols-outlined" style="font-size:32px; color:#FF5C00; display:block; margin-bottom:8px;">cloud_upload</span>
        <p style="font-size:13px; font-weight:700; color:#1f2937; margin:0 0 4px;">Klik untuk upload foto hero</p>
        <p style="font-size:11px; color:#9ca3af; margin:0;">PNG, JPG – Rekomendasi 1200x600px</p>
        <input type="file" name="hero_image" id="hero-input" accept="image/*" style="display:none;" onchange="previewHero(this)">
      </div>

      <div id="hero-preview" style="display:none; margin-top:12px;">
        <img id="hero-preview-img" style="width:100%; height:200px; object-fit:cover; border-radius:12px;">
      </div>
    </div>

    
    <div style="background:white; border-radius:16px; border:1px solid #f3f4f6; padding:24px;">
      <h3 style="font-size:15px; font-weight:800; color:#1f2937; margin:0 0 20px; display:flex; align-items:center; gap:8px;">
        <span class="material-symbols-outlined" style="font-size:18px; color:#FF5C00;">title</span> Teks Hero Beranda
      </h3>

      <div style="display:flex; flex-direction:column; gap:14px;">
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Badge Text</label>
          <input type="text" name="hero_badge" value="<?php echo e(\App\Models\Setting::get('hero_badge', 'Freshly Racing to Your Table 🏎️')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Judul Hero</label>
          <input type="text" name="hero_title" value="<?php echo e(\App\Models\Setting::get('hero_title', 'Rasakan Tahu Balap yang Cepat & Lezat')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Subtitle Hero</label>
          <textarea name="hero_subtitle" rows="3"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none; resize:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'"><?php echo e(\App\Models\Setting::get('hero_subtitle', 'Nikmati cita rasa street food otentik dengan standar kebersihan modern.')); ?></textarea>
        </div>
      </div>
    </div>

    
    <div style="background:white; border-radius:16px; border:1px solid #f3f4f6; padding:24px;">
      <h3 style="font-size:15px; font-weight:800; color:#1f2937; margin:0 0 20px; display:flex; align-items:center; gap:8px;">
        <span class="material-symbols-outlined" style="font-size:18px; color:#FF5C00;">store</span> Informasi Toko
      </h3>
      <div style="display:flex; flex-direction:column; gap:14px;">
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Nama Toko</label>
          <input type="text" name="nama_toko" value="<?php echo e(\App\Models\Setting::get('nama_toko', 'TahuBalap')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Nomor WhatsApp</label>
          <input type="text" name="whatsapp" value="<?php echo e(\App\Models\Setting::get('whatsapp', '08123456789')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Ongkos Kirim (Rp)</label>
          <input type="number" name="ongkir" value="<?php echo e(\App\Models\Setting::get('ongkir', '5000')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
      </div>
    </div>

    
    <div style="background:white; border-radius:16px; border:1px solid #f3f4f6; padding:24px;">
      <h3 style="font-size:15px; font-weight:800; color:#1f2937; margin:0 0 20px; display:flex; align-items:center; gap:8px;">
        <span class="material-symbols-outlined" style="font-size:18px; color:#FF5C00;">account_balance</span> Info Rekening Pembayaran
      </h3>
      <div style="display:flex; flex-direction:column; gap:14px;">
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Bank</label>
          <select name="rekening_bank"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none; background:white;">
            <?php $__currentLoopData = ['BCA','BNI','BRI','Mandiri','CIMB','BSI','Jenius','GoPay','OVO','Dana']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($bank); ?>" <?php echo e(\App\Models\Setting::get('rekening_bank', 'BCA') === $bank ? 'selected' : ''); ?>><?php echo e($bank); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Nomor Rekening</label>
          <input type="text" name="no_rekening" value="<?php echo e(\App\Models\Setting::get('no_rekening', '1234567890')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>
        <div>
          <label style="display:block; font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:1px; margin-bottom:6px;">Atas Nama</label>
          <input type="text" name="nama_rekening" value="<?php echo e(\App\Models\Setting::get('nama_rekening', 'TahuBalap Indonesia')); ?>"
            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:10px 14px; font-size:13px; font-family:inherit; box-sizing:border-box; outline:none;"
            onfocus="this.style.borderColor='#FF5C00'" onblur="this.style.borderColor='#e5e7eb'">
        </div>

        
        <div style="background:#fff7ed; border-radius:12px; padding:16px; border:1px solid #ffe4cc;">
          <p style="font-size:11px; font-weight:700; color:#9ca3af; text-transform:uppercase; margin:0 0 8px;">Preview Tampilan di Checkout</p>
          <p style="font-size:14px; font-weight:800; color:#1f2937; margin:0;">
            <?php echo e(\App\Models\Setting::get('rekening_bank', 'BCA')); ?> · <?php echo e(\App\Models\Setting::get('no_rekening', '1234567890')); ?>

          </p>
          <p style="font-size:12px; color:#6b7280; margin:4px 0 0;">
            a.n. <?php echo e(\App\Models\Setting::get('nama_rekening', 'TahuBalap Indonesia')); ?>

          </p>
        </div>
      </div>
    </div>
  </div>

  
  <div style="margin-top:24px; display:flex; justify-content:flex-end;">
    <button type="submit"
      style="background:#FF5C00; color:white; font-weight:800; font-size:14px; padding:14px 32px; border-radius:12px; border:none; cursor:pointer; box-shadow:0 4px 12px rgba(255,92,0,0.3); display:flex; align-items:center; gap:8px;"
      onmouseover="this.style.background='#e05000'" onmouseout="this.style.background='#FF5C00'">
      <span class="material-symbols-outlined" style="font-size:18px;">save</span> Simpan Semua Pengaturan
    </button>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function previewHero(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = e => {
      document.getElementById('hero-preview-img').src = e.target.result;
      document.getElementById('hero-preview').style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-tahu\resources\views\admin\setting\index.blade.php ENDPATH**/ ?>