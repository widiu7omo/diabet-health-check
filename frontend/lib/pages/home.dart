import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/monitoritem.dart';
import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  var showNav = false;

  Widget content() {
    return Container(
      margin: EdgeInsets.only(top: 90, left: 24, right: 24),
      child: ListView(
        children: [
          Text(
            "Hai, Anisa Tri Astuti",
            style: poppinstext.copyWith(fontSize: 18, fontWeight: semiBold),
          ),
          Container(
            margin: EdgeInsets.only(top: 30),
            child: Text(
              "Hasil Pemeriksaan terkini :",
              style: poppinstext.copyWith(fontSize: 12, fontWeight: medium),
            ),
          ),
          SizedBox(
            height: 5,
          ),
          Container(
            child: Container(
                child: Text(
              "Beresiko Diabetes",
              style: poppinstext.copyWith(
                  fontSize: 14, fontWeight: semiBold, color: Color(0xffF5985A)),
            )),
          ),
          SizedBox(
            height: 6,
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/hasilp");
            },
            child: Container(
              child: Container(
                  child: Text(
                "Lihat Semua",
                style: poppinstext.copyWith(
                    fontSize: 12, fontWeight: semiBold, color: Colors.black),
              )),
            ),
          ),
          Container(
            child: Container(
                margin: EdgeInsets.only(top: 28),
                child: Text(
                  "Daftar Monitoring",
                  style: poppinstext.copyWith(
                      fontSize: 16, fontWeight: semiBold, color: Colors.black),
                )),
          ),
          SizedBox(
            height: 20,
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/pola-makan");
            },
            child: MonitorItem(
              img: "assets/mo1.png",
              title: "Pola Makan",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/pola-obat");
            },
            child: MonitorItem(
              img: "assets/mo2.png",
              title: "Pola Obat",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/jadwal-cu");
            },
            child: MonitorItem(
              img: "assets/mo3.png",
              title: "Jadwal Checkup",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/konsultasi");
            },
            child: MonitorItem(
              img: "assets/mo4.png",
              title: "Konsultasi Dokter",
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SafeArea(
        child: Stack(
          children: [
            content(),
            showNav ? DrawerNavigator() : SizedBox(),
            HeaderCustom(
              onPress: () {
                this.setState(() {
                  showNav = !showNav;
                });
              },
              openend: showNav,
            ),
          ],
        ),
      ),
    );
  }
}
