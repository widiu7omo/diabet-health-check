import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/inputprofile.dart';
import 'package:flutter/material.dart';

import '../main.dart';
import '../services/rest_http_service.dart';

class ChangePasswordPage extends StatefulWidget {
  @override
  State<ChangePasswordPage> createState() => _ChangePasswordPageState();
}

class _ChangePasswordPageState extends State<ChangePasswordPage> {
  var showNav = false;
  final TextEditingController passwordLama = TextEditingController();
  final TextEditingController passwordBaru = TextEditingController();
  final TextEditingController passwordBaruKonfirmasi = TextEditingController();

  @override
  initState() {
    super.initState();
  }

  @override
  dispose() {
    passwordLama.dispose();
    passwordBaru.dispose();
    passwordBaruKonfirmasi.dispose();
    super.dispose();
  }

  void savePassword() async {
    if (passwordBaru.text != passwordBaruKonfirmasi.text) {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text("Password baru tidak cocok")));
      return;
    }
    try {
      String? tokenApi = await getToken();
      final httpService = RestHttpService.create(bearerToken: tokenApi ?? "");
      final response = await httpService.changePassword(body: {
        "old_password": passwordLama.text,
        "new_password": passwordBaru.text
      });
      print(response.body);
    } catch (e) {
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text("Password gagal diubah")));
    }
  }

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return Container(
          margin: EdgeInsets.only(top: 128, left: 24, right: 24),
          child: ListView(
            shrinkWrap: true,
            children: [
              Text(
                "Ubah Password",
                style: poppinstext.copyWith(
                    fontSize: 18, fontWeight: semiBold, color: Colors.black),
              ),
              SizedBox(
                height: 24,
              ),
              ProfileInput(
                hint: "",
                label: "Masukkan Password Lama",
                controller: passwordLama,
              ),
              ProfileInput(
                hint: "",
                label: "Masukkan Paassword Baru",
                controller: passwordBaru,
              ),
              ProfileInput(
                hint: "",
                label: "Konfirmasi Password Baru",
                controller: passwordBaruKonfirmasi,
              ),
              SizedBox(
                height: 30,
              ),
              Container(
                child: CustommedButton(
                  title: "Simpan",
                  onPress: savePassword,
                ),
              ),
            ],
          ));
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
