import 'package:chopper/chopper.dart';
import 'package:diabetesapps/models/pola_makan.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/polamakanitem.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../main.dart';
import '../models/base_response.dart';

class PolaMakanPage extends StatefulWidget {
  final Map<String, dynamic> arg;

  const PolaMakanPage({super.key, required this.arg});

  @override
  State<PolaMakanPage> createState() => _PolaMakanPageState();
}

class _PolaMakanPageState extends State<PolaMakanPage> {
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

  String getAsset(String category) {
    switch (category) {
      case "Makan Pagi":
        return "assets/pm1.png";
      case "Makan Siang":
        return "assets/pm2.png";
      case "Makan Malam":
        return "assets/pm3.png";
      case "Snacks":
        return "assets/pm4.png";
      default:
        return "assets/pm1.png";
    }
  }

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return FutureBuilder<Object>(
          future: httpService?.getPolaMakans(
              pemeriksaanId: this.pemeriksaanId, jadwalId: this.jadwalId),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              List<PolaMakan> polaMakans = [];
              try {
                final response = snapshot.data as Response;
                final listResponse = ListResponse<PolaMakan>.fromJson(
                  response.body,
                  (json) => PolaMakan.fromJson(json),
                );
                polaMakans = listResponse.data ?? [];
              } catch (e) {
                print(e);
              }
              return Container(
                margin: EdgeInsets.only(top: 76, left: 24, right: 24),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Pola Makan",
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
                    Text("Pola makan anda berdasarkan hasil checkup tanggal"),
                    polaMakans.length == 0
                        ? Expanded(
                            child: Center(
                              child: Text("Belum ada pola makan"),
                            ),
                          )
                        : Container(
                            margin:
                                EdgeInsets.only(top: 40, left: 55, right: 55),
                            child: GridView.count(
                              crossAxisCount: 2,
                              shrinkWrap: true,
                              physics: NeverScrollableScrollPhysics(),
                              childAspectRatio: 1,
                              crossAxisSpacing: 10,
                              mainAxisSpacing: 10,
                              children: [
                                ...List.generate(
                                    polaMakans.length,
                                    (index) => PolaMakanItem(
                                          title: polaMakans[index].category,
                                          img: getAsset(
                                              polaMakans[index].category),
                                          onPress: () {
                                            Navigator.pushNamed(
                                                context, "/detail-pm",
                                                arguments: polaMakans[index]);
                                          },
                                        )),
                              ],
                            ),
                          )
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
