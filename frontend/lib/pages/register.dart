import 'package:diabetesapps/main.dart';
import 'package:diabetesapps/services/device_info.dart';
import 'package:diabetesapps/shared/theme.dart';
import 'package:diabetesapps/widgets/custombutton.dart';
import 'package:diabetesapps/widgets/inputcustom.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/base_response.dart';
import '../services/rest_http_service.dart';

class RegisterPage extends StatefulWidget {
  @override
  State<RegisterPage> createState() => _RegisterPageState();
}

class _RegisterPageState extends State<RegisterPage> {
  TextEditingController emailController = TextEditingController();
  TextEditingController passwordController = TextEditingController();
  TextEditingController emailAlternativeController = TextEditingController();
  TextEditingController nameController = TextEditingController();

  Future<void> saveToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    tokenApi.value = token;
    prefs.setString("token", token);
  }

  Future<String?> register() async {
    try {
      String? devId = await DeviceInfo().getDeviceId();

      final name = nameController.text;
      final email = emailController.text;
      final emailAlternative = emailAlternativeController.text;
      final password = passwordController.text;
      final body = {
        "name": name,
        "email": email,
        "email_kerabat": emailAlternative,
        "password": password,
        'device_name': devId ?? "Unknown"
      };
      final responseRegister =
          await Provider.of<RestHttpService>(context, listen: false)
              .register(body: body);
      final singleResponse = SingleResponse<Map<String, dynamic>>.fromJson(
        responseRegister.body,
        (json) => json,
      );
      if (singleResponse.data != null) {
        return singleResponse.data!['token'];
      } else {
        throw "Failed LoggedIn";
      }
    } catch (e) {
      print(e);
      ScaffoldMessenger.of(context).showSnackBar(
          new SnackBar(content: Text("Gagal melakukan registrasi. Coba lagi")));
    }
    return null;
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
    nameController.dispose();
    emailController.dispose();
    emailAlternativeController.dispose();
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
                      "Silakan Isi Data Dibawah ini",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                  ),
                  CustommedInput(
                    hint: "Masukkan Nama Anda",
                    label: "Nama",
                    controller: nameController,
                  ),
                  CustommedInput(
                    hint: "Masukkan E-mail",
                    label: "E-mail",
                    controller: emailController,
                  ),
                  CustommedInput(
                    hint: "Masukkan E-mail alternatif",
                    label: "E-mail alternatif",
                    controller: emailAlternativeController,
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
                      title: "Buat akun baru",
                      onPress: () {
                        register().then((token) {
                          if (token != null) {
                            saveToken(token).then((_) {
                              Navigator.pushNamed(context, "/home");
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
                        "Sudah punya akun?",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: medium,
                            color: Colors.black),
                      ),
                      GestureDetector(
                        onTap: () => Navigator.of(context).pushNamed("/login"),
                        child: Text(
                          " Login",
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
