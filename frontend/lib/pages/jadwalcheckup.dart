import 'package:chopper/chopper.dart';
import 'package:diabetesapps/models/jadwal_checkup.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/jadwalitem.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/base_response.dart';

class JadwalCheckupPage extends StatefulWidget {
  @override
  State<JadwalCheckupPage> createState() => _JadwalCheckupPageState();
}

class _JadwalCheckupPageState extends State<JadwalCheckupPage> {
  var showNav = false;

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return FutureBuilder(
          future: Provider.of<RestHttpService>(context, listen: false)
              .getJadwalCheckups(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              List<JadwalCheckup> jadwalCheckups = [];
              try {
                final response = snapshot.data as Response;
                final listResponse = ListResponse<JadwalCheckup>.fromJson(
                  response.body,
                  (json) => JadwalCheckup.fromJson(json),
                );
                jadwalCheckups = listResponse.data ?? [];
              } catch (e) {
                print(e);
              }
              return Container(
                margin: EdgeInsets.only(top: 76, left: 24, right: 24),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Jadwal Checkup",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                    SizedBox(
                      height: 4,
                    ),
                    Text(
                      "Berikut adalah jadwal checkup rutin Anda",
                      style: poppinstext.copyWith(
                          fontSize: 12, fontWeight: reguler),
                    ),
                    SizedBox(
                      height: 16,
                    ),
                    ...List.generate(
                        jadwalCheckups.length,
                        (index) => JadwalItem(
                            title: jadwalCheckups[index].checkup,
                            desc: jadwalCheckups[index].tglCheckup,
                            detail: jadwalCheckups[index].status,
                            onPress: () {
                              Navigator.pushNamed(context, "/jadwal-detail",
                                  arguments: jadwalCheckups[index]);
                            })),
                    // JadwalItem(
                    //     title: "Checkup 1",
                    //     desc: "Senin, 01 November 2021",
                    //     detail: "Selesai",
                    //     onPress: () {
                    //       Navigator.pushNamed(context, "/jadwal-detail");
                    //     }),
                    // JadwalItem(
                    //     title: "Checkup 2",
                    //     desc: "Senin, 08 November 2021",
                    //     detail: "Selesai",
                    //     onPress: () {}),
                    // JadwalItem(
                    //     title: "Checkup 3",
                    //     desc: "Senin, 15 November 2021",
                    //     detail: "Akan Datang",
                    //     onPress: () {})
                  ],
                ),
              );
            } else {
              return Container(
                child: Center(
                  child: CircularProgressIndicator(),
                ),
              );
            }
          });
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
