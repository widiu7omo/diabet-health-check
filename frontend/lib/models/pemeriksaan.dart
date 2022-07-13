import 'package:diabetesapps/models/User.dart';
import 'package:freezed_annotation/freezed_annotation.dart';

part 'pemeriksaan.freezed.dart';
part 'pemeriksaan.g.dart';

@freezed
class Pemeriksaan with _$Pemeriksaan {
  factory Pemeriksaan(
      {required int id,
      required String pemeriksaan,
      @JsonKey(name: "tgl_periksa") required String tglPeriksa,
      @JsonKey(name: "detail_pembahasan") required String detailPembahasan,
      @JsonKey(name: "hasil_diagnosa") required String hasilDiagnosa,
      User? dokter,
      User? pasien}) = _Pemeriksaan;
  factory Pemeriksaan.fromJson(Map<String, Object?> json) =>
      _$PemeriksaanFromJson(json);
}
