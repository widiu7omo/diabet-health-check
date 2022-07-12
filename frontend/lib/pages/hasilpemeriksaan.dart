import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/hpitem.dart';
import 'package:flutter/material.dart';

class HasilPemeriksaanPage extends StatefulWidget {
  @override
  State<HasilPemeriksaanPage> createState() => _HasilPemeriksaanPageState();
}

class _HasilPemeriksaanPageState extends State<HasilPemeriksaanPage> {
  var showNav = false;
  @override
  Widget build(BuildContext context) {
    Widget content() {
      return Container(
        margin: EdgeInsets.only(top: 88, left: 24, right: 24),
        child: ListView(
          children: [
            Text(
              "Hasil Pemeriksaan",
              style: poppinstext.copyWith(
                  fontSize: 18, fontWeight: semiBold, color: Colors.black),
            ),
            SizedBox(
              height: 16,
            ),
            HpItem(
              title: "Pemeriksaan 1",
              desc: "Senin, 01 November 2021",
              onPress: () {
                Navigator.pushNamed(context, "/detailhp");
              },
            ),
            HpItem(
              title: "Pemeriksaan 2",
              desc: "Senin, 08 November 2021",
              onPress: () {},
            ),
          ],
        ),
      );
    }

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
