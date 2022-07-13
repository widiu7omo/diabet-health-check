import 'package:freezed_annotation/freezed_annotation.dart';
part 'pola_obat.freezed.dart';
part 'pola_obat.g.dart';

@freezed
class PolaObat with _$PolaObat {
  factory PolaObat({
    required int id,
    required String obat,
    required int jumlah,
    required String anjuran,
  }) = _PolaObat;
  factory PolaObat.fromJson(Map<String, Object?> json) =>
      _$PolaObatFromJson(json);
}
