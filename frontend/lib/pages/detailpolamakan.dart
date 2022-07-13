import 'package:diabetesapps/models/pola_makan.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:flutter/material.dart';

class DetailPolaMakanPage extends StatefulWidget {
  final PolaMakan arg;

  const DetailPolaMakanPage({super.key, required this.arg});

  @override
  State<DetailPolaMakanPage> createState() => _DetailPolaMakanPageState();
}

class _DetailPolaMakanPageState extends State<DetailPolaMakanPage> {
  var showNav = false;
  late PolaMakan polaMakan;

  void initState() {
    polaMakan = widget.arg;
    super.initState();
  }

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
              polaMakan.category,
              style: poppinstext.copyWith(fontSize: 12, fontWeight: reguler),
            ),
            SizedBox(
              height: 18,
            ),
            Text(
              "Yang dianjurkan oleh dokter",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              polaMakan.dianjurkan,
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
            SizedBox(
              height: 16,
            ),
            Text(
              "Yang dilarang oleh dokter",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              polaMakan.dilarang,
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
            // Text(
            //   "* Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            //   style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            // ),
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
