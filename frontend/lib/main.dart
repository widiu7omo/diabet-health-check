//@dart=2.9

import 'package:diabetesapps/pages/changepw.dart';
import 'package:diabetesapps/pages/detailhp.dart';
import 'package:diabetesapps/pages/detailjadwa.dart';
import 'package:diabetesapps/pages/detailpolamakan.dart';
import 'package:diabetesapps/pages/hasilpemeriksaan.dart';
import 'package:diabetesapps/pages/home.dart';
import 'package:diabetesapps/pages/jadwalcheckup.dart';
import 'package:diabetesapps/pages/konsultasi.dart';
import 'package:diabetesapps/pages/login.dart';
import 'package:diabetesapps/pages/myprofile.dart';
import 'package:diabetesapps/pages/polamakan.dart';
import 'package:diabetesapps/pages/polaobat.dart';
import 'package:diabetesapps/pages/splash.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(debugShowCheckedModeBanner: false, routes: {
      "/": (context) => SplashPage(),
      "/login": (context) => LoginPage(),
      "/home": (context) => HomePage(),
      "/profile": (context) => MyProfile(),
      "/changepw": (context) => ChangePasswordPage(),
      "/hasilp": (context) => HasilPemeriksaanPage(),
      "/detailhp": (context) => DetailHpPage(),
      "/pola-makan": (context) => PolaMakanPage(),
      "/detail-pm": (context) => DetailPolaMakanPage(),
      "/pola-obat": (context) => PolaObatPage(),
      "/jadwal-cu": (context) => JadwalCheckupPage(),
      "/jadwal-detail": (context) => DetailJadwal(),
      "/konsultasi": (context) => KonsultasiPage()
    });
  }
}
