import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/waitem.dart';
import 'package:flutter/material.dart';

class KonsultasiPage extends StatefulWidget {
  @override
  State<KonsultasiPage> createState() => _KonsultasiPageState();
}

class _KonsultasiPageState extends State<KonsultasiPage> {
  var showNav = false;

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return Container(
        margin: EdgeInsets.only(top: 76, left: 24, right: 24),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              "Konsulatsi Dokter",
              style: poppinstext.copyWith(fontSize: 18, fontWeight: semiBold),
            ),
            SizedBox(
              height: 4,
            ),
            Text(
              "Silahkan pilih nomor sesuai dengan Dokter yang memeriksa Anda",
              style: poppinstext.copyWith(fontSize: 12, fontWeight: reguler),
            ),
            SizedBox(
              height: 24,
            ),
            WaItem(
              name: "Dr. Ria Saraswati",
            ),
            WaItem(
              name: "Dr. Andrian Rudi",
            ),
            WaItem(
              name: "Dr. Dian Sulastri",
            ),
          ],
        ),
      );
    }

    return Scaffold(
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
