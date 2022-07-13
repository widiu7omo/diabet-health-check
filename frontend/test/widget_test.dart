// This is a basic Flutter widget test.
//
// To perform an interaction with a widget in your test, use the WidgetTester
// utility that Flutter provides. For example, you can send tap and scroll
// gestures. You can also use WidgetTester to find child widgets in the widget
// tree, read text, and verify that the values of widget properties are correct.

import 'package:chopper/chopper.dart';
import 'package:diabetesapps/interceptors/header_interceptor.dart';
import 'package:diabetesapps/main.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';

void main() {
  testWidgets('Counter increments smoke test', (WidgetTester tester) async {
    // Build our app and trigger a frame.
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
    await tester.pumpWidget(MyApp(
      httpClient: chopper,
    ));

    // Verify that our counter starts at 0.
    expect(find.text('0'), findsOneWidget);
    expect(find.text('1'), findsNothing);

    // Tap the '+' icon and trigger a frame.
    await tester.tap(find.byIcon(Icons.add));
    await tester.pump();

    // Verify that our counter has incremented.
    expect(find.text('0'), findsNothing);
    expect(find.text('1'), findsOneWidget);
  });
}
