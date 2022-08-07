import 'package:chopper/chopper.dart';
import 'package:flutter/material.dart';

import '../main.dart';
import '../models/base_response.dart';
import '../models/jadwal_checkup.dart';
import '../services/rest_http_service.dart';
import '../shared/theme.dart';
import 'jadwalitem.dart';

class ReportCheckup extends StatefulWidget {
  const ReportCheckup({Key? key}) : super(key: key);

  @override
  State<ReportCheckup> createState() => _ReportCheckupState();
}

class _ReportCheckupState extends State<ReportCheckup> {
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
    return FutureBuilder(
      future: httpService?.getJadwalCheckups(),
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
            margin: EdgeInsets.only(top: 24, left: 24, right: 24),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                ...List.generate(
                  jadwalCheckups.length,
                  (index) => JadwalItem(
                    title: jadwalCheckups[index].checkup,
                    desc: jadwalCheckups[index].tglCheckup,
                    detail: jadwalCheckups[index].status,
                    onPress: () {
                      Navigator.pushNamed(context, "/jadwal-detail",
                          arguments: jadwalCheckups[index]);
                    },
                  ),
                ),
              ],
            ),
          );
        } else {
          return Container(
            child: Center(
              child: CircularProgressIndicator(
                color: primaryColor,
              ),
            ),
          );
        }
      },
    );
  }
}
