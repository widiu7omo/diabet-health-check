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
        baseUrl: "http://206.189.197.90/",
        // baseUrl: "http://localhost:8000/",
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
  Future<Response> getUser({@Header("Authorization") String? bearerToken});

  @Post(path: "login")
  Future<Response> login({
    @Body() Map<String, dynamic>? body,
  });

  @Post(path: "forgetPassword")
  Future<Response> forgetPassword({@Body() Map<String, dynamic>? body});

  @Post(path: "user")
  Future<Response> updateProfile({@Body() Map<String, dynamic>? body});

  @Post(path: "changePassword")
  Future<Response> changePassword({@Body() Map<String, dynamic>? body});

  @Post(path: "post_token_FCM")
  Future<Response> postTokenFCM(
      {@Body() Map<String, dynamic>? body,
      @Header("Authorization") String? bearerToken});

  @Post(path: "register")
  Future<Response> register({@Body() Map<String, dynamic>? body});

  @Get(path: 'pemeriksaans')
  Future<Response> getPemeriksaans(
      {@Query("limit") int? limit,
      @Header("Authorization") String? bearerToken});

  @Get(path: 'jadwal_checkups')
  Future<Response> getJadwalCheckups(
      {@Query("limit") int? limit,
      @Header("Authorization") String? bearerToken});

  @Get(path: 'pola_obats')
  Future<Response> getPolaObats(
      {@Query("jadwal_id") int? jadwalId,
      @Query("pemeriksaan_id") int? pemeriksaanId,
      @Header("Authorization") String? bearerToken});

  @Get(path: 'pola_makans')
  Future<Response> getPolaMakans(
      {@Query("jadwal_id") int? jadwalId,
      @Query("pemeriksaan_id") int? pemeriksaanId,
      @Header("Authorization") String? bearerToken});

  @Get(path: 'dokters')
  Future<Response> getDokters({@Header("Authorization") String? bearerToken});
}
