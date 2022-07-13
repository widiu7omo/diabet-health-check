import 'package:diabetesapps/route_generator.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

void main() async {
  //TODO: get local storage token
  await WidgetsFlutterBinding.ensureInitialized();
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

  @override
  void initState() {
    getToken().then((token) {
      tokenApi = token;
    });
    super.initState();
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
