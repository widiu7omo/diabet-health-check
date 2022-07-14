import 'package:chopper/chopper.dart';
import 'package:diabetesapps/models/pola_obat.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/pbitem.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../main.dart';
import '../models/base_response.dart';

class PolaObatPage extends StatefulWidget {
  final Map<String, dynamic> arg;

  const PolaObatPage({super.key, required this.arg});

  @override
  State<PolaObatPage> createState() => _PolaObatPageState();
}

class _PolaObatPageState extends State<PolaObatPage> {
  var showNav = false;
  late var jadwalId, pemeriksaanId;
  RestHttpService? httpService;

  @override
  void initState() {
    jadwalId = widget.arg['jadwal_id'];
    pemeriksaanId = widget.arg['pemeriksaan_id'];
    initData();
    super.initState();
  }

  void initData() async {
    String? tokenApi = await getToken();
    setState(() {
      httpService = RestHttpService.create(bearerToken: tokenApi ?? "");
    });
  }

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return FutureBuilder(
          future: httpService?.getPolaObats(
              pemeriksaanId: this.pemeriksaanId, jadwalId: this.jadwalId),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              List<PolaObat> polaObats = [];
              try {
                final response = snapshot.data as Response;
                final listResponse = ListResponse<PolaObat>.fromJson(
                  response.body,
                  (json) => PolaObat.fromJson(json),
                );
                polaObats = listResponse.data ?? [];
              } catch (e) {
                print(e);
              }
              return Container(
                margin: EdgeInsets.only(top: 76, left: 24, right: 24),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Pola Obat",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                    SizedBox(
                      height: 4,
                    ),
                    Text(
                      "Cek pola makan Anda secara teratur!",
                      style: poppinstext.copyWith(
                          fontSize: 12, fontWeight: reguler),
                    ),
                    SizedBox(
                      height: 16,
                    ),
                    polaObats.length == 0
                        ? Expanded(
                            child: Center(
                              child: Text("Belum ada pola obat"),
                            ),
                          )
                        : SizedBox(),
                    ...List.generate(
                      polaObats.length,
                      (index) => PolaObatItem(
                          title: polaObats[index].obat,
                          desc: "Jumlah : ${polaObats[index].jumlah} Butir",
                          detail: polaObats[index].anjuran,
                          onPress: () {}),
                    ),
                    // PolaObatItem(
                    //     title: "Obat 2",
                    //     desc: "Jumlah : 10 Butir",
                    //     detail: "3x1 Hari Setelah Makan",
                    //     onPress: () {}),
                    // PolaObatItem(
                    //     title: "Obat 3",
                    //     desc: "Jumlah : 10 Butir",
                    //     detail: "3x1 Hari Setelah Makan",
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
            httpService != null ? content() : SizedBox(),
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
