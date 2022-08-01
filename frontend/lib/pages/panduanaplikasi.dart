import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';
import 'package:flutter_markdown/flutter_markdown.dart';

class PanduanAplikasi extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        elevation: 0,
        backgroundColor: primaryColor,
        title: Text("Tentang Aplikasi"),
      ),
      body: Container(child: Markdown(data: '''
Panduan Aplikasi
Aplikasi ini dapat digunakan pada perangkat ponsel dengan berbasis android. Aplikasi ini dapat berfungsi dengan baik pada perangkat android dan dapat digunakan untuk memonitoring kesehatan penderita diabetes. Penggunaan aplikasi ini dapat dilakukan dengan:
1.  Melakukan register terlebih dahulu pada halaman register.
2.  Apabila sudah memiliki akun maka dapat dilanjutnya dengan melakukan login. Masukkan alamat email dan password.
3.  Jika sudah berhasil login maka akan tampil halaman awal dari aplikasi yang berisikan hasil pemeriksaan, pola makan, pola obat, jadwal checkup dan konsultasi.
4.  Hasil pemeriksaan dapat dilihat dengan mengklik bagian “Lihat Detail” kemudian akan menampilkan rincian hasil pemeriksaan yang suda dilakukan oleh dokter.
5.  Pengguna dapat mengklik halaman pola makan untuk mengetahui jenis makanan apa yang dianjurkan ataupun yang tidak dianjurkan.
6.  Pengguna dapat mengklik halaman pola obat untuk mengetahui jenis obat dan waktu untuk meminum obat.
7.  Pengguna dapat mengklik jadwal checkup untuk mengetahui Riwayat checkup yang sudah selesai atau yang akan dijadwalkan.
8.  Pengguna juga dapat melakukan konsultasi dengan mengklik menu konsultasi dan memilih nomor whatsapp dokter yang sesuai dengan pemeriksaan.
9.  Pengguna dapat menambahkan profil pada menu profil saya.
10.  Pengguna juga dapat mengganti password dengan mengklik halaman ubah password.
11.  Pengguna dapat melihat panduan dengan mengklik halaman Panduan Aplikasi.
12.  Pengguna dapat melihat Tentang Kami yang terdapat pada halaman Tentang Kami.
Apabila pengguna mengalami kesulitan, atau ingin menyampaikan saran bisa menghubungi kami dengan mengirimkan email pada [diabeteshealthcare@gmail.com](mailto:diabeteshealthcare@gmail.com). Terimakasih
''')),
    );
  }
}
