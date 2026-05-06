<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Admin TahuBalap - <?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
          colors: {
            primary: '#FF5C00',
            'primary-dark': '#a73a00',
          }
        }
      }
    }
  </script>
  <style>
    .material-symbols-outlined {
      font-family: 'Material Symbols Outlined';
      font-weight: normal;
      font-style: normal;
      font-size: 20px;
      line-height: 1;
      letter-spacing: normal;
      text-transform: none;
      display: inline-block;
      white-space: nowrap;
      word-wrap: normal;
      direction: ltr;
      -webkit-font-smoothing: antialiased;
    }

    .sidebar-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 16px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 600;
      color: #6b7280;
      transition: all 0.15s;
      margin: 2px 8px;
      text-decoration: none;
    }

    .sidebar-link:hover {
      background: #fff7ed;
      color: #FF5C00;
    }

    .sidebar-link.active {
      background: #fff7ed;
      color: #FF5C00;
      border-right: 3px solid #FF5C00;
      border-radius: 10px 0 0 10px;
    }
  </style>
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body style="background:#f9fafb; font-family:'Plus Jakarta Sans',sans-serif;">

  <div style="display:flex; min-height:100vh;">

    
    <aside
      style="width:256px; background:white; border-right:1px solid #f3f4f6; position:fixed; top:0; left:0; height:100vh; display:flex; flex-direction:column; box-shadow:2px 0 8px rgba(0,0,0,0.04); z-index:50;">

      
      <div style="padding:24px 20px; border-bottom:1px solid #f3f4f6;">
        <div style="font-size:20px; font-weight:900; color:#FF5C00; font-style:italic; letter-spacing:-1px;">TahuBalap
        </div>
        <div
          style="font-size:10px; font-weight:700; color:#9ca3af; text-transform:uppercase; letter-spacing:2px; margin-top:2px;">
          Admin Panel</div>
      </div>

      
      <nav style="flex:1; padding:16px 0; overflow-y:auto;">
        <a href="<?php echo e(route('admin.dashboard')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a href="<?php echo e(route('admin.produk.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.produk.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">inventory_2</span> Produk
        </a>
        <a href="<?php echo e(route('admin.kategori.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.kategori.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">category</span> Kategori
        </a>

        <a href="<?php echo e(route('admin.resep.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.resep.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">menu_book</span> Resep
        </a>

        <a href="<?php echo e(route('admin.pesanan.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.pesanan.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">shopping_basket</span> Pesanan
        </a>
        <a href="<?php echo e(route('admin.user.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.user.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">group</span> Pengguna
        </a>

        <a href="<?php echo e(route('admin.setting.index')); ?>"
          class="sidebar-link <?php echo e(request()->routeIs('admin.setting.*') ? 'active' : ''); ?>">
          <span class="material-symbols-outlined">settings</span> Pengaturan
        </a>

        <div
          style="margin:16px 20px 8px; font-size:10px; font-weight:800; color:#d1d5db; text-transform:uppercase; letter-spacing:2px;">
          Lainnya</div>
        <a href="<?php echo e(route('home')); ?>" class="sidebar-link">
          <span class="material-symbols-outlined">open_in_new</span> Lihat Toko
        </a>
      </nav>

      
      <div style="padding:16px; border-top:1px solid #f3f4f6;">
        <div style="display:flex; align-items:center; gap:12px; padding:8px; margin-bottom:8px;">
          <div
            style="width:40px; height:40px; border-radius:50%; background:#FF5C00; color:white; font-weight:900; font-size:16px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

          </div>
          <div style="overflow:hidden;">
            <div
              style="font-size:13px; font-weight:700; color:#1f2937; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
              <?php echo e(auth()->user()->name); ?>

            </div>
            <div style="font-size:10px; color:#9ca3af; text-transform:uppercase; font-weight:600;">Super Admin</div>
          </div>
        </div>
        <form action="<?php echo e(route('logout')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <button
            style="width:100%; display:flex; align-items:center; gap:8px; padding:8px 12px; font-size:13px; font-weight:700; color:#ef4444; background:none; border:none; border-radius:8px; cursor:pointer; transition:background 0.15s;"
            onmouseover="this.style.background='#fef2f2'" onmouseout="this.style.background='none'">
            <span class="material-symbols-outlined" style="font-size:18px;">logout</span> Keluar
          </button>
        </form>
      </div>
    </aside>

    
    <main style="flex:1; margin-left:256px; min-height:100vh; padding:40px;">

      
      <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:32px;">
        <div>
          <h1 style="font-size:28px; font-weight:900; color:#1f2937; margin:0 0 4px;"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
          <p style="font-size:14px; color:#6b7280; margin:0;">
            <?php echo $__env->yieldContent('subtitle', 'Selamat datang di panel admin TahuBalap'); ?></p>
        </div>

        <div style="display:flex; align-items:center; gap:16px;">
          <?php echo $__env->yieldContent('header-actions'); ?>

          
          <div style="position:relative;" id="notif-wrapper">
            <button onclick="toggleNotif()"
              style="position:relative; width:42px; height:42px; background:white; border:1px solid #f3f4f6; border-radius:12px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.06);">
              <span class="material-symbols-outlined" style="font-size:20px; color:#6b7280;">notifications</span>
              <span id="notif-badge"
                style="display:none; position:absolute; top:-6px; right:-6px; background:#FF5C00; color:white; font-size:10px; font-weight:800; width:20px; height:20px; border-radius:50%; align-items:center; justify-content:center; border:2px solid white;">
                0
              </span>
            </button>

            
            <div id="notif-dropdown"
              style="display:none; position:absolute; right:0; top:52px; width:360px; background:white; border-radius:16px; border:1px solid #f3f4f6; box-shadow:0 20px 40px rgba(0,0,0,0.12); z-index:999; overflow:hidden;">

              
              <div
                style="padding:16px 20px; border-bottom:1px solid #f3f4f6; display:flex; justify-content:space-between; align-items:center;">
                <div>
                  <p style="font-size:15px; font-weight:800; color:#1f2937; margin:0;">Notifikasi</p>
                  <p id="notif-count-text" style="font-size:12px; color:#9ca3af; margin:0;">Memuat...</p>
                </div>
                <div style="display:flex; gap:8px;">
                  <button onclick="tandaiBacaSemua()"
                    style="font-size:11px; font-weight:700; color:#FF5C00; background:none; border:none; cursor:pointer; padding:4px 8px; border-radius:6px;"
                    onmouseover="this.style.background='#fff7ed'" onmouseout="this.style.background='none'">
                    Tandai Dibaca
                  </button>
                  <button onclick="hapusSemua()"
                    style="font-size:11px; font-weight:700; color:#ef4444; background:none; border:none; cursor:pointer; padding:4px 8px; border-radius:6px;"
                    onmouseover="this.style.background='#fef2f2'" onmouseout="this.style.background='none'">
                    Hapus Semua
                  </button>
                </div>
              </div>

              
              <div id="notif-list" style="max-height:380px; overflow-y:auto;">
                <div style="padding:32px; text-align:center; color:#9ca3af;">
                  <span class="material-symbols-outlined"
                    style="font-size:40px; display:block; margin-bottom:8px;">notifications_none</span>
                  <p style="font-size:13px; font-weight:600; margin:0;">Belum ada notifikasi</p>
                </div>
              </div>
            </div>
          </div>

          <div style="font-size:14px; color:#6b7280; font-weight:600;"><?php echo e(auth()->user()->name); ?></div>
        </div>
      </div>

      
      <?php if(session('sukses')): ?>
        <script>
          alert(<?php echo json_encode(session('sukses')); ?>);
        </script>
      <?php endif; ?>

      <?php if(session('error')): ?>
        <script>
          alert(<?php echo json_encode(session('error')); ?>);
        </script>
      <?php endif; ?>

      <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>

  <?php echo $__env->yieldPushContent('scripts'); ?>
  <script>
    // Toggle dropdown
    function toggleNotif() {
      const dd = document.getElementById('notif-dropdown');
      dd.style.display = dd.style.display === 'none' ? 'block' : 'none';
      if (dd.style.display === 'block') loadNotif();
    }

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function (e) {
      const wrapper = document.getElementById('notif-wrapper');
      if (wrapper && !wrapper.contains(e.target)) {
        document.getElementById('notif-dropdown').style.display = 'none';
      }
    });

    // Load notifikasi dari server
    function loadNotif() {
      fetch('<?php echo e(route("admin.notifikasi.index")); ?>')
        .then(r => r.json())
        .then(data => {
          const badge = document.getElementById('notif-badge');
          const list = document.getElementById('notif-list');
          const count = document.getElementById('notif-count-text');

          // Update badge
          if (data.belum_dibaca > 0) {
            badge.style.display = 'flex';
            badge.textContent = data.belum_dibaca > 99 ? '99+' : data.belum_dibaca;
            count.textContent = data.belum_dibaca + ' belum dibaca';
          } else {
            badge.style.display = 'none';
            count.textContent = 'Semua sudah dibaca';
          }

          // Render list
          if (data.notifikasis.length === 0) {
            list.innerHTML = `
          <div style="padding:32px; text-align:center; color:#9ca3af;">
            <span class="material-symbols-outlined" style="font-size:40px; display:block; margin-bottom:8px;">notifications_none</span>
            <p style="font-size:13px; font-weight:600; margin:0;">Belum ada notifikasi</p>
          </div>`;
            return;
          }

          list.innerHTML = data.notifikasis.map(n => `
        <div onclick="bukaNotif('${n.id}', '${n.data.url}')"
          style="padding:16px 20px; border-bottom:1px solid #f9fafb; cursor:pointer; background:${n.dibaca ? 'white' : '#fffbf7'}; transition:background 0.15s; display:flex; gap:12px; align-items:flex-start;"
          onmouseover="this.style.background='#fff7ed'" onmouseout="this.style.background='${n.dibaca ? 'white' : '#fffbf7'}'">
          <div style="width:40px; height:40px; border-radius:12px; background:${n.dibaca ? '#f3f4f6' : '#FFE4D6'}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <span class="material-symbols-outlined" style="font-size:20px; color:${n.dibaca ? '#9ca3af' : '#FF5C00'};">shopping_basket</span>
          </div>
          <div style="flex:1; min-width:0;">
            <p style="font-size:13px; font-weight:${n.dibaca ? '600' : '800'}; color:#1f2937; margin:0 0 3px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
              ${n.data.pesan}
            </p>
            <p style="font-size:12px; color:#6b7280; margin:0 0 3px;">
              Kode: <strong>${n.data.kode_pesanan}</strong> · Rp${Number(n.data.total).toLocaleString('id-ID')}
            </p>
            <p style="font-size:11px; color:#9ca3af; margin:0;">${n.waktu}</p>
          </div>
          ${!n.dibaca ? '<div style="width:8px; height:8px; background:#FF5C00; border-radius:50%; flex-shrink:0; margin-top:4px;"></div>' : ''}
        </div>
      `).join('');
        })
        .catch(err => console.error('Error load notif:', err));
    }

    // Buka notifikasi
    function bukaNotif(id, url) {
      fetch(`<?php echo e(url('admin/notifikasi/baca')); ?>/${id}`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
          'Content-Type': 'application/json'
        }
      }).then(() => window.location.href = url);
    }

    // Tandai semua dibaca
    function tandaiBacaSemua() {
      fetch('<?php echo e(route("admin.notifikasi.baca")); ?>', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' }
      }).then(() => loadNotif());
    }

    // Hapus semua
    function hapusSemua() {
      if (!confirm('Yakin hapus semua notifikasi?')) return;
      fetch('<?php echo e(route("admin.notifikasi.hapus")); ?>', {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' }
      }).then(() => loadNotif());
    }

    // Auto polling setiap 15 detik
    loadNotif();
    setInterval(loadNotif, 15000);
  </script>
</body>

</html><?php /**PATH C:\laragon\www\toko-tahu\resources\views\layouts\admin.blade.php ENDPATH**/ ?>