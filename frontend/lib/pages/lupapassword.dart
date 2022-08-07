import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/base_response.dart';
import '../services/rest_http_service.dart';
import '../shared/theme.dart';
import '../widgets/custombutton.dart';
import '../widgets/inputcustom.dart';

class LupaPassword extends StatefulWidget {
  const LupaPassword({Key? key}) : super(key: key);

  @override
  State<LupaPassword> createState() => _LupaPasswordState();
}

class _LupaPasswordState extends State<LupaPassword> {
  late final TextEditingController emailController;
  @override
  initState() {
    emailController = TextEditingController();
    super.initState();
  }

  @override
  dispose() {
    emailController.dispose();
    super.dispose();
  }

  Future<void> forgetPassword() async {
    try {
      final responseLogin =
          await Provider.of<RestHttpService>(context, listen: false)
              .forgetPassword(body: {
        "email": emailController.text,
      });
      final singleResponse = SingleResponse<Map<String, dynamic>>.fromJson(
        responseLogin.body,
        (json) => json,
      );
      print(singleResponse);
      if (singleResponse.success == true) {
        ScaffoldMessenger.of(context).showSnackBar(new SnackBar(
            content: Text("Link berhasil dikirim. Silahkan cek email")));
      } else {
        ScaffoldMessenger.of(context).showSnackBar(new SnackBar(
            content: Text(singleResponse.message ??
                "Link gagal dikirim. Silahkan cek email")));
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(new SnackBar(
          content: Text("Gagal mengirim atau email tidak terdaftar")));
      print(e);
    }
    return null;
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
                      "Lupa Password",
                      style: poppinstext.copyWith(
                          fontSize: 18, fontWeight: semiBold),
                    ),
                  ),
                  CustommedInput(
                    hint: "Masukkan E-mail",
                    label: "E-mail",
                    controller: emailController,
                  ),
                  Container(
                    margin: EdgeInsets.only(top: 28),
                    child: CustommedButton(
                      title: "Kirim Link Reset Password",
                      onPress: () async {
                        await forgetPassword();
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
                        "Anda ingin login?",
                        style: poppinstext.copyWith(
                            fontSize: 14,
                            fontWeight: medium,
                            color: Colors.black),
                      ),
                      GestureDetector(
                        onTap: () => Navigator.of(context).pushNamed("/login"),
                        child: Text(
                          " Klik disini",
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
