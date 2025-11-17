<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Toko Online • Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --blue-primary: #2563eb;
            --blue-light: #3b82f6;
            --blue-dark: #1e40af;
            --bg-dark: #0f172a;
            --bg-card: #1e293b;
            --text-light: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: #334155;
            --hover-bg: rgba(59, 130, 246, 0.08);
        }

        [data-bs-theme="light"] {
            --bg-dark: #ffffff;
            --bg-card: #f8fafc;
            --text-light: #0f172a;
            --text-muted: #64748b;
            --border-color: #cbd5e1;
            --hover-bg: rgba(59, 130, 246, 0.05);
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            transition: background-color 0.3s, color 0.3s;
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding-bottom: 2rem;
        }

        .navbar-brand,
        .card-header,
        h2 {
            color: var(--blue-light) !important;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: rgba(30, 64, 175, 0.1);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-control {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-light);
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.95rem;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            color: var(--text-light);
        }

        .btn-primary {
            background-color: var(--blue-light);
            border: none;
            padding: 0.5rem 1.2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }

        .btn-primary:hover {
            background-color: var(--blue-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-light);
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .btn-secondary:hover {
            background: var(--border-color);
            color: white;
        }

        .btn-warning, .btn-danger {
            border: none;
            padding: 0.35rem 0.7rem;
            font-size: 0.85rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn-warning { background: #f59e0b; color: white; }
        .btn-warning:hover { background: #d97706; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }

        table {
            color: var(--text-light);
            border-collapse: separate;
            border-spacing: 0;
        }

        thead th {
            background: rgba(30, 64, 175, 0.1);
            color: var(--blue-light);
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-top: none;
            border-bottom: 2px solid var(--blue-light);
        }

        tbody td {
            padding: 0.75rem 1rem;
            border-color: var(--border-color);
            vertical-align: middle;
        }

        .table th, .table td {
            border-top: 1px solid var(--border-color);
        }

        .table-hover tbody tr:hover {
            background-color: var(--hover-bg);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--blue-light);
            opacity: 0.6;
        }

        .theme-toggle {
            background: transparent;
            border: none;
            color: var(--text-light);
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.2s;
            padding: 0.5rem;
            border-radius: 50%;
        }

        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(20deg);
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Custom header style */
        .table-header {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 8px 8px 0 0;
            padding: 0.75rem 1rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header .title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
        }

        .table-header .actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-store me-2"></i>Toko Online</h2>
            <button class="theme-toggle" id="theme-toggle">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <!-- Form Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i><span id="form-title">Tambah Produk</span>
            </div>
            <div class="card-body">
                <form id="product-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="product-id">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Produk" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="kategori" placeholder="Kategori" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" step="0.01" class="form-control" id="harga" placeholder="Harga (angka saja)" required>
                        </div>
                    </div>
                    <div class="mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        <button type="button" class="btn btn-secondary" id="btn-cancel" style="display:none;">
                            <i class="fas fa-times me-1"></i> Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Product List -->
        <div class="card">
            <div class="table-header">
                <div class="title">
                    <i class="fas fa-list me-2"></i>Daftar Produk
                </div>
                <div class="actions">
                    <span id="product-count" class="badge bg-blue-light">0 produk</span>
                </div>
            </div>
            <div class="card-body p-0">
                <?php if($products->isEmpty()): ?>
                    <div class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <p>Belum ada produk. Tambahkan sekarang!</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($p->id); ?>">
                                    <td><?php echo e($p->nama); ?></td>
                                    <td><?php echo e($p->kategori); ?></td>
                                    <td>Rp <?php echo e(number_format($p->harga, 2, ',', '.')); ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning edit-btn"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer>
        &copy; <?php echo e(date('Y')); ?> Toko Online • Laravel + JS Events
    </footer>

    <script>
        // Theme toggle
        const themeToggle = document.getElementById('theme-toggle');
        const icon = themeToggle.querySelector('i');
        const html = document.documentElement;

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'dark';
        html.setAttribute('data-bs-theme', savedTheme);
        icon.className = savedTheme === 'dark' ? 'fas fa-moon' : 'fas fa-sun';

        themeToggle.addEventListener('click', () => {
            const current = html.getAttribute('data-bs-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            icon.className = newTheme === 'dark' ? 'fas fa-moon' : 'fas fa-sun';
        });

        // AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.getElementById('product-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const id = document.getElementById('product-id').value;
            const data = {
                nama: document.getElementById('nama').value,
                kategori: document.getElementById('kategori').value,
                harga: parseFloat(document.getElementById('harga').value),
                _token: csrfToken
            };

            const url = id ? `/products/${id}` : '/products';
            const method = id ? 'PUT' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });

                if (!response.ok) {
                    const err = await response.json();
                    throw new Error(err.message || 'Terjadi kesalahan');
                }

                const product = await response.json();
                const formattedPrice = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 2
                }).format(product.harga);

                if (id) {
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    row.innerHTML = `
                        <td>${product.nama}</td>
                        <td>${product.kategori}</td>
                        <td>${formattedPrice}</td>
                        <td class="text-center">
                            <button class="btn btn-warning edit-btn"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    `;
                } else {
                    const newRow = `
                        <tr data-id="${product.id}">
                            <td>${product.nama}</td>
                            <td>${product.kategori}</td>
                            <td>${formattedPrice}</td>
                            <td class="text-center">
                                <button class="btn btn-warning edit-btn"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    `;
                    document.getElementById('product-list').insertAdjacentHTML('beforeend', newRow);
                }

                // Update counter
                updateProductCount();

                // Reset form
                document.getElementById('product-form').reset();
                document.getElementById('product-id').value = '';
                document.getElementById('form-title').textContent = 'Tambah Produk';
                document.getElementById('btn-cancel').style.display = 'none';

            } catch (error) {
                console.error('Error:', error);
                alert('Gagal menyimpan: ' + error.message);
            }
        });

        // Event delegation untuk edit & hapus
        document.getElementById('product-list').addEventListener('click', async function(e) {
            const row = e.target.closest('tr');
            if (!row) return;

            const id = row.dataset.id;

            if (e.target.closest('.edit-btn')) {
                const cells = row.querySelectorAll('td');
                document.getElementById('product-id').value = id;
                document.getElementById('nama').value = cells[0].textContent;
                document.getElementById('kategori').value = cells[1].textContent;
                const priceText = cells[2].textContent.replace(/[^0-9,]/g, '').replace(',', '.');
                document.getElementById('harga').value = parseFloat(priceText);
                document.getElementById('form-title').textContent = 'Edit Produk';
                document.getElementById('btn-cancel').style.display = 'inline';
            }

            if (e.target.closest('.delete-btn')) {
                if (!confirm('Yakin hapus produk ini?')) return;
                try {
                    const response = await fetch(`/products/${id}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': csrfToken }
                    });
                    if (response.ok) {
                        row.remove();
                        updateProductCount();
                    } else {
                        throw new Error('Gagal menghapus');
                    }
                } catch (error) {
                    alert('Gagal menghapus produk.');
                }
            }
        });

        // Batal edit
        document.getElementById('btn-cancel').addEventListener('click', function() {
            document.getElementById('product-form').reset();
            document.getElementById('product-id').value = '';
            document.getElementById('form-title').textContent = 'Tambah Produk';
            this.style.display = 'none';
        });

        // Update counter
        function updateProductCount() {
            const count = document.querySelectorAll('#product-list tr').length;
            document.getElementById('product-count').textContent = `${count} produk`;
        }

        // Initial count
        updateProductCount();
    </script>
</body>
</html><?php /**PATH C:\Users\SISWA RPL9\Documents\Anonymous_XI-RPL\latihan-coding\laravel\tokoOnline\resources\views/products/index.blade.php ENDPATH**/ ?>