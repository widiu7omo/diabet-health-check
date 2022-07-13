// coverage:ignore-file
// GENERATED CODE - DO NOT MODIFY BY HAND
// ignore_for_file: type=lint
// ignore_for_file: unused_element, deprecated_member_use, deprecated_member_use_from_same_package, use_function_type_syntax_for_parameters, unnecessary_const, avoid_init_to_null, invalid_override_different_default_values_named, prefer_expression_function_bodies, annotate_overrides, invalid_annotation_target

part of 'pemeriksaan.dart';

// **************************************************************************
// FreezedGenerator
// **************************************************************************

T _$identity<T>(T value) => value;

final _privateConstructorUsedError = UnsupportedError(
    'It seems like you constructed your class using `MyClass._()`. This constructor is only meant to be used by freezed and you are not supposed to need it nor use it.\nPlease check the documentation here for more information: https://github.com/rrousselGit/freezed#custom-getters-and-methods');

Pemeriksaan _$PemeriksaanFromJson(Map<String, dynamic> json) {
  return _Pemeriksaan.fromJson(json);
}

/// @nodoc
mixin _$Pemeriksaan {
  int get id => throw _privateConstructorUsedError;
  String get pemeriksaan => throw _privateConstructorUsedError;
  @JsonKey(name: "tgl_periksa")
  String get tglPeriksa => throw _privateConstructorUsedError;
  @JsonKey(name: "detail_pembahasan")
  String get detailPembahasan => throw _privateConstructorUsedError;
  @JsonKey(name: "hasil_diagnosa")
  String get hasilDiagnosa => throw _privateConstructorUsedError;
  User? get dokter => throw _privateConstructorUsedError;
  User? get pasien => throw _privateConstructorUsedError;

  Map<String, dynamic> toJson() => throw _privateConstructorUsedError;
  @JsonKey(ignore: true)
  $PemeriksaanCopyWith<Pemeriksaan> get copyWith =>
      throw _privateConstructorUsedError;
}

/// @nodoc
abstract class $PemeriksaanCopyWith<$Res> {
  factory $PemeriksaanCopyWith(
          Pemeriksaan value, $Res Function(Pemeriksaan) then) =
      _$PemeriksaanCopyWithImpl<$Res>;
  $Res call(
      {int id,
      String pemeriksaan,
      @JsonKey(name: "tgl_periksa") String tglPeriksa,
      @JsonKey(name: "detail_pembahasan") String detailPembahasan,
      @JsonKey(name: "hasil_diagnosa") String hasilDiagnosa,
      User? dokter,
      User? pasien});
}

/// @nodoc
class _$PemeriksaanCopyWithImpl<$Res> implements $PemeriksaanCopyWith<$Res> {
  _$PemeriksaanCopyWithImpl(this._value, this._then);

  final Pemeriksaan _value;
  // ignore: unused_field
  final $Res Function(Pemeriksaan) _then;

  @override
  $Res call({
    Object? id = freezed,
    Object? pemeriksaan = freezed,
    Object? tglPeriksa = freezed,
    Object? detailPembahasan = freezed,
    Object? hasilDiagnosa = freezed,
    Object? dokter = freezed,
    Object? pasien = freezed,
  }) {
    return _then(_value.copyWith(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      pemeriksaan: pemeriksaan == freezed
          ? _value.pemeriksaan
          : pemeriksaan // ignore: cast_nullable_to_non_nullable
              as String,
      tglPeriksa: tglPeriksa == freezed
          ? _value.tglPeriksa
          : tglPeriksa // ignore: cast_nullable_to_non_nullable
              as String,
      detailPembahasan: detailPembahasan == freezed
          ? _value.detailPembahasan
          : detailPembahasan // ignore: cast_nullable_to_non_nullable
              as String,
      hasilDiagnosa: hasilDiagnosa == freezed
          ? _value.hasilDiagnosa
          : hasilDiagnosa // ignore: cast_nullable_to_non_nullable
              as String,
      dokter: dokter == freezed
          ? _value.dokter
          : dokter // ignore: cast_nullable_to_non_nullable
              as User?,
      pasien: pasien == freezed
          ? _value.pasien
          : pasien // ignore: cast_nullable_to_non_nullable
              as User?,
    ));
  }
}

/// @nodoc
abstract class _$$_PemeriksaanCopyWith<$Res>
    implements $PemeriksaanCopyWith<$Res> {
  factory _$$_PemeriksaanCopyWith(
          _$_Pemeriksaan value, $Res Function(_$_Pemeriksaan) then) =
      __$$_PemeriksaanCopyWithImpl<$Res>;
  @override
  $Res call(
      {int id,
      String pemeriksaan,
      @JsonKey(name: "tgl_periksa") String tglPeriksa,
      @JsonKey(name: "detail_pembahasan") String detailPembahasan,
      @JsonKey(name: "hasil_diagnosa") String hasilDiagnosa,
      User? dokter,
      User? pasien});
}

/// @nodoc
class __$$_PemeriksaanCopyWithImpl<$Res> extends _$PemeriksaanCopyWithImpl<$Res>
    implements _$$_PemeriksaanCopyWith<$Res> {
  __$$_PemeriksaanCopyWithImpl(
      _$_Pemeriksaan _value, $Res Function(_$_Pemeriksaan) _then)
      : super(_value, (v) => _then(v as _$_Pemeriksaan));

  @override
  _$_Pemeriksaan get _value => super._value as _$_Pemeriksaan;

  @override
  $Res call({
    Object? id = freezed,
    Object? pemeriksaan = freezed,
    Object? tglPeriksa = freezed,
    Object? detailPembahasan = freezed,
    Object? hasilDiagnosa = freezed,
    Object? dokter = freezed,
    Object? pasien = freezed,
  }) {
    return _then(_$_Pemeriksaan(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      pemeriksaan: pemeriksaan == freezed
          ? _value.pemeriksaan
          : pemeriksaan // ignore: cast_nullable_to_non_nullable
              as String,
      tglPeriksa: tglPeriksa == freezed
          ? _value.tglPeriksa
          : tglPeriksa // ignore: cast_nullable_to_non_nullable
              as String,
      detailPembahasan: detailPembahasan == freezed
          ? _value.detailPembahasan
          : detailPembahasan // ignore: cast_nullable_to_non_nullable
              as String,
      hasilDiagnosa: hasilDiagnosa == freezed
          ? _value.hasilDiagnosa
          : hasilDiagnosa // ignore: cast_nullable_to_non_nullable
              as String,
      dokter: dokter == freezed
          ? _value.dokter
          : dokter // ignore: cast_nullable_to_non_nullable
              as User?,
      pasien: pasien == freezed
          ? _value.pasien
          : pasien // ignore: cast_nullable_to_non_nullable
              as User?,
    ));
  }
}

/// @nodoc
@JsonSerializable()
class _$_Pemeriksaan implements _Pemeriksaan {
  _$_Pemeriksaan(
      {required this.id,
      required this.pemeriksaan,
      @JsonKey(name: "tgl_periksa") required this.tglPeriksa,
      @JsonKey(name: "detail_pembahasan") required this.detailPembahasan,
      @JsonKey(name: "hasil_diagnosa") required this.hasilDiagnosa,
      this.dokter,
      this.pasien});

  factory _$_Pemeriksaan.fromJson(Map<String, dynamic> json) =>
      _$$_PemeriksaanFromJson(json);

  @override
  final int id;
  @override
  final String pemeriksaan;
  @override
  @JsonKey(name: "tgl_periksa")
  final String tglPeriksa;
  @override
  @JsonKey(name: "detail_pembahasan")
  final String detailPembahasan;
  @override
  @JsonKey(name: "hasil_diagnosa")
  final String hasilDiagnosa;
  @override
  final User? dokter;
  @override
  final User? pasien;

  @override
  String toString() {
    return 'Pemeriksaan(id: $id, pemeriksaan: $pemeriksaan, tglPeriksa: $tglPeriksa, detailPembahasan: $detailPembahasan, hasilDiagnosa: $hasilDiagnosa, dokter: $dokter, pasien: $pasien)';
  }

  @override
  bool operator ==(dynamic other) {
    return identical(this, other) ||
        (other.runtimeType == runtimeType &&
            other is _$_Pemeriksaan &&
            const DeepCollectionEquality().equals(other.id, id) &&
            const DeepCollectionEquality()
                .equals(other.pemeriksaan, pemeriksaan) &&
            const DeepCollectionEquality()
                .equals(other.tglPeriksa, tglPeriksa) &&
            const DeepCollectionEquality()
                .equals(other.detailPembahasan, detailPembahasan) &&
            const DeepCollectionEquality()
                .equals(other.hasilDiagnosa, hasilDiagnosa) &&
            const DeepCollectionEquality().equals(other.dokter, dokter) &&
            const DeepCollectionEquality().equals(other.pasien, pasien));
  }

  @JsonKey(ignore: true)
  @override
  int get hashCode => Object.hash(
      runtimeType,
      const DeepCollectionEquality().hash(id),
      const DeepCollectionEquality().hash(pemeriksaan),
      const DeepCollectionEquality().hash(tglPeriksa),
      const DeepCollectionEquality().hash(detailPembahasan),
      const DeepCollectionEquality().hash(hasilDiagnosa),
      const DeepCollectionEquality().hash(dokter),
      const DeepCollectionEquality().hash(pasien));

  @JsonKey(ignore: true)
  @override
  _$$_PemeriksaanCopyWith<_$_Pemeriksaan> get copyWith =>
      __$$_PemeriksaanCopyWithImpl<_$_Pemeriksaan>(this, _$identity);

  @override
  Map<String, dynamic> toJson() {
    return _$$_PemeriksaanToJson(this);
  }
}

abstract class _Pemeriksaan implements Pemeriksaan {
  factory _Pemeriksaan(
      {required final int id,
      required final String pemeriksaan,
      @JsonKey(name: "tgl_periksa")
          required final String tglPeriksa,
      @JsonKey(name: "detail_pembahasan")
          required final String detailPembahasan,
      @JsonKey(name: "hasil_diagnosa")
          required final String hasilDiagnosa,
      final User? dokter,
      final User? pasien}) = _$_Pemeriksaan;

  factory _Pemeriksaan.fromJson(Map<String, dynamic> json) =
      _$_Pemeriksaan.fromJson;

  @override
  int get id;
  @override
  String get pemeriksaan;
  @override
  @JsonKey(name: "tgl_periksa")
  String get tglPeriksa;
  @override
  @JsonKey(name: "detail_pembahasan")
  String get detailPembahasan;
  @override
  @JsonKey(name: "hasil_diagnosa")
  String get hasilDiagnosa;
  @override
  User? get dokter;
  @override
  User? get pasien;
  @override
  @JsonKey(ignore: true)
  _$$_PemeriksaanCopyWith<_$_Pemeriksaan> get copyWith =>
      throw _privateConstructorUsedError;
}
