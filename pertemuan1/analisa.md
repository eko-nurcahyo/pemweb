Docker adalah platform containerization yang memungkinkan pengembang untuk membuat, menyebarkan, dan menjalankan aplikasi dalam container. Container ini merupakan lingkungan yang terisolasi, ringan, dan portabel, sehingga memudahkan dalam pengembangan, pengujian, dan deployment aplikasi.

Berikut adalah analisis mengenai Docker:

## 1. Kelebihan Docker:
Portabilitas: Aplikasi dalam container Docker dapat dijalankan di berbagai lingkungan tanpa perlu memodifikasi kode atau konfigurasi.

Efisiensi Sumber Daya: Container berbagi kernel sistem operasi, sehingga lebih ringan dibandingkan virtual machine (VM).

Kecepatan Deployment: Proses build, test, dan deployment menjadi lebih cepat dan konsisten.

Isolasi Aplikasi: Setiap container berjalan terisolasi, sehingga tidak saling mengganggu meski berada di server yang sama.

Kemudahan Pengelolaan Dependensi: Semua dependensi aplikasi dapat dikemas dalam satu container.

Skalabilitas: Mudah untuk scaling aplikasi dengan container yang terdistribusi.

CI/CD: Integrasi dengan pipeline CI/CD untuk otomatisasi deployment.

## 2. Kekurangan Docker:
Kompleksitas Jaringan: Pengaturan jaringan yang kompleks jika berhadapan dengan banyak container dan node.

Keamanan: Karena berbagi kernel OS, terdapat risiko keamanan jika container tidak dikonfigurasi dengan benar.

Kompatibilitas Sistem Operasi: Docker bekerja optimal di Linux; untuk Windows dan macOS, membutuhkan layer tambahan.

Manajemen Data: Pengelolaan data yang persisten membutuhkan perhatian khusus.

Overhead Learning: Butuh pembelajaran mendalam untuk konfigurasi yang optimal, terutama dalam skenario skala besar.

### 5W + 1H
- **What:** Membangun lingkungan pengembangan website menggunakan Docker dan Nginx.
- **Why:** Untuk mempermudah pengelolaan server secara lokal dan menyimulasikan environment production.
- **Who:** Mahasiswa pemrograman website yang belajar deployment sederhana.
- **When:** Saat memulai belajar web development dengan basis container.
- **Where:** Di lingkungan lokal menggunakan Docker Desktop atau Linux.
- **How:** Menggunakan Docker Compose untuk memanajemen service server web.

### SWOT
- **Strengths (Kelebihan):**
  - Portabilitas tinggi.
  - Deployment lebih cepat.
- **Weaknesses (Kekurangan):**
  - Memerlukan pengetahuan dasar Docker.
- **Opportunities (Peluang):**
  - Implementasi pada project nyata atau production.
- **Threats (Ancaman):**
  - Ketergantungan pada container jika tidak memahami konfigurasi manual.

HTML (HyperText Markup Language) adalah bahasa pemrograman yang digunakan untuk membuat struktur dan konten halaman web. HTML merupakan bahasa dasar yang digunakan untuk membuat halaman web. 