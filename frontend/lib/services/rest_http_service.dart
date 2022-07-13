import "dart:async";

import 'package:chopper/chopper.dart';

// This is necessary for the generator to work.
part "rest_http_service.chopper.dart";

@ChopperApi(baseUrl: "api/")
abstract class RestHttpService extends ChopperService {
  // A helper method that helps instantiating the service. You can omit this method and use the generated class directly instead.
  static RestHttpService create([ChopperClient? client]) =>
      _$RestHttpService(client);

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
}
