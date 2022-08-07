import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/reportcheckup.dart';
import 'package:diabetesapps/widgets/reportpemeriksaan.dart';
import 'package:flutter/material.dart';

import '../main.dart';
import '../services/rest_http_service.dart';
import '../widgets/drawer.dart';
import '../widgets/header.dart';

class Report extends StatefulWidget {
  const Report({Key? key}) : super(key: key);

  @override
  State<Report> createState() => _ReportState();
}

class _ReportState extends State<Report> {
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

  Widget content() {
    return Container(
      padding: EdgeInsets.only(top: 50),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.stretch,
        children: <Widget>[
          DefaultTabController(
            length: 2, // length of tabs
            initialIndex: 0,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: <Widget>[
                Container(
                  child: TabBar(
                    labelColor: primaryColor,
                    unselectedLabelColor: Colors.black.withOpacity(0.25),
                    indicatorColor: primaryColor,
                    tabs: [
                      Tab(text: 'Report Pemeriksaan'),
                      Tab(text: 'Report Checkup'),
                    ],
                  ),
                ),
                Container(
                  height: 400, //height of TabBarView
                  decoration: BoxDecoration(
                      border: Border(
                          top: BorderSide(color: Colors.grey, width: 0.5))),
                  child: TabBarView(
                    children: <Widget>[
                      ReportPemeriksaan(),
                      ReportCheckup(),
                    ],
                  ),
                )
              ],
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
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
