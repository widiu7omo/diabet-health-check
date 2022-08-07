import 'package:chopper/chopper.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/foundation/key.dart';
import 'package:flutter/src/widgets/framework.dart';

import '../main.dart';
import '../models/base_response.dart';
import '../models/pemeriksaan.dart';
import '../services/rest_http_service.dart';
import '../shared/theme.dart';
import 'hpitem.dart';

class ReportPemeriksaan extends StatefulWidget {
  const ReportPemeriksaan({Key? key}) : super(key: key);

  @override
  State<ReportPemeriksaan> createState() => _ReportPemeriksaanState();
}

class _ReportPemeriksaanState extends State<ReportPemeriksaan> {
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
    return FutureBuilder<Object>(
        future: httpService?.getPemeriksaans(),
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
              margin: EdgeInsets.only(top: 24, left: 24, right: 24),
              child: ListView(
                children: [
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
                ],
              ),
            );
          } else {
            return Container(
                child: Center(
                    child: CircularProgressIndicator(
              color: primaryColor,
            )));
          }
        });
  }
}
