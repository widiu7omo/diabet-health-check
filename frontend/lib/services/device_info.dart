import 'dart:io';

import 'package:device_info_plus/device_info_plus.dart';

class DeviceInfo {
  late DeviceInfoPlugin deviceInfoPlugin;

  DeviceInfo() {
    deviceInfoPlugin = DeviceInfoPlugin();
  }

  Future<String?> getDeviceId() async {
    var devId;
    if (Platform.isAndroid) {
      devId = await deviceInfoPlugin.androidInfo;
    } else if (Platform.isMacOS) {
      devId = await deviceInfoPlugin.macOsInfo;
    } else if (Platform.isIOS) {
      devId = await deviceInfoPlugin.macOsInfo;
    } else {
      devId = await deviceInfoPlugin.webBrowserInfo;
    }
    return devId.model;
  }
}
