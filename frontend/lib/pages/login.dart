import 'package:diabetesapps/services/device_info.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/inputcustom.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/base_response.dart';
import '../services/rest_http_service.dart';

class LoginPage extends StatefulWidget {
  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  TextEditingController emailController = TextEditingController();
  TextEditingController passwordController = TextEditingController();

  Future<void> saveToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    prefs.setString("token", token);
  }

  Future<String?> loggedIn() async {
    try {
      String? devId = await DeviceInfo().getDeviceId();
      final responseLogin =
          await Provider.of<RestHttpService>(context, listen: false)
              .login(body: {
        "email": emailController.text,
        'password': passwordController.text,
        'device_name': devId ?? "Unknown"
      });
      print(responseLogin.body);
      final singleResponse = SingleResponse<Map<String, dynamic>>.fromJson(
        responseLogin.body,
        (json) => json,
      );
      if (singleResponse.data != null) {
        return singleResponse.data!['token'];
      } else {
        throw "Failed LoggedIn";
      }
    } catch (e) {
      ScaffoldMessenger.of(context)
          .showSnackBar(new SnackBar(content: Text("Gagal login. Coba lagi")));
      print(e);
    }
    return null;
  }

  @override
  dispose() {
    super.dispose();
    emailController.dispose();
    passwordController.dispose();
  }

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
                    hint: "Masukkan E-mail",
                    label: "E-mail",
                    controller: emailController,
                  ),
                  CustommedInput(
                    hint: "Masukkan Password",
                    label: "Password",
                    controller: passwordController,
                    secure: true,
                  ),
                  Container(
                    margin: EdgeInsets.only(top: 34),
                    child: CustommedButton(
                      title: "Masuk",
                      onPress: () {
                        loggedIn().then((token) {
                          if (token != null) {
                            saveToken(token).then((_) {
                              // Navigator.pushNamed(context, "/home");
                            });
                          }
                        });
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
