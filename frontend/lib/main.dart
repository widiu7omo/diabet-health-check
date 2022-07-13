import 'package:diabetesapps/route_generator.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import 'firebase_options.dart';

void main() async {
  //TODO: get local storage token
  await WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(
    options: DefaultFirebaseOptions.currentPlatform,
  );
  runApp(MyApp());
}

Future<String?> getToken() async {
  final prefs = await SharedPreferences.getInstance();
  return prefs.getString("token");
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  late String? tokenApi;
  RestHttpService? httpService = null;

  @override
  void initState() {
    getToken().then((token) {
      tokenApi = token;
      firebaseInit().then((tokenFcm) async {
        httpService = RestHttpService.create(bearerToken: tokenApi ?? "");
        await httpService?.postTokenFCM(body: {"tokenFCM": tokenFcm});
      });
    });
    super.initState();
  }

  @override
  void dispose() {
    super.dispose();
    httpService?.client.dispose();
  }

  Future<String?> firebaseInit() async {
    await FirebaseMessaging.instance.requestPermission();
    String? tokenFCM = await FirebaseMessaging.instance.getToken();
    print(tokenFCM);
    return tokenFCM;
  }

  @override
  Widget build(BuildContext context) {
    return Provider(
      create: (_) => RestHttpService.create(bearerToken: tokenApi ?? ""),
      dispose: (_, RestHttpService service) {
        print("PROVIDER_DISPOSED");
        return service.client.dispose();
      },
      child: MaterialApp(
        debugShowCheckedModeBanner: false,
        onGenerateRoute: RouteGenerator.generateRoute,
      ),
    );
  }
}
