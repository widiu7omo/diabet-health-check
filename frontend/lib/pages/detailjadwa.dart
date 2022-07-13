import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:flutter/material.dart';

import '../models/jadwal_checkup.dart';

class DetailJadwal extends StatefulWidget {
  final JadwalCheckup arg;

  const DetailJadwal({super.key, required this.arg});

  @override
  State<DetailJadwal> createState() => _DetailJadwalState();
}

class _DetailJadwalState extends State<DetailJadwal> {
  var showNav = false;
  late JadwalCheckup jadwalCheckup;

  @override
  void initState() {
    jadwalCheckup = widget.arg;
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
                      jadwalCheckup.checkup,
                      style: poppinstext.copyWith(
                          fontSize: 16, fontWeight: semiBold),
                    ),
                    Container(
                      height: 1,
                      width: 85,
                      color: Colors.black,
                    ),
                    Text(
                      jadwalCheckup.tglCheckup,
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
                    jadwalCheckup.status,
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
              jadwalCheckup.dokter?.name ?? "Unknown",
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
              jadwalCheckup.pasien?.name ?? "Unknown",
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
              jadwalCheckup.lokasi,
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
              jadwalCheckup.catatan ?? "Tidak ada catatan",
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
