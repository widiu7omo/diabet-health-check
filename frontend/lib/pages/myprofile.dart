import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/doubleinput.dart';
import 'package:diabetesapps/widgets/drawer.dart';
import 'package:diabetesapps/widgets/header.dart';
import 'package:diabetesapps/widgets/inputprofile.dart';
import 'package:flutter/material.dart';

class MyProfile extends StatefulWidget {
  @override
  State<MyProfile> createState() => _MyProfileState();
}

class _MyProfileState extends State<MyProfile> {
  var showNav = false;

  @override
  Widget build(BuildContext context) {
    Widget content() {
      return Container(
          margin: EdgeInsets.only(top: 75, left: 24, right: 24),
          child: ListView(
            shrinkWrap: true,
            children: [
              Text(
                "Profile Saya",
                style: poppinstext.copyWith(
                    fontSize: 18, fontWeight: semiBold, color: Colors.black),
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
                        "Anisa Tri Astuti",
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
              ProfileInput(hint: "", label: "Nama Lengkap"),
              DoubleInput(
                hint1: "",
                hint2: "",
                label1: "Tempat Lahir",
                label2: "Tanggal Lahir",
              ),
              ProfileInput(hint: "", label: "Email"),
              ProfileInput(hint: "", label: "No. Telepon"),
              ProfileInput(hint: "", label: "Alamat"),
              SizedBox(
                height: 30,
              ),
              Container(
                child: CustommedButton(
                  title: "Simpan",
                  onPress: () {},
                ),
              ),
              SizedBox(
                height: 30,
              )
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
