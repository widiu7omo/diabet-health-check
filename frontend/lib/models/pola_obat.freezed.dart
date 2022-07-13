// coverage:ignore-file
// GENERATED CODE - DO NOT MODIFY BY HAND
// ignore_for_file: type=lint
// ignore_for_file: unused_element, deprecated_member_use, deprecated_member_use_from_same_package, use_function_type_syntax_for_parameters, unnecessary_const, avoid_init_to_null, invalid_override_different_default_values_named, prefer_expression_function_bodies, annotate_overrides, invalid_annotation_target

part of 'pola_obat.dart';

// **************************************************************************
// FreezedGenerator
// **************************************************************************

T _$identity<T>(T value) => value;

final _privateConstructorUsedError = UnsupportedError(
    'It seems like you constructed your class using `MyClass._()`. This constructor is only meant to be used by freezed and you are not supposed to need it nor use it.\nPlease check the documentation here for more information: https://github.com/rrousselGit/freezed#custom-getters-and-methods');

PolaObat _$PolaObatFromJson(Map<String, dynamic> json) {
  return _PolaObat.fromJson(json);
}

/// @nodoc
mixin _$PolaObat {
  int get id => throw _privateConstructorUsedError;
  String get obat => throw _privateConstructorUsedError;
  int get jumlah => throw _privateConstructorUsedError;
  String get anjuran => throw _privateConstructorUsedError;

  Map<String, dynamic> toJson() => throw _privateConstructorUsedError;
  @JsonKey(ignore: true)
  $PolaObatCopyWith<PolaObat> get copyWith =>
      throw _privateConstructorUsedError;
}

/// @nodoc
abstract class $PolaObatCopyWith<$Res> {
  factory $PolaObatCopyWith(PolaObat value, $Res Function(PolaObat) then) =
      _$PolaObatCopyWithImpl<$Res>;
  $Res call({int id, String obat, int jumlah, String anjuran});
}

/// @nodoc
class _$PolaObatCopyWithImpl<$Res> implements $PolaObatCopyWith<$Res> {
  _$PolaObatCopyWithImpl(this._value, this._then);

  final PolaObat _value;
  // ignore: unused_field
  final $Res Function(PolaObat) _then;

  @override
  $Res call({
    Object? id = freezed,
    Object? obat = freezed,
    Object? jumlah = freezed,
    Object? anjuran = freezed,
  }) {
    return _then(_value.copyWith(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      obat: obat == freezed
          ? _value.obat
          : obat // ignore: cast_nullable_to_non_nullable
              as String,
      jumlah: jumlah == freezed
          ? _value.jumlah
          : jumlah // ignore: cast_nullable_to_non_nullable
              as int,
      anjuran: anjuran == freezed
          ? _value.anjuran
          : anjuran // ignore: cast_nullable_to_non_nullable
              as String,
    ));
  }
}

/// @nodoc
abstract class _$$_PolaObatCopyWith<$Res> implements $PolaObatCopyWith<$Res> {
  factory _$$_PolaObatCopyWith(
          _$_PolaObat value, $Res Function(_$_PolaObat) then) =
      __$$_PolaObatCopyWithImpl<$Res>;
  @override
  $Res call({int id, String obat, int jumlah, String anjuran});
}

/// @nodoc
class __$$_PolaObatCopyWithImpl<$Res> extends _$PolaObatCopyWithImpl<$Res>
    implements _$$_PolaObatCopyWith<$Res> {
  __$$_PolaObatCopyWithImpl(
      _$_PolaObat _value, $Res Function(_$_PolaObat) _then)
      : super(_value, (v) => _then(v as _$_PolaObat));

  @override
  _$_PolaObat get _value => super._value as _$_PolaObat;

  @override
  $Res call({
    Object? id = freezed,
    Object? obat = freezed,
    Object? jumlah = freezed,
    Object? anjuran = freezed,
  }) {
    return _then(_$_PolaObat(
      id: id == freezed
          ? _value.id
          : id // ignore: cast_nullable_to_non_nullable
              as int,
      obat: obat == freezed
          ? _value.obat
          : obat // ignore: cast_nullable_to_non_nullable
              as String,
      jumlah: jumlah == freezed
          ? _value.jumlah
          : jumlah // ignore: cast_nullable_to_non_nullable
              as int,
      anjuran: anjuran == freezed
          ? _value.anjuran
          : anjuran // ignore: cast_nullable_to_non_nullable
              as String,
    ));
  }
}

/// @nodoc
@JsonSerializable()
class _$_PolaObat implements _PolaObat {
  _$_PolaObat(
      {required this.id,
      required this.obat,
      required this.jumlah,
      required this.anjuran});

  factory _$_PolaObat.fromJson(Map<String, dynamic> json) =>
      _$$_PolaObatFromJson(json);

  @override
  final int id;
  @override
  final String obat;
  @override
  final int jumlah;
  @override
  final String anjuran;

  @override
  String toString() {
    return 'PolaObat(id: $id, obat: $obat, jumlah: $jumlah, anjuran: $anjuran)';
  }

  @override
  bool operator ==(dynamic other) {
    return identical(this, other) ||
        (other.runtimeType == runtimeType &&
            other is _$_PolaObat &&
            const DeepCollectionEquality().equals(other.id, id) &&
            const DeepCollectionEquality().equals(other.obat, obat) &&
            const DeepCollectionEquality().equals(other.jumlah, jumlah) &&
            const DeepCollectionEquality().equals(other.anjuran, anjuran));
  }

  @JsonKey(ignore: true)
  @override
  int get hashCode => Object.hash(
      runtimeType,
      const DeepCollectionEquality().hash(id),
      const DeepCollectionEquality().hash(obat),
      const DeepCollectionEquality().hash(jumlah),
      const DeepCollectionEquality().hash(anjuran));

  @JsonKey(ignore: true)
  @override
  _$$_PolaObatCopyWith<_$_PolaObat> get copyWith =>
      __$$_PolaObatCopyWithImpl<_$_PolaObat>(this, _$identity);

  @override
  Map<String, dynamic> toJson() {
    return _$$_PolaObatToJson(this);
  }
}

abstract class _PolaObat implements PolaObat {
  factory _PolaObat(
      {required final int id,
      required final String obat,
      required final int jumlah,
      required final String anjuran}) = _$_PolaObat;

  factory _PolaObat.fromJson(Map<String, dynamic> json) = _$_PolaObat.fromJson;

  @override
  int get id;
  @override
  String get obat;
  @override
  int get jumlah;
  @override
  String get anjuran;
  @override
  @JsonKey(ignore: true)
  _$$_PolaObatCopyWith<_$_PolaObat> get copyWith =>
      throw _privateConstructorUsedError;
}
