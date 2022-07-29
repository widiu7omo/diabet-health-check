import 'dart:async';

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../main.dart';
import '../models/base_response.dart';
import '../models/user.dart';
import '../services/rest_http_service.dart';

final ValueNotifier<User?> currentUser = ValueNotifier<User?>(null);

class SplashPage extends StatefulWidget {
  @override
  State<SplashPage> createState() => _SplashPageState();
}

class _SplashPageState extends State<SplashPage> {
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    Timer(
        Duration(
          seconds: 2,
        ), () {
      initData();
    });
  }

  void initData() async {
    String? tokenApi = await getToken();
    if (tokenApi == null) {
      Navigator.of(context).pushNamed("/login");
    } else {
      getCurrentUser().then((user) {
        currentUser.value = user;
        Navigator.of(context).pushNamed("/home");
      });
    }
  }

  Future<User?> getCurrentUser() async {
    final responseUser =
        await Provider.of<RestHttpService>(context, listen: false).getUser();
    final singleResponseUser = SingleResponse<User>.fromJson(
      responseUser.body,
      (json) => User.fromJson(json),
    );
    return singleResponseUser.data;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(
            image: DecorationImage(
                image: AssetImage("assets/splash.png"), fit: BoxFit.cover)),
      ),
    );
  }
}
