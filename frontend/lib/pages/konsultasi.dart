import 'package:chopper/chopper.dart';
import 'package:diabetesapps/models/user.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/waitem.dart';
import 'package:flutter/material.dart';

import '../main.dart';
import '../models/base_response.dart';

class KonsultasiPage extends StatefulWidget {
  @override
  State<KonsultasiPage> createState() => _KonsultasiPageState();
}

class _KonsultasiPageState extends State<KonsultasiPage> {
  var showNav = false;
  RestHttpService? httpService;

  @override
  void initState() {
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
          future: httpService?.getDokters(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              List<User> dokters = [];
              try {
                final response = snapshot.data as Response;
                final listResponse = ListResponse<User>.fromJson(
                  response.body,
                  (json) => User.fromJson(json),
                );
                dokters = listResponse.data ?? [];
              } catch (e) {
                print(e);
              }
              return Container(
                margin: EdgeInsets.only(top: 76, left: 24, right: 24),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      "Konsultasi Dokter",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                    SizedBox(
                      height: 4,
                    ),
                    Text(
                      "Silahkan pilih nomor sesuai dengan Dokter yang memeriksa Anda",
                      style: poppinstext.copyWith(
                          fontSize: 12, fontWeight: reguler),
                    ),
                    SizedBox(
                      height: 24,
                    ),
                    ...List.generate(
                        dokters.length,
                        (index) => WaItem(
                              name: dokters[index].name ?? "Unknown",
                              phone: dokters[index].phone ?? "Unknown",
                            )),
                  ],
                ),
              );
            } else {
              return Container(
                child: Center(
                  child: CircularProgressIndicator(color: primaryColor,),
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
