import 'package:diabetesapps/models/jadwal_checkup.dart';
import 'package:diabetesapps/models/pemeriksaan.dart';
import 'package:diabetesapps/pages/register.dart';
import 'package:flutter/material.dart';

import 'models/pola_makan.dart';
import 'pages/changepw.dart';
import 'pages/detailhp.dart';
import 'pages/detailjadwa.dart';
import 'pages/detailpolamakan.dart';
import 'pages/hasilpemeriksaan.dart';
import 'pages/home.dart';
import 'pages/jadwalcheckup.dart';
import 'pages/konsultasi.dart';
import 'pages/login.dart';
import 'pages/myprofile.dart';
import 'pages/polamakan.dart';
import 'pages/polaobat.dart';
import 'pages/splash.dart';

class RouteGenerator {
  static Route<dynamic> generateRoute(RouteSettings settings) {
    // Getting arguments passed in while calling Navigator.pushNamed
    final args = settings.arguments;
    switch (settings.name) {
      case "/":
        return MaterialPageRoute(builder: (context) => SplashPage());
      case "/register":
        return MaterialPageRoute(builder: (context) => RegisterPage());
      case "/login":
        return MaterialPageRoute(builder: (context) => LoginPage());
      case "/home":
        return MaterialPageRoute(builder: (context) => HomePage());
      case "/profile":
        return MaterialPageRoute(builder: (context) => MyProfile());
      case "/changepw":
        return MaterialPageRoute(builder: (context) => ChangePasswordPage());
      case "/hasilp":
        return MaterialPageRoute(builder: (context) => HasilPemeriksaanPage());
      case "/detailhp":
        return MaterialPageRoute(
            builder: (context) => DetailHpPage(arg: args as Pemeriksaan));
      case "/pola-makan":
        return MaterialPageRoute(
            builder: (context) =>
                PolaMakanPage(arg: args as Map<String, dynamic>));
      case "/detail-pm":
        return MaterialPageRoute(
            builder: (context) => DetailPolaMakanPage(arg: args as PolaMakan));
      case "/pola-obat":
        return MaterialPageRoute(
            builder: (context) =>
                PolaObatPage(arg: args as Map<String, dynamic>));
      case "/jadwal-cu":
        return MaterialPageRoute(builder: (context) => JadwalCheckupPage());
      case "/jadwal-detail":
        return MaterialPageRoute(
            builder: (context) => DetailJadwal(arg: args as JadwalCheckup));
      case "/konsultasi":
        return MaterialPageRoute(builder: (context) => KonsultasiPage());
      default:
        return MaterialPageRoute(
            builder: (_) => Scaffold(
                body: SafeArea(child: Center(child: Text('Route Error')))));
    }
  }
}
