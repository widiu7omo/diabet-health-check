import 'package:chopper/chopper.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/hpitem.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/base_response.dart';
import '../models/pemeriksaan.dart';

class HasilPemeriksaanPage extends StatefulWidget {
  @override
  State<HasilPemeriksaanPage> createState() => _HasilPemeriksaanPageState();
}

class _HasilPemeriksaanPageState extends State<HasilPemeriksaanPage> {
  var showNav = false;
  @override
  Widget build(BuildContext context) {
    Widget content() {
      return FutureBuilder<Object>(
          future: Provider.of<RestHttpService>(context).getPemeriksaans(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              List<Pemeriksaan>? pemeriksaans;
              try {
                final response = snapshot.data as Response;
                final listResponse = ListResponse<Pemeriksaan>.fromJson(
                  response.body,
                  (json) => Pemeriksaan.fromJson(json),
                );
                pemeriksaans = listResponse.data;
              } catch (e) {
                print(e);
              }
              return Container(
                margin: EdgeInsets.only(top: 88, left: 24, right: 24),
                child: ListView(
                  children: [
                    Text(
                      "Hasil Pemeriksaan",
                      style: poppinstext.copyWith(
                          fontSize: 18,
                          fontWeight: semiBold,
                          color: Colors.black),
                    ),
                    SizedBox(
                      height: 16,
                    ),
                    ...List.generate(pemeriksaans?.length ?? 0, (index) {
                      return HpItem(
                        title: pemeriksaans![index].pemeriksaan,
                        desc: pemeriksaans[index].tglPeriksa,
                        onPress: () {
                          Navigator.pushNamed(context, "/detailhp",
                              arguments: pemeriksaans![index]);
                        },
                      );
                    }),
                    // HpItem(
                    //   title: "Pemeriksaan 1",
                    //   desc: "Senin, 01 November 2021",
                    //   onPress: () {
                    //     Navigator.pushNamed(context, "/detailhp");
                    //   },
                    // ),
                    // HpItem(
                    //   title: "Pemeriksaan 2",
                    //   desc: "Senin, 08 November 2021",
                    //   onPress: () {},
                    // ),
                  ],
                ),
              );
            } else {
              return Container(
                  child: Center(child: CircularProgressIndicator()));
            }
          });
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
