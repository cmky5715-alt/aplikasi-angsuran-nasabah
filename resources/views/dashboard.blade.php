<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Entry Angsuran Nasabah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen">

    <!-- Top Navbar Berwarna -->
    <nav class="bg-gradient-to-r from-indigo-900 via-purple-900 to-emerald-900 border-b border-white/10 shadow-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center font-extrabold text-slate-950 shadow-lg">
                    AN
                </div>
                <div>
                    <h1 class="text-lg font-extrabold tracking-tight text-white">SI-ANGSURAN NASABAH</h1>
                    <p class="text-xs text-emerald-300">Sistem Informasi Kelompok, Pinjaman & Angsuran</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/30">
                    ● Server Aktif
                </span>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <!-- 4 Kartu Statistik Berwarna -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
            <div class="p-5 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-700 shadow-lg shadow-emerald-950/50">
                <p class="text-xs font-semibold uppercase tracking-wider text-emerald-100">Total Angsuran Masuk</p>
                <h2 id="statTotalMasuk" class="text-2xl font-extrabold text-white mt-1">Rp 0</h2>
                <p class="text-xs text-emerald-100 mt-2">Akumulasi pembayaran lunas</p>
            </div>
            <div class="p-5 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-700 shadow-lg shadow-indigo-950/50">
                <p class="text-xs font-semibold uppercase tracking-wider text-indigo-100">Total Transaksi</p>
                <h2 id="statTransaksi" class="text-2xl font-extrabold text-white mt-1">0 Transaksi</h2>
                <p class="text-xs text-indigo-100 mt-2">Data angsuran tercatat</p>
            </div>
            <div class="p-5 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-orange-950/50">
                <p class="text-xs font-semibold uppercase tracking-wider text-amber-100">Total Denda / Bunga</p>
                <h2 id="statDenda" class="text-2xl font-extrabold text-white mt-1">Rp 0</h2>
                <p class="text-xs text-amber-100 mt-2">Akumulasi jasa & denda</p>
            </div>
            <div class="p-5 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-700 shadow-lg shadow-rose-950/50">
                <p class="text-xs font-semibold uppercase tracking-wider text-pink-100">Kelompok & Nasabah</p>
                <h2 id="statNasabah" class="text-2xl font-extrabold text-white mt-1">0 Nasabah</h2>
                <p class="text-xs text-pink-100 mt-2">Terdaftar di sistem</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Input Angsuran -->
            <div class="lg:col-span-5 bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-2xl">
                <h3 class="text-lg font-bold text-white mb-1 flex items-center gap-2">
                    <span class="w-2.5 h-6 rounded-full bg-gradient-to-b from-emerald-400 to-cyan-500"></span>
                    Form Entry Angsuran Nasabah
                </h3>
                <p class="text-xs text-slate-400 mb-5">Masukkan rincian setoran angsuran pinjaman nasabah</p>

                <form id="formAngsuran" class="space-y-4">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">No. Pinjaman / Kontrak</label>
                            <input type="text" id="kodePinjaman" required placeholder="PJN-2026-001"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Kelompok Nasabah</label>
                            <select id="kelompok" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                                <option value="Kelompok Melati">Kelompok Melati</option>
                                <option value="Kelompok Mawar">Kelompok Mawar</option>
                                <option value="Kelompok Anggrek">Kelompok Anggrek</option>
                                <option value="Mandiri / Reguler">Mandiri / Reguler</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Nama Lengkap Nasabah</label>
                        <input type="text" id="namaNasabah" required placeholder="Contoh: Siti Aminah"
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Angsuran Ke-</label>
                            <input type="number" id="angsuranKe" required min="1" value="1"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Tanggal Bayar</label>
                            <input type="date" id="tanggalBayar" required
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Angsuran Pokok (Rp)</label>
                            <input type="number" id="pokok" required min="0" value="500000"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Jasa / Denda (Rp)</label>
                            <input type="number" id="denda" required min="0" value="25000"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Metode Pembayaran</label>
                        <select id="metode" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white focus:outline-none focus:border-emerald-400">
                            <option value="Tunai">Tunai / Kasir</option>
                            <option value="QRIS">QRIS</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Kolektor Kelompok">Kolektor Kelompok</option>
                        </select>
                    </div>

                    <div class="p-4 rounded-xl bg-gradient-to-r from-emerald-950 to-teal-900 border border-emerald-500/30 flex justify-between items-center">
                        <span class="text-xs font-semibold text-emerald-200">Total Bayar Otomatis:</span>
                        <span id="previewTotal" class="text-lg font-extrabold text-emerald-300">Rp 525.000</span>
                    </div>

                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 hover:from-emerald-400 hover:to-cyan-400 text-slate-950 font-extrabold text-sm shadow-lg shadow-emerald-500/25 transition">
                        + Simpan Data Angsuran
                    </button>
                </form>
            </div>

            <!-- Tabel Riwayat Angsuran -->
            <div class="lg:col-span-7 bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-2xl">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-5">
                    <div>
                        <h3 class="text-lg font-bold text-white">Daftar Transaksi Angsuran</h3>
                        <p class="text-xs text-slate-400">Data tersimpan secara real-time</p>
                    </div>
                    <input type="text" id="cariInput" placeholder="Cari nama / nomor kontrak..."
                        class="px-3.5 py-2 rounded-xl bg-slate-800 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-800 text-xs uppercase text-slate-400">
                                <th class="py-3 px-3">Nasabah & Kelompok</th>
                                <th class="py-3 px-3">Ke-</th>
                                <th class="py-3 px-3">Total Bayar</th>
                                <th class="py-3 px-3">Metode</th>
                                <th class="py-3 px-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelBody" class="divide-y divide-slate-800/80 text-sm"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        const formatRp = (n) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(n);
        document.getElementById('tanggalBayar').valueAsDate = new Date();

        let dataAngsuran = JSON.parse(localStorage.getItem('laravel_angsuran_data')) || [
            { id: 1, kode: 'PJN-2026-001', kelompok: 'Kelompok Melati', nama: 'Budi Santoso', ke: 3, tanggal: '2026-10-29', pokok: 500000, denda: 25000, metode: 'QRIS' },
            { id: 2, kode: 'PJN-2026-002', kelompok: 'Kelompok Mawar', nama: 'Siti Rahmawati', ke: 5, tanggal: '2026-10-29', pokok: 750000, denda: 0, metode: 'Tunai' }
        ];

        function updatePreview() {
            const p = Number(document.getElementById('pokok').value) || 0;
            const d = Number(document.getElementById('denda').value) || 0;
            document.getElementById('previewTotal').textContent = formatRp(p + d);
        }
        document.getElementById('pokok').addEventListener('input', updatePreview);
        document.getElementById('denda').addEventListener('input', updatePreview);

        function renderTabel(filter = '') {
            const tbody = document.getElementById('tabelBody');
            tbody.innerHTML = '';
            const filtered = dataAngsuran.filter(item =>
                item.nama.toLowerCase().includes(filter.toLowerCase()) ||
                item.kode.toLowerCase().includes(filter.toLowerCase())
            );

            let totalMasuk = 0, totalDenda = 0;
            dataAngsuran.forEach(i => { totalMasuk += (i.pokok + i.denda); totalDenda += i.denda; });

            document.getElementById('statTotalMasuk').textContent = formatRp(totalMasuk);
            document.getElementById('statTransaksi').textContent = dataAngsuran.length + ' Transaksi';
            document.getElementById('statDenda').textContent = formatRp(totalDenda);
            document.getElementById('statNasabah').textContent = new Set(dataAngsuran.map(x => x.nama)).size + ' Nasabah';

            filtered.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-800/50 transition';
                tr.innerHTML = `
                    <td class="py-3.5 px-3">
                        <div class="font-bold text-white">${item.nama}</div>
                        <div class="text-xs text-emerald-400">${item.kode} • ${item.kelompok}</div>
                    </td>
                    <td class="py-3.5 px-3">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-400/30">
                            Ke-${item.ke}
                        </span>
                    </td>
                    <td class="py-3.5 px-3">
                        <div class="font-bold text-emerald-400">${formatRp(item.pokok + item.denda)}</div>
                        <div class="text-xs text-slate-400">${item.tanggal}</div>
                    </td>
                    <td class="py-3.5 px-3">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-cyan-500/20 text-cyan-300">
                            ${item.metode}
                        </span>
                    </td>
                    <td class="py-3.5 px-3 text-right">
                        <button onclick="hapusData(${item.id})" class="text-xs px-2.5 py-1 rounded-lg bg-rose-500/20 text-rose-300 hover:bg-rose-500 hover:text-white transition">
                            Hapus
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        document.getElementById('formAngsuran').addEventListener('submit', function(e) {
            e.preventDefault();
            const baru = {
                id: Date.now(),
                kode: document.getElementById('kodePinjaman').value,
                kelompok: document.getElementById('kelompok').value,
                nama: document.getElementById('namaNasabah').value,
                ke: Number(document.getElementById('angsuranKe').value),
                tanggal: document.getElementById('tanggalBayar').value,
                pokok: Number(document.getElementById('pokok').value),
                denda: Number(document.getElementById('denda').value),
                metode: document.getElementById('metode').value
            };
            dataAngsuran.unshift(baru);
            localStorage.setItem('laravel_angsuran_data', JSON.stringify(dataAngsuran));
            this.reset();
            document.getElementById('tanggalBayar').valueAsDate = new Date();
            document.getElementById('pokok').value = 500000;
            document.getElementById('denda').value = 25000;
            updatePreview();
            renderTabel();
        });

        function hapusData(id) {
            dataAngsuran = dataAngsuran.filter(i => i.id !== id);
            localStorage.setItem('laravel_angsuran_data', JSON.stringify(dataAngsuran));
            renderTabel();
        }

        document.getElementById('cariInput').addEventListener('input', (e) => renderTabel(e.target.value));
        renderTabel();
    </script>
</body>
</html>