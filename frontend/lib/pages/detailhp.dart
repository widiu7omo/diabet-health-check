import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:flutter/material.dart';

class DetailHpPage extends StatefulWidget {
  @override
  State<DetailHpPage> createState() => _DetailHpPageState();
}

class _DetailHpPageState extends State<DetailHpPage> {
  var showNav = false;
  @override
  Widget build(BuildContext context) {
    Widget content() {
      return Container(
        margin: EdgeInsets.only(top: 84, left: 24, right: 24),
        child: ListView(
          children: [
            Text(
              "Detail Hasil Pemeriksaan",
              style: poppinstext.copyWith(
                  fontSize: 18, fontWeight: semiBold, color: Colors.black),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "Pemeriksaan 1",
              style: poppinstext.copyWith(fontSize: 16, fontWeight: semiBold),
            ),
            Container(
              margin: EdgeInsets.only(top: 5),
              height: 1,
              color: Colors.black,
            ),
            Text(
              "Senin, 01 November 2021",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 18,
            ),
            Text(
              "Nama Dokter",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            Text(
              "Dr Ria",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "Nama Pasien",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            Text(
              "Anisa Tri Astuti",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "Detail Pembahasan",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            Text(
              "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            Text(
              "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            Text(
              "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "Hasil",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            SizedBox(
              height: 10,
            ),
            Container(
              child: Container(
                  child: Text(
                "Beresiko Diabetes",
                style: poppinstext.copyWith(
                    fontSize: 14,
                    fontWeight: semiBold,
                    color: Color(0xffF5985A)),
              )),
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
