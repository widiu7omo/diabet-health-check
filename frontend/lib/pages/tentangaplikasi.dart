import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';
import 'package:flutter_markdown/flutter_markdown.dart';

class TentangAplikasi extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: primaryColor,
        elevation: 0,
        title: Text("Tentang Aplikasi"),
      ),
      body: Container(
        padding: const EdgeInsets.all(16),
        child: Text(
          '''
Diabetes Health Care adalah aplikasi yang dapat digunakan untuk memonitoring penderita dan orang yang beresiko sakit diabetes. Aplikasi Diabates Health Care ini digunakan sebagai sarana penghubung pelayanan kesehatan dengan pasien penderita diabetes. Aplikasi Diabetes Health Care siap digunakan untuk membantu memonitoring dan jadwal checkup para penderita diabetes sejak setelah pemeriksaan dan didiagnosa. Diabetes Health Care dapat membantu para penderita diabetes memperoleh pengawasan, peringatan untuk melakukan jadwal checkup, hasil pemeriksaan yang sudah dilakukan, serta adanya dukungan diri untuk menyemangati para penderita diabetes agar lebih peduli dan segera pulih dari diabetes.

Pengguna dapat belajar mengatur pola makan dan pola obat yang sudah dilakukan setelah pemeriksaan dengan dokter. Aplikasi ini juga dilengkapi dengan reminder terhadap kerabat atau keluarga penderita diabetes untuk mengingatkan jadwal checkup. Aplikasi Diabetes Health Care diharapkan mampu menjadi solusi cerdas dengan memanfaatkan perkembangan teknologi khususnya membantu pelayanan kesehatan terhadap para penderita diabetes.
''',
          textAlign: TextAlign.justify,
        ),
      ),
    );
  }
}
