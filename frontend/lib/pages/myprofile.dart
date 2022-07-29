import 'package:diabetesapps/models/base_response.dart';
import 'package:diabetesapps/pages/splash.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/doubleinput.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/inputprofile.dart';
import 'package:flutter/material.dart';

import '../main.dart';
import '../models/user.dart';
import '../services/rest_http_service.dart';

class MyProfile extends StatefulWidget {
  @override
  State<MyProfile> createState() => _MyProfileState();
}

class _MyProfileState extends State<MyProfile> {
  var showNav = false;
  final TextEditingController namaLengkapController = TextEditingController();
  final TextEditingController tempatLahirController = TextEditingController();
  final TextEditingController tanggalLahirController = TextEditingController();
  final TextEditingController emailController = TextEditingController();
  final TextEditingController noTlpController = TextEditingController();
  final TextEditingController alamatController = TextEditingController();
  late final RestHttpService? httpService;

  initState() {
    loadData();
    super.initState();
    namaLengkapController.text = currentUser.value?.name ?? "Unknown";
    tempatLahirController.text = currentUser.value?.tempatLahir ?? "Unknown";
    tanggalLahirController.text = currentUser.value?.tanggalLahir ?? "Unknown";
    emailController.text = currentUser.value?.email ?? "Unknown";
    noTlpController.text = currentUser.value?.phone ?? "Unknown";
    alamatController.text = currentUser.value?.address ?? "Unknown";
  }

  Future<void> loadData() async {
    String? tokenApi = await getToken();
    httpService = RestHttpService.create(bearerToken: tokenApi ?? "");
    final responseUser = await httpService?.getUser();
    final SingleResponse<User> singleUserResponse =
        SingleResponse<User>.fromJson(
            responseUser?.body, (user) => User.fromJson(user));
    print(singleUserResponse.data.toString());
    currentUser.value = singleUserResponse.data;
    currentUser.notifyListeners();
  }

  void saveProfile() async {
    try {
      final responseUpdatedUser = await httpService?.updateProfile(body: {
        "name": namaLengkapController.text,
        "email": emailController.text,
        "phone": noTlpController.text,
        "alamat": alamatController.text,
        "tempat_lahir": tempatLahirController.text,
        "tanggal_lahir": tanggalLahirController.text
      });
      final SingleResponse<User> singleResponseUpdatedUser =
          SingleResponse.fromJson(
              responseUpdatedUser?.body, (user) => User.fromJson(user));
      print(singleResponseUpdatedUser.data.toString());
      currentUser.value = singleResponseUpdatedUser.data;
      currentUser.notifyListeners();
      ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text("Data profile berhasil diupdate")));
    } catch (e) {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text("Gagal mengupdate profile")));
    }
  }

  dispose() {
    super.dispose();
    namaLengkapController.dispose();
    tempatLahirController.dispose();
    tanggalLahirController.dispose();
    emailController.dispose();
    noTlpController.dispose();
    alamatController.dispose();
  }

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return FutureBuilder(
          future: loadData(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.done) {
              return Container(
                  margin: EdgeInsets.only(top: 75, left: 24, right: 24),
                  child: ListView(
                    shrinkWrap: true,
                    children: [
                      Text(
                        "Profile Saya",
                        style: poppinstext.copyWith(
                            fontSize: 18,
                            fontWeight: semiBold,
                            color: Colors.black),
                      ),
                      SizedBox(
                        height: 12,
                      ),
                      Row(
                        children: [
                          Container(
                            width: 60,
                            height: 60,
                            decoration: BoxDecoration(
                                image: DecorationImage(
                                    image: AssetImage("assets/profile.png"))),
                          ),
                          SizedBox(
                            width: 12,
                          ),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                (currentUser.value != null &&
                                        currentUser.value!.name != null)
                                    ? currentUser.value!.name!
                                    : "Unknown",
                                style: poppinstext.copyWith(
                                    fontSize: 16,
                                    fontWeight: semiBold,
                                    color: Colors.black),
                              ),
                              Text(
                                "Pasien",
                                style: poppinstext.copyWith(
                                    fontSize: 13,
                                    fontWeight: reguler,
                                    color: Colors.black),
                              ),
                            ],
                          )
                        ],
                      ),
                      SizedBox(
                        height: 20,
                      ),
                      ProfileInput(
                        hint: "",
                        label: "Nama Lengkap",
                        controller: namaLengkapController,
                      ),
                      DoubleInput(
                        hint1: "",
                        hint2: "",
                        label1: "Tempat Lahir",
                        label2: "Tanggal Lahir",
                        controller1: tempatLahirController,
                        controller2: tanggalLahirController,
                      ),
                      ProfileInput(
                          hint: "",
                          label: "Email",
                          controller: emailController),
                      ProfileInput(
                        hint: "",
                        label: "No. Telepon",
                        controller: noTlpController,
                      ),
                      ProfileInput(
                        hint: "",
                        label: "Alamat",
                        controller: alamatController,
                      ),
                      SizedBox(
                        height: 30,
                      ),
                      Container(
                        child: CustommedButton(
                          title: "Simpan",
                          onPress: saveProfile,
                        ),
                      ),
                      SizedBox(
                        height: 30,
                      )
                    ],
                  ));
            } else {
              return Center(
                child: CircularProgressIndicator(color: primaryColor),
              );
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
