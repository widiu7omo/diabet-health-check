import 'package:diabetesapps/models/pemeriksaan.dart';
import 'package:diabetesapps/models/user.dart';
import 'package:freezed_annotation/freezed_annotation.dart';

part 'jadwal_checkup.freezed.dart';
part 'jadwal_checkup.g.dart';

@freezed
class JadwalCheckup with _$JadwalCheckup {
  factory JadwalCheckup(
      {required int id,
      required String checkup,
      @JsonKey(name: "tgl_checkup") required String tglCheckup,
      required String lokasi,
      String? catatan,
      required String status,
      Pemeriksaan? pemeriksaan,
      User? dokter,
      User? pasien}) = _JadwalCheckup;

  factory JadwalCheckup.fromJson(Map<String, Object?> json) =>
      _$JadwalCheckupFromJson(json);
}
