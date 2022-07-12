import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/inputcustom.dart';
import 'package:flutter/material.dart';

class LoginPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: bgColor,
      body: SafeArea(
        child: Container(
          padding: EdgeInsets.all(24),
          child: Center(
            child: SingleChildScrollView(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Container(
                    width: 182,
                    height: 131,
                    decoration: BoxDecoration(
                        image: DecorationImage(
                            image: AssetImage("assets/logo.png"))),
                  ),
                  Container(
                    margin: EdgeInsets.only(top: 30, bottom: 26),
                    child: Text(
                      "Silakan Login",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                  ),
                  CustommedInput(
                    hint: "Masukkan Username",
                    label: "Username",
                  ),
                  CustommedInput(
                    hint: "Masukkan Password",
                    label: "Password",
                    secure: true,
                  ),
                  Container(
                    margin: EdgeInsets.only(top: 34),
                    child: CustommedButton(
                      title: "Masuk",
                      onPress: () {
                        Navigator.pushNamed(context, "/home");
                      },
                    ),
                  ),
                  SizedBox(
                    height: 15,
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        "Lupa akun?",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: medium,
                            color: Colors.black),
                      ),
                      Text(
                        " Hubungi admin",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: semiBold,
                            color: Colors.black),
                      ),
                    ],
                  )
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
