import 'package:freezed_annotation/freezed_annotation.dart';

part 'base_response.g.dart';

class BaseResponse {
  dynamic message;
  bool success;

  BaseResponse({this.message, required this.success});

  factory BaseResponse.fromJson(Map<String, dynamic> json) {
    return BaseResponse(success: json["success"], message: json["message"]);
  }
}

@JsonSerializable(genericArgumentFactories: true)
class ListResponse<T> extends BaseResponse {
  List<T>? data;

  ListResponse({
    required String message,
    required bool success,
    this.data,
  }) : super(message: message, success: success);

  factory ListResponse.fromJson(
      Map<String, dynamic> json, Function(Map<String, dynamic>) create) {
    var data = <T>[];
    json['data'].forEach((v) {
      try {
        var modelData = create(v);
        data.add(v is Map<String, dynamic> ? modelData : v);
      } catch (e) {
        print(e);
      }
    });
    return ListResponse<T>(
        success: json["success"], message: json["message"], data: data);
  }
}

@JsonSerializable(genericArgumentFactories: true)
class SingleResponse<T> extends BaseResponse {
  T? data;

  SingleResponse({
    required String message,
    required bool success,
    this.data,
  }) : super(message: message, success: success);

  factory SingleResponse.fromJson(
      Map<String, dynamic> json, Function(Map<String, dynamic>) create) {
    return SingleResponse<T>(
        success: json["success"],
        message: json["message"],
        data: json["data"] is Map ? create(json["data"]) : json["data"]);
  }
}
