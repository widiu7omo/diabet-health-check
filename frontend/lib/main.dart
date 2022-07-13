import 'package:chopper/chopper.dart';
import 'package:diabetesapps/route_generator.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'interceptors/header_interceptor.dart';

void main() {
  //TODO: get local storage token
  final chopper = ChopperClient(
      baseUrl: "http://dhc.nowday.tech/",
      interceptors: [
        HeaderInterceptor(
            bearerToken: "1|ORPxC6mm0JFscMxCuP1h1uc19LNYTsviOrKpoRQP"),
        HttpLoggingInterceptor()
      ],
      services: [
        // Create and pass an instance of the generated service to the client
        RestHttpService.create()
      ],
      converter: JsonConverter(),
      errorConverter: JsonConverter());
  runApp(MyApp(httpClient: chopper));
}

class MyApp extends StatelessWidget {
  final ChopperClient httpClient;

  const MyApp({Key? key, required this.httpClient}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Provider(
      create: (_) => RestHttpService.create(httpClient),
      dispose: (_, RestHttpService service) => service.client.dispose(),
      child: MaterialApp(
        debugShowCheckedModeBanner: false,
        onGenerateRoute: RouteGenerator.generateRoute,
      ),
    );
  }
}
