import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/polamakanitem.dart';
import 'package:flutter/material.dart';

class PolaMakanPage extends StatefulWidget {
  @override
  State<PolaMakanPage> createState() => _PolaMakanPageState();
}

class _PolaMakanPageState extends State<PolaMakanPage> {
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
              "Pola Makan",
              style: poppinstext.copyWith(fontSize: 18, fontWeight: semiBold),
            ),
            SizedBox(
              height: 4,
            ),
            Text(
              "Cek pola makan Anda secara teratur!",
              style: poppinstext.copyWith(fontSize: 12, fontWeight: reguler),
            ),
            Container(
              margin: EdgeInsets.only(top: 40, left: 55, right: 55),
              child: GridView.count(
                crossAxisCount: 2,
                shrinkWrap: true,
                physics: NeverScrollableScrollPhysics(),
                childAspectRatio: 120 / 120,
                crossAxisSpacing: 10,
                mainAxisSpacing: 10,
                children: [
                  PolaMakanItem(
                    title: "Sarapan",
                    img: "assets/pm1.png",
                    onPress: () {
                      Navigator.pushNamed(context, "/detail-pm");
                    },
                  ),
                  PolaMakanItem(
                    title: "Makan Siang",
                    img: "assets/pm2.png",
                    onPress: () {},
                  ),
                  PolaMakanItem(
                    title: "Makan Malam",
                    img: "assets/pm3.png",
                    onPress: () {},
                  ),
                  PolaMakanItem(
                    title: "Snacks",
                    img: "assets/pm4.png",
                    onPress: () {},
                  ),
                ],
              ),
            )
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
