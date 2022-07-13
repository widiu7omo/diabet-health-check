import 'package:diabetesapps/route_generator.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  //TODO: get local storage token
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Provider(
      create: (_) => RestHttpService.create(
          bearerToken: "1|ORPxC6mm0JFscMxCuP1h1uc19LNYTsviOrKpoRQP"),
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
