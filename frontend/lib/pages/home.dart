import 'package:diabetesapps/models/pemeriksaan.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/monitoritem.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/base_response.dart';
import '../models/jadwal_checkup.dart';
import '../models/user.dart';
import '../services/rest_http_service.dart';

class HomePage extends StatefulWidget {
  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  var showNav = false;
  late Pemeriksaan? pemeriksaanTerkini;
  late JadwalCheckup? jadwalCheckupTerkirin;
  late User? currentUser;
  var loading = false;

  @override
  void initState() {
    super.initState();
    initData();
  }

  Future<JadwalCheckup?> getLastJadwalCheckup() async {
    final responseJadwal =
        await Provider.of<RestHttpService>(context, listen: false)
            .getJadwalCheckups(limit: 1);
    final listResponseJadwal = ListResponse<JadwalCheckup>.fromJson(
      responseJadwal.body,
      (json) => JadwalCheckup.fromJson(json),
    );
    return listResponseJadwal.data?.first;
  }

  Future<User?> getCurrentUser() async {
    final responseUser =
        await Provider.of<RestHttpService>(context, listen: false).getUser();
    final singleResponseUser = SingleResponse<User>.fromJson(
      responseUser.body,
      (json) => User.fromJson(json),
    );
    return singleResponseUser.data;
  }

  Future<Pemeriksaan?> getLastPemeriksaan() async {
    final responsePemeriksaan =
        await Provider.of<RestHttpService>(context, listen: false)
            .getPemeriksaans(limit: 1);
    final listResponsePemeriksaan = ListResponse<Pemeriksaan>.fromJson(
      responsePemeriksaan.body,
      (json) => Pemeriksaan.fromJson(json),
    );
    return listResponsePemeriksaan.data?.first;
  }

  void initData() async {
    setState(() {
      loading = true;
    });
    User? user = await getCurrentUser();
    if (user != null) {
      setState(() {
        currentUser = user;
      });
    }
    Pemeriksaan? pemeriksaan = await getLastPemeriksaan();
    if (pemeriksaan != null) {
      setState(() {
        pemeriksaanTerkini = pemeriksaan;
        loading = false;
      });
    } else {
      setState(() {
        pemeriksaanTerkini = null;
        loading = false;
      });
    }
    //Jadwal terakhir
    setState(() {
      loading = true;
    });
    JadwalCheckup? jadwalCheckup = await getLastJadwalCheckup();
    if (jadwalCheckup != null) {
      setState(() {
        jadwalCheckupTerkirin = jadwalCheckup;
        loading = false;
      });
    } else {
      setState(() {
        jadwalCheckupTerkirin = null;
        loading = false;
      });
    }
  }

  Widget content() {
    return Container(
      margin: EdgeInsets.only(top: 90, left: 24, right: 24),
      child: ListView(
        children: [
          !loading
              ? Text(
                  "Hai, ${currentUser?.name}",
                  style:
                      poppinstext.copyWith(fontSize: 18, fontWeight: semiBold),
                )
              : Text("Fetching User..."),
          Container(
            margin: EdgeInsets.only(top: 30),
            child: Text(
              "Hasil Pemeriksaan terkini :",
              style: poppinstext.copyWith(fontSize: 12, fontWeight: medium),
            ),
          ),
          SizedBox(
            height: 5,
          ),
          !loading
              ? Container(
                  child: Container(
                      child: Text(
                    pemeriksaanTerkini != null &&
                            pemeriksaanTerkini?.hasilDiagnosa == "Diabetes"
                        ? "Beresiko Diabetes"
                        : "Tidak Beresiko",
                    style: poppinstext.copyWith(
                        fontSize: 14,
                        fontWeight: semiBold,
                        color: Color(0xffF5985A)),
                  )),
                )
              : Container(child: Text("Loading..")),
          SizedBox(
            height: 6,
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/hasilp");
            },
            child: Container(
              child: Container(
                  child: Text(
                "Lihat Semua",
                style: poppinstext.copyWith(
                    fontSize: 12, fontWeight: semiBold, color: Colors.black),
              )),
            ),
          ),
          Container(
            child: Container(
                margin: EdgeInsets.only(top: 28),
                child: Text(
                  "Daftar Monitoring",
                  style: poppinstext.copyWith(
                      fontSize: 16, fontWeight: semiBold, color: Colors.black),
                )),
          ),
          SizedBox(
            height: 20,
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/pola-makan", arguments: {
                'jadwal_id': jadwalCheckupTerkirin?.id ?? 0,
                'pemeriksaan_id': pemeriksaanTerkini?.id ?? 0
              });
            },
            child: MonitorItem(
              img: "assets/mo1.png",
              title: "Pola Makan",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/pola-obat", arguments: {
                'jadwal_id': jadwalCheckupTerkirin?.id ?? 0,
                'pemeriksaan_id': pemeriksaanTerkini?.id ?? 0
              });
            },
            child: MonitorItem(
              img: "assets/mo2.png",
              title: "Pola Obat",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/jadwal-cu");
            },
            child: MonitorItem(
              img: "assets/mo3.png",
              title: "Jadwal Checkup",
            ),
          ),
          GestureDetector(
            onTap: () {
              Navigator.pushNamed(context, "/konsultasi");
            },
            child: MonitorItem(
              img: "assets/mo4.png",
              title: "Konsultasi Dokter",
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
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
