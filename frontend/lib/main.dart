import 'package:diabetesapps/route_generator.dart';
import 'package:diabetesapps/services/rest_http_service.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import 'firebase_options.dart';

late AndroidNotificationChannel channel;
late FlutterLocalNotificationsPlugin flutterLocalNotificationsPlugin;
void onIOSDidReceiveLocalNotification(
    int id, String? title, String? body, String? payload) async {
  print(title);
  print(body);
}

void main() async {
  //TODO: get local storage token
  await WidgetsFlutterBinding.ensureInitialized();
  channel = const AndroidNotificationChannel(
    'high_importance_channel', // id
    'High Importance Notifications', // title
    description: 'This channel is used for important notifications.',
    // description
    importance: Importance.max,
  );
  var initializationSettingsAndroid = AndroidInitializationSettings(
      '@mipmap/ic_launcher'); // <- default icon name is @mipmap/ic_launcher
  var initializationSettingsIOS = IOSInitializationSettings(
      onDidReceiveLocalNotification: onIOSDidReceiveLocalNotification);
  var initializationSettings = InitializationSettings(
      android: initializationSettingsAndroid, iOS: initializationSettingsIOS);
  flutterLocalNotificationsPlugin = FlutterLocalNotificationsPlugin();
  flutterLocalNotificationsPlugin.initialize(initializationSettings);
  await Firebase.initializeApp(
    options: DefaultFirebaseOptions.currentPlatform,
  );

  runApp(MyApp());
}

Future<String?> getToken() async {
  final prefs = await SharedPreferences.getInstance();
  return prefs.getString("token");
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  late String? tokenApi;
  RestHttpService? httpService = null;
  @override
  void initState() {
    getToken().then((token) {
      tokenApi = token;
      firebaseInit().then((tokenFcm) async {
        print(tokenApi);
        httpService = RestHttpService.create(bearerToken: tokenApi ?? "");
        try {
          await httpService?.postTokenFCM(body: {"tokenFCM": tokenFcm});
        } catch (e) {
          print(e);
        }
      });
    });
    super.initState();
  }

  @override
  void dispose() {
    super.dispose();
    httpService?.client.dispose();
  }

  Future<String?> firebaseInit() async {
    await FirebaseMessaging.instance.requestPermission(
      alert: true,
      announcement: false,
      badge: true,
      carPlay: false,
      criticalAlert: false,
      provisional: false,
      sound: true,
    );
    String? tokenFCM = await FirebaseMessaging.instance.getToken();
    print(tokenFCM);
    FirebaseMessaging.onMessage.listen((RemoteMessage message) {
      RemoteNotification? notification = message.notification;
      AndroidNotification? android = message.notification?.android;

      // If `onMessage` is triggered with a notification, construct our own
      // local notification to show to users using the created channel.
      if (notification != null && android != null) {
        flutterLocalNotificationsPlugin.show(
            notification.hashCode,
            notification.title,
            notification.body,
            NotificationDetails(
                android: AndroidNotificationDetails(
                    'high_important_channel', 'Diabetes Health Check',
                    channelDescription:
                        'This channel only for Diabetes Health Check',
                    importance: Importance.max,
                    priority: Priority.max,
                    icon: android.smallIcon,
                    ticker: 'ticker')));
      }
    });
    return tokenFCM;
  }

  @override
  Widget build(BuildContext context) {
    return Provider(
      create: (_) => RestHttpService.create(bearerToken: tokenApi ?? ""),
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
