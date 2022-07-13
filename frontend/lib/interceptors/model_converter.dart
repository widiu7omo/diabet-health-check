import 'dart:async';
import 'dart:convert';

import 'package:chopper/chopper.dart';
import 'package:diabetesapps/models/pemeriksaan.dart';

typedef CreateModelFromJson = dynamic Function(Map<String, dynamic> json);

class ModelConverter<Model> implements Converter {
  final CreateModelFromJson fromJson;

  ModelConverter({required this.fromJson});
  @override
  Request convertRequest(Request request) {
    final req = applyHeader(
      request,
      contentTypeKey,
      jsonHeaders,
      override: false,
    );

    return encodeJson(req);
  }

  Response<BodyType> decodeJson<BodyType, InnerType>(Response response) {
    var contentType = response.headers[contentTypeKey];
    var body = response.body;
    if (contentType != null && contentType.contains(jsonHeaders)) {
      body = utf8.decode(response.bodyBytes);
    }
    try {
      var mapData = json.decode(body);
      print(mapData);
      final query = fromJson(mapData) as Model;
      return response.copyWith<BodyType>(body: query as BodyType);
    } catch (e) {
      chopperLogger.warning(e);
      return response.copyWith<BodyType>(body: body);
    }
  }

  Request encodeJson(Request request) {
    var contentType = request.headers[contentTypeKey];
    if (contentType != null && contentType.contains(jsonHeaders)) {
      return request.copyWith(body: json.encode(request.body));
    }
    return request;
  }

  @override
  FutureOr<Response<BodyType>> convertResponse<BodyType, InnerType>(
      Response response) {
    return decodeJson<BodyType, InnerType>(response);
  }
}
