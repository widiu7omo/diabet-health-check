import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/inputprofile.dart';
import 'package:flutter/material.dart';

class ChangePasswordPage extends StatefulWidget {
  @override
  State<ChangePasswordPage> createState() => _ChangePasswordPageState();
}

class _ChangePasswordPageState extends State<ChangePasswordPage> {
  var showNav = false;
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
              ProfileInput(hint: "", label: "Masukkan Password Lama"),
              ProfileInput(hint: "", label: "Masukkan Paassword Baru"),
              ProfileInput(hint: "", label: "Konfirmasi Password Baru"),
              SizedBox(
                height: 30,
              ),
              Container(
                child: CustommedButton(
                  title: "Simpan",
                  onPress: () {},
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
