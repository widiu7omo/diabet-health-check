import 'package:freezed_annotation/freezed_annotation.dart';

part 'user.freezed.dart';
part 'user.g.dart';

@freezed
class User with _$User {
  factory User({
    int? id,
    String? name,
    required String email,
    String? phone,
    String? password,
    @JsonKey(name: 'alamat') String? address,
    String? token,
    @JsonKey(name: "tempat_lahir") String? tempatLahir,
    @JsonKey(name: "tanggal_lahir") String? tanggalLahir,
  }) = _User;

  factory User.fromJson(Map<String, Object?> json) => _$UserFromJson(json);
}
