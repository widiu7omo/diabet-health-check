import "dart:async";

import 'package:chopper/chopper.dart';

import '../interceptors/header_interceptor.dart';

// This is necessary for the generator to work.
part "rest_http_service.chopper.dart";

@ChopperApi(baseUrl: "api/")
abstract class RestHttpService extends ChopperService {
  // A helper method that helps instantiating the service. You can omit this method and use the generated class directly instead.
  static RestHttpService create({required String bearerToken}) {
    final client = ChopperClient(
        baseUrl: "http://dhc.nowday.tech/",
        interceptors: [
          HeaderInterceptor(bearerToken: bearerToken),
          HttpLoggingInterceptor()
        ],
        services: [
          _$RestHttpService(),
        ],
        converter: JsonConverter(),
        errorConverter: JsonConverter());
    return _$RestHttpService(client);
  }

  @Get(path: "user")
  Future<Response> getUser();

  @Get(path: 'pemeriksaans')
  Future<Response> getPemeriksaans();

  @Get(path: 'jadwal_checkups')
  Future<Response> getJadwalCheckups();

  @Get(path: 'pola_obats')
  Future<Response> getPolaObats();

  @Get(path: 'pola_makans')
  Future<Response> getPolaMakans();

  @Get(path: 'dokters')
  Future<Response> getDokters();
}
