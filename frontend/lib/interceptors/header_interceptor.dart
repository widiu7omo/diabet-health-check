import 'dart:async';
import 'package:chopper/chopper.dart';

class HeaderInterceptor implements RequestInterceptor {
  final String bearerToken;
  static const String AUTH_HEADER = "Authorization";
  static const String BEARER = "Bearer ";

  HeaderInterceptor({required this.bearerToken});

  @override
  FutureOr<Request> onRequest(Request request) async {
    Request newRequest =
        request.copyWith(headers: {AUTH_HEADER: BEARER + bearerToken});
    return newRequest;
  }
}
