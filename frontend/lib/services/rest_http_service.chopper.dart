// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'rest_http_service.dart';

// **************************************************************************
// ChopperGenerator
// **************************************************************************

// ignore_for_file: always_put_control_body_on_new_line, always_specify_types, prefer_const_declarations, unnecessary_brace_in_string_interps
class _$RestHttpService extends RestHttpService {
  _$RestHttpService([ChopperClient? client]) {
    if (client == null) return;
    this.client = client;
  }

  @override
  final definitionType = RestHttpService;

  @override
  Future<Response<dynamic>> getUser() {
    final $url = 'api/user';
    final $request = Request('GET', $url, client.baseUrl);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> login({Map<String, dynamic>? body}) {
    final $url = 'api/login';
    final $body = body;
    final $request = Request('POST', $url, client.baseUrl, body: $body);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> postTokenFCM({Map<String, dynamic>? body}) {
    final $url = 'api/postTokenFCM';
    final $body = body;
    final $request = Request('POST', $url, client.baseUrl, body: $body);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> register({Map<String, dynamic>? body}) {
    final $url = 'api/register';
    final $body = body;
    final $request = Request('POST', $url, client.baseUrl, body: $body);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> getPemeriksaans({int? limit}) {
    final $url = 'api/pemeriksaans';
    final $params = <String, dynamic>{'limit': limit};
    final $request = Request('GET', $url, client.baseUrl, parameters: $params);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> getJadwalCheckups({int? limit}) {
    final $url = 'api/jadwal_checkups';
    final $params = <String, dynamic>{'limit': limit};
    final $request = Request('GET', $url, client.baseUrl, parameters: $params);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> getPolaObats({int? jadwalId, int? pemeriksaanId}) {
    final $url = 'api/pola_obats';
    final $params = <String, dynamic>{
      'jadwal_id': jadwalId,
      'pemeriksaan_id': pemeriksaanId
    };
    final $request = Request('GET', $url, client.baseUrl, parameters: $params);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> getPolaMakans({int? jadwalId, int? pemeriksaanId}) {
    final $url = 'api/pola_makans';
    final $params = <String, dynamic>{
      'jadwal_id': jadwalId,
      'pemeriksaan_id': pemeriksaanId
    };
    final $request = Request('GET', $url, client.baseUrl, parameters: $params);
    return client.send<dynamic, dynamic>($request);
  }

  @override
  Future<Response<dynamic>> getDokters() {
    final $url = 'api/dokters';
    final $request = Request('GET', $url, client.baseUrl);
    return client.send<dynamic, dynamic>($request);
  }
}
