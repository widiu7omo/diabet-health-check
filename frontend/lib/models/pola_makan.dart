import 'package:freezed_annotation/freezed_annotation.dart';
part 'pola_makan.freezed.dart';
part 'pola_makan.g.dart';

@freezed
class PolaMakan with _$PolaMakan {
  factory PolaMakan({
    required int id,
    required String category,
    required String dilarang,
    required String dianjurkan,
  }) = _PolaMakan;
  factory PolaMakan.fromJson(Map<String, Object?> json) =>
      _$PolaMakanFromJson(json);
}
