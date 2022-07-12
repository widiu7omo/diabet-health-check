import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:flutter/material.dart';

class DetailJadwal extends StatefulWidget {
  @override
  State<DetailJadwal> createState() => _DetailJadwalState();
}

class _DetailJadwalState extends State<DetailJadwal> {
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
              "Jadwal Checkup",
              style: poppinstext.copyWith(fontSize: 18, fontWeight: semiBold),
            ),
            SizedBox(
              height: 12,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Checkup 1",
                      style: poppinstext.copyWith(
                          fontSize: 16, fontWeight: semiBold),
                    ),
                    Container(
                      height: 1,
                      width: 85,
                      color: Colors.black,
                    ),
                    Text(
                      "Senin, 01 November 2021",
                      style: poppinstext.copyWith(
                          fontSize: 14, fontWeight: reguler),
                    )
                  ],
                ),
                Container(
                  padding: EdgeInsets.symmetric(vertical: 2, horizontal: 4),
                  decoration: BoxDecoration(
                      color: primaryColor,
                      borderRadius: BorderRadius.circular(4)),
                  child: Text(
                    "Selesai",
                    style: poppinstext.copyWith(
                        fontSize: 12, fontWeight: semiBold),
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 45,
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
              "Lokasi",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            Text(
              "Puskesmas Kembangan",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
            ),
            SizedBox(
              height: 10,
            ),
            Text(
              "Catatan Checkup",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: semiBold),
            ),
            Text(
              "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elementum faucibus ut viverra quisque non, facilisis volutpat est. Ultrices in aliquet ultricies proin dapibus habitasse elit turpis feugiat.",
              style: poppinstext.copyWith(fontSize: 14, fontWeight: reguler),
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
