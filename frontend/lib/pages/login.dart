import 'package:diabetesapps/main.dart';
import 'package:diabetesapps/services/device_info.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/inputcustom.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
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
    String? tokenFCM = await FirebaseMessaging.instance.getToken();
    await Provider.of<RestHttpService>(context, listen: false)
        .postTokenFCM(body: {"tokenFCM": tokenFCM});
    tokenApi.value = token;
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
                    margin: EdgeInsets.only(top: 28),
                    child: CustommedButton(
                      title: "Masuk",
                      onPress: () async {
                        var token = await loggedIn();
                        if (token != null) {
                          await saveToken(token).then((_) {
                            Navigator.pushNamed(context, "/home");
                          });
                        }
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
                        "Lupa Password?",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: medium,
                            color: Colors.black),
                      ),
                      GestureDetector(
                        onTap: () =>
                            Navigator.of(context).pushNamed("/lupa-password"),
                        child: Text(
                          " Klik disini",
                          style: poppinstext.copyWith(
                              fontSize: 14,
                              fontWeight: semiBold,
                              color: Colors.black),
                        ),
                      ),
                    ],
                  ),
                  SizedBox(
                    height: 15,
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        "Belum punya akun?",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: medium,
                            color: Colors.black),
                      ),
                      GestureDetector(
                        onTap: () =>
                            Navigator.of(context).pushNamed("/register"),
                        child: Text(
                          " Registrasi",
                          style: poppinstext.copyWith(
                              fontSize: 14,
                              fontWeight: semiBold,
                              color: Colors.black),
                        ),
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
