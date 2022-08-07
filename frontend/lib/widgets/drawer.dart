import 'package:diabetesapps/pages/splash.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/draweritem.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class DrawerNavigator extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return AnimatedContainer(
      padding: EdgeInsets.only(left: 18, right: 28, top: 50),
      color: primaryColor,
      width: double.infinity,
      height: double.infinity,
      margin: EdgeInsets.only(left: 60),
      duration: Duration(milliseconds: 500),
      child: Column(
        children: [
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
                width: 16,
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
                        fontSize: 14, fontWeight: reguler, color: Colors.black),
                  ),
                ],
              ),
            ],
          ),
          SizedBox(
            height: 20,
          ),
          DrawerItem(
            img: "assets/icprofile.png",
            title: "Profile Saya",
            onPress: () {
              Navigator.pushNamed(context, "/profile");
            },
          ),
          DrawerItem(
            img: "assets/icpw.png",
            title: "Ubah Password",
            onPress: () {
              Navigator.pushNamed(context, "/changepw");
            },
          ),
          DrawerItem(
            img: "assets/ichelp.png",
            title: "Panduan Aplikasi",
            onPress: () => Navigator.of(context).pushNamed("/panduan-aplikasi"),
          ),
          DrawerItem(
            img: "assets/icinfo.png",
            title: "Tentang Kami",
            onPress: () => Navigator.of(context).pushNamed("/tentang-aplikasi"),
          ),
          DrawerItem(
            img: "assets/icinfo.png",
            title: "Logout",
            onPress: () async {
              final prefs = await SharedPreferences.getInstance();
              await prefs.remove('token');
              Navigator.of(context).pushReplacementNamed('/login');
            },
          ),
        ],
      ),
    );
  }
}
