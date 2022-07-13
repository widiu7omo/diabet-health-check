// coverage:ignore-file
// GENERATED CODE - DO NOT MODIFY BY HAND
// ignore_for_file: type=lint
// ignore_for_file: unused_element, deprecated_member_use, deprecated_member_use_from_same_package, use_function_type_syntax_for_parameters, unnecessary_const, avoid_init_to_null, invalid_override_different_default_values_named, prefer_expression_function_bodies, annotate_overrides, invalid_annotation_target

part of 'jadwal_checkup.dart';

// **************************************************************************
// FreezedGenerator
// **************************************************************************

T _$identity<T>(T value) => value;

final _privateConstructorUsedError = UnsupportedError(
    'It seems like you constructed your class using `MyClass._()`. This constructor is only meant to be used by freezed and you are not supposed to need it nor use it.\nPlease check the documentation here for more information: https://github.com/rrousselGit/freezed#custom-getters-and-methods');

JadwalCheckup _$JadwalCheckupFromJson(Map<String, dynamic> json) {
  return _JadwalCheckup.fromJson(json);
}

/// @nodoc
mixin _$JadwalCheckup {
  int get id => throw _privateConstructorUsedError;
  String get checkup => throw _privateConstructorUsedError;
  @JsonKey(name: "tgl_checkup")
  String get tglCheckup => throw _privateConstructorUsedError;
  String get lokasi => throw _privateConstructorUsedError;
  String? get catatan => throw _privateConstructorUsedError;
  String get status => throw _privateConstructorUsedError;
  Pemeriksaan? get pemeriksaan => throw _privateConstructorUsedError;
  User? get dokter => throw _privateConstructorUsedError;
  User? get pasien => throw _privateConstructorUsedError;

  Map<String, dynamic> toJson() => throw _privateConstructorUsedError;
  @JsonKey(ignore: true)
  $JadwalCheckupCopyWith<JadwalCheckup> get copyWith =>
      throw _privateConstructorUsedError;
}

/// @nodoc
abstract class $JadwalCheckupCopyWith<$Res> {
  factory $JadwalCheckupCopyWith(
          JadwalCheckup value, $Res Function(JadwalCheckup) then) =
      _$JadwalCheckupCopyWithImpl<$Res>;
  $Res call(
      {int id,
      String checkup,
      @JsonKey(name: "tgl_checkup") String tglCheckup,
      String lokasi,
      String? catatan,
      String status,
      Pemeriksaan? pemeriksaan,
      User? dokter,
      User? pasien});

  $PemeriksaanCopyWith<$Res>? get pemeriksaan;
  $UserCopyWith<$Res>? get dokter;
  $UserCopyWith<$Res>? get pasien;
}

/// @nodoc
class _$JadwalCheckupCopyWithImpl<$Res>
    implements $JadwalCheckupCopyWith<$Res> {
  _$JadwalCheckupCopyWithImpl(this._value, this._then);

  final JadwalCheckup _value;
  // ignore: unused_field
  final $Res Function(JadwalCheckup) _then;

  @override
  $Res call({
    Object? id = freezed,
    Object? checkup = freezed,
    Object? tglCheckup = freezed,
    Object? lokasi = freezed,
    Object? catatan = freezed,
    Object? status = freezed,
    Object? pemeriksaan = freezed,
    Object? dokter = freezed,
    Object? pasien = freezed,
  }) {
    return _then(_value.copyWith(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      checkup: checkup == freezed
          ? _value.checkup
          : checkup // ignore: cast_nullable_to_non_nullable
              as String,
      tglCheckup: tglCheckup == freezed
          ? _value.tglCheckup
          : tglCheckup // ignore: cast_nullable_to_non_nullable
              as String,
      lokasi: lokasi == freezed
          ? _value.lokasi
          : lokasi // ignore: cast_nullable_to_non_nullable
              as String,
      catatan: catatan == freezed
          ? _value.catatan
          : catatan // ignore: cast_nullable_to_non_nullable
              as String?,
      status: status == freezed
          ? _value.status
          : status // ignore: cast_nullable_to_non_nullable
              as String,
      pemeriksaan: pemeriksaan == freezed
          ? _value.pemeriksaan
          : pemeriksaan // ignore: cast_nullable_to_non_nullable
              as Pemeriksaan?,
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

  @override
  $PemeriksaanCopyWith<$Res>? get pemeriksaan {
    if (_value.pemeriksaan == null) {
      return null;
    }

    return $PemeriksaanCopyWith<$Res>(_value.pemeriksaan!, (value) {
      return _then(_value.copyWith(pemeriksaan: value));
    });
  }

  @override
  $UserCopyWith<$Res>? get dokter {
    if (_value.dokter == null) {
      return null;
    }

    return $UserCopyWith<$Res>(_value.dokter!, (value) {
      return _then(_value.copyWith(dokter: value));
    });
  }

  @override
  $UserCopyWith<$Res>? get pasien {
    if (_value.pasien == null) {
      return null;
    }

    return $UserCopyWith<$Res>(_value.pasien!, (value) {
      return _then(_value.copyWith(pasien: value));
    });
  }
}

/// @nodoc
abstract class _$$_JadwalCheckupCopyWith<$Res>
    implements $JadwalCheckupCopyWith<$Res> {
  factory _$$_JadwalCheckupCopyWith(
          _$_JadwalCheckup value, $Res Function(_$_JadwalCheckup) then) =
      __$$_JadwalCheckupCopyWithImpl<$Res>;
  @override
  $Res call(
      {int id,
      String checkup,
      @JsonKey(name: "tgl_checkup") String tglCheckup,
      String lokasi,
      String? catatan,
      String status,
      Pemeriksaan? pemeriksaan,
      User? dokter,
      User? pasien});

  @override
  $PemeriksaanCopyWith<$Res>? get pemeriksaan;
  @override
  $UserCopyWith<$Res>? get dokter;
  @override
  $UserCopyWith<$Res>? get pasien;
}

/// @nodoc
class __$$_JadwalCheckupCopyWithImpl<$Res>
    extends _$JadwalCheckupCopyWithImpl<$Res>
    implements _$$_JadwalCheckupCopyWith<$Res> {
  __$$_JadwalCheckupCopyWithImpl(
      _$_JadwalCheckup _value, $Res Function(_$_JadwalCheckup) _then)
      : super(_value, (v) => _then(v as _$_JadwalCheckup));

  @override
  _$_JadwalCheckup get _value => super._value as _$_JadwalCheckup;

  @override
  $Res call({
    Object? id = freezed,
    Object? checkup = freezed,
    Object? tglCheckup = freezed,
    Object? lokasi = freezed,
    Object? catatan = freezed,
    Object? status = freezed,
    Object? pemeriksaan = freezed,
    Object? dokter = freezed,
    Object? pasien = freezed,
  }) {
    return _then(_$_JadwalCheckup(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      checkup: checkup == freezed
          ? _value.checkup
          : checkup // ignore: cast_nullable_to_non_nullable
              as String,
      tglCheckup: tglCheckup == freezed
          ? _value.tglCheckup
          : tglCheckup // ignore: cast_nullable_to_non_nullable
              as String,
      lokasi: lokasi == freezed
          ? _value.lokasi
          : lokasi // ignore: cast_nullable_to_non_nullable
              as String,
      catatan: catatan == freezed
          ? _value.catatan
          : catatan // ignore: cast_nullable_to_non_nullable
              as String?,
      status: status == freezed
          ? _value.status
          : status // ignore: cast_nullable_to_non_nullable
              as String,
      pemeriksaan: pemeriksaan == freezed
          ? _value.pemeriksaan
          : pemeriksaan // ignore: cast_nullable_to_non_nullable
              as Pemeriksaan?,
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
class _$_JadwalCheckup implements _JadwalCheckup {
  _$_JadwalCheckup(
      {required this.id,
      required this.checkup,
      @JsonKey(name: "tgl_checkup") required this.tglCheckup,
      required this.lokasi,
      this.catatan,
      required this.status,
      this.pemeriksaan,
      this.dokter,
      this.pasien});

  factory _$_JadwalCheckup.fromJson(Map<String, dynamic> json) =>
      _$$_JadwalCheckupFromJson(json);

  @override
  final int id;
  @override
  final String checkup;
  @override
  @JsonKey(name: "tgl_checkup")
  final String tglCheckup;
  @override
  final String lokasi;
  @override
  final String? catatan;
  @override
  final String status;
  @override
  final Pemeriksaan? pemeriksaan;
  @override
  final User? dokter;
  @override
  final User? pasien;

  @override
  String toString() {
    return 'JadwalCheckup(id: $id, checkup: $checkup, tglCheckup: $tglCheckup, lokasi: $lokasi, catatan: $catatan, status: $status, pemeriksaan: $pemeriksaan, dokter: $dokter, pasien: $pasien)';
  }

  @override
  bool operator ==(dynamic other) {
    return identical(this, other) ||
        (other.runtimeType == runtimeType &&
            other is _$_JadwalCheckup &&
            const DeepCollectionEquality().equals(other.id, id) &&
            const DeepCollectionEquality().equals(other.checkup, checkup) &&
            const DeepCollectionEquality()
                .equals(other.tglCheckup, tglCheckup) &&
            const DeepCollectionEquality().equals(other.lokasi, lokasi) &&
            const DeepCollectionEquality().equals(other.catatan, catatan) &&
            const DeepCollectionEquality().equals(other.status, status) &&
            const DeepCollectionEquality()
                .equals(other.pemeriksaan, pemeriksaan) &&
            const DeepCollectionEquality().equals(other.dokter, dokter) &&
            const DeepCollectionEquality().equals(other.pasien, pasien));
  }

  @JsonKey(ignore: true)
  @override
  int get hashCode => Object.hash(
      runtimeType,
      const DeepCollectionEquality().hash(id),
      const DeepCollectionEquality().hash(checkup),
      const DeepCollectionEquality().hash(tglCheckup),
      const DeepCollectionEquality().hash(lokasi),
      const DeepCollectionEquality().hash(catatan),
      const DeepCollectionEquality().hash(status),
      const DeepCollectionEquality().hash(pemeriksaan),
      const DeepCollectionEquality().hash(dokter),
      const DeepCollectionEquality().hash(pasien));

  @JsonKey(ignore: true)
  @override
  _$$_JadwalCheckupCopyWith<_$_JadwalCheckup> get copyWith =>
      __$$_JadwalCheckupCopyWithImpl<_$_JadwalCheckup>(this, _$identity);

  @override
  Map<String, dynamic> toJson() {
    return _$$_JadwalCheckupToJson(this);
  }
}

abstract class _JadwalCheckup implements JadwalCheckup {
  factory _JadwalCheckup(
      {required final int id,
      required final String checkup,
      @JsonKey(name: "tgl_checkup") required final String tglCheckup,
      required final String lokasi,
      final String? catatan,
      required final String status,
      final Pemeriksaan? pemeriksaan,
      final User? dokter,
      final User? pasien}) = _$_JadwalCheckup;

  factory _JadwalCheckup.fromJson(Map<String, dynamic> json) =
      _$_JadwalCheckup.fromJson;

  @override
  int get id;
  @override
  String get checkup;
  @override
  @JsonKey(name: "tgl_checkup")
  String get tglCheckup;
  @override
  String get lokasi;
  @override
  String? get catatan;
  @override
  String get status;
  @override
  Pemeriksaan? get pemeriksaan;
  @override
  User? get dokter;
  @override
  User? get pasien;
  @override
  @JsonKey(ignore: true)
  _$$_JadwalCheckupCopyWith<_$_JadwalCheckup> get copyWith =>
      throw _privateConstructorUsedError;
}
