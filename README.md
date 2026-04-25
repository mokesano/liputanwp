# 📰 LiputanWP — Tema WordPress Portal Berita ala Liputan6

**LiputanWP adalah tema WordPress yang dirancang khusus untuk portal berita, terinspirasi dari tampilan dan fungsionalitas situs berita populer seperti Liputan6. Tema ini menawarkan desain yang modern, responsif, dan kaya fitur untuk memudahkan Anda membangun portal berita profesional dengan cepat.**

---

<p align="center">
  <a href="https://github.com/mokesano/liputanwp">
    <img src="https://img.shields.io/badge/WordPress-5.0%2B-21759B?style=for-the-badge&logo=wordpress&logoColor=white" alt="WordPress Version">
  </a>
  <a href="https://github.com/mokesano/liputanwp/blob/main/LICENSE">
    <img src="https://img.shields.io/badge/license-Apache%202.0-blue?style=for-the-badge" alt="License">
  </a>
  <a href="https://github.com/mokesano/liputanwp/actions">
    <img src="https://img.shields.io/badge/build-passing-brightgreen?style=for-the-badge&logo=github-actions&logoColor=white" alt="Build Status">
  </a>
  <a href="https://github.com/mokesano/liputanwp/releases">
    <img src="https://img.shields.io/badge/release-none%20yet-lightgrey?style=for-the-badge" alt="Release">
  </a>
  <a href="https://github.com/mokesano/liputanwp/security/advisories">
    <img src="https://img.shields.io/badge/security-policy-important?style=for-the-badge&logo=github" alt="Security Policy">
  </a>
</p>

<br>

<p align="center">
  <em>🎨 Desain Mirip Liputan6  ·  ⚡️ Dukungan AMP  ·  🌙 Mode Gelap  ·  🧰 Widget Kustom  ·  📱 Responsif</em>
</p>

---

## 📖 Tentang Tema

LiputanWP adalah tema WordPress open-source yang menghadirkan pengalaman membaca berita yang familiar dan profesional, terinspirasi langsung dari tata letak dan estetika Liputan6. Dibangun dengan pendekatan `developer-first`, tema ini menyediakan fondasi yang kokoh dan fleksibel untuk berbagai kebutuhan portal berita.

Tema ini dikembangkan oleh **Wizdam Archon** dan didistribusikan di bawah lisensi Apache 2.0, sehingga bebas digunakan dan dimodifikasi untuk proyek komersial maupun non-komersial.

---

## ✨ Fitur Utama

| 🔧 Fitur | 📝 Deskripsi |
| :--- | :--- |
| **Desain Mirip Liputan6** | Tata letak dan estetika yang familiar bagi pembaca berita Indonesia. |
| **Responsif** | Tampilan optimal di desktop, tablet, dan ponsel. |
| **Dukungan AMP** | Memiliki *stylesheet* khusus untuk AMP (`style-amp.css`), memastikan halaman berita Anda mobile-friendly. |
| **Mode Gelap** | Fitur `darkmode` yang dapat diaktifkan untuk kenyamanan membaca. |
| **Optimasi SEO** | Dibangun dengan dukungan untuk plugin SEO populer seperti Yoast SEO. |
| **Widget Kustom** | Menyediakan area widget khusus untuk menambah fungsionalitas *sidebar*. |
| **Halaman Arsip & Kategori** | Template khusus untuk menampilkan arsip berita dan kategori. |
| **Halaman Author** | Menampilkan profil penulis berita. |
| **Kustomisasi Mudah** | File CSS terpisah (`style-desktop.css`, `style-mobile.css`) memudahkan penyesuaian tampilan. |
| **Lisensi Apache 2.0** | Bebas digunakan dan dimodifikasi. |

---

## 🚀 Instalasi

### Persyaratan Sistem

| Perangkat Lunak | Versi Minimum |
| :--- | :--- |
| WordPress | **5.0** atau lebih tinggi |
| PHP | **7.0** atau lebih tinggi |
| MySQL | **5.6** atau lebih tinggi (atau MariaDB **10.0**+) |

### Langkah Instalasi

1.  Unduh tema sebagai file `.zip` dari [halaman rilis](https://github.com/mokesano/liputanwp/releases) atau dengan mengkloning repositori ini.
2.  Masuk ke dashboard WordPress Anda.
3.  Buka menu **Appearance** > **Themes**.
4.  Klik tombol **Add New**, lalu pilih **Upload Theme**.
5.  Pilih file `liputanwp.zip` yang telah Anda unduh dan klik **Install Now**.
6.  Setelah instalasi selesai, klik **Activate**.

---

## 🏗️ Struktur Tema

```
liputanwp/
├── assets/
│   ├── css/
│   │   ├── admin.css
│   │   ├── font.css
│   │   ├── menu-image.css
│   │   ├── normalize.css
│   │   ├── style-amp.css
│   │   ├── style-desktop.css
│   │   └── style-mobile.css
│   ├── fonts/
│   ├── icon/
│   ├── img/
│   └── js/
├── inc/
├── template-parts/
├── widget/
├── 404.php
├── archive.php
├── author.php
├── category.php
├── comments.php
├── footer.php
├── functions.php
├── header.php
├── index.php
└── style.css
```

---

## ⚙️ Kustomisasi

Anda dapat menyesuaikan tema melalui:

*   **Customizer WordPress**: Buka **Appearance** > **Customize** untuk mengubah pengaturan dasar.
*   **File CSS**: Edit file di dalam folder `assets/css/` untuk mengubah tampilan secara langsung.
*   **Widget**: Tambahkan widget di area *sidebar* melalui **Appearance** > **Widgets**.

---

## 🖥️ Demo

Anda dapat melihat pratinjau tema di: [https://wizdam.sangia.org/demo/liputanwp/](https://wizdam.sangia.org/demo/liputanwp/)

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Jika Anda ingin melaporkan bug, mengusulkan fitur baru, atau mengirimkan *pull request*, silakan ikuti panduan berikut:

1.  Fork repositori ini.
2.  Buat branch baru (`git checkout -b fitur-keren`).
3.  Commit perubahan Anda (`git commit -m 'Menambahkan fitur keren'`).
4.  Push ke branch (`git push origin fitur-keren`).
5.  Buat Pull Request.

Proyek ini mengadopsi [Contributor Covenant Code of Conduct](https://github.com/mokesano/liputanwp/blob/main/CODE_OF_CONDUCT.md). Dengan berpartisipasi, Anda diharapkan untuk menegakkan kode etik ini.

---

## 🔒 Keamanan

Keamanan adalah prioritas. **Jangan umbar kerentanan secara publik.**

*   **Pelaporan**: Kirim laporan kerentanan ke [security@sangia.org](mailto:security@sangia.org)
*   **Respon**: Pengelola utama akan merespon dalam 48 jam.
*   **Advisori**: Dipublikasikan di [GitHub Security Advisories](https://github.com/mokesano/liputanwp/security/advisories) setelah perbaikan selesai.

Detail lengkap terdapat di [Security Policy](https://github.com/mokesano/liputanwp/blob/main/SECURITY.md).

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah **Apache License 2.0**. Lihat [LICENSE](https://github.com/mokesano/liputanwp/blob/main/LICENSE) untuk teks lengkapnya.

> **Catatan**: Tema ini juga menyertakan file `license.txt` di direktori utama yang mungkin berisi informasi lisensi tambahan.  

---

## 🙏 Kredit & Pengakuan

| 🏷️ Atribusi | 🔗 Referensi |
| :--- | :--- |
| **Pengembang** | [Wizdam Archon](https://www.archon.com/) |
| **Maintainer** | [Rochmady (mokesano)](https://github.com/mokesano) |
| **Terinspirasi oleh** | Liputan6 |
| **Lisensi** | [Apache License 2.0](http://www.apache.org/licenses/) |
| **Demo Tema** | [https://wizdam.sangia.org/demo/liputanwp/](https://wizdam.sangia.org/demo/liputanwp/) |

---

<p align="center">
  <br>
  <sub>Dibangun dengan ❤️ untuk komunitas penerbitan berita Indonesia</sub>
  <br><br>
  <a href="https://github.com/mokesano/liputanwp/stargazers">
    <img src="https://img.shields.io/github/stars/mokesano/liputanwp?style=social" alt="GitHub Stars">
  </a>
  <a href="https://github.com/mokesano/liputanwp/network/members">
    <img src="https://img.shields.io/github/forks/mokesano/liputanwp?style=social" alt="GitHub Forks">
  </a>
  <br><br>
  <sub>&copy; 2026 Rochmady. Dilisensikan di bawah Apache License 2.0.</sub>
</p>