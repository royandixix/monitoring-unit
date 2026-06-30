
# Dashboard Monitoring Unit

Dashboard Monitoring Unit adalah aplikasi web berbasis Laravel dan Filament untuk memantau readiness unit secara real-time. Sistem ini dibuat untuk menggantikan monitoring manual berbasis Excel agar data unit lebih rapi, cepat diperbarui, dan mudah dianalisis.

## Fitur Utama

- Login admin/user melalui panel Filament.
- Dashboard monitoring unit real-time dengan auto-refresh.
- Summary status unit:
  - Total Unit
  - ON
  - BD / Breakdown
  - STB READY
  - STS NO OP
  - NO INFO
  - PA %
  - UA %
- Tabel Monitoring Unit Terbaru.
- Kolom PIC otomatis berdasarkan user yang melakukan update.
- Input manual status unit jika pengawas belum melakukan laporan.
- Master Data:
  - Project
  - Jenis Unit
  - Unit / Nomor Lambung
  - Aktivitas Unit
  - Lokasi Unit
- Riwayat status unit.
- Dropdown/searchable unit agar nomor lambung tidak salah penulisan.
- Status unit yang belum dilaporkan tetap tampil sebagai NO INFO.

## Teknologi

- Laravel
- Filament Admin Panel
- Livewire
- MySQL
- PHP
- Blade
- Tailwind CSS

## Konsep Sistem

Sistem menyimpan status terbaru unit pada tabel `units`, sedangkan setiap perubahan disimpan sebagai histori pada tabel `unit_status_logs`.

Dengan konsep ini, dashboard hanya menghitung status terbaru dari setiap unit, sehingga satu unit tidak terhitung berkali-kali.

Alur utama:

1. User login ke sistem.
2. User memilih unit dari dropdown/search.
3. User mengubah status, aktivitas, posisi, dan start BD jika diperlukan.
4. Sistem menyimpan status terbaru ke tabel `units`.
5. Sistem menyimpan riwayat perubahan ke tabel `unit_status_logs`.
6. Dashboard otomatis menampilkan data terbaru.
7. Nama user yang melakukan update otomatis tercatat sebagai PIC.

## Status Unit

| Status | Keterangan |
|---|---|
| ON | Unit sedang beroperasi |
| BD | Unit breakdown / rusak |
| STB READY | Unit standby dan siap digunakan |
| STS NO OP | Unit standby karena tidak ada operator |
| NO INFO | Unit belum dilaporkan |

## Perhitungan PA dan UA

Available Unit:
ON + STB READY + STS NO OP


Dashboard

Monitoring
- Input Manual Unit
- Update Status Unit
- Riwayat Status

Master Data
- Proyek
- Jenis Unit
- Unit
- Aktivitas Unit
- Lokasi Unit# dashboard-monitoring-unit
